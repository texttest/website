
<A NAME="-x"></A><A NAME="-xr"></A><A NAME="-xw"></A><A NAME="TEXTTEST_PERSONAL_LOG"></A><div class="Text_Header">Troubleshooting: using TextTest's internal logging</div>
<div class="Text_Normal">When TextTest doesn't do what you expect it to, the best way
to find out why is usually to enable its own internal logging mechanism
for the relevant aspect of the functionality. This is enabled
primarily by using the &ldquo;Write TextTest diagnostics&rdquo;
check box under &ldquo;Running&rdquo; and &ldquo;Advanced&rdquo;
tabs in the static GUI (-x option from the command line). 
</div>
<div class="Text_Normal">TextTest now uses the standard Python logging module
for its internal logging. To configure which loggers will output and
where they will do so, you will need to edit the logging
configuration file. The location of this is set by the field
&ldquo;Configure self-diagnostics from&rdquo;, in the same
location as above (-xr on command line). It defaults to 
&lt;your personal configuration directory&gt;/log/logging.debug (see <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=personalising_ui"; ?>">here</A> for where to find your personal configuration directory).
An initial file with everything disabled is provided with the TextTest source in
the "log" subdirectory, so you should start by copying this file to the above location.
</div>
<div class="Text_Normal">You can then open this file and look at the various loggers
in that file and enable any that seem to be related to your
problem, generally by uncommenting the "level" and "args" lines in the relevant section. 
Most loggers by default write a file alongside the logging.debug file in the location above, 
but of course you can configure it to write anywhere you like, either via the file
itself or from the static GUI tab given above. </div>
<div class="Text_Normal">
There also exist default files for batch mode, the console interface and the GUI.
If you wish to enable different logging for any of these modes "permanently", you
can just do the same thing, i.e. copy them to your personal configuration directory
and edit the copy there.
</div>
<div class="Text_Normal">
(If the above options are not set, TextTest will find the personal logging directory
from the environment variable TEXTTEST_PERSONAL_LOG,
but you probably won't need to set this variable, it's mainly for the self-tests)
</div>

<div class="Text_Normal">Some hints / examples:</div>
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
<div class="Text_Header">Getting a Python stack out if TextTest is hanging (on UNIX)</div>
<div class="Text_Normal">
Unfortunately Python doesn't have a native way to do this, and "pstack" and "strace" are
rather limited when it comes to Python. TextTest has its own mechanism, whereby
sending it SIGQUIT will cause it to write out the current stack.
</div>

<div class="Text_Header">If you're still stuck...</div>

<div class="Text_Normal">It's time to mail the <A class="Text_Link"  HREF="https://lists.sourceforge.net/lists/listinfo/texttest-users">TextTest mailing list at sourceforge</A>. We should be able to respond within a day or so.</div>
