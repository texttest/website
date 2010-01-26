<!-- background="images/nav_back.png"  -->
<table border="0" class="Table_Normal_Header" >
  <tr valign="top">
	 <td>
	   <div class="Steel"><i>
	  

	   
	   Navigation:
	   <a href="index.php">home</a>
	   <?php 
	   
	      $current_page = str_replace("_"," ",$_GET['page']);
	  		if (isset($_GET['n'])) $current_n = str_replace("_"," ",$_GET['n']);
	  	
	  	
	   	if (isset($_GET['page']))
	   	{
	   		print ">";
	   		print "<a href=\"index.php?page=".$_GET['page']."\">".$current_page."</a>";
	   		
	   		if (isset($_GET['n']))
	   		{
	   			print ">";
	   			print "<a href=\"index.php?page=".$_GET['page']."&n=".$_GET['n']."\">".$current_n."</a>";
	   		
	   		}
	   	}
	   ?>	   
	   </i></div>
	 </td>
  </tr>
</table>
