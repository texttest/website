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
	control or simulate. For example, say your program should
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
output and standard error and what the exit status was. </div>
<div class="Text_Normal">When the test is next run without the above box checked, this
traffic file will be used instead of the real program. As
before, the command line is captured and sent to TextTest via a
socket. This time, however, it will look up the given command in
the traffic file, and for the closest matching command line
recorded, will return the standard output, standard error and
exit status via the socket, which in turn will be relayed back
to your system as if the real program had run. 
</div>
<div class="Text_Normal">It's then easy to fake certain conditions by simply editing
this traffic file by hand, if desired</div>
<div class="Text_Header">An interception example: programs that print documents</div>
<div class="Text_Normal">
For example, suppose you wish to test a Linux program that can print documents. Clearly, the last
thing you want is for paper to be spewing out of the printer every time the test is run. So, we
set the test up so that it will capture the print command line, run it for real once and see that
the paper looks right, and ever afterwards trust that so long as we continue to submit that same
print command, the system is behaving correctly. Subsequent runs of the test will not talk to
the printer for real but will merely verify the command.
</div>
<div class="Text_Normal">
So, on Linux we are running the "lpr" program to do this. We therefore tell TextTest to intercept
this program:
<?php codeSampleBegin() ?>
collect_traffic:lpr
<?php codeSampleEnd() ?>
We then run the test with the record flag checked (or -rectraffic on the command line) as described above.
This will produce paper for real which we can check looks right, and a new file in the test called "traffic.&lt;app&gt;" 
This has a standard format defined by TextTest and will look something like this
<?php codeSampleBegin() ?>
<-CMD:lpr -PthePrinter graph.ps
->OUT:Printing with args -PthePrinter graph.ps
<?php codeSampleEnd() ?>
The first two characters of each line indicate the direction of the communication. "&lt;-" says that this was created by the program:
"-&gt;" that it was received from the external system in response. The next three letters are a code for the type of communication. Here "CMD" signifies a system call via the command line, while "OUT" signifies a response on standard output. For command-line responses, you can also get "ERR" for responses on standard error and "EXC" for a non-zero exit code. After the colon you get the exact command line plus arguments, or the full response as appropriate.
</div>
<div class="Text_Normal">
Assuming we like what we saw, we can save this file along with the others. When we then rerun the test without the record flag checked,
a new traffic file will be generated from the "lpr" commands that the system creates this time, with the responses generated by looking in the saved file and providing the appropriate match, or a best-fit match if the exact command cannot be found in the file. In this way we can control changes to the generated command lines without needing to call "lpr" for real or write any test code ourselves.
</div>
<div class="Text_Normal">
Clearly there is also plenty of scope for creating tests for error conditions such as the printer being out of paper. We only need to create such conditions once and then capture them. If we are confident of how "lpr" will behave under such circumstances we can also just edit the traffic file responses by hand, for example to return an error message and an exit code, which saves us the trouble of trying to simulate it at all.
</div>
<div class="Text_Header">Capturing file edits by intercepted programs</div>
<div class="Text_Normal">
Additionally,
TextTest will scan the command line for arguments that appear to be files or directories (it will
take anything that is an absolute path or a pre-existing relative path) and will store any
changes to those files made while the process runs. If the test is saved these will then
appear in the test file view under "Externally Edited Files". When it is run without the "record" flag
these file edits will then be reproduced as if the real program had run.
</div>
<div class="Text_Normal">
By default it will only monitor these files while the program in question is running: however you can tell TextTest that it
may start background processes that will edit the files, and in this case it will check the 
files before and after every subsequent received command. To do this, use the "asynchronous" key
when adding it to "collect_traffic", which is in fact a dictionary although you don't need to
know that unless using this feature. 
</div>
<div class="Text_Normal">
For example, suppose our system under test updates some files via a version-control system, say CVS. We put the ones that we want for the test in the repository, and tell TextTest to capture interaction with CVS:
<?php codeSampleBegin() ?>
collect_traffic:cvs
<?php codeSampleEnd() ?>
As before, we run with the record flag and get a traffic file generated. It looks something like this:
<?php codeSampleBegin() ?>
<-CMD:cvs update -dP /path/to/my/checkout
->FIL:checkout
->OUT:U subdir/myfile.txt
->ERR:cvs update: Updating .
cvs update: Updating subdir
<?php codeSampleEnd() ?>
Note that besides the OUT and ERR response mentioned before, we also have a FIL response, which indicates an edit of a file or directory with the given name. When we save this, the file "subdir/myfile.txt" which CVS updated for us will be stored and can be viewed (or edited) under "Externally Edited Files". We can then even run this test on a machine without CVS installed, as its role will be played by TextTest producing the response from this file and the program itself will be none the wiser that the real CVS hasn't actually been called.
</div>
<div class="Text_Normal">
Subsequent edits to the same file or directory will also be handled, in this case they will be referred to for example as 
<?php codeSampleBegin() ?>
->FIL:checkout.edit_2
<?php codeSampleEnd() ?>

</div>
<div class="Text_Header"><A NAME="collect_traffic_environment"></A>Environment variables and current working directory for intercepted programs</div>
<div class="Text_Normal">Sometimes environment variables need to be provided for such
programs. As they are run directly from TextTest's "traffic server" they don't
automatically inherit any environment your program may have set
up. In this case you should set the
&ldquo;collect_traffic_environment&rdquo; dictionary config
setting, with the keys being the program names as provided for
&ldquo;collect_traffic&rdquo; and the values being the names of
the environment variables. In this case these environment
variables with their values will also be sent to TextTest and
will be part of the information recorded.
</div>
<div class="Text_Normal">
For example, if our system sets CVSROOT (which CVS uses to find its central repository) before calling CVS we will need to tell TextTest this. We do this via
<?php codeSampleBegin() ?>
[collect_traffic_environment]
cvs:CVSROOT
[end]
<?php codeSampleEnd() ?>
which will also affect the traffic file. It will now instead start with the line
<?php codeSampleBegin() ?>
<-CMD:env 'CVSROOT=/path/to/cvs' cvs update -dP /path/to/my/checkout
<?php codeSampleEnd() ?>
providing a means to make sure our program is providing it to the CVS call correctly.</div>
<div class="Text_Normal">
(Note that this command isn't actually what TextTest executes, which of course would not work on Windows, it is just a representation of what it does which coincides with a legal UNIX command line. This mechanism is portable.)
</div>
<div class="Text_Normal">
In a similar way, if your program changes the current working directory for the program it calls, this will be captured and recorded by TextTest. In this case you don't need to do anything to configure it. For example your program might call CVS in a different but equivalent way to do the update, and the above call could equally end up looking like this:
<?php codeSampleBegin() ?>
<-CMD:cd /path/to/my/checkout; env 'CVSROOT=/path/to/cvs' cvs update -dP
<?php codeSampleEnd() ?>
Again this isn't what is executed internally: it is a representation only to allow easy comparison with future calls.
</div>
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
first in the PYTHONPATH environment variable. (Note that this will therefore not work
on builtin modules which aren't sensitive to PYTHONPATH)
</div>
<div class="Text_Normal">
For example, suppose our Python script is designed to send an email under certain circumstances.
Clearly we don't want emails to be sent for real every time the test is run. In a similar way
to the printing example, we can check it is sent for real once, capture the interaction, and
then monitor future changes to that interaction.
</div>
<div class="Text_Normal">
We start by intercepting the Python module for sending email in our config file:
<?php codeSampleBegin() ?>
collect_traffic_py_module:smtplib
<?php codeSampleEnd() ?>
We then run with the "record" flag set and check that an appopriate-looking email arrives. We also get a traffic file as before, looking something like this:
<?php codeSampleBegin() ?>
<-PYT:import smtplib
<-PYT:smtplib.SMTP()
->RET:Instance('SMTP', 'smtp1')
<-PYT:smtp1.connect('machine.site.com')
->RET:(220, 'machine.site.com ESMTP Sendmail; Tue, 9 Feb 2010 14:32:54 +0100')
<-PYT:smtp1.sendmail('me@localhost', ['tom', 'dick', 'harry'], '''From: me@localhost
To: tom,dick,harry
Subject: Hi Guys!

I love you all!
''')
->RET:{}
<-PYT:smtp1.quit()
<?php codeSampleEnd() ?>
This provides the full email interaction and contents. The "PYT" communications represent calls made to the module by the system, while the "RET" ones are the responses provided. When a basic Python object, like a string or a list, is returned, it is referred to via its textual representation, i.e. via "repr". When an object is returned, as in when we construct a smtplib.SMTP object here, it is assigned a numeric name ("smtp1" here) and is referred to in the response as "Instance('SMTP', 'smtp1')". All future interaction with such an object is also intercepted as shown here.
</div>
<div class="Text_Normal">
Naturally we can then run this test and just verify that the smtplib interaction is the same, or make judgements on differences in the contents of the email, without needing to actually send emails for real every time. As before, it is also easy to simulate conditions by editing the file by hand. An added bonus here is that it is of course not very difficult to transform this file into a valid Python script, which can be very useful for extracting simple example code from your own code when you are unsure of how you are supposed to call a third-party library correctly.
</div>
<div class="Text_Normal">
Exceptions are also handled seamlessly. For example, if the SMTP server above could not be found, we will simply get something like
<?php codeSampleBegin() ?>
<-PYT:import smtplib
<-PYT:smtplib.SMTP()
->RET:Instance('SMTP', 'smtp1')
<-PYT:smtp1.connect('no_such_server@nowhere')
->RET:raise socket.gaierror("(-2, 'Name or service not known')")
<?php codeSampleEnd() ?>
If the exception is itself defined in the intercepted module, it will be referred in a similar way to the SMTP object above, i.e.
<?php codeSampleBegin() ?>
->RET:raise Instance('MyException', 'myexception1')
<?php codeSampleEnd() ?>
</div>

<div class="Text_Header"><A NAME="collect_traffic_py_attributes"></A>Intercepting individual Python calls</div>
<div class="Text_Normal">
In additional to intercepting entire Python modules, you can also intercept and replay individual function calls. 
A good example is the current date (datetime.date.today() in Python) so that you
can test code that depends on it without needing to write any code to fake what it does. For this
purpose you can use "collect_traffic_py_attributes", which is keyed on individual modules. To intercept
this call you would therefore do as follows.
<?php codeSampleBegin() ?>
collect_traffic_py_module:datetime

[collect_traffic_py_attributes]
datetime:date.today
<?php codeSampleEnd() ?>
This would produce a traffic file that looked something like
<?php codeSampleBegin() ?>
<-PYT:datetime.date.today()
->RET:datetime.date(2010, 5, 12)
<?php codeSampleEnd() ?>
and all other usage of the datetime module would not be intercepted. It would create you a test that behaved
as though "today" was always 12th May 2010, saving you the trouble of figuring out how to fake it or how
to manage test data that needed to refer to dates within a certain timeframe of it. 
(It's worth noting in passing that this particular example won't work on Windows as "datetime" is a builtin
module on Windows, see above)
</div>
<div class="Text_Normal">
If "collect_traffic_py_attributes" is empty for any given module it is assumed that all calls to it are to
be intercepted. In the above case, any usage of "datetime" that didn't call "datetime.date.today" would
just behave as normal.
</div>
<div class="Text_Header"><A NAME="collect_traffic_use_threads"></A>A note on threading and interception</div>
<div class="Text_Normal">
By default each such request will be handled by a separate thread internally in TextTest's "traffic server"
so that concurrent calls can be handled correctly without deadlocking. Some modules (e.g. Windows COM, GUI-related stuff
such as tkMessageBox in Tkinter) however do not appreciate successive calls being made from threads that aren't the main thread, or from threads which are not the thread where the previous call was made.
</div>
<div class="Text_Normal">
In this case it's necessary to enforce a single-threaded mode for TextTest's "traffic server". This can be done by 
setting "collect_traffic_use_threads:false" in your config file which will force the traffic server to operate
everything on a single thread. With any moderately complex Python module interception it's usually a good idea to set this.
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
connecting to server, close client, shutdown server. To use this
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
communication can be built up. It will look something like this:
<?php codeSampleBegin() ?>
<-CLI:Here is a string
->SRV:Length was 17
<-CLI:Here is a longer string
->SRV:Length was 24
<-CLI:terminate
->SRV:Exiting...
<?php codeSampleEnd() ?>
The format is similar to before, with "CLI" referring to client requests and "SRV" to server responses.
This example is a "string-length" server where we send it strings and it tells us how long they are.

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
TestSelf/TrafficInterception/ClientServer/TargetApp. It is based around the string-length server shown above.
</div>
