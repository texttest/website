<div class="Text_Main_Header">Automatic Failure Interpretation in TextTest</div>

<div class="Text_Normal"><BR>
</div>
				
				
<div class="Text_Header">Introduction</div>
<div class="Text_Normal">There are situations when it saves a fair bit of time to
inform TextTest about what your system is likely to log and what
it means. This means that TextTest can find such patterns
automatically and instead of just saying &ldquo;differences in
output&rdquo; can provide you a much more succinct description
of what went wrong. TextTest can also automatically try to
collect information about what happened from the system: for
example core files that have been dumped on UNIX. This document
aims to give a guide to how TextTest can interpret failures at a
higher level than file differences.</div>

<div class="Text_Header">Collecting Core Files (UNIX)</div>
<div class="Text_Normal">This will just happen. Each test is run with a unique
temporary directory as the current working directory. This means
that TextTest will pick up any core file written there and try
to extract the stack trace from it. If it succeeds, it will
report the test as having &ldquo;CRASHED&rdquo; and display the
stack trace in the &ldquo;Text Info&rdquo; window. 
</div>
<div class="Text_Normal">Since version 3.7, it does this by using an external script
&ldquo;interpretcore.py&rdquo; which outputs stack traces given
core files. It has been tested on quite a few flavours of UNIX :
HPUX-11, powerpc, Sparc Solaris and Linux RHEL3, RHEL4 and seems
to be quite portable (much more so than the old code that was
part of TextTest until version 3.6) This script is plugged in by
default via the default value of the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=extra_files"; ?>#collate_script">&ldquo;collate_script&rdquo;</A>entry on UNIX. 
</div>
<div class="Text_Normal">It is provided as standard with TextTest, but can clearly
also be used externally to TextTest. It works by using the
standard debugger 'gdb'. If it fails to find the stack trace for
any reason the test will still be reported as &ldquo;CRASHED&rdquo;
but the reason for failure will be given in the &ldquo;Text
Info&rdquo; window instead.</div>
<div class="Text_Header">Known Bugs : associating logged text patterns with a summary
description</div>
<div class="Text_Normal">It can be useful to associate a succinct problem description
with the appearance of certain logged text. For example, your
application may well report &ldquo;Internal Error!!!&rdquo; when
something bad happens. In this case you could tell TextTest
about this so it can describe such a test failure as an Internal
Error and save you the trouble of reading the log file.</div>
<div class="Text_Normal">Another common usage, as the title hints, is for known bugs
in the system under test. This may be needed because the bug
appears only intermittently, or because time has not yet been
found to fix it even though its presence is known. In either
case, telling TextTest about it can prevent lots of people
examining lots of failed tests in order to discover the same
issue again.</div>
<div class="Text_Normal">The easiest way to do this is by using the dialog in the
static GUI. Right-click the test or testsuite where the bug should
apply (for example, if it applies everywhere, select the root
test suite) and select "Enter Failure Information". (The screenshot
below is from an earlier version of TextTest but the contents of the old Bugs
tab is similar to what the dialog will show)</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/reportbug.JPG" NAME="graphics1" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>
</div>
<div class="Text_Normal">Here we imagine that when our application logs &ldquo;after
&lt;n&gt; seconds&rdquo; this implies it has gone into a delay
that isn't appropriate. So we fill in the dialog appropriately
with the text to match, and some description information, a full
text to give and a short description. This creates a special
file <B><B>knownbugs.&lt;app&gt;</B></B> in the test or suite's 
directory, which has a format that is easy to edit in a normal editor.</div>
<div class="Text_Normal">If we then run the test and it produces the indicated text,
we then get a nice summary as well as the usual complete file
differences. Note it has used our &ldquo;brief description&rdquo;
given above in the Details column of the test tree view, while
the full description appears in the Text Info window at the
bottom right. (Here I've run two copies of the text to show what tests failing with 
knownbugs look like in the test tree when not selected)</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/knownbug.png" NAME="Graphic1" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>
</div>
<div class="Text_Normal">
Ordinarily, you will search for some text that will be produced in a certain file, as
given by the "file to search in" entry. This will search the unfiltered version of the file
(not the diff produced in the Text Info window). This can be inverted via the relevant check box,
so that the bug is triggered when the text is not present.
</div>
<div class="Text_Normal">
There is also a special entry 'free_text' in the "file to search in" drop-down list. This
works by checking the actual result, more or less what appears in the Text Info window.
Note however that it isn't generally possible to match on the first line of this text,
which is an additional explanatory line added by the GUI and not part of the state of the
test. This line will be different in the case of <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=running_texttest_unattended"; ?>">running in batch mode</A>, which is why it isn't a good idea for TextTest
to use it for matching. 
</div><div class="Text_Normal">
When the tests are run, TextTest wll then find all such "knownbugs" files, using its 
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites";?>#extra_search_directory">mechanism for finding
and prioritising files in the hierarchy</A>. All information from all such files will be used,
the files do not overwrite each other as versioned files used to up to version 3.10.</A>
</div>
<div class="Text_Header"><A NAME="bug_system_location"></A>Extracting information from bug systems (particularly Bugzilla or Jira)</div>
<div class="Text_Normal">If you have a bug-tracking system with an API of some sort, 
you can probably get it to talk to TextTest without
very much effort. Instead of providing textual descriptions you
can then just provide the bug ID from the bug system and
TextTest will extract the (current) information for you. It will
try to determine whether the bug has been fixed (closed in the
bugsystem) and if so it will be reported as &ldquo;internal
error&rdquo; rather than as &ldquo;known bug&rdquo;, as it is
expected the bug text would not continue to occur if the bug had
been closed.</div>
<div class="Text_Normal">
To set this up, you need to give TextTest the URL to your bug system, 
using the config file entry "bug_system_location". The key should be the name of
the bug system, currently one of "bugzilla", "bugzillav2" or "jira". For example, if you use 
bugzilla version 3 and later you might add this in your config file:</div>
<div class="Text_Normal">
<?php codeSampleBegin() ?>
[bug_system_location]
bugzilla:http://www.mysite.com/bugzilla
[end]
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header">Extracting information from Bugzilla</div>
<div class="Text_Normal">If you use <A class="Text_Link" href="http://www.bugzilla.org/">Bugzilla</A> to
track your bugs, there are two plugins already written and bundled
with TextTest. For bugzilla version 3 and onwards there is a plugin called "bugzilla" that calls bugzilla's native
web service API to extract the relevant information. This should work against any bugzilla installation out of the box.</div>
<div class="Text_Normal">
There is also a plugin called "bugzillav2" that can interface with the older versions of bugzilla that don't
have a web service, however for this to work, you also need to install the
&ldquo;<A class="Text_Link" href="http://search.cpan.org/~reflog/BugCli-0.2/">bugcli</A>&rdquo;
program. This is essentially an additional open source CGI script that runs on the
bugzilla server. Note that bugcli is not supported by anyone any more: if you find problems you'll 
just need to upgrade Bugzilla.
</div>
<div class="Text_Header"><A NAME="bug_system_username"></A><A NAME="bug_system_password"></A>Extracting information from Atlassian's Jira</div>
<div class="Text_Normal">If you use <A class="Text_Link" href="http://www.atlassian.com/software/jira/">Jira</A> to
track your bugs, help is also at hand. Simply set the location of your Jira installation as below. Note that it has 
been found necessary to include the port number (8443 is Jira's default) to make
this work in some circumstances. Jira's webservice also requires a login before it will release information, so you need to also provide the settings "bug_system_username" and "bug_system_password" to TextTest in a similar way. A sample config file might therefore
look like this:
</div>
<div class="Text_Normal">
<?php codeSampleBegin() ?>
[bug_system_location]
jira:https://jira.blah.com:8443

[bug_system_username]
jira:texttest

[bug_system_password]
jira:the_password
[end]
<?php codeSampleEnd() ?></div>
<div class="Text_Normal">
These kind of settings are often useful to put in a <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=personalising_ui"; ?>#-vanilla">site-specific config file</A>.
</div>
<div class="Text_Header">Extracting information from other bug systems</div>
<div class="Text_Normal">If you use some other bug tracker with an API, 
it should be fairly easy to copy the "bugzilla.py" or "jira.py" module from the TextTest
source (under default/knownbugs) and change it to implement the 'findBugInfo' method as appropriate for your
bug system. By providing the name of the module in the bug
system field when reporting the bug, it will load this module
and extract the relevant information. Naturally it's appreciated if you submit your changes
back to the project if you do this.
</div>
