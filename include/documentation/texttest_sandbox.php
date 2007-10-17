<div class="Text_Main_Header">The
TextTest Sandbox</div>
<div class="Text_Description"> handling test data and avoiding global side
effects</div>

<div class="Text_Normal">

</div>
<div class="Text_Header">Introduction</div>
<div class="Text_Normal">When TextTest tests are run, it will try to write the output
of the system under test to a temporary directory structure
created specifically for this purpose. This is known as the
&ldquo;TextTest sandbox&rdquo;: its purpose is to provide a
totally separate environment where your system can create,edit
and delete as much as it wants without doing anything permanent,
and also an environment where test data can be provided in an
easily accessed way.</div>
<div class="Text_Normal">There is one created for each run of each test. It is created
under the directory indicated by the environment variable
TEXTTEST_TMP. It defaults to ~/texttesttmp on UNIX systems and
the value of the TEMP environment variable on Windows. This is
hereafter referred to as the &ldquo;root temporary directory&rdquo;.</div>

<div class="Text_Normal">Each time TextTest is started, it is assigned a unique
identifier based on the version and the time stamp at which the
run was submitted (the string &ldquo;static_gui&rdquo; is
prepended in the case of the static GUI). A subdirectory of the
root temporary directory is then created with this name. All
temporary files and directories created by this run will then be
created under this directory.</div>
<div class="Text_Header">What it looks like, and what it is used for</div>
<div class="Text_Normal">In the case of the dynamic GUI or the console interface,
tests are actually being run. This means that, for every test
being run, a temporary directory structure is created which
essentially mirrors the permanent directories which represent
the tests (see the <A class="Text_Link" href="dirstructure.html">guide to TextTest
test suites</A>), so that each test is assigned a unique
temporary directory. All temporary files corresponding to
particular tests are then written to these directories. When the
tests are run, each test starts the system under test with the
corresponding temporary directory as current working directory,
with its standard output and standard error redirected to local
files.</div>
<div class="Text_Normal">It is imperative that you ensure any other files created by
the system under test are created relative to this temporary
directory, to avoid global side effects and to aid TextTest in
finding them. This should be possible by always specifying
relative paths in your test configuration files, which will be
interpreted relative to this directory for each run. 
</div>

<div class="Text_Normal">(In the temporary directory for each test case, TextTest
creates a subdirectory called &ldquo;framework_tmp&rdquo;. It
uses this to write its own temporary files, such as filtered
versions of the output, performance data etc.)</div>
<div class="Text_Normal">In the case of the static GUI, the temporary directory will
contain logs of each dynamic GUI run that is started from it.
These will write files in subdirectories labelled
dynamic_run&lt;n&gt;, with the numbers increasing for each run
that is started. When the dynamic GUI is closed, the contents of
whatever it wrote on standard error will be displayed in a
message box by the static GUI, as well as in a file in this
directory.</div>
<div class="Text_Header"><A NAME="link_test_path"></A><A NAME="copy_test_path"></A><A NAME="partial_copy_test_path"></A><A NAME="-ignorecat"></A><A NAME="test_data_searchpath"></A>
Populating the temporary directory with test data files (for
reading or editing)</div>
<div class="Text_Normal">Sometimes the system under test needs to read some file
relative to the current working directory. TextTest allows you
to place such files in the <A class="Text_Link" href="dirstructure.html">permanent
test directory structure</A>. You should then specify the
&ldquo;link_test_path&rdquo; config file entry as the (local)
file name of the file you want to provide. You can then refer to
a local file of the appropriate name in your <I>options</I> file
in that test case, for example.</div>

<div class="Text_Normal">TextTest will look for the file name you specify, first in
the permanent directory of the test case, then in the parent
test suite and so on up to the root. If it finds such a file (or
directory), it will create a symbolic link to it from the
temporary directory (UNIX) or copy it (Windows). If it doesn't,
it will silently continue, as it is regaded as a normal
situation to need test data files for some tests but not others.</div>
<div class="Text_Normal">The files can be given any name at all (unless the system
under test requires a particular name), but beware! For those
who have got used to TextTest's naming scheme by now, it can be
tempting to add .&lt;app&gt; endings. However, the naming scheme
used by files interpreted or compared by TextTest doesn't apply
to data files, and such naming isn't generally a good idea as it
will convince TextTest that these are files that should be
compared.</div>
<div class="Text_Normal">This search path can also be extended as desired, use the
&ldquo;test_data_searchpath&rdquo; config file entry. This is a
dictionary whose keys are the names given in (for example)
&ldquo;link_test_path&rdquo; and whose values are directories to
look further for test data. The &ldquo;default&rdquo; key can be
specified to make the same search path apply to all test data.</div>

<div class="Text_Normal">Sometimes the system under test will itself edit existing
files. In this case, you will want to copy to the temporary
directory the file or directory structure which it plans to
edit, so that test runs are repeatable and do not have global
side effects. You can do this using the &ldquo;copy_test_path&rdquo;
config file entry, which will find files or directories to copy
in the same way as link_test_path, and indeed is equivalent to
link_test_path on Windows.</div>
<div class="Text_Normal">On UNIX, there is a third option. Sometimes an application
may need to read from a very large directory structure, and
potentially edit some files in it. Copying the whole structure
for each test run is possible but time consuming. It's better to
be able to copy just the parts that will be changed and link the
rest. This is done with the &ldquo;partial_copy_test_path&rdquo;
config file entry, in conjunction with the <A class="Text_Link" href=<?php print "\"index.php?page=".$version."&n=file_collation_and_text_filtering"; ?>#create_catalogues">catalogue
creation feature</A> (&ldquo;create_catalogues&rdquo; in the
config file). The first time the test is run, all the files are
copied, and the catalogue records which files are created,
edited and deleted. The next time, the structure will be copied
and linked as determined by what is in the catalogue file. 
</div>

<div class="Text_Normal">If any use is made of symbolic links to the master data, it
is generally recommended to make the entire &ldquo;master copy&rdquo;
of the data readonly, in case bugs in the application would
cause it to corrupt the test data. It is possible to tell
TextTest to ignore the catalogue file and copy everything again
if the file-changing properties of the test change : check the
&ldquo;Ignore catalogue when isolating data&rdquo; box
(-ignorecat on the command line)</div>
<div class="Text_Header"><A NAME="test_data_environment"></A>Associating environment
variables with test data</div>
<div class="Text_Normal">Applications will often reference their test data structures
via environment variables. When these structures are isolated by
TextTest as described above, it can be helpful to update the
variables accordingly. There are two ways to do this, which are
fairly similar in effect.</div>
<div class="Text_Normal">The first is to simply refer to the environment variable
using one of the test data config file settings described above
(link_test_path, copy_test_path or partial_copy_test_path). For
example, you could write</div>

<div class="Text_Normal">copy_test_path:$MY_ENV_VAR</div><div class="Text_Normal">
This would take the value of the environment variable MY_ENV_VAR
as determined by the environment files and the external
environment, identify if it refers to an existing file or
directory, and if so, copy that as test data. The environment
variable will also be updated to point at the absolute path of
the copied location.</div>
<div class="Text_Normal">Alternatively, you can associate environment variables with
test data found via the normal mechanism. This is done via the
&ldquo;test_data_environment&rdquo; config file setting, which
is a dictionary. For example</div>
<div class="Text_Normal">copy_test_path:data

[test_data_environment]
data:MY_ENV_VAR</div><div class="Text_Normal">
For each name identified by link_test_path, copy_test_path or
partial_copy_test_path, you can provide an entry which will be
the name of an environment variable to set to the isolated
version of the data. 
</div>

<div class="Text_Normal"><U>Note!</U><SPAN STYLE="text-decoration: none"> In both of
these cases the environment variables will be set even if no
data is found. The assumption is that the system under test
might in that case want to create such data in an equivalent
position.</SPAN></div>
<div class="Text_Header"><A NAME="test_data_ignore"></A>Ignoring parts of test data
directory structures</div>
<div class="Text_Normal">If you specify a directory as test data, via any of the three
ways described above, it will be treated as test data
recursively in its entirety. Sometimes, however, some parts of
it are not really part of the data and should not be displayed
as such, either in the GUIs or in the catalogue files. If it is
version controlled via CVS it is for example likely to contain
CVS directories which we will want to ignore.</div>
<div class="Text_Normal">To achieve this, use the setting &ldquo;test_data_ignore&rdquo;.
The keys are names identified by &ldquo;link_test_path&rdquo;,
&ldquo;copy_test_path&rdquo; or &ldquo;partial_copy_test_path&rdquo;.
The values should be names (or regular expressions) of files or
directories under the relevant structure which should be
ignored. If a directory is ignored, so are its contents.</div>

<div class="Text_Normal">This has several effects. These files/directories will not be
shown in the static GUI (which will behave as if they didn't
exist) and changes in them will not appear in the catalogue
file, if there is one. If you are using
&ldquo;partial_copy_:test_path&rdquo;, that means they will also
not be copied, ever: changes there are regarded as
uninteresting. It is thus a very bad idea to use this setting in
conjunction with partially copied structures, if there is any
chance of a write-conflict between several tests, or if files
will be created (and not deleted) by test runs in that place. In
the last case the directory would grow without limit.</div>
<div class="Text_Header"><A NAME="-keeptmp"></A>What happens to these directories
when TextTest terminates?</div>
<div class="Text_Normal">When you quit the GUI (or the console interface terminates),
the temporary directory associated with the run is by default
automatically removed. It is thus important to save any test
results that you wish to use again, either as the default result
or as a version.</div>
<div class="Text_Normal">It is also possible to run TextTest in &ldquo;keeptmp&rdquo;
mode. This means that the temporary directory structure of the
run is not removed when texttest exits. <U>However, beware!</U>

In this mode it will clean up the run directories of previous
runs that it finds which had the same application and version.
This means that you cannot run more than one instance of
TextTest simultaneously on the same application with the same
version in &ldquo;keeptmp&rdquo; mode, or they will delete each
other's files.</div>
<div class="Text_Normal">Running in <A class="Text_Link" href=<?php print "\"index.php?page=".$version."&n=running_texttest_unattended"; ?>">batch mode</A> automatically
selects &ldquo;keeptmp&rdquo; mode for the temporary
directories. It may also be requested explicitly using the
&ldquo;-keeptmp&rdquo; option on the command line, or checking
the &ldquo;keep temporary write directories&rdquo; box in the
&ldquo;side effects&rdquo; tab from the static GUI.</div>
