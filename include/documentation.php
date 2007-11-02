<?php
  //Decides version of documents in $basePath
  $version = "documentation"; 
  //$version = "documentation_3_18";
  
  //Should be easy to autogenerate
  $basePath = "include/documentation/";
  $path = $basePath."main.php";

  function hideDocTable()
  {
    print "<script language=\"javascript\">openClose('DocTable')</script>";
  }
   
  function printLI($n,$realName,$title)
  {
    global $path,$basePath;
    $doHide = false;
    print "<li";
    if ($_GET['n'] == $n) 
    { 
	  $doHide = true; 	  
   	  print " class=\"marked\""; 
	  $path = $basePath.$n.".php"; 
    }
	print ">\n";
	print "<a class=\"Text_Link\" title=\"".$realName."\" href=\"index.php?page=documentation&n=".$n."\">".$realName."</a>";  
	if ($doHide) hideDocTable(); 
  }
  //Check $_GET
  function checkGET()
  {
    global $path;
    if ($_GET['n'] == "old_versions") 
    {
     $path="include/documentation/old_versions.php";
     hideDocTable();
    }
  }
 

?>

<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Documentation</div>
   <div class="Text_Normal">
   This is the documentation for the current version of Texttest, which is 3.9.1.
   (Find documentation for older versions <a class="Text_Link" href="index.php?page=documentation&n=old_versions">here</a>)
   
   </div>
  
   <div class="Text_Normal" id="DocTable">  
   <table border=0 bgcolor="#000000" cellspacing=1>
      <tr valign=top>
        <td bgcolor="#FFFFFF">
	
          <table border=0 class="documentation_table">
            <tr>
              <td width=150 ><div class="Table_Text_Header">Tutorials</div></td>
              <td width=230><div class="Table_Text_Header">User Guide</div></td>
              <td width=250><div class="Table_Text_Header">Configuration Reference</div></td>
            </tr>
            
			<tr>
			  <td>
			  	<div class="Table_Text_Normal">
			    		 <?php  printLI("install_texttest","Install TextTest","Tooltip title"); ?>
					 <?php  printLI("getting_started","Getting Started","Tooltip title"); ?>
					 <?php  printLI("gui_tests","Testing a GUI","Tooltip title"); ?>
					 <?php  printLI("kataminesweeper","Screencast","Tooltip title"); ?>
				</div>
		      </td>
		      <td>
		      <div class="Table_Text_Normal">
			    	 <?php  printLI("about_testsuites","Understanding Test Suites","Tooltip title"); ?>
			    	 <?php  printLI("texttest_sandbox","Managing test data","Tooltip title"); ?>
			    	 <?php  printLI("file_collation_and_text_filtering","Configuring the textual comparison","Tooltip title"); ?>
			    	 <?php  printLI("guide_to_texttest_ui","Guide to TextTest UI","Tooltip title"); ?>
			    	 <?php  printLI("running_texttest_unattended","Running TextTest unattended","Tooltip title"); ?>
			    	 <?php  printLI("faking_it_with_texttest","Mocking out external programs","Tooltip title"); ?>
			    	 <?php  printLI("making_the_logging_configurable","Making the logging configurable","Tooltip title"); ?>
			    	 <?php  printLI("measuring_system_resource_usage","Performance and memory checking","Tooltip title"); ?>
			    	 <?php  printLI("automatic_failure_interpretation","Automatic failure interpretation","Tooltip title"); ?>
			    	 <?php  printLI("running_tests_in_parallel","Running tests in parallel","Tooltip title"); ?>
			    	 <?php  printLI("writing_a_config_module","Write your own configuration","Tooltip title"); ?>
			
		      </div>
		      </td>
		      <td>
		       <div class="Table_Text_Normal">
			    	 <?php  printLI("options","Options when submitting test runs","Tooltip title"); ?>
				 <?php  printLI("configfile","Possible entries for config files","Tooltip title"); ?>
				 <?php  printLI("scripts","List of plugin scripts","Tooltip title"); ?>

		      </div>
		      </td>
		      
		  </tr>
           </table>
	  
            
         </td>
        </tr>
      </table>
  
      </div>
      <br>
	<?php checkGET(); include $path; ?>                   
    </td>
  </tr>
</table>

