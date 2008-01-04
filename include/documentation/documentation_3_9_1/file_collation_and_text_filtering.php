<div class="Text_Main_Header">File Collation and Text Filtering</div>
<div class="Text_Description">  Configuring the Test Result Evaluation </div>

<div class="Text_Normal"><BR>
</div>
				
				
<div class="Text_Header">Introduction</div>
<div class="Text_Normal">Tests in TextTest are evaluated on the basis of comparing
plain text output by an application to a previously accepted
version of that text. This document aims to discuss this
&ldquo;comparison&rdquo; operation and the various ways it can
be configured. 
</div>

<div class="Text_Header">The Standard Procedure and what can be configured in it</div>
<div class="Text_Normal">By default, the standard output of the system under test will
be collected to a file called output.&lt;app&gt; and the
standard error will be collected to a file called errors.&lt;app&gt;
(see the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites";?>">guide to files and
directories</A>). These will then be compared exactly with any
previously saved &ldquo;standard results&rdquo; and any
difference at all will be reported as failure. 
</div>

<div class="Text_Normal">If standard results have not already been collected for a
particular file produced when a test is run, the file is
reported under &ldquo;New Results&rdquo; and should be checked
carefully by hand and saved if correct. New files appearing is
also sufficient reason to fail a test, so every test should fail
the first time unless the expected results are imported
externally. 
</div>
<div class="Text_Normal">In the same way, if files are not produced that are present
and expected in the standard results, these will be reported
under &ldquo;Missing Results&rdquo; and the test will fail.
Saving such a result will cause the missing files to be removed
from the standard results.</div>
<div class="Text_Normal">There are four types of things that can be configured here: 
</div>
<OL>

	<div class="Text_Normal"><li><A class="Text_Link" href="#collate_file">Any file output by the SUT can
	be collected and compared</A>, provided you tell TextTest how
	to find it (and potentially how to convert it to a convenient
	format for comparison). Files that are collected by default can
	also be discarded.</div>
	<div class="Text_Normal"><li><A class="Text_Link" href="#create_catalogues">A &ldquo;catalogue&rdquo;
	of files created or deleted by the SUT</A> can be generated.</div>
	<div class="Text_Normal"><li>The comparison operation itself can be configured by
	inserting filtering operations before the comparison is done.
	This means that certain uninteresting differences can be
	suppressed and prevented from causing correctly behaving tests
	from being shown as failing. There are two types of filtering :
	for handling <A class="Text_Link" href="#run_dependent_text">the cases where the
	content is run-dependent</A>, or the <A class="Text_Link" href="#unordered_text">order
	of that content is run-dependent</A>, but the content itself
	constant.</div>

	<div class="Text_Normal"><li>Result files can be <A class="Text_Link" href="#failure_severity">declared
	to have different &ldquo;severity&rdquo;</A>, so that TextTest
	can help you spot more serious errors quickly. A difference in
	the final file output by the system is probably more serious
	than a difference in a file listing the memory consumption, for
	example.</div>
</OL>
<div class="Text_Header"><A NAME="collate_file"></A><A NAME="discard_file"></A><A NAME="collate_script"></A>
Telling TextTest to collect additional files</div>
<div class="Text_Normal">This can be done by specifying the config file entry
&ldquo;collate_file&rdquo;. This entry is a dictionary and so
takes the following form : 
</div>

<div class="Text_Normal">

<?php codeSampleBegin() ?>
[collate_file]
&lt;texttest_name&gt;:&lt;source_file_path&gt;

<?php codeSampleEnd() ?>


</div>

<div class="Text_Normal">
where &lt;source_file_path&gt;</i> is some file your application
writes and &lt;texttest_name&gt; is what you want it to be
called by TextTest. 
</div>


<div class="Text_Normal">If you plan to do this, make sure you read the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>">document
describing how the TextTest temporary directory works</A> first.
&lt;source_file_path&gt; here should in principle never be an
absolute path : it should be relative (implicitly to the
temporary directory described above). This is because your tests
will otherwise have global side effects &ndash; making them
harder to understand and more prone to occasional failure,
particularly if run more than once simultaneously.</div>

<div class="Text_Normal">Note that this ordering can seem counter-intuitive, in effect
you are asking TextTest to copy the text file located at
&lt;source_file_path&gt; to &lt;texttest_name&gt;.&lt;app&gt; in
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>">temporary directory of that test</A>,
where it will be picked up and compared. You might expect the
source to be named before the target, but many different config
dictionary entries use these TextTest names for result files as
keys so this one works the same for consistency. 
</div>
<div class="Text_Normal">Standard UNIX file pattern matching is allowed in both
&lt;texttest_name&gt; and &lt;source_file_path&gt;. Where this
is used in the path to the source file it simply means that the
exact name of the file that will be produced may vary, but
whatever file matches the pattern will be copied and given the
same name each time by TextTest, provided it was created or
modified by the test run (unchanged files will not be collected
in this way).</div>

<div class="Text_Normal">If comparison of a collected file is not desired for any
reason, it can be added to the config file list entry
&ldquo;discard_file&rdquo;. The most common usage of this is to
disable the collection of standard output and/or standard error
(i.e. by adding &ldquo;errors&rdquo; or &ldquo;output&rdquo; to
the list).. 
</div>
<div class="Text_Normal">If the file is not plain-text or needs to be pre-processed
before it can easily be compared, you can tell TextTest to run
an arbitrary script on the file. This script should take a
single argument (the file name to read) and should write its
output to the standard output. You do this by specifying the
composite dictionary entry &ldquo;collate_script&rdquo;, which
has the same form as &ldquo;collate_file&rdquo; except the value
should be the name of the script to run. The script should be
placed somewhere on your PATH or identified via an absolute
path.</div>

<div class="Text_Header">Collecting multiple related files at the same time
(advanced)</div>
<div class="Text_Normal">When patterns are used in the TextTest name it means that all
previously saved files that match this &ldquo;target pattern&rdquo;
and all files written by the test that match the &ldquo;source
pattern&rdquo; become collated files. E.g. suppose we have the
following entry in the config file:</div>
<div class="Text_Normal">
<?php codeSampleBegin() ?>
[collate_file]
data*:data*.dump
<?php codeSampleEnd() ?>

</div>
<div class="Text_Normal">
Suppose also that an earlier saved run had produced data1.&lt;app&gt;

and data2.&lt;app&gt; and the latest run produced data1.dump and
data3.dump. Then the list of collated files becomes: data1,
data2, data3. This means that the latest run's data1 will be
compared against the file saved in data1.&lt;app&gt;, data2 will
be flagged as missing and data3 flagged as new result. 
</div>
<div class="Text_Normal">Some care is required in writing collate patterns. Completely
general patters like &ldquo;*:* &ldquo; would cause confusion
since anything could relate to anything, in theory. The current
implementation assumes that files have a common stem, i.e.: it
can handle stems like the example above, but not unrelated stems
like &ldquo;*good* : *bad*&rdquo;</div>
<div class="Text_Header"><A NAME="create_catalogues"></A><A NAME="catalogue_process_string"></A>

Generating a catalogue of file/process changes</div>
<div class="Text_Normal">Sometimes a system will potentially create and remove a great
many files in a directory structure (TextTest itself is one
example!) Collecting and comparing every single file might be
overkill. Instead, you have the possibility to create a
catalogue file, which will essentially compare which files
(under the test's <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>">temporary directory</A>)
are present before and after the test has run, and which files
and directories that were present before have been edited during
the test run. 
</div>
<div class="Text_Normal">It will then report what has been created, what has been
removed and what has been edited. This is done by setting the
config file entry &ldquo;create_catalogues&rdquo; to true. It
will generate result files called <B>catalogue.&lt;app&gt;</B>.
If no differences are found, this is noted briefly at the top of
the file : catalogue files are always created from version 3.6
and onwards.</div>

<div class="Text_Normal">Note that this feature can be used to aid <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>#copy_test_path">test
data isolation</A> also.</div>
<div class="Text_Normal">In addition, you can request that the catalogue functionality
checks for processes that were created (leaked!) by the test. If
such processes are found to exist, they will be reported to the
catalogue file and automatically terminated by TextTest. This is
done by getting the SUT to log when it creates a process in a
predictable way. The text identifying the process created should
be provided in the &ldquo;catalogue_process_string&rdquo; config
file entry. TextTest will then search the result file indicated
by &ldquo;log_file&rdquo; for matches with this string, and
assume the process ID immediately follows it. If the process is
found to be running, it will be reported to the catalogue file
and terminated.</div>
<div class="Text_Header"><A NAME="run_dependent_text"></A>Filtering the Result Files
before Comparison</div>

<div class="Text_Normal">Evaluation of test results consists by default of comparing
exactly all files that have been &ldquo;collated&rdquo; along
with the standard output and error files generated by default.
Often, though, this will produce &ldquo;false failures&rdquo;
because incidental things are reported by the files: for
example: process IDs, execution machine names, today's date.
These will be different every time the test is run and you want
to tell TextTest about them so that it can filter them out
before comparing the files.</div>
<div class="Text_Normal">This is controlled primarily by the config file dictionary
entry 'run_dependent_text', whose keys corresponding to the
TextTest name of the file : i.e. the stem of the file name. (See
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites";?>">file format documentation</A>
for more details of this). It should take this form:</div>

<div class="Text_Normal">

<?php codeSampleBegin() ?>
[run_dependent_text]
&lt;texttest_name&gt;:&lt;run_dependent_pattern1&gt;
&lt;texttest_name&gt;:&lt;run_dependent_pattern2&gt;
<?php codeSampleEnd() ?>
</div>

<div class="Text_Normal">

The patterns provided may contain regular expressions. Any line
in the file which matches the expression, or contains the text
provided, will be filtered out in its entirety from the
comparison. For example:</div>
<div class="Text_Normal">

<?php codeSampleBegin() ?>
[run_dependent_text]
output:Process ID
output:[0-9][0-9]:[0-9][0-9]
my_file:Machine name
<?php codeSampleEnd() ?>


</div>
<div class="Text_Normal">
This will cause all lines that contain the string &ldquo;Process
ID&rdquo; or match the given regular expression to be filtered
out from the standard output. Likewise, the collated file
my_file will be stripped of lines containing the string &ldquo;Machine
name&rdquo;. 
</div>

<div class="Text_Header">Filtering out multiple lines and parts of lines</div>
<div class="Text_Normal">Various extensions are available, using a special syntax
specific to this entry. This is defined as follows: 
</div>
<UL>
	<div class="Text_Normal"><li><SPAN STYLE="text-decoration: none"><b><I>&lt;pattern&gt;{LINES
	&lt;number_of_lines&gt;}</I></b></SPAN> - On encountering a
	match with &lt;pattern&gt;, instead of removing the single line
	containing the pattern, remove &lt;number_of_lines&gt;. The
	count includes the line matched, so {LINES 1} has no effect.</div>

	<div class="Text_Normal"><li><b><I>{LINE &lt;line_number&gt;}</I></b> - Remove the
	entire line &lt;line_number&gt;, counting from the top of the
	file.</div>
	<div class="Text_Normal"><li><b><I>&lt;pattern&gt;{WORD &lt;word_number&gt;}</I></b>
	- On encountering a match with the pattern, do not remove the
	whole line but only the word numbered &lt;word_number&gt; from
	the start. Use negative numbers to count from the end of the
	line: i.e. {WORD -2} will remove the second-to-last word. You
	can also specify to remove every word after a certain number,
	for example {WORD 4+} will remove word 4 and the rest of the
	line after this.</div>

	<div class="Text_Normal"><li><SPAN STYLE="text-decoration: none"><b><I>&lt;pattern1&gt;{-&gt;}&lt;pattern2&gt;</I></b></SPAN>
	- On encountering a match with &lt;pattern1&gt;, all lines are
	filtered out until &lt;pattern2&gt; is matched. Neither the
	line matching &lt;pattern1&gt; nor the line matching &lt;pattern2&gt;

	are themselves filtered. 
	</div>
	<div class="Text_Normal"><li><SPAN STYLE="text-decoration: none"><b><I>&lt;pattern&gt;{REPLACE
	&lt;text&gt;}</I></b></SPAN>- On encountering a match with the
	pattern, instead of removing the whole line, replace just the
	part of the line which matched the pattern with the text
	indicated by &lt;text&gt;. This can be combined with {WORD...}
	which will replace just the indicated word rather than the text
	matched. If &lt;pattern&gt; is a regular expression, it can
	include groups (indicated by parantheses) which can then be
	referred to in the REPLACE text as \1, \2 etc.</div>
	<div class="Text_Normal"><li><b><I>{INTERNAL writedir}</I></b> &ndash; This is a
	special pattern that will match TextTest's own temporary paths
	for the test. Sometimes your application will write out
	absolute paths, which will naturally be relative to the
	temporary directory where the test is run. These will then
	produce different text every time. This syntax is mostly to
	save you the bother of producing an exact regular expression to
	match these paths.</div>

</UL>
<div class="Text_Normal">For example:</div>
<div class="Text_Normal">
<?php codeSampleBegin() ?>
[run_dependent_text]
output:Process ID{WORD 3}
output:[0-9][0-9]:[0-9][0-9]{LINES 3}
errors:{LINE 1}
my_file:Machine name{-&gt;}End of Machines Section
my_file:{INTERNAL writedir}{REPLACE &lt;texttest write dir}
<?php codeSampleEnd() ?>

</div><div class="Text_Header">
<A NAME="unordered_text"></A>Filtering the order of certain
lines</div>
<div class="Text_Normal">There is also the config file dictionary entry
&ldquo;unordered_text&rdquo; which works in a similar way and
supports a similar syntax to &ldquo;run_dependent_text&rdquo;.
In this case the matching text is not removed, but assumed to
appear in random order. It is therefore sorted alphabetically
and placed in a section of its own at the end of the filtered
file, so that the contents are asserted to be as before but the
order in which things occur is not important. 
</div>

<div class="Text_Header"><A NAME="home_operating_system"></A>Multiple-OS testing:
forcing the filtering to occur</div>
<div class="Text_Normal">Sometimes you want to create a test suite that will run on
multiple operating systems. TextTest's test suite for itself is
one such example. The main problem you run into is that
different operating systems use different characters for the end
of lines, so that a &ldquo;standard result&rdquo; file from UNIX
and a generated file from a test run on Windows will compare as
different.</div>
<div class="Text_Normal">To fix this, set the &ldquo;home_operating_system&rdquo;
config file entry. This string should be one of the strings
Python uses to identify operating systems, i.e. &ldquo;posix&rdquo;

or &ldquo;nt&rdquo; for the platforms supported by TextTest. It
defaults to &ldquo;any&rdquo; which means don't worry about it. 
</div>
<div class="Text_Normal">If the entry is set and different from the running operating
system, TextTest will perform the filter operation on all result
files even if no filters are defined for them. This makes sure
that all files are generated for the target platform and avoids
false failures on line endings.</div>
<div class="Text_Header"><A NAME="failure_severity"></A>The Severity of Differences
in particular Files</div>
<div class="Text_Normal">This is controlled by the dictionary entry
&ldquo;failure_severity&rdquo;, and takes the form:</div>

<div class="Text_Normal">

<?php codeSampleBegin() ?>
[failure_severity]
&lt;texttest_name&gt;:&lt;severity&gt;
<?php codeSampleEnd() ?>
</div>

<div class="Text_Normal">
&lt;severity&gt; here is a number, where 1 is the most severe
and increasing the number means decreasing the severity. If the
entry is not present, both &ldquo;output&rdquo; and &ldquo;errors&rdquo;
files will be given severity 1, while everything else will have
severity 99.</div>

<div class="Text_Normal">The severity has two effects on how TextTest behaves:</div>
<OL>
	<div class="Text_Normal"><li>When multiple files are found to be different, the
	difference is always reported in the dynamic GUI &ldquo;details&rdquo;
	column as a difference in the most &ldquo;severe&rdquo; file
	found to be different.</div>
	<div class="Text_Normal"><li>If a severity 1 file is found to be different, the whole
	line will turn red, otherwise only the &ldquo;details&rdquo;

	column will turn red. 
	</div>
</OL>
<div class="Text_Normal">As an example, the test below has failed in &ldquo;performance&rdquo;,
which is a severity 2 file. If the output had also been
different, the whole line on the left would be red and the
details would report &ldquo;output different(+)&rdquo;.</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/perftest.JPG" NAME="Graphic1" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>
</div>
