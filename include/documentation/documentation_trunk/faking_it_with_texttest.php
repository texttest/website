<div class="Text_Main_Header">Faking it with TextTest</div>
<div class="Text_Description"> How to avoid running your whole system for real</div>				
				
<div class="Text_Header">Introduction</div>
<div class="Text_Normal">TextTest is about testing at the system level, and it is
expected that you are trying to run your system in as similar a
way as possible to how it is used in practice. It is, however,
more important to have maintainable, repeatable tests that are
free of global side effects. Sometimes it is necessary to
disable some part of the system, or fake some behaviour that
cannot easily be triggered for real in a repeatable way. This is
referred to as &ldquo;mocking out&rdquo; a subsystem for testing
purposes.</div>
<div class="Text_Header"><A NAME="capturemock"></A>CaptureMock</div>
<div class="Text_Normal">
TextTest has built-in integration with <A class="Text_Link" HREF="index.php?page=capturemock">CaptureMock</A>, which was indeed part of TextTest up until the 3.20 release and was designed to work with it. CaptureMock can help you capture and replay interactions with command-line programs, Python modules and functions, and also synchronous plain-text messaging over a network. See its own documentation on this site for more details, particularly <A class="Text_Link" HREF="index.php?page=capturemock&n=texttest">here</A> for how to use it from TextTest.
</div>
<div class="Text_Header"><A NAME="test_data"></A>Manual interception</div>
<div class="Text_Normal">
Sometimes capturing what something does isn't sufficient and you need finer-grained control over the behaviour. In this case you can make use of "executable" and "importable" test data.</div>
<div class="Text_Normal">
 When TextTest creates the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>">sandbox directory</A> on running the test, and populates it with
test data, it also makes sure to insert that directory at the
start of the PATH, PYTHONPATH and CLASSPATH variables. That
makes it possible to provide executable programs that will be
run instead of their real versions via the normal <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>#link_test_path">test
data mechanism</A> (&ldquo;link_test_path&rdquo;). Then you just need to place such executable test data
in the appropriate place in the permanent test structure, just
as you would with more passive test data.
</div>
<div class="Text_Normal"> Likewise, you
can provide a Python module or a Java class, which will then be
imported instead of the real version at the appropriate moment.
</div>
<div class="Text_Header">Python programs and testcustomize.py</div>
<div class="Text_Normal">
For Python programs, though, there is an alternative, which is usually preferable. This is to provide a file
called "testcustomize.py". The idea of this is to be similar to Python's "sitecustomize.py",
i.e. to provide some Python code that will be called on interpreter startup just for that
test or test suites (it can be provided anywhere in the hierarchy, like anything else). </div>
<div class="Text_Normal">
Suitable "monkey-patching" can then be done to control the behaviour of certain classes.
The advantages of this is that it's easy to change the behaviour of several modules from a single location, it's
easier to "monkey patch" individual functions rather than entire modules, and because it
isn't dependent on PYTHONPATH, it works to manipulate also the behaviour of builtin modules.
</div>
<div class="Text_Header">Generic mocking frameworks</div>
<div class="Text_Normal">
Naturally, there are mocking frameworks in most programming languages that give more control still. These however are often written primarily with unit testing in mind and tend to assume that you are coding your tests against an API. As such they are not always easy to use from fully black-box tests with TextTest where test code does not really feature. By writing some kind of wrapper script around your program it is usually possible to make use of them in some way, though.
</div>
