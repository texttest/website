<div class="Text_Main_Header">Testing Java programs with TextTest</div>
<div class="Text_Description"> Useful tips for Java programmers</div>

<div class="Text_Header">Introduction</div>
<div class="Text_Normal">TextTest was originally built to test C, C++ and 
Python programs, and it isn't always obvious how to use it to test programs
written in Java. This article hopes to give some pointers.
</div>
<div class="Text_Normal">
You have a java program, that is, a class with a main method, and you want to
test it with TextTest. You run this on the command line like this:

<?php codeSampleBegin() ?>
java com.mycompany.MyClass
<?php codeSampleEnd() ?>

So you start TextTest with the --new option so you can start creating a new test suite for it.
TextTest then lets you name the application, say "myapp", and decide where to store the tests. 
There is an additional field for a Java class name. Enter "com.mycompany.MyClass" in this field,
which will grey out the executable so you don't actually need to choose a file.</div>
<div class="Text_Normal">
If your program is a jar file, just locate it using the "executable" file chooser and leave the "Java Class name"
blank.
</div>
<div class="Text_Header">Setting the Classpath</div>
<div class="Text_Normal">
If you program is of any size larger than "Hello World", you're
going to also want to set the classpath. The easiest way to fix this is to put the correct classpath into the $CLASSPATH
environment variable. TextTest can help you with this as described <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>#environment files">here</A> , it will look for a file "environment.myapp" and put these
values into the environment of your system under test. So it might look a bit like this:
<?php codeSampleBegin() ?>
# environment.myapp
CLASSPATH:c:\workspace\myproject\build\eclipse;c:\workspace\myproject\dep-lib\some_jar.jar
<?php codeSampleEnd() ?>
So now hopefully TextTest will be able to run your java program, and you can use all the usual
mechanisms to give command line arguments to your program, copy input files into the sandbox directory, and collect output files for comparison.
</div>
<div class="Text_Header">A note on System properties</div>
<div class="Text_Normal">
Sometimes you want to pass arguments to java itself rather than your program. These
can be System Properties that your application needs, or things like initial and maximum heap size.
For example, you want to call your program like this:
<?php codeSampleBegin() ?>
java -Xms256m -Xmx1024m -DmailServerPort=1642 com.mycompany.MyClass
<?php codeSampleEnd() ?>
The way to do this is using an "interpreter_options.myapp" file containing
<?php codeSampleBegin() ?>
-Xms256m -Xmx1024m -DmailServerPort=1642
<?php codeSampleEnd() ?>
These can then be varied throughout the test suite structure as described in the 
<A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>#extra_search_directory">test suite guide</A>.
</div>
<div class="Text_Header">Using Ant to set your CLASSPATH</div>
<div class="Text_Normal">
Maintaining a classpath by hand in the "environment.myapp" file, 
and keeping it in sync with your IDE becomes a hassle. This is where
you probably want to use Ant to generate it. 
</div>
<div class="Text_Normal"> If you're using Ant to build your Java program,
you probably have an entry a bit like this to define the classpath to use:
<?php codeSampleBegin() ?>
  &lt;path id="full-classpath"&gt;
    &lt;pathelement path="${build.path}/eclipse" /&gt;
    &lt;pathelement path="${build.classpath}" /&gt;
    &lt;fileset dir="dep-lib"&gt;
      &lt;include name="**/*.jar" /&gt;
    &lt;/fileset&gt;
  &lt;/path&gt;
<?php codeSampleEnd() ?>
In other words, the classpath includes your eclipse build directory, the folder where
ant has just generated class files, and all the jars in your "dep-lib" folder.
</div>
<div class="Text_Normal"> The trick is to get ant to generate the classpath.myapp file
and put it where texttest expects it. So to this end, create a template classpath file like this:
<?php codeSampleBegin() ?>
# environment.myapp.template
CLASSPATH:@CLASSPATH@
<?php codeSampleEnd() ?>
Then in your ant build.xml you can write something like:
<?php codeSampleBegin() ?>
    &lt;property name="runclasspath" refid="full-classpath" /&gt;
    &lt;copy file="${basedir}/texttest/${texttest.appname}/environment.${texttest.appname}.template"
        toFile="${basedir}/texttest/${texttest.appname}/environment.${texttest.appname}"
        overwrite="true"&gt;
      &lt;filterset&gt;
        &lt;filter token="CLASSPATH" value="${runclasspath}" /&gt;
      &lt;/filterset&gt;
    &lt;/copy&gt;
<?php codeSampleEnd() ?>
(${basedir}/texttest is my $TEXTTEST_HOME in this case). Then Ant will generate the environment.myapp file
for you with the correct classpath.
</div>
<div class="Text_Header">Using Ant to run your tests in batch mode</div>
<div class="Text_Normal"> 
The next thing you're going to want to do with ant is to get it to run your TextTest tests unattended.
If you're using a Continuous Integration server like Hudson, you will want it to run your tests there.
There is currently no actual ant task for TextTest (again, there is an enhancement request). For
the moment, you can still do it, it is just a little verbose in your ant build.xml file. 
</div>
<div class="Text_Normal"> 
In order to run TextTest in batch mode, you need some specific settings in your config file. You may not
want these settings there the rest of the time, and you probably want Ant to control what they contain. 
This makes it useful to have Ant generate an extra config file, with extra settings in. We can then
tell TextTest to use this as our "personal configuration file" by setting the environment variable 
"$TEXTTEST_PERSONAL_CONFIG" as described <A class="Text_Link" HREF="<?php print "index.php?page=".$version."&n=personalising_ui"; ?>">here</A>. To do this, we
create a template config file, perhaps like this:
<?php codeSampleBegin() ?>
# config.hudson.template
[batch_junit_format]
hudson:true

[batch_junit_folder]
hudson:@TEST_OUTPUT_FOLDER@
<?php codeSampleEnd() ?>
TextTest will use this config to let it run a batch run called "hudson". We use ant to fill in the
@TEST_OUTPUT_FOLDER@ so that the junitreport task will later be able to pick up the results.
</div>
<div class="Text_Normal"> 
In our build.xml we end up with two targets, something like this:
<?php codeSampleBegin() ?>
# build.properties
texttest.appname=myapp
test-output.dir=test-output # where texttest should write junit format results
test.classes.path=classes # where ant has put class files for this app
python.install.dir=C:/python # where python is installed
texttest.install.dir=C:/texttest # where texttest is installed
test-report.dir=test-report # where final junit report should be written
# build.xml
  &lt;target name="runtests" description="Run tests"&gt;
    &lt;!-- Delete results of previous test run --&gt;
    &lt;delete failonerror="false"&gt;
        &lt;fileset dir="${test-output.dir}/${texttest.appname}"&gt;
          &lt;include name="*.xml" /&gt;
        &lt;/fileset&gt;
    &lt;/delete&gt;
	&lt;!-- use template config file to create extra config file for batch run --&gt;
    &lt;mkdir dir="${basedir}/texttest_rundir" /&gt;
    &lt;copy file="${basedir}/texttest.config.template"
        toFile="${test.classes.path}/config"
        overwrite="true"&gt;
      &lt;filterset&gt;
        &lt;filter token="TEST_OUTPUT_FOLDER" value="${test-output.dir}" /&gt;
      &lt;/filterset&gt;
    &lt;/copy&gt;
    &lt;!-- execute texttest batch run and set exit code property to 1 if there are failing tests --&gt;
    &lt;exec executable="${python.install.dir}/python" resultproperty="texttest_exitcode"&gt;
    	&lt;arg line="${texttest.install.dir}/bin/texttest.py -b hudson -a ${texttest.appname}"/&gt;
	    &lt;env key="TEXTTEST_HOME" value="${basedir}/test/texttest" /&gt;
	    &lt;env key="TEXTTEST_PERSONAL_CONFIG" value="${test.classes.path}" /&gt;
	    &lt;env key="TEXTTEST_TMP" value="${basedir}/texttest_rundir" /&gt;
    &lt;/exec&gt;
  &lt;/target&gt;  
  
  &lt;target name="generate-test-report"&gt;
    &lt;mkdir dir="${test-report.dir}" /&gt;
    &lt;junitreport todir="${test-report.dir}"&gt;
      &lt;fileset dir="${test-output.dir}"&gt;
        &lt;include name="${texttest.appname}/*.xml" /&gt;
      &lt;/fileset&gt;
      &lt;report format="noframes" todir="${test-report.dir}" /&gt;
    &lt;/junitreport&gt;
    
    &lt;fail message="TextTest reported failed tests"&gt;
      &lt;condition&gt;
        &lt;isfailure code="${texttest_exitcode}"/&gt;
      &lt;/condition&gt;
    &lt;/fail&gt;
    
  &lt;/target&gt;
<?php codeSampleEnd() ?>

</div>
<div class="Text_Normal"> 
When you put this project onto Hudson, it's just a matter of pointing out to Hudson the
folder where the junit report is being written (${test-report.dir}), and it will
display pretty graphs of the results and links to summaries of failures. I assume
other CI servers have similar mechanisms.
</div>

<div class="Text_Header">Using TextTest to run your JUnit tests</div>
<div class="Text_Normal">
Sometimes it is useful to have TextTest run all of your tests, including unit tests.
Sometimes you want to write half of the test in JUnit and have TextTest check the files
produced. Anyway, it is not hard to get TextTest to run JUnit tests. Start by creating
a new test suite with "texttest.py --new", and then write "org.junit.runner.JUnitCore"
as the Java class name.
Then have your command line options in each TextTest test contain the name of the JUnit test case:
<?php codeSampleBegin() ?>
com.mycompany.MyTest
<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal"> 
Hopefully that gives you some pointers as to what is possible when using TextTest to test a java program.
For questions and comments, please join the TextTest mailing list.  
</div>
