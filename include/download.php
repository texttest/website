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
  To get hold of the latest version, you will need to install the <a class="Text_Link" href="http://bazaar-vcs.org">Bazaar version control tool</A>. You can then just do "bzr checkout lp:texttest" to get the latest code. In order to run it, you will also need the latest version of PyUseCase, which you can get by doing "bzr checkout lp:pyusecase" and then running "python setup.py install" in the checked out location.</A></div>
<div class="Text_Header">Contributing to TextTest: the self-tests and documentation</div>
<div class="Text_Normal">
Adding functionality isn't just a matter of writing code: new code also needs to be tested and documented before it's complete. You should therefore get the latest version of the self-tests also, this is done via "bzr checkout lp:/~geoff.bache/texttest/selftest-trunk". You can then run your changes against these tests and add new tests if you add new functionality.
</div>
<div class="Text_Normal">
The self-tests, by default, assume that the TextTest source to be tested can be found in the same location as in the release tarball, i.e. $TEXTTEST_HOME/../source. If you put them somewhere else you'll need to tell it this. This is controlled by the setting in the file default_site/site_configfile in the self-tests: you can either edit this locally or preferably, copy the file to site/siteconfig/site_configfile and edit it there, where it will be read instead of the default_site location. This also means it won't show up as a change when you check status in Bazaar. You can also make other locally-relevant configuration changes for the self-tests in that file.
</div>
<div class="Text_Normal">
 The source for this website can also be retrieved from "lp:~geoff.bache/texttest/website-trunk" if you find errors in the documentation, or your changes require extra documentation.
   </div>
  
  </td>
 </tr>
</table>
