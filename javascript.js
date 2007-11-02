function lastUpdated() 
{
	var m = "Last updated: " + document.lastModified; 
	var p = m.length-8; 
	document.write(m.substring(p, 0)); 
}
	