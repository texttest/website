<div class="Text_Main_Header">Using StoryText with SWT/Eclipse RCP/GEF</div>
<div class="Text_Header">Supported platforms</div>
<div class="Text_Normal">
It is tested regularly and works fully on Linux and Windows. It currently does not work under Cocoa on the Mac: the reason is that the SWTBot headless test runner, on which it depends, runs the UI in a non-main thread which Cocoa does not support. The suggested workaround from the SWTBot project is to use Carbon instead. However, there are also serious GTK bugs for the Mac, which will hinder the use of TextTest and the StoryText editor, so in general, Mac support is not in a very good place right now.
</div>
<div class="Text_Normal">
GEF support is maturing in version 3.8 but is still less mature than ordinary SWT/Eclipse RCP support, you will likely have to write your own custom plugin to get the most out of it.
</div>
<div class="Text_Header">Installing StoryText and Jython</div>
<div class="Text_Normal">
<div class="Text_Normal">
On Windows, you should install Java if you haven't already done so, and then run the Windows installer from the <A class="Text_Link" HREF="http://sourceforge.net/projects/pyusecase">sourceforge page</A>. Note you will need to be connected to the internet while running this installer. 
</div>
<div class="Text_Normal">
On Linux, you probably already have Python and PyGTK, so you will need to do the following:
<ol>
<li>Install <A class="Text_Link" HREF="http://www.jython.org/download.html">Jython</A>.<b>NOTE!</b>, if using Eclipse RCP, you must use Jython 2.5.1, there are problems with newer versions.
<li>Download and unpack the tarball from the <A class="Text_Link" HREF="http://sourceforge.net/projects/pyusecase">sourceforge page</A>
<li>From its source directory, run first "python setup.py install" and then "jython setup.py install"
<li>Ensure the bin directory of both your installations created above is added to your PATH, with the Jython one coming first.
<li>Test this from the command line: "which storytext" should return the one in your Jython installation, while "which storytext_editor" should return the one in your Python installation.
</ol>
(You can also use "pip" to install StoryText directly from PyPI without downloading the tarball, but then you have to install pip under Jython or use "virtualenv" to create a separate jython environment containing "pip")
</div>
<div class="Text_Header">Installing SWTBot</div>
<div class="Text_Normal">
StoryText support for SWT and Eclipse RCP is based on the tool <A class="Text_Link" HREF="http://www.eclipse.org/swtbot/downloads.php">SWTBot</A> which you will also need to install. For plain SWT it is sufficient to install it "normally", 
i.e. as recommended by the SWTBot project on their site. Installing it as for RCP (below) will also work.
</div>
<div class="Text_Normal"> 
For Eclipse RCP apps, it is necessary to install an additional "bridge" module so StoryText and SWTBot can work together. This is known as org.eclipse.swtbot.testscript, but is currently maintained by the StoryText project (though in theory it could be used by anyone attempting to use a dynamic language with SWTBot). The recommended way to do this is to use the "p2 director" to install it under your product. For Eclipse 3.6, use a command as shown below. (<b>NOTE!</b> In reality, do not use linebreaks between the different repositories, it is formatted like this below just to prevent an excessively wide display.)
<?php codeSampleBegin() ?>
eclipse \
-application org.eclipse.equinox.p2.director \
-repository http://texttest.carmen.se/swtbot_testscript/3.6,
http://download.eclipse.org/technology/swtbot/helios/dev-build/update-site/,
http://download.eclipse.org/eclipse/updates/3.6 \
-installIU org.eclipse.swtbot.testscript \
-consoleLog \
-debug \
-destination &lt;path_to_your_product&gt; \
-profile profile \
-noSplash
<?php codeSampleEnd() ?>
For newer versions of Eclipse, please adjust the above command to the versions. We have no 3.7 repository
for the "testscript" module, but the 3.6 one should work. Note that "helios" in the second repository
needs to be switched for e.g. "indigo".
For Eclipse 3.5, use the same command, except for the repository paths
<?php codeSampleBegin() ?>
-repository http://texttest.carmen.se/swtbot_testscript/3.5,
http://download.eclipse.org/technology/swtbot/galileo/dev-build/update-site/,
http://download.eclipse.org/eclipse/updates/3.5 \
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header">Usage with GEF applications (from StoryText 3.7)</div>
<div class="Text_Normal">
Installation should be as above, except the "-installIU" argument needs to be changed so that it uses
"org.eclipse.swtbot.gef.testscript" instead, and a suitable GEF repository provided. I.e. something like this:
<?php codeSampleBegin() ?>
eclipse \
-application org.eclipse.equinox.p2.director \
-repository http://texttest.carmen.se/swtbot_testscript/3.6,
http://download.eclipse.org/technology/swtbot/helios/dev-build/update-site/,
http://download.eclipse.org/tools/gef/updates-pre-3_8/releases/,
http://download.eclipse.org/eclipse/updates/3.6 \
-installIU org.eclipse.swtbot.gef.testscript \
-consoleLog \
-debug \
-destination &lt;path_to_your_product&gt; \
-profile profile \
-noSplash

<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal">
It's reasonably likely that you will need to write your own customwidgetevents.py (see <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_customwidgets">section on custom widgets</A>) to be able
to use StoryText effectively on a GEF application. The reason is that the GEF EditParts (figures) are by their nature hard to 
describe and index in a good way generically. For example the drag+drop support will record pixel positions and it's
likely you'll want to tweak this to be able to record and playback something from your domain.
</div>
<div class="Text_Normal">
Supported operations over and above the normal SWT ones are essentially selecting the figures and dragging and dropping them,
and of course describing their appearance (including coloured regions etc). Also using context menus attached to them should work. 
</div>
<div class="Text_Header">Widget Naming</div>
<div class="Text_Normal">
StoryText has various ways to identify widgets in an SWT app. These are, in order of preference
<UL>
<LI>The text on the widget, if it isn't editable
<LI>The text on any Label immediately preceding the widget in its parent container
<LI>The tooltip on the widget
<LI>The ID of the View in which the widget appears (RCP only)
<LI>The type of the widget
</UL>
The hope is to find a unique way of identifying the widget based on this information, so that it can be referenced in the <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_intro#ui_map_file">UI map file</A>. There will however exist some cases where this isn't sufficient to identify a widget, for example if the widget is only identified by type, or the text isn't unique, or it changes depending on e.g. today's date. In these cases the widget needs to be named explicitly in the code, and it's fair to say that most non-trivial applications will need to name at least some widgets before StoryText will work smoothely.</div>
<div class="Text_Normal">
The mechanism for this is inherited from SWTBot, and works in the same way as if you were using that tool alone. You simply add a call like this in your code:
<?php codeSampleBegin() ?>
widget.setData("org.eclipse.swtbot.widget.key", "My Widget");
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header"><A name="appevents"></A>Application events</div>
<div class="Text_Normal">(See <A class="Text_Link" href="index.php?page=ui_testing&n=appevents">here</A>
for an explanation of what an Application Event is: the basic idea is to support
synchronisation by recording and reading of "waits")></I>
</div>
<div class="Text_Normal">
From a Java app, it isn't very easy to import a Python module and call the code there directly, so there is a different interface to the one described <A class="Text_Link" href="index.php?page=ui_testing&n=storytext_appevents">here</A> for the Python toolkits. The basic idea is to do as follows:
<?php codeSampleBegin() ?>
Event event = new Event();
event.text = "completion of background process";
widget.notifyListeners(1234, event);
<?php codeSampleEnd() ?>
"widget" here can be any widget at all. "1234" is just a convention to avoid colliding with real Eclipse RCP events.</div>
<div class="Text_Normal">
The name provided in "event.text" will then be placed after "wait for " in the usecase files when the event is recorded,
so choose something that makes sense in that context, e.g. "data to be loaded". </div>
<div class="Text_Normal">
If several such events follow each other, they will overwrite each other, i.e. only the last one will be recorded.
</div>
<div class="Text_Header">Jobs in Eclipse RCP</div>
<div class="Text_Normal">
Eclipse has its own "job" mechanism defined in the package "org.eclipse.core.runtime.jobs" and many background tasks use that mechanism.
StoryText will in this case add its own job listeners and will generate application events automatically when a user-defined Job completes, so no instrumentation of the type described above is needed in this case.
</div>
