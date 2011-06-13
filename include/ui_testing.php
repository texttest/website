<?php

$basePath="include/ui_testing/";
if (isset($_GET['n'])) $path = "not_set";
else $path = "no_needed";

if (isset($_GET['n']))
{
   $get = $_GET['n'];
   $path = $basePath.$_GET['n'].".php";
}	
 
function printLI($n,$realName,$title)
{
  global $path,$basePath;
  print "<li";
  if (isset($_GET['n']))
  {
		if ($_GET['n'] == $n) 
    		{ 
	  	  		print " class=\"marked\""; 
	  			$path = $basePath.$n.".php"; 
    		}
   }
   print ">\n";
	print "<a class=\"Text_Link\" title=\"".$title."\" href=\"index.php?page=ui_testing&n=".$n."\">".$realName."</a>";  
   
}
?>
<table class="Table_Normal">
 <tr>
  <td>
    <div class="Text_Main_Header">Testing GUIs with TextTest and xUseCase</div>
    <div class="Text_Normal">
    <table border=0 bgcolor="#000000" cellspacing=1>
      <tr valign=top>
        <td bgcolor="#FFFFFF">
          
          <table border=0 class="documentation_table">
            <tr>
              <td width=220><div class="Table_Text_Header">Introduction</div></td>
              <td width=220><div class="Table_Text_Header">PyUseCase Docs</div></td>
              <td width=200><div class="Table_Text_Header">Toolkit specific</div></td>
            </tr>
            
	    <tr>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("xusecase","The xUseCase idea","Driving a GUI with a Use-Case Recorder"); ?>  
                  <?php  printLI("pyusecase_screencast","Screencast (Eclipse RCP)","Testing RCP Mail with TextTest and PyUseCase"); ?>  
                  <?php  printLI("problems","FAQ","Frequently asked questions relating to the xUseCase as a concept"); ?>  
                  <br><br><div class="Table_Text_Header">xUseCase Concepts</div>
	          <?php  printLI("appevents","Application Events", "Multi-threaded simulation with Application Events"); ?>
                  <?php  printLI("shortcuts","GUI shortcuts", "Test refactoring and macro recording with GUI shortcuts"); ?>
                  <br><br><div class="Table_Text_Header">Other tools</div>
                  <li> <A class="Text_Link" href="http://jusecase.sourceforge.net">JUseCase for Swing (inactive)</A>
                  <li> <A class="Text_Link" href="http://sourceforge.net/projects/nusecase">nUseCase for .net</A>
	        </div>
	      </td>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("pyusecase_download","Download and install","Get the latest stable release of PyUseCase from SourceForge, or the latest code from Launchpad"); ?>
                  <?php  printLI("pyusecase_intro","Basic command-line usage","Using PyUseCase on the command line"); ?>
	          <?php  printLI("pyusecase_texttest","Usage with TextTest", "Using PyUseCase together with TextTest to create tests"); ?>
                  <?php  printLI("pyusecase_customwidgets","Custom Widgets", "How to tell PyUseCase how to handle any custom widgets you may have"); ?>
                  <?php  printLI("pyusecase_appevents","Application Events", "Multi-threaded simultation with Application Events in PyUseCase"); ?>
                  <?php  printLI("pyusecase_shortcuts","GUI shortcuts", "Test refactoring and macro recording with GUI shortcuts in PyUseCase"); ?>
                  <?php  printLI("pyusecase_signals", "Signals on UNIX", "Recording and playing back UNIX signals received by the process"); ?>
                </div>
	      </td>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("pyusecase_and_gtk","PyGTK", "Documentation specific to using PyUseCase with PyGTK apps"); ?>
                  <?php  printLI("pyusecase_and_tkinter","Tkinter", "Documentation specific to using PyUseCase with Tkinter apps"); ?>
	          <?php  printLI("pyusecase_and_wx","wxPython", "Documentation specific to using PyUseCase with wxPython"); ?>
                  <?php  printLI("pyusecase_and_swt","SWT/Eclipse RCP", "Documentation specific to using PyUseCase with SWT/Eclipse RCP apps"); ?>
                  <br><br><div class="Table_Text_Header">Supported widgets</div>
                  <?php  printLI("pyusecase_supported_gtk", "PyGTK", "PyGTK widgets supported by current version of PyUseCase, for record/playback and auto-logging"); ?>
                  <?php  printLI("pyusecase_supported_tkinter","Tkinter", "Tkinter widgets supported by current version of PyUseCase, for record/playback and auto-logging"); ?>
                  <?php  printLI("pyusecase_supported_wx","wxPython", "wxPython widgets supported by current version of PyUseCase, for record/playback and auto-logging"); ?>
                  <?php  printLI("pyusecase_supported_swt","SWT/Eclipse RCP", "SWT/Eclipse RCP widgets supported by current version of PyUseCase, for record/playback and auto-logging"); ?>
                  <?php  printLI("pyusecase_supported_swing","Swing (unreleased)", "Swing widgets supported by development version of PyUseCase, for record/playback and auto-logging"); ?>
	        </div>
	      </td>
		      
	    </tr>
          </table>
	</td>
		      
      </tr>
    </table>
    </div>   
    <?php 
       if ($path == "not_set") include_404_page();
       elseif  ($path == "no_needed") include_file ('include/ui_testing/xusecase.php');
       else include_file($path); 
       ?>
				
  </td>
 </tr>
</table>
