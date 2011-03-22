<?php

$basePath="include/capturemock/";
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
	print "<a class=\"Text_Link\" title=\"".$title."\" href=\"index.php?page=capturemock&n=".$n."\">".$realName."</a>";  
   
}
?>
<table class="Table_Normal">
 <tr>
  <td>
    <div class="Text_Main_Header">Capture-Replay Mocking with CaptureMock</div>
    <div class="Text_Normal">
    <table border=0 bgcolor="#000000" cellspacing=1>
      <tr valign=top>
        <td bgcolor="#FFFFFF">
          
          <table border=0 class="documentation_table">
            <tr>
              <td width=200><div class="Table_Text_Header">General</div></td>
              <td width=220><div class="Table_Text_Header">Python Code</div></td>
              <td width=220><div class="Table_Text_Header">System Commands</div></td>
            </tr>
            
	    <tr>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("motivation","Motivation","Motivation for CaptureMock"); ?>  
                  <?php  printLI("download","Download and install","Get the latest stable release of CaptureMock from SourceForge, or the latest code from Launchpad"); ?>
                  <?php  printLI("texttest","Usage with TextTest", "Using CaptureMock together with TextTest"); ?>
	        </div>
	      </td>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("codedtests","Usage from Python test tools","Using CaptureMock from unittest/py.test/nose etc."); ?>
                  <?php  printLI("python_basic","Basic usage", "Basic usage with examples of how to intercept a whole module or a single function"); ?>
                  <?php  printLI("transform_output","Transforming the mock files", "Transforming what is recorded, for determinism or to make replay possible"); ?>
                  <?php  printLI("filtering","Filtering what is recorded", "Disabling recording when something is called repeatedly, or from particular places in the code"); ?>
                </div>
	      </td>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("command_line","Usage from command line", "How to run standalone from the command line"); ?>
                  <?php  printLI("cmdline_basic","Basic usage", "Basic usage with example of how to intercept command-line programs"); ?>
                  <?php  printLI("environment","Environment variables", "How to handle environment and current working directory to the cprogram being intercepted"); ?>
                  <?php  printLI("file_capture","Capturing file edits", "Capturing file edits made by the program being intercepted"); ?>
                  <br><br><div class="Table_Text_Header">Plain-text Messaging</div>
                   <?php  printLI("network_messaging","Usage and examples", "Capturing plain-text messages sent over a socket"); ?>
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
       elseif  ($path == "no_needed") include_file ('include/capturemock/motivation.php');
       else include_file($path); 
       ?>
				
  </td>
 </tr>
</table>
