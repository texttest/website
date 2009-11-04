<div class="Text_Main_Header">List of possible entries for personal config files:</div>
<div class="Text_Header"><i>(these will be rejected if entered into application config files)</i></div>
<TABLE bgcolor="#666666" cellpadding=1 cellspacing=1>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Entry name</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Type</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">Default Value</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Brief text (links to documentation)</div>
		</TD>
	</TR>	
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">auto_collapse_successful</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">1</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#auto_collapse_successful">Automatically collapse successful test suites?</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">file_colours</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">default : red<BR>failure : red<BR>marked : orange<BR>not_started : white<BR>pending : white<BR>running : yellow<BR>static : grey90<BR>success : green</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#file_colours">Colours to use for each file state</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">gui_accelerators</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">add_test : &lt;control&gt;n<BR>copy : &lt;control&gt;c<BR>cut : &lt;control&gt;x<BR>enter_failure_information : &lt;control&gt;i<BR>filter : &lt;control&gt;f<BR>kill : &lt;control&gt;Delete<BR>load_selection : &lt;control&gt;&lt;shift&gt;o<BR>mark : &lt;control&gt;&lt;shift&gt;m<BR>move_down : &lt;control&gt;Page_Down<BR>move_to_first : &lt;control&gt;Home<BR>move_to_last : &lt;control&gt;End<BR>move_up : &lt;control&gt;Page_Up<BR>paste : &lt;control&gt;v<BR>quit : &lt;control&gt;q<BR>recompute_status : F5<BR>reconnect : &lt;control&gt;&lt;shift&gt;r<BR>record_use-case : F9<BR>refresh : F5<BR>remove_files : &lt;control&gt;Delete<BR>remove_tests : &lt;control&gt;Delete<BR>rename_test : &lt;control&gt;m<BR>rerun : &lt;control&gt;r<BR>reset : &lt;control&gt;e<BR>run : &lt;control&gt;r<BR>save : &lt;control&gt;s<BR>save_as : &lt;control&gt;&lt;alt&gt;s<BR>save_selection : &lt;control&gt;d<BR>select : &lt;control&gt;s<BR>unmark : &lt;control&gt;&lt;shift&gt;u</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#gui_accelerators">Custom action accelerators.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">gui_entry_completion_inline</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#gui_entry_completion_inline">Automatically inline common completion prefix in entry.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">gui_entry_completion_matching</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">1</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#gui_entry_completion_matching">Which matching type to use for entry completion. 0 means turn entry completions off, 1 means match the start of possible completions, 2 means match any part of possible completions</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">gui_entry_completions</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#gui_entry_completions">Add these completions to the entry completion lists initially</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">hide_gui_element</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">shortcut_bar : 0<BR>status_bar : 0<BR>toolbar : 0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#hide_gui_element">List of widgets to hide by default</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">hide_test_category</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#hide_test_category">Categories of tests which should not appear in the dynamic GUI test view</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">query_kill_processes</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">default : &lt;empty&gt;<BR>static : Dynamic GUI</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#query_kill_processes">Ask about whether to kill these processes when exiting texttest.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">sort_test_suites_recursively</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">1</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#sort_test_suites_recursively">Sort subsuites when sorting test suites</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">static_collapse_suites</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#static_collapse_suites">Whether or not the static GUI will show everything collapsed</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">test_colours</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">default : red<BR>failure : red<BR>marked : orange<BR>not_started : white<BR>pending : white<BR>running : yellow<BR>static : grey90<BR>success : green</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#test_colours">Colours to use for each test state</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">window_size</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">height_pixels : &lt;not set&gt;<BR>height_screen : 0.833333333333<BR>horizontal_separator_position : 0.46<BR>maximize : 0<BR>vertical_separator_position : 0.5<BR>width_pixels : &lt;not set&gt;<BR>width_screen : 0.6</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#window_size">To set the initial size of the dynamic/static GUI.</A></div>
		</TD>
	</TR>
</TABLE>
