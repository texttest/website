<?php
  //Decides version of documents in $basePath
  $texttest_version = "3.10";
  $version = convertToDocFormat($texttest_version);
    
  //Internal varibles
  $doHide  = false;

  
  //Should be easy to autogenerate
  $basePath = "include/documentation/".$version."/";
  if (isset($_GET['n'])) $path = "not_set";
  else $path = "no_needed";

  
  function hideDocTable()
  {
    print "<script language=\"javascript\">openClose('DocTable')</script>";
    print "<script language=\"javascript\">openClose('ControlTable')</script>";

  }
   
  function printLI($n,$realName,$title)
  {
    global $path,$basePath,$doHide,$version;
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
	print "<a class=\"Text_Link\" title=\"".$realName."\" href=\"index.php?page=".$version."&n=".$n."\">".$realName."</a>";  
   
  }
  //Check $_GET
  function checkGET()
  {
    global $path,$basePath,$doHide;
    if (isset($_GET['n']))
    {
    	$doHide = true;
    	if ($_GET['n'] == "old_versions") $path=$basePath."old_versions.php";
     	elseif ($_GET['n'] == "queuesystem") $path=$basePath."queuesystem.php";
     
    }
    if ($doHide) hideDocTable();
  }
 

?>

<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Documentation for <?php echo $texttest_version ?></div>
   <div class="Text_Normal">
   Find documentation for other versions <a class="Text_Link" href="index.php?page=documentation&n=old_versions">here</a>
   </div>
   <div style="display:none" class="Text_Header" id="ControlTable">
   Index <a class="Text_Link" onclick="openClose('ControlTable');openClose('DocTable')">(Show)</a>
   </div>
   <div id="DocTable">
   <div class="Text_Header" >  
   Index <a class="Text_Link" onclick="openClose('ControlTable');openClose('DocTable')">(Hide)</a>
   </div>
   <div class="Text_Normal">
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

				<b>Default Configuration:</b>
			    	 <?php  printLI("options_default","Options when submitting test runs","Tooltip title"); ?>
				 <?php  printLI("configfile_default","Possible entries for config files","Tooltip title"); ?>
				 <?php  printLI("scripts_default","List of plugin scripts","Tooltip title"); ?>
				 <br><br>
                                 <b>Queuesystem Configuration:</b>
				 <a href="index.php?page=<?php echo $version; ?>&n=queuesystem" class="Text_Link">(description)</a>
			         <?php  printLI("options_queuesystem","Options when submitting test runs","Tooltip title"); ?>
				 <?php  printLI("configfile_queuesystem","Possible entries for config files","Tooltip title"); ?>
				 <?php  printLI("scripts_queuesystem","List of plugin scripts","Tooltip title"); ?>
				 

		      </div>
		      </td>
		      
		  </tr>
           </table>
	  
            
         </td>
        </tr>
      </table>
  
      </div>
      </div>

      <br>
	<?php 
	  checkGET();
	
	  if ($path == "not_set") include_404_page();
     elseif  ($path == "no_needed") include $basePath."/main.php";
     else include($path); 

	?>                  
    </td>
  </tr>
</table>

