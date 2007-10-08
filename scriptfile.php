<script lanuage="text/javascript">

var timeout	= 200;
var closetimer	= 0;
var menuitem	= 0;

// open hidden layer
function openMenu(id)
{	
	// cancel close timer
	cancelCloseTime();

        // close old layer
	if(menuitem) closeMenu();

	// Check browser compatibility
        if(document.getElementById)
          menuitem = document.getElementById(id).style; 
        else if(document.all) 
          menuitem = document.all[id]; 
        else if(document.layers)
          menuitem = document.layers[id]; 
        else
          return 1; 
        
        //show menu
        if(menuitem.display == "")
          menuitem.display = "block"; 
        else if(menuitem.display != "block") 
          menuitem.display = "block"; 

}
// close showed layer
function closeMenu()
{
	if(menuitem) menuitem.display = 'none';
}

// go close timer
function closeMenuTime()
{
	closetimer = window.setTimeout(closeMenu, timeout);
}

// cancel close timer
function cancelCloseTime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = closeMenu; 
-->
</script>