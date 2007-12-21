<div class="Text_Main_Header">Guide to TextTest's User Interfaces</div>
<div class="Text_Description"> Static GUI, Dynamic GUI and
Console</div>

<div class="Text_Normal"><BR>
</div>
				
				
<div class="Text_Header">Interactive Mode and Batch Mode</div>
<div class="Text_Normal">TextTest can be operated in two modes: <I>interactive mode</I>
which expects a user to be present and able to respond, and
<I>batch mode</I> which does not. <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=running_texttest_unattended"; ?>">Batch
mode</A> provides the test results in the form of an email
and/or HTML report. This document aims to describe the various
interactive modes. 
</div>

<div class="Text_Normal">Interactive mode now consists primarily of the PyGTK GUIs :
the <I>dynamic GUI</I>, for monitoring tests as they run, and
the <I>static GUI, </I>for examining and changing test suites
and starting the dyamic GUI. The older console interface is
still present, though is no longer being actively developed. 
</div>
<div class="Text_Header"><A NAME="default_interface"></A>Choosing an interactive mode</div>
<div class="Text_Normal">It is thus possible to operate with TextTest in any of three
ways: console only, dynamic GUI only (started from a command
prompt for each test run) or static and dynamic GUIs. These
possibilities have arisen in that order: TextTest was
traditionally a command-line UNIX script, indeed the very early
versions were actually Bourne shell scripts! It is generally
best to pick one of these approaches and stick to it: they are
more or less equivalent.</div>
<div class="Text_Normal">Newcomers to TextTest, unless opposed to GUIs in principle,
should generally use both the static and dynamic GUIs. This is
really how TextTest is meant to be used now (anyone on Windows
will find any other way of operating painful, probably). It can
still be useful to know about the other interfaces in case of
problems: they can help in error-finding because they are
simpler.</div>
<div class="Text_Normal">The &ldquo;default_interface&rdquo; config file setting can
be used to choose your preferred way of running. It can take the
values &ldquo;static_gui&rdquo;, &ldquo;dynamic_gui&rdquo; or
&ldquo;console&rdquo;, and defaults to the first of these. Any
interface can also be chosen on the command line, via the
options -gx, -g or -con respectively.</div>

<div class="Text_Header"><A NAME="-g"></A>Using the Dynamic GUI</div>
<div class="Text_Normal">The dynamc GUI is selected on the command line via the &ldquo;-g&rdquo;
option. Alternatively, it is started by clicking &ldquo;Run&rdquo;
in the static GUI toolbar.</div>
<div class="Text_Header"><img src="<?php print $basePath; ?>images/ttdyn.jpg" NAME="Graphic1"  BORDER=0><BR CLEAR=LEFT><BR><BR>
</div>

<div class="Text_Header"><A NAME="auto_collapse_successful"></A>The Test Tree View in
the Dynamic GUI</div>
<div class="Text_Normal">The initial left window is a tree view of all the tests that
are being run. These are colour-coded: white tests have not
started yet, yellow tests are currently in progress, green tests
are reckoned to have succeeded while red tests are reckoned to
have failed. By clicking the rows in this view details of what
happened to a particular test can be examined.</div>
<div class="Text_Normal">When whole test suites become complete and all tests in them
have succeeded, the dynamic GUI will automatically collapse the
tree view for that suite and simply identify that line by the
number of tests that were successful. This aids the user in
seeing which tests need his attention. If this behaviour is
found to be undesirable for any reason, it can be disabled by
setting the config file value 'auto_collapse_successful' to 0.</div>
<div class="Text_Header"><A NAME="hide_test_category"></A>The Selection tab in the
Dynamic GUI</div>
<div class="Text_Normal">The initial right window is a summary of how many tests are
in a given state and is continually updated as they change. When
they complete, if they fail they are sorted into categories of
which files differed underneath the &ldquo;Failed&rdquo;. Note
that as several files can differ in the same test this doesn't
necessarily add up to the total number of failed tests.</div>

<div class="Text_Normal">It also doubles as a way of selecting and hiding whole
categories of tests at once. Clicking the lines will select all
such tests in the test tree view. Unchecking the check boxes on
the right will cause all tests in that category to be hidden in
the test tree view on the left. If you uncheck one of the
&ldquo;&lt;file&gt; different&rdquo; lines, note that tests will
only be hidden if <U>all</U><SPAN STYLE="text-decoration: none">
files</SPAN> that were different are marked as hidden, so if a
file is different in more than one file it will not be hidden
until you uncheck all the files where it was different. In this
example there is only one file anyway. 
</div>
<div class="Text_Normal">Note that whether categories are visible by default can be
configured using the config file list entry &ldquo;hide_test_category&rdquo;

(a common usage is to hide all successful tests automatically).
To see how to refer to various categories, use the keys from for
example the &ldquo;test_colours&rdquo; entry in the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default";?>">config
file table</A>.</div>
<div class="Text_Header"><A NAME="diff_program"></A><A NAME="follow_program"></A><A NAME="view_program"></A><A NAME="text_diff_program"></A><A NAME="lines_of_text_difference"></A><A NAME="failure_display_priority"></A><A NAME="text_diff_program_max_file_size"></A>
Viewing Tests in the Dynamic GUI</div>
<div class="Text_Normal">When tests are selected via either of the above means, a new
&ldquo;Test&rdquo; tab is created on the right, containing the
details of what's going on in that test. Another tree view, this
time of the result files of that test, appears in the top right
window, while a textual summary of what happened for this test
can be seen in the &ldquo;Text Info&rdquo; tab below. The files
are also colour-coded, depending on whether TextTest thought
they were different (red) or not (green).</div>

<div class="Text_Normal">Double clicking on files from the test view will bring up
views of those files, using the external tools specified in the
config file. The relevant entries are &quot;diff_program&quot;
for viewing differences, &quot;follow_program&quot; for
following a running test and &quot;view_program&quot; for
viewing a static file. These default to &ldquo;tkdiff&rdquo;,
&ldquo;tail -f&rdquo; and &ldquo;xemacs&rdquo; respectively on
UNIX systems, &ldquo;tkdiff&rdquo;, &ldquo;baretail&rdquo; and
&ldquo;notepad&rdquo; on Windows. By default differences will be
shown if they are thought to exist (red files) otherwise the
file is simply viewed. To select other ways to view the files,
right-click and select a viewer from the popup menu.</div>

<div class="Text_Normal">Note that &ldquo;view_program&rdquo; is a &ldquo;composite
dictionary&rdquo; entry and can thus be configured per file
type, using just the stems as keys. It is thus easy to plugin
custom viewers if particular files produced by the system are
more conveniently viewed that way.</div>
<div class="Text_Normal">On the Text Info tab you will see a textual preview of all
the file differences, along with a summary of what happened to
the test. This textual preview is also used by the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=running_texttest_unattended"; ?>#batch_sender">batch
mode email report</A>. The tool used to generate the diff can be
configured via the config file entry &ldquo;text_diff_program&rdquo;
(it defaults to &ldquo;diff&rdquo;, which is also used
internally by &ldquo;tkdiff&rdquo;). Each file diff is
truncated: the number of lines included can be set via
&ldquo;lines_of_text_difference&rdquo;, which defaults to 30.</div>

<div class="Text_Normal">If several files differ they will be displayed in
alphabetical order. Sometimes this is not ideal as some files
give better information than others. In these cases you should
use the config file dictionary setting
&ldquo;failure_display_priority&rdquo; which will allow you to
ensure the most informative file comes at the top. Low numbers
imply display first. 
</div>
<div class="Text_Normal">To protect from very large files being compared with diff,
you can specify a maximum file size for this, using the
&ldquo;text_diff_program_max_file_size&rdquo; config file entry.
(Otherwise difference programs can hang forever trying to
compare the files)</div>
<div class="Text_Header"><A NAME="unsaveable_version"></A>Saving Test Results in the
Dynamic GUI</div>
<div class="Text_Normal">When tests fail, you can examine the differences as above,
and sometimes you will decide that the change in behaviour is in
fact desirable. In this case, you should &ldquo;Save&rdquo; the
test, or group of tests. This operation will overwrite the
permanent &ldquo;standard&rdquo; files with the &ldquo;temporary&rdquo;

files produced by this run. 
</div>
<div class="Text_Normal">To achieve this, the dynamic GUI has a &ldquo;Save&rdquo;
button in the toolbar and a corresponding &ldquo;Saving&rdquo;
option tab at the bottom right. Select the tests you wish to
save from the left-hand test window by single-clicking, and
using Ctrl+left click to select further tests. (Press Ctrl-A to
select all tests) On pressing &ldquo;Save&rdquo; (or Ctrl+S),
all selected tests will be saved.</div>

<div class="Text_Normal">On saving a test, by default all files registered as
different will be saved. You can however save only some of the
files by selecting the files you wish to save from the file view
(under the Test tab) in much the way you select multiple tests
in the tree view window.</div>
<div class="Text_Normal">Further configuration options are available under the
&ldquo;Saving&rdquo; tab</div>
<div class="Text_Normal">You can configure which version the results are saved as (see
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>#-v">guide to files and
directories</A> for a description of versions). By default, they
will be saved as the version that you ran the dynamic GUI as.
There is a drop-down list so that you can select other versions
if you want to, which will generally include the current version
and all versions more general than it. Sometimes you don't want
results to be saved for particular versions, this can be
configured via the &ldquo;unsaveable_version&rdquo; entry which
will cause these versions not to appear in the list.</div>

<div class="Text_Normal">You can also overwrite all the files, even if they were
regarded as the same, via the option &ldquo;replace successfully
compared files also&rdquo;: this is a way to re-generate the
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=file_collation_and_text_filtering"; ?>#run_dependent_text">run-dependent text</A>
for a test.</div>
<div class="Text_Header"><A NAME="-gx"></A>Using the Static GUI</div>
<div class="Text_Normal">The static GUI is started by default unless you specified
otherwise in your config file.</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/static.JPG" NAME="Graphic3"  BORDER=0><BR CLEAR=LEFT><BR><BR>

</div>
<div class="Text_Normal">As can be seen, the structure of the static GUI is similar to
that of the dynamic GUI, and tests can be viewed in much the
same way. On the left is a colour-coded tree view of the whole
test suite. 
</div>
<div class="Text_Normal">The above example shows the same test suite and the same test
as previously being viewed in the static GUI. The files can be
double clicked in a similar way, here they will invariably be
viewed with &ldquo;view_program&rdquo; (xemacs/notepad by
default). Note this setting can also be configured per result
type as described above.</div>
<div class="Text_Normal">The static GUI can be used to creating new tests or test
suites. By clicking a test suite, and filling in the forms
marked &quot;Adding Suite&quot; and &quot;Adding Test&quot; (and
pressing the corresponding button when complete), the test suite
can be extended without the need to create directories and edit
files by hand. Note that you can also edit the test suite file
from this view, and re-ordering of the tests performed this way
will show up in the GUI without needing to restart it.</div>

<div class="Text_Header">Running Tests from the Static GUI</div>
<div class="Text_Normal">In order to run tests, you first need to select some tests to
run. You can do this by single-clicking tests in the test window
on the left. Use ctrl + left click to build up a multiple
selection one test at a time, shift + left click to select
everything between what is currently selected and the line
clicked, ctrl + A to select everything. Alternatively, you can
select tests according to search criteria using the &ldquo;Select&rdquo;
button and &ldquo;Selection&rdquo; tab on the right (see below
for details of what can be done). 
</div>
<div class="Text_Normal">At the top right is a tab called &ldquo;Running&rdquo; which
will have three sub-tabs. The tabs &ldquo;Basic&rdquo; and
&ldquo;Advanced&rdquo; can be used to configure a multitude of
things about how the tests will be run. At the start the default
options should be sufficient. (Note that the tabs are
essentially a graphical representation of all command line
options that can be given to the dynamic GUI) 
</div>

<div class="Text_Normal">Once you are happy with these, press &ldquo;Run&rdquo; (on
the toolbar or in one of the above tabs). This will start the
dynamic GUI on the selected tests. 
</div>
<div class="Text_Header"><A NAME="default.CountTest"></A>Selecting tests via search
criteria: the static GUI &ldquo;Selection&rdquo; tab</div>
<div class="Text_Normal">On the right there is a &ldquo;Selection&rdquo; tab which has
a sub-tab &ldquo;Select Tests&rdquo; (it should be visible when
you start TextTest). This provides a simple search mechanism for
finding tests, useful when the test suite grows too large to
always select comfortably which tests you want to run via the
GUI alone. When the &ldquo;Select&rdquo; button is pressed, all
tests will be selected which fulfil <U>all</U> of the criteria
specified by the text boxes in the &ldquo;Select&rdquo; tab. It
follows that if no filters are provided and &ldquo;Select&rdquo;

pressed, all tests will be selected.</div>
<div class="Text_Normal">There are four &ldquo;modes&rdquo; for selection represented
by radio buttons at the bottom. &ldquo;Discard&rdquo;, the
default, will ignore what is already selected. &ldquo;Extend&rdquo;
will keep the current selection and add to it. &ldquo;Refine&rdquo;
will match only tests that were already selected and match the
search criteria, while &ldquo;Exclude&rdquo; will match only
test that were not already selected. 
</div>

<div class="Text_Normal">Note that the number of selected tests (and the total number
of tests) is displayed in the column header of the test view at
all times. The various selection criteria can also be tried out
from the command line, using the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>#-s">plugin
script</A> &ldquo;default.CountTest&rdquo;.</div>
<div class="Text_Header"><A NAME="-t"></A><A NAME="-ts"></A><A NAME="-vs"></A><A NAME="-grep"></A><A NAME="-grepfile"></A><A NAME="-r"></A>
Description of all test selection filters</div>
<div class="Text_Normal">The simplest filters focus on matching the names of tests and
the test suites they are in. The &ldquo;Test Names Containing&rdquo;
field (-t on the command line) will select all test cases which
have the indicated text as a substring of their names. If
instead a standard regular expression is used, all tests whose
name matches that expression will be selected.. 
</div>

<div class="Text_Normal">In a similar way, the &ldquo;Suite Names Containing&rdquo;
field (-ts on the command line) provides a way to select entire
test suites based on a similar substring/regular expression
search. Note that the string matched is the <U><I>whole path</I></U><SPAN STYLE="text-decoration: none">
of the test suite : test suites can contain other test suites. </SPAN>
</div>
<div class="Text_Normal">Sometimes test suites contain different tests depending on
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>#-v">version identifier</A>. In
this case, fill in the &ldquo;Tests for Version&rdquo; filter to
select the tests applicable to a particular version. This is
filled automatically if the static GUI is itself started with a
version identifier. It is not generally useful to do this on the
command line - simply running with a version will have the same
effect.</div>

<div class="Text_Normal">You can also search for certain logged text in the result
files. This is done via the &ldquo;Log files containing&rdquo;
filter (-grep on the command line). By default, this will search
in the file identified by the &ldquo;log_file&rdquo; config file
entry. If the &ldquo;Log file to search&rdquo; filter is also
provided (-grepfile on the command line), that file will be
searched instead. This allows selecting all tests that exercise
a certain part of the system's functionality, for example.</div>
<div class="Text_Normal">If <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=measuring_system_resource_usage"; ?>">system resource usage testing
is enabled for CPU time</A>, you can select tests based on how
much CPU time they are expected to consume. This is done via the
&ldquo;Execution Time&rdquo; filter (-r on the command line). A
single number will be interpreted as a maximum CPU time to
select. Two comma-separated numbers will be interpreted as a
minimum and a maximum. All times are in minutes. In addition,
you can use the format mm:ss, rather than needing to convert
times into a fraction of a minute, and can also use the
operators &lt;,&gt;,&lt;= and &gt;= to specify ranges of times
to include.</div>

<div class="Text_Header"><A NAME="-f"></A><A NAME="test_list_files_directory"></A>Reusing
such selections : &ldquo;filter files&rdquo;</div>
<div class="Text_Normal">Sometimes it may be useful to define such a subselection of
the tests that you may wish to reuse. To do this, select &ldquo;Save
Selection&rdquo; from the &ldquo;File&rdquo; menu, which brings
up a file chooser dialog so you can choose a file to save in.
Note it has two different options, allowing you to specify that
either the exact tests currently selected are to be saved, or
the criteria which were used to select them. Whichever, a new
&ldquo;filter file&rdquo; is created, which can be selected
again via &ldquo;Load Selection&rdquo; in the same menu, and
also via the &ldquo;Tests listed in file&rdquo; tab under
&ldquo;Selection&rdquo;.</div>

<div class="Text_Normal">The differences between the two variants become apparent when
somebody tries to load this file. Loading an explicit list of
tests will probably be faster than re-selecting them according
to some criteria, but if new tests are added since the selection
was saved, it will naturally not pick up these tests.</div>
<div class="Text_Normal">By default, the static GUI files will be saved in a directory
called &ldquo;filter_files&rdquo; under the directory where your
config file is. The dynamic GUI will save them in a temporary
location which is removed when the static GUI is closed. These
locations are used to generate the drop-down list for the &ldquo;Tests
listed in file&rdquo; option, and are also those searched if -f
is provided on the command line. These locations can be extended
or replaced by defining the config file entry
&ldquo;test_list_files_directory&rdquo;.</div>
<div class="Text_Header"><A NAME="sort_test_suites_recursively"></A>Sorting the test suites</div>

<div class="Text_Normal">The order of the test suites is primarily defined by the
testsuite.&lt;app&gt; files, unless automatic sorting is enabled
(see the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites";?>#auto_sort_test_suites">guide
to files and directories</A>) However, there are some quick ways
to sort the tests after the fact. By simply clicking on the
column header they can be sorted &ldquo;transiently&rdquo; (i.e.
nothing is saved in any files and the sort is gone if you
restart). You can also sort more permanently by selecting the
various options from the Edit menu, which also contains various
options for manual sorting by moving the selected tests up and
down. These options are also avaiable via the &ldquo;Re-order&rdquo;
submenu in the popup menu for the test window.</div>
<div class="Text_Normal">Note that by default, sorting a test suite does so
recursively (i.e. all contained test suites will also be
sorted). To disable this behaviour, set the config file entry
&ldquo;sort_test_suites_recursively&rdquo; to 0.</div>

<div class="Text_Header"><A NAME="static_collapse_suites"></A>Automatically collapsing the subsuites on startup in the
static GUI</div>
<div class="Text_Normal">By default the whole test suite will be expanded on starting
up the static GUI. This can sometimes be awkward, especially for
test writers who are only interested in a small part of the test
suite. For them, it is best that everything starts collapsed so
they can just view the parts that matter to them.</div>
<div class="Text_Normal">To this end there is a setting &ldquo;static_collapse_suites&rdquo;.
This should be set to 1 to disable the automatic expand of the
test suite. Instead, it will only expand the first level of
suites/tests.</div>
<div class="Text_Header">Personalising the GUI</div>
<div class="Text_Normal">There are many things which can be configured about the
TextTest GUIs, some of which are mostly a matter of personal
taste. To this end, it is possible to have a personal config
file where you place any entries that are supported by the
config files (although it is advisable to stick to GUI
appearance). This file should be called &ldquo;config&rdquo; and
placed in a subdirectory of your home directory called
&ldquo;.texttest&rdquo;. You can also place it anywhere at all
and identify the directory with the environment variable
$TEXTTEST_PERSONAL_CONFIG. (&ldquo;Home directories&rdquo; on
Windows are formed either from the $HOME variable or a
combination of the variables $HOMEDRIVE and $HOMEPATH)</div>

<div class="Text_Normal">You can edit and view these files by going to the &ldquo;Config&rdquo;
tab in the static GUI, where you will also see the config files
for the applications you're currently running on.</div>
<div class="Text_Normal">The look and feel of the GUI widgets themselves can be
configured by providing a GTK configuration file. This file
should be called &ldquo;.gtkrc-2.0&rdquo; and should be placed
in the same directory the above &ldquo;config&rdquo; file, if
you want it to only affect TextTest, or in your home directory
if you want it to affect all GTK GUIs you might run. The syntax
of these files is described, for example, at the <A class="Text_Link" href="http://www.pygtk.org/pygtktutorial/sec-gtksrcfileformat.html">PyGTK
homepage</A>.</div>

<div class="Text_Normal">You can also configure the contents of the toolbar via XML
files placed in this directory. Such an XML file should be named
to indicate to TextTest when it should kick in. For example:</div>
<UL>
	<LI><div class="Text_Normal">&ldquo;default_gui.xml&rdquo;
	(affect every time you start TextTest) 
	</div>
	<LI><div class="Text_Normal">&ldquo;default_dynamic_gui.xml&rdquo;
	(affect the dynamic GUI only) 
	</div>

	<LI><div class="Text_Normal">&ldquo;queuesystem_static_gui.xml&rdquo; (affect the
	static GUI only when running the queuesystem configuration) 
	</div>
</UL>
<div class="Text_Normal">The first element indicates the configuration module run (and
any parent modules). The second should be &quot;static&quot;,
&quot;dynamic&quot; or absent. The file name should always end
in _gui.xml.<BR><BR>As for the contents, the easiest thing is to
look at the files in the source/layout directory and
pattern-match. Note you only need to add extra XML sections, you
don't need to copy these files, though they give you the names
of all possible elements. For an example which extends the
standard toolbar, look in the self-tests under
GUI/Appearance/UserDefinedGUIDescription/personaldir.</div>
<div class="Text_Header"><A NAME="hide_gui_element"></A>The various &ldquo;bars&rdquo;

and how to hide them</div>
<div class="Text_Normal">TextTest comes by default with four bars: all of which are
optional: a menubar and toolbar at the top and a shortcut bar
and status bar at the bottom. The menubar and toolbar are fairly
standard and generally provide access to the same functionality.</div>
<div class="Text_Normal">The shortcut bar at the bottom allows you to create GUI
shortcuts for sequences of clicks that you do regularly. This is
the <A class="Text_Link" href="index.php?page=concepts&n=shortcuts">GUI shortcut
functionality</A> as provided by <A class="Text_Link" href="index.php?page=concepts&n=xusecase">PyUseCase</A>,
which TextTest itself relies on, primarily for its own testing,
but also to allow for this customisation possibility. 
</div>
<div class="Text_Normal">The status bar at the very bottom tries to indicate what
TextTest is doing right now or has just done. The &ldquo;throbber&rdquo;

at the far right indicates whether it is doing something:
sometimes searching a large test suite for example may take a
little time.</div>
<div class="Text_Normal">All of these can be hidden by default using the
&ldquo;hide_gui_element&rdquo; entry, as above, see the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default";?>">table
of config file settings</A> for the key format. If you don't
hide the menubar via this mechanism you can also show and hide
them via the &ldquo;View&rdquo; menu.</div>
<div class="Text_Header"><A NAME="gui_entry_overrides"></A><A NAME="gui_entry_options"></A>

Configuring the default values of text boxes, check boxes and
radio buttons, and the contents of drop-down lists</div>
<div class="Text_Normal">There are plenty of configuration options in various tabs
around the GUI, and all are identified with a label next to
them. This label is used to identify them in the config file:
take any label, make it lower case and replace all spaces
replaced by underscores (&ldquo;_&rdquo;) and you have a way to
identify the control in the config file..</div>
<div class="Text_Normal">Default values are changed by using the config entry
&ldquo;gui_entry_overrides&rdquo;. For text boxes, simply
provide the key as given above with the text you want as the
default. For check boxes provide &ldquo;0&rdquo; or &ldquo;1&rdquo;

as appropriate. For radio buttons form the key by concatenating
the label with the label for the specific button you want
selected, and providing &ldquo;1&rdquo; also.</div>
<div class="Text_Normal">In a similar way you can configure what options are presented
in drop-down lists to the user, in the case of the text boxes.
This is done via the &ldquo;gui_entry_options&rdquo; config file
entry, which is keyed in the same way. For example:</div>
<div class="Text_Normal">

<?php codeSampleBegin() ?>
[gui_entry_overrides]
show_differences_where_present:0
current_selection_refine:1
run_this_version:sparc

[gui_entry_options]
run_this_version:linux
<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal">
This will cause the dynamic GUI saving tab not to automatically
check the box for &quot;Show differences where present&quot;, as
in the example above. It will also cause the static GUI to
include the version &quot;linux&quot; in a drop-down list for
the &quot;Run this version&quot; text box and to set it to
&ldquo;sparc&rdquo; by default. And finally the radio button on
the &ldquo;Select Tests&rdquo; tab will select &ldquo;Refine&rdquo;

instead of the default &ldquo;Discard&rdquo;</div>
<div class="Text_Header"><A NAME="test_colours"></A><A NAME="file_colours"></A>GUI
Colours</div>
<div class="Text_Normal">The colours for the test tree view (left window) and the file
view (top right window under Test tab) can be configured via the
GUI dictionary entries &ldquo;test_colours&rdquo; and
&ldquo;file_colours&rdquo; respectively. These are keyed with
particular pre-defined names for the different test states: to
see what they are, look at the default values in the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default";?>">>table
of config file settings</A>. The values should be text strings
as recognised by RGB files.</div>

<div class="Text_Header"><A NAME="gui_accelerators"></A>Keyboard accelerators</div>
<div class="Text_Normal">The toolbar actions generally have keyboard accelerators,
whose values can be seen from the menus which also contain them.
These can be configured via the &ldquo;gui_accelerators&rdquo;
dictionary entry. The keys in this dictionary should correspond
to the labels on the relevant buttons, and the values should be
for example &ldquo;&lt;control&gt;&lt;alt&gt;r&rdquo; or &ldquo;F4&rdquo;.
If in doubt, consult the format of the default ones in the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default";?>">>table
of config file settings</A>. The values should be text strings
as recognised by RGB files.</div>

<div class="Text_Header"><A NAME="window_size"></A>Window and Pane sizes</div>
<div class="Text_Normal">If you find the TextTest window sizes to be inconvenient you
can also configure this. There is a config file dictionary entry
&ldquo;window_size&rdquo;. This has various keys, which can be
prefixed by &ldquo;static_&rdquo; or &ldquo;dynamic_&rdquo; to
make them specific to the particular GUIs if desired. 
</div>
<div class="Text_Normal">&ldquo;maximize&rdquo;, if set to 1, will maximise the window
on startup.</div>

<div class="Text_Normal">&ldquo;height_pixels&rdquo; and &ldquo;width_pixels&rdquo;
give the window an absolute size at startup (not recommended
outside personal files!)</div>
<div class="Text_Normal">&ldquo;height_screen&rdquo; and &ldquo;width_screen&rdquo;
give the window a size as a fraction (not percentage!) of the
size of your screen. 
</div>

<div class="Text_Normal">&ldquo;horizontal_separator_position&rdquo; and
&ldquo;vertical_separator_position&rdquo; allow a default
configuration of where the pane separators start out, also as a
fraction of screen size.</div>
<div class="Text_Header"><A NAME="query_kill_processes"></A>Cleanup operations on
quitting the GUI</div>
<div class="Text_Normal">Naturally, when you press Quit in the GUI it will try to
clean up everything it has created in terms of both files and
processes. For what happens to the temporary files created, see
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>#-keeptmp">section on the temporary
directory</A>.</div>
<div class="Text_Normal">As we've seen above, it is quite possible to start many
different viewers and editors from TextTest and many different
dynamic GUI runs from the static GUI. If all of these had to be
closed by hand it would probably be cumbersome &ndash; so the
default operation of TextTest is to find all of these processes
and kill them. On UNIX; they will be sent SIGINT, SIGTERM and
SIGKILL with a pause in between. On Windows, they will be
terminated with &ldquo;pskill&rdquo; which tends to be fairly
final. (If you don't have administrator rights on Windows they
will all be leaked because pskill requires such rights!)</div>

<div class="Text_Normal">It can be useful to configure a questioning dialog such that
TextTest will ask you before killing such processes. This is the
purpose of the &ldquo;query_kill_processes&rdquo; config file
entry. This is a composite dictionary whose keys are &ldquo;static&rdquo;,
&ldquo;dynamic&rdquo; or &ldquo;default&rdquo; (this last for
both static and dynamic GUIs) and the values are patterns of
&ldquo;process names&rdquo;: i.e. names of editors, viewers, the
dynamic GUI etc. For eaxmple:</div>
<div class="Text_Normal">
<?php codeSampleBegin() ?>
[query_kill_processes]
default:.*emacs
static:tkdiff
dynamic:texttest.*
<?php codeSampleEnd() ?>

</div><div class="Text_Header">

<A NAME="-con"></A><A NAME="-n"></A><A NAME="-o"></A>The Console
Interface</div>
<div class="Text_Normal">This is started if the &ldquo;-con&rdquo; option is provided,
or if &ldquo;default_interface&rdquo; is set to &ldquo;console&rdquo;.
It is simpler and much more restricted than the GUIs.</div>
<div class="Text_Normal">Essentially, it will run each test in turn, and if it fails,
will ask whether you wish to view the differences, save it, or
continue. Viewing the differences will write a (truncated) text
version of all file differences to the standard output, and will
start the graphical difference viewer on the file specified by
the config file entry &ldquo;log_file&rdquo; (the standard
output of the SUT, by default). Saving works much like from the
dynamic GUI, except that there is no possibility to save single
files or multiple tests at the same time (but see below).
Continuing will do nothing and leave everything in place.</div>

<div class="Text_Normal">There are a couple of command-line options relevant to the
console interface only, both related to saving. Specifying &ldquo;-o&rdquo;
will cause all files judged different to be overwritten (the
equivalent of the GUI &ldquo;Save&rdquo; button applied to all
tests, except you have to decide before the run starts). The
&ldquo;-n&rdquo; option will cause all files regarded as the
same to be updated: a way of updating the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=file_collation_and_text_filtering"; ?>#run_dependent_text">run
dependent text</A> contained in them. Specifying both these
options will cause all files to be updated, regardless of what
happens.</div>