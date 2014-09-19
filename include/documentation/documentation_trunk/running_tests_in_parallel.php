<div class="Text_Main_Header">Running tests in parallel</div>
<div class="Text_Description">  The &ldquo;queuesystem&rdquo;
configuration</div>
<div class="Text_Header"><A NAME="-l"></A><A NAME="queue_system_max_capacity"></A>On a single machine - making use of multiple cores</div>
<div class="Text_Normal">If you run TextTest on a multicore machine, it will run as many tests in parallel as you have cores on the machine.
In terms of the configuration this means that the "queuesystem" configuration module is automatically enabled. You can also run tests sequentially,
using the "Run tests sequentially" checkbox on the static GUI's running tab, or the "-l" flag on the command line. 
</div>
<div class="Text_Normal">
To disable this configuration and hence always run one test at a time, you can set
<?php codeSampleBegin() ?>
config_module:default
<?php codeSampleEnd() ?>
in your config file. To steer how many tests will be run simultaneously, you can set "queue_system_max_capacity" in your config file also.
</div>
<div class="Text_Normal">As soon as each test finishes, the test will go green or red,
and results will be presented. Unlike the default configuration,
the tests will not naturally finish in order. 
</div>
<div class="Text_Header">Multiple machines - Grid Engines and Virtual Private Clouds</div>
<div class="Text_Normal">When you have more than one machine at your disposal for
testing purposes, it is very beneficial to be able to utilise
all of them from the same test run. This greatly speeds up testing,
naturally, and means far more tests (or longer tests) can be run
with somebody waiting on the results. 
</div>
<div class="Text_Normal">
There are two basic setups here. The older "Grid Engine" setup presumes access to testing resources within your network, a shared file system
on that network using something like NFS, and "Grid Engine" software installed and configured on it. The "cloud" setup (new in TextTest 3.27) 
presumes an account with a cloud provider (Amazon), and also a Virtual Private Cloud setup, so that the instances in the cloud can see your
network also and can hence push results there when needed. 
</div>
<div class="Text_Header"><A NAME="queue_system_module"></A>Using a Grid Engine</div>
<div class="Text_Normal">Three implementations of this are provided, though it is fairly straightforward to implement new ones if needed.
The first is for the free open source grid engine <A class="Text_Link" href="http://gridengine.org/blog/2011/11/23/what-now/">SGE
</A>. Note that since Oracle bought Sun there are various descendants of the original SGE available, some Open Source,
some with commercial support. See the "SGE" link above for more details. The next is IBM's 
<A class="Text_Link" href="http://www-03.ibm.com/systems/platformcomputing/products/lsf">LSF</A>
(which is in theory more Windows-friendly, but costs money). Finally there is support for <A class="Text_Link" href="http://research.cs.wisc.edu/htcondor">HTCondor</A>, 
although this should be regarded as somewhat experimental. You choose between these by
setting the config file entry &ldquo;queue_system_module&rdquo;
to "SGE", "LSF", or "condor".</div>
<div class="Text_Normal">
Acquiring machines and setting up NFS and the grid engine may be quite a large task though, and unless they already exist in your network it's probably
a good idea to look into using a cloud instead. This will spread the cost out more, and also make it easier to adjust usage up and down over time.
</div>
<div class="Text_Header">Using a (Virtual Private) Cloud</div>
<div class="Text_Normal">
Right now there is only support for <A class="Text_Link" href="http://aws.amazon.com/ec2">Amazon's EC2 cloud</A>. This can be selected by setting "queue_system_module" to "ec2cloud". 
It relies on the Python library <A class="Text_Link" href="http://boto.readthedocs.org/en/latest">boto</A>, which you will need to install, for example via "easy_install boto". 
As stated above you will also need a setup where the EC2 instances can access your own machines, which implies setting up a Virtual Private Cloud.
</div>
<div class="Text_Normal">
It expects you to have set up the instances you wish to use outside of TextTest. These instances should have TextTest installed (just run 'sudo easy_install texttest'
on them) and obviously any packages that your system under test will require. Also, TextTest does not maintain any mapping of paths between your system
and the EC2 instances, it assumes they will always be the same. Therefore you'll need to make sure that everywhere you use on your system, equivalent
locations are writeable by the "ec2-user" user on your instances. It's probably best to have some kind of "instance launching" script that can ensure this.
</div>
<div class="Text_Normal">
TextTest will start any instances that are stopped, if necessary, but it will not stop them again when it is finished. The reason is that EC2 charges every time an instance
is stopped and started, and test usage often entails running tests several times in a row. It's therefore fairly essential to configure up a 
<A class="Text_Link" HREF="http://aws.amazon.com/cloudwatch">CloudWatch</A> alarm for each of your instances, that will stop them if they have been idle for a while. 
Here's some sample code that will set up such an alarm, that will stop after 2 hours where CPU utilization
has been under a certain threshold (here 5% divided by the number of cores).

<?php codeSampleBegin() ?>
def addAlarm(instId, cores, regionName):
    cwConn = boto.ec2.cloudwatch.connect_to_region(regionName)
    threshold = 5.0 / cores
    action = 'arn:aws:automate:' + regionName + ':ec2:stop'
    alarm = boto.ec2.cloudwatch.alarm.MetricAlarm(name="stop-" + instId, 
                                                  metric="CPUUtilization", 
                                                  namespace="AWS/EC2",
                                                  statistic="Maximum", 
                                                  comparison="<", threshold=threshold, 
                                                  period=60, evaluation_periods=120, 
                                                  dimensions={"InstanceId" : instId},
                                                  alarm_actions=[action])
    cwConn.put_metric_alarm(alarm)

<?php codeSampleEnd() ?>

While TextTest is using the instances, it will add a "TextTest user" tag to them to provide a primitive kind of locking and stop others using them.
It will also disable all Cloudwatch alarms, to prevent Cloudwatch from closing down an instance when it's in use. When tests are finished,
it removes these tags and re-enables the alarms.

</div>
<div class="Text_Normal">
TextTest currently assumes all your EC2 instances are in the default region, and that your AWS credentials are available. These can be configured via
boto's configuration files, either in ~/.boto or in /etc/boto.cfg. They should contain something like:

<?php codeSampleBegin() ?>
[Credentials]
aws_access_key_id = ABCSDSBFDFDBFDFBF
aws_secret_access_key = sdgsdDda87/sdgsd76r7sdgdJSAH/SGSDjds7

[Boto]
ec2_region_name = eu-west-1
cloudwatch_region_endpoint = monitoring.eu-west-1.amazonaws.com
ec2_region_endpoint = ec2.eu-west-1.amazonaws.com
cloudwatch_region_name = eu-west-1
<?php codeSampleEnd() ?>
 
It will make use of the "remote_shell_program" setting (default "ssh") to log in to the EC2 instances. This obviously needs to be possible without typing
in a password every time: it is suggested that you make use of an ssh-agent. To test if TextTest will be able to work correctly, set up your ssh-agent and then 
log in with

<?php codeSampleBegin() ?>
my_machine$ ssh -A ec2-user@&lt;ip&gt;
ec2-user@&lt;ip&gt;$ ssh my_machine
<?php codeSampleEnd() ?>

i.e. it must be possible to log in and to then log in in reverse, each time without a password of course.
</div>
<div class="Text_Normal">
It will also make use of the "remote_copy_program" setting (default "rsync") in order to synchronise files back and forth between the master machine and the
EC2 instance. Where possible, test runs will push their own results back to the master rather than waiting for the master to pull them.
</div>
<div class="Text_Normal">
By default it will make use of any instances it can find in the default region. You will usually need to restrict this somehow. This is done by adding
appropriate EC2 tags to the instances, which are then requested via "queue_system_resource" (see below).
</div>
<div class="Text_Header"><A NAME="queue_system_min_test_count"></A>General usage patterns</div>
<div class="Text_Normal">In both of these cases, it will by default submit all tests to the grid engine/cloud. This can
be overridden by using the "Use Grid" (or "Use Cloud") radio buttons on the static GUI's running tab. </div>
<div class="Text_Normal">
By default there are just two options, "Always" and "Never". As there is usually a small time penalty for using the grid or the cloud,
it can however be useful to configure it to only submit when more than a handful of tests are requested. To do this, you can e.g. set

<?php codeSampleBegin() ?>
queue_system_min_test_count:3
<?php codeSampleEnd() ?>

In this case there would be a third radio button option , "If enough tests", which is selected by default. The behaviour is then
to run locally if only one or two tests are requested. The "-l" option on the command line
also works here, and can also take a numerical argument, where "-l 0" corresponds to "Always", "-l 1" to "Never" and "-l 2" to "If enough tests".
</div>
<div class="Text_Normal">
Here is a sample
screenshot, from an old version of TextTest using SGE:</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/parallel.png" NAME="Graphic1" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>Some
tests have finished and gone green, but others are still running
and hence yellow. TextTest reports their state in the grid
engine (&ldquo;RUN&rdquo;) followed by the machine each is
running on in brackets. 
</div><div class="Text_Normal">
Internally, TextTest submits <I>itself</I> to the grid engine and runs a slave process
remotely, which runs the test in question and communicates the
result back to the master process via a socket. The master process
will also poll the grid engine periodically (every 15 seconds) to find out what 
is happening to its tests, to be able to e.g. pick up internal grid engine states like
suspension and also to be able to report if a job dies without reporting in (for
example because of hardware problems or because Python cannot be found remotely, or because you forgot to install TextTest on your cloud instance!)
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
<div class="Text_Header"><A NAME="-R"></A><A NAME="queue_system_resource"></A>Resources</div>
<div class="Text_Normal"><I>Resources </I>are used to specify properties of machines
where you wish your job to run. For example, you might want to
request a machine running a particular flavour of linux, or you
might want a machine with at least 2GB of memory. Such requests
are implemented by resources in the grid engines (see their documentation for how SGE and LSF
understand resources), and by tags in the cloud. TextTest refers to them internally as resources</div>

<div class="Text_Normal">TextTest must choose which
resources to request on the command line. The procedure here is
to request <U>all</U> of the resources as specified below:</div>
<OL>
	<div class="Text_Normal"><li>The value of the option
	"Request grid resource" on the Running/Advanced tab, if it has been filled
	in (-R on the command line)</div>
	<div class="Text_Normal"><li>The value of the config file setting
        "queue_system_resource", if it has been set.</div>
	<div class="Text_Normal"><li>All resources as generated by
	the performance_test_resource functionality, if enabled (see
	below).</div>

</OL>
<div class="Text_Normal">
The format in all cases is e.g. "os=RHEL6", the resource name followed by "=" followed by the value. Wildcard expansion
(modelled on UNIX pathname expansion) is also supported in each case. 
</div>
<div class="Text_Header">Throughput and capacity</div>
<div class="Text_Normal">When tests complete, TextTest will keep the remote test process
alive and try to reuse it for a test with compatible resource requirements. This bypasses
the time needed to submit tests to the queue system and wait for them to be scheduled,
and reduces network traffic. This can improve throughput considerably, particularly where 
a large number of short tests need to be run.
</div><div class="Text_Normal">By default, until all tests have been dispatched, TextTest
will reuse remote jobs in this way, but will also continually submit new jobs at the same time, until
it reaches what it regards as the capacity, given by the config file entry "queue_system_max_capacity".
In a grid engine it's advisable to set this slightly higher than the maximum number of parallel 
processes you can reasonably expect from your grid. With a cloud it is a way of regulating cost,
so that you don't use more instances than you are prepared to pay for. (Often you get diminishing returns
from adding more and more instances to your parallel testing).
</div>

<div class="Text_Header"><A NAME="default_queue"></A><A NAME="-q"></A>Grid Engine Queues</div>
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
	grid queue&rdquo; has been filled in (-q on the command
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
<div class="Text_Header"><A NAME="-keepslave"></A>Cleaning of temporary files</div>
<div class="Text_Normal">As the queuesystem configuration is often used for very
large test suites, it will start to try and clean up temporary
files before the GUI is closed. Otherwise closing the GUI can appear to take a very
long time. 
</div>
<div class="Text_Normal">
When using the cloud, test results will be pushed to the master process as soon as they are
available, and will then be deleted on the EC2 instance. Succeeded tests will by default not be
transferred at all. The only way to override this is to use the -keeptmp flag.
</div>
<div class="Text_Normal">
The default behaviour with a grid engine is to remove all test data and files belonging to
successful tests remotely, i.e. as soon as they complete. This can be overridden by
providing the &quot;-keepslave&quot; option on the command line, or the equivalent
switch from the Running/Advanced tab in the static GUI, in case you want to examine
the filtering of a succesful test for example.
</div>
<div class="Text_Header"><A NAME="performance_test_resource"></A><A NAME="min_time_for_performance_force"></A><A NAME="-perf"></A>
Collecting system resource usage when running in parallel</div>
<div class="Text_Normal">The queuesystem configuration also provides some improvements
in <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=measuring_system_resource_usage"; ?>">default configuration's
functionality for comparing system resource usage</A> in tests.
This is essentially in the area of the concept of a 
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=measuring_system_resource_usage"; ?>#performance_test_machine">performance test machine</A>. 
In the default configuration, tests are run
locally, so all we can do is see if our current machine is
enabled for performance testing. With a grid engine or a cloud at our
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
performance machines, which with SGE or the cloud has to be used instead. The
config file setting 'performance_test_resource' allows you to
identify your performance machines via a <i>resource</i> (see above),
for example to say "test performance on all c3.2xlarge instances" in the cloud. This is generally easier than writing out a
long list of machines, and is compulsory with SGE or EC2. With LSF, you can write out the machines as for the
default configuration if you want to. 
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
<div class="Text_Header"><A NAME="-xs"></A><A NAME="queue_system_submit_args"></A><A NAME="TEXTTEST_SLAVE_CMD"></A><A NAME="TEXTTEST_QS_POLL_WAIT"></A><A NAME="TEXTTEST_QS_POLL_SUBSEQUENT_WAIT"></A><A NAME="TEXTTEST_QS_POLL_INTERVAL"></A>Additional configuration for the slave process</div>
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
You can also configure the amount of time to wait before the polling of the grid engine (described above) starts, via the variable TEXTTEST_QS_POLL_WAIT. By default it waits 5 seconds before starting. The interval between polls is controlled by the variable TEXTTEST_QS_POLL_SUBSEQUENT_WAIT, which defaults to 15 seconds currently. The granularity (how frequently to check for completion and/or exiting while waiting) can be configured by TEXTTEST_QS_POLL_INTERVAL, which defaults to 0.5 seconds. These options are mostly useful when testing and debugging.
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

<div class="Text_Header"><A NAME="queue_system_core_file_location"></A>Avoiding race conditions with grid engines on shared file systems</div>
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

<div class="Text_Header"><A NAME="parallel_environment_name"></A><A NAME="queue_system_processes"></A>Using a grid engine when the system under test
needs more than one CPU</div>
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

<div class="Text_Header"><A NAME="queue_system_proxy_executable"></A><A NAME="queue_system_proxy_resource"></A>Configuring a proxy process to run on a different grid engine
(e.g. to set up a database)</div>
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
