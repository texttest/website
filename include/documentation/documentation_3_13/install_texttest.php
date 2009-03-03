<div class="Text_Main_Header">Install Texttest</div>

<div class="Text_Normal">Hopefully this is now pretty straightforward on all
platforms. Up until TextTest 3.8 it was pretty involved on
Windows. The main advances are built-in process handling in
Python 2.4 and the fact that the PyGTK people now have an
all-in-one installer for Windows.</div>
<div class="Text_Header">Things you must install</div>

<OL>
<div class="Text_Normal"><LI>Naturally, you need to download TextTest. This is done
from the <A class="Text_Link" HREF="http://sf.net/projects/texttest">sourceforge
project page.</A>. Read the readme.txt file for what to do with
it then. The download includes TextTest's tests for itself:
primarily good for those developing it but also useful as a
tool for understanding features by example. 
</div>
<div class="Text_Normal"><LI>TextTest is written in Python, and the GUIs are written
with the GUI library PyGTK. It follows that you need both of
these installed. You should make sure you have at least Python
2.4 (on UNIX), at least Python 2.5.1 (on Windows) and at least PyGTK 2.10 on either.</div>
<div class="Text_Normal">On Windows, there is now an <A class="Text_Link" HREF="http://osl.ulpgc.es/~arc/gnome/pygtk-setup.exe">all-in-one
installer</A> available for Python and PyGTK together. This is
new and a bit experimental but will probably save you time. Try
it first, in any case. Information about it can be found <A class="Text_Link" HREF="http://aruiz.typepad.com/siliconisland/2006/12/allinone_win32_.html">here</A> if you have trouble with it.</div>
<div class="Text_Normal">Linux systems generally come with both Python and PyGTK
pre-installed. However, particularly Red Hat Enterprise 3 and 4
have very old versions of these things. In that case you'll
need to download newer versions as below and install them
somewhere else, for which there is a guide included in the
TextTest download.</div>
<div class="Text_Normal">To install Python separately, head for the <A class="Text_Link" HREF="http://www.python.org/download/">Python
download page</A>. To test whether your Python installation
already includes PyGTK, type 'import gtk' into a python prompt.
No response means you do. If you don't have it, you can
download it separately from the <A class="Text_Link" HREF="http://www.pygtk.org/downloads.html">PyGTK
homepage.</A></div>
<div class="Text_Normal"><LI>You will need a decent graphical difference tool on your
PATH, along with a textual version for reports. We recommend
'tkdiff' and 'diff' respectively which are present on most UNIX
systems and are TextTest's defaults. If you're on UNIX and
tkdiff isn't there, download from from <A class="Text_Link" HREF="http://sourceforge.net/projects/tkdiff/">tkdiff's
project page on sourceforge</A>.</div>

<div class="Text_Normal">On Windows, Patrick Finnegan sent me a very nice <A class="Text_Link" HREF="files/tkdiffInstall.zip">Windows
installer for tkdiff and diff </A>aand kindly agreed that I
could distribute it here. Note that the installer won't affect
your path though, so you'll need to set PATH in autoexec.bat or
similar to include wherever it's installed (typcially something
like C:\Program Files\tkdiff)</div>
</OL>

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
persistent way (for example your shell starter script on UNIX or
autoexec.bat on Windows). In this way you will not need to think
about it more than once. 
</div>
	
