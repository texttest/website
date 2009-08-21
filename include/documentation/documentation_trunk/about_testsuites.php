<div class="Text_Main_Header">Understanding TextTest Test Suites</div>
<div class="Text_Description"> A Guide to the Files and
Directories</div>
<div class="Text_Header">Glossary</div>
<div class="Text_Normal">To avoid confusion, here is a quick list of definitions:</div>
<UL>
<div class="Text_Normal"><li><B>System Under Test (SUT)</B>

&ndash; The program that you wish to test. Assumed to be
available as an executable file. 
</div>
<div class="Text_Normal"><li><B>Test Application (or just
Application) </B>&ndash; A set of TextTest files corresponding
to testing a particular SUT. 
</div>
<div class="Text_Normal"><li><B>Test Case</B> &ndash;
defines a particular way to run the SUT, and the textual output
to be expected. 
</div>
<div class="Text_Normal"><li><B>Test Suite</B> &ndash; a group of Test Cases or
(recursively) Test Suites which are in some way related. 
</div>

</UL>
<div class="Text_Header"><A NAME="-d"></A><A NAME="TEXTTEST_HOME"></A><A NAME="TEXTTEST_PATH"></A>The Root Directory</div>
<div class="Text_Normal">This is the first thing determined by TextTest on being
called, and is where in your file system it will start to look
for tests. All test files are placed in subdirectories of this
directory. It is determined as follows: 
</div>
<OL>
<div class="Text_Normal"><li>If the command line option
&quot;-d&quot; has been set, use the value of that. 
</div>
<div class="Text_Normal"><li>If not, but the environment
variable "TEXTTEST_PATH" is set, use that. 
</div>
<div class="Text_Normal"><li>If not, but the environment
variable "TEXTTEST_HOME" is set, use that. 
</div>
<div class="Text_Normal"><li>If none of the above, use the current working
directory. 
</div>
</OL>
<div class="Text_Normal">For
normal usage, you should set TEXTTEST_HOME to an appropriate
value. It is always set internally by TextTest, however its
value is initially determined, so its value may be used in the
configuration files that are described below.</div>
<div class="Text_Normal">
It is possible to have multiple roots, as the name TEXTTEST_PATH suggests. TEXTTEST_PATH and TEXTTEST_HOME
are essentially aliases of each other, and both can be set in a similar way to PATH, i.e. on POSIX-based systems
a colon-separated list can be provided, or on Windows a semicolon-separated list. This means
that tests from disparate locations can be loaded into the same TextTest run.
</div>
<div class="Text_Header"><A NAME="-a"></A>Test Applications</div>
<div class="Text_Normal">To test a system with TextTest, the first thing to do is to
choose a unique identifier to be used as an extension for all
files relevant to that application. It does not matter what this
is. For the next few paragraphs this variable is indicated by
&lt;app&gt;. On Windows, you will probably want to associate
this extension with a text editor like notepad or wordpad. The
use of file extensions for this purpose is historical: TextTest
grew up on UNIX where file extensions do not have the meaning
that they do on Windows.</div>
<div class="Text_Normal">Basic information about an application and how to run it
appears in a file called <B><B>config.&lt;app&gt;</B></B>,
generally referred to as the &ldquo;config file&rdquo;. TextTest
will look for files with names of this format to determine which
applications it will run. It will start looking at the root
directory and look in that directory and one level down in the
directory structure: this is so that tests for related
applications can easily be grouped together in subdirectories of
the root directory. When TextTest is started, it will by default
look for and use all config files it can find. To tell it to
look for just one particular application, specify &quot;-a
&lt;app&gt;&quot; on the command line.</div>

<div class="Text_Header"><A NAME="executable"></A><A NAME="interpreter"></A><A NAME="import_config_file"></A>
The Config File for a Test Application</div>
<div class="Text_Normal">This file basically consists of key, value pairs, where the
keys are &ldquo;properties&rdquo; with names predefined by
TextTest. The most important of these is the entry &quot;executable&quot; (formerly known as &quot;binary&quot),
which defines the path to the SUT and without which nothing much
will happen. This should be an absolute path, although
environment variables may be included. It can also be the name of a Java
class that will be found on the Java class path, provided you
set &ldquo;interpreter&rdquo; to &ldquo;java&rdquo; (below). 
</div>

<div class="Text_Normal">The entry &ldquo;interpreter&rdquo; allows you to specify a
program to use as interpreter for the SUT, in the case that it
is a script rather than a binary. To some extent TextTest will
try to infer this from the file extension (e.g. set it to
&ldquo;python&rdquo; if the file ends in &ldquo;.py&rdquo;,
&ldquo;java&rdquo; if it ends in &ldquo;.jar&rdquo;), but it is
sometimes necessary to specify it explicitly.</div>
<div class="Text_Normal">The file itself has a specific format, called <A class="Text_Link" href="#Appendix - TextTest file formats">Standard
Dictionary Format</A>. It is worth familiarising yourself with
this, and often the best way is to look at the many examples in
TextTest's tests for itself (that come with the download).</div>

<div class="Text_Normal">It is also possible to have a personalised config file which
accepts all the same settings as the normal config file, and
will override anything provided there. This is particularly
useful for setting things like <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=personalising_ui"; ?>">GUI
preferences</A>. On UNIX, provide a file called &ldquo;.texttest&rdquo;
in your home directory. On Windows, put a file called
&ldquo;.texttest&rdquo; somewhere, and point the environment
variable TEXTTEST_PERSONAL_CONFIG at that location.</div>
<div class="Text_Normal">Sometimes it can be very useful to share configuration
settings between several related applications. In that case you
can use the &ldquo;import_config_file&rdquo; entry to identify
files of the same format whose settings should be included. The
file should be found under TEXTTEST_HOME, in the same way as
described in the above paragraph for the config files
themselves. Such a file doesn't need to have a particular name.
It can also be stored in an arbitrary location, see below for
a description of how TextTest searches for files.</div>

<div class="Text_Header"><A NAME="auto_sort_test_suites"></A>Test Suites</div>
<div class="Text_Normal">A Test Suite is a recursive collection of test cases arranged
in a particular order. It is defined for a Test Application by a
directory in the file system containing a local file called
<B><B>testsuite.&lt;app&gt;</B></B>. This lists subdirectories
in the order in which they should be considered. These
subdirectories may correspond to test cases or may themselves be
test suites. The file is in <A class="Text_Link" href="#Appendix - TextTest file formats">Standard
List Format</A>. Having found a test application by finding
<B><B>config.&lt;app&gt;</B></B>, TextTest will then look at
<B><B>testsuite.&lt;app&gt;</B></B> in the same directory to
determine what the full test suite consists of. It will then
look, in the order given, at all the subdirectories specified,
and where they are themselves test suites, will repeat this
process recursively until all specified test cases have been
found. Each test suite directory, apart from the top level one,
will have the same name as the test suite itself.</div>

<div class="Text_Normal">Note that <B><B>testsuite.&lt;app&gt;</B></B> files are
generated and edited automatically when using the static GUI to
create test cases or test suites. However, it is also useful to
view and edit them by hand: the static GUI will automatically
refresh if the elements in the test suite file are re-ordered,
and the contents of the Description fields are added as comments
to this file. 
</div>
<div class="Text_Normal">If you find that managing an explicit order of tests is too
much effort, you can set the &ldquo;auto_sort_test_suites&rdquo;
config file setting to &ldquo;1&rdquo;. The order in the
testsuite files will then be ignored and all test suites and
test cases presented in alphabetical order.</div>
<div class="Text_Header"><A NAME="log_file"></A>Test Cases</div>

<div class="Text_Normal">A test case is represented in TextTest by a particular
directory in the file system, and the name of the test case is
always the same as the name of the directory. Many test
applications may share the same test case if desired. Any directory referred to
by a "testsuite" file as described above which does not itself contain a testsuite
file will be considered to be a test case. "Definition files" may also be placed in the
test case directory and tell TextTest how to run
the SUT for this test case. The following files will be taken as
test definition files:</div>
<UL>
<div class="Text_Normal"><li><B><B>options.&lt;app&gt;</B></B>
- This will be interpreted as command line options to be given
to the system under test. They may now also be used in test suites, see
section below.
</div>
<div class="Text_Normal"><li><B><B>input.&lt;app&gt;</B></B>
- This will be redirected to the system under test as standard
input. 
</div>

<div class="Text_Normal"><li><B><B>usecase.&lt;app&gt;</B></B><SPAN STYLE="text-decoration: none">
- The use case recorder will be configured to replay the system
under test from this file.</SPAN> 
</div>
</UL>
<div class="Text_Normal">The expected output files from the SUT are also stored in
this directory: these will be compared with the actual result
for each test run. By default, the standard output of the system
under test is redirected to <B><B>output.&lt;app&gt;</B></B>,
while its standard error is redirected to <B><B>errors.&lt;app&gt;</B></B>.
Other textual output files can also be collected, and the
collection of these can be disabled: look <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=extra_files"; ?>">here</A> for details of how.</div>

<div class="Text_Normal">TextTest assumes that high-level information of interest to
it will be logged to one particular result file. This file is
indicated by the &ldquo;log_file&rdquo; config file entry and
defaults to &ldquo;output&rdquo; (i.e. the standard output of
the SUT). Many different features of TextTest will look here for
information to extract of one sort or another. 
</div>
<div class="Text_Normal">All of these files are in whatever format is expected or
produced by the SUT: TextTest does not itself look at their
contents.</div>
<div class="Text_Header"><A NAME="extra_search_directory"></A>Finding and prioritising files in a test suite</div>
<div class="Text_Normal">By now the idea should be emerging that TextTest
follows the principle of "Convention over Configuration", and uses particular names
to indicate files for particular purposes. A TextTest test suite therefore
consists of such a hierarchical directory structure, where many such files may be
found. </div>
<div class="Text_Normal">
There arise many situations where TextTest has to find a particular file in this structure.
Files containing environment variable settings (described below), files containing <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>">test data</A>, and files containing
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=automatic_failure_interpretation"; ?>">failure interpretation information</A> all need to be organised in some hierarchical way. The
basic idea is that the position a file is stored indicates which tests it should apply to, so
that a file in a test suite applies to all tests contained in that test suite.
</div>
<div class="Text_Normal">
So if TextTest needs to find a particular file, it will first look in the test, then in the
parent test suite, and recursively repeat up to the root test suite. The config file entry
"extra_search_directory" can then be used to extend this search path further to look for
additional files outside the test structure. As this is a dictionary it can be keyed on
the type of file search for, so that different search paths can be provided for different file
types. The &ldquo;default&rdquo; key can be specified to make the same search path apply to all files.
This setting can also apply to the "imported config files" described above, so that
they can also be stored outside the given test suite structure.</div> 
<div class="Text_Header">Using Options Files to set Command-line Options</div>
<div class="Text_Normal">Any test suite or test case can tell TextTest to pass
command-line options to the SUT by providing an options file. This is
a file called <B><B>options.&lt;app&gt;</B></B>. The contents should just be the
options as the SUT understands them on a single line. These options files are found 
and prioritised via the mechanism described above, and may also contain references to environment variables. 
All such files are considered and all options found will be set. This means that such files do not override 
each other: the options provided will be the union of everything found along the way. It is however possible 
to clear options set higher up: this is done via the syntax {CLEAR ...} as in the config file. For example, if a test suite contains 
"options.app" with the contents "-foo 1" and a test in it has "options.app" containing "-bar 2", then the
application will be run with "-foo 1 -bar 2". It is however possible to override this : the test options
file can instead contain
<?php codeSampleBegin() ?>
{CLEAR -foo 1} -bar 2 
<?php codeSampleEnd() ?>
which will instead cause it to be run with options "-bar 2". It is also possible to simply write "{CLEAR}",
in which case all more general options files will be ignored.</div>
<div class="Text_Normal">
For the most part options files will be combined in order, so care is needed in case the SUT is sensitive
to the order of the arguments. TextTest will however attempt to insert optional arguments (beginning with "-")
before positional arguments as best it can, but it isn't always possible to tell which is which as TextTest
has no understanding of what arguments the SUT actually accepts. In the case of "-foo 1", the "1" could be an argument
to the "-foo" option or it could be a separate positional argument. TextTest will assume the former in this case.
</div>
<div class="Text_Header">Using Environment Files to set Environment Variables</div>
<div class="Text_Normal">Any test suite or test case can tell TextTest to set
environment variables by providing an environment file. This is
a file called <B><B>environment.&lt;app&gt;</B></B> or just
<B><B>environment</B></B> (it has been found that applications
often need to share environment variables). This file is in
<A class="Text_Link" href="#Appendix - TextTest file formats">Standard Dictionary
Format</A> , with the environment variable names as keys and
their values as entries. These environment files are found and prioritised
via the mechanism described above: all such files are considered and all variables
will be set, although if the same variable is set by several files the most
specific one in the hierarchy will of course be chosen. 
</div>
<div class="Text_Normal">The values of the variables may themselves contain
environment variables: if so, this should be done UNIX-style
using $&lt;var_name&gt;.</div>
<div class="Text_Header">Using Properties Files to set Java Properties</div>
<div class="Text_Normal">In Java, environment variables are not used so much and
instead applications are generally configured via properties files. You can provide
these files in much the same way as environment files described above. This is
a file called <B>properties.&lt;app&gt;</B> or just
<B>properties</B>. This file is also in
<A class="Text_Link" href="#Appendix - TextTest file formats">Standard Dictionary
Format</A> , with the section names identifying names of individual properties files,
the keys as the names of the properties and the values as entries. Naturally these files
are also found and prioritised via the mechanism described above, and settings will be
overridden appropriately: it should never be necessary to repeat anything. For example: 
<?php codeSampleBegin() ?>
[myprops]
prop1:val1
prop2:val2
[end]
<?php codeSampleEnd() ?>

This will create a file "myprops.properties" in the sandbox directory (which will be the
current working directory when the test runs), containing 

<?php codeSampleBegin() ?>
prop1 = val1
prop2 = val2
<?php codeSampleEnd() ?>

</div>
<div class="Text_Header"><A NAME="-s"></A><A NAME="default.ReplaceText"></A>Analysing and updating the test suite
directory structure</div>
<div class="Text_Normal">When a large test suite has been created, you often want to
gather information from it, or even update its contents in a
predictable way. It is very useful to be able to re-use
TextTest's ability to parse and understand the structure while
writing your own script in Python to analyse or update in terms
of the applications, test suites and test cases.</div>
<div class="Text_Normal">There is thus a mechanism to plug in arbitrary scripts, which
are run with &ldquo;-s &lt;module_name&gt;.&lt;class_name&gt;&rdquo;,
where &lt;module_name&gt; is some Python module and &lt;class_name&gt;

is the name of the script. In order to pass arguments to such
scripts, a form with &lt;option&gt;=&lt;value&gt; is used. For
example, to call the default.ReplaceText script with appropriate
arguments, you would call:</div>

<div class="Text_Normal">
<?php codeSampleBegin() ?>
texttest.py -s &ldquo;default.ReplaceText file=errors old=bad new=good&rdquo;
<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal">
TextTest includes several such scripts which have been found to
be generally useful, which are <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=scripts_default";?>">listed
here</A>. To see how to write your own such scripts, consult the
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=writing_a_config_module";?>">guide to writing your own
configuration</A>. 
</div>

<div class="Text_Normal">The above example (default.ReplaceText) now has a version
available from the static GUI (Replace Text in Files) which will probably be a more
convenient way to run it than from the command-line as above. It is a particularly
useful way to update lots of results in a predictable way. It is
basically a search-and-replace mechanism with the advantage that
you can select tests in the normal ways (in the static GUI or via the command line) 
and the files relevant to the testsuite will be chosen for you. The above example will
naturally replace all instances of &ldquo;bad&rdquo; with &ldquo;good&rdquo;
in all &ldquo;errors&rdquo; result files.</div>

<div class="Text_Header"><A NAME="default.ExportTests"></A>Transferring tests between
different test suites</div><div class="Text_Normal">
As another example of the above plugin script mechanism, it is possible
to have several different test suites that are based on testing broadly the same
application. For example you might have one master test suite with many different
possible functionalities, where other projects want to take a part of it to
adapt. You can achieve this with the "default.ExportTests" plugin script. This is used as follows:
</div>

<div class="Text_Normal">
<?php codeSampleBegin() ?>
texttest.py &lt;options&gt; -s &ldquo;default.ExportTests dest=/path/to/destination/suite&rdquo;
<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal">
The tests chosen via &lt;options&gt; will then be copied to an equivalent position in the destination
suite. If they existed there already they will not be updated currently.
</div>
<div class="Text_Header"><A NAME="Appendix - TextTest file formats"></A>TextTest file
formats</div>
<div class="Text_Normal">TextTest reads two file formats - Standard List Format (for
<I>testsuite</I> files) and Standard Dictionary Format (for
<I>config</I> and <I>environment files</I>). These are designed
to be as human readable as possible.</div>

<div class="Text_Normal">Both will filter out blank lines and lines beginning with
&quot;#&quot;, the latter being interpreted as comments. It's
good practice to use the latter feature to document things about
your application and its tests in the TextTest files themselves.</div>
<div class="Text_Normal">Both will also expand environment variables, indicated by
&quot;$&quot;.</div>
<div class="Text_Normal">Standard List Format is simple: each entry is a complete
line. So a Standard List File is simply interpreted as an
ordered list of the lines in it which are not blank and do not
start with &quot;#&quot;.</div>
<div class="Text_Normal">Standard Dictionary Format has entries in the form
&lt;key&gt;:&lt;value&gt;, where &lt;key&gt; indicates an
environment variable to be set to &lt;value&gt; in the case of
the <I>environment</I> file, and a variable understood by
TextTest in the case of the <I>config</I> file.</div>

<div class="Text_Normal">In the case of the <I>config</I> file, it can be useful to
have the value be a list itself. This is achieved by adding
several entries for the same &lt;key&gt;. So if we want to set
the key &ldquo;my_key&rdquo; to a list containing A and B,, this
is done by 
<?php codeSampleBegin() ?>
my_key:A
my_key:B
<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal">When writing versioned files that override settings in
a parent config file, it is sometimes useful to be able to remove some of those settings
from such a list. Here
<?php codeSampleBegin() ?>
my_key:{CLEAR LIST}
<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal">will wipe all the entries from the list associated with my_key,
while
<?php codeSampleBegin() ?>
my_key:{CLEAR &lt;my_item&gt;}
<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal">allows you to remove single items without needing to reset the whole list.</div>
<div class="Text_Normal">It can also be useful to have the value be a dictionary. This
is achieved by the &quot;section header&quot; format,
i.e.<?php codeSampleBegin() ?>
[my_dictionary]
first_key:first_value
second_key:second_value
<?php codeSampleEnd() ?>
Entries within section headers can also use the list format
described above.</div>
<div class="Text_Normal">In a few cases the value is essentially a dictionary, but
with two keys (a &ldquo;composite dictionary entry&rdquo;). This
is used for the batch mode and performance-related settings. The
format does not look very different to the above, but because
anything can appear in the dictionary rather than predefined key
names, it is necessary to have a mechanism to share values. This
is achieved by the special predefined key name &ldquo;default&rdquo;.

<?php codeSampleBegin() ?>
[my_composite_dictionary]
first_key:first_value
default:default_value
<?php codeSampleEnd() ?>
Here a lookup of first_key in my_composite_dictionary will
produce &ldquo;first_value&rdquo;. A lookup of &ldquo;second_key&rdquo;
(or anything else) will produce &ldquo;default_value&rdquo;.</div>
<div class="Text_Normal">If you only wish to override the default value of such a
dictionary, it is acceptable to use the format for
non-dictionary entries, i.e. simply <?php codeSampleBegin() ?>
my_composite_dictionary:default_value
<?php codeSampleEnd() ?></div>
<div class="Text_Header">Examples</div>
<div class="Text_Normal">The TextTest download includes a test suite for itself. It is
recommended that you look around this (or any other example you
can find) to get an idea of how it works. There is also a quick
guide document included to help you find the simple &ldquo;target
application&rdquo; test suites which are used for testing
itself. These are simple in order to provide minimal tests, so
function as demonstration examples also. 
</div>
<div class="Text_Normal">When writing your own tests it is often best to start with
working files for another application and edit them suitably.
This reduces the risk of typing things wrongly, particularly in
the config file.</div>
