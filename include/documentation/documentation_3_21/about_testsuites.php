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
<div class="Text_Header"><A NAME="-d"></A><A NAME="TEXTTEST_HOME"></A><A NAME="TEXTTEST_PATH"></A><A NAME="TEXTTEST_ROOT"></A>
The Root Directory</div>
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
<div class="Text_Normal">
For this reason TextTest also sets the additional variable TEXTTEST_ROOT which refers to the root of the test tree
for the application concerned. This is to avoid referring to TEXTTEST_HOME in configuration files which is problematic
both because it might refer to multiple roots, and because of the subdirectory searching described in the next paragraph.
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
&lt;app&gt;&quot; on the command line. You can also specify several
applications by using a comma-separated list, i.e. "-a &lt;app1&gt;,&lt;app2&gt;"</div>

<div class="Text_Header">Config Files</div>
<div class="Text_Normal">This file basically consists of key, value pairs, where the
keys are &ldquo;properties&rdquo; with names predefined by
TextTest. The full list of these entries is dependent on your configuration module, 
and is documented here in the form of tables for the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default"; ?>">default</A> and <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_queuesystem"; ?>">queuesystem</A> configurations, as well as the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=personalpreffile"; ?>">personal config file</A>. The file itself has a  <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=file_formats"; ?>">specific format</A>, which you will need to become familiar with.
</div>
<div class="Text_Normal">
One such file must be present at the top level of your test suite, to define the "application under test" as understood by TextTest - see the previous paragraph. However it is also possible (since TextTest 3.20) to override some of the settings for individual tests and test suites by creating additional config files in those locations. For those tests, the config settings from the top level will be used unless overwritten by a locally defined file.</div>
<div class="Text_Normal">
Not every setting in the configuration documentation can be overridden here: some are reserved for being changed only at the application level. Unfortunately we don't currently have a full list of which ones these are - the best thing to do is try it out and report errors if you feel something "ought" to work in a test when it doesn't.
</div>
<div class="Text_Normal">It is also possible to have a personalised config file which
accepts all the same settings as the normal config file, and
will override anything provided there. This is particularly
useful for setting things like <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=personalising_ui"; ?>">GUI
preferences</A>. On UNIX, provide a file called &ldquo;.texttest&rdquo;
in your home directory. On Windows, put a file called
&ldquo;.texttest&rdquo; somewhere, and point the environment
variable TEXTTEST_PERSONAL_CONFIG at that location.</div>
<div class="Text_Header"><A NAME="executable"></A><A NAME="interpreter"></A>
Defining how to run the System under Test</div>
<div class="Text_Normal">
The first entry that must be defined is "executable" (formerly known as "binary"),
which defines the path to the SUT and without which nothing much
will happen. This should be an absolute path, although
environment variables may be included. If you create your application via the initial creation dialog,
you locate this file via the GUI and the setting is created for you.</div>
<div class="Text_Normal">
There are a couple of circumstances under which relative paths will be accepted. One is
if the same name is also included as a data file using one of the "*_test_path" settings: this
allows you to vary the executable used. It can also be the name of a Java
class that will be found on the Java class path, provided you
set &ldquo;interpreter&rdquo; to &ldquo;java&rdquo; (below). 
</div>
<div class="Text_Normal">The entry &ldquo;interpreter&rdquo; allows you to specify a
program to use as interpreter for the SUT, in the case that it
is a script rather than a binary. To some extent TextTest will
try to infer this from the file extension (e.g. set it to
&ldquo;python&rdquo; if the file ends in &ldquo;.py&rdquo;,
&ldquo;java&rdquo; if it ends in &ldquo;.jar&rdquo;), but it is
sometimes necessary to specify it explicitly.</div><div class="Text_Normal">
Arguments can be provided to the interpreter program via
the "interpreter_options" files, see below.
</div>
<div class="Text_Header"><A NAME="import_config_file"></A>Sharing config file settings between applications</div>
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
<B>testsuite.&lt;app&gt;</B>. This file is automatically generated by the TextTest GUI
so you shouldn't need to edit it directly. </div>
<div class="Text_Normal">
It lists subdirectories in the order in which they should be considered. These
subdirectories may correspond to test cases or may themselves be
test suites. Its format is briefly documented <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=file_formats"; ?>#testsuite">here</A>. Having found a test application by finding
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
<div class="Text_Header"><A NAME="log_file"></A><A NAME="filename_convention_scheme"></A>Test Cases</div>
<div class="Text_Normal">A test case is represented in TextTest by a particular
directory in the file system, and the name of the test case is
always the same as the name of the directory. Many test
applications may share the same test case if desired. Any directory referred to
by a "testsuite" file as described above which does not itself contain a testsuite
file will be considered to be a test case. "Definition files" may also be placed in the
test case directory and tell TextTest how to run
the SUT for this test case. </div>
<div class="Text_Normal">
Since TextTest 3.18 the default naming scheme has been changed for new test suites. This
is controlled by the config value "filename_convention_scheme" which will be set to "standard"
when you create a new test suite as these names were deemed less confusing. It will otherwise 
remain with the default "classic" scheme which contains the older names to avoid introducing mass
compulsory migration. The following files will be taken as test definition files:</div>
<UL>
<div class="Text_Normal"><li><B>environment.&lt;app&gt;</B>
- This will be interpreted as environment variables to be set for
 the system under test.
</div>
<div class="Text_Normal"><li><B>options.&lt;app&gt;</B>
- This will be interpreted as command line options to be given
to the system under test. They may now also be used in test suites, see
section below.
</div>
<div class="Text_Normal"><li><B>interpreter_options.&lt;app&gt;</B>
- This will be interpreted as command line options to be given to the interpreter program.
</div>
<div class="Text_Normal"><li><B>knownbugs.&lt;app&gt;</B>
- This will be interpreted as automatic failure interpretation information.
</div>
<div class="Text_Normal"><li><B>stdin.&lt;app&gt;</B>
- This will be redirected to the system under test as standard
input. In the "classic" naming scheme it should be called <B>input.&lt;app&gt;</B>
</div>
<div class="Text_Normal"><li><B>traffic.&lt;app&gt;</B>
- These are used to capture interaction with third party products in TextTest's mock functionality.
</div>
<div class="Text_Normal"><li><B>usecase.&lt;app&gt;</B>
- The use case recorder will be configured to replay the system
under test from this file. 
</div>
</UL><div class="Text_Normal">Naturally you should avoid using these reserved names for any other
purpose, such as test data files. TextTest will try to warn you if you do.
</div>
<div class="Text_Normal">The expected output files from the SUT are also stored in
this directory: these will be compared with the actual result
for each test run. By default, the standard output of the system
under test is redirected to <B>stdout.&lt;app&gt;</B> (output.&lt;app&gt; in
the classic naming scheme), while its standard error is redirected to <B>stderr.&lt;app&gt;</B>
(or errors.&lt;app&gt; in the classic scheme).
</div>
<div class="Text_Normal">
Other textual output files can also be collected, and the
collection of these can be disabled: look <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=extra_files"; ?>">here</A> for details of how.</div>

<div class="Text_Normal">TextTest assumes that high-level information of interest to
it will be logged to one particular result file. This file is
indicated by the &ldquo;log_file&rdquo; config file entry and
defaults to "stdout" or "output" depending on naming scheme 
(i.e. the standard output of the SUT). Many different features of TextTest will look here for
information to extract of one sort or another. 
</div>
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
<div class="Text_Normal">
In a similar way command-line options can be provided to the interpreter program using files named "interpreter_options".
For example these might be JVM options to a Java program.
</div>
<div class="Text_Header"><A name="environment files"></A>Using Environment Files to set Environment Variables</div>
<div class="Text_Normal">Any test suite or test case can tell TextTest to set
environment variables by providing an environment file. This is
a file called <B><B>environment.&lt;app&gt;</B></B> or just
<B><B>environment</B></B> (it has been found that applications
often need to share environment variables). This file is a simple dictionary-style
format with the environment variable names as keys and
their values as entries: the format is documented briefly <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=file_formats"; ?>#environment">here</A>. These environment files are found and prioritised
via the mechanism described above: all such files are considered and all variables
will be set, although if the same variable is set by several files the most
specific one in the hierarchy will of course be chosen. 
</div>
<div class="Text_Normal">The values of the variables may themselves contain
environment variables: if so, this should be done UNIX-style
using $&lt;var_name&gt;.</div>
<div class="Text_Normal">
In a similar way to above, the value may also be unset using the following syntax:
<?php codeSampleBegin() ?>
MY_ENV_VAR:{CLEAR}
<?php codeSampleEnd() ?>
which will remove any setting of MY_ENV_VAR set by suites higher up the hierarchy,
or from the shell from which TextTest was started. 
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
texttest.py -s &ldquo;default.ReplaceText file=stderr old=bad new=good&rdquo;
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
in all &ldquo;stderr&rdquo; result files.</div>

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
