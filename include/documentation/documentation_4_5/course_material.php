<div class="Text_Main_Header">TextTest Course Material</div>
<div class="Text_Description">A series of hands-on exercises to get a firmer grasp of the TextTest tool</div>				
<div class="Text_Header">Overview</div>
<div class="Text_Normal">
This document assumes you have already installed TextTest as described in the Installation Guide. To do these exercises, start by downloading the "systems under test" and test data from <A class="Text_Link" HREF="files/texttest_course.zip">here</A>. Unzip it and then set the environment variable TEXTTEST_HOME to point at its "tests" directory.</div>
<div class="Text_Normal">
  For each exercise there is a subdirectory of "tests" containing the program you are to test and any test-data. Some exercises 
  use TextTest to create tests under that directory, others start with a existing suite and make it work or improve it. 
  Exercise 3 is the exception: it has no directory because the point is to modify the tests you have made in the other exercises.
</div>
<div class="Text_Normal">
  There are a total of 8 exercises. It is suggested to start with Exercise 1 and then Exercise 2 which covers most of the things a normal testsuite is likely to run into. The others are mostly useful for when you wish to use the features that they are aimed at exploring.
</div>
<div class="Text_Normal">
Note that Exercise 2 comes in two versions that cover mostly the same functionality. The suggested version now is the "TextTest Koans"
which involves fixing up an existing test suite by filling in "blanks" in various files, and works more by experiment and trial and error
than by following detailed instructions. The original version is more like the other exercises and involves building up the test suite from scratch, with detailed instructions.
</div>
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
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise2">Exercise 2: TextTest Koans</A> <i>(Difficulty: Medium)</i></div>
          <div class="Text_Normal">
            This is a new, slightly experimental approach that builds on trying things out rather than following detailed instructions. It is inspired by the <A class="Text_Link" HREF="http://rubykoans.com/">Ruby Koans</A> and made in collaboration with the author of the
<A class="Text_Link" HREF="https://github.com/approvals/ApprovalTests.Net.Koans">Approval Tests Koans</A> (thanks to Llewellyn Falco).
It will teach you
            <UL>
              <li>command-line options, environment variables and standard input</li>
              <li>how to handle test data</li>
              <li>how to filter run-dependent output from the program</li>
              <li>how to monitor changes in different files</li>
              <li>hierarchical organisation of information in TextTest</li>
            </UL>
          </div></li>
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise2_orig">Exercise 2 (original version): Search/Replace Script</A> <i>(Difficulty: Medium)</i></div>
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
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise3">Exercise 3: Setting up unattended test runs</A> <i>(Difficulty: Easy)</i></div>
          <div class="Text_Normal">
            This does not involve writing any tests, but involves configuring a "continuous integration" setup to produce you an HTML report of
            whatever tests you've already got. This will teach you
            <UL>
              <li>configuring unattended runs of your tests</li>
              <li>sharing configuration between applications</li>
            </UL>
          </div></li>
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise4">Exercise 4: Regular Expressions Koans</A> <i>(Difficulty: Medium)</i></div>
          <div class="Text_Normal">
            This exercise is also in a Koans style (see exercise 2 above) and involves purely learning and practicing Regular Expressions,
            which are used for text manipulation in many areas of TextTest. Being effective with them will make you more effective with 
            TextTest. This will teach you:
            <UL>
              <li>All the various common tricks involved in making a regular expression</li>
              <li>Using regular expressions for replacement</li>
              <li>Using TextTest's 'Replace Text in Files' feature</li>
            </UL>
          </div></li>
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise5">Exercise 5: Known bugs</A> <i>(Difficulty: Easy)</i></div>
          <div class="Text_Normal">
            There is a simple program and a test suite which is intended to be used for trying out TextTest's known bugs mechanism.
            This will teach you
            <UL>
              <li>how to report bugs from the GUI</li>
              <li>linking failures to bug-tracking systems(Jira)</li>
              <li>linking failures to a textual description</li>
              <li>finding previously mapped known bugs</li>
              <li>using known bugs to trigger test reruns</li>
            </UL>
          </div></li>
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise6">Exercise 6: The Eclipse/SWT GUI</A> <i>(Difficulty: Medium)</i></div>
          <div class="Text_Normal">
            There is a simple Eclipse-SWT based GUI you can test here. This is intended to teach the basics of GUI testing with TextTest. 
            This will teach you
            <UL>
              <li>how to use TextTest's record facilities</li>
              <li>creating a "domain-specific language" for GUI testing</li>
              <li>refactoring this language by creating 'shortcuts'</li>
              <li>filtering the generated GUI output at the widget level</li>
            </UL>
          </div></li>
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise7">Exercise 7: Testing performance and memory</A> <i>(Difficulty: Medium)</i></div>
          <div class="Text_Normal">
            There is a small test suite here with a program which can be used for trying out the features in TextTest for
            managing system resources. This will teach you
            <UL>
              <li>how to measure CPU time consumed using the builtin integration with GNU "time"</li>
              <li>extracting reported performance and memory numbers from the output</li>
              <li>configuring how they are compared using the threshold config settings</li>
              <li>integrating this data into your batch report</li>
            </UL>
          </div></li>
        <li><div class="Text_Normal"><A class="Text_Link" HREF="#Exercise8">Exercise 8: The Continuous Integration script</A> <i>(Difficulty: Hard - at least the later steps are)</i></div>
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

<div class="Text_Main_Header"><A NAME="Exercise2"></A>Exercise 2 (new version): The TextTest Koans</div>
<div class="Text_Header">2.1 Start TextTest with the Koans tests loaded</div>
<div class="Text_Normal">
You can do this via
<?php codeSampleBegin() ?>
texttest -a lesson1,lesson2
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header">2.2 Select each test, fill in the blanks, and make it green</div>
<div class="Text_Normal">
The aim of the Koans exercise is to select each test in turn, and make them all succeed by filling in the blanks. 
Each of them contain, in one of their files, something looking like "__fill in this blank__" or just "____", 
replace these with the correct content to make the test work. Many of them contain additional hints in their 
Description, look at the bottom right pane when the test is selected.</div>
<div class="Text_Normal">
After you have got each test working, discuss briefly with your partner what you learnt about TextTest from it.
</div>
<div class="Text_Normal">
(NOTE: The first two tests do not have any blanks, they just get you used to running a test and approving a test. Pressing "Approve" to make any test after the second one green is cheating!) 
</div>
<div class="Text_Main_Header"><A NAME="Exercise2_orig"></A>Exercise 2 (original version): The Search/Replace Script</div>
<div class="Text_Header">2o.1 Try out the script</div>
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
<div class="Text_Header">2o.2 Start Texttest and tell it about the application</div>
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
<div class="Text_Header">2o.3 Create an "empty" test</div>
<div class="Text_Normal">
The easiest test to specify is one that contains no arguments. Create a test as for Hello 
World. You should get some kind of "Usage" error from the script. Approve this behaviour as correct.
</div>
<div class="Text_Header">2o.4 Create a test with the right number of arguments</div>
<div class="Text_Normal">
This time enter e.g. "foo bar file.txt" (if you changed the file as in my example above)
in the "Command Line Options" field in the "Add Test" dialog box. (Or copy the test,
right click "Definition" files and add an "options" file with the same contents). Either
way, you get a test containing an "options" file. If you run it you will get different
text, probably the first two lines of the "trial" output from above. It won't actually
do any replacement yet (bear with it until the next step). Approve the behaviour.
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
<div class="Text_Header">2o.5 Create a test which finds a file but does not change it</div>
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
<div class="Text_Header">2o.6 Create a test which actually edits the file</div>
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
you can see that the first three tests are now saying that no files were changed, as we expect. You can now approve 
them without needing to examine each one individually.
</div>
<div class="Text_Normal">
Hopefully our new test will tell us that file.txt is being edited. Approve it.
</div>
<div class="Text_Normal">
That's good, but we still can't see the new text in the file itself. To do this, refer to
the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=extra_files"; ?>">docs section on "tests that write files"</A> for how to do this using "collate_file".
</div>
<div class="Text_Header">2o.7 Reduce duplication</div>
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
<div class="Text_Main_Header"><A NAME="Exercise3"></A>Exercise 3: Setting up unattended test runs</div>
<div class="Text_Header">3.1 Run all pre-existing tests in batch mode</div>
<div class="Text_Normal">
Start by running, e.g.
<?php codeSampleBegin() ?>
texttest -a lesson1,lesson2 -b continuous -zen
<?php codeSampleEnd() ?>
which will run all the tests from the other exercises from the command line. The -zen flag gives you coloured console output so you can
more easily see when tests succeed and fail. 
</div>
<div class="Text_Header">3.2 Get yourself a web page</div>
<div class="Text_Normal">
This logfile-only report isn't very useful on its own. The main way to view unattended runs is via the HTML report now. 
Read the information about <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=running_texttest_unattended"; ?>#batch_result_repository">generating HTML reports</A> and try to produce one that
looks something like the example linked there.  
</div>
<div class="Text_Normal">
Note you will need to add configuration
entries to all your "config" files, though you probably won't need the TextTest GUI. Note also that by default
runs are identified by date, so once you have a page with a single column, further runs won't appear there
unless you explicitly name the run (-name on the command line)
</div>
<div class="Text_Normal">
When you have generated the HTML report, view it in Firefox. The comment plugin feature will be disabled as you're viewing 
it via file:// instead of http.
</div>
<div class="Text_Normal">
(Besides a colourful logfile and the HTML report, other options involve a basic plain-text report sent by email, or output results as XML
so that tools like Jenkins can display them in their own format. But we're not doing those today)
</div>
<div class="Text_Header">3.3 Extract out the shared configuration</div>
<div class="Text_Normal">
It's not so nice that we've had to copy the same information to several different files. Try to extract it out to a
separate file and "import" it into your config files. Look at "import_config_file" in the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=configfile_default"; ?>">TextTest configuration reference</A> for information on how to do this.
</div>
<div class="Text_Main_Header"><A NAME="Exercise4"></A>Exercise 4: The Regular Expression Koans</div>
<div class="Text_Header">4.1 Start TextTest with the relevant tests loaded</div>
<div class="Text_Normal">
You can do this via
<?php codeSampleBegin() ?>
texttest -a lesson3
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header">4.2 Select each test, fill in the blanks, and make it green</div>
<div class="Text_Normal">
This works in much the same way as Exercise 2. The tests under "Filtering" are running "grep -E -v" as their system under test,
which simulates filtering with regular expressions in TextTest. Replace the underscores in the "options" files with a regular
expression which will filter away the relevant lines and make the test green. Do not Approve or change anything else! Read
the descriptions of the tests for further hints, in the bottom right pane.
</div>
<div class="Text_Normal">
The tests under "Replacing" use TextTest's "run_dependent_text" filtering, encountered in Exercise 2. By replacing the blank in the
replace clause in the config files with something appropriate, you can see the result in the output, and practice with back references
that are very useful for replacement.
</div>
<div class="Text_Header">4.3 Experiment with "Replace Text in Files"</div>
<div class="Text_Normal">
Output from TextTest tests frequently changes in predictable ways. Then it can be very useful to update lots of stored behaviour
and configuration with a single regular expression replacement. 
</div>
<div class="Text_Normal">
Play around with this feature a bit (from the Actions menu) and try to change the test results. 
Note that each row is treated independently so it's possible
to replace multiple lines, and also to remove and add lines. Try this out, and experiment with the back references you just learned about also. The feature will perform the replacement in a dynamic GUI run so nothing will be changed permanently unless you do Approve there.
</div>
<div class="Text_Main_Header"><A NAME="Exercise5"></A>Exercise 5: Known bugs</div>
<div class="Text_Header">5.1 Create new Jira</div>
<div class="Text_Normal">
Log in to Jira and create a new issue using "Product Development Sandbox" as the project and filling in 
all the required fields. Assign it explicitly to yourself to avoid annoying the project owner! If you
can't remember your Jira password, ask the teacher to create a Jira for you.
At the end you should get a bug ID like SANDBOX-XXX which will be used later. 
</div>
<div class="Text_Header">5.2 Start TextTest with</div>
<div class="Text_Normal">
<?php codeSampleBegin() ?>
texttest -a kb
<?php codeSampleEnd() ?> 
</div>
<div class="Text_Header">5.3 Run the test suite "using_jira" from the static GUI</div>
<div class="Text_Normal">
There is a couple of tests failing and one going green. Look at the differences to see what could have gone wrong.
</div>
<div class="Text_Header">5.4 Linking failures to Jira - One file differs</div>
<div class="Text_Normal">
Right-click the first failed test, "Test2", from the dynamic GUI and select "Enter Failure Information". In the dialog that comes up, enter
a suitable value for the "Text or regexp to match" text field (note that by default, it will search the "stdout" file for this text). 
In "Extract info from bug system" select "Jira" and enter the bug ID created in 5.1. 
If you do this correctly, the test will change status to "Known bug" and go "half-green", i.e. green in the first column and red in the 
second. This indicates to future people running it that the failure is known and that they don't need to worry about it. 
Jira information is shown now in the "Details" column of the test tree view and in the Text Info window at the 
bottom right of the dynamic GUI.
</div>
<div class="Text_Header">5.5 Linking failures to Jira - Many files differ</div>
<div class="Text_Normal">
Select Test3 and repeat the same steps as you did in 5.4. Adjust the text and the file to search as desired to match this new behaviour.
Note that in this case the check box "trigger even if other files differ" is checked, take a look at the tooltip for an explanation.
If you uncheck it the bug will not match, because several files differ in this case.
</div>
<div class="Text_Header">5.6 Close the dynamic GUI and look at the "knownbugs.kb" files</div>
<div class="Text_Normal">
If you select Test2 and Test3 in the static GUI a new file "knownbugs.kb" has been created there.
Double-click one and see what has been created.
Information about the knownbugs file format can be found 
<A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=automatic_failure_interpretation"; ?>">here</A>.
It is often convenient to adjust the contents directly in the files.
</div>
<div class="Text_Header">5.7 Run "Test4" now and map it to the bug you already reported</div>
<div class="Text_Normal">
This test's behaviour is familiar, we have another test (Test2) with the same behaviour.
Rather than report the same info again, we find the existing mapping and apply it to this test.
Right-click on it and choose "Find Failure Information". Select the bug you reported and
leave "Apply to whole suite" as the default.
</div>
<div class="Text_Header">5.8 Click on the root suite and check the "knownbugs.kb" file is now there</div>
<div class="Text_Normal">
TextTest's hierarchical structure allows for file placement to determine which information applies to which
tests. By simply moving the file here it now applies to all the tests.
</div>
<div class="Text_Header">5.9 Fix the Jira</div>
<div class="Text_Normal">
Log in to Jira and resolve the issue. Or ask the teacher to resolve it for you.
</div>
<div class="Text_Header">5.10 Rerun the test suite</div>
<div class="Text_Normal">
Note that all the bugs that previously had known bugs are now "fully red" again. 
TextTest checks status in Jira, and if bugs are marked fixed, it complains
and demands action. Check the status tab, they are now referred to as "internal error".
</div>
<div class="Text_Header">5.11 Redo the Jira reference as comment</div>
<div class="Text_Normal">
Sometimes you get this situation when the bug has been fixed, but this fix is not available in your environment because it isn't
released yet. In this situation we need to stop TextTest failing and replace the Jira reference with a comment.
Select the root suite in the static GUI, right-click and choose Enter Failure information. Put the same text matching from Test2 in,
but make sure that "Extract info from bug system" field is "&lt;none&gt;" and
clear the "bug ID" field. Enter suitable text in the "Full description" and "Few-word summary" fields at the bottom of the dialog
instead.
</div>
<div class="Text_Normal">
Open the knownbugs.kb file in a text editor and remove the section referring to the previous reported bug. 
Rerun the tests and preview the results. Test2 and Test4 show your comment now instead of the Jira number and are back to "half-red".
</div>
<div class="Text_Header">5.12 Run "Test5" and try to report an appropriate known bug</div>
<div class="Text_Normal">
This test is known to be indeterministic, in that a key output line is sometimes missing.
So run 10 copies of it (use the "Times to Run" field in the Running tab) to see this effect.
</div>
<div class="Text_Normal">
We could match this in a few ways
<ol><li> use the "NOT present" switch at the top
<li> match using the "Full difference report", and paste text directly from the preview window
<li> as (2) but provide the entire report and use "Exactly as given". 
</ol>
Text that is missing is hazardous and needs to be treated with care: after all, it could be missing because of a crash on startup
rather than for the issue we're thinking about now.The first two options are prone to this. Note that the whole of the full difference
report includes the entire bottom right pane contents EXCEPT the first line, which is additional explaining text!
</div>
<div class="Text_Normal">
If we assume the problem is in the environment, rather than something that can be fixed in the system, it can be useful to trigger a 
rerun. So set the rerun count to 2 or 3 also.
</div>
<div class="Text_Header">5.13 Rerun "Test5" 10 times and check it succeeds</div>
<div class="Text_Normal">
If you run Test5 10 times again you should now get 10 green. Some of them will say "after 1 rerun" in their details column
if you expand them in the test tree.
If you want to actually view how the known bug looks you can comment the rerun line out from the knownbugs file and rerun. 
</div>
<div class="Text_Main_Header"><A NAME="Exercise6"></A>Exercise 6: The SWT/Eclipse GUI</div>
<div class="Text_Header">6.0 Download and install StoryText version 3.6 or newer if you don't have it yet</div>
<div class="Text_Normal">
Instructions for how to do this can be found <A class="Text_Link" HREF="index.php?page=ui_testing&n=storytext_download">here</A>.
</div>
<div class="Text_Header">6.1 Try out the SWT Address Book</div>
<div class="Text_Normal">
From the command line, type
<?php codeSampleBegin() ?>
java AddressBook
<?php codeSampleEnd() ?>
This is an Eclipse/SWT example application which allows you to create an address book with contacts in it. Play around a little
with it so you know what you're about to test.</div>
<div class="Text_Normal">
Note that the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=gui_tests"; ?>">
GUI-testing tutorial</A> has a large overlap with this, although based around a different app. If anything here is unclear
it may help to look at that for more detailed descriptions and screenshots.
</div>
<div class="Text_Header">6.2 Create your first test that creates a contact in the address book</div>
<div class="Text_Normal">
Start
<?php codeSampleBegin() ?>
texttest --new
<?php codeSampleEnd() ?>

again and fill in the initial dialog. Fill in "AddressBook" as the Java Class name and select SWT for the GUI testing option.
<b>Do not</b> try to locate the AddressBook program as you may have done with other programs in previous exercises!
</div>
<div class="Text_Normal">
Then, create a test as before, and do "Record Use-Case" on it. Create a contact in the address book, fill in some data (you don't 
need to fill in all the fields) and close the Address book. When you do this, you will be prompted to enter "use-case names" for
the actions you have performed, and maybe to adjust how they map to the GUI. Fill in this dialog with suitable names.
</div>
<div class="Text_Normal">
If you made a mistake recording, you should just press Quit at this point. If you like what you created, press Approve and then Quit.
The test will then be replayed in the background and the expected behaviour collected. When it is done, open the stdout file and 
examine it so you can see what is being compared. Visit the config tab also and view the UI map file (ui_map.conf) which is what 
has been created by the usecase name entry dialog.
</div>
<div class="Text_Header">6.2 Run the test, with and without the GUI showing</div>
<div class="Text_Normal">
If you press "Run" now, the test will run without the GUI showing, using the virtual display program "Xvfb". Xvfb produces warnings
on some Linux systems, which you might need to add run_dependent_text for as in Exercise 2. To see the test execute in the GUI, check 
the "Show GUI" option, and increase the "Replay pause" setting a bit so it goes slowly enough to view it. 
</div>
<div class="Text_Header">6.3 Create a new test, via a "partial recording"</div>
<div class="Text_Normal">
This time we want to test the search functionality. We could just create our contact again, but that would be a pain, and we might
make the data in it subtly different by mistake. So instead of recording from scratch, we will start from part of the previous test.
Copy the test you have created, and edit the copied usecase file to remove the step that closes the GUI. Then run the test with the
"Show GUI" button checked. It will create the contact and then record anything else you do. Search for the contact and verify it
gets selected. Enter the new usecase names and approve the usecase file as before. This time you need to run the test by hand to collect
the correct information in the stdout file.
</div>
<div class="Text_Header">6.4 Refactor the "usecase language"</div>
<div class="Text_Normal">
This latest test now has a rather mechanical description of what is happening. It would be useful to raise the abstraction level and get
a very succinct description. This would also allow us to easily create tests containing more contacts.
</div>
<div class="Text_Normal">
Double-click the usecase file in this latest test. This brings up the StoryText Editor dialog. Select all the steps that consist of 
creating the contact, right-click and press "Create shortcut". 
</div>
<div class="Text_Normal">
It will suggest a very long name, referring to all the data you entered. Change it to something sensible and see how the contents evolve
in the preview window below. Note that if you delete any of the data references this data will be hardcoded: if you leave them in 
they will be treated as variables.
</div>
<div class="Text_Normal">
You can also create a shortcut for the search function.
</div>
<div class="Text_Normal">
When you close the StoryText editor, TextTest will ask to insert the created shortcuts into other tests. Answer Yes to this and it should 
insert into the test we created first.
</div>
<div class="Text_Header">6.5 Create a test that creates two contacts and then sorts them, swapping the order</div>
<div class="Text_Normal">
Hint: do a partial recording again. Write the second contact by hand using the shortcut that is now there to vary the data.
</div>
<div class="Text_Header">6.6 Get the first test to ignore the menu contents</div>
<div class="Text_Normal">
StoryText assumes everything is important until you tell it otherwise. Under "Definition Files", create a "storytext_options" file 
containing the string "-X Menu". This should mean that this test will not care about menu changes in future.
</div>
<div class="Text_Main_Header"><A NAME="Exercise7"></A>Exercise 7: Performance and Memory Testing</div>
<div class="Text_Header">7.0 Start and run the pre-made tests for this program</div>
<div class="Text_Normal">
This can be done via
<?php codeSampleBegin() ?>
texttest -a cpumem
<?php codeSampleEnd() ?>
There are three tests, which take a random amount of time to execute and report some other timing and memory usage in their standard 
output. They should succeed as they define some filterings which prevent the varying resource usage from failing the tests.
</div>
<div class="Text_Header">7.1 Enable TextTest's built in measurement of CPU time consumed</div>
<div class="Text_Normal">
See <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=measuring_system_resource_usage"; ?>">the docs</A> for how to
do this.
</div>
<div class="Text_Header">7.2 Try to stabilise the results by setting the minimum and tolerance thresholds</div>
<div class="Text_Normal">
The second test runs nearly instantaneously, so you should set a minimum using "performance_test_minimum" to prevent this
test being included in the performance runs. The others vary somewhat, set the tolerance ("performance_variation_%") accordingly
until they're reliably green. Try not to overdo it, obviously 1000% tolerance will work but it won't be very useful in practice!
</div>
<div class="Text_Header">7.3 Configure TextTest to extract the memory and 'database load' time from the stdout</div>
<div class="Text_Normal">
This involves using the setting "performance_logfile_extractor". When you have results, try to set tolerances accordingly as above
until the tests are reliably green. Note it is possible to store the average of the stored and received performances, by doing
"Approve As" and then checking the relevant option. This helps make sure the stored performance is in the middle of the range of 
performances, which allows you to have a lower tolerance than if it's at one end of the range.
</div>
<div class="Text_Header">7.4 Create an HTML report of these results, with performance information listed separately in the tables</div>
<div class="Text_Normal">
Do something similar to what you did in Exercise 3 for these tests. Run two or three named runs to gather some data. The data is
more interesting if the tests still have some failures sometimes, so you can sabotage the tolerance a bit if you like!
</div>
<div class="Text_Normal">
You can then configure it to show the various performance and memory data on additional sub-rows for each test. You can look up the config 
file settings for "historical_report_resources" 
in the <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=configfile_default"; ?>">configuration file references</A>
to work out how to do this. 
</div>
<div class="Text_Main_Header"><A NAME="Exercise8"></A>Exercise 8: CaptureMock/The Continuous Integration Script</div>
<div class="Text_Header">8.0 Install Mercurial and GCC if necessary</div>
<div class="Text_Normal">
This exercise assumes you have the <A class="Text_Link" HREF="http://mercurial.selenic.com">Mercurial version-control system</A> and the <A class="Text_Link" HREF="http://gcc.gnu.org">GCC C compiler</A> installed. If you don't you need to get them.
</div>
<div class="Text_Header">8.1 Introduction</div>
<div class="Text_Normal">
In the directory for exercise 8, under scripts/automatic_build.py you will find a small "continuous integration"
script. The basic idea is to update some code (in fact a C hello world program) from Mercurial source control, if 
there are changes trigger a build on several machines in parallel, and send an email if any of them fail.
The aim of the exercise is to create repeatable TextTest tests for this apparently hard-to-test script without 
even making any changes to it...</div>
<div class="Text_Header">8.2 Try out the script</div>
<div class="Text_Normal">
Go to the ex8_ci_script directory and run "scripts/automatic_build.py". 
(It expects to be run from this directory) There are no updates from source control, 
so it does not do anything. Note however that it created a timestamped directory under "logs"
containing a file showing what the source control did.
</div>
<div class="Text_Header">8.3 Write a test for this behaviour</div>
<div class="Text_Normal">
Run texttest --new, select the script above, check the box to enable CaptureMock and make sure you choose 
"ex8_ci_script" in the subdirectory field, 
otherwise it won't find the test data which is there! Create a test for no changes, as done before. 
The script tries to update "source" from "repo" so you'll need to add both of these as test data
as you did in exercise 2. "repo" can be linked with "link_test_path" as we don't expect the script
to make changes there.
</div>
<div class="Text_Normal">
It will however fail if you run it again, because it tells you about its
log directory which is timestamped. Filter it in the same way as you did with exercise 2.
</div>
<div class="Text_Header">8.4 Make the test check the contents of the logs</div>
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
<div class="Text_Header">8.5 Make the test independent of the current state of the Mercurial repository</div>
<div class="Text_Normal">
There is one problem still: the test still relies on the Mercurial
checkout ("source") being up to date. You should capture this state using CaptureMock so that 
the test doesn't fail if further checkins are made using Mercurial. Read the
<A class="Text_Link" HREF="index.php?page=capturemock&n=texttest">CaptureMock documentation</A> 
for guidance. You should record the interaction with the "hg" program and check it looks sensible. You'll need to filter the
sandbox directory too, but we did that in exercise 2 also.</div>
<div class="Text_Normal">
We now have a perfect test for no changes in source control!
</div>
<div class="Text_Header">8.6 Create a test that actually triggers a build</div>
<div class="Text_Normal">
Investigate what the script does in these circumstances outside of TextTest first, 
so you understand what you're testing. Go to the shell in the exercise directory.
As we've seen, the script uses Mercurial ("hg") to update the directory "source" from the directory
"repo". So trigger a change and see what happens. Make an edit in
repo/main.c, check it in via "hg commit -m 'change' -u 'me' repo", and then rerun
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
If you've handled Mercurial correctly in step 8.5 you should be able to
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
<div class="Text_Header">8.7 Disable and test the email sending</div>
<div class="Text_Normal">
Each time you run the tests where builds fail it tries to send an email. We probably 
don't want to be sending these emails for real, but we do want to check that 
they're sent correctly. All the more so if our "real" mail sending is broken and 
we can't see it being sent at all...
</div>
<div class="Text_Normal">
  Our test program is written in Python so we can use a feature specific to Python programs
  that can intercept the email-sending module "smtplib" in a similar way to how we handled
  the command-line "hg" program above. See <A class="Text_Link" HREF="index.php?page=capturemock&n=python_basic">here</A> 
  for how to enable Python interception using CaptureMock. 
</div>
<div class="Text_Normal">
  We want to "record" the email sending now, but we don't want to have to set up the Mercurial repositories and re-record the 
  Mercurial interactions again. So this time we choose "Mixed Mode" from the Running tab, which will replay what we have and
  record what we don't have. In this way we can check the email arrives and looks right, and then when running the test check our 
  interaction with the "smtplib" module remains the same as when we recorded it.
</div>
<div class="Text_Header">8.8 Simulate the remote build</div>
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

