<div class="Text_Main_Header">List of possible entries for config files:</div>
<div class="Text_Header"><i>(using the default configuration)</i></div>
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
			<div class="Table_Text_Small">auto_sort_test_suites</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#auto_sort_test_suites">Automatically sort test suites in alphabetical order. 1 means sort in ascending order, -1 means sort in descending order.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">base_version</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=versions_and_version_control#base_version">Versions to inherit settings from</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_extra_version</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_extra_version">Versions to be run in addition to the one specified, for particular batch sessions</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_filter_file</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_filter_file">Generic filter for batch session, more flexible than timelimit</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_recipients</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">$USER@localhost</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_recipients">Addresses to send mail to in batch mode</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_result_repository</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_result_repository">Directory to store historical batch results under</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_sender</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">$USER@localhost</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_sender">Sender address to use sending mail in batch mode</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_timelimit</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_timelimit">Maximum length of test to include in batch mode runs</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_use_collection</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_use_collection">Do we collect multiple mails into one in batch mode</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_use_version_filtering</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_use_version_filtering">Which batch sessions use the version filtering mechanism</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_version</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_version">List of versions to allow if batch_use_version_filtering enabled</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">binary</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'executable'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">binary_file</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=extra_files#binary_file">Which output files are known to be binary, and hence should not be shown/diffed?</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">bug_system_script</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=automatic_failure_interpretation#bug_system_script">The location of the script used to extract information from the bug system.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">catalogue_process_string</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=extra_files#catalogue_process_string">String for catalogue functionality to identify processes created</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">checkout_location</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=versions_and_version_control#checkout_location">Absolute paths to look for checkouts under</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collate_file</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">stacktrace : core* (UNIX)<BR>&lt;empty&gt; (Windows)</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=extra_files#collate_file">Mapping of result file names to paths to collect them from</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collate_script</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">default : &lt;empty&gt;<BR>stacktrace : interpretcore.py (UNIX)<BR>&lt;empty&gt; (Windows)</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=extra_files#collate_script">Mapping of result file names to scripts which turn them into suitable text</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collect_traffic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=faking_it_with_texttest#collect_traffic">List of command-line programs to intercept</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collect_traffic_environment</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=faking_it_with_texttest#collect_traffic_environment">Mapping of collected programs to environment variables they care about</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">config_module</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">default</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=writing_a_config_module#config_module">Configuration module to use</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">copy_test_path</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#copy_test_path">Paths to be copied to the temporary directory when running tests</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">cputime_include_system_time</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#cputime_include_system_time">Include system time when measuring CPU time?</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">create_catalogues</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=extra_files#create_catalogues">Do we create a listing of files created/removed by tests</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">default_checkout</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=versions_and_version_control#default_checkout">Default checkout, relative to the checkout location</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">default_filter_file</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#default_filter_file">Filter file to use by default, generally only useful for versions</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">default_interface</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">static_gui</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=guide_to_texttest_ui#default_interface">Which interface to start if none of -con, -g and -gx are provided</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">definition_file_stems</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">environment, testsuite, options, usecase, traffic, input, knownbugs</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=writing_a_config_module#definition_file_stems">files to be shown as definition files by the static GUI</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">diff_program</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">tkdiff</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#diff_program">External program to use for graphical file comparison</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">discard_file</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=extra_files#discard_file">List of generated result files which should not be compared</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">executable</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#executable">Full path to the System Under Test</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">extra_config_directory</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#extra_config_directory">Alias. See entry for 'extra_search_directory'</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">extra_search_directory</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Additional directories to search for settings besides the test structure</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">extra_version</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=versions_and_version_control#extra_version">Versions to be run in addition to the one specified</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">failure_display_priority</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">99</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#failure_display_priority">Mapping of result files to which order they should be shown in the text info window.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">failure_severity</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">catalogue : 2<BR>default : 99<BR>errors : 1<BR>output : 1<BR>performance : 2<BR>traffic : 1<BR>usecase : 1</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=extra_files#failure_severity">Mapping of result files to how serious diffs in them are</A></div>
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
			<div class="Table_Text_Small">follow_file_by_default</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">When double-clicking running files, should we follow progress or just view them?</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">follow_program</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">tail -f (UNIX)<BR>baretail (Windows)</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#follow_program">External program to use for following progress of a file</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">full_name</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;app&gt; (capitalised)</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#full_name">Expanded name to use for application</A></div>
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
			<div class="Table_Text_Small">add_test : &lt;control&gt;n<BR>copy : &lt;control&gt;c<BR>cut : &lt;control&gt;x<BR>enter_failure_information : &lt;control&gt;i<BR>filter : &lt;control&gt;f<BR>load_selection : &lt;control&gt;&lt;shift&gt;o<BR>mark : &lt;control&gt;&lt;shift&gt;m<BR>move_down : &lt;control&gt;Page_Down<BR>move_to_first : &lt;control&gt;Home<BR>move_to_last : &lt;control&gt;End<BR>move_up : &lt;control&gt;Page_Up<BR>paste : &lt;control&gt;v<BR>quit : &lt;control&gt;q<BR>recompute_status : F5<BR>reconnect : &lt;control&gt;&lt;shift&gt;r<BR>refresh : F5<BR>rename : &lt;control&gt;m<BR>reset : &lt;control&gt;e<BR>run : &lt;control&gt;r<BR>save : &lt;control&gt;s<BR>save_selection : &lt;control&gt;&lt;shift&gt;s<BR>select : &lt;control&gt;s<BR>unmark : &lt;control&gt;&lt;shift&gt;u</div>
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
			<div class="Table_Text_Small">gui_entry_options</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#gui_entry_options">Default drop-down box options for GUI entries</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">gui_entry_overrides</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;not set&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#gui_entry_overrides">Default settings for entries in the GUI</A></div>
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
			<div class="Table_Text_Small">historical_report_location</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#historical_report_location">Directory to create reports on historical batch data under</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">historical_report_page_name</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;app&gt; (capitalised)</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Header for page on which this application should appear</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">home_operating_system</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">any</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=run_dependent_text#home_operating_system">Which OS the test results were originally collected on</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">import_config_file</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#import_config_file">Extra config files to use</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">interactive_action_module</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">default_gui</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=writing_a_config_module#interactive_action_module">Module to search for InteractiveActions for the GUI</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">interpreter</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#interpreter">Program to use as interpreter for the SUT</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">lines_of_text_difference</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">30</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#lines_of_text_difference">How many lines to present in textual previews of file diffs</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">link_test_path</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#link_test_path">Paths to be linked from the temp. directory when running tests</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">log_file</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">output</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#log_file">Result file to search, by default</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">max_width_text_difference</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">500</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#max_width_text_difference">How wide lines can be in textual previews of file diffs</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">partial_copy_test_path</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#partial_copy_test_path">Paths to be part-copied, part-linked to the temporary directory</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_descriptor_decrease</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">cputime : faster, faster, ran faster<BR>default : &lt;empty&gt;<BR>memory : smaller, memory-, used less memory</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Descriptions to be used when the numbers decrease in a performance file</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_descriptor_increase</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">cputime : slower, slower, ran slower<BR>default : &lt;empty&gt;<BR>memory : larger, memory+, used more memory</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Descriptions to be used when the numbers increase in a performance file</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_logfile</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#performance_logfile">Which result file to collect performance data from</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_logfile_extractor</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#performance_logfile_extractor">What string to look for when collecting performance data</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_test_machine</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">default : &lt;empty&gt;<BR>memory : any</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#performance_test_machine">List of machines where performance can be collected</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_test_minimum</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0.0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#performance_test_minimum">Minimum time/memory to be consumed before data is collected</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_variation_%</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">10.0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#performance_variation_%">How much variation in performance is allowed</A></div>
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
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#query_kill_processes">Ask about whether to kill these processes when exiting texttest.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">run_dependent_text</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=run_dependent_text#run_dependent_text">Mapping of patterns to remove from result files</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">slow_motion_replay_speed</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">3</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#slow_motion_replay_speed">How long in seconds to wait between each GUI action</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">smtp_server</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">localhost</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#smtp_server">Server to use for sending mail in batch mode</A></div>
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
			<div class="Table_Text_Small">suppress_stderr_popup</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List of patterns which, if written on stderr, should not produce a warning popup</div>
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
			<div class="Table_Text_Small">test_data_environment</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#test_data_environment">Environment variables to be redirected for linked/copied test data</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">test_data_ignore</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#test_data_ignore">Elements under test data structures which should not be viewed or change-monitored</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">test_data_properties</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Write the contents of test_data_environment to the given Java properties file</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">test_data_searchpath</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#test_data_searchpath">Alias. See entry for 'extra_search_directory'</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">test_list_files_directory</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">filter_files</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#test_list_files_directory">Default directories for test filter files, relative to an application directory.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">testoverview_colours</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">column_header_bg : gray1<BR>column_header_fg : black<BR>failure_bg : #FF3118<BR>memory_bg : pink<BR>no_results_bg : gray2<BR>performance_bg : #FFC6A5<BR>performance_fg : red6<BR>row_header_bg : #FFFFCC<BR>success_bg : #CEEFBD<BR>test_default_fg : black</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#testoverview_colours">Colours to use for historical batch HTML reports</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">text_diff_program</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">diff</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#text_diff_program">External program to use for textual comparison of files</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">text_diff_program_filters</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">default : &lt;empty&gt;<BR>diff : ^<, ^></div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Filters that should be applied for particular diff tools to aid with grouping in dynamic GUI</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">text_diff_program_max_file_size</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">-1</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#text_diff_program_max_file_size">The maximum file size to use the text_diff_program, in bytes. -1 means no limit.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">trace_level_variable</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Environment variable that sets a simple trace-log level</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">unordered_text</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=run_dependent_text#unordered_text">Mapping of patterns to extract and sort from result files</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">unsaveable_version</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#unsaveable_version">Versions which should not have results saved for them</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">use_case_record_mode</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">disabled</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#use_case_record_mode">Mode for Use-case recording (GUI, console or disabled)</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">use_case_recorder</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#use_case_recorder">Which Use-case recorder is being used</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">version_priority</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">99</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=versions_and_version_control#version_priority">Mapping of version names to a priority order in case of conflict.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">view_file_on_remote_machine</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">If tests are run remotely, do we try to start viewing programs on that machine?</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">view_program</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">emacs (UNIX)<BR>notepad (Windows)</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#view_program">External program(s) to use for viewing and editing text files</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">virtual_display_machine</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">localhost</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#virtual_display_machine">(UNIX) List of machines to run virtual display server (Xvfb) on</A></div>
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
