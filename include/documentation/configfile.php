<TABLE>

	<THEAD>
		<TR>
			<TD WIDTH=174 VALIGN=TOP>
				<IMG SRC="../../BANNER.JPG" NAME="Graphic2" ALIGN=LEFT WIDTH=213 HEIGHT=53 BORDER=0></TD>
			<TD COLSPAN=3  BGCOLOR="#ffffcc">
				<P ALIGN=CENTER><FONT SIZE=6><U><B>Full list of possible entries
				for config files</B></U></FONT></P>
			</TD>
		</TR>
	</THEAD>
	<TBODY>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER><U>Entry name</U></P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER><U>Type</U></P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER><U>Default Value</U></P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><U>Brief text (links to documentation)</U></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>auto_collapse_successful</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Int</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>1</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#auto_collapse_successful">Automatically collapse successful test suites?</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>auto_sort_test_suites</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Int</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>0</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="dirstructure.html#auto_sort_test_suites">Automatically sort test suites in alphabetical order. 1 means sort in ascending order, -1 means sort in descending order.</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>base_version</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="dirstructure.html#base_version">Versions to inherit settings from</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>batch_filter_file</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>None</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#batch_filter_file">Generic filter for batch session, more flexible than timelimit</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>batch_recipients</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>$USER@localhost</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#batch_recipients">Addresses to send mail to in batch mode</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>batch_result_repository</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#batch_result_repository">Directory to store historical batch results under</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>batch_sender</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>$USER@localhost</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#batch_sender">Sender address to use sending mail in batch mode</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>batch_timelimit</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>None</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#batch_timelimit">Maximum length of test to include in batch mode runs</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>batch_use_collection</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>false</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#batch_use_collection">Do we collect multiple mails into one in batch mode</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>batch_use_version_filtering</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>false</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#batch_use_version_filtering">Which batch sessions use the version filtering mechanism</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>batch_version</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#batch_version">List of versions to allow if batch_use_version_filtering enabled</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>binary</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="dirstructure.html#binary">Full path to the System Under Test</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>catalogue_process_string</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="comparison.html#catalogue_process_string">String for catalogue functionality to identify processes created</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>checkout_location</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="dirstructure.html#checkout_location">Absolute paths to look for checkouts under</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>collate_file</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Dictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>stacktrace : core* (UNIX)<BR>&lt;empty&gt; (Windows)</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="comparison.html#collate_file">Mapping of result file names to paths to collect them from</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>collate_script</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>default : &lt;empty&gt;<BR>stacktrace : interpretcore.py (UNIX)<BR>&lt;empty&gt; (Windows)</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="comparison.html#collate_script">Mapping of result file names to scripts which turn them into suitable text</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>collect_traffic</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="mockout.html#collect_traffic">List of command-line programs to intercept</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>collect_traffic_environment</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="mockout.html#collect_traffic_environment">Mapping of collected programs to environment variables they care about</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>config_module</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>default</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="configmodule.html#config_module">Configuration module to use</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>copy_test_path</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="tempdir.html#copy_test_path">Paths to be copied to the temporary directory when running tests</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>cputime_include_system_time</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Int</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>0</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="sysresource.html#cputime_include_system_time">Include system time when measuring CPU time?</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>create_catalogues</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>false</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="comparison.html#create_catalogues">Do we create a listing of files created/removed by tests</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>default_checkout</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="dirstructure.html#default_checkout">Default checkout, relative to the checkout location</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>default_interface</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>static_gui</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#default_interface">Which interface to start if none of -con, -g and -gx are provided</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>definition_file_stems</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>environment, testsuite, options, usecase, traffic, input, knownbugs, logging</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="configmodule.html#definition_file_stems">files to be shown as definition files by the static GUI</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>diagnostics</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Dictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>configuration_file_variable : &lt;empty&gt;<BR>trace_level_variable : &lt;empty&gt;<BR>write_directory_variable : &lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="diagnostics.html#diagnostics">Dictionary to define how SUT diagnostics are used</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>diff_program</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>tkdiff</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#diff_program">External program to use for graphical file comparison</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>discard_file</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="comparison.html#discard_file">List of generated result files which should not be compared</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>extra_version</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="dirstructure.html#extra_version">Versions to be run in addition to the one specified</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>failure_display_priority</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>99</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#failure_display_priority">Mapping of result files to which order they should be shown in the text info window.</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>failure_severity</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>errors : 1<BR>default : 99<BR>usecase : 2<BR>catalogue : 2<BR>output : 1<BR>performance : 2</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="comparison.html#failure_severity">Mapping of result files to how serious diffs in them are</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>file_colours</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Dictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>success : green<BR>not_started : white<BR>failure : red<BR>running : yellow<BR>static : grey90<BR>pending : white</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#file_colours">Colours to use for each file state</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>follow_program</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>tail -f (UNIX)<BR>baretail (Windows)</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#follow_program">External program to use for following progress of a file</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>full_name</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;app&gt; (capitalised)</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#full_name">Expanded name to use for application</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>gui_accelerators</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Dictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>reset : &lt;control&gt;e<BR>quit : &lt;control&gt;q<BR>save : &lt;control&gt;s<BR>run : &lt;control&gt;r<BR>load_selection : &lt;control&gt;&lt;shift&gt;o<BR>move_to_last : &lt;control&gt;End<BR>save_selection : &lt;control&gt;&lt;shift&gt;s<BR>rename : &lt;control&gt;m<BR>move_down : &lt;control&gt;Page_Down<BR>move_up : &lt;control&gt;Page_Up<BR>reconnect : &lt;control&gt;&lt;shift&gt;r<BR>move_to_first : &lt;control&gt;Home<BR>select : &lt;control&gt;s</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#gui_accelerators">Custom action accelerators.</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>gui_entry_options</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#gui_entry_options">Default drop-down box options for GUI entries</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>gui_entry_overrides</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;not set&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#gui_entry_overrides">Default settings for entries in the GUI</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>hide_gui_element</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Dictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>status_bar : 0<BR>shortcut_bar : 0<BR>toolbar : 0</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#hide_gui_element">List of widgets to hide by default</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>hide_test_category</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#hide_test_category">Categories of tests which should not appear in the dynamic GUI test view</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>historical_report_location</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#historical_report_location">Directory to create reports on historical batch data under</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>home_operating_system</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>any</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="comparison.html#home_operating_system">Which OS the test results were originally collected on</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>import_config_file</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="dirstructure.html#import_config_file">Extra config files to use</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>interactive_action_module</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>default</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="configmodule.html#interactive_action_module">Module to search for InteractiveActions for the GUI</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>interpreter</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="dirstructure.html#interpreter">Program to use as interpreter for the SUT</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>lines_of_text_difference</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Int</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>30</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#lines_of_text_difference">How many lines to present in textual previews of file diffs</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>link_test_path</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="tempdir.html#link_test_path">Paths to be linked from the temp. directory when running tests</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>log_file</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>output</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="dirstructure.html#log_file">Result file to search, by default</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>max_width_text_difference</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Int</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>500</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#max_width_text_difference">How wide lines can be in textual previews of file diffs</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>partial_copy_test_path</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="tempdir.html#partial_copy_test_path">Paths to be part-copied, part-linked to the temporary directory</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>performance_logfile</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="sysresource.html#performance_logfile">Which result file to collect performance data from</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>performance_logfile_extractor</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Dictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="sysresource.html#performance_logfile_extractor">What string to look for when collecting performance data</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>performance_test_machine</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>default : &lt;empty&gt;<BR>memory : any</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="sysresource.html#performance_test_machine">List of machines where performance can be collected</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>performance_test_minimum</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>0</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="sysresource.html#performance_test_minimum">Minimum time/memory to be consumed before data is collected</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>performance_variation_%</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>10</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="sysresource.html#performance_variation_%">How much variation in performance is allowed</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>query_kill_processes</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#query_kill_processes">Ask about whether to kill these processes when exiting texttest.</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>run_dependent_text</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="comparison.html#run_dependent_text">Mapping of patterns to remove from result files</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>slow_motion_replay_speed</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Int</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>3</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="getstartedgui.html#slow_motion_replay_speed">How long in seconds to wait between each GUI action</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>smtp_server</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>localhost</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#smtp_server">Server to use for sending mail in batch mode</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>sort_test_suites_recursively</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Int</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>1</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#sort_test_suites_recursively">Sort subsuites when sorting test suites</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>static_collapse_suites</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Int</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>0</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#static_collapse_suites">Whether or not the static GUI will show everything collapsed</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>test_colours</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Dictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>success : green<BR>not_started : white<BR>failure : red<BR>running : yellow<BR>static : grey90<BR>pending : white</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#test_colours">Colours to use for each test state</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>test_data_environment</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Dictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="tempdir.html#test_data_environment">Environment variables to be redirected for linked/copied test data</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>test_data_ignore</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="tempdir.html#test_data_ignore">Elements under test data structures which should not be viewed or change-monitored</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>test_data_searchpath</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="tempdir.html#test_data_searchpath">Locations to search for test data if not present in test structure</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>test_list_files_directory</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>filter_files</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#test_list_files_directory">Default directories for test filter files, relative to an application directory.</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>testoverview_colours</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Dictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>performance_bg : #FFC6A5<BR>row_header_bg : #FFFFCC<BR>test_default_fg : black<BR>column_header_bg : gray1<BR>success_bg : #CEEFBD<BR>column_header_fg : black<BR>failure_bg : #FF3118<BR>no_results_bg : gray2<BR>memory_bg : pink<BR>performance_fg : red6</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="batch.html#testoverview_colours">Colours to use for historical batch HTML reports</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>text_diff_program</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>diff</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#text_diff_program">External program to use for textual comparison of files</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>text_diff_program_max_file_size</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Int</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>-1</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#text_diff_program_max_file_size">The maximum file size to use the text_diff_program, in bytes. -1 means no limit.</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>unordered_text</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="comparison.html#unordered_text">Mapping of patterns to extract and sort from result files</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>unsaveable_version</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#unsaveable_version">Versions which should not have results saved for them</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>use_case_record_mode</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>disabled</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="getstartedgui.html#use_case_record_mode">Mode for Use-case recording (GUI, console or disabled)</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>use_case_recorder</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>String</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="getstartedgui.html#use_case_recorder">Which Use-case recorder is being used</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>version_priority</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>99</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="dirstructure.html#version_priority">Mapping of version names to a priority order in case of conflict.</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>view_program</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>CompositeDictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>emacs (UNIX)<BR>notepad (Windows)</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#view_program">External program(s) to use for viewing and editing text files</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>virtual_display_machine</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>List</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>&lt;empty&gt;</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="getstartedgui.html#virtual_display_machine">(UNIX) List of machines to run virtual display server (Xvfb) on</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>virtual_display_number</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Int</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>42</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="getstartedgui.html#virtual_display_number">(UNIX) Number to use for running virtual display server (Xvfb)</A></P>
			</TD>
		</TR>
		<TR VALIGN=TOP>
			<TD WIDTH=174>
				<P ALIGN=CENTER>window_size</P>
			</TD>
			<TD WIDTH=129>
				<P ALIGN=CENTER>Dictionary</P>
			</TD>
			<TD WIDTH=139>
				<P ALIGN=CENTER>height_pixels : &lt;not set&gt;<BR>width_screen : 0.6<BR>width_pixels : &lt;not set&gt;<BR>vertical_separator_position : 0.5<BR>height_screen : 0.833333333333<BR>maximize : 0<BR>horizontal_separator_position : 0.46</P>
			</TD>
			<TD WIDTH=464>
				<P ALIGN=CENTER><A HREF="interfaces.html#window_size">To set the initial size of the dynamic/static GUI.</A></P>
			</TD>
		</TR>
	</TBODY>
</TABLE>
<P><BR><BR>
</P>
