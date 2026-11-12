#!/usr/bin/env python3
"""Render the whole site to static HTML for SourceForge project web.

SourceForge project web stopped running PHP in October 2026 and replaced the
site with a static mirror. This script makes the same kind of mirror (what
`wget --mirror --adjust-extension --convert-links --restrict-file-names=windows`
produces) from the local checkout:

  index.php                  -> index.php.html (and index.html for the root)
  index.php?page=x&n=y#frag  -> index.php@page=x&n=y.html, linked as
                                "index.php@page=x&amp;n=y.html#frag"

All other links (images, stylefile.css, files/, external URLs) are left as
they are, so upload the generated .html files to the htdocs root alongside
the existing images/, files/ etc.

The "Last updated" footer normally comes from file modification times, which
are meaningless in a git checkout, so it is set from the date of the last git
commit touching the page's source file (today, if it has uncommitted changes).

Usage:  py -3 scripts/make_static_site.py [--php PATH_TO_PHP] [--out DIR]
Needs a PHP command-line binary (any recent version) on PATH or given by --php.
"""

import argparse
import datetime
import html
import os
import re
import shutil
import socket
import subprocess
import sys
import time
import urllib.error
import urllib.parse
import urllib.request
from collections import deque

REPO = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))

ATTR_RE = re.compile(r'''(\b(?:href|src|background)\s*=\s*)("([^"]*)"|'([^']*)'|([^\s>"']+))''', re.I)
LAST_UPDATED_RE = re.compile(r"Last updated: [^<]*")
MONTHS = ["January", "February", "March", "April", "May", "June", "July",
          "August", "September", "October", "November", "December"]
WINDOWS_BAD_CHARS = '\\/:*"<>|'
# Pages whose content was written on the server (include/nightjob.php came from the
# old nightly test job) and is not in git. Don't generate them: the copy in the
# SourceForge mirror is the only one, and it must not be overwritten by a 404 page.
SERVER_ONLY_PAGES = {"index.php?page=nightjob"}


def parse_args():
    parser = argparse.ArgumentParser(description=__doc__, formatter_class=argparse.RawDescriptionHelpFormatter)
    parser.add_argument("--php", default=shutil.which("php") or "php", help="PHP CLI binary")
    parser.add_argument("--out", default=os.path.join(REPO, "static_site"), help="output directory")
    return parser.parse_args()


def free_port():
    with socket.socket() as s:
        s.bind(("127.0.0.1", 0))
        return s.getsockname()[1]


def start_php_server(php, port):
    cmd = [php, "-n", "-d", "display_errors=0", "-d", "error_reporting=0", "-d", "date.timezone=UTC",
           "-S", "127.0.0.1:%d" % port, "-t", REPO]
    proc = subprocess.Popen(cmd, cwd=REPO, stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)
    for _ in range(100):
        if proc.poll() is not None:
            sys.exit("PHP server exited immediately: " + " ".join(cmd))
        try:
            socket.create_connection(("127.0.0.1", port), timeout=0.2).close()
            return proc
        except OSError:
            time.sleep(0.1)
    proc.kill()
    sys.exit("PHP server did not start")


def doc_versions():
    with open(os.path.join(REPO, "settings.php"), encoding="latin-1") as f:
        releases = re.findall(r'array_push\(\$all_releases,\s*"([^"]+)"\)', f.read())
    return {"documentation_" + r.replace(".", "_") for r in releases}


def source_file(url, versions):
    """The file print_last_updated() in functions.php takes the date from."""
    query = dict(urllib.parse.parse_qsl(url.partition("?")[2]))
    page, n = query.get("page"), query.get("n")
    if page is None:
        return "include/main.php"
    folder = "include/documentation/" if page in versions else "include/"
    return folder + page + ("/" + n if n else "") + ".php"


def git_dates():
    """Map repo-relative path -> 'dd Month yyyy' of its last commit, or today if modified."""
    out = subprocess.run(["git", "log", "--format=%x00%ad", "--date=short", "--name-only"],
                         cwd=REPO, capture_output=True, text=True, check=True).stdout
    dates, current = {}, None
    for line in out.splitlines():
        if line.startswith("\x00"):
            current = datetime.date.fromisoformat(line[1:])
        elif line and line not in dates:
            dates[line] = current
    status = subprocess.run(["git", "status", "--porcelain", "--untracked-files=all"],
                            cwd=REPO, capture_output=True, text=True, check=True).stdout
    for line in status.splitlines():
        dates[line[3:].strip('"')] = datetime.date.today()
    return {path: "%02d %s %d" % (d.day, MONTHS[d.month - 1], d.year) for path, d in dates.items()}


def local_target(value):
    """(url, fragment) if the link points at a page of this site, else None."""
    base, _, frag = html.unescape(value).strip().partition("#")
    if base == "index.php" or base.startswith("index.php?"):
        return base, frag
    return None


def static_name(url):
    if url == "":
        return "index.html"
    if url == "index.php":
        return "index.php.html"
    query = url.partition("?")[2]
    for ch in WINDOWS_BAD_CHARS:
        query = query.replace(ch, "%%%02X" % ord(ch))
    return "index.php@" + query + ".html"


def convert_links(text):
    def replace(match):
        value = next(g for g in match.group(3, 4, 5) if g is not None)
        target = local_target(value)
        if target is None:
            return match.group(0)
        url, frag = target
        new = static_name(url).replace("&", "&amp;") + ("#" + frag if frag else "")
        quote = "'" if match.group(4) is not None else '"'
        return match.group(1) + quote + new + quote
    return ATTR_RE.sub(replace, text)


def page_links(text):
    for match in ATTR_RE.finditer(text):
        value = next(g for g in match.group(3, 4, 5) if g is not None)
        target = local_target(value)
        if target is not None:
            yield target[0]


def main():
    args = parse_args()
    versions = doc_versions()
    dates = git_dates()
    os.makedirs(args.out, exist_ok=True)
    for name in os.listdir(args.out):
        if name.endswith(".html"):
            os.remove(os.path.join(args.out, name))

    port = free_port()
    server = start_php_server(args.php, port)
    queue, seen = deque(["", "index.php"]), {"", "index.php"}
    not_found, errors, written = [], [], 0
    try:
        while queue:
            url = queue.popleft()
            if url in SERVER_ONLY_PAGES:
                continue
            try:
                with urllib.request.urlopen("http://127.0.0.1:%d/%s" % (port, url)) as response:
                    # latin-1 round-trips the bytes unchanged whatever the page's real encoding
                    text = response.read().decode("latin-1")
            except urllib.error.URLError as e:
                errors.append("%s: %s" % (url, e))
                continue
            for link in page_links(text):
                if link not in seen:
                    seen.add(link)
                    queue.append(link)
            if "<!--404_PAGE_NOT_FOUND-->" in text:
                not_found.append(url)
            src = source_file(url, versions)
            if src in dates and os.path.exists(os.path.join(REPO, src)):
                text = LAST_UPDATED_RE.sub("Last updated: " + dates[src], text)
            with open(os.path.join(args.out, static_name(url)), "wb") as f:
                f.write(convert_links(text).encode("latin-1"))
            written += 1
    finally:
        server.kill()

    print("Wrote %d pages to %s" % (written, args.out))
    print("Not generated, keep the server's copy: " + ", ".join(static_name(u) for u in sorted(SERVER_ONLY_PAGES)))
    if not_found:
        print("\n%d linked pages render as 'page not found' (saved anyway, as the old mirror did):" % len(not_found))
        for url in sorted(not_found):
            print("  " + url)
    if errors:
        print("\nFailed to fetch:")
        for err in errors:
            print("  " + err)
        sys.exit(1)


if __name__ == "__main__":
    main()
