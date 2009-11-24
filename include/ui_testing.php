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
	print "<a class=\"Text_Link\" title=\"".$realName."\" href=\"index.php?page=ui_testing&n=".$n."\">".$realName."</a>";  
   
}
?>

<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Acceptance Testing for User Interfaces</div>
	  <div class="Text_Header">Driving a GUI with a Use-Case Recorder</div>
	  <div class="Text_Normal">
            <?php  printLI("xusecase","Driving a GUI with a Use-Case Recorder","Tooltip title"); ?> 
	    <?php  printLI("appevents","Multi-threaded simulation with Application Events","Tooltip title"); ?>
            <?php  printLI("shortcuts","Test refactoring and macro recording with GUI shortcuts","Tooltip title"); ?>
            <?php  printLI("pyusecase","Driving a PyGTK Python GUI with PyUseCase","Tooltip title"); ?>
            <li> <A class="Text_Link" href="http://jusecase.sourceforge.net">Driving a Java Swing GUI with JUseCase (separate homepage)</A>
            <?php  printLI("problems","Frequently raised objections to Use-case recording","Tooltip title"); ?>
    </div>       
   
   <?php 
     if ($path == "not_set") include_404_page();
     elseif  ($path == "no_needed") include_file ('include/ui_testing/xusecase.php');
     else include_file($path); 
   ?>
				
    </td>
 </tr>
</table>
