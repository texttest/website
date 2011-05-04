<div class="Text_Main_Header">CaptureMock's Configuration Files</div>
<div class="Text_Description">(Often referred to as 'rc files')</div>
<div class="Text_Normal">
CaptureMock options are ordinarily specified in a configuration file, for all other than very basic usage. This makes it easier to re-run it with consistent settings, and avoids cluttering up test code with CaptureMock configuration.
</div>
<div class="Text_Normal">
The default name for configuration files is .capturemockrc, in the same directory CaptureMock is being run in. When run from TextTest, definition files called "capturemockrc.&lt;app&gt;" are used instead (see <A class="Text_Link" HREF="index.php?page=capturemock&n=texttest">here</A> for details). Most of the settings in the configuration file are tied to your source code and how it should be handled, so it should be stored with your tests, and checked into source control, rather than put in your home directory.
</div>
<div class="Text_Header">Syntax</div>
<div class="Text_Normal">
A CaptureMock configuration/rc file is in classic .ini file format: sections are introduced by a [section] header, and contain name = value entries. Lines beginning with # or ; are ignored as comments.
</div>
<div class="Text_Normal">
Strings don't need quotes. Multiline strings can be created by indenting values on multiple lines.
</div>
<div class="Text_Normal">
Boolean values can be specified as on, off, true, false, 1, or 0 and are case-insensitive.
</div>
<div class="Text_Normal">
Here's a sample configuration file, amalgamated from various things in the TextTest self-tests:
<?php codeSampleBegin() ?>
### Command line interception
[command line]
intercepts = tkdiff,emacs,xterm,time,qsub

[qsub]
asynchronous = True
environment = USECASE_RECORD_SCRIPT,USECASE_REPLAY_SCRIPT

[general]
server_multithreaded = True

### Python interception
[python]
intercepts = smtplib,matplotlib,locale.getdefaultlocale
ignore_callers = usecase,coverage
alterations = pythonbug1820

[locale.getdefaultlocale]
check_repeated_calls = False

# Return values from os.stat and os.lstat aren't repr-eval friendly, see Python bug 1820
[pythonbug1820]
match_pattern = st_[a-z]*=
replacement =
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header">Documentation</div>
<div class="Text_Normal">
These entries are documented as follows. All lists are comma-separated, i.e. entry1,entry2,entry3
<UL>
<LI><A class="Text_Link" HREF="index.php?page=capturemock&n=cmdline_basic">intercepts (under [command line])</A> - list of command-line programs to intercept
<LI><A class="Text_Link" HREF="index.php?page=capturemock&n=environment">environment</A> - list of environment variables to track for the program named in the section header 
<LI><A class="Text_Link" HREF="index.php?page=capturemock&n=file_capture">asynchronous</A> - whether the program named in the section header will cause files to be written after it has exited (default False)
<LI><A class="Text_Link" HREF="index.php?page=capturemock&n=cmdline_basic">server_multithreaded</A> - whether the CaptureMock server should handle requests concurrently (default True) 
<LI><A class="Text_Link" HREF="index.php?page=capturemock&n=python_basic">intercepts (under [python])</A> - list of Python modules or attributes to intercept
<LI><A class="Text_Link" HREF="index.php?page=capturemock&n=transform_output">alterations</A> - list of transformations (section header names) to perform on the recorded output
<LI><A class="Text_Link" HREF="index.php?page=capturemock&n=filtering">ignore_callers</A> - list of Python modules from where no interception should be performed.
<LI><A class="Text_Link" HREF="index.php?page=capturemock&n=filtering">check_repeated_calls</A> - Whether to record the number of times a function is called (True) or assume it always returns the same thing (False). Default True.
<LI><A class="Text_Link" HREF="index.php?page=capturemock&n=transform_output">match_pattern</A> - Regular expression or string to search for when applying the alteration named in the section header.
<LI><A class="Text_Link" HREF="index.php?page=capturemock&n=transform_output">replacement</A> - What to replace the thing matched by "match_pattern" with.
</UL>
</div>
