# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

Source for the texttest.org website: plain PHP 4-era pages (HTML 4 tables + `stylefile.css`), with no build step, framework or test suite. Pages are served directly by PHP. The Python scripts in `scripts/` are maintenance tools, not part of the site.

## Request routing

Everything goes through `index.php?page=<name>[&n=<subpage>]`:

- `index.php` holds a hard-coded `if/elseif` list that maps `page` to `include/<page>.php`. A new top-level page needs an entry there, and usually a link in `menu.php`.
- If `page` matches `documentation_<version>` for a version in `$all_releases` (from `settings.php`, with dots turned into underscores by `convertToDocFormat` in `functions.php`), it includes `include/documentation/documentation_<version>.php` instead.
- That per-version index page shows the doc table of contents. Each `printLI("<n>", ...)` call (defined in `include/documentation/common_for_doc`) is what makes `&n=<n>` resolve to `include/documentation/documentation_<version>/<n>.php`. **A doc page that is not listed with `printLI` in the version's index renders as a 404**, so adding a file is not enough.
- Doc pages use the globals `$version` (e.g. `documentation_trunk`) and `$basePath` (e.g. `include/documentation/documentation_trunk/`) to build links and image paths, e.g. `index.php?page=<?php echo $version ?>&n=install_texttest` and `<?php print $basePath; ?>images/foo.png`. Keep links relative this way so copied release snapshots stay self-contained.

## Documentation versions

- `include/documentation/documentation_trunk/` is the live, editable documentation (see `ReadMe.txt`). The other `documentation_X_Y/` directories are frozen snapshots of older releases.
- To cut a docs release (the pattern of commit `d6d0869`, "New section for 4.3"): copy `documentation_trunk/` to `documentation_X_Y/` and `documentation_trunk.php` to `documentation_X_Y.php`, set `$texttest_version = "X.Y"` in the copy, and in `settings.php` update `$current_release`, add the version to `$all_releases`, and move the `$all_releases_direct_links = $all_releases;` line so it sits just after the newest few releases (those get direct links under "Other versions").

## Generated config reference tables

These files under each docs directory are generated from a real TextTest installation, so don't hand-edit their table rows: `configfile_*.php`, `options_*.php`, `environment_*.php`, `scripts_*.php` and `personalpreffile.php` (in `default` and `queuesystem` variants). To regenerate the trunk tables:

- Windows: `scripts\updatetables.bat`. It changes into `documentation_trunk` itself and needs `texttestc.exe` on PATH and `py -3`.
- Unix: run `../../../scripts/updatetables.sh <path_to_texttest>` from inside `include/documentation/documentation_trunk`.

The scripts (`updateconfig.py`, `updateoptions.py`, etc., sharing `tableshared.py`) run TextTest with `-s` to dump the settings. They keep the page text above the table and reuse the last `<TR>` as the row template. In the description column, each key gets a link to wherever a doc page contains an anchor of exactly the form `<A NAME="key">` (the match on `<A NAME=` is case-sensitive). So when you document a config option, environment variable or command-line option, add that anchor in the prose and then regenerate the tables (see `ReadMe.txt`).

## Deploying (static, since SourceForge dropped PHP)

SourceForge project web (`/home/project-web/texttest/htdocs` on `web.sourceforge.net`) stopped running PHP in October 2026 and replaced the site with a wget mirror: `index.php?page=x&n=y` is served from the static file `index.php@page=x&n=y.html`. Uploading `.php` files does nothing. To deploy:

- Run `py -3 scripts/make_static_site.py [--php path\to\php.exe]` (needs a PHP CLI). It crawls the site through PHP's built-in server and writes every page to `static_site/` (gitignored), with links rewritten the same way and "Last updated" taken from git commit dates.
- Upload the `.html` files from `static_site/` to the htdocs root. Images, CSS and `files/` are referenced by their existing relative paths.
- `index.php@page=nightjob.html` is deliberately not generated: its content came from a server-side nightly job, not git, so the server's copy is the only one.

## Other scripts

- `scripts/generate_sitemap.py` rebuilds `include/sitemap.php` from page headers. Run it from the `scripts/` directory.
- `scripts/check_php_links.py` checks internal links by running pages through the PHP CLI (`index.php` accepts `key=value` argv pairs as `$_GET` for this purpose).
- `scripts/make_offline_docs.py` builds static HTML docs by fetching pages from the live site.

These are older tools and may need fixing before they work.

## Markup conventions (`StyleGuide.txt`)

Wrap content in the CSS classes `Text_Normal`, `Text_Main_Header`, `Text_Header`, `Text_Small_Header` and `Text_Description` as `<div class="...">...</div>`. Use `<B>`/`<I>` for emphasis and never `<U>`. Links use `class="Text_Link"`. Code samples use the `codeSampleBegin()`/`codeSampleEnd()` helpers in `functions.php`. Match the existing uppercase/lowercase tag style of the file you're editing.
