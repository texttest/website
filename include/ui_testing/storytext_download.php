<!--TITLE:Download PAGEINFO:Download Texttest PATH:page=download-->
<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Downloading and installing StoryText</div>
   <div class="Text_Header">Latest release</div>
   <div class="Text_Normal">
     Releases may be downloaded from the
    <a class="Text_Link" href="http://sourceforge.net/projects/pyusecase">SourceForge project pages</a>. There is now
    a Windows installer there which will also install TextTest if required. Releases can also be 
    installed directly from Python's packaging system via "easy_install storytext" or "pip install storytext". 
    We aim to make a couple of releases a year, with attendant bugfix releases when required.
   </div>
   <div class="Text_Header">Installation</div>
   <div class="Text_Normal">
     There are two possibilities (if you didn't run pip or easy_install already). You can go to the "source" directory and 
     run "python setup.py install". On Windows this will probably install it somewhere like "C:\Python26\Scripts", which 
     you should then add to your PATH variable. On UNIX you can also leave it where it is, in which case you'll probably 
     want to add its "source/bin" directory to your PATH for convenience.</div>
   <div class="Text_Normal">
     StoryText comes with a small PyGTK UI which creates the 
     <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_intro#ui_map_file">UI map file</A> for you. 
     You therefore need to install <A class="Text_Link" HREF="http://www.pygtk.org/downloads.html">PyGTK</A>, even if the app 
     you are testing uses another UI toolkit. If you plan to use it together with TextTest (recommended) this will be necessary 
     in any case. Detailed tips for installing PyGTK can be found under the 
     <A class="Text_Link" HREF="index.php?page=documentation_trunk&n=install_texttest#PyGTK">TextTest documentation</A>. 
   </div>
   <div class="Text_Normal">
     Note that anyone wishing to test Java GUIs (SWT/Eclipse RCP or Swing) will also need to install Jython and SWTBot or SwingLibrary
     respectively.
     See the instructions for <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_and_swt">SWT/EclipseRCP</A> 
     or <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_and_swing">Swing</A>for more details. 
   </div>
   <div class="Text_Header">Latest development version from source control</div>
   <div class="Text_Normal">
     There about 350 automated acceptance tests for StoryText, using TextTest, and we aim to keep 
     the contents of source control stable and usable at all times. Anyone wishing to make changes 
     should obviously get hold of this version also.
     The code is hosted on Launchpad and can be browsed online 
     <a class="Text_Link" href="https://code.launchpad.net/~geoff.bache/storytext/trunk">here</A>. </div>
   <div class="Text_Normal">
     To get hold of the latest version, you will need to install the 
     <a class="Text_Link" href="http://bazaar-vcs.org">Bazaar version control tool</A>. 
     You can then just do "bzr branch lp:storytext" to get the latest code.
   </div>
   <div class="Text_Header">Contributing to StoryText: the tests and documentation</div>
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
     We make every effort to ensure that the self-tests are always green. If they fail on the current source for you, the first 
     thing to do is to check their <A class="Text_Link" HREF="index.php?page=nightjob">status in the nightjob</A>. This page is 
     updated nightly with the result of test runs on Linux and Windows using different GTK versions. If something is failing you 
     can check in the nightjob history to see if it is also failing there. (Coverage information is also available there)
   </div>
   <div class="Text_Normal">
     The source for this website can also be retrieved from "lp:~geoff.bache/texttest/website-trunk" if you find errors in the 
     documentation, or your changes require extra documentation.
   </div>
  </td>
 </tr>
</table>
