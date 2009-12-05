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
    <div class="Text_Main_Header">Testing GUIs with TextTest and xUseCase</div>
    <div class="Text_Normal">
    <table border=0 bgcolor="#000000" cellspacing=1>
      <tr valign=top>
        <td bgcolor="#FFFFFF">
          
          <table border=0 class="documentation_table">
            <tr>
              <td width=220><div class="Table_Text_Header">Introduction</div></td>
              <td width=250><div class="Table_Text_Header">PyUseCase Docs</div></td>
              <td width=160><div class="Table_Text_Header">Other Tools</div></td>
            </tr>
            
	    <tr>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("xusecase","The xUseCase idea","Driving a GUI with a Use-Case Recorder"); ?>  
                  <?php  printLI("problems","FAQ","Frequently asked questions relating to the xUseCase as a concept"); ?>  
                  <br><br><div class="Table_Text_Header">xUseCase Concepts</div>
	          <?php  printLI("appevents","Application Events", "Multi-threaded simulation with Application Events"); ?>
                  <?php  printLI("shortcuts","GUI shortcuts", "Test refactoring and macro recording with GUI shortcuts"); ?>
	        </div>
	      </td>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("pyusecase_download","Download and install","Get the latest stable release of PyUseCase from SourceForge, or the latest code from Launchpad"); ?>
                  <?php  printLI("pyusecase_intro","Basic command-line usage","Using PyUseCase on the command line"); ?>
	          <?php  printLI("pyusecase_texttest","Usage with TextTest", "Using PyUseCase together with TextTest to create tests"); ?>
                  <?php  printLI("pyusecase_additional","Additional Features", "How to do Application Events, GUI shortcuts and signal recording in PyUseCase"); ?>
                  <?php  printLI("pyusecase_friendly_coding","PyUseCase-friendly coding", "Tips to developers for how to write code that will create nice tests with PyUseCase"); ?>
                  <?php  printLI("pyusecase_supported","Supported Widgets", "PyGTK widgets supported by current version of PyUseCase, for record/playback and auto-logging"); ?>
                </div>
	      </td>
	      <td>
	        <div class="Table_Text_Normal">
                  <li> <A class="Text_Link" href="http://jusecase.sourceforge.net">JUseCase for Java</A>
                  <li> <A class="Text_Link" href="http://sourceforge.net/projects/nusecase">nUseCase for .net</A>
                  <li> <A class="Text_Link" href="index.php?page=<?php echo convertToDocFormat($current_release); ?>">TextTest</A>
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
       elseif  ($path == "no_needed") include_file ('include/ui_testing/xusecase.php');
       else include_file($path); 
       ?>
				
  </td>
 </tr>
</table>
