<?php

$basePath="include/concepts/";
if (isset($_GET['n'])) $path = "not_set";
else $path = "no_needed";

if (isset($_GET['n']))
{
	$get = $_GET['n'];
	if (  ($get == "calccomparison") ||  ($get == "guicomparison") || ($get == "webcomparison") )
	{
		$path = $basePath.$_GET['n'].".php";
	} 
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
	print "<a class=\"Text_Link\" title=\"".$realName."\" href=\"index.php?page=concepts&n=".$n."\">".$realName."</a>";  
   
}
?>

<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header"> Acceptance Testing in theory and practice </div>		  
     <div class="Text_Header">About Acceptance Testing</div>
     <div class="Text_Normal">	 			
		 <?php  printLI("concepts","What is Acceptance Testing?","Tooltip title"); ?>
		 <?php  printLI("why","Why do I need Acceptance Tests?","Tooltip title"); ?>
                 <li> <A class="Text_Link" href="index.php?page=about">Text-based Acceptance Testing with TextTest</A>
		 <?php  printLI("others","Other tools for Acceptance Testing","Tooltip title"); ?>
		 <?php  printLI("whylog","The advantages of testing with textual comparison","Tooltip title"); ?>
		 <?php  printLI("logprobs","FAQ on problems with testing by textual comparison","Tooltip title"); ?>
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
    </div>       
      
   <?php 
     
     if ($path == "not_set") include_404_page();
     elseif  ($path == "no_needed") include 'include/concepts/concepts.php';
     else include($path); 
   ?>
				
    </td>
 </tr>
</table>