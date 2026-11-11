<div class="Text_Main_Header">List of options when submitting test runs</div>
<div class="Text_Header"><i>(using the default configuration)</i></div>
<div class="Text_Normal">
This table documents both command-line options that can be given to TextTest, and the various
options in the Selection and Running tabs in the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=static_gui"; ?>">Static GUI</A>, which are automatically generated
from it. Anything marked with "&lt;value&gt;" takes an argument on the command line, and will be
a text box in the GUI: anything with "&lt;value&gt;,..." takes a comma-separated list of arguments
on the command line or in its corresponding text box. Anything without that is a "switch", i.e. it
doesn't take any argument on the command line and will appear as a check button or radio button 
in the GUI. The "Brief Text" in the final column corresponds to the labels in the Static GUI.
</div><div class="Text_Normal">
<TABLE bgcolor="#666666" cellpadding=1 cellspacing=1>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Option</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Static GUI tab</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Brief text (links to documentation)</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-a &lt;value&gt;,...</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#-a">Load test applications named &lt;value&gt;,...</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-b &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Advanced</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#-b">Run batch mode session &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-bx &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#-bx">Select tests exactly as for batch mode session &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-c &lt;value&gt;,...</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Basic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=versions_and_version_control#-c">Use checkout &lt;value&gt;,...</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-coll</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#-coll">Collect results for batch mode session</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-collarchive</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#-collarchive">Collect results for batch mode session using data in the archive, back to the given date</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-con</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=guide_to_texttest_ui#-con">use console interface</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-cp &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Basic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=versions_and_version_control#-cp">Times to run &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-d &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#-d">Look for test files under &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-delay &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Basic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#-delay">Replay pause (sec) &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-desc &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Selection</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-desc">Select descriptions containing &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-f &lt;value&gt;,...</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Selection</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-f">Select tests listed in file &lt;value&gt;,...</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-fintersect &lt;value&gt;,...</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-fintersect">Tests in all files &lt;value&gt;,...</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-finverse &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-finverse">Tests not listed in file &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-funion &lt;value&gt;,...</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-funion">Tests in any of files &lt;value&gt;,...</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-g</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#-g">use dynamic GUI</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-grep &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Selection</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-grep">Select test-files containing &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-grepfile &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Selection</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-grepfile">Select test-file to search &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-gui</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Basic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#-gui">Show GUI and record any extra actions</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-gx</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-gx">use static GUI</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-help</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=writing_a_config_module#-help">Print configuration help text on stdout</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-ignorecat</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Basic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#-ignorecat">Ignore catalogue file when isolating data</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-ignorefilters</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Advanced</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#-ignorefilters">Ignore all run-dependent text filtering</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-keeptmp</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Advanced</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=texttest_sandbox#-keeptmp">Keep temporary write-directories</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-m &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Basic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_tests_remotely#-m">Run on machine &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-manualarchive</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#-manualarchive">Disable the automatic archiving of unused repository files</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-n</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=guide_to_texttest_ui#-n">Create new results files (overwrite everything)</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-name &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Advanced</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#-name">Name this run &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-new</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-new">Start static GUI with no applications loaded</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-o &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=guide_to_texttest_ui#-o">Overwrite failures, optionally using version &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-r &lt;time specification string&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Selection</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-r">Select execution time</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-reconnect &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#-reconnect">Reconnect to previous run &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-reconnfull</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#-reconnfull">Recompute file filters when reconnecting</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-rectraffic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Basic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=faking_it_with_texttest#-rectraffic">CaptureMock</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-s &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=about_testsuites#-s">Run this script &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-screenshot</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Basic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=gui_tests#-screenshot">Generate a screenshot after each replayed action</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-stop</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Basic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=dynamic_gui#-stop">Stop after first failure</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-t &lt;value&gt;,...</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Selection</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-t">Select test names containing &lt;value&gt;,...</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-ts &lt;value&gt;,...</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Selection</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=static_gui#-ts">Select test paths containing &lt;value&gt;,...</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-v &lt;value&gt;,...</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Basic</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=versions_and_version_control#-v">Run this version &lt;value&gt;,...</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-vanilla &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Advanced</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=personalising_ui#-vanilla">Ignore configuration files &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-x</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Advanced</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=troubleshooting#-x">Enable self-diagnostics</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-xr &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Advanced</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=troubleshooting#-xr">Configure self-diagnostics from &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-xw &lt;value&gt;</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">Advanced</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=troubleshooting#-xw">Write self-diagnostics to &lt;value&gt;</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">-zen</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small">N/A</div>
		</TD>
		<TD bgcolor="#FFFFFF">
			<div class="Table_Text_Small"><A class="Text_Link_Small" HREF="index.php?page=<?php echo $version ?>&n=running_texttest_unattended#-zen">Make console output coloured, for use e.g. with ZenTest</A></div>
		</TD>
	</TR>
	<!--STOP_HERE-->
</TABLE>
</div>
