<div class="Text_Main_Header">Faking it with TextTest</div>
<div class="Text_Description"> How to avoid running your whole system for real</div>

<div class="Text_Normal"><BR>

</div>
				
				
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
<div class="Text_Normal">(All the following mechanisms involve the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>">test
data mechanism</A>  : it's probably a good idea to read that
document first if you aren't familiar with how it works)</div>

<div class="Text_Normal">The problem can here be broken down into 4 sub-categories, of
which TextTest offers direct help with 3: 
</div>
<OL>
	<div class="Text_Normal"><li><A class="Text_Link" href="#test_data">System calls</A> Somewhere your
	program makes a system call to a &ldquo;third-party&rdquo;
	command-line program. (You might have written it too, but it is
	external to what you're trying to test). For whatever reason
	the behaviour of this program is hard to control in a
	repeatable way. One a example would be a build script which
	updated the current source from your version control system.
	Clearly you don't want to do this for real every time you run
	the test. There are two methods available here: one of which is
	based on<A class="Text_Link" href="#test_data"> writing your own version of the
	program to do something predictable </A>and another is based on
	TextTest  <A class="Text_Link" href="#collect_traffic">observing and reproducing
	what the program actually does </A>once, and then re-creating
	those conditions for you.</div>

	<div class="Text_Normal"><li><A class="Text_Link" href="#test_data">Built-in modules.</A> Somewhere
	your program uses a standard utility whose behaviour is hard to
	control or simulatae. For example, say your program should
	print a warning if the GUI library has too old a version. You
	don't want to have to install an old version of in order to
	test this. If you've written your program in Python or Java
	help is at hand: you can simply <A class="Text_Link" href="#test_data">write
	your own version</A> of the module (Python) or class (Java). If you're in Python,
        you can also use a close relative of the mechanism above to <A class="Text_Link" href="#collect_traffic_py_module">
        observing and reproduce what the Python module actually does </A>once, and then re-create those conditions for you later on.</div>
	<div class="Text_Normal"><li><U>Databases</U>. These are good at global side effects
	and changes in them are hard to reverse. The recommended
	approach here is to find and use a file-based database which
	can quickly be started from a file and shut down when the test
	is done. In this way you can avoid having to try and shut
	things down by hand. Recommended are <A class="Text_Link" href="http://www.firebirdsql.org/">Firebird
	</A>and <A class="Text_Link" href="http://www.mysql.com/">MySQL</A> for example,
	while <A class="Text_Link" href="http://www.oracle.com/">Oracle</A> and
	<A class="Text_Link" href="http://www.postgresql.org/">PostgreSQL</A> are less
	good at this. Once you have the file defining the database you
	can simply define it as <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>#copy_test_path">editable
	test data</A> and TextTest doesn't need to know that a database
	is present.</div>

	<div class="Text_Normal"><li><A class="Text_Link" href="#distributed"><U>Distributed systems with
	plain-text messaging</U><U>.</U></A> If you have a distributed
	system with many components, it can be impractical to start and
	stop the whole thing every time you run the tests. It can be
	useful to have a way to define component tests from system
	tests: i.e. to create tests running the whole system that can
	nevertheless be run with the other parts of the system mocked
	out.</div>
</OL>
<div class="Text_Header"><A NAME="test_data"></A>Executable and importable test data</div>
<div class="Text_Normal">When TextTest creates the t<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>">emporary
write directory </A>on running the test, and populates it with
test data, it also makes sure to insert that directory at the
start of the PATH, PYTHONPATH and CLASSPATH variables. That
makes it possible to provide executable programs that will be
run instead of their real versions via the normal t<A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>#link_test_path">est
data mechanism</A> (&ldquo;link_test_path&rdquo;). Likewise, you
can provide a Python module or a Java class, which will then be
imported instead of the real version at the appropriate moment.
Then you just need to place such executable/importable test data
in the appropriate place in the permanent test structure, just
as you would with more passive test data.</div>

<div class="Text_Header"><A NAME="collect_traffic"></A><A NAME="-rectraffic"></A>
Intercepting and replaying command line programs</div>
<div class="Text_Normal">The above mechanism for executable programs is powerful but
can be overkill. It's also not very easy to steer in the case
where a program is called many times and needs to behave
differently on each occasion. It can be better and easier to
simply ask TextTest to take over and &ldquo;record&rdquo; what
the program does. This is known as the command-line traffic
interception mechanism.</div>
<div class="Text_Normal">To enable this, add the name of the program concerned to the
config file entry &ldquo;collect_traffic&rdquo;. For each
test for which you want to mock out this program, go to the
Advanced tab under &ldquo;Running&rdquo; and check the &ldquo;(Re-)
record command-line traffic&rdquo; box. TextTest will then
create its own fake version of the program and place it in the
temporary write directory as if it were test data, as above.</div>

<div class="Text_Normal">When called, this program will send the command line it was
given back to TextTest via a socket. TextTest will then execute
it, and record to a new definition file called &ldquo;traffic.&lt;app&gt;&rdquo;
what the command line given was, what was returned on standard
output and standard error and what the exit status was. 
</div>
<div class="Text_Normal">
Additionally,
TextTest will scan the command line for arguments that appear to be files or directories (it will
take anything that is an absolute path or a pre-existing relative path) and will store any
changes to those files made while the process runs. If the test is saved these will then
appear in the test file view under "Externally Edited Files". By default it will only monitor
these files while the program in question is running: however you can tell TextTest that it
may start background processes that will edit the files, and in this case it will check the 
files before and after every subsequent received command. To do this, use the "asynchronous" key
when adding it to "collect_traffic", which is in fact a dictionary although you don't need to
know that unless using this feature. 
</div>
<div class="Text_Normal">When the test is next run without the above box checked, this
traffic file will be used instead of the real program. As
before, the command line is captured and sent to TextTest via a
socket. This time, however, it will look up the given command in
the traffic file, and for the closest matching command line
recorded, will return the standard output, standard error and
exit status via the socket, which in turn will be relayed back
to your system as if the real program had run. Any file edits that were
stored will also be reproduced at this point.</div>
<div class="Text_Normal">It's then easy to fake certain conditions by simply editing
this traffic file by hand, if desired</div>
<div class="Text_Header"><A NAME="collect_traffic_environment"></A>Providing environment variables for intercepted programs</div>

<div class="Text_Normal">Sometimes environment variables need to be provided for such
programs. As they are run directly from TextTest they don't
automatically inherit any environment your program may have set
up. In this case you should set the
&ldquo;collect_traffic_environment&rdquo; dictionary config
setting, with the keys being the program names as provided for
&ldquo;collect_traffic&rdquo; and the values being the names of
the environment variables. In this case these environment
variables with their values will also be sent to TextTest and
will be part of the information recorded.</div>

<div class="Text_Header"><A NAME="collect_traffic_py_module"></A>
Intercepting and replaying Python modules</div>
<div class="Text_Normal">
If your system under test is written in Python you can make use of a variation
of this mechanism to intercept and replay the interaction with particular
modules in a similar way to that described above. Examples would be things like
"smtplib", "xmlrpclib" or "urllib" which may refer to resources that aren't
always available where you want to run the tests, or which may cause undesirable
global side effects.</div>
<div class="Text_Normal">To enable this, add the name of the module concerned to the
config file entry &ldquo;collect_traffic_py_module&rdquo;. For each
test for which you want to mock out this program, go to the
Advanced tab under &ldquo;Running&rdquo; and check the &ldquo;(Re-)
record command-line traffic&rdquo; box in the same way as above. TextTest will then
create its own fake version of the module and place it in the
sandbox directory as if it were test data, whilst making sure this directory comes
first in the PYTHONPATH environment variable.
</div>
<div class="Text_Header"><A NAME="distributed"></A><A NAME="TEXTTEST_MIM_SERVER"></A>Intercepting and replaying plain-text network messages</div>
<div class="Text_Normal">The &ldquo;traffic interception&rdquo; mechanism can also be
used for this purpose. Here it is less a matter of configuring
TextTest and more of configuring your own application. As above,
TextTest considers itself to be recording such traffic when the
&ldquo;(Re-) record traffic&rdquo; switch is enabled, and
replaying such traffic when a &ldquo;traffic.&lt;app&gt;&rdquo;

file already exists. In these circumstances it sets up its own
&ldquo;traffic server&rdquo; and sets the environment variable
TEXTTEST_MIM_SERVER (MIM stands for &ldquo;Man in the Middle&rdquo;)
to &lt;host:port&gt; for this place.</div>
<div class="Text_Normal">On testing a client-server system you probably need to write
a wrapper script that can for example start server, start client
connecing to server, close client, shutdown server. To use this
traffic-recording mechanism you should modify this script such
that the client will instead connect to the host and port given
by TEXTTEST_MIM_SERVER, instead of that given by its own server.
You should also modify it so that on discovering the host and
port where the real server is running, this information should
be sent to TextTest's MIM server in the format &lt;some_message&gt;
&lt;host:port&gt;. TextTest will then parse this and know where
the server is.</div>

<div class="Text_Normal">When your client sends a request it will go to TextTest
instead. TextTest will record it as a client request in the
traffic file, and forward it to the server. The server will then
reply, which will be recorded as a server reply, and forwarded
back to the client. In this way a complete log of the
communication can be built up. 
</div>
<div class="Text_Normal">You can then replay this either as client or server. When
running the server with a traffic file already in place,
TextTest will read the file in order. It will itself send the
client traffic in the order it is written down, and each time a
server reply is present it will suspend and wait for such a
reply. Replaying the client is much the same, except that
TextTest suspends initially and waits for contact from the
client before doing anything. 
</div>
<div class="Text_Normal">This may be easier to understand by example. There is a nice
little fake client-server system tested in this way as part of
the self-tests, under
TestSelf/TrafficInterception/ClientServer/TargetApp.</div>
