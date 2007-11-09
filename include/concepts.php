<?php

	$basePath="include/concepts/";
	$path = $basePath."concepts.htm"; 
 
function printLI($n,$realName,$title)
{
  global $path,$basePath;
  print "<li";
  if (isset($_GET['n']))
  {
		if ($_GET['n'] == $n) 
    		{ 
	  	  		print " class=\"marked\""; 
	  			$path = $basePath.$n.".htm"; 
    		}
   }
   print ">\n";
	print "<a class=\"Text_Link\" title=\"".$realName."\" href=\"index.php?page=concepts&n=".$n."\">".$realName."</a>";  
   
}
?>

<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header"> Acceptance Testing in theory and practice </div>		  
     <div class="Text_Header">About Acceptence Testing</div>
     <div class="Text_Normal">	 			
		 <?php  printLI("concepts","What is Acceptance Testing?","Tooltip title"); ?>
		 <?php  printLI("why","Why do I need Acceptance Tests?","Tooltip title"); ?>
		 <?php  printLI("others","Our approach compared to others","Tooltip title"); ?>
	  </div>	
	  <div class="Text_Header">Driving a GUI with a Use-Case Recorder</div>
	  <div class="Text_Normal">
		 <?php  printLI("xusecase","Driving a GUI with a Use-Case Recorder","Tooltip title"); ?> 
		 <?php  printLI("appevents","Multi-threaded simulation with Application Events","Tooltip title"); ?>
       <?php  printLI("shortcuts","Test refactoring and macro recording with GUI shortcuts","Tooltip title"); ?>
       <?php  printLI("pyusecase","Driving a PyGTK Python GUI with PyUseCase","Tooltip title"); ?>
       <li> <A class="Text_Link" href="http://jusecase.sourceforge.net">Driving a Java Swing GUI with JUseCase (separate homepage)</A>
       <?php  printLI("webusecase","Driving a web application with WebUseCase","Tooltip title"); ?>
       <?php  printLI("problems","Frequently raised objections to Use-case recording","Tooltip title"); ?>
       <li> <A class="Text_Link" href="index.php?page=about"> About TextTest and how to verify application behaviours with it</A>
    </div>       
      
   <?php 
     
     include($path); 
   ?>
				
    </td>
 </tr>
</table>