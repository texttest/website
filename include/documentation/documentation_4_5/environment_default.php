<div class="Text_Main_Header">Environment variables that the user may set</div>
<div class="Text_Header"><i>(using the default configuration)</i></div>
<TABLE bgcolor="#666666" cellpadding=1 cellspacing=1>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Variable name</div>
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
			<div class="Table_Text_Small">STORYTEXT_HOME</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">$TEXTTEST_HOME/storytext</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Location to store shortcuts from the GUI</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_DYNAMIC_GUI_INTERPRETER</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"></div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#TEXTTEST_DYNAMIC_GUI_INTERPRETER">Alternative interpreter for the dynamic GUI : mostly useful for coverage / testing</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_HOME</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">.</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#TEXTTEST_HOME">Alias for TEXTTEST_PATH</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_LOCAL_TMP</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Config value 'default_texttest_local_tmp'</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#TEXTTEST_LOCAL_TMP">Location of temporary files on local disk from test runs. Defaults to value of TEXTTEST_TMP</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_PATH</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">$TEXTTEST_HOME</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#TEXTTEST_PATH">Root directories of the test suite</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_PERSONAL_CONFIG</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">~/.texttest</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#TEXTTEST_PERSONAL_CONFIG">Location of personal configuration</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_PERSONAL_LOG</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">$TEXTTEST_PERSONAL_CONFIG/log</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=troubleshooting#TEXTTEST_PERSONAL_LOG">Location to write TextTest's internal logs</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_SLAVE_CMD</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">&lt;source directory&gt;/bin/texttest</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_tests_in_parallel#TEXTTEST_SLAVE_CMD">TextTest start-script for starting subsequent processes</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_TMP</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Config value 'default_texttest_tmp'</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#TEXTTEST_TMP">Location of temporary files from test runs</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_XVFB_WAIT</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">15</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#TEXTTEST_XVFB_WAIT">Time to wait for Xvfb to set up connections</A></div>
		</TD>
	</TR>
</TABLE>
<div class="Text_Main_Header">Environment variables that TextTest sets</div>
<div class="Text_Header"><i>(for the system under test and/or the environment files to use)</i></div>
<TABLE bgcolor="#666666" cellpadding=1 cellspacing=1>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Variable name</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Brief text (links to documentation)</div>
		</TD>
	</TR>	
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_CAPTUREMOCK_MODE</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">For use in your test rig. See CaptureMock docs</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_CAPTUREMOCK_RCFILES</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">For use in your test rig. See CaptureMock docs</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_CAPTUREMOCK_RECORD</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">For use in your test rig. See CaptureMock docs</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_CAPTUREMOCK_RECORD_EDIT_DIR</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">For use in your test rig. See CaptureMock docs</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_CAPTUREMOCK_REPLAY</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">For use in your test rig. See CaptureMock docs</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_CAPTUREMOCK_REPLAY_EDIT_DIR</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">For use in your test rig. See CaptureMock docs</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_CHECKOUT</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=versions_and_version_control#TEXTTEST_CHECKOUT">Full path to the checkout directory</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_CHECKOUT_NAME</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=versions_and_version_control#TEXTTEST_CHECKOUT_NAME">Local name of the checkout directory</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_DB_SETUP</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Environment variable set when "database setup run" selected in the UI</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_FOLLOW_FILE_TITLE</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#TEXTTEST_FOLLOW_FILE_TITLE">Title of the window when following file progress</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_LOG_DIR</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#TEXTTEST_LOG_DIR">Full path to where TextTest will write the SUT's log files</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_ROOT</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#TEXTTEST_ROOT">Full path to the root directory for each test application</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_SANDBOX</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#TEXTTEST_SANDBOX">Full path to the sandbox directory</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_SANDBOX_ROOT</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#TEXTTEST_SANDBOX_ROOT">Full path to the sandbox root directory</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">USECASE_RECORD_SCRIPT</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#USECASE_RECORD_SCRIPT">Full path to the script to record in GUI tests</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">USECASE_REPLAY_DELAY</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#USECASE_REPLAY_DELAY">Time to wait between each action in GUI tests</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">USECASE_REPLAY_SCREENSHOTS</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#USECASE_REPLAY_SCREENSHOTS">Whether to take screenshots between each action in GUI tests</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">USECASE_REPLAY_SCRIPT</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#USECASE_REPLAY_SCRIPT">Full path to the script to replay in GUI tests</A></div>
		</TD>
	</TR>
</TABLE>
