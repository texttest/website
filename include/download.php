<!--TITLE:Download PAGEINFO:Download Texttest PATH:page=download-->
<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Downloading TextTest</div>
   
   <div class="Text_Header">Latest release</div>
   <div class="Text_Normal">
     Releases may be downloaded from the
    <a class="Text_Link" href="http://sourceforge.net/project/showfiles.php?group_id=80138">SourceForge download site</a>. 
    We aim to make a couple of releases a year here, with attendant bugfix releases when required. See
    <A class="Text_Link" HREF="<?php print "index.php?page=documentation_trunk&n=install_texttest"; ?>">the installation guide</A> for more details. 
   </div>
   <div class="Text_Header">Latest development version from source control</div>
   <div class="Text_Normal">
     Due to over 1000 automated acceptance tests for itself, written in itself, the contents of source control
     are almost always quite usable. Anyone wishing to make changes should obviously get hold of this version also.
     The code is hosted on Launchpad and can be browsed online <a class="Text_Link" href="https://code.launchpad.net/~geoff.bache/texttest/trunk">here</A>. </div>
<div class="Text_Normal">
  To get hold of the latest version, you will need to install the <a class="Text_Link" href="http://bazaar-vcs.org">Bazaar version control tool</A>, 
  as well as the other dependencies listed in the <A class="Text_Link" HREF="index.php?page=<?php echo convertToDocFormat($current_release); ?>&n=install_texttest">installation guide</A>. 
  For ordinary installation, StoryText is bundled with TextTest but it is a separate Bazaar repository, so you need to check it out also. 
  Start by doing "bzr branch lp:storytext" and then running "python setup.py install" in the "lib" subdirectory of the checked out location. You can then just do 
  "bzr branch lp:texttest" to get the latest code and run "texttest.py" from the relevant "bin" directory.
</div>
  </td>
 </tr>
</table>
