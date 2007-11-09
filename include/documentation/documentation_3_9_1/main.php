<div class="Text_Header">Overview of the Documentation</div>

<div class="Text_Normal">You should start by working
through the <a class="Text_Link" href="index.php?page=<?php echo $version ?>&n=install_texttest">installation guide</a>, naturally. After this it is
recommended that you work through one or both of the tutorials,
this should give you a feel for basic TextTest usage. 
</div>
<div class="Text_Normal">The user guide material is a
little bit more theoretical. However, it is generally useful to
browse the first two or three documents to help gain a high
level view of how TextTest works and how to configure it. These
describe the basic details of building test suites and running
tests.</div>
<div class="Text_Normal">The User Interfaces guide is
there as a complete guide to the GUIs, which are more
configurable than you might imagine. Read it if understanding
the GUI isn't going too well...</div>
<div class="Text_Normal">The rest is mostly summaries of
additional features of TextTest. It can be worth reading just
the introduction to each of these to see if the features seems
like something that would be useful to you. Reading further is
probably only useful if they are.</div>

<div class="Text_Normal">Besides being a
standalone tool, TextTest is also a framework written in the
<A class="Text_Link"  class="Text_Link" HREF="http://www.python.org/">Python language</A>. If you are
a Python programmer (or have access to one) it is probably worth
browsing the framework documentation.</div>

<div class="Text_Header"><A class="Text_Link"  NAME="-x"></A><A class="Text_Link"  NAME="-xr"></A><A class="Text_Link"  NAME="-xw"></A>Troubleshooting
: using the self-diagnostics</div>
<div class="Text_Normal">When TextTest doesn't do what you expect it to, the best way
to find out why is usually to enable its own logging mechanism
for the relevant aspect of the functionality. This is enabled
primarily by using the &ldquo;Write TextTest diagnostics&rdquo;
check box under &ldquo;Running&rdquo; and &ldquo;Advanced&rdquo;

tabs in the static GUI (-x option from the command line). 
</div>
<div class="Text_Normal">TextTest uses <A class="Text_Link"  HREF="http://www.its4you.at/english/log4py.html">log4py</A>
for its own logging. To configure which loggers will output and
where they will do so, you will need to edit the log4py
configuration file. The location of this is set by the field
&ldquo;Configure self-diagnostics from&rdquo;, in the same
location as above (-xr on command line). It defaults to
$TEXTTEST_HOME/Diagnostics/log4py.conf, and an initial file with
everything disabled is provided with the TextTest download in
this location (where the &ldquo;tests&rdquo; subdirectory is set
as $TEXTTEST_HOME.) 
</div>
<div class="Text_Normal">You can then open this file and look at the various loggers
in that file and enable any that seem to be related to your
problem, generally by changing the &ldquo;LogLevel&rdquo; to
&ldquo;Normal&rdquo; for it. Most loggers by default  write a
file to $TEXTTEST_HOME/Diagnostics, but of course you can
configure it to write anywhere you like, either via the file
itself or from the static GUI tab given above. 
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
<div class="Text_Header">Support</div>

<div class="Text_Normal">Please mail the <A class="Text_Link"  HREF="https://lists.sourceforge.net/lists/listinfo/texttest-users">TextTest
mailing list at sourceforge</A>.</div>
				

