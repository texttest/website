<!--TITLE:Develop PAGEINFO:Develop Texttest PATH:page=develop-->
<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Developing StoryText</div>
   <div class="Text_Header">Overview</div>
   <div class="Text_Normal">
     StoryText is a work in progress and it doesn't support everything you could ever do in the various GUI toolkits. 
     It supports what its users have needed so far, and there is a complete list of what is currently supported here for 
     <a class="Text_Link" href="index.php?page=ui_testing&n=storytext_supported_gtk">PyGTK</A>, 
     <a class="Text_Link" href="index.php?page=ui_testing&n=storytext_supported_tkinter">Tkinter</A>, 
     <a class="Text_Link" href="index.php?page=ui_testing&n=storytext_supported_wx">wxPython</A>,
     <a class="Text_Link" href="index.php?page=ui_testing&n=storytext_supported_swt">SWT/Eclipse RCP</A> and
     <a class="Text_Link" href="index.php?page=ui_testing&n=storytext_supported_swing">Swing</A> respectively. 
     You are therefore reasonably likely to find that some widget in your application isn't supported, and you are of course 
     encouraged to submit any changes you make back here. 
   </div>
   <div class="Text_Header">Checking out the latest version of the code</div>
   <div class="Text_Normal">
     The code is hosted in Bazaar on Launchpad. Some instructions for checking it out are on <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_download">the download page</A>. 
   </div>   
   <div class="Text_Header">Running the self-tests</div>
   <div class="Text_Normal">
     Check out the self-tests via "bzr branch lp:/~geoff.bache/storytext/selftest-trunk". 
   </div>
   <div class="Text_Normal">
     The self-tests expect you to set TEXTTEST_HOME to the parent directory of your branch, they can then live alongside other 
     tests you write in a single directory structure if you want to set it up like that. 
   </div>
   <div class="Text_Normal">
     On UNIX, you probably want to make sure you have Xvfb installed, otherwise you'll get lots of GUIs popping up on your screen. 
   </div>
   <div class="Text_Normal">
     The tests assume that the source to be tested can be found in the location $TEXTTEST_HOME/../StoryText. If you put them 
     somewhere else you'll need to tell it this. This is controlled by the setting in the file default_site/site_configfile in the 
     tests: you can either edit this locally or preferably, copy the file to site/site_configfile and edit it there, where it will 
     be read instead of the default_site location. This also means it won't show up as a change when you check status in Bazaar. 
     You can also make other locally-relevant configuration changes for the tests in that file.
   </div>
   <div class="Text_Normal">
     Note that StoryText is only runnable directly from its source tree when used on Python GUIs on Linux now. On Windows, or with 
     Java GUIs, it will need to be installed using a command like 'python setup.py install' or 'jython setup.py install' respectively.
     Doing this after every edit is something of a pain, so we suggest making use of <A class="Text_Link" HREF="http://www.virtualenv.org">virtualenv</A>.
     You can then create yourself a new clean installation and install a link to your source location there, and edits will
     automatically be used. For example, to set up a jython development environment on Linux, you might do
<?php codeSampleBegin() ?>
$ jython virtualenv.py ~/.local/jython
$ export PATH=~/.local/jython/bin:$PATH
$ pip install -e &lt;path_to_storytext_source&gt;
<?php codeSampleEnd() ?>
     You can then set your tests to run the location ~/.local/jython, and you won't need to run the install command all the time.
   </div>
   <div class="Text_Normal">
     We make every effort to ensure that the self-tests are always green. If they fail on the current source for you, the first 
     thing to do is to check their <A class="Text_Link" HREF="index.php?page=nightjob">status in the nightjob</A>. This page is 
     updated nightly with the result of test runs on Linux and Windows using different GTK versions. If something is failing you 
     can check in the nightjob history to see if it is also failing there.
   </div>
   <div class="Text_Header">Editing the documentation</div>
   <div class="Text_Normal">
     The source for this website can also be retrieved from "lp:~geoff.bache/texttest/website-trunk" if you find errors in the 
     documentation, or your changes require extra documentation.
   </div>
   <div class="Text_Header">Very high-level StoryText design overview</div>
   <div class="Text_Normal">
     Conceptually, StoryText consists of a <b>Replayer</b>, a <b>Recorder</b> and a <b>Describer</b>. An effort has been made to keep these
     distinct from each other and not excessively interdependent. Organisationally, it consists of generic code that does not know about GUIs, 
     (most of the base package), code that depends on GUIs but not on any particular toolkit (the <i>guishared</i> module) and then the various
     toolkit specific code, in the respective subpackages. StoryText is not normally used on non-GUI programs, but as it handles 
     <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_signals">signals on POSIX</A>
     and <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_appevents">application events (waiting)</A>, it is useful to keep these 
     parts separate, not least to be able to test them without involving GUIs.
   </div>
   <div class="Text_Normal">
     The <u>Replayer</u> and <u>Recorder</u> work with "events", which are instances of subclasses of <i>definitions</i>.<b>UserEvent</b>. This concept
     encapsulates a kind of event that can occur, and each "toolkit" package will generally have a <i>simulator</i> module that defines a number of subclasses
     of this. Each of these define a <i>generate</i> method with the code to simulate (replay) this event. Often this will forward to a third party tool 
     (RobotFramework SwingLibrary for Swing, SWTBot for Eclipse, i.e. SWT, RCP or GEF). They also define a <i>connectRecord</i> method, called to attach a 
     listener as appropriate to listen for the event occurring. In this way the nuts and bolts of recording and replaying are usually defined in these <b>UserEvent</b>
     subclasses, while the <i>replayer</i>.<b>Replayer</b> and <i>recorder</i>.<b>Recorder</b> define the basic framework of how this works in general.
   </div>
   <div class="Text_Normal">
     The <b>ScriptEngine</b> class is something that the various toolkits override. It provides a static mapping <i>eventTypes</i>, which maps each widget type in the
     GUI toolkit to the corresponding <b>UserEvent</b>s. It also provides the ability to override how the system under test is started, and to hook in basic documentation.
   </div>
  </td>
 </tr>
</table>
