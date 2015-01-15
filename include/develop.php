<!--TITLE:Develop PAGEINFO:Develop Texttest PATH:page=develop-->
<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Developing TextTest</div>
<div class="Text_Header">Checking out the latest version of the code</div>
<div class="Text_Normal">
The code is hosted in Bazaar on Launchpad. Some instructions for checking it out are on <A class="Text_Link" HREF="index.php?page=download">the download page</A>. 
</div>   
<div class="Text_Header">Running the self-tests</div>
<div class="Text_Normal">
Check out the self-tests via "bzr branch lp:/~geoff.bache/texttest/selftest-trunk". 
</div>
<div class="Text_Normal">
The self-tests expect you to set TEXTTEST_HOME to the parent directory of your branch created above, they can then live alongside other tests you write in a single directory structure if you want to set it up like that. 
</div>
<div class="Text_Normal">
On UNIX, you probably want to make sure you have Xvfb installed, otherwise you'll get lots of TextTest GUIs popping up on your screen when you run the GUI self-tests. 
</div>
<div class="Text_Normal">
The self-tests also assume that the TextTest source to be tested can be found in the same location as in the release tarball, i.e. $TEXTTEST_HOME/../source. If you put them somewhere else you'll need to tell it this. This is controlled by the setting in the file default_site/site_configfile in the self-tests: you can either edit this locally or preferably, copy the file to site/siteconfig/site_configfile and edit it there, where it will be read instead of the default_site location. This also means it won't show up as a change when you check status in Bazaar. You can also make other locally-relevant configuration changes for the self-tests in that file.
</div>
<div class="Text_Normal">
We make every effort to ensure that the self-tests are always green, but there are more than 1600 of them now and there are many different combinations of platforms, python versions, GTK versions etc, which can of course lead to problems. If they fail on the current source for you, the first thing to do is to check their <A class="Text_Link" HREF="index.php?page=nightjob">status in the nightjob</A>. This page is updated nightly with the result of test runs on Linux and Windows using different GTK versions. You can check in the nightjob history to see if a test has failed there in the past.</div>
<div class="Text_Header">Editing the documentation</div>
<div class="Text_Normal">
 The source for this website can also be retrieved from "lp:~geoff.bache/texttest/website-trunk" if you find errors in the documentation, or your changes require extra documentation.
   </div>
  
  </td>
 </tr>
</table>
