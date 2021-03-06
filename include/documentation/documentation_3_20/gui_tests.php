<div class="Text_Main_Header">Testing a GUI with TextTest and a Use Case Recorder</div>

<div class="Text_Normal">This is a step-by-step guide to testing a GUI with texttest.
It assumes you have read and followed the instructions in the
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=install_texttest"; ?>">installation guide</A>. There is a fair amount of overlap with the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=getting_started"; ?>">document for getting started testing a non-GUI program</A>, so it can be
helpful to read that first.</div>

<div class="Text_Normal">We will use a simple PyGTK GUI as an
example. This is also Exercise 4 in the course material so if you want to follow this it's 
suggested you download it from <A class="Text_Link" HREF="files/texttest_course.zip">here</A>. 
Unzip it and then set the environment variable TEXTTEST_HOME to point at its "tests" directory. Much
of what is said here should apply to any use case recorder,
though. Text in italics is background information only. Naturally you need to install PyUseCase 3.x
or newer from <A class="Text_Link" href="http://sourceforge.net/projects/pyusecase">SourceForge</A> also
before this will work.
</div>
<div class="Text_Normal"><I>For Java GUIs, look at <A class="Text_Link" href="http://jusecase.sourceforge.net/">JUseCase</A>. If you are using Microsoft's .net, use <A class="Text_Link" href="http://nusecase.sourceforge.net/">NUseCase</A>.
If you use another GUI toolkit &ndash; write your own use case recorder and tell me about it!</I>
</div>

<div class="Text_Header"><A NAME="use_case_recorder"></A><A NAME="use_case_record_mode"></A><A NAME="USECASE_RECORD_SCRIPT"></A><A NAME="USECASE_REPLAY_SCRIPT"></A>
Creating an Application</div>
<div class="Text_Normal">First, create an initial application by running "texttest.py --new" as described in
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=getting_started"; ?>">guide for testing &ldquo;hello world&rdquo;</A>. The main difference is that you should select "PyUseCase 3.x" from the GUI testing options! The application creation dialog should look something like this just before you press "OK":
</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/createguiapp.png" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>
</div>
<div class="Text_Normal"><I>
The GUI-testing options drop-down list tries to cover all the bases, and will set the "use_case_record_mode" and "use_case_recorder" config file settings in your config file as necessary. If you choose "Other embedded use-case recorder", TextTest will set the environment variables USECASE_RECORD_SCRIPT and USECASE_REPLAY_SCRIPT to the relevant locations, which are
the variables PyUseCase reads from when deciding the relevant files to read and write. 
Other GUI simulation tools can of course easily be wrapped by a script that would read
the above variables and translate them into the format the simulation tool
expects.</I>
</div>
<div class="Text_Header">Creating and Recording a Test</div>

<div class="Text_Normal">First, we create an &ldquo;empty test&rdquo; as for <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=getting_started"; ?>">&ldquo;hello
world&rdquo;</A>.</div>
<div class="Text_Normal">However, command line options are
not sufficient to define a GUI test. We also need to define the
use case that will be performed with the GUI. To do this, we select 
&ldquo;Record Use-Case&rdquo; from the Actions menu
(or press "F9"). This will fire up the record dialog, where we can just click OK. This will now 
start an instance of the dynamic GUI, as with running tests. 
This in turn fires up our PyGTK bug system GUI with PyUseCase in record mode. We simply
perform the actions that constitute the use case (in this case select some rows, click some of
the toggle buttons at the bottom and sort some columns), and then close
this GUI.</div>
<div class="Text_Normal">
When we close the GUI, PyUseCase informs us that we have performed some actions it does not yet have names for. So it produces a dialog for us to fill in with appropriate names. We try to decipher which rows correspond to which things we did based on the widget types, identifiers and descriptions of the actions performed that it gives us. This information then goes into our "UI map file", while the names themselves form the "usecase" on which the test is based, which you can see previewed in the lower window as you type. For example, we might choose some names something like this.<I>
(If you leave any item blank, PyUseCase concludes that you are not interested in this event and will not record it in the future)</I>
</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/pyusecase_dialog.png" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>
</div>
<div class="Text_Normal"></div>
<div class="Text_Normal">The dynamic GUI will then turn the
test red and highlight that it has collected new files for us.
By clicking this red-line in the test view we get the view
below. The contents of the new files can be seen in textual
format in the &ldquo;Text Info&rdquo; window by single-clicking them (as shown), 
or viewed by double-clicking them if they are too large. The "usecase.bugs" file provides
a description of what we did, while the "stdout.bugs" file provides PyUseCase's auto-generated description of what the GUI looked like while we were doing it.
</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/guitest.png" NAME="Graphic1" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>
</div>
<div class="Text_Normal">If we made a mistake recording, we should simply quit the
dynamic GUI at this point and repeat the procedure (the names we entered for PyUseCase
will still be kept). If we are happy with the recording we should save the results: press the
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

<div class="Text_Normal"><img src="<?php print $basePath; ?>images/guitest_static.png" NAME="Graphic3" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>
</div>
<div class="Text_Normal">Note that the "definition file" is
now the usecase file recorded by PyUseCase. Naturally there
could be command line options as well if desired. This is much
the same as the final result of the &ldquo;hello world&rdquo;
set up.</div>
<div class="Text_Normal">
If we visit the "Config" tab to the right we will now found both
a TextTest config file and a PyUseCase config file "ui_map.conf",
under "pyusecase_files". If you fire this up by double-clicking it,
you can see that it essentially contains the information you entered
before. When the GUI changes we will need to edit this file, but hopefully
we can minimise changes in the tests themselves.</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/uimap.png" NAME="Graphic3" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>
</div><div class="Text_Normal"><I>
PyUseCase identifies widgets by name, title, label and type, in that order. Obviously here we are identfiying the main tree view by its type alone, which will break down as soon as the UI contains another one. Likewise, the title of our window might vary from run to run. For robustness it's therefore often necessary to assign widget names in your code, at which point this file should be updated with "Name=Bug tree view" instead of "Type=TreeView".</I>
</div>
<div class="Text_Header">Running a Test</div>
<div class="Text_Normal">Clearly, there is no need to run it once in order to collect
the output as we did with &ldquo;hello world&rdquo;: this is
built into the &ldquo;Record use-case&rdquo; operation.
Currently, if we run the test, the GUI will pop up and the
actions will be performed as fast as possible. </div>
<div class="Text_Normal">
If you have many GUI tests, it naturally becomes somewhat annoying
if hundreds of windows keep popping up all the time, it makes it difficult
to use your computer for anything else while the tests are running. This
can be mitigated by running the tests on a different desktop or e.g. against
a VNC server. TextTest however also has builtin means to do this and save
you the trouble. These mechanisms are platform specific and are described below.
</div>
<div class="Text_Header"><A NAME="TEXTTEST_XVFB_WAIT"></A><A NAME="virtual_display_machine"></A><A NAME="virtual_display_extra_args"></A>Hiding the SUT's windows (UNIX)</div>
<div class="Text_Normal">All that is required for this to work is for the standard
UNIX tool "Xvfb" to be installed. For each run of the tests it will start such
a server, point the SUT's DISPLAY variable at it and close the server
at the end of the test. This mechanism makes it possible to run GUI tests in parallel
using e.g. SGE as no displays are shared between tests.</div>
<div class="Text_Normal">
Ordinarily, it will run it like this
<?php codeSampleBegin() ?>
Xvfb -ac -audit 2 :&lt;display number&gt;
<?php codeSampleEnd() ?>
but you can supply additional arguments via the setting "virtual_display_extra_args"
which will appended before the display number.
</div>
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
<div class="Text_Header"><A NAME="virtual_display_hide_windows"></A>Hiding the SUT's windows (Windows)</div>
<div class="Text_Normal">On Windows, the SUT is started with
the Windows flag to hide it, so a similar effect occurs. However, note 
that this operation is not recursive, so any dialogs, extra windows etc. 
that get started will (unfortunately) appear anyway. </div>
<div class="Text_Normal">
Occasionally, hiding the GUI like this seems to cause problems. Tk-based
GUIs seem to ignore the flag anyway while e.g. wxPython GUIs seem to seize
up sometimes. To disable the window hiding altogether, you can set
<?php codeSampleBegin() ?>
virtual_display_hide_windows:false
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header"><A NAME="-actrep"></A><A NAME="slow_motion_replay_speed"></A><A NAME="USECASE_REPLAY_DELAY"></A>Slow Motion Replay</div>
<div class="Text_Normal">We might want to examine the behaviour of the GUI for a test.
To do this, we set a default speed in seconds, for example
<?php codeSampleBegin() ?>
slow_motion_replay_speed:2
<?php codeSampleEnd() ?>
and then select "Run with slow motion replay" from the "Running" tab in the static GUI
when we run the test. This will cause the replay to wait 2 seconds between replaying each GUI action.
It will also cause the above window-hiding mechanisms to be disabled, naturally.
</div>
<div class="Text_Normal">
This is translated to the environment variable USECASE_REPLAY_DELAY which is 
forwarded to the system under test. PyUseCase and nUseCase both use this variable.
In the case of Java and JUseCase it is translated to the "delay" Java property.
Naturally for other tools a small wrapper script can be used to translate this into
whatever the tool requires.
</div>
<div class="Text_Header">A sample config file for GUI testing</div>
<div class="Text_Normal">In summary, our config file could look something like this:</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/guiconfig.png" NAME="Graphic4" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>

</div>
