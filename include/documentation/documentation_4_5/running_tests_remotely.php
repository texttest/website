<div class="Text_Main_Header">Running tests on a remote machine</div>
<div class="Text_Description">(Without the aid of a grid engine)</div>				
<div class="Text_Normal">
<B><U>Note</U></B> : On Windows, this functionality currently assumes you run Cygwin. It does not currently work "natively" on Windows : although much of the discussion below applies in theory, the remotely generated script assumes Bourne-shell like syntax.
</div>
<div class="Text_Header"><A NAME="-m"></A><A NAME="default_machine"></A><A NAME="remote_shell_program"></A><A NAME="remote_program_options"></A>Basic set-up</div>
<div class="Text_Normal">
On the Running/Basic tab in the static GUI, there is an entry "Run on machine".
This can be used to divert tests to run on other machines on the network
than the local one. This can also be done from the command line via the "-m"
option. By default this assumes that the remote machine and the local machine are
on a shared file system of some sort.</div>
<div class="Text_Normal">
Sometimes your tests may only work correctly on particular machines, and in
this case it's useful to set the default machine to one of these so that you
don't have to remember to enter it each time. For this there is a config file
setting "default_machine".
</div>
<div class="Text_Normal">
Tests will be submitted to the machine via "rsh", unless you override the
config file setting "remote_shell_program", for example to "ssh" or "plink".
TextTest makes every effort to provide default arguments to these programs
that are sensible for batch testing: i.e. will fail rather than ask for passwords etc.
To this end there is a dictionary config file setting "remote_program_options",
which sets such values for typical remote shell programs. You shouldn't need to change
this under normal circumstances unless you use a remote shell program we haven't used.
Look at <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default"; ?>">
the table of config file values</A> to see which arguments will be provided by default.
</div>
<div class="Text_Normal">
It's worth noting that rather more advanced, and parallel, usage can be made of remote machines
if a grid engine program is also installed. See <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=running_tests_in_parallel"; ?>">the document on running tests in parallel</A>. If you do have a grid engine
installed and also provide the "Run on machine" setting (or "-m" on the command line), this
will be automatically translated into a grid engine resource so that the test runs there
by way of the grid engine.
</div>
<div class="Text_Header"><A NAME="remote_copy_program"></A>Running on a different network</div>
<div class="Text_Normal">
There is also support for running tests on systems even where the file system is not shared.
This will of course be slower as the system under test and test data will need to be copied
to the remote file system at the start, and the test result will need to be copied back
again after the test. To enable it, set the config file entry "remote_copy_program" to some
program that can copy files to remote systems, for example "scp", "rsync" or "pscp". Default
arguments for these programs are also provided via the "remote_program_options" config file
entry as above.
</div> 
<div class="Text_Header"><A NAME="view_file_on_remote_machine"></A>Viewing files locally and remotely</div>
<div class="Text_Normal">
The dynamic GUI has a <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=dynamic_gui";?>#view_program">number of ways</A> to view the files produced by the tests. With the tests being run remotely on potentially a different file system, it can become
an interesting question whether the viewing programs should be started on the remote machine or the local machine.
On the one hand the files may not be reachable from the local machine, but on the other hand viewing programs may not be installed on the remote machine.
</div><div class="Text_Normal">
When <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=dynamic_gui";?>#follow_program">following files</A> produced by remotely run tests, TextTest will always run the "follow_program" ("tail" on UNIX or "baretail" on Windows) by default on the remote machine, as this is supposed to respond quickly to changes and it is therefore better if it doesn't have to wait for the file server
before responding. When viewing files normally, it will by default run the viewer on the local machine. This can however be
configured, for example for files which can only be viewed remotely, using the config file setting "view_file_on_remote_machine",
which can be keyed on file types in a similar way to "view_program" which it configures.
</div>
