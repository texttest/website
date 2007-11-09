<!-- Created by Henning Thornbad -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <script language="javascript" type="text/javascript" src="javascript.js"></script>
 <head>
  <title> Texttest.org </title>
    <link rel=STYLESHEET href="stylefile.css" TYPE="text/css">
  </head>                                                    

  <body background="images/back.png">
   <!-- main table -->
   <table cellspacing=5 align=center  border=0>
    <tr>
     <!-- header -->
     <td colspan=2>
      <?php include 'head.htm'; ?>
     </td>
    </tr>
    <tr valign=top>
     <td colspan=2>
      <?php include 'menu.htm'; ?>
     </td>
     <td>
    </tr>
    <tr>
      <td colspan=2>
       <table cellspadding=0 cellspacing=1 bgcolor="#000000">
         <tr>
           <td bgcolor="#FFFFFF">
              <?php
                  if (!(isset($_GET["page"])))            include 'include/main.htm';
						elseif ($_GET["page"]=="news")                 include 'include/news.htm';
						elseif ($_GET["page"]=="documentation_3_9_1")  include 'include/documentation/documentation_3_9_1.php';
						elseif ($_GET["page"]=="download")             include 'include/download.htm';
						elseif ($_GET["page"]=="contact")              include 'include/contact.htm';
						elseif ($_GET["page"]=="publications")         include 'include/publications.php';
						elseif ($_GET["page"]=="siteinfo")             include 'include/siteinfo.htm';
						elseif ($_GET["page"]=="sitemap")              include 'include/sitemap.htm';
						elseif ($_GET["page"]=="about")                include 'include/about.htm';
						elseif ($_GET["page"]=="concepts")             include 'include/concepts.php';
						else                                           include 'include/main.htm';
	      ?>
           </td>
         </tr>
        </table>
     </td>
    </tr>
    <tr valign=bottom>
      <td align=left>
       <div class="Footer">
       <script language="JavaScript">  lastUpdated()   </script> </div>
      </td>     
           
      <td align=right>
        <div class="Footer">
           <a href=index.php?page=news>[news]</a>
           <a href=index.php?page=contact>[contact]</a>
          <a href=index.php?page=siteinfo>[site info]</a>
          <a href=index.php?page=sitemap>[sitemap]</a>
        </div>
      </td>
    </tr>
   </table>
   <!-- main table end -->
  </body>
</html>