<div class="Text_Header">PyGTK Widgets and signals supported for record/replay</div>
<div class="Text_Normal">The following lists the PyGTK widget types and the associated signals on them which 
PyUseCase trunk is currently capable of recording and replaying. Any type derived from the listed
types is also supported.
</div>
<div class="Text_Normal"><table border=1 cellpadding=1 cellspacing=1>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkbutton.html>gtk.Button</a></td><td><div class="Table_Text_Normal">clicked</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkcellrenderertext.html>gtk.CellRendererText</a></td><td><div class="Table_Text_Normal">edited</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkcellrenderertoggle.html>gtk.CellRendererToggle</a></td><td><div class="Table_Text_Normal">toggled</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkcheckmenuitem.html>gtk.CheckMenuItem</a></td><td><div class="Table_Text_Normal">toggled</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkcombobox.html>gtk.ComboBox</a></td><td><div class="Table_Text_Normal">changed</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkdialog.html>gtk.Dialog</a></td><td><div class="Table_Text_Normal">delete-event , response</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkentry.html>gtk.Entry</a></td><td><div class="Table_Text_Normal">activate , changed</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkfilechooser.html>gtk.FileChooser</a></td><td><div class="Table_Text_Normal">current-folder-changed , current-name-changed , selection-changed</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkmenuitem.html>gtk.MenuItem</a></td><td><div class="Table_Text_Normal">activate</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtknotebook.html>gtk.Notebook</a></td><td><div class="Table_Text_Normal">switch-page</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkpaned.html>gtk.Paned</a></td><td><div class="Table_Text_Normal">notify::position</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktogglebutton.html>gtk.ToggleButton</a></td><td><div class="Table_Text_Normal">toggled</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktoolbutton.html>gtk.ToolButton</a></td><td><div class="Table_Text_Normal">clicked</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktreeselection.html>gtk.TreeSelection</a></td><td><div class="Table_Text_Normal">changed</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktreeview.html>gtk.TreeView</a></td><td><div class="Table_Text_Normal">button-press-event , row-activated , row-collapsed , row-expanded</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktreeviewcolumn.html>gtk.TreeViewColumn</a></td><td><div class="Table_Text_Normal">clicked</div></td></tr>
<tr><td><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkwindow.html>gtk.Window</a></td><td><div class="Table_Text_Normal">delete-event</div></td></tr>
</table></div>
<div class="Text_Header">PyGTK Widgets supported for automatic logging</div>
<div class="Text_Normal">
The following lists the PyGTK widget types whose status and changes PyUseCase trunk is 
currently capable of monitoring and logging. Any type derived from the listed types 
is also supported but will only have features of the listed type described.
</div>
<div class="Text_Normal">
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkbutton.html>gtk.Button</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkcellview.html>gtk.CellView</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkcheckmenuitem.html>gtk.CheckMenuItem</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkcombobox.html>gtk.ComboBox</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkcomboboxentry.html>gtk.ComboBoxEntry</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkcontainer.html>gtk.Container</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkentry.html>gtk.Entry</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkexpander.html>gtk.Expander</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkfilechooser.html>gtk.FileChooser</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkframe.html>gtk.Frame</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkimage.html>gtk.Image</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtklabel.html>gtk.Label</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkmenubar.html>gtk.MenuBar</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkmenuitem.html>gtk.MenuItem</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtknotebook.html>gtk.Notebook</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkprogressbar.html>gtk.ProgressBar</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkseparator.html>gtk.Separator</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkseparatormenuitem.html>gtk.SeparatorMenuItem</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtkseparatortoolitem.html>gtk.SeparatorToolItem</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktable.html>gtk.Table</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktextview.html>gtk.TextView</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktogglebutton.html>gtk.ToggleButton</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktoggletoolbutton.html>gtk.ToggleToolButton</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktoolbutton.html>gtk.ToolButton</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktoolitem.html>gtk.ToolItem</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktoolbar.html>gtk.Toolbar</a>
<li><a class="Text_Link" href=http://library.gnome.org/devel/pygtk/stable/class-gtktreeview.html>gtk.TreeView</a>
</div><div class="Text_Normal"><i>(Note that a textual version of this page can be auto-generated by running "pyusecase -s")</i></div>
