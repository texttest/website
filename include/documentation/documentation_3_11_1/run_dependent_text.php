<div class="Text_Main_Header">Filtering the Output from the System Under Test</div>
<div class="Text_Description"> Making the tests determinstic by removing run-dependent text </div>
				
<div class="Text_Header">Introduction</div>
<div class="Text_Normal">Tests in TextTest are evaluated on the basis of comparing
plain text output produced by an application to a previously accepted
version of that text. By default, these will be stored in two files which will 
be compared exactly, and any different at all will be reported as failure.
</div>
<div class="Text_Normal">
In practice the system under test may well write out the current date or the process ID, 
which will of course be different next time the test is run. Naturally we don't want
to have tests which just fail all the time so TextTest needs to be told about
such "run-dependent text", so it can compare a filtered version of the SUT output
which is deterministic. This document describes the various filtering operations
that can be performed on your application's output before it is compared with the
"Standard Result".
</div>
<div class="Text_Header"><A NAME="run_dependent_text"></A>Filtering out Run-dependent Text</div>

<div class="Text_Normal">This is controlled primarily by the config file dictionary
entry 'run_dependent_text', whose keys corresponding to the
TextTest name of the file : i.e. the stem of the file name. This could be "output" or
"errors" for the standard output and error of the application, or it could be the
name of a <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=extra_files";?>">collated file</A> (See also the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites";?>">file format documentation</A>
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
