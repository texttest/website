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
			<div class="Table_Text_Small">TEXTTEST_DIAGDIR</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">$TEXTTEST_PERSONAL_CONFIG/log</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=troubleshooting#TEXTTEST_DIAGDIR">Location to write TextTest's internal logs</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_DYNAMIC_GUI_PYARGS</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"></div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Additional python arguments for dynamic GUI : mostly useful for coverage</div>
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
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#TEXTTEST_HOME">Root directory of the test suite</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_LOGCONFIG</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">$TEXTTEST_DIAGDIR/log4py.conf</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=troubleshooting#TEXTTEST_LOGCONFIG">Configuration file for TextTest's internal logs</A></div>
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
			<div class="Table_Text_Small">TEXTTEST_TMP</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">$TEXTTEST_PERSONAL_CONFIG/tmp</div>
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
			<div class="Table_Text_Small">30</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Time to wait for Xvfb to set up connections</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">USECASE_HOME</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">$TEXTTEST_HOME/usecases</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Location to store shortcuts from the GUI</div>
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
			<div class="Table_Text_Small">TEXTTEST_FOLLOW_FILE_TITLE</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Title of the window when following file progress</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">TEXTTEST_MIM_SERVER</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=faking_it_with_texttest#TEXTTEST_MIM_SERVER">Address of TextTest's server for recording client/server traffic</A></div>
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
			<div class="Table_Text_Small">USECASE_RECORD_SCRIPT</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Full path to the script to record in GUI tests</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">USECASE_REPLAY_DELAY</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Time to wait between each action in GUI tests</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">USECASE_REPLAY_SCRIPT</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Full path to the script to replay in GUI tests</div>
		</TD>
	</TR>
</TABLE>
