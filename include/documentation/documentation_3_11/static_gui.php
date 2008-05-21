<div class="Text_Main_Header">Guide to the TextTest Static GUI</div>
<div class="Text_Description">Examining and maintaining the test suites</div>

<div class="Text_Header"><A NAME="-gx"></A>How to start the Static GUI</div>
<div class="Text_Normal">The static GUI is started by default unless you specified
otherwise in your config file. If you did, it can be started via the command line option "-gx".</div>
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
<div class="Text_Header"><A NAME="default.CountTest"></A>Selecting and filtering
tests via search criteria: the static GUI &ldquo;Selection&rdquo; tab</div>
<div class="Text_Normal">On the right there is a &ldquo;Selection&rdquo; tab(it should be 
visible when you start TextTest). This provides a simple search mechanism for
finding tests, useful when the test suite grows too large to
always select comfortably which tests you want to run via the
test tree view alone. When the &ldquo;Select&rdquo; button is pressed, all
tests will be selected which fulfil <U>all</U> of the criteria
specified by the text boxes in the &ldquo;Select&rdquo; tab. It
follows that if no filters are provided and &ldquo;Select&rdquo;
pressed, all tests will be selected.
</div>

<div class="Text_Normal">Using the same criteria on the same tab, it is also
possible to filter the tests, so that instead of selecting tests that match
the criteria, TextTest will hide those that do not match the criteria. This
is often useful when you want to work with a subset of the test suite for some time.
In addition, the View menu contains actions to turn a selection into a filtering
by hiding all tests that aren't currently selected.
</div>

<div class="Text_Normal">The respective frames for selection and filtering
contain various &ldquo;modes&rdquo; represented by radio buttons. These operate
independently of each other. &ldquo;Discard&rdquo;, the default, will ignore the current
selection or filtering. &ldquo;Extend&rdquo;
will keep the current selection or filtering and add to it. &ldquo;Refine&rdquo;
will match only tests that were already selected or shown and match the
search criteria, while &ldquo;Exclude&rdquo; will match only
test that were not already selected (and isn't currently implemented for filtering). 
</div>

<div class="Text_Normal">Note that the number of selected tests (and the total number
of tests, and the number of hidden tests) is displayed in the column header of the test view at
all times. The various selection criteria can also be tried out
from the command line, using the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>#-s">plugin
script</A> &ldquo;default.CountTest&rdquo;.</div>

<div class="Text_Header">
<A NAME="-t"></A><A NAME="-ts"></A><A NAME="-vs"></A><A NAME="-grep"></A><A NAME="-desc"></A><A NAME="-grepfile"></A><A NAME="-r"></A>
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
<div class="Text_Normal">Likewise it is possible to match on the name of the application,
which can be useful if several different ones are loaded into the GUI at the same time,
or also on the description of the test, using a similar substring/regular expression matching
to that described above. This can also be done on the command line via "-a" and "-desc" respectively.
</div>
<div class="Text_Normal">Sometimes test suites contain different tests depending on
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=versions_and_version_control"; ?>">version identifier</A>. In
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

<div class="Text_Header"><A NAME="-f"></A><A NAME="default_filter_file"></A>
<A NAME="test_list_files_directory"></A>Reusing such selections : &ldquo;filter files&rdquo;</div>
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
<div class="Text_Normal">It is also possible to define which tests
to run by default based on such filter files. The config file setting
"default_filter_file" will make sure that only the tests that match
the criteria in the given file (found via the path mechanism described above)
are included in the run. This is primarily useful for defining a 
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=versions_and_version_control";?>">version</A> 
of the test suite. A closely related concept is also available in 
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=running_texttest_unattended";?>#batch_filter_file">batch mode</A> via the setting "batch_filter_file".
</div>

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

<div class="Text_Header"><A NAME="suppress_stderr_popup"></A>Handling Dynamic GUI errors</div>

<div class="Text_Normal">Anything that is written on standard error by a dynamic GUI run will
be placed in a popup dialog in the static GUI when the dynamic GUI is closed down. These usually
indicate a bug in TextTest but they can also indicate environmental problems, for example
GTK issues or shell startup problems. Hopefully these can usually be fixed but occasionally you
end up with environmental issues that cannot easily be fixed.
</div><div class="Text_Normal">These popups can therefore be suppressed if desired. Simply
add a config file entry "suppress_stderr_popup" followed by a substring or regular expression
that matches the line that is being repeatedly printed. All lines that match these entries
will be filtered out before displaying a dialog, and of course if no lines are left no dialog
will be displayed.
</div>
