<!--TITLE:Download PAGEINFO:Download Texttest PATH:page=download-->
<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Downloading TextTest</div>
   
   <div class="Text_Header">Latest release</div>
   <div class="Text_Normal">
     Releases may be downloaded from the
    <a class="Text_Link" href="http://sourceforge.net/project/showfiles.php?group_id=80138">SourceForge download site</a>. We aim to make a couple of releases a year here, with attendant bugfix releases when required.
   </div>
   <div class="Text_Header">Latest development version from source control</div>
   <div class="Text_Normal">
     Due to over 1000 automated acceptance tests for itself, written in itself, the contents of source control
     are almost always quite usable. Anyone wishing to make changes should obviously get hold of this version also.
     The code is hosted on Launchpad and can be browsed online <a class="Text_Link" href="https://code.launchpad.net/~geoff.bache/texttest/trunk">here</A>. </div>
<div class="Text_Normal">
  To get hold of the latest version, you will need to install the <a class="Text_Link" href="http://bazaar-vcs.org">Bazaar version control tool</A>, as well as the other dependencies listed in the <A class="Text_Link" HREF="index.php?page=<?php echo convertToDocFormat($current_release); ?>&n=install_texttest">installation guide</A>. For ordinary installation, StoryText is bundled with TextTest but it is a separate Bazaar repository, so you need to check it out also. Start by doing "bzr branch lp:storytext" and then running "python setup.py install" in the "lib" subdirectory of the checked out location. You can then just do "bzr branch lp:texttest" to get the latest code and run "texttest.py" from the relevant "bin" directory.</A></div>
<div class="Text_Header">Contributing to TextTest: the self-tests and documentation</div>
<div class="Text_Normal">
Adding functionality isn't just a matter of writing code: new code also needs to be tested and documented before it's complete. You should therefore get the latest version of the self-tests also, this is done via "bzr branch lp:/~geoff.bache/texttest/selftest-trunk". You can then run your changes against these tests and add new tests if you add new functionality.
</div>
<div class="Text_Normal">
The self-tests expect you to set TEXTTEST_HOME to the parent directory of your branch, they can then live alongside other tests you write in a single directory structure if you want to set it up like that. 
</div>
<div class="Text_Normal">
On UNIX, you probably want to make sure you have Xvfb installed, otherwise you'll get lots of TextTest GUIs popping up on your screen when you run the GUI self-tests. 
</div>
<div class="Text_Normal">
The self-tests also assume that the TextTest source to be tested can be found in the same location as in the release tarball, i.e. $TEXTTEST_HOME/../source. If you put them somewhere else you'll need to tell it this. This is controlled by the setting in the file default_site/site_configfile in the self-tests: you can either edit this locally or preferably, copy the file to site/siteconfig/site_configfile and edit it there, where it will be read instead of the default_site location. This also means it won't show up as a change when you check status in Bazaar. You can also make other locally-relevant configuration changes for the self-tests in that file.
</div>
<div class="Text_Normal">
We make every effort to ensure that the self-tests are always green, but there are more than 1000 of them now and there are many different combinations of platforms, python versions, GTK versions etc, which can of course lead to problems. If they fail on the current source for you, the first thing to do is to check their <A class="Text_Link" HREF="index.php?page=nightjob">status in the nightjob</A>. This page is updated nightly with the result of test runs on Linux and Windows using different GTK versions. There are a handful of tests that contain race conditions and fail about one time in ten. You can check in the nightjob history to see if a test has failed there in the past. (Coverage information is also available there)</div>
<div class="Text_Normal">
 The source for this website can also be retrieved from "lp:~geoff.bache/texttest/website-trunk" if you find errors in the documentation, or your changes require extra documentation.
   </div>
  
  </td>
 </tr>
</table>
