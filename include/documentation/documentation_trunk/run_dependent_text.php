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
"Approved Result".
</div>
<div class="Text_Header"><A NAME="run_dependent_text"></A>Filtering out Run-dependent Text</div>

<div class="Text_Normal">This is controlled primarily by the config file dictionary
entry 'run_dependent_text', whose keys corresponding to the
TextTest name of the file : i.e. the stem of the file name. This could be "stdout" or
"stderr" for the standard output and error of the application (alternatively "errors" and "output" using
the classic naming scheme), or it could be the
name of a <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=extra_files";?>">collated file</A> (See also the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=file_formats";?>">file format documentation</A>
for more details of this). The values are lists of strings or regular expressions to search for. For example:</div>
<div class="Text_Normal">
<?php codeSampleBegin() ?>
[run_dependent_text]
stdout:Process ID
stdout:[0-9][0-9]:[0-9][0-9]
my_file:Machine name
<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal">
This will cause all lines that contain the string &ldquo;Process
ID&rdquo; or match the given regular expression on the second line to be filtered
out from the standard output. Likewise, the collated file
"my_file" will be stripped of lines containing the string "Machine
name". 
</div>
<div class="Text_Normal">
The patterns provided may contain regular expressions. Any line
in the file which matches the expression, or contains the text
provided, will be filtered out in its entirety from the
comparison. The regular expressions used are those used by Python,
and their format is documented <A class="Text_Link" HREF="http://docs.python.org/library/re.html#regular-expression-syntax">here</A>.</div>
<div class="Text_Normal"> 
TextTest tries to judge whether a regular expression is intended or not, and it does this by looking for the presence of
any of the characters "^$[]{}\*?|+". If one is found, it will attempt to compile the regular expression, and failure will
result in using the string as a literal string to search for. If none is found the string will be interpreted this way to
start with.</div>
<div class="Text_Normal"> 
Therefore a regular expression containing only "." characters,
such as "..." to mean any three characters, will not be recognised by TextTest and will be interpreted
as three literal dots.
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
	<div class="Text_Normal"><li><SPAN STYLE="text-decoration: none"><b><I>&lt;pattern&gt;{PREVLINES
	&lt;number_of_lines&gt;}</I></b></SPAN> - On encountering a
	match with &lt;pattern&gt;, remove &lt;number_of_lines&gt; lines of text <I>before</I> the match. The
	count does not include the line matched, unlike the {LINES x} matcher above.</div>

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
	<div class="Text_Normal"><li><SPAN STYLE="text-decoration: none"><b><I>&lt;pattern&gt;{REPLACE
	&lt;text&gt;}</I></b></SPAN>- On encountering a match with the
	pattern, instead of removing the whole line, replace just the
	part of the line which matched the pattern with the text
	indicated by &lt;text&gt;. This can be combined with {WORD...}
	which will replace just the indicated word rather than the text
	matched. If &lt;pattern&gt; is a regular expression, it can
	include groups (indicated by parantheses) which can then be
	referred to in the REPLACE text as \1, \2 etc.</div>

        <div class="Text_Normal"><li><SPAN STYLE="text-decoration: none"><b><I>&lt;pattern&gt;{MATCH
	&lt;match_number&gt;}</I></b></SPAN> - On encountering the
	&lt;match_number&gt;th instance of &lt;pattern&gt;, remove the line
	containing the pattern.</div>
	<div class="Text_Normal"><li><b><I>&lt;pattern1&gt;{-&gt;}&lt;pattern2&gt;</I></b>
	- On encountering a match with &lt;pattern1&gt;, all lines are
	filtered out until &lt;pattern2&gt; is matched. Neither the
	start line matching &lt;pattern1&gt; nor the end line matching &lt;pattern2&gt;
	are themselves filtered (but see below). 
	</div><div class="Text_Normal"><li><b><I>&lt;pattern1&gt;{[-&gt;]}&lt;pattern2&gt;</I></b>
	- As above except also filter away both the start and end lines. 
	</div><div class="Text_Normal"><li><b><I>&lt;pattern1&gt;{[-&gt;}&lt;pattern2&gt;</I></b>
	- As above except also filter away just the start line. 
	</div><div class="Text_Normal"><li><b><I>&lt;pattern1&gt;{-&gt;]}&lt;pattern2&gt;</I></b>
	- As above except also filter away just the end line.</div>
	<div class="Text_Normal"><li><b><I>{INTERNAL writedir}</I></b> &ndash; This is a
	special pattern that will match TextTest's own temporary paths
	for the test. Sometimes your application will write out
	absolute paths, which will naturally be relative to the
	temporary directory where the test is run. These will then
	produce different text every time. This syntax is mostly to
	save you the bother of producing an exact regular expression to
	match these paths. It does not currently work if your temporary path (i.e. $HOME/.texttest/tmp
        if you haven't overridden it) contains spaces, with the single exception of "Documents and Settings"
        because this is now the default "HOME" location on Windows. If you get trouble, set $TEXTTEST_TMP
        to a path that doesn't contain spaces.
        </div>
</UL>
<div class="Text_Normal">For example:</div>
<div class="Text_Normal">
<?php codeSampleBegin() ?>
[run_dependent_text]
stdout:Process ID{WORD 3}
stdout:[0-9][0-9]:[0-9][0-9]{LINES 3}
stderr:{LINE 1}
my_file:Machine name{-&gt;}End of Machines Section
my_file:{INTERNAL writedir}{REPLACE &lt;texttest write dir&gt;}
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
of lines, so that an "approved file" from UNIX
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

<div class="Text_Header">
<A NAME="floating_point_tolerance"></A><A NAME="relative_float_tolerance"></A>Filtering floating point differences</div>
<div class="Text_Normal">If the output contains floating point values,
setting up the tests can be messy because the &ldquo;exact&rdquo; values may
change depending on compiler, operating system, optimization level, and so on.
To cope with this, there is the config file dictionary entry &ldquo;floating_point_tolerance&rdquo;
and &ldquo;relative_float_tolerance&rdquo; which work similar to &ldquo;run_dependent_text&rdquo;
and try to filter these changes by detecting
floating point data in your input and only report them as a difference if
they exceed the tolerance specified, e.g.
<?php codeSampleBegin() ?>
[floating_point_tolerance]
stdout:0.0101
<?php codeSampleEnd() ?>
will report differences only if two floating point values in the standard output differ
by more than 0.0101, thus 6.00 will be &ldquo;equal&rdquo; to 6.01.
The following setting
<?php codeSampleBegin() ?>
[relative_float_tolerance]
stdout:0.01
<?php codeSampleEnd() ?>
will allow for deviations up to 1%, which means 6.00 is still &ldquo;equal&rdquo;
to 6.01 but 0.51 against 0.52 does not match (which would be tolerated with
the absolute tolerance setting). Both filtering mechanisms can be applied on the same
file. The former is often useful to cope with rounding errors, the latter to check
for deficiencies coming from different floatng point precisions.
</div>
<div class="Text_Normal">This filtering step is applied after the run_dependent_text
step. Please keep in mind that this filtering might not always work as expected,
because it operates based on a textual diff. This means if the numbers
you want to be compared are not at the same location in the file this filtering
will not work. Furthermore the detection of floating point values is not very
elaborate, it supports scientific notation though.
If you happen to see unexpected bevavior concerning this option, try to compare
the files using texttest/lib/default/fpdiff.py as a command line tool
and report the results back to the texttest mailing list.
</div>
