<div class="Text_Main_Header">Guide to TextTest's Interfaces</div>
<div class="Text_Description"> Static GUI, Dynamic GUI, Console and Batch Mode</div>
				
<div class="Text_Header">Interactive Mode and Batch Mode</div>
<div class="Text_Normal">TextTest can be operated in two modes: <I>interactive mode</I>
which expects a user to be present and able to respond, and
<I>batch mode</I> which does not. <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=running_texttest_unattended"; ?>">Batch
mode</A> provides the test results in the form of an email
and/or HTML report. This document aims to describe the various
interactive modes. 
</div>

<div class="Text_Normal">Interactive mode now consists primarily of the PyGTK GUIs :
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=dynamic_gui"; ?>"><I>dynamic GUI</I></A>, for monitoring tests as they run, and
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=static_gui"; ?>"><I>static GUI</I></A>, for examining and changing test suites
and starting the dynamic GUI. The older console interface is
still present, and documented briefly below, though it is no longer being actively developed. 
</div>
<div class="Text_Header"><A NAME="default_interface"></A>Choosing an interactive mode</div>
<div class="Text_Normal">It is thus possible to operate with TextTest in any of three
ways: console only, dynamic GUI only (started from a command
prompt for each test run) or static and dynamic GUIs. These
possibilities have arisen in that order: TextTest was
traditionally a command-line UNIX script, indeed the very early
versions were actually Bourne shell scripts! It is generally
best to pick one of these approaches and stick to it: they are
more or less equivalent.</div>
<div class="Text_Normal">Newcomers to TextTest, unless opposed to GUIs in principle,
should generally use both the static and dynamic GUIs. This is
really how TextTest is meant to be used now (anyone on Windows
will find any other way of operating painful, probably). It can
still be useful to know about the other interfaces in case of
problems: they can help in error-finding because they are
simpler.</div>
<div class="Text_Normal">The &ldquo;default_interface&rdquo; config file setting can
be used to choose your preferred way of running. It can take the
values &ldquo;static_gui&rdquo;, &ldquo;dynamic_gui&rdquo; or
&ldquo;console&rdquo;, and defaults to the first of these. Any
interface can also be chosen on the command line, via the
options -gx, -g or -con respectively.</div>
<div class="Text_Normal">Note also that there are many ways in which TextTest's appearance
and default setup can be configured to suit your application or personal tastes. Find out
how <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=personalising_ui"; ?>">here</A>.
</div>

</div><div class="Text_Header">

<A NAME="-con"></A><A NAME="-n"></A><A NAME="-o"></A>The Console
Interface</div>
<div class="Text_Normal">This is started if the &ldquo;-con&rdquo; option is provided,
or if &ldquo;default_interface&rdquo; is set to &ldquo;console&rdquo;.
It is simpler and much more restricted than the GUIs.</div>
<div class="Text_Normal">Essentially, it will run each test in turn, and if it fails,
will ask whether you wish to view the differences, save it, or
continue. Viewing the differences will write a (truncated) text
version of all file differences to the standard output, and will
start the graphical difference viewer on the file specified by
the config file entry &ldquo;log_file&rdquo; (the standard
output of the SUT, by default). Saving works much like from the
dynamic GUI, except that there is no possibility to save single
files or multiple tests at the same time (but see below).
Continuing will do nothing and leave everything in place.</div>

<div class="Text_Normal">There are a couple of command-line options relevant to the
console interface only, both related to saving. Specifying &ldquo;-o&rdquo;
will cause all files judged different to be overwritten (the
equivalent of the GUI &ldquo;Save&rdquo; button applied to all
tests, except you have to decide before the run starts). The
&ldquo;-n&rdquo; option will cause all files regarded as the
same to be updated: a way of updating the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=file_collation_and_text_filtering"; ?>#run_dependent_text">run
dependent text</A> contained in them. Specifying both these
options will cause all files to be updated, regardless of what
happens.</div>
