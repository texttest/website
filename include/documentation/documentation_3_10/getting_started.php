<div class="Text_Header">Getting started with Texttest</div>
<div class="Text_Normal">This is a basic guide to what the GUI looks like, and how to
write your first test. It assumes you have read and followed the
instructions in the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=install_texttest"; ?>">installation guide</A>.
</div>
<div class="Text_Normal">We will use a 'hello world' program as an example. Text in
italics is background information only.</div>
<div class="Text_Header">Creating an Application</div>

<div class="Text_Normal">For each executable program to be tested, a 'TextTest
application' needs to be created. To do this for the first time,
do as follows:</div>
<OL>
	<div class="Text_Normal"><li>Create a suitably named
	subdirectory under the TEXTTEST_HOME root directory as decided
	in the last stage of installation (or reuse an existing one for
	similar applications). 
	</div>
	<div class="Text_Normal"><li>Choose a file extension to be
	used for all files relevant to that application. 
	</div>
	<div class="Text_Normal"><li>In the new directory, create a file called
	'config.&lt;app&gt;', where &lt;app&gt; is the extension you
	just chose. In this file, write the single line
	'binary:&lt;full_path&gt;', where &lt;full_path&gt; is the
	absolute path to the program you wish to test.</div>

</OL>
<div class="Text_Normal"><I>All information about an application and how to test it
will be placed in the 'config file' which we just created. The
entry 'binary' is the only one which is compulsory, everything
else has default values.</I></div>
<div class="Text_Normal">You now have an application with no tests and are ready to
run the TextTest GUI. You should now do this, with the command
'texttest.py -a &lt;app&gt;' (if this is your first application
you don't need the -a option). You should see something like
this. (texttest.py -a hello, after doing the above with a hello
world program)</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/notests.JPG" NAME="Graphic1" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR><BR>
</div>
<div class="Text_Normal">This is the static, or test management GUI. On the left you
see a tree view of all tests and test suites that there are. The
single line shown is the 'root test suite for the application',
created by default, currently containing no tests.</div>

<div class="Text_Normal">On the right, we have a couple of tabs. The one shown has
various options for selecting tests: not very useful when we
don't have any. The other &ldquo;Config&rdquo; will allow us to
view and edit the config file we just created.</div>
<div class="Text_Header">Creating a Test</div>
<div class="Text_Normal">To create a test, we first select the root test suite where
we wish to add it, by single-clicking that line on the left.
This brings up a &ldquo;Test&rdquo; tab on the right, which in
turn shows us the files contained in the viewed test/suite
(currently suite). There is just one, &ldquo;testsuite.hello&rdquo;,
which defines which tests are contained in the suite. At the
bottom are more tabs which are specific to the test we are
viewing. We go to the 'Adding Test' tab, enter a test name and a
brief description of what the test is for, and click the 'Add
Test' button at the bottom. This creates a test and
automatically views it:</div>

<div class="Text_Normal"><img src="<?php print $basePath; ?>images/emptytest.JPG" NAME="Graphic3" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR><BR>
</div>
<div class="Text_Normal">We now have an 'empty test' under the root test suite (called
'Basic' above). As can be seen, there are no 'standard files'
yet, because we have not yet said what the test should produce.
We could create these files by hand, but the easiest way is to
run the test and see what happens. 
</div>
<div class="Text_Normal"><I>Behind the scenes, TextTest has entered the new test in
the file &ldquo;testsuite.hello&rdquo; that we saw above, with
the description as a &ldquo;comment&rdquo; above it. It has also
created a directory 'Basic' (with the same name as the test). If
we had specified any command line options it would also have
created an &ldquo;options.hello&rdquo; file for these. It is
thus building up a directory structure for us. It is useful to
understand this and it can easily be edited independently of
TextTest. It can also be useful to version control this test
directory structure. See the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>">Guide
to the Files and Directories in a TextTest test suite</A> for
more details.</I></div>

<div class="Text_Header">Running a Test</div>
<div class="Text_Normal"> We click the &ldquo;Run&rdquo;
button on the toolbar to run the selected tests. This starts the
dynamic GUI in a new window, which performs test runs. The test
fails, because no standard results are yet defined. On the left
we see a tree view similar to the one above, on the right a
summary of which files are different in all tests that have run:
useful when we have more! We click on the red test line to see
the files it has produced. 
</div>
<div class="Text_Normal"><IMG src="<?php print $basePath; ?>images/newfiles.JPG"><BR CLEAR=LEFT><BR><BR>
</div>
<div class="Text_Normal">It collected the standard error and standard output of the
process into 'errors.hello' and 'output.hello' files. These can
be viewed by double-clicking in the file view, or a summary is
available in the 'Text Info' window. We can see that the text
'Hello world' appeared on standard output, while nothing was
written to standard error. We like this behaviour, so we click
'Save' on the toolbar.</div>

<div class="Text_Normal"><I>The temporary files have been written to a directory
underneath the 'texttest temporary directory'. This root
directory defaults to $HOME/texttesttmp on UNIX and to the value
of TEMP on Windows. It can be altered via the environment
variable TEXTTEST_TMP. When the test is saved, these files are
copied to the test directory created above. For more details,
see the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>">Guide to TextTest's Temporary
Directory</A>.</I></div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/saved.jpg" NAME="Graphic5" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR><BR>
</div>
<div class="Text_Normal">Now the test goes green and the produced files are saved as
the standard versions. By default, TextTest assumes that
succeeded and saved tests are not interesting and hence
collapses the suite containing it and removes the Test tab
again, returning to the selection view we had before. We can now
exit the dynamic GUI, pressing 'Quit'. When we look in the
static GUI, which has been there all along, we now see this.</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/newtest.JPG" NAME="Graphic6" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR><BR>
</div>
<div class="Text_Normal">The files produced by the dynamic GUI run have been saved as
'Standard Files' and will now be used as comparison in the next
test run (which we would expect to go green immediately).</div>

<div class="Text_Header">What next?</div>
<div class="Text_Normal">So there it is: your first working, repeatable test for
&ldquo;hello world&rdquo;. Now for testing a real program: what
do I still need to know?</div>
<div class="Text_Normal">One of the most immediate challenges is often that real
programs write output that changes from run to run, such as
temporary file names, process IDs, times etc. TextTest allows
you to define what such statements looks like in your program so
that it can filter them out, avoiding false failures when only
such information changes. To see how to do this, look at the
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=file_collation_and_text_filtering"; ?>#run_dependent_text">section on
run-dependent text</A>.</div>
<div class="Text_Normal">Another challenge is that real programs often read and write
files other than standard error and output. As we saw above,
TextTest runs all tests in a temporary directory created
specifically for that test run, which is also used as current
working directory for that test. You should therefore make sure
that your program only creates files relative to this directory,
and that all needed input files are available from it. See the
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>">guide to TextTest's temporary directory
</A>for details. 
</div>

<div class="Text_Normal">You may want also want TextTest to compare other created
files in the same way as you do for standard output and error.
See the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=file_collation_and_text_filtering"; ?>#collate_file">section on
collating files</A> for details.</div>
<div class="Text_Normal">At this point you should be able to get going with building a
test suite for your application. There is of course more to
TextTest than this: look at the reference material available
from <A class="Text_Link" HREF="<?php print "index.php?page=".$version?>">Documentation Central</A>.</div>
	