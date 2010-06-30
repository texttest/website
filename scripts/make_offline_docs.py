#!/usr/bin/env python

import sys, shutil, os, urllib2, re
from glob import glob

def get_location():
    return os.path.dirname(os.path.dirname(os.path.abspath(sys.argv[0])))

def get_doc_relpath(version):
    return os.path.join("include", "documentation", "documentation_" + version.replace(".", "_"))

def get_pages_to_build(doc_location):
    files = glob(os.path.join(doc_location, "*.php"))
    return sorted(( os.path.basename(f)[:-4] for f in files ))

def make_empty(dest):
    if os.path.isdir(dest):
        shutil.rmtree(dest)
    os.makedirs(dest)


def build_page(page_name, version, dest):
    urlRoot = "index.php?page=documentation_" + version.replace(".", "_") + "&n="
    url = "http://texttest.carmen.se/" + urlRoot + page_name
    print "Reading from", url, "..."
    reader = urllib2.urlopen(url)
    text = reader.read()
    text = text.replace(get_doc_relpath(version) + "/images", "images")
    pattern = urlRoot.replace("?", "\\?") + "([a-z_]*)"
    toWrite = re.sub(pattern, "\\1.html", text)
    fileName = os.path.join(dest, page_name + ".html")
    f = open(fileName, "w")
    f.write(toWrite)
    print "Written to file", fileName
    f.close()

def copy_basic_files(location, dest):
    src = os.path.join(location, "stylefile.css")
    shutil.copy(src, dest)
    for src in glob(os.path.join(location, "images/*")):
        shutil.copy(src, os.path.join(dest, "images"))

def copy_static_docs(doc_location, dest):
    for dir in [ "images", "htmlreport_example" ]:
        src = os.path.join(doc_location, dir)
        dst = os.path.join(dest, dir)
        shutil.copytree(src, dst)

def make_docs(version, dest):
    make_empty(dest)
    location = get_location()
    doc_location = os.path.join(location, get_doc_relpath(version))
    copy_static_docs(doc_location, dest)
    copy_basic_files(location, dest)
    for page in get_pages_to_build(doc_location):
        build_page(page, version, dest)

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print "Usage : make_offline_docs.py <version> <dest>"
    else:
        make_docs(sys.argv[1], sys.argv[2])
