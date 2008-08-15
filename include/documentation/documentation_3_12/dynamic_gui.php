<div class="Text_Main_Header">Guide to the TextTest Dynamic GUI</div>
<div class="Text_Description"> Administering interactive test runs </div>

<div class="Text_Header"><A NAME="-g"></A>How to start the Dynamic GUI</div>
<div class="Text_Normal">The dynamic GUI is selected on the command line via the &ldquo;-g&rdquo;
option. Alternatively, it is started by clicking &ldquo;Run&rdquo;
in the static GUI toolbar.</div>
<div class="Text_Header"><img src="<?php print $basePath; ?>images/ttdyn.jpg" NAME="Graphic1"  BORDER=0><BR CLEAR=LEFT><BR><BR>
</div>

<div class="Text_Header"><A NAME="auto_collapse_successful"></A>The Test Tree View</div>
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
<div class="Text_Header"><A NAME="hide_test_category"></A><A NAME="text_diff_program_filters"></A>The Status tab</div>
<div class="Text_Normal">The initial right window is a summary of how many tests are
in a given state and is continually updated as they change. When
they complete, if they fail they are sorted into categories of
which files differed underneath the &ldquo;Failed&rdquo;. Note
that as several files can differ in the same test this doesn't
necessarily add up to the total number of failed tests.</div>
<div class="Text_Normal">
For each file which has differences, subgroups will then appear (labelled
Group 1, Group 2 etc.) for tests which have failed with an identical
difference in that file. Tests which have a unique diff will not appear
in any such group. "Identical" here is configurable: by default the "diff"
tool is used and TextTest will only compare using the lines beginning with '&lt;'
or '&gt;', filtering out the lines that indicate which line numbers were different.
So tests will be grouped together if they gain the same line at different points in the file,
for example. This can be configured using the config file dictionary setting 
"text_diff_program_filters", which is keyed on diff programs and identifies lines from
their output that should be <I>preserved</I> in the output.
</div>
<div class="Text_Normal">The status tab also doubles as a way of selecting and hiding whole
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
To refer to the various categories, you can use any name that appears in the status tab,
or you can use the keys from for
example the &ldquo;test_colours&rdquo; entry in the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default";?>">config
file table</A>.</div>
<div class="Text_Header"><A NAME="diff_program"></A><A NAME="follow_program"></A><A NAME="follow_file_by_default"></A><A NAME="view_program"></A><A NAME="text_diff_program"></A><A NAME="lines_of_text_difference"></A><A NAME="failure_display_priority"></A><A NAME="text_diff_program_max_file_size"></A>
Viewing Tests</div>
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
&ldquo;xterm -e tail -f&rdquo; and &ldquo;emacs&rdquo; respectively on
UNIX systems, &ldquo;tkdiff&rdquo;, &ldquo;baretail&rdquo; and
&ldquo;notepad&rdquo; on Windows. By default differences will be
shown if they are thought to exist (red files) otherwise the
file is simply viewed. You can make following running tests the
default by setting "follow_file_by_default" to 1. To select other ways to view the files,
right-click and select a viewer from the popup menu.</div>

<div class="Text_Normal">Note the config entries described above are all &ldquo;composite
dictionary&rdquo; entries and can thus be configured per file
type, using just the stems as keys. It is thus easy to plugin
custom viewers if particular files produced by the system are
more conveniently viewed that way. For example, this will cause the "output"
files to be viewed with "xemacs" rather than the default "emacs":
<?php codeSampleBegin() ?>
[view_program]
output:xemacs
<?php codeSampleEnd() ?>
</div>
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
<div class="Text_Header"><A NAME="unsaveable_version"></A>Saving Test Results</div>
<div class="Text_Normal">When tests fail, you can examine the differences as above,
and sometimes you will decide that the change in behaviour is in
fact desirable. In this case, you should &ldquo;Save&rdquo; the
test, or group of tests. This operation will overwrite the
permanent &ldquo;standard&rdquo; files with the &ldquo;temporary&rdquo;

files produced by this run. 
</div>
<div class="Text_Normal">To achieve this, the dynamic GUI has a &ldquo;Save&rdquo;
button in the toolbar and the File menu, and also a &ldquo;Save As...&rdquo; action
in the File menu. Select the tests you wish to
save from the left-hand test window by single-clicking, and
using Ctrl+left click to select further tests. (Press Ctrl-A to
select all tests) On pressing &ldquo;Save&rdquo; (or Ctrl+S),
all selected tests will be saved.</div>

<div class="Text_Normal">On saving a test, by default all files registered as
different will be saved. You can however save only some of the
files by selecting the files you wish to save from the file view
(under the Test tab) in much the way you select multiple tests
in the tree view window.</div>
<div class="Text_Normal">By doing "Save As...", you get a dialog up with
further configuration options. You can configure which version the results are saved as (look
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=versions_and_version_control"; ?>">here
</A> for a description of versions). By default, they
will be saved as the version that you ran the dynamic GUI as.
There is a drop-down list so that you can select other versions
if you want to, which will generally include the current version
and all versions more general than it. Sometimes you don't want
results to be saved for particular versions, this can be
configured via the &ldquo;unsaveable_version&rdquo; entry which
will cause these versions not to appear in the list or be selected as default in future.</div>

<div class="Text_Normal">You can also overwrite all the files, even if they were
regarded as the same, via the option &ldquo;replace successfully
compared files also&rdquo;: this is a way to re-generate the
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=run_dependent_text"; ?>">run-dependent text</A>
for a test.</div>
<div class="Text_Header">Recomputing Test Results</div>
<div class="Text_Normal">There are several occasions on which it can be useful to trigger a recomputation
of the test results. Sometimes other versions of the tests are simply saved, which changes files shared between several
versions. Sometimes the standard files for the tests are changed externally, via something like
a version control update. The filtering settings in the config files might also be changed, and hence
a recomputation could be triggered to see if the test now succeeds with the new filtering rules. For
these reasons there exists a "Recompute Status" action in the Actions menu.
</div>
<div class="Text_Normal">Each time tests are selected or saved in the dynamic GUI, TextTest will
check the file modification times to see if a recomputation seems to be necessary. If it is, a small refresh
icon will be shown to the right of that test in the test tree view. It isn't necessary for such an icon
to be shown in order to perform "Recompute Status" but in most cases it won't have any effect.
</div>
<div class="Text_Normal">It's also possible to run this action on a test that has not yet completed. In this
case it will perform a filtering on the test files produced so far, which gives you the possibility to view them
and check if the test is clearly going to fail. It will also attempt to estimate how far the test has progressed,
by comparing the size of the standard files to the size of the temporary files produced so far.
</div>
<div class="Text_Header">Marking tests</div>
<div class="Text_Normal">Sometimes you have a lot of tests failing for different reasons.
It can be helpful to be able to manually classify these tests as you discover what caused individual failures, so that
you can see which tests still need to be checked. You can therefore &quot;mark&quot; tests
with a particular text, which will cause them to be classified differently and be easy
to hide as a group from the Status view. This is achieved by right-clicking on the test
and selecting the relevant item from the popup menu.</div>
