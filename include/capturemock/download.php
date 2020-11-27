<!--TITLE:Download PAGEINFO:Download Texttest PATH:page=download-->
<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Downloading and installing CaptureMock</div>
   <div class="Text_Header">Latest release</div>
    <div class="Text_Normal">
      Releases should be installed directly from Python's packaging system via "pip install capturemock". We aim to make a few releases a year, with attendant bugfix releases when required.
   </div>
   <div class="Text_Header">Installation</div>
   <div class="Text_Normal">
     If you didn't run pip or easy_install already, go to the "source" directory and run "python setup.py install". 
   </div>
   <div class="Text_Header">Latest development version from source control</div>
   <div class="Text_Normal">
     There about 100 automated acceptance tests for CaptureMock, using TextTest, and we aim to keep 
     the contents of source control stable and usable at all times. Anyone wishing to make changes 
     should obviously get hold of this version also.
     The code is hosted on Github and can be browsed online <a class="Text_Link" href="https://github.com/texttest/capturemock">here</A>. </div>
   <div class="Text_Normal">
     To get hold of the latest version, you will need to install the <a class="Text_Link" href="https://git-scm.com/downloads">Git version control tool</A>.
   </div>
   <div class="Text_Header">Contributing to CaptureMock: the tests and documentation</div>
   <div class="Text_Normal">
Adding functionality isn't just a matter of writing code: new code also needs to be tested and documented before it's complete. You should therefore get the latest version of the tests also, this is done from
<a class="Text_Link" href="https://github.com/texttest/capturemock-selftest">here</A>
. You can then run your changes against these tests and add new tests if you add new functionality.
   </div>
   <div class="Text_Normal">
     The self-tests expect you to set TEXTTEST_HOME to the parent directory of your branch, they can then live alongside other tests you write in a single directory structure if you want to set it up like that. 
   </div>
   <div class="Text_Normal">
     The tests assume that the source to be tested can be found in the location $TEXTTEST_HOME/../CaptureMock. If you put them somewhere else you'll need to tell it this. This is controlled by the setting in the file default_site/site_configfile in the tests: you can either edit this locally or preferably, copy the file to site/site_configfile and edit it there, where it will be read instead of the default_site location. This also means it won't show up as a change when you check status in Git. You can also make other locally-relevant configuration changes for the tests in that file.
   </div>
   <div class="Text_Normal">
     We make every effort to ensure that the self-tests are always green. If they fail on the current source for you, the first thing to do is to check their <A class="Text_Link" HREF="index.php?page=nightjob">status in the nightjob</A>. This page is updated nightly with the result of test runs on Linux and Windows. If something is failing you can check in the nightjob history to see if it is also failing there. (Coverage information is also available there)
   </div>
   <div class="Text_Normal">
     The source for this website can also be retrieved from <a class="Text_Link" href="https://github.com/texttest/website">here</A> if you find errors in the documentation, or your changes require extra documentation.
   </div>
  </td>
 </tr>
</table>
