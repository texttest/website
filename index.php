<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
include 'settings.php';
include 'functions.php';


//Used for testing internal links (scripts/check_php_links.py)
if (isset ($argv))
	for ($i=1;$i<count($argv);$i++)
	{
		print "-----------------INTERNAL-TESTNING-----------------------";
		$it = split("=",$argv[$i]);
		$_GET[$it[0]] = $it[1];
	}

?>

<html>
 <script language="javascript" type="text/javascript" src="javascript.js"></script>
 <head>
  <title> Texttest.org </title>
    <link rel=STYLESHEET href="stylefile.css" TYPE="text/css">
    <link href="images/logo.ico" type="image/ico" rel="icon">
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
								if ($_GET["page"]=="main")                     include_file ('include/main.php');
								elseif ($_GET["page"]=="news")                 include_file('include/news.php');
								elseif ($_GET["page"]=="download")             include_file('include/download.php');
								elseif ($_GET["page"]=="contact")              include_file('include/contact.php');
								elseif ($_GET["page"]=="publications")         include_file('include/publications.php');
								elseif ($_GET["page"]=="siteinfo")             include_file('include/siteinfo.php');
								elseif ($_GET["page"]=="sitemap")              include_file('include/sitemap.php');
								elseif ($_GET["page"]=="about")                include_file('include/about.php');
								elseif ($_GET["page"]=="concepts")             include     ('include/concepts.php');
								elseif ($_GET["page"]=="documentation")        include_file('include/documentation.php');
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
  		<div class="Steel"><?php echo "Last updated: " . date ("d F Y", getlastmod()); ?></div>
  	   <!-- date ("d F Y H:i:s.", getlastmod()); -->
      </td>     
           
      <td align=right>
        <div class="Steel">
           <a href="index.php?page=news">[news]</a>
           <a href="index.php?page=contact">[contact]</a>
           <a href="index.php?page=siteinfo">[site info]</a>
           <a href="index.php?page=sitemap">[sitemap]</a>
        </div>
      </td>
    </tr>
   </table>
   <!-- main table end -->
  </body>
</html>
