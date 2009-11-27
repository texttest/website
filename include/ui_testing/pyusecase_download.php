<!--TITLE:Download PAGEINFO:Download Texttest PATH:page=download-->
<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Downloading and installing PyUseCase</div>
   <div class="Text_Header">Latest release</div>
   <div class="Text_Normal">
     Releases may be downloaded from the
    <a class="Text_Link" href="http://sourceforge.net/project/pyusecase">SourceForge project pages</a>. We aim to make a couple of releases a year here, with attendant bugfix releases when required.
   </div>
   <div class="Text_Header">Installation</div>
   <div class="Text_Normal">
     There are two possibilities: either you can go to the "lib" directory and run "python setup.py install", or you can leave it where it is, in which case you'll probably want to add its "bin" directory to your PATH for convenience.
   </div>
   <div class="Text_Header">Latest development version from source control</div>
   <div class="Text_Normal">
     There about 100 automated acceptance tests for PyUseCase, using TextTest, and we aim to keep 
     the contents of source control stable and usable at all times. Anyone wishing to make changes 
     should obviously get hold of this version also.
     The code is hosted on Launchpad and can be browsed online <a class="Text_Link" href="https://code.launchpad.net/~geoff.bache/pyusecase/trunk">here</A>. </div>
   <div class="Text_Normal">
     To get hold of the latest version, you will need to install the <a class="Text_Link" href="http://bazaar-vcs.org">Bazaar version control tool</A>. You can then just do "bzr checkout lp:pyusecase" to get the latest code.
   </div>
   <div class="Text_Header">Contributing to PyUseCase: the tests and documentation</div>
   <div class="Text_Normal">
     PyUseCase is a work in progress and it doesn't support everything you could ever do in PyGTK. It supports what its users have needed so far. You are therefore reasonably likely to find that some widget in your application isn't supported, and you are of course encouraged to submit any changes you make back here. Adding functionality isn't just a matter of writing code: new code also needs to be tested and documented before it's complete. You should therefore get the latest version of the tests also, this is done via "bzr checkout lp:/~geoff.bache/pyusecase/selftest-trunk". You can then run your changes against these tests and add new tests if you add new functionality.
   </div>
   <div class="Text_Normal">
     The self-tests expect you to set TEXTTEST_HOME to the parent directory of your checkout, they can then live alongside other tests you write in a single directory structure if you want to set it up like that. 
   </div>
   <div class="Text_Normal">
     On UNIX, you probably want to make sure you have Xvfb installed, otherwise you'll get lots of GUIs popping up on your screen. 
   </div>
   <div class="Text_Normal">
     The tests assume that the source to be tested can be found in the location $TEXTTEST_HOME/../PyUseCase. If you put them somewhere else you'll need to tell it this. This is controlled by the setting in the file default_site/site_configfile in the tests: you can either edit this locally or preferably, copy the file to site/site_configfile and edit it there, where it will be read instead of the default_site location. This also means it won't show up as a change when you check status in Bazaar. You can also make other locally-relevant configuration changes for the tests in that file.
   </div>
   <div class="Text_Normal">
     We make every effort to ensure that the self-tests are always green. If they fail on the current source for you, the first thing to do is to check their <A class="Text_Link" HREF="index.php?page=nightjob">status in the nightjob</A>. This page is updated nightly with the result of test runs on Linux and Windows using different GTK versions. If something is failing you can check in the nightjob history to see if it is also failing there. (Coverage information is also available there)
   </div>
   <div class="Text_Normal">
     The source for this website can also be retrieved from "lp:~geoff.bache/texttest/website-trunk" if you find errors in the documentation, or your changes require extra documentation.
   </div>
  </td>
 </tr>
</table>
