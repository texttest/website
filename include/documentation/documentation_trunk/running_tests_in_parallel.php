<div class="Text_Main_Header">Running tests in parallel</div>
<div class="Text_Description">  The &ldquo;queuesystem&rdquo;
configuration</div>
<div class="Text_Header"><A NAME="-l"></A><A NAME="queue_system_max_capacity"></A>On a single machine - making use of multiple cores</div>
<div class="Text_Normal">Since TextTest 3.23, if you run it on a multicore machine, it will run as many tests in parallel as you have cores on the machine.
In terms of the configuration this means that the "queuesystem" configuration module is automatically enabled. To disable it and run one 
test at a time, you can set
<?php codeSampleBegin() ?>
config_module:default
<?php codeSampleEnd() ?>
in your config file. To steer how many tests will be run simultaneously, you can set "queue_system_max_capacity" in your config file also.
</div>
<div class="Text_Normal">As soon as each test finishes, the test will go green or red,
and results will be presented. Unlike the default configuration,
the tests will not naturally finish in order. 
</div>
<div class="Text_Header"><A NAME="queue_system_module"></A><A NAME="queue_system_min_test_count"></A>Multiple machines and Grid Engines</div>
<div class="Text_Normal">When you have more than one machine at your disposal for
testing purposes, it is very beneficial to be able to utilise
all of them from the same test run. &ldquo;Grid Engine&rdquo;
software allows you to do this, so that tests can run in
parallel across a network. This greatly speeds up testing,
naturally, and means far more tests (or longer tests) can be run
with somebody waiting on the results.</div>
<div class="Text_Normal">TextTest's queuesystem configuration is enabled by setting
the config file entry &ldquo;config_module&rdquo; to
&ldquo;queuesystem&rdquo;. It operates against an abstract grid
engine, which is basically a Python API. Three implementations of
this are provided, where the default is "local", which runs in parallel on the local machine as described above.
There is also one for the free open source grid engine <A class="Text_Link" href="http://www.gridengine.org/">SGE
</A>. Note that since Oracle bought Sun there are various descendants of the original SGE available, some Open Source,
some with commercial support. See the "SGE" link above for more details. The final option is Platform
Computing's <A class="Text_Link" href="http://www.platform.com/Products/Platform.LSF.Family/Platform.LSF/">LSF</A>
(which is in theory more Windows-friendly, but costs money). You choose between these by
setting the config file entry &ldquo;queue_system_module&rdquo;
to &ldquo;SGE&rdquo; or &ldquo;LSF&rdquo;.</div>
<div class="Text_Normal">By default, it will submit all tests to the grid engine. It
is still possible to run tests locally as with the default
configuration, from the command line you can provide "-l".</div>
<div class="Text_Normal">
From the Static GUI there are 3 options for the "Use grid" option. "Always" and "Never" speak for themselves.
The default is however to have some threshold based on the number of tests to submit: if more tests are used,
the grid will be used, otherwise they will be run locally. This is configured via the config file setting 
"queue_system_min_test_count", which defaults to 0 and hence the same as the "Always" option.
</div>

Here is a sample
screenshot, from an old version of TextTest using SGE:</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/parallel.png" NAME="Graphic1" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>Some
tests have finished and gone green, but others are still running
and hence yellow. TextTest reports their state in the grid
engine (&ldquo;RUN&rdquo;) followed by the machine each is
running on in brackets. 
</div><div class="Text_Normal">
Internally, TextTest submits itself to the grid engine and runs a slave process
remotely, which runs the test in question and communicates the
result back to the master process via a socket. The master process
will also poll the grid engine periodically (every 15 seconds) to find out what 
is happening to its tests, to be able to pick up internal grid engine states like
suspension and also to be able to report if a job dies without reporting in (for
example because of hardware problems or because Python cannot be found remotely)
</div>
<div class="Text_Header">Tables for the queuesystem module</div>
<div class="Text_Normal">As this functionality works with a different configuration
module, additional config file entries, running options and
support scripts are available, over and above those provided by
default: 
</div>
<UL>
	<div class="Text_Normal"><li><A class="Text_Link" href="<?php print "index.php?page=".$version."&n=options_queuesystem";?>">Full list of options when
	submitting test runs</A></div>

	<div class="Text_Normal"><li><A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_queuesystem";?>">Full list of possible entries
	for config files</A></div>
	<div class="Text_Normal"><li><A class="Text_Link" href="<?php print "index.php?page=".$version."&n=scripts_queuesystem";?>">Full list of plugin scripts (for
	use with -s option)</A></div>
</UL>
<div class="Text_Header"><A NAME="default_queue"></A><A NAME="-q"></A>Queues</div>
<div class="Text_Normal">A grid engine will be configured to have a number of <I>queues</I>,
which will hold jobs (tests in our case) until a CPU becomes
available somewhere, and then dispatch them to that machine.
These queues also handle job priorities, it is generally
possible to set up several queues so that jobs from one will
cause jobs from the other to be suspended. In the case of
testing, it is often useful to prioritise jobs by how long they
are expected to take, so that a one-hour test can be suspended
to allow a five-second test to run. To find out more, read the
documentation of the grid engine of your choice.</div>
<div class="Text_Normal">As far as TextTest is concerned,
it must decide which queue to submit each test to. The procedure
is as follows:</div>

<OL>
	<div class="Text_Normal"><li>If the option &ldquo;Request
	SGE/LSF queue&rdquo; has been filled in (-q on the command
	line), that queue will be used.</div>
	<div class="Text_Normal"><li>If the config file setting
	&ldquo;default_queue&rdquo; has been set to something other
	than its default value (&ldquo;texttest_default&rdquo;), that
	queue will be used.</div>
	<div class="Text_Normal"><li>If neither, the default queue
	of the queue system will be used, supposing it has one.</div>

</OL>
<div class="Text_Normal">It is often useful to <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=writing_a_config_module";?>">write a
derived configuration</A> to modify this logic, for example to
introduce some mechanism to select queues based on expected time
taken.</div>
<div class="Text_Header"><A NAME="-R"></A><A NAME="queue_system_resource"></A>Resources</div>
<div class="Text_Normal"><I>Resources </I>are used to specify properties of machines
where you wish your job to run. For example, you might want to
request a machine running a particular flavour of linux, or you
might want a machine with at least 2GB of memory. Such requests
are implemented by resources, in both grid engines. Naturally,
more details can again be had from the documentation of the
queue systems. LSF requests resources via &ldquo;bsub -R&rdquo;
on the command line, while SGE uses &ldquo;qsub -l&rdquo;.</div>

<div class="Text_Normal">TextTest must choose which
resources to request on the command line. The procedure here is
to request <U>all</U> of the resources as specified below:</div>
<OL>
	<div class="Text_Normal"><li>The value of the option
	&ldquo;Request SGE/LSF resource&rdquo;, if it has been filled
	in (-R on the command line)</div>
	<div class="Text_Normal"><li>The value of the config file setting
        "queue_system_resource", if it has been set.</div>
	<div class="Text_Normal"><li>All resources as generated by
	the performance_test_resource functionality, if enabled (see
	below).</div>

</OL>
<div class="Text_Header">Throughput and capacity</div>
<div class="Text_Normal">When tests complete, TextTest will keep the remote test process
alive and try to reuse it for a test with compatible resource requirements. This bypasses
the time needed to submit tests to the queue system and wait for them to be scheduled,
and reduces network traffic. This improvement in TextTest 3.10 should be able to
improve throughput considerably, particularly where a large number of short tests need to
be run.
</div><div class="Text_Normal">By default, until all tests have been dispatched, TextTest
will reuse remote jobs in this way, but will also continually submit new jobs at the same time. 
You can probably improve the throughput further by telling it the maximum number of parallel 
processes it can reasonably expect from your grid. To do this, set the config file entry 
&ldquo;queue_system_max_capacity&rdquo; to this number. It's generally better for this number to be 
a bit too high than too low so be conservative! Once it has submitted this number of jobs it 
will then stop submitting and rely on reusing existing jobs.
</div>
<div class="Text_Header">Viewing files locally and remotely</div>
<div class="Text_Normal">
All of the settings for <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=running_tests_remotely";?>#view_file_on_remote_machine">running tests remotely without a grid engine</A> apply here also. You can configure your viewer programs to be started locally or remotely in the same way.
</div>
<div class="Text_Header"><A NAME="-keepslave"></A>Cleaning of temporary files</div>
<div class="Text_Normal">As the queuesystem configuration is often used for very
large test suites, from TextTest 3.10 it will start to try and clean up temporary
files before the GUI is closed. Otherwise closing the GUI can appear to take a very
long time. </div>
<div class="Text_Normal">
The default behaviour is now therefore to remove all test data and files belonging to
successful tests remotely, i.e. as soon as they complete. This can be overridden by
providing the &quot;-keepslave&quot; option on the command line, or the equivalent
switch from the Running/Advanced tab in the static GUI, in case you want to examine
the filtering of a succesful test for example.
</div>
<div class="Text_Header"><A NAME="performance_test_resource"></A><A NAME="min_time_for_performance_force"></A><A NAME="-perf"></A>
Collecting system resource usage with a grid engine</div>
<div class="Text_Normal">The queuesystem configuration also provides some improvements
in <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=measuring_system_resource_usage"; ?>">default configuration's
functionality for comparing system resource usage</A> in tests.
This is essentially in the area of the concept of a <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=measuring_system_resource_usage"; ?>#performance_test_machine">performance
test machine</A>. In the default configuration, tests are run
locally, so all we can do is see if our current machine is
enabled for performance testing. With a grid engine at our
disposal, we can actually request a performance machine for
particular tests.</div>
<div class="Text_Normal">The simplest way to do this is to check the &ldquo;run on
performance machines only&rdquo; box from the static GUI
(&ldquo;-perf&rdquo; on the command line). That will make sure
the grid engine requests that the test only run on such
machines.</div>

<div class="Text_Normal">It is also possible to say that
once tests take a certain amount of time they should always be
run on performance machines only (it is assumed that the
performance of the longest tests is generally the most
interesting.) This can be done via the setting
"min_time_for_performance_force". The time measures used are those indicated
by the setting "default_performance_stem", which if not set defaults to the total CPU time used)
</div>
<div class="Text_Normal">There is also an additional mechanism for specifying the
performance machines, which on SGE has to be used instead. The
config file setting 'performance_test_resource' allows you to
identify your performance machines via a grid engine resource,
for example to say &ldquo;test performance on all Opteron250
machines&rdquo;. This is generally easier than writing out a
long list of machines, and is compulsory with SGE for more than
one machine. With LSF, you can write out the machines as for the
default configuration if you want to. 
</div>
<div class="Text_Header">Batch Mode with a grid engine</div>
<div class="Text_Normal">The queuesystem configuration also provides an improvement to
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=measuring_system_resource_usage"; ?>">batch mode</A> functionality for
unattended runs. This basically involves adding a horizon when
all remaining tests are killed off and reported as unfinished.
This will be done if it receives the signal SIGUSR2 on UNIX.</div>

<div class="Text_Normal">Both grid engines can be set up to send this signal at a
particular time themselves, which involves submitting the
TextTest batch run itself to the grid engine. In LSF, use &ldquo;bsub
-t 8:00&rdquo; to send SIGUSR2 to the job at 8am the next
morning. In SGE, use &ldquo;qsub -notify&rdquo;, and then call
&ldquo;qdel&rdquo; for the job at the allotted time: this will
also cause the signal to be sent.</div>
<div class="Text_Header">CPULIMIT, RUNLIMIT, kill notification and configuring SGE</div>
<div class="Text_Normal">Both LSF and SGE have mechanisms to send signals to jobs when
they exceed a certain time limit. It is possible to configure
the queues such that they send SIGXCPU if more than a certain
amount of CPU time has been consumed, or SIGUSR1/SIGUSR2 if too
much wallclock time is consumed. 
</div>

<div class="Text_Normal">TextTest will assume this meaning for these signals and
report accordingly. SIGXCPU is always assumed to mean a CPU
limit has been reached. SIGUSR2 is interpret to mean a kill
notification in SGE and a maximum wallclock time in LSF, while
SIGUSR1 is used the other way round in the two grid engines.</div>
<div class="Text_Normal">TextTest will also install signal handlers
for these three signals to the SUT process, such that they will be ignored
unless the SUT decides otherwise. This is mostly to prevent unnecessary core
files from SIGXCPU and to allow TextTest to receive the signals itself and terminate 
the SUT when it's ready to.
</div>
<div class="Text_Normal">To configure SGE to play nicely with this, it's useful to set
a notify period of about 60 seconds when jobs are killed
(TextTest submits all jobs with the -notify flag). By default,
SIGUSR1 is also used to be a suspension notification in SGE,
which TextTest does not expect or handle. It's therefore
important to disable the NOTIFY_SUSP parameter in SGE if you
aren't going to get tests spuriously failing with RUNLIMIT
whenever they would be suspended:</div>
<div class="Text_Header"><A NAME="parallel_environment_name"></A><A NAME="queue_system_processes"></A>When the system
under test takes more than one CPU</div>
<div class="Text_Normal">Both grid engines have functionality for testing systems
which are themselves parallel, setting aside several CPUs for
the same test. TextTest integrates with this functionality also.</div>
<div class="Text_Normal">This is basically done via the config file setting
"queue_system_processes", which says how many CPUs will be needed
for each test under that point in the test suite. In LSF this
basically translates to the &ldquo;-n&rdquo; option to &ldquo;bsub&rdquo;.
In SGE, you need to use an SGE parallel environment (read the
SGE docs!), this is specified via the config file entry
&ldquo;parallel environment name&rdquo;,</div>

<div class="Text_Normal">The performance machine functionality described above still
works here. In this case TextTest will ask the queue system for
all machines that have been used, and only if they are all
performance machines will performance be compared.</div>
<div class="Text_Header"><A NAME="queue_system_core_file_location"></A>Avoiding race conditions on shared file systems</div>
<div class="Text_Normal">
Jobs in queue systems need to have some location as their current working directory, which is also where core files are written if
the job receives one of the signals above. To avoid race conditions TextTest will by default use the location 
"$TEXTTEST_TMP/grid_core_files" for this purpose, which after the first run will always exist.
</div>
<div class="Text_Normal">
If you generate TEXTTEST_TMP automatically, e.g. under a Maven target directory, you may find this won't work. In that case this
can be set to some other global location, using the config setting "queue_system_core_file_location". It is also probably a good idea
then to periodically clean this location. 
</div>
<div class="Text_Header"><A NAME="queue_system_proxy_executable"></A><A NAME="queue_system_proxy_resource"></A>Configuring a proxy process to run on a different machine (e.g. to set up a database)</div>
<div class="Text_Normal">
Sometimes certain hosts are reserved as database hosts, while many more may be used to run tests. In this case it is useful to set up a "proxy" which can perform the database setup and then start the real test process also via the grid. This is done by setting the "queue_system_proxy_executable" setting to point out the script which can perform this setup. The machines where it may run can be identified via resources, using "queue_system_proxy_resource", which works in the same way as "queue_system_resource".
</div>
<div class="Text_Normal">
This proxy program will be given the command to use to run the real test via the environment variable "TEXTTEST_SUBMIT_COMMAND_ARGS", which will be in Python list format. It is therefore obviously easiest to write your proxy in Python. The basic plan is to do whatever needs doing, set up the database and then start the test as instructed by TextTest. For example:
<?php codeSampleBegin() ?>
#!/usr/bin/env python

import os, subprocess

# Do whatever we need to do, setup database etc.
...

commandArgs = eval(os.getenv("TEXTTEST_SUBMIT_COMMAND_ARGS"))
subprocess.call(commandArgs)
<?php codeSampleEnd() ?>
 
</div>	
<div class="Text_Header"><A NAME="queue_system_environment"></A>Forwarding external environment variables to the slave process</div>
<div class="Text_Normal">
TextTest will make sure the program runs with the environment variables specified in your "environment files", but it does not forward environment variables
set externally by default. Sometimes it's useful to be able to set something externally and have TextTest forward it to your grid engine of choice.
In that case you can list such variables in "queue_system_environment", and TextTest will transfer whatever value they have in the master process's environment. i.e.
<?php codeSampleBegin() ?>
queue_system_environment:ENVVAR1
queue_system_environment:ENVVAR2
...
<?php codeSampleEnd() ?>
etc. This format is independent of which grid engine you are using, and is preferred to using queue_system_submit_args (see below)
</div>	
<div class="Text_Header"><A NAME="-xs"></A><A NAME="queue_system_submit_args"></A><A NAME="TEXTTEST_SLAVE_CMD"></A><A NAME="TEXTTEST_QS_POLL_WAIT"></A><A NAME="TEXTTEST_QS_POLL_SUBSEQUENT_WAIT"></A><A NAME="TEXTTEST_QS_POLL_INTERVAL"></A>Additional configuration for the slave process (such as forwarding external environment variables)</div>
<div class="Text_Normal">
From TextTest 3.23 enabling self-diagnostics also in the slave process requires using a separate flag "-xs" (alternatively a separate checkbox in the UI). It is no longer automatically inferred when self-diagnostics are requested with "-x". These diagnostics will then be written to subdirectories of the location where the master writes its logs, named after the slave job names.
</div>
<div class="Text_Normal">
You can provide additional arguments on the command line to the grid engine submission program ("qsub" in SGE or "bsub" in LSF) by specifying the variable "queue_system_submit_args" in your config file(s). For example, to forward an environment variable "ENVVAR" using SGE, you can use
<?php codeSampleBegin() ?>
queue_system_submit_args:-v ENVVAR
<?php codeSampleEnd() ?>
Note that since TextTest 3.27 the recommended way to do this is to use queue_system_environment, above.
</div>
<div class="Text_Normal">
You can configure the TextTest program that is run by the slave process via the environment variable "TEXTTEST_SLAVE_CMD", which defaults to just running "texttest.py". The main point of this is if you need a startup script to find the right version of Python on the remote machine, for example, or if you want to plug in developer tools like profilers and coverage analysers. It is also used internally in the TextTest HTML reports to provide a correct command-line suggestion for starting TextTest.</div>
<div class="Text_Normal">
You can also configure the amount of time to wait before the polling of the grid engine (described above) starts, via the variable TEXTTEST_QS_POLL_WAIT. By default it waits 5 seconds before starting. The intervals between polls is controlled by the variable TEXTTEST_QS_POLL_SUBSEQUENT_WAIT, which defaults to 15 seconds currently. The granularity (how frequently to check for completion and/or exiting while waiting) can be configured by TEXTTEST_QS_POLL_INTERVAL, which defaults to 0.5 seconds. These options are mostly useful when testing and debugging.
</div>
