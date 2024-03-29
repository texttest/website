<div class="Text_Main_Header">Possible entries for config files (application or personal)</div>
<div class="Text_Header"><i>(using the default configuration)</i></div>
<div class="Text_Normal">
The <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=file_formats"; ?>">file
format documentation</A> shows you how to change these entries in your config files, and explains the meaning
of the "Type" column in this table.
</div><br>
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
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
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
			<div class="Table_Text_Small">batch_collect_compulsory_version</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_collect_compulsory_version">When collecting multiple messages, which versions should be expected and give an error if not present?</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_collect_max_age_days</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (Int)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">100000</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_collect_max_age_days">When collecting multiple messages, what is the maximum age of run that we should accept?</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_external_folder</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_external_folder">Which folder to write test results in external format in batch mode. Only useful together with batch_external_format</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_external_format</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_external_format">Do we write out results in external format in batch mode. Supports junit, trx</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_extra_version</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
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
			<div class="Table_Text_Small">batch_include_comment_plugin</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">true</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Do we include the comment plugin in the HTML report (requires PHP)</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_jenkins_archive_file_pattern</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_jenkins_archive_file_pattern">Path to the built files in the archive, in case Jenkins fingerprints need double-checking</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_jenkins_marked_artefacts</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_jenkins_marked_artefacts">Artefacts to highlight in the report when they are updated</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_junit_folder</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'batch_external_folder'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_junit_format</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'batch_external_format'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_junit_performance</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">performance</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'default_performance_stem'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_mail_on_failure_only</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_mail_on_failure_only">Send mails only if at least one test fails</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_recipients</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#batch_recipients">Comma-separated addresses to send mail to in batch mode</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">batch_result_repository</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
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
			<div class="Table_Text_Small">&lt;must be set&gt;</div>
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
			<div class="Table_Text_Small">bug_system_location</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=automatic_failure_interpretation#bug_system_location">The location of the bug system we wish to extract failure information from.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">bug_system_password</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=automatic_failure_interpretation#bug_system_password">Password to use when logging in to bug systems defined in bug_system_location</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">bug_system_username</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=automatic_failure_interpretation#bug_system_username">Username to use when logging in to bug systems defined in bug_system_location</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">capturemock_clientserver_mock_name</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">httpmocks</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Path stem to use for client-server mocks for CaptureMock</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">capturemock_path</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Path to local CaptureMock installation, in case newer one is required with frozen TextTest</div>
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
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
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
			<div class="Table_Text_Small">Dictionary (List)</div>
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
			<div class="Table_Text_Small">collate_file_changes</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'create_catalogues'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collate_script</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">default : &lt;empty&gt;<BR>stacktrace : interpretcore (UNIX)<BR>&lt;empty&gt; (Windows)</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=extra_files#collate_script">Mapping of result file names to scripts which turn them into suitable text</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collect_file_changes</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'create_catalogues'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collect_traffic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">asynchronous : &lt;empty&gt;<BR>default : &lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=faking_it_with_texttest#collect_traffic">Deprecated. Use CaptureMock.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collect_traffic_client_server</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=faking_it_with_texttest#collect_traffic_client_server">Deprecated. Use CaptureMock.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collect_traffic_environment</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=faking_it_with_texttest#collect_traffic_environment">Deprecated. Use CaptureMock.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collect_traffic_py_module</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'collect_traffic_python'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collect_traffic_python</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=faking_it_with_texttest#collect_traffic_python">Deprecated. Use CaptureMock.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collect_traffic_python_ignore_callers</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=faking_it_with_texttest#collect_traffic_python_ignore_callers">Deprecated. Use CaptureMock.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">collect_traffic_use_threads</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">true</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=faking_it_with_texttest#collect_traffic_use_threads">Deprecated. Use CaptureMock.</A></div>
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
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#copy_test_path">Paths to be copied to the sandbox when running tests</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">copy_test_path_merge</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#copy_test_path_merge">Directories to be copied to the sandbox, and merged together</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">copy_test_path_script</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#copy_test_path_script">Script to use when copying data files, instead of straight copy</A></div>
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
			<div class="Table_Text_Small">dbtext_database_path</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Paths which represent textual data for databases, for use in dbtext</div>
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
			<div class="Table_Text_Small">default_machine</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">localhost</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_tests_remotely#default_machine">Default machine to run tests on</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">default_performance_stem</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">performance</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#default_performance_stem">Which performance statistic to use when selecting tests by performance, placing performance in Junit XML reports etc</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">default_texttest_local_tmp</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#default_texttest_local_tmp">Default value for $TEXTTEST_LOCAL_TMP, if it is not set</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">default_texttest_tmp</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">$TEXTTEST_PERSONAL_CONFIG/tmp</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#default_texttest_tmp">Default value for $TEXTTEST_TMP, if it is not set</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">definition_file_stems</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">builtin : config, environment, testsuite, options, stdin, knownbugs<BR>default : &lt;empty&gt;<BR>regenerate : usecase</div>
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
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
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
			<div class="Table_Text_Small">discard_file_text</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=extra_files#discard_file_text">List of generated result files which should not be compared if they contain the given patterns</A></div>
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
			<div class="Table_Text_Small">&lt;must be set&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#executable">Full path to the System Under Test (or Java Main Class name)</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">extra_config_directory</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'extra_search_directory'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">extra_search_directory</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#extra_search_directory">Additional directories to search for TextTest files</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">extra_test_process_postfix</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#extra_test_process_postfix">Postfixes to use on ordinary files to denote an additional run of the SUT to be triggered</A></div>
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
			<div class="Table_Text_Small">CompositeDictionary (Int)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (Int)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">catalogue : 2<BR>default : 99<BR>errors : 1<BR>output : 1<BR>performance : 2<BR>stderr : 1<BR>stdout : 1<BR>usecase : 1</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=extra_files#failure_severity">Mapping of result files to how serious diffs in them are</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">file_split_pattern</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#file_split_pattern">Pattern to use for splitting result files</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">file_to_url</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#file_to_url">Mapping of file locations to URLS, for linking to HTML reports</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">filename_convention_scheme</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">standard</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#filename_convention_scheme">Naming scheme to use for files for stdin,stdout and stderr</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">filter_file_directory</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">filter_files</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#filter_file_directory">Default directories for test filter files, relative to an application directory.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">floating_point_split</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Separator to split at when comparing floating point values</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">floating_point_tolerance</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (Float)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0.0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=run_dependent_text#floating_point_tolerance">Which tolerance to apply when comparing floating point values in output</A></div>
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
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#follow_file_by_default">When double-clicking running files, should we follow progress or just view them?</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">follow_program</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">xterm -bg white -T $TEXTTEST_FOLLOW_FILE_TITLE -e tail -f (UNIX)<BR>baretail (Windows)</div>
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
			<div class="Table_Text_Small">gui_entry_options</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
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
			<div class="Table_Text_Small">historical_report_colours</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">changes_header_bg : #E2E2FF<BR>column_header_bg : gray1<BR>failure_bg : #FF3118<BR>incomplete_bg : #8B1A1A<BR>knownbug_bg : #FF9900<BR>memory_bg : pink<BR>no_results_bg : gray2<BR>performance_bg : #FFC6A5<BR>performance_fg : red6<BR>row_header_bg : #FFFFCC<BR>run_friday_fg : black<BR>run_monday_fg : black<BR>run_saturday_fg : black<BR>run_sunday_fg : black<BR>run_thursday_fg : black<BR>run_tuesday_fg : black<BR>run_wednesday_fg : black<BR>success_bg : #CEEFBD<BR>test_default_fg : black</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#historical_report_colours">Colours to use for historical batch HTML reports</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">historical_report_location</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;app&gt; (capitalised)</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#historical_report_page_name">Header for page on which this application should appear</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">historical_report_piechart_summary</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#historical_report_piechart_summary">Generate pie chart summary page rather than default HTML tables.</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">historical_report_resource_pages</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'historical_report_resources'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">historical_report_resources</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#historical_report_resources">Which performance/memory entries should be shown as separate lines in the historical report</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">historical_report_split_version</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Split pages per version.</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">historical_report_subpage_cutoff</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (Int)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">Last six runs : 6<BR>default : 100000</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#historical_report_subpage_cutoff">How many runs should the subpage show, starting from the most recent?</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">historical_report_subpage_weekdays</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#historical_report_subpage_weekdays">Which weekdays should the subpage apply to (empty implies all)?</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">historical_report_subpages</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">Last six runs</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#historical_report_subpages">Names of subselection pages to generate as part of historical report</A></div>
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
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#interpreter">Single program to use as interpreter for the SUT</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">interpreters</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">OrderedDict()</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#interpreters">Programs to use, in order, as interpreters for the SUT</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">kill_command</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt; (UNIX)<BR>taskkill /F /T /PID (Windows)</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#kill_command">Custom command (if any) for killing test processes</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">kill_timeout</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Float</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0.0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#kill_timeout">Number of (wall clock) seconds to wait before killing the test</A></div>
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
			<div class="Table_Text_Small">stdout</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#log_file">Result file to search, by default</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">max_file_size</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">-1</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#max_file_size">The maximum file size to load into external programs, in bytes. -1 means no limit.</A></div>
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
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#partial_copy_test_path">Paths to be part-copied, part-linked to the sandbox</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_descriptor_decrease</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">cputime : faster, faster, ran faster<BR>default : &lt;empty&gt;<BR>memory : smaller, memory-, used less memory</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#performance_descriptor_decrease">Descriptions to be used when the numbers decrease in a performance file</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_descriptor_increase</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">cputime : slower, slower, ran slower<BR>default : &lt;empty&gt;<BR>memory : larger, memory+, used more memory</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#performance_descriptor_increase">Descriptions to be used when the numbers increase in a performance file</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_ignore_improvements</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">false</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#performance_ignore_improvements">Should we ignore all improvements in performance?</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_logfile</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
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
			<div class="Table_Text_Small">Dictionary (String)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">*mem* : any<BR>default : &lt;empty&gt;</div>
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
			<div class="Table_Text_Small">CompositeDictionary (Float)</div>
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
			<div class="Table_Text_Small">performance_unit</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">*mem* : MB<BR>default : seconds</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#performance_unit">Name to be used to identify the units in a performance file</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_use_normalised_%</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">true</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'use_normalised_percentage_change'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">performance_variation_%</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (Float)</div>
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
			<div class="Table_Text_Small">performance_variation_serious_%</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (Float)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0.0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#performance_variation_serious_%">Additional cutoff to performance_variation_% for extra highlighting</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">relative_float_tolerance</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (Float)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0.0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=run_dependent_text#relative_float_tolerance">Which relative tolerance to apply when comparing floating point values</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">remote_copy_program</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_tests_remotely#remote_copy_program">(UNIX) Program to use for copying files remotely, in case of non-shared file systems</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">remote_program_options</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">default : &lt;empty&gt;<BR>rsync : -e 'ssh -x -o StrictHostKeyChecking=no -o BatchMode=yes -o ConnectTimeout=30' -av --copy-unsafe-links --delete --exclude-from=&lt;source library&gt;/etc/rsync_exclude_patterns<BR>scp : -Crp -o StrictHostKeyChecking=no -o BatchMode=yes -o ConnectTimeout=30<BR>ssh : -q -o StrictHostKeyChecking=no -o BatchMode=yes -o ConnectTimeout=30</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_tests_remotely#remote_program_options">Default options to use for particular remote shell programs</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">remote_shell_program</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">ssh</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_tests_remotely#remote_shell_program">Program to use for running commands remotely</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">run_dependent_text</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
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
			<div class="Table_Text_Small">save_filtered_file_stems</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#save_filtered_file_stems">Files where the filtered version should be saved rather than the SUT output</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">scrubbers</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'run_dependent_text'</div>
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
			<div class="Table_Text_Small">smtp_server_password</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#smtp_server_password">Password for SMTP authentication when sending mail in batch mode</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">smtp_server_username</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#smtp_server_username">Username for SMTP authentication when sending mail in batch mode</A></div>
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
			<div class="Table_Text_Small">Alias. See entry for 'suppress_stderr_text'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">suppress_stderr_text</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#suppress_stderr_text">List of patterns which, if written on TextTest's own stderr, should not be propagated to popups and further logfiles</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">test_data_environment</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary (String)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
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
			<div class="Table_Text_Small">test_data_require</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">List</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#test_data_require">Test data names that are required to exist for the SUT to work</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">test_data_searchpath</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'extra_search_directory'</div>
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
			<div class="Table_Text_Small">Alias. See entry for 'filter_file_directory'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">testoverview_colours</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Dictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">changes_header_bg : #E2E2FF<BR>column_header_bg : gray1<BR>failure_bg : #FF3118<BR>incomplete_bg : #8B1A1A<BR>knownbug_bg : #FF9900<BR>memory_bg : pink<BR>no_results_bg : gray2<BR>performance_bg : #FFC6A5<BR>performance_fg : red6<BR>row_header_bg : #FFFFCC<BR>run_friday_fg : black<BR>run_monday_fg : black<BR>run_saturday_fg : black<BR>run_sunday_fg : black<BR>run_thursday_fg : black<BR>run_tuesday_fg : black<BR>run_wednesday_fg : black<BR>success_bg : #CEEFBD<BR>test_default_fg : black</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'historical_report_colours'</div>
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
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">default : &lt;empty&gt;<BR>diff : ^<, ^></div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#text_diff_program_filters">Filters that should be applied for particular diff tools to aid with grouping in dynamic GUI</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">text_diff_program_max_file_size</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">-1</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Alias. See entry for 'max_file_size'</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">unordered_text</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (List)</div>
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
			<div class="Table_Text_Small">use_normalised_percentage_change</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">true</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=measuring_system_resource_usage#use_normalised_percentage_change">Do we interpret performance percentage changes as normalised (symmetric) values?</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">version_priority</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (Int)</div>
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
			<div class="Table_Text_Small">CompositeDictionary (Int)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">0</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_tests_remotely#view_file_on_remote_machine">Do we try to start viewing programs on the test execution machine?</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">view_program</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">CompositeDictionary (String)</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">emacs (UNIX)<BR>wordpad (Windows)</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#view_program">External program(s) to use for viewing and editing text files</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">virtual_display_count</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Int</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">1</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#virtual_display_count">(UNIX) Number of virtual display server (Xvfb) instances to run, if enabled</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">virtual_display_extra_args</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#virtual_display_extra_args">(UNIX) Extra arguments (e.g. bitdepth) to supply to virtual display server (Xvfb)</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">virtual_display_hide_windows</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">true</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#virtual_display_hide_windows">(Windows) Whether to emulate the virtual display handling on Windows by hiding the SUT's windows</A></div>
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
			<div class="Table_Text_Small">virtual_display_wm_executable</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">String</div>
		</TD>
		<TD bgcolor="#FFFFFF"> 
			<div class="Table_Text_Small">&lt;empty&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">(UNIX) Window manager executable to start under virtual display server (Xvfb)</div>
		</TD>
	</TR>
</TABLE>
