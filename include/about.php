<?php

$basePath="include/about/";
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
	print "<a class=\"Text_Link\" title=\"".$realName."\" href=\"index.php?page=about&n=".$n."\">".$realName."</a>";  
   
}
?>

<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Introducing TextTest and Acceptance Testing</div>		  
     <div class="Text_Normal">	 
       <?php  printLI("about_texttest", "What is TextTest?", "Tooltip title"); ?>
       <?php  printLI("about_acceptance_testing","What is Acceptance Testing?","Tooltip title"); ?>
       <?php  printLI("why","Why do I need Acceptance Tests?","Tooltip title"); ?>
	 <?php  printLI("others","Other tools for Acceptance Testing","Tooltip title"); ?>
	 <?php  printLI("whylog","The advantages of testing with textual comparison","Tooltip title"); ?>
	 <?php  printLI("logprobs","FAQ on problems with testing by textual comparison","Tooltip title"); ?>
     </div>	
    </div>       
   
   <?php 
     if ($path == "not_set") include_404_page();
     elseif  ($path == "no_needed") include_file ('include/about/about_texttest.php');
     else include_file($path); 
   ?>
				
    </td>
 </tr>
</table>
