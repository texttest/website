<div class="Text_Main_Header">Measuring system resource usage </div>
<div class="Text_Description">  CPU time and memory consumption</div>


<div class="Text_Normal"><BR>
</div>
				
				
<div class="Text_Header">Introduction</div>
<div class="Text_Normal">TextTest is a very suitable tool for testing systems that
place substantial demands on system resources, for example they
may run for long periods and consume lots of CPU time, or they
may be very demanding in terms of memory. In this case it is
generally necessary to control this, so that changes to your
system do not suddenly result in it being much slower or
consuming much more memory. This document provides a guide to
how to set up such testing using TextTest.</div>
<div class="Text_Normal">In general, such values should be measured by the system
under test and logged to some TextTest result file. TextTest can
then be configured to extract them and compare them. On UNIX,
CPU time can also be measured and extracted automatically by
TextTest with changes only needed in the config file. 
</div>

<div class="Text_Normal">For each type of system resource tested, a small result file
is generated by TextTest containing a single line with the
relevant information in it. The name of this file doubles up as
a way to refer to the tested resource in the various config file
entries. For example, the file might contain this:</div>
<div class="Text_Normal">

<?php codeSampleBegin() ?>
CPU time   : 30.39 seconds on apple
<?php codeSampleEnd() ?>

</div><div class="Text_Normal">
Most of the performance configuration can be defined per tested
resource file in this way. Any identifier at all can be
provided, and if no configuration is recognised for that name
default settings will be used. All of the performance config
file settings that start with &ldquo;performance_&rdquo;
(described below) are &ldquo;composite dictionary entries&rdquo;
with the file stems as keys, it is recommended to read the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>#Appendix - TextTest file formats">file
format documentation</A> for what this means. 
</div>

<div class="Text_Header"><A NAME="-noperf"></A><A NAME="performance_test_machine"></A>
A note on machines and when information is collected</div>
<div class="Text_Normal">It is generally assumed that you may have more than one
machine at your disposal in order to run tests. Further, these
machines may not be identical, some may be faster than others.
For any comparison involving times, it is therefore essential to
say on which machines you intend for testing to be performed, or
it will be impossible to get reliable results.</div>
<div class="Text_Normal">This is done using the config file entry
&ldquo;performance_test_machine&rdquo;. This has the form below</div>
<div class="Text_Normal">

<?php codeSampleBegin() ?>
[performance_test_machine]
&lt;system_resource_id&gt;:&lt;machine_name1&gt;
&lt;system_resource_id&gt;:&lt;machine_name2&gt;
<?php codeSampleEnd() ?>
</div><div class="Text_Normal">
The machine names should be either names of machines where you
want performance testing to be enabled, or the string &ldquo;any&rdquo;,
which indicates that performance should be tested on any machine
for this system resource id. Note that it may be very useful to
use the key &ldquo;default&rdquo; here, to save lots of repeated
typing.</div>
<div class="Text_Normal">Running the test on any machine outside the list will still
work, but no performance-related information will be generated
or compared. It is also possible to disable collecting
performance-related information: use the &ldquo;-noperf&rdquo;
flag on the command line, or select &ldquo;Disable any
performance testing&rdquo; from the static GUI's &ldquo;How to
Run&rdquo; tab.</div>

<div class="Text_Header"><A NAME="cputime_include_system_time"></A>Measuring CPU time
consumption directly with TextTest (UNIX only)</div>
<div class="Text_Normal">This is keyed in the config file by the identifier &ldquo;cputime&rdquo;
but generates a file called &ldquo;performance.&lt;app&gt;&rdquo;
for historical reasons (it used to be the only kind of
performance measurement). Enabling it is a matter of enabling
the config file entry &ldquo;performance_test_machine&rdquo; for
the system resource id &ldquo;cputime&rdquo;, as described
above. 
</div>

<div class="Text_Normal">It uses the shell tool &ldquo;time&rdquo; to time the run of
the system under test, which works pretty reliably. Of course,
the CPU time of the whole test isn't always what you want &ndash;
in this case you will need to take over the measurement yourself
via the mechanism described below.</div>
<div class="Text_Normal">By default, only the user time is collected. You can include
the system time also by setting the config file entry
&ldquo;cputime_include_system_time&rdquo;.</div>
<div class="Text_Header"><A NAME="performance_logfile_extractor"></A><A NAME="performance_logfile"></A><A NAME="performance_descriptor_increase"></A><A NAME="performance_descriptor_decrease"></A><A NAME="default.ExtractStandardPerformance"></A>
Extracting other system resource usage from logged files</div>

<div class="Text_Normal">Any information present in any TextTest result file can be
extracted and treated as a system resource. First, you should
choose a system resource id for the resource concerned. You then
need to make sure that &ldquo;performance_test_machine&rdquo; is
enabled for this key (or &ldquo;default&rdquo;, naturally).
Additionally, you need to tell TextTest how to extract it. This
is done via the config file entry
&ldquo;performance_logfile_extractor&rdquo;, which has the
following form:</div>
<div class="Text_Normal">
<?php codeSampleBegin() ?>
[performance_logfile_extractor]
&lt;system_resource_id&gt;:&lt;text_identifier&gt;
<?php codeSampleEnd() ?>
</div><div class="Text_Normal">
The &lt;text_identifier&gt; here is a string to be found in the
file to be searched. When TextTest finds that string, it will
take the word immediately following it and try to interpret it
as a number (note that you need to provide the whole string up
to the word beforehand, not just a part of it as for
&ldquo;run_dependent_text&rdquo;). It will also parse the format
hh:mm:ss for times. It will then generate a file
&lt;system_resource_id&gt;.&lt;app&gt; in a similar way to the
performance file above.</div>

<div class="Text_Normal">The file to be searched is identified primarily by the config
file entry &ldquo;log_file&rdquo;. This defaults to &ldquo;output&rdquo;,
i.e. the standard output of the SUT. You may need to search
different files for different entries, in which case the entry
&ldquo;performance_logfile&rdquo; is of use. This has the same
form as above, except that the value is the file stem of the
file you wish to extract the information from.</div>
<div class="Text_Normal">If you choose the
 system_resource_id &ldquo;memory&rdquo;, the number will be interpreted as a
memory value in megabytes. This special system resource ID will also cause 
"performance_test_machine" to be set to &ldquo;any&rdquo;
by default, as memory is assumed to be less dependent on what
machine is used.</div>
<div class="Text_Normal">
If you chose some other name for system_resource_id the number is assumed to be a time (in
seconds or hh:mm:ss) and will be displayed accordingly. If it decreases
the change will be reported as "faster(&lt;system_resource_id&gt;)". This
reporting can however be configured, via the config file entries "performance_descriptor_decrease"
and "performance_descriptor_increase". These should be a comma-separated 3-tuple
of &lt;name&gt;, &lt;brief_description&gt;, &lt;full_description&gt;. (The easiest thing
is probably to look in the 
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default";?>">
table of config file settings</A> and examine
the default values for "cputime" and "memory").
</div>
<div class="Text_Normal">When you have just enabled such resource usage extraction,
you generally want to automatically extract the current values
from your existing result files for all tests, creating the
auto-generated system resource files. This avoids getting a lot
of &ldquo;new file&rdquo; results first time around. There is a
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>#-s">plugin script</A> for this called
&ldquo;default.ExtractStandardPerformance&rdquo;. 
</div>

<div class="Text_Header"><A NAME="performance_test_minimum"></A><A NAME="performance_variation_%"></A>
Comparing and Saving System Resource Usage Files</div>
<div class="Text_Normal">The files for comparison are not compared exactly. Part of
the point of testing things like this is that it is never
exactly the same: you need to set a tolerance. This is done via
the config file entry &ldquo;performance_variation_%&rdquo;,
which has a similar format to the ones already described. It
verifies that the percentage difference between the two figures
is no more than a certain figure. There is also an entry
&ldquo;minimum_performance_for_test&rdquo;, which can be used to
say, for example, that a test must run for at least 5
CPU-seconds before it is worth comparing it.</div>
<div class="Text_Normal">Note that TextTest's policy with percentages is to always
usage the &ldquo;percentage increase&rdquo; (defined as &lt;<I>larger&gt;

&ndash; &lt;smaller&gt; / &lt;larger&gt;)</I> which can be
surprising at first, especially if your test shows &ldquo;100%
faster&rdquo; as below! It was found to be easier to set the
tolerances this way because it leads to a symmetric situation:
7% slower and 7% faster mean the same thing. The more
immediately intuitive way of defining decreases as a percentage
of the current value leads to the situation where a 100%
slowdown today is counterbalanced by a 50% speedup tomorrow,
which can also become hard to follow.</div>

<div class="Text_Normal">When saving tests where differences in performance
have been reported, it is possible to save an average of the old performance
figure and the new one, to prevent too much oscillation. To do this, fire up 
the "Save As..." dialog, and select &ldquo;Average Performance&rdquo; from
the radio button at the bottom of the dialog. 
</div>
<div class="Text_Normal">Below is what you will see in the dynamic GUI when you run
tests that fail in performance in this way.</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/perftest.JPG" NAME="Graphic1" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR><BR>

</div>
<div class="Text_Header"><A NAME="performance.PerformanceStatistics"></A><A NAME="performance.ShowMemoryUsage"></A>
Statistical reports on System Resource Usage</div>
<div class="Text_Normal">There are two <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites";?>#Appendix%20-%20TextTest%20file%20formats">plugin scripts</A>

for this. For CPU time, use the script
&ldquo;performance.PerformanceStatistics&rdquo;. This will print
the amount of CPU time used by each test to standard output. Use
the option &ldquo;file=&lt;sys_resource_id&gt;&rdquo; to control
which resource is reported on. You can also compare with another
version, percentage-wise for each test, using the option
&ldquo;compv=version&rdquo;. To compare memory usage of &ldquo;myapp&rdquo;
version 1.3 with the previous version 1.2, for example, use</div>
<div class="Text_Normal">
<?php codeSampleBegin() ?>
texttest -a myapp -v 1.3 -s &ldquo;performance.PerformanceStatistics file=memory compv=1.2&rdquo;
<?php codeSampleEnd() ?>
</div>
