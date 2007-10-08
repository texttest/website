<?php 
   $sign = "<li class=\"marked\">";
   $concepts = $why = $others= "<li>";
   if     ($_GET["n"]=="others")  {$n="others";   $others=$sign; }
   elseif ($_GET["n"]=="why")     {$n="why";      $why=$sign; }
   else                           {$n="concepts"; $concepts=$sign;}
?>

<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">The Concepts of Texttest: Accaptence Tests </div>		  
     <div class="Text_Normal"></div>
     <div class="Text_Normal">	
      <A class="Text_Link" HREF="index.php?page=concepts">         <?php print($concepts); ?><I>What is Acceptence Testing?</I></A><br>
      <A class="Text_Link" HREF="index.php?page=concepts&n=why">   <?php print($why);      ?><I>Why do I need Acceptance Tests?</I></A><br>
      <A class="Text_Link" HREF="index.php?page=concepts&n=others"><?php print($others);   ?><I>Our approach compared to others</I></A><br>
   </div>

   <?php 
     $path= "include/concepts/".$n.".htm";
     include($path); 
   ?>
				
    </td>
 </tr>
</table>