<!--TITLE:Publications PAGEINFO:Here you will find publications and presenstions about texttest and read about events PATH:page=publications-->

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
