<div class="Text_Main_Header">Using TextTest as a Python Framework: Writing your own config module</div>

<div class="Text_Normal"><BR>
</div>
				
<div class="Text_Normal"><A NAME="-help"></A><A NAME="config_module"></A><FONT COLOR="#ff0000">Right
now this is fairly restricted and is lifted and updated from the
old user guide, which I've removed. This document will be
improved and extended when I'm finished with higher priority
stuff.</FONT></div>
<div class="Text_Header"><A NAME="definition_file_stems"></A>Configuration Modules</div>
<div class="Text_Normal">TextTest (as a standalone tool) consists of a <I><B>core
framework</B>, </I>which interprets a directory structure and
the files in it a certain way, and the <B><I>default
configuration module</I></B>

, which is responsible for actually doing things (like running
tests and evaluating the results). This default configuration
comes with TextTest and is used unless you specify otherwise.
But it is possible to override it with your own configuration
and so tweak what it does. This allows you to take advantage of
local circumstances: for example to plug in custom reporting
tools for your application, or to take advantage of locally
installed software. It also provides a way for you to add your
own experimental features to TextTest without making it
difficult to upgrade. Naturally, doing this involves writing
code in Python.
</div>
<div class="Text_Normal">In order to use a configuration other than the default one,
specify the &quot;config_module&quot; entry in your config file.
What this configuration will do is of course up to the person
who wrote it, and hence in order to find this information out
for a particular application, run &quot;texttest -a &lt;app&gt;
-help&quot;. This provides a means for configurations to explain
how they differ from the default one.</div>
<div class="Text_Normal">
If you write such a configuration module, the only requirement is that TextTest can import it,
so it must be placed somewhere on PYTHONPATH. An additional trick is that you can place it in the root of your
test suite in a directory called "texttest_config_modules", where it will also be picked up.
</div>
<div class="Text_Normal">A configuration can both extend the range of command line
options available, and the config file entries that will be
interpreted and acted upon. Occasionally, they have defined new
sorts of files that define test cases and test suites, besides
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>#log_file">the usual ones</A>. It can
then be useful to have the static GUI display them as such, so
there is a config file entry &ldquo;definition_file_stems&rdquo;
to allow this to be configured. They can be keyed with "regenerate" if they
will also be produced by the program, like the default configuration's traffic and usecase files. 
Unix-style file expansions may be used to indicate a range of possible stems.
</div>
<div class="Text_Normal">TextTest comes with 2 configurations to choose from -
&quot;default&quot; which should work anywhere, and
&quot;<A class="Text_Link" href="index.php?page=<?php echo $version; ?>&n=running_tests_in_parallel">queuesystem</A>&quot;
for use on UNIX with the <A class="Text_Link" href="http://gridengine.sunsource.net/">SGE</A>
or <A class="Text_Link" href="http://www.platform.com/Products/Platform.LSF.Family/Platform.LSF/">LSF</A>

grid engine installed. 
</div>
<div class="Text_Header"><A NAME="interactive_action_module"></A>Interactive Action
Modules</div>
<div class="Text_Normal">There is a similar mechanism for the GUIs, whereby new configurations
can extend the user interface to interface with some particular tool or environment. This is
controlled by the config file entry &ldquo;interactive_action_module&rdquo;, which will
default to the value of &ldquo;config_module&rdquo; with a "_gui" suffix added, if it is not 
explicitly defined. Your starting point for these modules is therefore the default_gui/__init__.py module.
</div>
<div class="Text_Normal"><FONT COLOR="#ff0000">To be continued: with documentation of
the configuration module API...</FONT></div>
