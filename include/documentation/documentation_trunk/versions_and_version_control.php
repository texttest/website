<div class="Text_Main_Header">Using TextTest Versions and Checkouts</div>
<div class="Text_Description">Handling different versions and instances of the system under test</div>

<div class="Text_Header"><A NAME="-v"></A>Versions of tested applications</div>
<div class="Text_Normal">It is often needed to define different versions of an
application which may not be quite the same in all respects, but
which want to share some portion of the test suite structure of
the parent application. For example different releases of the same system
may not be able to pass all tests, and may produce slightly different log 
schemas, but are similar enough to want to share most of the test suite.
</div>
<div class="Text_Normal">
A version is simply identified by a name. For each TextTest file type
(see the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites";?>">
guide to TextTest test suites</A>), the framework will then
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
<div class="Text_Normal">
The presence of versioned files also affect the 
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites";?>#extra_search_directory">
mechanism for finding
and prioritising files in the hierarchy</A>. In this case the search path is essentially
processed in order once per version present. This means that a data file or environment file
in a test suite which has a relevant version suffix will be preferred to a file that 
has no such suffix but is found in the test case. (In TextTest 3.10 and earlier
test-specific files were preferred to version-specific files). 
</div>
<div class="Text_Normal">It is possible to approve 
test results with a version identifier, so that they will be used for 
comparison next time that version is run. So particular tests can
have version-specific results while others are shared between all versions.
</div>
<div class="Text_Normal">
To specify a version to run, fill in the &ldquo;run this version&rdquo; field 
under the Running/Basic tabs on the static GUI, or use -v &lt;version&gt; on the command
line. Note that there is a similar field in the Recording tab in
case you are testing GUIs.</div>

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
<div class="Text_Header"><A NAME="extra_version"></A><A NAME="-cp"></A>Running Multiple versions</div>

<div class="Text_Normal">Note that the syntax -v &lt;version1&gt;,&lt;version2&gt; is
similar to -a &lt;app1&gt;,&lt;app2&gt;: i.e. it will first run
everything with version1 and then run everything with version2.
It can be useful to start another version all the time when
running tests, so that -v v1 behaves like -v v1,v2 at all times
(or no option behaves like -v ,v2). This is achieved by adding
the line &quot;extra_version:v2&quot; to the relevant config
file.
</div>
<div class="Text_Normal">
When multiple versions are given to the static GUI in this way, only one line will appear
in the test tree view for each test, irrespective of how many versions it is present for.
A separate count is then kept of the number of tests and the number of distinct tests: the
latter is a count of how many rows are being shown. Actions such as copying and pasting
will apply to all versions of the test. In the dynamic GUI however a separate tree will be produced
for each version so that the results can be viewed separately.
</div>
<div class="Text_Normal">
It can also be useful to specify that certain additional versions should only be run in particular
batch sessions, if they are likely to consume a lot of resources. This is done via the config file
entry &quot;batch_extra_version:v2&quot;, which is keyed on batch session like most other batch settings.
For more details on batch mode see 
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=running_texttest_unattended";?>">plugin script</A>
</div>
</div><div class="Text_Normal">
Sometimes you may want to run multiple copies of the same test, for example in order to try
and track down a race condition or other indeterminism. Here, you can use the &quot;-cp&quot;
option from the command line (&quot;Times to Run&quot; entry on the Running/Basic tab in the static GUI).
This is essentially just syntactic sugar for running multiple versions whose names are generated on the fly:
i.e. -cp 3 is the same thing as -v ,copy_1,copy_2.
</div>
<div class="Text_Header"><A NAME="comparetest.PrintObsoleteVersions"></A>Managing
versioned results</div>

<div class="Text_Normal">Such versioned results are easy to create but tend to be hard
to remove, you can end up with a lot of identical files with
different version IDs. To help solve this, the <A class="Text_Link" href="#-s">plugin
script</A> &ldquo;comparetest.PrintObsoleteVersions&rdquo; will
identify such redundancy for you so that you can remove the files. It will
also warn where versions are equivalent but not redundant. For
example, if the files stdout.myapp and stdout.myapp.2 are
identical, then stdout.myapp.2 will be suggested for removal. If
stdout.myapp.2 and stdout.myapp.3 are the same, then only a
warning is printed. Previous to TextTest 3.10 this script was called RemoveObsoleteVersions,
assumed the tests were in CVS and actually performed removals itself. The new version
is better tested, more generic and less easy to misuse hopefully.
</div>
<div class="Text_Header"><A NAME="-c"></A><A NAME="checkout_location"></A><A NAME="default_checkout"></A>
<A NAME="TEXTTEST_CHECKOUT"></A><A NAME="TEXTTEST_CHECKOUT_NAME"></A>
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
<div class="Text_Normal">TextTest has a concept of a "checkout"
which aids in using it. In a version-controlled environment, you
want to be able to specify the path to the SUT as a relative
path, so that different developers can test their own code in
their own user space, and they can also painlessly run each
others code or maintain several checkouts of the system.
</div>
<div class="Text_Normal">
A checkout is different to a version in that all
checkouts are expected to produce the same results, and making
sure that last night's central checkout does the same as a
developer's local code is an essential part of verifying
development work.</div>
<div class="Text_Normal">TextTest will export the environment variable
TEXTTEST_CHECKOUT. Any setting in the <I>config</I> or
<I>environment</I> files can be made to depend on this variable:
you can insert it as you would with other environment
variables.. A very common usage is the compulsory &ldquo;executable&rdquo;
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

<div class="Text_Normal">
The "short name" can be used in these paths as
$TEXTTEST_CHECKOUT_NAME. In previous versions of TextTest, the
rule has been to concatenate the "short name" with
the path given by "checkout_location", which for
backwards compatibility is still the behaviour if the
checkout_location doesn't depend on $TEXTTEST_CHECKOUT_NAME.
</div>
<div class="Text_Normal">
To change the checkout on the command line, use the -c
option, or from the static GUI, fill in the "Use checkout"
text box under the "Running/Basic" tabs. If the value
provided is a relative path, it will be used as the "short
name" and combined with the corresponding value of
"checkout_location" as described above. If it is an
absolute path, it will be used as is and the config file
settings ignored. You can also provide a comma-separated list of checkouts,
which will run several system instances against the same tests, much
as if they were separate versions. If no other settings for the checkout
are found, TextTest will use the current working directory, as it does with TEXTTEST_HOME.
</div>
<div class="Text_Header">Version control integration (Git/Mercurial/Bazaar/CVS)</div>
<div class="Text_Normal">If you use Git, Bazaar, Mercurial or CVS to version-control your tests,
you can view log, diff, status and annotation information directly
from the TextTest GUI. An appropriate menu and drop-down menus will just appear,
you don't need to do anything to enable it.
Hopefully more support for version control systems will follow.</div>
<div class="Text_Normal">Additionally, normal bookkeeping of tests is now sensitive
to the version control system. So renaming, moving and removing of tests that
are in Git,Mercurial,Bazaar or CVS will also do so in the appropriate version control system.
It is also possible to add tests or individual files to version control from
the appropriate menu: this is a separate action to actually adding the test. All
new or copied tests will not be added to version control automatically.</div>
