<div class="Text_Main_Header">Running TextTest Unattended</div>
<div class="Text_Description"> A Guide to Batch Mode</div>

<div class="Text_Normal"><BR>
</div>

<div class="Text_Header"><A NAME="-b"></A>Introduction</div>
<div class="Text_Normal">It can be very useful to have TextTest run lots of longer
tests (say) overnight and provide the results in an email or
HTML report rather than have one of the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=guide_to_texttest_ui"; ?>">interactive
user interfaces</A> present. That is the purpose of &ldquo;batch
mode&rdquo;. To select batch mode, provide the command line
option &ldquo;-b &lt;batch_session&gt;&rdquo; or fill in the
&ldquo;Run Batch Mode Session&rdquo; tab under &ldquo;How to
Run&rdquo; in the static GUI. In general, you will probably want
to start such batch runs via a script, for example using crontab
on UNIX.</div>

<div class="Text_Normal">The batch mode &ldquo;session&rdquo; is simply an identifier
that defines a particular sort of batch run. Most of the batch
mode configuration can be defined per session. Any identifier at
all can be provided, and if no configuration is recognised for
that session name default settings will be used. All of the
batch mode config file settings that start with &ldquo;batch_&rdquo;
(described below) are &ldquo;composite dictionary entries&rdquo;
with the batch session names as keys, it is recommended to read
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=about_testsuites"; ?>#Appendix - TextTest file formats">file
format documentation</A> for what this means.</div>

<div class="Text_Header"><A NAME="-name"></A><A NAME="batch_recipients"></A><A NAME="batch_mail_on_failure_only"></A><A NAME="batch_sender"></A><A NAME="smtp_server"></A><A NAME="max_width_text_difference"></A><A NAME="full_name"></A>
The email report and where it is sent</div>
<div class="Text_Normal">TextTest batch mode generates an email report. For a
multiple-developer project it is often useful to direct such
reports to a newsgroup, providing everyone the chance to see at
a glance what works and what doesn't. This will then generally
look something like this (example newsgroup viewed in mozilla):</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/batch.JPG" NAME="Graphic1" ALIGN=RIGHT BORDER=0><BR CLEAR=RIGHT><BR><BR>
</div>
<div class="Text_Normal">As you see from this example, the title of the mail consists
of the date and a summary of what tests were run and what
happened to them (for the application &ldquo;Tail&rdquo;, in
this case). If the -name option is provided to the run on the
command line, that name is used to define the run instead of the
date. (In general, use -name to test actual named releases, and
the default date-functionality with nightjobs) 
</div>

<div class="Text_Normal">The body of the mail contains two further sections, one which
summarises exactly which tests failed and a further section
which endeavours to give some details as to why they failed.
These sections can be explored or ignored depending on how
involved the reader is in the project. Managers will generally
only need to look at the subject lines...</div>
<div class="Text_Normal">The name of the application, as provided here, can be
configured via the config file entry &ldquo;full_name&rdquo;. By
default a capitalised version of the file extension used for the
application will be used here, but this doesn't always look so
nice in reports.</div>
<div class="Text_Normal">The &ldquo;details&rdquo; section consists of the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=dynamic_gui"; ?>#diff_program">textual
previews as generated by the dynamic GUI's &ldquo;text info&rdquo;
tab</A> when a test fails. It can be configured in the same way.
In addition, it can be useful to configure the maximum width of
lines allowed: some newsgroups have maximum line length limits
and you don't want test reports bouncing. This can be done via
the config file entry &ldquo;max_width_text_difference&rdquo;.</div>
<div class="Text_Normal">You can also configured it so that mail is only sent
if at least one test fails, set the config file entry &ldquo;batch_mail_on_failure_only&rdquo;
to "true". By default mail will always be sent irrespective of what happens.
</div>
<div class="Text_Normal">Where the mail is sent to is controlled by the config file
entry &ldquo;batch_recipients&rdquo;. This can be configured per
batch session, and may be a comma-separated list for multiple
recipients. The sender address can be controlled by the
&ldquo;batch_sender&rdquo; config file entry, while the SMTP
server to use for sending mail can also be configured via
&ldquo;smtp_server&rdquo;.</div>
<div class="Text_Normal">All of these will need to be configured on Windows as no
defaults are provided. On UNIX, the SMTP server defaults to
&ldquo;localhost&rdquo; and both sender and recipient addresses
default to &ldquo;$USER@localhost&rdquo;, so it is generally
only necessary to configure the recipients.</div>

<div class="Text_Header"><A NAME="batch_result_repository"></A><A NAME="historical_report_location"></A><A NAME="historical_report_page_name"></A><A NAME="testoverview_colours"></A><A NAME="batch.ArchiveRepository"></A>
Generating HTML reports</div>
<div class="Text_Normal">For more flexibility in viewing and analysing a lot of
results, as well as being able to easily monitor the behaviour
of particular tests over time, it can be very useful to store
the batch results in a repository and generate HTML reports from
them. In order to store the information from the batch runs, the
config file entry &ldquo;batch_result_repository&rdquo; should
be set to a directory under which batch results can be stored.
Results are then stored per test and day and are never
overwritten: to recreate results for a particular day it is
necessary to explicitly remove the previous ones, either
manually or via the archiving script described below.</div>
<div class="Text_Normal">For the location of the actual reports, set the config file
entry &ldquo;historical_report_location&rdquo; to another
directory. Both of these are composite dictionaries as described
above so both can be varied per batch session. In order to
actually generate the report, run with the -coll flag (see below)
which will rebuild all the reports from scratch based on what is in the repository. 
</div>
<div class="Text_Normal">
By default, each application will be shown on a separate page named after that application.
Sometimes though it can be useful to have several applications on the same page, especially
if they don't have so many tests each. In this case you can set the config file entry 
"historical_report_page_name": the name given will be used as the title of the HTML report 
and all applications with the same value will appear on the same page. 
</div>
<div class="Text_Normal">The easiest way to get a handle on what this looks like is to
look at this <A class="Text_Link" target="_blank" href="include/documentation/<?php echo $version; ?>/htmlreport_example/test_batch.html">example</A>,
which is generated by TextTest's tests for itself. Each day's
results correspond to a column, while each test has a row. The
results can be explored by clicking around.</div>
<div class="Text_Normal">The colours in the site are also configurable: use the config
file dictionary setting &ldquo;testoverview_colours&rdquo;. To
see how to set this, look at the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default";?>">config
file table</A> and pattern match on the default value.</div>
<div class="Text_Normal">After a while, very old test results in the repository cease
to be interesting and can safely be archived. This is done via
the script batch.ArchiveRepository, with arguments 'after' and
'before' for the time period to archive (and 'session' for the
batch session to do it on, defaults to all known sessions). The
dates should be in the same format as the dates on the pages,
e.g. 21Jan2005.</div>
<div class="Text_Header"><A NAME="batch_timelimit"></A><A NAME="batch_filter_file"></A><A NAME="batch_use_version_filtering"></A><A NAME="batch_version"></A><A NAME="batch_extra_version"></A><A NAME="-bx"></A>

Configuring what tests are run by batch mode sessions</div>
<div class="Text_Normal">The config file entry &ldquo;batch_timelimit&rdquo;, if
present, will run only tests which are expected to take up to
that amount of time (in minutes). This is of course only useful
if <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=measuring_system_resource_usage"; ?>">performance testing is enabled for
CPU time</A>.</div>
<div class="Text_Normal">More generically, you can use the &ldquo;batch_filter_file&rdquo;
entry to identify <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=static_gui"; ?>#-f">filter files</A>

to be associated with a particular batch run. These can either
contain a list of tests or search criteria to apply and can be
edited using the static GUI. In this context it can be useful to
note that such filter files can contain application and
version-specific suffices in case similar criteria imply
different tests for different applications: this allows the same
entry for batch_filter_file to indicate different tests for
different applications and versions.
</div>
<div class="Text_Normal">
If certain versions should be run automatically as part of a batch
mode run without needing to explicitly specify them on the command line,
the entry &ldquo;batch_extra_version&rdquo; can be used for this purpose. This
is a more specialised version of <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=versions_and_version_control"; ?>#extra_version">the &ldquo;extra_version&rdquo; setting</A>. For the purposes
of configuring which tests should be included in such versions it is also
possible to start the GUI with these versions present, use the command line
option "-bx &lt;batch session name&gt;" to achieve this.
</div>
<div class="Text_Normal">If the entry &ldquo;batch_use_version_filtering&rdquo; is set
to &ldquo;true&rdquo;, all versions are assumed to be disabled
unless explicitly enabled by being included in the
&ldquo;batch_version&rdquo; list setting. The point of this is
in the presence of multiple test applications and multiple
releases of the system: a single run of TextTest can be started
with a particular version identifier and each application can
decide in its config file if it wants to run tests for that
version of the system. This is generally easier than trying to
set up separate nightjob runs for each application. 
</div>
<div class="Text_Normal">Both of these things act in concert with any <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=static_gui"; ?>#-t">test
selection filters</A> selected on the command line or from the
static GUI. As described there, only tests which satisfy <b>all</b>

filters present will be selected.</div>
<div class="Text_Header"><A NAME="batch_use_collection"></A><A NAME="batch_collect_compulsory_version"></A><A NAME="batch_collect_max_age_days"></A><A NAME="batch.CollectFiles"></A><A NAME="-coll"></A>
Collecting multiple emails into a single one</div>
<div class="Text_Normal">When many versions of the system under test are active, and
many different hardware platforms are used, you may want to test
the system on all of these combinations. This can lead to a
great many test runs and consequently a lot of emails. It is
often easier to read these if they are collected into a single
larger email: otherwise it is hard to get an overview of what is
happening. 
</div>
<div class="Text_Normal">To do this, set the config entry &ldquo;batch_use_collection&rdquo;
to &quot;true&quot; for the batch session in question. This will
ignore the email-sending settings and send the batch report to
an intermediate file. When all tests have been run in this way,
run the collection script by providing the "-coll" argument on the command
line. This will also build the HTML report described above, if that
is enabled. To build only the email report or only the HTML report,
you can also run with "-coll mail" or "-coll web" respectively. (The older
plugin script "batch.CollectFiles" will still work but is now deprecated)
</div>
<div class="Text_Normal">
TextTest will then search for all such intermediate files
and amalgamate them into a single mail per application. If a
version is provided to this script via -v &lt;version&gt;, only
runs which ran with that version identifier will be collected.
This applies to the HTML report as well.</div>
<div class="Text_Normal">
By default this collection procedure will find all batch runs that have currently 
stored their results under the root temporary directory. There are two ways in
which this can be configured to handle errors in the processes that are supposed to
create these runs. </div>
<div class="Text_Normal">
For a start, you can set the config entry "batch_collect_max_age_days"
which will ensure that no batch run older than the given number of days will be picked up
and reported. This is useful in case the expected batch run has not been run for some reason,
otherwise the results of the previous run may be picked up and lead to confusion.
</div>
<div class="Text_Normal">
Also, you can tell it what it should expect to find. By providing the entry "batch_collect_compulsory_version"
(which is a list), you can tell it to report an error if a batch run for a certain version was not found, thus making
it clearer if something has not run when it was supposed to. Both these settings are keyed on
batch session names as described above.
</div>
<div class="Text_Header">Example config file</div>
<div class="Text_Normal"><img src="<?php print $basePath; ?>images/batchconfig.JPG" NAME="Graphic3" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT><BR>
</div>
<div class="Text_Normal">This config file configures TextTest so that:</div>
<UL>
	<div class="Text_Normal"><li>&ldquo;-b local&rdquo; will send email to the sender
	directly</div>

	<div class="Text_Normal"><li>&ldquo;-b nightjob&rdquo; will run all tests that take
	up to 180 minutes (3 hours). It will only accept the version
	identifiers &ldquo;11&rdquo;, &ldquo;12&rdquo; and &ldquo;linux&rdquo;
	(if we also set &ldquo;batch_use_version_filtering&rdquo; to
	true, which we didn't here...) It will write its results to an
	intermediate collection file, where they can be collected
	later.</div>

	<div class="Text_Normal"><li>&ldquo;-b wkendjob&rdquo; will run all the tests that
	there are. It will also accept the version identifiers &ldquo;sparc&rdquo;
	and &ldquo;powerpc&rdquo; (evidently we want to test on more
	flavours of UNIX at the weekends!). It will use collection in a
	similar way to the &ldquo;nightjob&rdquo; session.</div>
	<div class="Text_Normal"><li>All of these will write their results under the location
	/some/central/directory, provided no previous results have been
	calculated that day. When the collection is run, the files from
	the 'nightjob' or 'wkendjob' sessions will be amalgamated and
	mailed to the carmen.test_newsgroup mail address. The website
	at /our/documents/html/testreports will also be regenerated
	from scratch from the repository described above.</div>

</UL>
<div class="Text_Header"><A NAME="-reconnect"></A><A NAME="-reconnfull"></A>Reconnecting
the User Interfaces to batch results</div>
<div class="Text_Normal">Batch mode's email report is all very well, but alone it
doesn't give you the power of the GUI to view results in detail
or to save them if that would be appropriate. It can be very
useful to &ldquo;reconnect&rdquo; the GUI as if a batch run had
been run using it. To do this, select &ldquo;Reconnect&rdquo;
from the Actions menu in the Static GUI, which will bring up a 
dialog where you can browse your file system to find the files 
for the run (or provide the &ldquo;-reconnect &lt;directory&gt;&rdquo; 
option on the command line to the dynamic GUI or console interface). 
</div>
<div class="Text_Normal">There are essentially two ways to select previous runs. Either
you explicitly select the run directory (it will be called something like "hello.version.13Aug171624.9856"),
or you leave the parent directory selected and provide a version filter in the &ldquo;Version to Reconnect to&rdquo;
 field. This last possibility will then load in all runs that were run with that version identifier,
or some more specific version identifier: i.e. if you provide "foo" it will load runs for "foo.bar" and "foo.blah"
also if they exist. Not selecting either will load in every previous run that has left files in the relevant temporary
space.
</div>
<div class="Text_Normal">There is a switch at the bottom which allows you to choose
between a quick re-display of what was displayed in the original
batch email report, and an option to recalculate the results
from the raw files. If for any reason the quick re-display isn't
possible, it may trigger a recomputation anyway.</div>
<div class="Text_Normal">The recomputation, whether explicitly requested (-reconnfull
on the command line has the same effect) or auto-triggered, will
take the raw output of the run reconnected to and reapply the
text filtering mechanisms to it, and also re-evaluate any
<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=automatic_failure_interpretation"; ?>">automatic failure interpretation</A>
that could be triggered. This is useful if you have updated your
config file filters in the meantime and want to see if they are
applied correctly. It is, of course, a good deal slower than
simply re-reporting what was present before, as occurs by
default. 
</div>
