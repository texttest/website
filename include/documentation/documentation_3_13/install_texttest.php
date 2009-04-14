<div class="Text_Main_Header">Install Texttest</div>

<div class="Text_Normal">The first part is clearly to download TextTest itself
from the <A class="Text_Link" HREF="http://sf.net/projects/texttest">sourceforge
project page.</A>. You can then unzip this anywhere and run it from that location.
The download is fairly large as it includes TextTest's tests for itself, which are
 useful as a tool for understanding features by example. 
</div>
<div class="Text_Header">Compulsory dependencies</div>
<OL>
<div class="Text_Normal"><LI><A class="Text_Link" HREF="http://www.python.org/download/">Python</A>. 
You will need at least version 2.4 on UNIX and at least version 2.5.1 on Windows. Python 2.6 has 
not yet been tried very extensively on either platform, and isn't recommended on Windows yet as there are known 
issues around the traffic interception mechanism. Note that most Linux installations come with Python
pre-installed.</div>
<div class="Text_Normal"><LI><A class="Text_Link" HREF="http://www.pygtk.org/downloads.html">PyGTK</A>.
TextTest's GUI makes use of PyGTK, which is a thin wrapper around the C GUI library GTK. You will need
at least GTK 2.10 and an equivalent version of PyGTK. All development is currently being done against GTK 2.12
and you're strongly recommended to stick to that for now if you can: there are bugs in the file chooser handling
in GTK 2.14 that make a lot of TextTest's GUI controls function badly. </div>
<div class="Text_Normal">
Note that most Linux installations include a PyGTK package and some (e.g. Ubuntu) have it installed by default.
To test whether your Python installation already includes PyGTK, type 'import gtk' into a python prompt. No response means you do. 
However, this can be a curse as well as a blessing, because if you have an older "enterprise" linux platform
such as Red Hat or SuSE, it's difficult to put a newer GTK in place than the default. In this case you should
refer to the instructions under doc/Upgrade_PyGTK_Enterprise_Linux in the TextTest download. </div>
<div class="Text_Normal">
On Windows, the summary for how to install is that you should get the GTK 2.12 bundle from <A class="Text_Link" HREF="http://ftp.gnome.org/pub/gnome/binaries/win32/gtk+/2.12/gtk+-bundle-2.12.11-20080720.zip">here</A>, unzip it somewhere, add its "bin" subdirectory to your PATH and then run the three installers at the top of the <A class="Text_Link" HREF="http://www.pygtk.org/downloads.html">PyGTK downloads</A> page.
</div>
<div class="Text_Normal"><LI><B><U>Tkdiff and diff</U></B>. You will need a decent graphical difference tool on your
PATH, along with a textual version for reports. We recommend 'tkdiff' and 'diff' respectively which are present on most UNIX
systems and are TextTest's defaults. If you're on UNIX and tkdiff isn't there, download from from <A class="Text_Link" HREF="http://sourceforge.net/projects/tkdiff/">tkdiff's
project page on sourceforge</A>.</div>
<div class="Text_Normal">On Windows, Patrick Finnegan sent me a very nice <A class="Text_Link" HREF="files/tkdiffInstall.zip">Windows
installer for tkdiff and diff </A>and kindly agreed that I
could distribute it here. Note that the installer won't affect
your path though, so you'll need to set PATH in autoexec.bat or
similar to include wherever it's installed (typcially something
like C:\Program Files\tkdiff)</div>
<div class="Text_Normal"><LI><B><U>Emacs and notepad</U></B>. TextTest also makes use of a generic editor for viewing files. This defaults to "emacs" on UNIX systems and "notepad" on Windows, which are both likely to be pre-installed. Your UNIX installation will certainly have a package for "emacs" if not. It's easy to change these to use other editors if desired via the "view_program" configuration setting.</div>
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
	
