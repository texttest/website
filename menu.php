<table border="0" class="Table_Normal_Header" background="images/logo.png">
  <tr valign="top" height="50">
	 <td align="right">
           <form method="get" action="http://www.google.com/search">
             <input type="hidden" name="sitesearch" value="texttest.carmen.se" />
             <input type="text"   name="q" size="15" maxlength="255" value="" />
             <input type="submit" value="Search Site" />
           </form>
         </td>
  </tr>
  <tr valign="bottom">   
	 <td>
      <table align=center  border="0">
       <tr>
        <td>
            <div class="Menu_Header_Link"><a href="index.php?page=main">Home</a></div>
        </td>
        <td>
            <div class="Menu_Header_Link"><a  href="index.php?page=about">About</a></div>
        </td>
        <td>  
            <div class="Menu_Header_Link"> <a href="index.php?page=<?php echo convertToDocFormat($current_release); ?>">TextTest/docs</a></div>
            
        </td> 
        <td>
            <div class="Menu_Header_Link"><a  href="index.php?page=ui_testing">StoryText</a></div>
        </td>
        <td>
             <div class="Menu_Header_Link"> <a href="index.php?page=capturemock">CaptureMock</a></div>
          
        </td>
        <td>
           <div class="Menu_Header_Link"> <a href="index.php?page=download">Download</a></div>
        </td> 
       </tr>
      </table>
    </td>
  </tr>
</table>
