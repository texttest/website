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
    <div class="Text_Main_Header">Testing GUIs with TextTest and StoryText</div>
    <div class="Text_Normal">
    <table border=0 bgcolor="#000000" cellspacing=1>
      <tr valign=top>
        <td bgcolor="#FFFFFF">
          
          <table border=0 class="documentation_table">
            <tr>
              <td width=220><div class="Table_Text_Header">Introduction</div></td>
              <td width=220><div class="Table_Text_Header">StoryText Docs</div></td>
              <td width=200><div class="Table_Text_Header">Toolkit specific</div></td>
            </tr>
            
	    <tr>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("storytext","The StoryText idea","Concepts behind the StoryText tool, formerly known as PyUseCase"); ?>  
                  <?php  printLI("storytext_screencast","Screencast (Eclipse RCP)","Testing RCP Mail with TextTest and StoryText"); ?>  
                  <?php  printLI("problems","FAQ","Frequently asked questions relating to the StoryText as a concept"); ?>  
                  <br><br><div class="Table_Text_Header">StoryText Concepts</div>
	          <?php  printLI("appevents","Application Events", "Multi-threaded simulation with Application Events"); ?>
                  <?php  printLI("shortcuts","GUI shortcuts", "Test refactoring and macro recording with GUI shortcuts"); ?>
                  <br><br><div class="Table_Text_Header">Other tools</div>
                  <li> <A class="Text_Link" href="http://jusecase.sourceforge.net">JUseCase for Swing (inactive)</A>
                  <li> <A class="Text_Link" href="http://sourceforge.net/projects/nusecase">nUseCase for .net</A>
	        </div>
	      </td>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("storytext_download","Download and install","Get the latest stable release of StoryText from SourceForge, or the latest code from Github"); ?>
                  <?php  printLI("storytext_intro","Basic command-line usage","Using StoryText on the command line"); ?>
	          <?php  printLI("storytext_texttest","Usage with TextTest", "Using StoryText together with TextTest to create tests"); ?>
                  <?php  printLI("storytext_cmdline","Command line options", "The output of 'storytext --help'"); ?>
                  <?php  printLI("storytext_customwidgets","Custom Widgets", "How to tell StoryText how to handle any custom widgets you may have"); ?>
                  <?php  printLI("storytext_appevents","Application Events", "Multi-threaded simultation with Application Events in StoryText"); ?>
                  <?php  printLI("storytext_shortcuts","GUI shortcuts", "Test refactoring and macro recording with GUI shortcuts in StoryText"); ?>
                  <?php  printLI("storytext_signals", "Signals on UNIX", "Recording and playing back UNIX signals received by the process"); ?>
                  <?php  printLI("storytext_develop","Developing StoryText", "Instructions for how to run the tests and a one-page design overview"); ?>
                </div>
	      </td>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("storytext_and_gtk","PyGTK", "Documentation specific to using StoryText with PyGTK apps"); ?>
                  <?php  printLI("storytext_and_tkinter","Tkinter", "Documentation specific to using StoryText with Tkinter apps"); ?>
	          <?php  printLI("storytext_and_wx","wxPython", "Documentation specific to using StoryText with wxPython"); ?>
                  <?php  printLI("storytext_and_swt","SWT/Eclipse RCP/GEF", "Documentation specific to using StoryText with SWT/Eclipse RCP/GEF apps"); ?>
                  <?php  printLI("storytext_and_swing","Swing", "Documentation specific to using StoryText with Java Swing apps"); ?>
                  <br><br><div class="Table_Text_Header">Supported widgets</div>
                  <?php  printLI("storytext_supported_gtk", "PyGTK", "PyGTK widgets supported by current version of StoryText, for record/playback and auto-logging"); ?>
                  <?php  printLI("storytext_supported_tkinter","Tkinter", "Tkinter widgets supported by current version of StoryText, for record/playback and auto-logging"); ?>
                  <?php  printLI("storytext_supported_wx","wxPython", "wxPython widgets supported by current version of StoryText, for record/playback and auto-logging"); ?>
                  <?php  printLI("storytext_supported_swt","SWT/Eclipse RCP", "SWT/Eclipse RCP widgets supported by current version of StoryText, for record/playback and auto-logging"); ?>
                  <?php  printLI("storytext_supported_swing","Swing", "Swing widgets supported by development version of StoryText, for record/playback and auto-logging"); ?>
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
       elseif  ($path == "no_needed") include_file ('include/ui_testing/storytext.php');
       else include_file($path); 
       ?>
				
  </td>
 </tr>
</table>
