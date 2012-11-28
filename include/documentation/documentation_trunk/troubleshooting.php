
<A NAME="-x"></A><div class="Text_Header">Troubleshooting: using TextTest's internal logging</div>
<div class="Text_Normal">When TextTest doesn't do what you expect it to, the best way
to find out why is usually to enable its own internal logging mechanism
for the relevant aspect of the functionality. You need to do the following:
<OL>
<LI>Create a .texttest/log directory in your home directory (see <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=personalising_ui"; ?>">here</A> for how TextTest understands "home directory" on Windows).
<LI>Copy "logging.debug" from the texttest release directory (under source/log) to the ~/.texttest/log directory
<LI>Edit logging.debug.  In the appropriate section, uncomment both a
line like "#level=INFO" and a line like "#args=('%(TEXTTEST_PERSONAL_LOG)s/actionrunner.diag', 'a')".  The first
tells texttest what level of logging to do.  The second tells texttest
what file to write the log to. (The file will be in ~/.texttest/log and
the file will end with the .diag suffix.)  Each section is for a
different category of logging, that is, what function of texttest to
enable logging for.
<LI>Pass the "-x" argument when invoking texttest, to enable
internal logging (diagnostics). Or check the "Enable self-diagnostics" box from the Running/Advanced tab in the static GUI.
<LI>If you are set up to run tests in parallel via a grid, think very hard about whether you need to do so to troubleshoot the current problem.
It will be simpler and easier to run the test locally (use the -l flag) in this case. If the problem only arises when running via the grid,
be aware that the "-x" flag only enables logging from the master TextTest process. To enable it in the slaves, the TextTest process run on the 
test execution machine, you also need the "-xs" flag (there is a corresponding check box in the Running/Advanced tab also). These diagnostics
will then be writted to subdirectories of the "log" directory, named after the processes in question.
<LI>Execute texttest and read the log file

</OL>
The existence of ~/.texttest/log/logging.debug (the configuration file
for internal logging) alone does not enable logging, you must pass the
-x argument to texttest also.
</div>
<div class="Text_Normal">Then the hard part is just figuring out what to enable. Some hints / examples:</div>
<UL>
	<LI><div class="Text_Normal">&ldquo;<I>My environment
	files don't do what I want!&ldquo;</I> : enable &ldquo;read
	environment&rdquo;</div>
	<LI><div class="Text_Normal">&ldquo;<I>My test data isn't
	found!&ldquo;</I> : enable &ldquo;prepare writedir&rdquo;</div>

	<LI><div class="Text_Normal">&ldquo;<I>My run-dependent
	text isn't filtering as I want!</I>&rdquo; : enable &ldquo;run
	dependent text&rdquo;</div>
	<LI><div class="Text_Normal">&ldquo;<I>I want to see the
	generated command line</I>&rdquo; : enable &ldquo;run test&rdquo;</div>
</UL>
<A NAME="-xr"></A><A NAME="-xw"></A><A NAME="TEXTTEST_PERSONAL_LOG"></A><div class="Text_Header">Advanced logging configuration</div>
<div class="Text_Normal">The location of the logging configuration file to use is set by the field
&ldquo;Configure self-diagnostics from&rdquo;, in the Running/Advanced tab in the static GUI, or via "-xr" on the command line. 
</div>
<div class="Text_Normal">
By default the loggers are set up to write a file alongside the logging.debug file in the location above, 
but of course you can configure it to write anywhere you like, either by changing the referenced locations in "logging.debug" or
or by changing the location in "Write self-diagnostics to" on the Running/Advanced tab. ("-xw" on the command line). </div>
<div class="Text_Normal">
There also exist default files for batch mode, the console interface and the GUI in the source directory alongside "logging.debug".
If you wish to enable different logging for any of these modes "permanently", you
can just do the same thing, i.e. copy them to your personal configuration directory
and edit the copy there.
</div>
<div class="Text_Normal">
(If the above options are not set, TextTest will find the personal logging directory
from the environment variable TEXTTEST_PERSONAL_LOG,
but you probably won't need to set this variable, it's mainly for the self-tests)
</div>

<div class="Text_Header">Getting a Python stack out if TextTest is hanging (on UNIX)</div>
<div class="Text_Normal">
Unfortunately Python doesn't have a native way to do this, and "pstack" and "strace" are
rather limited when it comes to Python. TextTest has its own mechanism, whereby
sending it SIGQUIT will cause it to write out the current stack.
</div>

<div class="Text_Header">If you're still stuck...</div>

<div class="Text_Normal">It's time to mail the <A class="Text_Link"  HREF="https://lists.sourceforge.net/lists/listinfo/texttest-users">TextTest mailing list at sourceforge</A>. We should be able to respond within a day or so.</div>
