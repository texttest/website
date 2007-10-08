<div class="Text_Main_Header">Understanding
TextTest Test Suites</div>
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
<div class="Text_Header"><A NAME="-d"></A>The Root Directory</div>
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
variable &quot;TEXTTEST_HOME&quot; is set, use that. 
</div>

<div class="Text_Normal"><li>If neither of the above, use the current working
directory. 
</div>
</OL>
<div class="Text_Normal">For
normal usage, you should set TEXTTEST_HOME to an appropriate
value. It is always set internally by TextTest, however its
value is initially determined, so its value may be used in the
configuration files that are described below.</div>
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

<div class="Text_Header"><A NAME="binary"></A><A NAME="interpreter"></A><A NAME="import_config_file"></A>
The Config File for a Test Application</div>
<div class="Text_Normal">This file basically consists of key, value pairs, where the
keys are &ldquo;properties&rdquo; with names predefined by
TextTest. The most important of these is the entry &quot;binary&quot;,
which defines the path to the SUT and without which nothing much
will happen. This should be an absolute path, although
environment variables may be included. It can be any executable
program, not just a binary. It can also be the name of a Java
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
useful for setting things like <A class="Text_Link" href="interfaces.html#file_colours">GUI
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
themselves. Such a file doesn't need to have a particular name.</div>

<div class="Text_Header"><A NAME="auto_sort_test_suites"></A>Test Suites</div>
<div class="Text_Normal">A Test Suite is a recursive collection of test cases arranged
in a particular order. It is defined for a Test Application by a
directory in the file system containing a local file called
<B><B>testsuite.&lt;app&gt;</B></B>. This lists subdirectories
in the order in which they should be considered. These
subdirectories may correspond to test cases or may themselves be
test suites. The file is in <A class="Text_Link" href="#Appendix - TextTest file formats">Standard
List Format</A>. Having found a test application by finding
<B><B>config.&lt;app&gt;</B></B>, will then look at
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
applications may share the same test case if desired. To define
a test case for a test application, at least one test definition
file must be present. Definition files tell TextTest how to run
the SUT for this test case. The following files will be taken as
test definition files:</div>
<UL>
<div class="Text_Normal"><li><B><B>options.&lt;app&gt;</B></B>
- This will be interpreted as command line options to be given
to the system under test. 
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
collection of these can be disabled: see the <A class="Text_Link" href="comparison.html">guide
to configuring the evaluation of test results</A>.</div>

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
<div class="Text_Header">Using Environment Files to Set Environment Variables</div>
<div class="Text_Normal">Any test suite or test case can tell TextTest to set
environment variables by providing an environment file. This is
a file called <B><B>environment.&lt;app&gt;</B></B> or just
<B><B>environment</B></B> (it has been found that applications
often need to share environment variables). This file is in
<A class="Text_Link" href="#Appendix - TextTest file formats">Standard Dictionary
Format</A> , with the environment variable names as keys and
their values as entries. If the environment file is provided in
a test case these variables will be set just for that test case.
If in a test suite it will be set for all test suites and test
cases containing in that test suite, operating recursively. 
</div>

<div class="Text_Normal">When exiting the test suite, attempts will be made to unset
the environment variables, however be aware that not all
versions of Python/operating systems support this. Therefore you
may need to set dummy values in other test suites to prevent
unintended effects.</div>
<div class="Text_Normal">The values of the variables may themselves contain
environment variables: if so, this should be done UNIX-style
using $&lt;var_name&gt;.</div>
<div class="Text_Header"><A NAME="-v"></A>Versions of Test Applications</div>
<div class="Text_Normal">It is often needed to define different versions of an
application which may not be quite the same in all respects, but
which want to share some portion of the test suite structure of
the parent application. To specify a version to run, fill in the
&ldquo;run this version&rdquo; field under Running/What to Run
tabs on the static GUI, or use -v &lt;version&gt; on the command
line. Note that there is a similar field in the Recording tab in
case you are testing GUIs.</div>

<div class="Text_Normal">For each file type described so far, the framework will then
look also for files called &lt;root&gt;.&lt;app&gt;.&lt;version&gt;
where &lt;root&gt; is &ldquo;environment&rdquo;, &ldquo;config&rdquo;,
&ldquo;testsuite&rdquo; etc. in each case. If such a file does
not exist, &lt;root&gt;.&lt;app&gt; is then always used. If the
file does exist, it is used instead of &lt;root&gt;.&lt;app&gt;

in the case of files in test cases (which are interpreted by the
SUT) and Standard List Format files (i.e. the testsuite.&lt;app&gt;
files). In the case of Standard Dictionary Format (i.e. the
config and environment files), however, they are interpreted as
overriding particular entries in the dictionary, so that entries
not present in &lt;root&gt;.&lt;app&gt;.&lt;version&gt; are read
from &lt;root&gt;.&lt;app&gt;.</div>

<div class="Text_Normal">It is possible to save test results with a version
identifier, so that they will be used for comparison next time
that version is run. 
</div>
<div class="Text_Header"><A NAME="base_version"></A><A NAME="version_priority"></A>Aggregation
of versions</div>
<div class="Text_Normal">Several versions can be &quot;aggregated&quot; and used at
the same time. This is done by specifying -v
&lt;version1&gt;.&lt;version2&gt; on the command line, and can
be applied to any number of versions. 
</div>

<div class="Text_Normal">Note that such aggregation is not order-specific. Running
with &ldquo;-v a.b&rdquo; will be exactly equivalent to running
&ldquo;-v b.a&rdquo; : no preference is indicated by the
ordering. This can be a problem when there are settings for
version a and version b which are in conflict &ndash; it is
essentially not defined which will be preferred to which.</div>
<div class="Text_Normal">To clearly define which versions should be preferred to which
other versions, use the &ldquo;version_priority&rdquo; config
file setting. This takes the form of a dictionary, where the
keys are version names and the values are numbers, where a low
number implies that the settings for that version should be used
in preference to another version. The default priority is 99 for
all files.</div>

<div class="Text_Normal">You can also say that a version &quot;inherits&quot; settings
from another by adding the &quot;base_version&quot; entry to the
config file. Thus if config.&lt;app&gt;.v1 contains the line
&quot;base_version:v2&quot; then all the files for v1 are also
read as well as those for v2. 
</div>
<div class="Text_Header"><A NAME="extra_version"></A>Running Multiple versions</div>

<div class="Text_Normal">Note that the syntax -v &lt;version1&gt;,&lt;version2&gt; is
similar to -a &lt;app1&gt;,&lt;app2&gt;: i.e. it will first run
everything with version1 and then run everything with version2.
It can be useful to start another version all the time when
running tests, so that -v v1 behaves like - v v1,v2 at all times
(or no option behaves like -v ,v2). This is achieved by adding
the line &quot;extra_version:v2&quot; to the relevant config
file.</div>
<div class="Text_Header"><A NAME="comparetest.RemoveObsoleteVersions"></A>Managing
versioned results</div>

<div class="Text_Normal">Such versioned results are easy to create but tend to be hard
to remove, you can end up with a lot of identical files with
different version IDs. To help solve this, the <A class="Text_Link" href="#-s">plugin
script</A> &ldquo;comparetest.RemoveObsoleteVersions&rdquo; will
identify such redundancy and remove the versioned files. It will
also warn where versions are equivalent but not redundant. For
example, if the files output.myapp and output.myapp.2 are
identical, then output.myapp.2 will be removed. If
output.myapp.2 and output.myapp.3 are the same, then only a
warning is printed.</div>
<div class="Text_Header"><A NAME="-c"></A><A NAME="checkout_location"></A><A NAME="default_checkout"></A>
Version-controlling the Test Suite and Using Checkouts</div>
<div class="Text_Normal">All of the files and directories discussed here can amount to
a substantial structure once you have a few tests. These will
clearly change over time along with the code that they test.
When you have multiple developers it is hence nearly always a
good idea to version-control the test suite files so that
developers making changes to the test suite do not disturb each
other. Using the history provided by version-control software
can also be very useful to track the behaviour of your
application over time.</div>
<div class="Text_Normal">TextTest does not integrate directly with any version control
software right now, but it does have a concept of a &ldquo;checkout&rdquo;

which aids in using it. In a version-controlled environment, you
want to be able to specify the path to the SUT as a relative
path, so that different developers can test their own code in
their own user space, and they can also painlessly run each
others code or maintain several checkouts of the system..</div>
<div class="Text_Normal">It is expected that TextTest test suites will want to be
version-controlled, and hence an easy means of switching between
different &quot;checkouts&quot; of the version-control system is
needed. A checkout is different to a version in that all
checkouts are expected to produce the same results, and making
sure that last night's central checkout does the same as a
developer's local code is an essential part of verifying
development work.</div>
<div class="Text_Normal">TextTest will export the environment variable
TEXTTEST_CHECKOUT. Any setting in the <I>config</I> or
<I>environment</I> files can be made to depend on this variable:
you can insert it as you would with other environment
variables.. A very common usage is the compulsory &ldquo;binary&rdquo;

setting in the config file. 
</div>
<div class="Text_Normal">How does TextTest detemine its value? A default value is
provided via the config file, but it can also be configured per
run. Checkouts are identified by short checkout names, and/or by
the full path which they correspond to. 
</div>
<div class="Text_Normal">There are two entries in the config file, &quot;checkout_location&quot;
and &quot;default_checkout&quot;. &ldquo;default_checkout&rdquo;
identifies what the short name of the checkout is by default.
&ldquo;checkout_location&rdquo; is a dictionary entry mapping
these short names to one or more full paths, so several
different variants can be provided depending on how different
users have named the directories in their space.
TEXTTEST_CHECKOUT will be set to the first existing path found
in this way.</div>

<div class="Text_Normal">The &ldquo;short name&rdquo; can be used in these paths as
$TEXTTEST_CHECKOUT_NAME. In previous versions of TextTest, the
rule has been to concatenate the &ldquo;short name&rdquo; with
the path given by &ldquo;checkout_location&rdquo;, which for
backwards compatibility is still the behaviour if the
checkout_location doesn't depend on $TEXTTEST_CHECKOUT_NAME.</div>
<div class="Text_Normal">To change the checkout on the command line, use the -c
option, or from the static GUI, fill in the &ldquo;Use checkout&rdquo;
text box under the &ldquo;What to Run&rdquo; tab. If the value
provided is a relative path, it will be used as the &ldquo;short
name&rdquo; and combined with the corresponding value of
&quot;checkout_location&quot; as described above. If it is an
absolute path, it will be used as is and the config file
settings ignored.</div>

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
<div class="Text_Normal">texttest.py -s &ldquo;default.ReplaceText file=errors old=bad new=good&rdquo;</PRE><div class="Text_Normal">
TextTest includes several such scripts which have been found to
be generally useful, which are <A class="Text_Link" href="scripts.html">listed
here</A>. To see how to write your own such scripts, consult the
<A class="Text_Link" href="configmodule.html">guide to writing your own
configuration</A>. 
</div>

<div class="Text_Normal">The above example (default.ReplaceText) is a particularly
useful way to update lots of results in a predictable way. It is
basically a search-and-replace mechanism with the advantage that
you can select tests in the normal ways and the files relevant
to the testsuite will be chosen for you. The above example will
naturally replace all instances of &ldquo;bad&rdquo; with &ldquo;good&rdquo;
in all &ldquo;errors&rdquo; result files.</div>
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
is done by <BR>my_key:A<BR>my_key:B</div>
<div class="Text_Normal">Providing the entry<BR>my_key:{CLEAR LIST}</div>

<div class="Text_Normal">allows overriding files to remove entries added in a parent
version file.</div>
<div class="Text_Normal">It can also be useful to have the value be a dictionary. This
is achieved by the &quot;section header&quot; format,
i.e.<BR>[my_dictionary]<BR>first_key:first_value<BR>second_key:second_value</div>
<div class="Text_Normal">Entries within section headers can also use the list format
described above.</div>
<div class="Text_Normal">In a few cases the value is essentially a dictionary, but
with two keys (a &ldquo;composite dictionary entry&rdquo;). This
is used for the batch mode and performance-related settings. The
format does not look very different to the above, but because
anything can appear in the dictionary rather than predefined key
names, it is necessary to have a mechanism to share values. This
is achieved by the special predefined key name &ldquo;default&rdquo;.</div>

<div class="Text_Normal">[my_composite_dictionary]<BR>first_key:first_value<BR>default:default_value</div>
<div class="Text_Normal">Here a lookup of first_key in my_composite_dictionary will
produce &ldquo;first_value&rdquo;. A lookup of &ldquo;second_key&rdquo;
(or anything else) will produce &ldquo;default_value&rdquo;.</div>
<div class="Text_Normal">If you only wish to override the default value of such a
dictionary, it is acceptable to use the format for
non-dictionary entries, i.e. simply</div>

<div class="Text_Normal">my_composite_dictionary:default_value</div>
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