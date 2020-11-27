<!--TITLE:Download PAGEINFO:Download Texttest PATH:page=download-->
<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Downloading TextTest</div>
   
   <div class="Text_Header">Latest release</div>
   <div class="Text_Normal">
     On Windows, download the Windows installer from the 
     <a class="Text_Link" href="http://sourceforge.net/project/showfiles.php?group_id=80138">SourceForge download site</a>.
     On POSIX systems, install TextTest directly from Python's packaging system via "sudo pip install texttest" or "sudo easy_install texttest". 
     A tarball may also be downloaded from the SourceForge site above.
</div>
<div class="Text_Normal">
     Pre-releases can be obtained also by supplying the "--pre" flag to "pip install", above. These are usually fairly stable, if not always fully documented,
     see below.
</div>
<div class="Text_Normal">
    We aim to make a couple of releases a year here, with attendant bugfix releases when required. See
    <A class="Text_Link" HREF="<?php print "index.php?page=documentation_trunk&n=install_texttest"; ?>">the installation guide</A> for more details. 
   </div>
   <div class="Text_Header">Latest development version from source control</div>
   <div class="Text_Normal">
     Due to over 1000 automated acceptance tests for itself, written in itself, the contents of source control
     are almost always quite usable. Anyone wishing to make changes should obviously get hold of this version also.
     The code is now hosted on Github and can be browsed online <a class="Text_Link" href="https://github.com/texttest/texttest">here</A>. </div>
   <div class="Text_Normal">
     To get hold of the latest version, you will need to install the <a class="Text_Link" href="https://git-scm.com/downloads">Git version control tool</A>, 
     as well as the other dependencies listed in the <A class="Text_Link" HREF="index.php?page=<?php echo convertToDocFormat($current_release); ?>&n=install_texttest">installation guide</A>. 
   </div>
   <div class="Text_Normal">
     On a POSIX-based system, you can just run this code directly from the source tree, by running "bin/texttest".
     On Windows you need to install it, either centrally or into a Python virtual environment, by running "python setup.py install", as with any other Python program.
     This has its advantages on any system, especially if developing, where you can also do "pip install -e" to install a link which means that source code changes are reflected immediately.
   </div>
  </td>
 </tr>
</table>
