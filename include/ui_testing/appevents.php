<div class="Text_Header">Multi-threaded simulation using Application Events</div>				
<div class="Text_Description">Allowing recording and replaying of waits</div>				
<div class="Text_Normal">A typical GUI application has the requirement of instant
  response to its user at all times. It cannot just lock up while
  some background processing (e.g. loading in a large amount of
  data) is done. Many applications therefore do significant work in the background.</div>

<div class="Text_Normal">
  When we replay a test without human intervention, it may well
  be necessary to wait for things to happen before proceeding.
  Otherwise the test will fail because further use case actions
  rely on data loaded in a separate thread being present. Sometimes the control
  we want to use is not available until the background processing is complete -
  in this case we can simply wait until it is, but this is not always the case.
</div>
<div class="Text_Normal">
  In this situation a traditional recording tool can do one of three things:
  <ol>
    <li>It can insert a sleep based on how long the user waited
    <li>It can record waits for everything that ever changes in the GUI
    <li>It can rely on the user fixing up the recorded script somehow after the fact.
  </ol>
  None of which are very good, because
  <ol>
    <li>With sleeps, you typically need 10 times the time you expect for reliability. This means you either get very slow tests or very unreliable ones.
    <li>If you wait for everything that ever changes, 99% of it is irrelevant and clogs up the script with stuff that is waiting to break.
    <li>This requires that the user both know it is necessary and know what to do, and have the skills to do this in a reliable way.
  </ol>
</div>
<div class="Text_Normal">StoryText handles this situation by involving the development team and instrumenting the code.
  By relatively simple instrumentation we can fix the synchronisation for all tests past, present and future, and we can
  make the waiting robust by talking in semantic terms instead of for example waiting for progress bars to appear and then disappear.
</div>
<div class="Text_Normal">
  We therefore introduce the notion of an `application event': the application can simply
  notify StoryText when a significant event has
  occurred that is worth waiting for. At places in the code where
  such events occur, the programmer adds calls to StoryText (in Python code) or
  generates an event (in Java code), which will then record a `wait
  for &lt;name of application event&gt;' command to the usecase it is recording.
  During replay it will simply not replay any further events until the application
  reaches the same point, i.e. when the same call is made. A single simple call
  can therefore be used for both purposes.</div>
<div class="Text_Normal">So, StoryText recording with application events looks like
  this:</div>
<div class="Text_Normal"><img src="include/ui_testing/images/xusecaserec.jpg" NAME="Graphic1" ALIGN=LEFT WIDTH=500 HEIGHT=152 BORDER=0><BR CLEAR=LEFT>Replaying,
					with application events, looks like this:
  <img src="include/ui_testing/images/xusecaserep.jpg" NAME="Graphic4" ALIGN=LEFT WIDTH=498 HEIGHT=110 BORDER=0><BR CLEAR=LEFT>
  
</div><HR>
<div class="Text_Normal">Now for an example. Assume we have the following use case
  script:</div>
<div class="Text_Normal">
<?php codeSampleBegin(); ?>
<I>load movie data into list</I>
<I>select movie Die Hard</I>
<?php codeSampleEnd(); ?>
</div>
<div class="Text_Normal">
  Also assume that the first command starts a separate thread that
  loads a large amount of data from a database and displays it on
  the screen. Unless there is a way of telling the replayer when
  this has completed, it would perhaps try to select `Die Hard'
  as soon as that item was present in the list, and the subsequent test may
  assume that all the data was present to get the right answer. To solve this, 
  the programmer finds the point in his application
  directly after the loading is completed and inserts the following code :
<?php codeSampleBegin(); ?>
import storytext
storytext.applicationEvent('data to be loaded')
<?php codeSampleEnd(); ?>
if they are writing a Python GUI or
<?php codeSampleBegin(); ?>
import org.eclipse.swt.widgets.Event;

Event event = new Event();
event.text = "data to be loaded";
someWidget.notifyListeners(1234, event);
<?php codeSampleEnd(); ?>
if they are writing an SWT/Eclipse RCP GUI in Java. (There is a third form for 
<a href="index.php?page=ui_testing&n=storytext_and_swing">Swing GUIs</A>)
Either way, the recorded use case will now look like this:</div>
<div class="Text_Normal">
<?php codeSampleBegin(); ?>
<I>load movie data into list</I>
<I>wait for data to be loaded</I>
<I>select movie Die Hard</I>
<?php codeSampleEnd(); ?>
</div>
<div class="Text_Normal">
  In record mode the applicationEvent method just records the
  'wait for' command to the script file when it is called, as
  shown here: 
</div>
<div class="Text_Normal"><BR><BR>
</div>
<div class="Text_Normal"><img src="include/ui_testing/images/appeventrec.jpg" NAME="Graphic3" ALIGN=LEFT WIDTH=500 HEIGHT=205 BORDER=0><BR CLEAR=LEFT>In
  replay mode, the simulator (or replayer) halts replaying on
  reading this 'wait for' command, and the applicationEvent call
  then acts as a notifier to tell it to resume when the data has
  been loaded.</div>

<div class="Text_Normal"><img src="include/ui_testing/images/appeventrep.JPG" NAME="Graphic5" ALIGN=LEFT WIDTH=495 HEIGHT=249 BORDER=0><BR CLEAR=LEFT><BR>
</div>
<div class="Text_Normal">
To see how this works in practice, look at the <A class="Text_Link" href="index.php?page=ui_testing&n=storytext_appevents">relevant StoryText documentation</A>.
</div>
