<div class="Text_Main_Header">Testing a GUI with TextTest and a Use Case Recorder</div>

<div class="Text_Normal">This is a step-by-step guide to testing a GUI with texttest.
It assumes you have read and followed the instructions in the
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=install_texttest"; ?>">installation guide</A>. There is a fair
amount of overlap with the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=getting_started"; ?>">document
for getting started testing a non-GUI program</A>, so it can be
helpful to read that first.</div>

<div class="Text_Normal">We will use a simple PyGTK 'video store' program as an
example &ndash; which comes with the download of PyUseCase. Most
of what is said here should apply to any use case recorder,
though. Text in italics is background information only.</div>
<div class="Text_Header">Getting a Use Case Recorder working</div>
<div class="Text_Normal">The first step is to get your program using the <A class="Text_Link" href="index.php?page=ui_testing&n=xusecase">use
case recorder </A>of your choice, at least enough to be able to
create some simple scripts. If you have a PyGTK GUI, use
<A class="Text_Link" href="index.php?page=ui_testing&n=pyusecase_intro">PyUseCase</A>. If you
have a Java Swing GUI, use <A class="Text_Link" href="http://jusecase.sourceforge.net/">JUseCase</A>.
If you use another GUI toolkit &ndash; write your own use case
recorder and tell me about it! 
</div>

<div class="Text_Header"><A NAME="use_case_recorder"></A><A NAME="use_case_record_mode"></A><A NAME="USECASE_RECORD_SCRIPT"></A><A NAME="USECASE_REPLAY_SCRIPT"></A>
Creating an Application</div>
<div class="Text_Normal">First, create a directory and a config file as described in
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=getting_started"; ?>">guide for testing &ldquo;hello
world&rdquo;</A>. 
</div>
<div class="Text_Normal">For testing GUIs, you need some further entries in the config
file. In particular, you should add the line
'use_case_record_mode:GUI'. If you are using <A class="Text_Link" href="http://jusecase.sourceforge.net/">JUseCase</A>,
you also need to set 'use_case_recorder:jusecase'. This is
because JUseCase uses Java Properties files rather than
environment variables for its interface, so TextTest needs to
know to generate these. If it isn't set, it will set the environment
variables USECASE_RECORD_SCRIPT and USECASE_REPLAY_SCRIPT, which are
the variables PyUseCase reads from when deciding the relevant files to read and write. 
Other GUI simulation tools can of course easily be wrapped by a script that would read
the above variables and translate them into the format the simulation tool
expects.</div>
<div class="Text_Normal">
Setting 'use_case_recorder:none' is a useful trick if you want to enable the virtual display 
functionality described here but don't want to use a use-case recorder.</div>
<div class="Text_Header">Creating a Test</div>

<div class="Text_Normal">First, we create an &ldquo;empty test&rdquo; as for <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=getting_started"; ?>">&ldquo;hello
world&rdquo;</A>.</div>
<div class="Text_Normal">However, command line options are
not sufficient to define a GUI test. We also need to define the
use case that will be performed with the GUI. To do this, we go
to the &ldquo;Running&rdquo; tab and then the &ldquo;Recording&rdquo; 
subtab, and then click the &ldquo;Record Use-Case&rdquo; button
(or we just press F9 and don't bother with the tabs, as we aren't changing
any settings). This will start an instance of the dynamic GUI, as with running tests. 
This in turn fires up our Video Store GUI in record mode. We simply
perform the actions that constitute the use case, and then close
this GUI. 
</div>

<div class="Text_Normal">The dynamic GUI will then turn the
test red and highlight that it has collected new files for us.
By clicking this red-line in the test view we get the view
below. The contents of the new files can be seen in textual
format in the &ldquo;Text Info&rdquo; window, or viewed by
double-clicking them if they are too large.</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/guidyn.JPG" NAME="Graphic1" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR><BR>
</div>
<div class="Text_Normal">If we made a mistake recording, we should simply quit the
dynamic GUI at this point and repeat the procedure. If we are
happy with the recording we should save the results: press the
save button with the test selected.</div>
<div class="Text_Normal">Unless we disabled this from the
&ldquo;Record&rdquo; dialog at the start, TextTest will then
automatically restart it in replay mode, in order to collect the
output files. This operation is done invisibly as it is assumed
to always work &ndash; but (for example) PyUseCase produces
different text when replaying than when recording, and it is
that text we are interested in. It can be configured to also
happen via the dynamic GUI &ndash; this is useful if you don't
trust your recorder to replay what it has just recorded!
Messages in the status bar at the very bottom of the static GUI
keep you posted as to progress, anyway. When all is done, it
should look like this:</div>

<div class="Text_Normal"><img src="<?php print $basePath; ?>images/guitest.JPG" NAME="Graphic3" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR><BR>
</div>
<div class="Text_Normal">Note that the definition file is
now the usecase file recorded by PyUseCase. Naturally there
could be command line options as well if desired. This is much
the same as the final result of the &ldquo;hello world&rdquo;
set up.</div>
<div class="Text_Header"><A NAME="-actrep"></A><A NAME="slow_motion_replay_speed"></A><A NAME="USECASE_REPLAY_DELAY"></A><A NAME="TEXTTEST_XVFB_WAIT"></A><A NAME="virtual_display_machine"></A><A NAME="virtual_display_number"></A>
Running a Test</div>
<div class="Text_Normal">Clearly, there is no need to run it once in order to collect
the output as we did with &ldquo;hello world&rdquo;: this is
built into the &ldquo;Record use-case&rdquo; operation.
Currently, if we run the test, the GUI will pop up and the
actions will be performed as fast as possible. 
</div>

<div class="Text_Normal">On UNIX, TextTest will try to stop
the SUT's GUIs from popping up, by using the virtual display server Xvfb 
(a standard UNIX tool). For each run of the tests it will start such
a server, point the SUT's DISPLAY variable at it and close the server
at the end of the test. </div>
<div class="Text_Normal">
It will use its own process ID (modulo 32768) as the display number to guarantee 
uniqueness. After starting Xvfb, it will wait the number of seconds
specified by the environment variable "TEXTTEST_XVFB_WAIT" (30 by default) 
for Xvfb to report that it's ready to receive connections. If that doesn't happen,
for example because the display is in use, it will kill it and try again with
another display number.
</div>
<div class="Text_Normal">
If you only have Xvfb installed remotely, you can specify machines
via the config entry &ldquo;virtual_display_machine&rdquo;. This will
cause TextTest to start the Xvfb process on that machine if it isn't
possible to do so locally.
</div>
<div class="Text_Normal">On Windows, target GUIs are started with
the Windows flag to hide them, so a similar effect occurs. However, note 
that this operation is not recursive, so any dialogs, extra windows etc. 
that get started will (unfortunately) appear anyway. 
</div>

<div class="Text_Normal">We might want to examine the behaviour of the GUI for a test.
To do this, we set a default speed in the config file, using the
config file setting 'slow_motion_replay_speed:&lt;delay&gt;',
where &lt;delay&gt; is the number of seconds we want it to pause
between each GUI action. (This is translated to the environment variable
USECASE_REPLAY_DELAY which is forwarded to the system under test, or
the "delay" property if JUseCase is being used). For a particular run, we then select
&ldquo;slow motion replay mode&rdquo;, from the &ldquo;how to
run&rdquo; tab in the static GUI. This will force the GUI to pop
up for this run, whatever is set in the virtual_display_machine
entry.</div>
<div class="Text_Normal">In summary, our config file should look something like this:</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/guiconfig.JPG" NAME="Graphic4" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>

</div>
