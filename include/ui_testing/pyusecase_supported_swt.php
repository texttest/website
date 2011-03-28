<div class="Text_Header">SWT Widgets and event types supported for record/replay</div>
<div class="Text_Normal">The following lists the SWT widget types and the associated event types on them which 
PyUseCase trunk is currently capable of recording and replaying. Any type derived from the listed
types is also supported.
</div>
<div class="Text_Normal"><table border=1 cellpadding=1 cellspacing=1>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/custom/CTabFolder.html>org.eclipse.swt.custom.CTabFolder</a></td><td><div class="Table_Text_Normal">Selection</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/custom/CTabItem.html>org.eclipse.swt.custom.CTabItem</a></td><td><div class="Table_Text_Normal">Dispose</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html>org.eclipse.swt.widgets.Button</a></td><td><div class="Table_Text_Normal">Selection</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Combo.html>org.eclipse.swt.widgets.Combo</a></td><td><div class="Table_Text_Normal">Modify</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/DateTime.html>org.eclipse.swt.widgets.DateTime</a></td><td><div class="Table_Text_Normal">Selection</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/ExpandBar.html>org.eclipse.swt.widgets.ExpandBar</a></td><td><div class="Table_Text_Normal">Collapse , Expand</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Link.html>org.eclipse.swt.widgets.Link</a></td><td><div class="Table_Text_Normal">Selection</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/List.html>org.eclipse.swt.widgets.List</a></td><td><div class="Table_Text_Normal">Selection</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/MenuItem.html>org.eclipse.swt.widgets.MenuItem</a></td><td><div class="Table_Text_Normal">Selection</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Shell.html>org.eclipse.swt.widgets.Shell</a></td><td><div class="Table_Text_Normal">Close , Resize</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Text.html>org.eclipse.swt.widgets.Text</a></td><td><div class="Table_Text_Normal">Modify</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/ToolItem.html>org.eclipse.swt.widgets.ToolItem</a></td><td><div class="Table_Text_Normal">Selection</div></td></tr>
<tr><td><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Tree.html>org.eclipse.swt.widgets.Tree</a></td><td><div class="Table_Text_Normal">Collapse , DefaultSelection , Expand , Selection</div></td></tr>
</table></div>
<div class="Text_Header">SWT Widgets supported for automatic logging</div>
<div class="Text_Normal">
The following lists the SWT widget types whose status and changes PyUseCase trunk is 
currently capable of monitoring and logging. Any type derived from the listed types 
is also supported but will only have features of the listed type described.
</div>
<div class="Text_Normal">
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/browser/Browser.html>org.eclipse.swt.browser.Browser</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/custom/CLabel.html>org.eclipse.swt.custom.CLabel</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/custom/CTabFolder.html>org.eclipse.swt.custom.CTabFolder</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Button.html>org.eclipse.swt.widgets.Button</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Canvas.html>org.eclipse.swt.widgets.Canvas</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Combo.html>org.eclipse.swt.widgets.Combo</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Composite.html>org.eclipse.swt.widgets.Composite</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/CoolBar.html>org.eclipse.swt.widgets.CoolBar</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/DateTime.html>org.eclipse.swt.widgets.DateTime</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/ExpandBar.html>org.eclipse.swt.widgets.ExpandBar</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Label.html>org.eclipse.swt.widgets.Label</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Link.html>org.eclipse.swt.widgets.Link</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/List.html>org.eclipse.swt.widgets.List</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Menu.html>org.eclipse.swt.widgets.Menu</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Sash.html>org.eclipse.swt.widgets.Sash</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Shell.html>org.eclipse.swt.widgets.Shell</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Text.html>org.eclipse.swt.widgets.Text</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/ToolBar.html>org.eclipse.swt.widgets.ToolBar</a>
<li><a class="Text_Link" href=http://help.eclipse.org/helios/index.jsp?topic=/org.eclipse.platform.doc.isv/reference/api/org/eclipse/swt/widgets/Tree.html>org.eclipse.swt.widgets.Tree</a>
</div><div class="Text_Normal"><i>(Note that a textual version of this page can be auto-generated by running "pyusecase -s -i javaswt")</i></div>
