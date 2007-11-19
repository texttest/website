<div class="Text_Header">Comparing tools for acceptance testing of non-interactive calculators</div>
<TABLE border=1>
		<TR VALIGN=TOP>
			<TD>
			<div class="Table_Text_Normal">&nbsp;
			</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal"><A class="Text_Link" href= "../index.html">TextTest</A></div>
		</TD>
		<TD>
			<div class="Table_Text_Normal"><A class="Text_Link" href= "http://fit.c2.com/">Fit/ColumnFixture</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Test Persistence Format</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">plain text logs</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">table of inputs and expected outputs</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Drives application via</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">command line, standard input, environment
			variables</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">API</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Assertion mechanism</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal"><A class="Text_Link" href= "index.php?page=about">plain text file
			comparison</A></div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">compares expected output values from table with
			those returned by test API</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Code changes required to get started</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">plain text conversion of output<BR>(can also log
			relevant behaviour)</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">creation of a test API</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Languages supported</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">All</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Java, .NET, Python, Perl, Smalltalk, C++</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">System resource usage testing</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">CPU time measured directly<BR>Anything else can
			be logged<BR>Can &ldquo;save&rdquo; exact or averaged results</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Any measure can be returned via API methods No
			support for &ldquo;saving&rdquo;</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Integration with other tools</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Parallel testing on grid (<A class="Text_Link" href= "http://gridengine.sunsource.net/">SGE</A>
			or <A class="Text_Link" href= "http://www.platform.com/Products/Platform.LSF.Family/Platform.LSF/">LSF</A>)
			Bug-reporting (<A class="Text_Link" href= "http://www.bugzilla.org/">Bugzilla</A>) 
			</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Wiki (using <A class="Text_Link" href= "http://fitnesse.org/">FitNesse</A>)</div>
		</TD>
	</TR>

</TABLE>
