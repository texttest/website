<div class="Text_Main_Header">Using StoryText with Java Swing UIs</div>
<div class="Text_Header">Supported platforms</div>
<div class="Text_Normal">
It is tested regularly and works fully on Linux and Windows. Status on the Mac is at best problematic, there are serious Mac-specific bugs in recent versions of GTK, which will hinder the use of the editor and of TextTest.
</div>
<div class="Text_Header">Installing StoryText and Jython</div>
<div class="Text_Normal">
On Windows, you should install Java if you haven't already done so, and then run the Windows installer from the <A class="Text_Link" HREF="http://sourceforge.net/projects/pyusecase">sourceforge page</A>. Note you will need to be connected to the internet while running this installer. 
</div>
<div class="Text_Normal">
On Linux, you probably already have Python and PyGTK, so you will need to do the following:
<ol>
<li>Install <A class="Text_Link" HREF="http://www.jython.org/download.html">Jython</A>
<li>Download and unpack the tarball from the <A class="Text_Link" HREF="http://sourceforge.net/projects/pyusecase">sourceforge page</A>
<li>From its source directory, run first "python setup.py install" and then "jython setup.py install"
<li>Ensure the bin directory of both your installations created above is added to your PATH, with the Jython one coming first.
<li>Test this from the command line: "which storytext" should return the one in your Jython installation, while "which storytext_editor" should return the one in your Python installation.
</ol>
(You can also use "pip" to install StoryText directly from PyPI without downloading the tarball, but then you have to install pip under Jython or use "virtualenv" to create a separate jython environment containing "pip")
</div>
<div class="Text_Header">Handling RobotFramework SwingLibrary</div>
<div class="Text_Normal">
StoryText support for Swing is based on the tool <A class="Text_Link" HREF="https://github.com/robotframework/SwingLibrary/downloads">SwingLibrary</A>, which has been developed as part of RobotFramework. Since StoryText 3.8 this is now packaged with the StoryText download. If running StoryText alone you will however need to add it to your CLASSPATH environment variable, it can be found under lib/storytext/javaswingtoolkit. If using StoryText with TextTest (recommended) it will work this out for you.
</div>
<div class="Text_Header">Trying things out</div>
<div class="Text_Normal">
RobotFramework SwingLibrary contains an example application which you can try out, as well as the PyGTK one described <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_intro">here</A>. To record a usecase for it, do this (having first added the SwingLibrary jar to your CLASSPATH)
<?php codeSampleBegin() ?>
storytext -i javaswing -r usecase.txt \
  org.robotframework.swing.testapp.examplesut.TodoListApplication
<?php codeSampleEnd() ?>
(Note that StoryText does not understand jar files directly currently. If your app is a jar file, find out the name of its main-class from the manifest file, add the jar to your classpath, and use the main-class name as above. If using TextTest you can just select the jar file and it will do this for you, since TextTest 3.24)</div>
<div class="Text_Normal">
From there, you can follow the <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_intro">intro</A> in a similar way to if you were using the PyGTK example.
</div>
<div class="Text_Header">Widget Naming</div>
<div class="Text_Normal">
StoryText has various ways to identify widgets in a Swing app. These are, in order of preference
<UL>
<LI>The text on the widget, if it isn't editable
<LI>The text on any Label immediately preceding the widget in its parent container
<LI>The tooltip on the widget
<LI>The type of the widget
</UL>
The hope is to find a unique way of identifying the widget based on this information, so that it can be referenced in the <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_intro#ui_map_file">UI map file</A>. There will however exist some cases where this isn't sufficient to identify a widget, for example if the widget is only identified by type, or the text isn't unique, or it changes depending on e.g. today's date. In these cases the widget needs to be named explicitly in the code, and it's fair to say that most non-trivial applications will need to name at least some widgets before StoryText will work smoothely.</div>
<div class="Text_Normal">
To do this, you simply add a call like this in your code:
<?php codeSampleBegin() ?>
widget.setName("My Widget");
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header"><A name="appevents"></A>Application events</div>
<div class="Text_Normal">(See <A class="Text_Link" href="index.php?page=ui_testing&n=appevents">here</A>
for an explanation of what an Application Event is: the basic idea is to support
synchronisation by recording and reading of "waits")></I>
</div>
<div class="Text_Normal">
From a Java app, it isn't very easy to import a Python module and call the code there directly, so there is a different interface to the one described <A class="Text_Link" href="index.php?page=ui_testing&n=storytext_appevents">here</A> for the Python toolkits. The following class is provided as an example, something similar can be added to your codebase and the "sendApplicationEvent" method called as appropriate:

<?php codeSampleBegin() ?>

import java.awt.Component;
import java.awt.Toolkit;
import java.awt.event.MouseEvent;

import javax.swing.JComponent;

/**
 * Class for firing "application events" that can be picked up by StoryText.
 * 
 */
public class ApplicationEventManager {
	
    private static ApplicationEventManager instance = new ApplicationEventManager();
    private static Component dummyComponent = new JComponent(){};
    public static ApplicationEventManager getInstance() {
        return instance;
    }

    private ApplicationEventManager() {
    }
    
    public void sendApplicationEvent(final String message) {
    	Toolkit.getDefaultToolkit().getSystemEventQueue().
          postEvent(new ApplicationEvent(dummyComponent, message));
    }
    
    public static class ApplicationEvent extends MouseEvent {
    	private String applicationEventMessage;
	public ApplicationEvent(Component source, String aMessage) {
            super(source, MouseEvent.MOUSE_PRESSED, 0, 0, 0, 0, 0, false);
            applicationEventMessage = aMessage;
	}
    	
        public String getApplicationEventMessage() {
            return applicationEventMessage;
        }
    }
}


<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal">
The name provided in the "message" argument will then be placed after "wait for " in the usecase files when the event is recorded, so choose something that makes sense in that context, e.g. "data to be loaded". </div>
<div class="Text_Normal">
If several such events follow each other, they will overwrite each other, i.e. only the last one will be recorded.
</div>
