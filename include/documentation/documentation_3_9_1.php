<?php
  //Include all common doc functions
  include 'include/documentation/common_for_doc';

  //Decides version of documents in $basePath
  $texttest_version = "3.9.1";
  $version = convertToDocFormat($texttest_version);
    
  //Internal varibles
  $doHide  = false;

  
  //Should be easy to autogenerate
  $basePath = "include/documentation/".$version."/";
  if (isset($_GET['n'])) $path = "not_set";
  else $path = "no_needed";


 

?>

<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Documentation for <?php echo $texttest_version ?></div>
   <div style="display:none" id="ControlTable">
   <a class="Text_Link" onclick="openClose('ControlTable');openClose('DocTable')">(Show)</a>
   </div>
   <div id="DocTable">
   <div>  
   <!--<a class="Text_Link" onclick="openClose('ControlTable');openClose('DocTable')">(Hide)</a>-->
   </div>
   <div class="Text_Normal">
   <table border=0 bgcolor="#000000" cellspacing=1>
      <tr valign=top>
        <td bgcolor="#FFFFFF">
	
          <table border=0 class="documentation_table">
            <tr>
              <td width=150 ><div class="Table_Text_Header">General</div></td>
              <td width=230><div class="Table_Text_Header">User Guide</div></td>
              <td width=250><div class="Table_Text_Header">Configuration Reference</div></td>
            </tr>
            
			<tr>
			  <td>
			  	<div class="Table_Text_Normal">
			    		 <?php  printLI("main","Overview of docs","The top-level documentation page, showing how to use the docs"); ?> 
                                         <?php  printLI("install_texttest","Installation guide","Step-by-step what you need to install"); ?> 
                                         <?php  printLI("troubleshooting","Troubleshooting","Diagnosing problems using TextTest's internal logging"); ?> 
                                         <br><br><div class="Table_Text_Header">Tutorials</div>
					 <?php  printLI("getting_started","Getting Started","A walk-through of how to test a hello-world program with TextTest"); ?>
					 <?php  printLI("gui_tests","Testing a GUI","How to test a simple GUI. Assumes you have read the simpler tutorial above"); ?>
 				         <?php  printLI("kataminesweeper","Screencast","Solving Kata Minesweeper with test-driven development using TextTest"); ?>
				</div>
		      </td>
		      <td>
		      <div class="Table_Text_Normal">
			    	 <?php  printLI("about_testsuites","Understanding Test Suites","The files and directories that make up a TextTest suite"); ?>
			    	 <?php  printLI("texttest_sandbox","Managing test data","The TextTest sandbox : providing test data and avoiding global effects"); ?>
			    	 <?php  printLI("file_collation_and_text_filtering","Collating and Filtering","Configuring which files are compared and how they are compared"); ?>
			    	 <?php  printLI("guide_to_texttest_ui","The User Interfaces","A walk-through the user interfaces and how to use and configure them"); ?>
			    	 <?php  printLI("running_texttest_unattended","Running unattended","Guide to Batch Mode. Produces plain text and HTML reports of unattended runs "); ?>
			    	 <?php  printLI("faking_it_with_texttest","Mocking things out","How to 'mock out' external programs and subsystems for determinism, speed, etc."); ?>
			    	 <?php  printLI("making_the_logging_configurable","Configuring the logging","Configuring your test logging using log4x-style configuration files"); ?>
			    	 <?php  printLI("measuring_system_resource_usage","CPU time and memory","Checking that your tests stay within certain bounds for CPU time or memory usage"); ?>
			    	 <?php  printLI("automatic_failure_interpretation","Automatic failure interpretation","Associating certain textual patterns with problem descriptions, or reported bugs"); ?>
			    	 <?php  printLI("running_tests_in_parallel","Running tests in parallel","Using Sun Grid Engine or LSF to run all your tests in parallel"); ?>
			    	 <?php  printLI("writing_a_config_module","Write your own configuration","Using the Python-framework aspect of Texttest to override parts of its behaviour"); ?>
			
		      </div>
		      </td>
		      <td>
		       <div class="Table_Text_Normal">

				<b>Default Configuration:</b>
			    	 <?php  printLI("configfile_default","Config files","Table of all possible entries for application and personal config files"); ?>
				 <?php  printLI("options_default","Running/selecting options","Table of all options used when running or selecting tests"); ?>
				 <?php  printLI("scripts_default","Plugin scripts","Table of all provided scripts for analysing or updating test suites"); ?>
				 <br><br>
                                 <b>Queuesystem Configuration:</b>
				 <a href="index.php?page=<?php echo $version; ?>&n=queuesystem" class="Text_Link">(description)</a>
			         <?php  printLI("configfile_queuesystem","Config files","Table of all possible entries for application and personal config files"); ?>
				 <?php  printLI("options_queuesystem","Running/selecting options","Table of all options used when running or selecting tests"); ?>
				 <?php  printLI("scripts_queuesystem","Plugin scripts","Table of all provided scripts for analysing or updating test suites"); ?>
				 

		      </div>
		      </td>
		      
		  </tr>
           </table>
	  
            
         </td>
        </tr>
      </table>
  
      </div>
      </div>
         <?php printOldVersions($texttest_version,$all_releases); ?>  

      <br>
	<?php 
	  checkGET();
	
	  if ($path == "not_set") include_404_page();
     elseif  ($path == "no_needed") include_file($basePath."/main.php");
     else include_file($path); 

	?>                  
    </td>
  </tr>
</table>

