<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include 'php.functions';

//Current release here
$current_release = "3.9.1";

$all_releases = array();
array_push($all_releases, $current_release);
//New Releases here:
array_push($all_releases, "3.10");

?>

<html>
 <script language="javascript" type="text/javascript" src="javascript.js"></script>
 <head>
  <title> Texttest.org </title>
    <link rel=STYLESHEET href="stylefile.css" TYPE="text/css">
  </head>                                                    

  <body background="images/back.png">
   <!-- main table -->
   <table cellspacing=0 align=center  border=0>
    <tr>
     <td colspan=2>
      <?php include 'menu.php'; ?>
     </td>
    </tr>
    <tr>
     <td colspan=2>
      <?php include 'nav.php'; ?>
     </td>
    </tr>
    <tr>
      <td colspan=2>
       <table cellpadding=0 cellspacing=1 bgcolor="#000000">
         <tr>
           <td bgcolor="#FFFFFF">
              <?php
              	
              		
                  if (!(isset($_GET["page"])))            		     include 'include/main.php';
  						else
  						{
  							$pageFound = false;
                  	foreach ($all_releases as $release)
                  	{
                  		$rel = convertToDocFormat($release);
                  		if ($rel == $_GET["page"])                  
                  		{
                  			include 'include/documentation/'.$rel.'.php';
                  			$pageFound = true;
                  		}
                  	}
                  	if (! $pageFound)
                  	{
								if ($_GET["page"]=="main")                     include 'include/main.php';
								elseif ($_GET["page"]=="news")                 include 'include/news.php';
								elseif ($_GET["page"]=="download")             include 'include/download.php';
								elseif ($_GET["page"]=="contact")              include 'include/contact.php';
								elseif ($_GET["page"]=="publications")         include 'include/publications.php';
								elseif ($_GET["page"]=="siteinfo")             include 'include/siteinfo.php';
								elseif ($_GET["page"]=="sitemap")              include 'include/sitemap.php';
								elseif ($_GET["page"]=="about")                include 'include/about.php';
								elseif ($_GET["page"]=="concepts")             include 'include/concepts.php';
								elseif ($_GET["page"]=="documentation")             include 'include/documentation.php';
								else                                           include_404_page();
							}
						}                                           
	      ?>
	         <br><br>
	         </td>
         </tr>
        </table>
     </td>
    </tr>
    <tr valign=bottom>
      <td align=left>
  <div class="Footer">Last updated:
       <script language="JavaScript" type="text/javascript">  lastUpdated()   </script> </div>
      </td>     
           
      <td align=right>
        <div class="Footer">
           <a href="index.php?page=news">[news]</a>
           <a href="index.php?page=contact">[contact]</a>
          <a href="index.php?page=siteinfo">[site info]</a>
          <!--<a href="index.php?page=sitemap">[sitemap]</a>-->
        </div>
      </td>
    </tr>
   </table>
   <!-- main table end -->
  </body>
</html>