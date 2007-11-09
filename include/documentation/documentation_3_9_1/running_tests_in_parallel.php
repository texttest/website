<div class="Text_Main_Header">Running
tests in parallel on a grid</div>
<div class="Text_Description">  The &ldquo;queuesystem&rdquo;
configuration</div>

<div class="Text_Normal"><BR>
</div>
				
				
<div class="Text_Header"><A NAME="queue_system_module"></A><A NAME="-l"></A>Introduction</div>

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
engine, which is basically a Python API. Two implementations of
this are provided, for the free open source grid engine <A class="Text_Link" href="http://gridengine.sunsource.net/">SGE
</A>(which sadly doesn't work on Windows) and Platform
Computing's <A class="Text_Link" href="http://www.platform.com/Products/Platform.LSF.Family/Platform.LSF/">LSF</A>

(which does, but costs money). You choose between these by
setting the config file entry &ldquo;queue_system_module&rdquo;
to &ldquo;SGE&rdquo; or &ldquo;LSF&rdquo;: it defaults to &ldquo;SGE&rdquo;.</div>
<div class="Text_Normal">By default, it will submit all tests to the grid engine. It
is still possible to run tests locally as with the default
configuration, you need to select the option &ldquo;Run Tests
Locally&rdquo; (-l on the command line). Internally, TextTest in
fact submits itself to the grid engine and runs a slave process
remotely, which runs the test in question and communicates the
result back to the master process via a socket.</div>

<div class="Text_Normal">As soon as each test finishes, the test will go green or red,
and results will be presented. Unlike the default configuration,
the tests will not naturally finish in order. Here is a sample
screenshot, using SGE:</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/parallel.JPG" NAME="Graphic1" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>Some
tests have finished and gone green, but others are still running
and hence yellow. TextTest reports their state in the grid
engine (&ldquo;RUN&rdquo;) followed by the machine each is
running on in brackets. 
</div>
<div class="Text_Header">Tables for the queuesystem module</div>
<div class="Text_Normal">As this functionality works with a different configuration
module, additional config file entries, running options and
support scripts are available, over and above those provided by
default: 
</div>
<UL>
	<div class="Text_Normal"><li><A class="Text_Link" href="<?php print "index.php?page=".$version."&n=option";?>">Full list of options when
	submitting test runs</A></div>

	<div class="Text_Normal"><li><A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile";?>">Full list of possible entries
	for config files</A></div>
	<div class="Text_Normal"><li><A class="Text_Link" href="<?php print "index.php?page=".$version."&n=scripts";?>">Full list of plugin scripts (for
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
<div class="Text_Normal">It is often useful to <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=writing_a_own_configmodule";?>">write a
derived configuration</A> to modify this logic, for example to
introduce some mechanism to select queues based on expected time
taken.</div>
<div class="Text_Header"><A NAME="-R"></A>Resources</div>
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
	<div class="Text_Normal"><li>The value of the environment
	variable QUEUE_SYSTEM_RESOURCE, if it has been set in an
	environment file.</div>
	<div class="Text_Normal"><li>All resources as generated by
	the performance_test_resource functionality, if enabled (see
	below).</div>

</OL>
<div class="Text_Header"><A NAME="login_shell"></A>Multi-platform testing and
environment transfer (UNIX)</div>
<div class="Text_Normal">TextTest will transfer the environment it has read from its
environment files to the slave processes it starts. This can
cause a problem if the remote machine is running on a different
platform. In this case it is necessary to ensure a full correct
login remotely. It has been found useful to support the start of
a subshell remotely to make this happen: correct logins are
often ensured in shell start-up scripts.</div>
<div class="Text_Normal">To this end, the &ldquo;login_shell&rdquo; entry is provided.
This defaults to &ldquo;sh&rdquo; (Bourne Shell) but can be
configured to be whichever shell startup contains your
configuration.</div>

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

<div class="Text_Normal">It is also possible to say (for CPU time testing only) that
once tests take a certain amount of time they should always be
run on performance machines only (it is assumed that the
performance of the longest tests is generally the most
interesting.) This can be done via the setting
min_time_for_performance_force.</div>
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
<div class="Text_Normal">To configure SGE to play nicely with this, it's useful to set
a notify period of about 60 seconds when jobs are killed
(TextTest submits all jobs with the -notify flag). By default,
SIGUSR1 is also used to be a suspension notification in SGE,
which TextTest does not expect or handle. It's therefore
important to disable the NOTIFY_SUSP parameter in SGE if you
aren't going to get tests spuriously failing with RUNLIMIT
whenever they would be suspended:</div>
<div class="Text_Header"><A NAME="parallel_environment_name"></A>When the system
under test takes more than one CPU</div>
<div class="Text_Normal">Both grid engines have functionality for testing systems
which are themselves parallel, setting aside several CPUs for
the same test. TextTest integrates with this functionality also.</div>
<div class="Text_Normal">This is basically done via the environment variable
QUEUE_SYSTEM_PROCESSES, which says how many CPUs will be needed
for each test under that point in the test suite. In LSF this
basically translates to the &ldquo;-n&rdquo; option to &ldquo;bsub&rdquo;.
In SGE, you need to use an SGE parallel environment (read the
SGE docs!), this is specified via the config file entry
&ldquo;parallel environment name&rdquo;,</div>

<div class="Text_Normal">The performance machine functionality described above still
works here. In this case TextTest will ask the queue system for
all machines that have been used, and only if they are all
performance machines will performance be compared.</div>
				