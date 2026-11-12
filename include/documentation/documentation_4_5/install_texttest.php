<div class="Text_Main_Header">Install Texttest</div>
<div class="Text_Header">Windows</div>
<div class="Text_Normal">
	Download and run the Windows installer from the <A class="Text_Link" HREF="http://sf.net/projects/texttest">sourceforge project page.</A>
	Since TextTest 4.0 this is an MSI package which installs everything under "Program Files" and does not affect existing Python installations, etc. It adds that directory to your PATH, so "texttest" (the GUI) and "texttestc" (the console version, for batch mode and scripts) can be run from a command prompt, and it adds Start menu shortcuts for TextTest and Meld.
	It is packaged with <a href="https://meldmerge.org/">Meld</a> as the graphical difference tool. However, for backwards compatibility TextTest will use <a href="https://osdn.net/projects/sfnet_tkdiff/downloads/tkdiff/4.2/TkDiff-4.2-Setup.exe/">tkdiff</a>, TortoiseMerge (from TortoiseSVN) or TortoiseGitMerge (from TortoiseGit) instead, in that order, if it finds one of them installed under "Program Files".
	For editing files it will use "Notepad++" or "WordPad", in that order, if it finds them installed, and otherwise "Notepad". (WordPad is no longer included in recent versions of Windows 11, so in practice this is usually Notepad++ if you have it, and Notepad if not.)
	Both of these tools can be configured via the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=personalising_ui";?>">personal config file</A>, by setting "diff_program" or "view_program" respectively. 
	The installer does not set the environment variable TEXTTEST_HOME (see below), so you should set it yourself to the directory where you want to keep your tests, for example C:\tests. You can do this via "Edit environment variables for your account" in the Windows settings, or from a command prompt with "setx TEXTTEST_HOME C:\tests". Either way, it only takes effect in programs started after you set it.
</div>
<div class="Text_Header">Linux</div>
<div class="Text_Normal">
	Most Linux distributions come with Python pre-installed. Since TextTest 4.0 a recent version of Python 3 is needed (currently >=3.9). TextTest can be installed by fetching it using the included pip installer, via "pip install texttest", either into
	the default Python or into a "virtualenv" if you'd prefer to keep it isolated.
	As well as the "texttest" script that pip installs, TextTest can be started with "python -m texttestlib". This is mostly useful on Windows if you install with pip rather than with the Windows installer.
	In order to use the TextTest GUI it is also necessary to install PyGI/PyGObject, the successor to PyGTK which TextTest 4.0 now uses. There are some guides <a href="https://pygobject.readthedocs.io/en/latest/getting_started.html#ubuntu-getting-started">here</a> for how to do that on various forms of Linux.
	As above, you will need a graphical difference tool and a text editor, which default to "tkdiff" and "emacs" respectively. Either install these tools or
	create a <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=personalising_ui";?>">personal config file</A>, and set "diff_program" or "view_program" respectively. 
</div>   
<div class="Text_Header">Mac</div>
<div class="Text_Normal">
	Install <a href="https://brew.sh/">Homebrew</a>, and then use it to install a recent version of Python (>=3.9). From there the instructions on Linux largely apply, there is a MacOS section for how to install PyGObject using Homebrew.
</div>   
<div class="Text_Header">Source package</div>
<div class="Text_Normal">
	The <A class="Text_Link" HREF="http://sf.net/projects/texttest">sourceforge project page.</A> has a default download for non-Windows platforms that is pretty much a source package. While it's possible to run TextTest from there we believe it will nearly always be more convenient to follow the instructions above instead.
</div>
<div class="Text_Header">Things you might want to install...</div>
<div class="Text_Normal">For viewing test files while they are running, there is a
menu option to display a window with live updates of the file.
On UNIX this defaults to using 'xterm -e tail -f'. On Windows there is a
nice equivalent called baretail which is TextTest's default. You
can download it from <A class="Text_Link" HREF="http://www.baremetalsoft.com/baretail/index.php">Bare
Metal Software's site</A>. Like everything else you should add
it to your PATH. Naturally, there is no compulsion to use this
functionality so this download is optional. Selecting it on Windows 
will just produce an error dialog if &ldquo;baretail&rdquo; can't be
found.</div>
<div class="Text_Header">Things you need to set...</div>

<div class="Text_Normal">TextTest uses a root directory where it starts to look for
tests, determined primarily by the environment variable
TEXTTEST_HOME. This is the first thing determined by TextTest on
being called and not much will happen if it isn't set.</div>
<div class="Text_Normal">You are strongly recommended to pick an existing root directory for all
your tests and set TEXTTEST_HOME to this directory in some
persistent way. In this way you will not need to think about it more than once. 
</div>