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

function include_file($file)
{
	global $all_releases;
	global $current_release;

	if (isset($GLOBALS['basePath']))           global $basePath;
	if (isset($GLOBALS['texttest_version'] ))  global $texttest_version; 
	if (isset($GLOBALS['version']))            Global $version;
		
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