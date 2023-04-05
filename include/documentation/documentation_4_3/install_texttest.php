<div class="Text_Main_Header">Install Texttest</div>
<div class="Text_Header">Windows</div>
<div class="Text_Normal">
	Download and run the Windows installer from the <A class="Text_Link" HREF="http://sf.net/projects/texttest">sourceforge project page.</A>
	Since TextTest 4.0 this now installs everything under "Program Files" and does not affect existing Python installations, etc. It is also packaged with <a href="https://sourceforge.net/projects/meld-installer/">Meld</a> instead of <a href="https://osdn.net/projects/sfnet_tkdiff/downloads/tkdiff/4.2/TkDiff-4.2-Setup.exe/">tkdiff</a>
	as the default graphical difference tool. For backwards compatibility tkdiff will however be used by default if such an installation is found. 
	It will use "Notepad++", "Wordpad" or "Notepad" in that order by default for editing files, depending on which of these it finds installed.
	Both of these tools can be configured via the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=personalising_ui";?>">personal config file</A>, by setting "diff_program" or "view_program" respectively. 
	The installer will set the environment variable TEXTTEST_HOME (see below) to C:\tests, so all tests will be created there. As this change doesn't take effect until you log out and log in again, it's suggested you do that for the moment (or set it to some other desired value before starting TextTest).
</div>
<div class="Text_Header">Linux</div>
<div class="Text_Normal">
	Most Linux distributions come with Python pre-installed. Since TextTest 4.0 a recent version of Python 3 is needed (>=3.6). TextTest can be installed by fetching it using the included pip installer, via "pip install texttest", either into
	the default Python or into a "virtualenv" if you'd prefer to keep it isolated.
	In order to use the TextTest GUI it is also necessary to install PyGI/PyGObject, the successor to PyGTK which TextTest 4.0 now uses. There are some guides <a href="https://pygobject.readthedocs.io/en/latest/getting_started.html#ubuntu-getting-started">here</a> for how to do that on various forms of Linux.
	As above, you will need a graphical difference tool and a text editor, which default to "tkdiff" and "emacs" respectively. Either install these tools or
	create a <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=personalising_ui";?>">personal config file</A>, and set "diff_program" or "view_program" respectively. 
</div>   
<div class="Text_Header">Mac</div>
<div class="Text_Normal">
	Install <a href="https://brew.sh/">Homebrew</a>, and then use it to install a recent version of Python (>=3.6). From there the instructions on Linux largely apply, there is a MacOS section for how to install PyGObject using Homebrew.
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