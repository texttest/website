<!-- <div class="Text_Header">Publications</div>-->
 <table class="Table_Normal">
 <tr>
  <td>
   
   <?php
   
   
   if (isset($_GET['n']))
   {
   	if ($_GET['n'] == "bestpractices") include 'include/publications/bestpractices.php';
   	else include 'include/publications/main.php';
   }
   else include 'include/publications/main.php';

  ?>
   </td>
 </tr>
</table>
