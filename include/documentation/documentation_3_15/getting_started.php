<div class="Text_Header">Getting started with Texttest</div>
<div class="Text_Normal">This is a basic guide to what the GUI looks like, and how to
write your first test. It assumes you have read and followed the
instructions in the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=install_texttest"; ?>">installation guide</A>.
</div>
<div class="Text_Normal">We will use a 'hello world' program as an example. Note that this tutorial is also Exercise 1 in the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=course_material"; ?>">course material</A> below, if you actually plan to do this for real you might find it easier within that context. Text in italics is background information only.</div>
<div class="Text_Header">Creating an Application</div>

<div class="Text_Normal">For each executable program to be tested, a 'TextTest
application' needs to be created to tell it what to run. To do this for the first time,
just run texttest.py, providing the --new option if there are already tests existing
in the place you've designated as TEXTTEST_HOME (for example if it's pointing to the tests
directory in the download)
</div>
<div class="Text_Normal">
A dialog will then come up where you can tell it about your application. You need to pick
a full name for use in reports, and also a short file extension which will be
used by TextTest for all files relevant to that application. It can be useful to select
a subdirectory (if you write a non-existent name it will be created) to aid with organising
tests for different applications in the future. Finally, of course, browse your file system and identify
the executable program that will be tested (your hello world program).</div>
<div class="Text_Normal"><I>All information about an application and how to test it
will be placed in the 'config file' which TextTest has just created for us behind the scenes. For the
most part we will need to do further configuration by editing it in a text editor, which can be done
from the "Config" tab on the right hand side. In future, you can pick out this application by running
texttest.py -a &lt;extension&gt;, where &lt;extension&gt is the one you choose above.
</I></div>
<div class="Text_Normal">You now have an application with no tests. You should see something like
this. (I chose the extension "hello" here and the rather cryptic HELLO as full name)</div>
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
which defines which tests are contained in the suite. We can then
bring up the popup menu by right clicking the same line, and select "Add Test",
which brings up a dialog for adding a new test. We enter a test name and a
brief description of what the test is for, and click the 'OK' button at the bottom. 
This creates a test and automatically views it:</div>

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
summary of which files are different in the test.
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
directory defaults to the value of $HOME/.texttest/tmp (on Windows $HOME is formed
from a combination of $HOMEDRIVE and $HOMEPATH). It can be altered via the environment
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
<div class="Text_Normal">
One option is of course to work through the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=course_material"; ?>">course material</A> which gives you a series of increasingly complicated programs to try and test. Failing that, a potted summary of the most basic TextTest features follows.
</div>
<div class="Text_Normal">One of the most immediate challenges is often that real
programs write output that changes from run to run, such as
temporary file names, process IDs, times etc. TextTest allows
you to define what such statements looks like in your program so
that it can filter them out, avoiding false failures when only
such information changes. To see how to do this, look at the
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=run_dependent_text"; ?>">section on
run-dependent text</A>.</div>
<div class="Text_Normal">Another challenge is that you may well need to provide
test data to your application, which may also be changed by the tests.
As we saw above, TextTest creates a specific temporary directory for each test run, 
and its model is that all needed data files are provided there and the application is
configured so that it only writes files there. This directory is known as the 
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>">TextTest sandbox</A>. 
One very common usage of this mechanism is to configure your application's logging for the tests,
by providing log4x-style configuration files as test data : this is documented as an example on the
same page.
</div>

<div class="Text_Normal">
It's also the case that real programs often read and write files other than standard error and output.
You may want also want TextTest to keep track of this, and maybe also to compare them in the same way 
as you do for standard output and error.
See the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=extra_files"; ?>">section on
collating files</A> for details.</div>
<div class="Text_Normal">At this point you should be able to get going with building a
test suite for your application. There is of course more to
TextTest than this, other features are linked from the table provided above.</div>
	
