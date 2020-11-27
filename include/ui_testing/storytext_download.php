<!--TITLE:Download PAGEINFO:Download Texttest PATH:page=download-->
<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Downloading and installing StoryText</div>
   <div class="Text_Header">Latest releases (Python GUIs)</div>
   <div class="Text_Normal">
     Releases may be downloaded from the
    <a class="Text_Link" href="http://sourceforge.net/projects/pyusecase">SourceForge project pages</a>. There is now
    a Windows installer there which will also install TextTest if required. Releases can also be 
    installed directly from Python's packaging system via "easy_install storytext" or "pip install storytext". 
    We aim to make a couple of releases a year, with attendant bugfix releases when required.
   </div>
   <div class="Text_Header">Latest releases (Java GUIs)</div>
   <div class="Text_Normal">
     Please see the instructions for <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_and_swt">SWT/EclipseRCP</A> 
     or <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_and_swing">Swing</A> as appropriate. 
   </div>
   <div class="Text_Header">Installation (Python GUIs)</div>
   <div class="Text_Normal">
     There are two possibilities (if you didn't run pip or easy_install already). You can go to the "source" directory and 
     run "python setup.py install". On Windows this will probably install it somewhere like "C:\Python26\Scripts", which 
     you should then add to your PATH variable. On UNIX you can also leave it where it is, in which case you'll probably 
     want to add its "source/bin" directory to your PATH for convenience.</div>
   <div class="Text_Normal">
     StoryText comes with a small PyGTK UI ("storytext_editor") which creates the 
     <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_intro#ui_map_file">UI map file</A> for you and allows an
     overview of your usecases. You therefore need to install <A class="Text_Link" HREF="http://www.pygtk.org/downloads.html">PyGTK</A>, 
     even if the app you are testing uses another UI toolkit. Most Linux distros already have PyGTK though and the above Windows installer
     includes it, so this shouldn't be a problem. If needed, detailed tips for installing PyGTK can be found under the 
     <A class="Text_Link" HREF="index.php?page=documentation_trunk&n=install_texttest#PyGTK">TextTest documentation</A>. 
   </div>
   <div class="Text_Header">Latest development version from source control</div>
   <div class="Text_Normal">
     There about 550 automated acceptance tests for StoryText, using TextTest, and we aim to keep 
     the contents of source control stable and usable at all times. Anyone wishing to make changes 
     should obviously get hold of this version also.
     The code is hosted on Github and can be browsed online <a class="Text_Link" href="https://github.com/texttest/storytext">here</A>. 
   </div>
   <div class="Text_Normal">
    To get hold of the latest version, you will need to install the <a class="Text_Link" href="https://git-scm.com/downloads">Git version control tool</A>.
   </div>
   <div class="Text_Normal">
     Note that StoryText is only runnable directly from its source tree when used on Python GUIs on Linux now. On Windows, or with 
     Java GUIs, it will need to be installed using a command like 'python setup.py install' or 'jython setup.py install' respectively.
     We'd suggest making use of <A class="Text_Link" HREF="http://www.virtualenv.org">virtualenv</A> for this in order to avoid needing
     to use the default Python or Jython installation.
     For example, to set up a Jython installation on Linux, you might do
<?php codeSampleBegin() ?>
$ jython virtualenv.py ~/.local/jython2.5.3
$ export PATH=~/.local/jython2.5.3/bin:$PATH
$ cd &lt;path_to_storytext_source&gt;
$ ~/.local/jython2.5.3/bin/jython setup.py install
<?php codeSampleEnd() ?>
   </div>
   
  </td>
 </tr>
</table>
