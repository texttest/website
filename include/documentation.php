<?php
  //Decides version of documents in $basePath
  $version = "documentation"; 
  //$version = "documentation_3_18";
  
  //Should be easy to autogenerate
  $basePath = "include/documentation/";
  $path = $basePath."main.php";
  
  function printLI($n,$realName)
  {
    global $path,$basePath;
    print "<li";
    if ($_GET['n'] == $n) 
    { 
   	  print " class=\"marked\""; 
	  $path = $basePath.$n.".php"; 
    }
	print ">\n";
	print "<a class=\"Text_Link\" href=\"index.php?page=documentation&n=".$n."\">".$realName."</a>";  	 
  }
  
?>

<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Documentation</div>
   <div class="Text_Normal">
   This is the documentation for the current version of Texttest, which is 3.8.
   (Find older versions here (future link))
   
   As a beginner you should start from Installing texttest. Even if you already have 
   it is always a good idea to double check so that you have not forgotten some details.
   </div>
   <div class="Text_Normal">  
   <table border=0 bgcolor="#000000" cellspacing=1>
      <tr valign=top>
        <td bgcolor="#FFFFFF">
          <table border=0 class="documentation_table">
            <tr>
              <td width=150 ><div class="Table_Text_Header">Tutorials</div></td>
              <td width=230><div class="Table_Text_Header">Guides</div></td>
              <td width=250><div class="Table_Text_Header">References</div></td>
            </tr>
            <tr>
              <td><div class="Table_Text_Description">(beginners)</div></td>
              <td><div class="Table_Text_Description">(advance)</div></td>
              <td><div class="Table_Text_Description">(expert)</div></td>
            </tr>
			<tr>
			  <td>
			  	<div class="Table_Text_Normal">
			    		 <?php  printLI("install_texttest","Install Texttest"); ?>
					 <?php  printLI("getting_started","Getting Started"); ?>
					 <?php  printLI("gui_tests","Testing a GUI"); ?>					 
				</div>
		      </td>
		      <td>
		      <div class="Table_Text_Normal">
			    	 <?php  printLI("about_testsuites","Understanding Testsuites"); ?>
			    	 <?php  printLI("texttest_sandbox","The Texttest Sandbox"); ?>
			    	 <?php  printLI("file_collation_and_text_filtering","File collation and Text Filtering"); ?>
			    	 <?php  printLI("guide_to_texttest_ui","Guide to Texttest UI"); ?>
			    	 <?php  printLI("running_texttest_unattended","Running Texttest unattended"); ?>
			    	 <?php  printLI("faking_it_with_texttest","Faking with Texttest"); ?>
			    	 <?php  printLI("making_the_logging_configurable","Making the logging configurable"); ?>
			    	 <?php  printLI("measuring_system_resource_usage","Measuring performance"); ?>
			    	 <?php  printLI("automatic_failure_interpretation","Detect bugs"); ?>
			    	 <?php  printLI("running_test_in_parallell","Running tests in parallell"); ?>
			    	 <?php  printLI("writing_a_own_config_module","Write your own configuration"); ?>
			
		      </div>
		      </td>
		      <td>
		       <div class="Table_Text_Normal">
			    	 <?php  printLI("options","Options when submitting test runs"); ?>
				 <?php  printLI("configfile","Possible entries for config files"); ?>
				 <?php  printLI("scripts","List of plugin scripts"); ?>

		      </div>
		      </td>
		      
		  </tr>
           </table>
            
         </td>
        </tr>
      </table>
      </div>
      <br>
	<?php include $path; ?>                   
    </td>
  </tr>
</table>

