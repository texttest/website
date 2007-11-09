<!--TITLE:Publications PAGEINFO:Here you will find publications and presenstions about texttest and read about events PATH:page=publications-->

 <table class="Table_Normal">
 <tr>
  <td>
   
   <?php
   
   
   if (isset($_GET['n']))
   {
   	if ($_GET['n'] == "best_practice") include 'include/publications/bestpractices.htm';
   	else include 'include/publications/main.htm';
   }
   else include 'include/publications/main.htm';

  ?>
   </td>
 </tr>
</table>
