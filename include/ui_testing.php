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
              <td width=250><div class="Table_Text_Header">Introduction</div></td>
              <td width=220><div class="Table_Text_Header">PyUseCase Docs</div></td>
              <td width=160><div class="Table_Text_Header">Other Tools</div></td>
            </tr>
            
	    <tr>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("xusecase","The xUseCase idea","Driving a GUI with a Use-Case Recorder"); ?>  
                  <br><br><div class="Table_Text_Header">xUseCase Concepts</div>
	          <?php  printLI("appevents","Application Events", "Multi-threaded simulation with Application Events"); ?>
                  <?php  printLI("shortcuts","GUI shortcuts", "Test refactoring and macro recording with GUI shortcuts"); ?>
	        </div>
	      </td>
	      <td>
	        <div class="Table_Text_Normal">
                  <?php  printLI("pyusecase","PyUseCase for PyGTK","Driving a PyGTK Python GUI with PyUseCase"); ?>	
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
