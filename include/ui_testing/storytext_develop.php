<!--TITLE:Develop PAGEINFO:Develop Texttest PATH:page=develop-->
<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Developing StoryText</div>
   <div class="Text_Header">Contributing to StoryText: setting up development and running the tests</div>
   <div class="Text_Normal">
     StoryText is a work in progress and it doesn't support everything you could ever do in the various GUI toolkits. 
     It supports what its users have needed so far, and there is a complete list of what is currently supported here for 
     <a class="Text_Link" href="index.php?page=ui_testing&n=storytext_supported_gtk">PyGTK</A>, 
     <a class="Text_Link" href="index.php?page=ui_testing&n=storytext_supported_tkinter">Tkinter</A>, 
     <a class="Text_Link" href="index.php?page=ui_testing&n=storytext_supported_wx">wxPython</A>,
     <a class="Text_Link" href="index.php?page=ui_testing&n=storytext_supported_swt">SWT/Eclipse RCP</A> and
     <a class="Text_Link" href="index.php?page=ui_testing&n=storytext_supported_swing">Swing</A> respectively. 
     You are therefore reasonably likely to find that some widget in your application isn't supported, and you are of course 
     encouraged to submit any changes you make back here. Adding functionality isn't just a matter of writing code: new code also 
     needs to be tested and documented before it's complete. You should therefore get the latest version of the tests also, 
     this is done via "bzr branch lp:/~geoff.bache/storytext/selftest-trunk". You can then run your changes against these tests 
     and add new tests if you add new functionality.
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
     can check in the nightjob history to see if it is also failing there. (Coverage information is also available there)
   </div>
   <div class="Text_Header">Editing the documentation</div>
   <div class="Text_Normal">
     The source for this website can also be retrieved from "lp:~geoff.bache/texttest/website-trunk" if you find errors in the 
     documentation, or your changes require extra documentation.
   </div>
  </td>
 </tr>
</table>
