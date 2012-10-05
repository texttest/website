<div class="Text_Main_Header">TextTest Course Material</div>
<div class="Text_Description">A series of hands-on exercises to get a firmer grasp of the TextTest tool</div>				
<div class="Text_Header">Overview</div>
<div class="Text_Normal">
This document assumes you have already installed TextTest as described in the Installation Guide. To do these exercises, start by downloading the "systems under test" and test data from <A class="Text_Link" HREF="files/texttest_course.zip">here</A>. Unzip it and then set the environment variable TEXTTEST_HOME to point at its "tests" directory.</div>
<div class="Text_Normal">
For each exercise there is a subdirectory of "tests" containing the program you are to test and any test-data : you should use TextTest to create tests under that directory in each case. Exercise 3 is the exception: it has no directory because the point is to modify the tests you have made in the other exercises.
</div>
<div class="Text_Normal">
There are a total of 5 exercises. It is suggested to start with exercise 1 and then Exercise 2 which covers most of the things a normal testsuite is likely to run into. The others are mostly useful for when you wish to use the features that they are aimed at exploring.</div>
<div class="Text_Normal">
You can also download <A class="Text_Link" HREF="files/texttest_course_solutions.zip">my own solutions</A> to these exercises in case you get stuck or just prefer to browse a solution rather than try to create one yourself...
</div>
<div class="Text_Normal">
Before you start it might be worth setting up TextTest's text editor to use something you're familiar with. By default it will use "emacs" on POSIX-based systems and "notepad" on Windows. To e.g. use "gedit" instead, create a file at ~/.texttest/config containing the line
<?php codeSampleBegin() ?>
view_program:gedit
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header">Brief descriptions</div>

<UL>
	<li><div class="Text_Normal"><A class="Text_Link" href="<?php print "index.php?page=".$version."&n=getting_started"; ?>">Exercise 1: Hello World</A> <i>(Difficulty: Easy)</i></div>
          <div class="Text_Normal">
            This will get you familiar with how to write and run a simple test in TextTest and what the GUI looks like. 
            It purely involves clicking around in the GUI, and is the standard "Getting Started" tutorial above.
            Remember to choose the ex1_hello directory as subdirectory in the initial creation screen.
          </div></li>
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise2">Exercise 2: Search/Replace Script</A> <i>(Difficulty: Medium)</i></div>
          <div class="Text_Normal">
            This is a fairly basic Python script that provides a simple command-line interface to searching and replacing text 
            across multiple files. It will teach you
            <UL>
              <li>command-line options and standard input</li>
              <li>how to handle test data</li>
              <li>how to filter run-dependent output from the program</li>
              <li>how to monitor changes in different files</li>
              <li>hierarchical organisation of information in TextTest</li>
            </UL>
          </div></li>
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise3">Exercise 3: Setting up a nightjob</A> <i>(Difficulty: Easy)</i></div>
          <div class="Text_Normal">
            This does not involve writing any tests, but involves configuring a nightjob to produce you an email/HTML report of
            whatever tests you've already got. This will teach you
            <UL>
              <li>configuring unattended runs of your tests</li>
              <li>sharing configuration between applications</li>
            </UL>
          </div></li>
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise4">Exercise 4: The PyGTK GUI</A> <i>(Difficulty: Easy)</i></div>
          <div class="Text_Normal">
            There is a simple PyGTK GUI you can test here. This is probably not very hard but is an opportunity for those who
            are interested to explore how TextTest "ideally" would interact with a GUI. 
            This will teach you
            <UL>
              <li>how to use TextTest's record facilities</li>
              <li>creating a "domain-specific language" for GUI testing</li>
            </UL>
          </div></li>
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise5">Exercise 5: The Continuous Integration script</A> <i>(Difficulty: Hard - at least the later steps are)</i></div>
          <div class="Text_Normal">
            This is based on a real program that updates some code from source control, tries to compile it remotely and sends an 
            email if it fails. The earlier part recaps a fair amount of what was done in Exercise 2 in a different context 
            with some subtle differences.  The main point of the later part is to learn how to simulate factors that are hard 
            to test for real (i.e. version control, remote access and email sending). The last two steps require writing some 
            simple Python code. You will learn
            <UL>
              <li>using file-expansion wildcards</li>
              <li>ignoring certain changes in a data structure</li>
              <li>more advanced filtering</li>
              <li>using TextTest to "record" what some external program does and later replay those responses</li>
              <li>using a similar mechanism with a Python standard library module instead of a command-line program</li>
              <li>writing your own fake version of an external program</li>
            </UL>
          </div></li>
</UL>

<div class="Text_Main_Header"><A NAME="Exercise2"></A>Exercise 2: The Search/Replace Script</div>
<div class="Text_Header">2.1 Try out the script</div>
<div class="Text_Normal">
Change directory to "tests/ex2_searchreplace". Here you will find the script "searchreplace.py" and a 
file "file.txt" which is meant as test data. Start by trying it out a bit so you understand what it does 
and what you're trying to test. For example, try something like the following:
<?php codeSampleBegin() ?>
gewoia : cat file.txt
bar
gewoia : ./searchreplace.py bar foo file.txt
searchreplace.py running at 22Oct11:47:03
Replacing 'bar' with 'foo'
Replacing in /nfs/vm/texttest/geoff/course/tests/searchreplace/file.txt
1c1
< bar
---
> foo
OK to commit?
y
gewoia : cat file.txt
foo
<?php codeSampleEnd() ?></div>
<div class="Text_Header">2.2 Start Texttest and tell it about the application</div>
<div class="Text_Normal">
It's probably easiest to close the TextTest static GUI from "Hello World" and 
restart it with
<?php codeSampleBegin() ?>
texttest.py --new
<?php codeSampleEnd() ?>
which will ask you for the details of your new program. (Starting without arguments
again will reload your hello world test). You can also do "Add Application" with the
Hello World tests still loaded if you prefer. 
</div>
<div class="Text_Normal">
Select the script, choose the "ex2_searchreplace" directory as subdirectory, choose a suitable extension as you
did for Hello World (don't choose "txt" as that will cause confusion with "file.txt").
</div>
<div class="Text_Header">2.3 Create an "empty" test</div>
<div class="Text_Normal">
The easiest test to specify is one that contains no arguments. Create a test as for Hello 
World. You should get some kind of "Usage" error from the script. Save this behaviour as correct.
</div>
<div class="Text_Header">2.4 Create a test with the right number of arguments</div>
<div class="Text_Normal">
This time enter e.g. "foo bar file.txt" (if you changed the file as in my example above)
in the "Command Line Options" field in the "Add Test" dialog box. (Or copy the test,
right click "Definition" files and add an "options" file with the same contents). Either
way, you get a test containing an "options" file. If you run it you will get different
text, probably the first two lines of the "trial" output from above. It won't actually
do any replacement yet (bear with it until the next step). Save the behaviour.
</div>
<div class="Text_Normal">
Run the test again. Note that it fails, because it records the current time which has now
moved on. We need to tell TextTest to ignore this difference.
</div>
<div class="Text_Normal">
To rectify this you'll need to edit your "config file", which you do by selecting the "config" tab 
(top right in the "static GUI"). In this tab you will find a file "config.&lt;extension&gt;" under "Files For &lt;your application name&gt;".
If you have defined a personal configuration file it will also be present: don't edit that 
as it is specific to your user. Double-click the application file described, which will open it in the editor described in the introduction. A lot of what's hard about TextTest is editing this
file correctly and most of the exercises involve doing so.
</div>
<div class="Text_Normal">
Read <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=run_dependent_text"; ?>">the documentation on filtering the output</A>, there are lots of more or less sophisticated 
ways to do this, from ignoring the entire line to replacing any date of that format via a regular 
expression. Choose one and proceed to the next step when you can run the test and it goes green. You can test any changes
you do without needing to rerun the test every time, by pressing "F5" (Recompute Status) in the dynamic GUI, which will 
rerun the filtering on an existing test run. The filtered versions of the files can be viewed by right-clicking
on the files also.
</div>
<div class="Text_Header">2.5 Create a test which finds a file but does not change it</div>
<div class="Text_Normal">
You may wonder why the last test didn't try to update "file.txt". The reason
is that TextTest doesn't yet know that this file is supposed to be test data.
The test is running in TextTest's temporary "sandbox" environment where there is no
such file.
</div>
<div class="Text_Normal">
We should rectify this by ensuring the sandbox environment gets populated with the file. TextTest identifies test data via local file names (in this case "file.txt") and searches the test and then each parent suite in turn for such a file. So you can tell it to pick up this file just by adding
<?php codeSampleBegin() ?>
copy_test_path:file.txt
<?php codeSampleEnd() ?>
to your config file as above. To understand better what is happening here you can look up "copy_test_path" in the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=configfile_default"; ?>">TextTest configuration reference</A>
for help (or the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>">page on "Test Data"</A> for a wider overview). 
</div>
<div class="Text_Normal">
As there is already such a file in the "root suite" (the top level of the hierarchy)
that file will now be copied for all tests. So the test you made in step 4 will now
behave differently. If you want to make a new test and preserve the old test as it was,
make a copy of the old test using TextTest, and then go to the shell and move "file.txt" to
the appropriate directory. (This is a good opportunity to explore a bit the file structure
TextTest is creating for you: everything is plain text files and can usually be edited fairly
easily outside of the tool also)
</div>
<div class="Text_Normal">
If you run this test again it will fail: the reason is that it writes out the absolute path to
the file it has edited, so you can see where the "TextTest sandbox" is in this case. TextTest has a built-in
filter for this path as many applications need to filter it. Look for "INTERNAL" in the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=run_dependent_text"; ?>">documentation</A> and
try to replace the path with something so we're still verifying that the correct file is being edited. View
your filtered file as before and make sure it looks OK.
</div>
<div class="Text_Header">2.6 Create a test which actually edits the file</div>
<div class="Text_Normal">
The edit is rejected in the test above because the test asks for a response on standard input which is not
provided. So take a new copy, select it and right click on "Definition Files", picking "Create/Import File". 
Select "stdin" for standard input, create a new file and type "y" in it. This will provide this response to 
standard input. If you run the test
now the text saying "Not editing the file" will go away.
</div>
<div class="Text_Normal">
The test is hopefully now editing the file as we request, but we need to prove that. Start by setting
"create_catalogues:true" in the config file, which will give us a check
on all the files it's producing. This will affect all 4 tests so you should run them all.
</div>
<div class="Text_Normal">
You should get 4 rows all saying "catalogue new". On the right you have a status summary which is worth getting
to know. There should be a row saying "Group 1: 3". This is TextTest's way of saying these 3 tests have changed 
in the same way. Click on this row and it will select the tests in the test view. If you view the "Test" tab
you can see that the first three tests are now saying that no files were changed, as we expect. You can now save 
them without needing to examine each one individually.
</div>
<div class="Text_Normal">
Hopefully our new test will tell us that file.txt is being edited. Save it.
</div>
<div class="Text_Normal">
That's good, but we still can't see the new text in the file itself. To do this, refer to
the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=extra_files"; ?>">docs section on "tests that write files"</A> for how to do this using "collate_file".
</div>
<div class="Text_Header">2.7 Reduce duplication</div>
<div class="Text_Normal">
You've hopefully got 3 or 4 tests that work now. You may well have several identical files for different
tests. Of course, this isn't a problem for this size of testsuite but can become a major pain when you've got
a few hundred tests.
</div>
<div class="Text_Normal">
The way to reduce this duplication is to rearrange the hierarchy. If several tests require the
same contents in a particular file, create a Test Suite and move those tests to it. You can then have a single
copy of the file in the test suite instead of several identical ones in each test.
</div>
<div class="Text_Normal">
Your last two tests could move to a suite containing "file.txt", for example. You could also define the "options"
file at the root suite level and clear them in the single test that doesn't want any command line options (search for "Options Files"
in the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>">Test Suite Guide</A> for assistance).
</div>
<div class="Text_Main_Header"><A NAME="Exercise3"></A>Exercise 3: Setting up a nightjob</div>
<div class="Text_Header">3.1 Run your pre-existing tests in batch mode</div>
<div class="Text_Normal">
Start by running, e.g.
<?php codeSampleBegin() ?>
texttest.py -b nightjob
<?php codeSampleEnd() ?>
which will run all the tests from your previous exercises from the command line and send a mail
to your user. If this doesn't work for some reason (like mail not being set up on your local machine), 
you can set "batch_use_collection:true" in both the config files, run it again, and look under 
~/.texttest/tmp/nightjob*. There will be a file starting with "batchreport" which contains what
the email would have sent had it worked... (The point of this setting is ordinarily to collect
several such reports together before mailing a joint one somewhere) 
</div>
<div class="Text_Header">3.2 Get yourself a web page</div>
<div class="Text_Normal">
The text report is basic : it only shows one run at once and isn't very navigable. Read
 the information about <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=running_texttest_unattended"; ?>#batch_result_repository">generating HTML reports</A> and try to produce one that
looks something like the example linked there. You might also want to try to make sure both your applications
write their results on the same page given that they're both quite small. </div>
<div class="Text_Normal">
Note you will need to add configuration
entries to both your "config" files, though you probably won't need the TextTest GUI. Note also that by default
runs are identified by date, so once you have a page with a single column, further runs won't appear there
unless you explcitly name the run (-name on the command line)
</div>
<div class="Text_Header">3.3 Extract out the shared configuration</div>
<div class="Text_Normal">
It's not so nice that we've had to copy the same information to two different files. Try to extract it out to a
separate file and "import" it into your config files. Look at "import_config_file" in the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=configfile_default"; ?>">TextTest configuration reference</A> for information on how to do this.
</div>
<div class="Text_Main_Header"><A NAME="Exercise4"></A>Exercise 4: The PyGTK GUI</div>
<div class="Text_Header">4.0 Download and install StoryText version 3 or newer if you don't have it yet</div>
<div class="Text_Normal">
Instructions for how to do this can be found <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_download">here</A>.
</div>
<div class="Text_Header">4.1 Try out an amazing new bug system</div>
<div class="Text_Normal">
There is a small toy "bug system" in the exercise directory. It is downloaded from the PyGTK tutorial and
is not "primed" for StoryText or anything. Fire it up and click around it a bit, you can hide and show
the bugs in various categories and also sort the columns by clicking them, but you can't do much else...</div>
<div class="Text_Header">4.2 Create a test with the help of StoryText</div>
<div class="Text_Normal">
From this point you can pretty much follow the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=gui_tests"; ?>">GUI-testing tutorial</A>, which is designed to work with this example. Try to create some different tests and examine the "usecase" files and the "output" files in each one, and also the UI map file as it develops. 
</div>
<div class="Text_Main_Header"><A NAME="Exercise5"></A>Exercise 5: The Continuous Integration Script</div>
<div class="Text_Header">5.0 Install Mercurial and GCC if necessary</div>
<div class="Text_Normal">
This exercise assumes you have the <A class="Text_Link" HREF="http://mercurial.selenic.com">Mercurial version-control system</A> and the <A class="Text_Link" HREF="http://gcc.gnu.org">GCC C compiler</A> installed. If you don't you need to get them.
</div>
<div class="Text_Header">5.1 Introduction</div>
<div class="Text_Normal">
In the directory for exercise 5, under scripts/automatic_build.py you will find a small "continuous integration"
script. The basic idea is to update some code (in fact a C hello world program) from Mercurial source control, if 
there are changes trigger a build on several machines in parallel, and send an email if any of them fail.
The aim of the exercise is to create repeatable TextTest tests for this apparently hard-to-test script without 
even making any changes to it...</div>
<div class="Text_Header">5.2 Try out the script</div>
<div class="Text_Normal">
Go to the ex5_ci_script directory and run "scripts/automatic_build.py". 
(It expects to be run from this directory) There are no updates from source control, 
so it does not do anything. Note however that it created a timestamped directory under "logs"
containing a file showing what the source control did.
</div>
<div class="Text_Header">5.3 Write a test for this behaviour</div>
<div class="Text_Normal">
Run texttest.py --new, select the script above, and create a test for no changes, as done before. 
The script tries to update "source" from "repo" so you'll need to add both of these as test data
as you did in exercise 2. "repo" can be linked with "link_test_path" as we don't expect the script
to make changes there.</div>
<div class="Text_Normal">
It will however fail if you run it again, because it tells you about its
log directory which is timestamped. Filter it in the same way as you did with exercise 2.
</div>
<div class="Text_Header">5.4 Make the test check the contents of the logs</div>
<div class="Text_Normal">
The test is now repeatable, but it tells us it's writing some logs,
which we can't see. Let's make sure they're sensible. Set
"create_catalogues:true" in the config file as before, which will give us a check
on all the files it's producing. It shows us we're creating a file
"src_update" in our timestamped log directory, and that some Mercurial control
file is being edited. Generalise the filter for the timestamp so it filters
the catalogue file also (you can duplicate it but it's neater to use a file-expansion
wildcard in the key name). We don't care about the Mercurial control file, so tell
TextTest to ignore changes there by setting "test_data_ignore:.hg".</div>
<div class="Text_Normal">
We should now check what's in src_update. Use "collate_file" as before to make this file
part of the baseline for the test. You'll need to use a file expansion this time: note
that directories beginning with "." do not match the simple expansion "*", so you'll need
to provide part of the name also.
</div>
<div class="Text_Header">5.5 Make the test independent of the current state of the Mercurial repository</div>
<div class="Text_Normal">
There is one problem still: the test still relies on the Mercurial
checkout ("source") being up to date. You should capture this state somehow so that 
the test doesn't fail if further checkins are made using Mercurial. Read the
<A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=faking_it_with_texttest"; ?>">documentation on "mocking"</A> for guidance: the "intercepting and
replaying..." mechanism is probably most appropriate here. Record the interaction 
with the "hg" program and check it looks sensible. You'll need to filter the
sandbox directory too, but we did that in exercise 2 also.</div>
<div class="Text_Normal">
We now have a perfect test for no changes in source control!
</div>
<div class="Text_Header">5.6 Create a test that actually triggers a build</div>
<div class="Text_Normal">
Investigate what the script does in these circumstances outside of TextTest first, 
so you understand what you're testing. Go to the shell in the exercise directory.
As we've seen, the script uses Mercurial ("hg") to update the directory "source" from the directory
"repo". So trigger a change and see what happens. Make an edit in
repo/main.c, check it in via "hg commit -m 'change' repo", and then rerun
scripts/automatic_build.py. The local build should succeed, the remote
one should fail (can't reach "my_other_machine" / SSH isn't installed) and an email should be delivered 
(though as we saw in exercise 3 this may not work, depending on your machine setup).</div>
<div class="Text_Normal">
We can now add a test for this. Trigger another change as we did above, but create
a test instead. Note that the "source" directory will be copied before each test
run and the updates performed on the copy, so the test can be run repeatedly
without needing to do more checkins.
</div>
<div class="Text_Normal">
If you've handled Mercurial correctly in step 5.5 you should be able to
capture the current Mercurial behaviour and protect your tests from future
changes in the repository also. Note that TextTest also captures the file
edit made by Mercurial and replays it, even when you run the test without
running Mercurial for real.
</div>
<div class="Text_Normal">
When the test for the build triggering and succeeding is working, you can
then deliberately introduce a compilation failure and repeat, to create a
test for the build failing.</div>
<div class="Text_Normal">
You should now have 3 repeatable tests, congratulations!
</div>
<div class="Text_Header">5.7 Disable and test the email sending</div>
<div class="Text_Normal">
Each time you run the tests where builds fail it tries to send an email. We probably 
don't want to be sending these emails for real, but we do want to check that 
they're sent correctly. All the more so if our "real" mail sending is broken and 
we can't see it being sent at all...
</div>
<div class="Text_Normal">
Our test program is written in Python so we can use a feature specific to Python programs
that can intercept the email-sending module "smtplib" in a similar way to how we handled
the command-line "hg" program above. See <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=faking_it_with_texttest"; ?>#collect_traffic_py_module">here</A> for documentation of this setting. 
</div>
<div class="Text_Normal">
We can then "record" the email sending and check the email arrives and looks right, and then when running the test check our interaction with the "smtplib" module remains the same as when we recorded it.
</div>
<div class="Text_Header">5.8 Simulate the remote build</div>
<div class="Text_Normal">
The remote build is always failing: it's trying to reach a machine that 
doesn't exist with ssh.
</div>
<div class="Text_Normal">
Create a fake "ssh" program as "executable test data" for the "build
succeeds" test, as described on the "mocking" documentation page, so that
we have control of this. Just write a script in any language you want,
and make sure that it has execute permissions.</div>
<div class="Text_Normal">
Your "fake ssh" should probably say what machine it's supposed to be
running on, and perform the build locally, remembering to pass on the
exit code which the build script makes use of. If you haven't done so
already, collate the remote build log also so you can see the text you write out.
</div>
   <!-- main table end -->
  </body>
</html>

