<div class="Text_Header">Comparing tools for acceptance testing of rich-client GUIs</div>
<TABLE border=1>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal"><BR>
			</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal"><A class="Text_Link" href= "index.php?Page=concepts&n=xusecase">TextTest/xUseCase</A></div>
		</TD>
		<TD>
			<div class="Table_Text_Normal"><A class="Text_Link" href= "http://exactor.sourceforge.net/">Exactor</A></div>
		</TD>
		<TD>
			<div class="Table_Text_Normal"><A class="Text_Link" href= "http://fitlibrary.sourceforge.net/">Fit/FitLibrary</A></div>
		</TD>
		<TD>
			<div class="Table_Text_Normal"><A class="Text_Link" href= "http://fit.c2.com/">Fit(core)</A></div>
		</TD>
		<TD>
			<div class="Table_Text_Normal"><A class="Text_Link" href= "http://www.marathontesting.com/">Marathon</A></div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Test Language Type</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Domain Language</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Domain Language 
			</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Domain Language 
			</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Tool-defined (&ldquo;ActionFixture&rdquo;)</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Programming Language(Python)</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Test Persistence Format</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">plain text 'usecase', plain text logs</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">plain text script</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">script embedded in table</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">script embedded in table</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Python script</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Support for driving tests via the UI</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Yes</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Yes &ndash; though not in domain language</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">No</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">No</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Yes</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Can record tests using the UI</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Yes</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">No</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">No</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">No</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Yes</div>
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
			<div class="Table_Text_Normal">hand-assertion calling test API</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">hand-assertion calling test API</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">hand-assertion calling test API</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">hand-assertion doing widget state checks</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Code changes required to get started</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">calls to xUseCase, logging of relevant behaviour</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">creation of a test API</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">creation of a test API</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">creation of a test API</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">None (though naming all GUI components generally
			necessary)</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Support for refactoring of test scripts</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal"><A class="Text_Link" href= "index.php?page=concepts&n=shortcuts">Domain
			language composite files </A>(cannot pass arguments)</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Domain language composite files (can pass
			arguments)</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">None at customer level &ndash; though can always
			refine domain language</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">None</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Programming language : can be refactored in any
			way</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Languages/toolkits supported</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal"><A class="Text_Link" href= "http://jusecase.sourceforge.net">Java (Swing
			only) </A>, <A class="Text_Link" href= "index.php?page=concepts&n=pyusecase">Python (PyGTK
			only)</A></div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Java and .NET</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Java</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Java, .NET, Python, Perl, Smalltalk, C++</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Java (Swing only)</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Support for multithread synchronisation</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal"><A class="Text_Link" href= "index.php?page=concepts&n=appevents">Application
			Events</A></div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Hand-insertion of generic wait statements (not
			domain language)</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">No direct support</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">No direct support</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Hand-insertion of wait statements for widget
			state changes</div>
		</TD>
	</TR>
	<TR VALIGN=TOP>
		<TD>
			<div class="Table_Text_Normal">Integration with other tools</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Parallel testing on grid (<A class="Text_Link" href= "http://gridengine.sunsource.net/">SGE</A>
			or <A class="Text_Link" href= "http://www.platform.com/Products/Platform.LSF.Family/Platform.LSF/">LSF</A>), 
			Bug-reporting (<A class="Text_Link" href= "http://www.bugzilla.org/">Bugzilla</A>) 
			</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Continous integration (<A class="Text_Link" href= "http://cruisecontrol.sourceforge.net/">CruiseControl</A>)</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Wiki (using <A class="Text_Link" href= "http://fitnesse.org/">FitNesse</A>)</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">Wiki (using <A class="Text_Link" href= "http://fitnesse.org/">FitNesse</A>)</div>
		</TD>
		<TD>
			<div class="Table_Text_Normal">None</div>
		</TD>
	</TR>
</TABLE>
