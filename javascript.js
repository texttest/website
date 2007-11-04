function lastUpdated() 
{
	var m = "Last updated: " + document.lastModified; 
	var p = m.length-8; 
	document.write(m.substring(p, 0)); 
}
function openClose(id)
	{var obj = "";	 
 
		// Check browser compatibility
		if(document.getElementById)
			obj = document.getElementById(id).style; 
		else if(document.all) 
			obj = document.all[id]; 
		else if(document.layers)
			obj = document.layers[id]; 
		else
			return 1; 
			 
		// Do the magic :) 
		if(obj.display == "")
			obj.display = "none"; 
		else if(obj.display != "none") 
			obj.display = "none"; 
		else
			obj.display = "block";} 