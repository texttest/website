<!-- background="images/nav_back.png"  -->
<table border="0" class="Table_Normal_Header" >
  <tr valign="top">
	 <td>
	   <div class="Table_Text_Small"><i>
	   
	   Navigation:
	   <a class="Link_Normal_Small" href="index.php">home</a>
	   <?php 
	   	if (isset($_GET['page']))
	   	{
	   		print " > ";
	   		print "<a class=\"Link_Normal_Small\" href=\"index.php?page=".$_GET['page']."\">".$_GET['page']."</a>";
	   		
	   		if (isset($_GET['n']))
	   		{
	   			print " > ";
	   			print "<a class=\"Link_Normal_Small\" href=\"index.php?page=".$_GET['page']."&n=".$_GET['n']."\">".$_GET['n']."</a>";
	   		
	   		}
	   	}
	   ?>	   
	   </i></div>
	 </td>
  </tr>
</table>