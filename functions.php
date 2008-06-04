<?php

//Convert to documenation format
function convertToDocFormat($release)
{
	$converted_release = str_replace(".","_",$release);
	return "documentation_".$converted_release;
}

function include_404_page()
{
	include "404.htm";
}

function print_last_updated()
{	
	global $all_releases;
	print "Last updated: ";
	
	$filename = 'include/main.php';
	if (isset($_GET['page'])) 
	{
		$page_leads_to_docs = false;
		foreach($all_releases as $release)
		{
			if (convertToDocFormat($release) == ($_GET['page']))
			{
				$page_leads_to_docs  = true;
				if (isset($_GET['n'])) 
					$filename = "include/documentation/".$_GET['page']."/".$_GET['n'].".php";
				else 
					$filename = "include/documentation/".$_GET['page'].".php";
			}
		}
		if (!($page_leads_to_docs))
		{	
			if (isset($_GET['n'])) 
				$filename = "include/".$_GET['page']."/".$_GET['n'].".php";
			else
				$filename = "include/".$_GET['page'].".php";
		}
	}
	if (file_exists($filename)) print  date ("d F Y", filemtime($filename));
	else print "Not available\n<!--Did not find ".$filename."--><!--FUNCTION_LAST_UPDATED_DID_NOT_WORK-->\n";

}

function include_file($file)
{
	global $all_releases;
	global $current_release;

	if (isset($GLOBALS['basePath']))           global $basePath;
	if (isset($GLOBALS['texttest_version'] ))  global $texttest_version; 
	if (isset($GLOBALS['version']))            global $version;
		
	if (file_exists($file))
		include $file;
	else
		include_404_page();
	
}
function codeSampleBegin()
{
	print '<PRE STYLE="border: 1px solid #000000; padding: 0.02in">';
}
function codeSampleEnd()
{
	print "</PRE>";
}
?>