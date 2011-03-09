<div class="Text_Main_Header">Intercepting system commands</div>
<div class="Text_Normal">
CaptureMock is capable of recording and replaying the behaviour of subprocesses called by the system under test via the command-line. It assumes they will be called via relative paths, i.e. that they can be intercepted by changing the PATH variable.</div>
<div class="Text_Header">Example: A Linux program that prints documents using 'lpr'</div>
<div class="Text_Normal">
Suppose you wish to test a Linux program that can print documents. Clearly, the last
thing you want is for paper to be spewing out of the printer every time the test is run. So, we
set the test up so that it will capture the print command line, run it for real once and see that
the paper looks right, and ever afterwards trust that so long as we continue to submit that same
print command, the system is behaving correctly. Subsequent runs of the test will not talk to
the printer for real but will merely verify the command.
</div>
<div class="Text_Normal">
So, on Linux we are running the "lpr" program to do this. We therefore tell CaptureMock to intercept
this program, by adding the following to our CaptureMock rc file (The location of this varies, depending on whether you are using the <A class="Text_Link" HREF="index.php?page=capturemock&n=command_line">command line</A>, a <A class="Text_Link" HREF="index.php?page=capturemock&n=codedtests">Python test tool</A>, or <A class="Text_Link" HREF="index.php?page=capturemock&n=texttest">TextTest</A>). : 
<?php codeSampleBegin() ?>
[command line]
intercepts = lpr
<?php codeSampleEnd() ?>
We then run the test in record mode. This will produce paper for real which we can check 
looks right, and a new "mock file". (Note that how to choose record mode, and where the "mock file" will end up, also depend on which of the above test runners are being used). In any case, it has a standard format defined by CaptureMock and will look something like this :
<?php codeSampleBegin() ?>
<-CMD:lpr -PthePrinter graph.ps
->OUT:Printing with args -PthePrinter graph.ps
<?php codeSampleEnd() ?>
The first two characters of each line indicate the direction of the communication. "&lt;-" says that this was created by the program:
"-&gt;" that it was received from the external system in response. The next three letters are a code for the type of communication. Here "CMD" signifies a system call via the command line, while "OUT" signifies a response on standard output. For command-line responses, you can also get "ERR" for responses on standard error and "EXC" for a non-zero exit code. After the colon you get the exact command line plus arguments, or the full response as appropriate.
</div>
<div class="Text_Normal">
This file will then be used next time the test is run in replay mode, and the real 'lpr' program will not be called and does not even need to be present.
</div>
<div class="Text_Normal">
Clearly there is also plenty of scope for creating tests for error conditions such as the printer being out of paper. We only need to create such conditions once and then capture them. If we are confident of how "lpr" will behave under such circumstances we can also just edit the generated mock file by hand, for example to return an error message and an exit code, which saves us the trouble of trying to simulate it at all.
</div>
<div class="Text_Header">How it works</div>
<div class="Text_Normal">
CaptureMock creates an executable file with the same name as the program being intercepted, places it in a temporary directory
and adds that temporary directory to the front of the PATH variable. If used from TextTest it will make use of TextTest's own sandbox directory, otherwise it will make its own. It will also start its own "CaptureMock server" process.
</div>
<div class="Text_Normal">
When called, this program will send the command line it was
given to the CaptureMock server via a socket. CaptureMock will then execute
it, and record the command line that was given and the results of running it. 
In detail, it will record
<OL>
<LI>The full command line
<LI>The current working directory, if different from the one the test was started with
<LI>Value of any environment variables identified as important (see <A class="Text_Link" HREF="index.php?page=capturemock&n=environment">here</A>)
<LI>Information written to standard error
<LI>Information written to standard output
<LI>Exit status of the program, if nonzero
<LI>Any files created or edited by the program (see <A class="Text_Link" HREF="index.php?page=capturemock&n=file_capture">here</A>)
</OL>
</div>
<div class="Text_Normal">When the test is next run in replay mode, this
mock file will be used instead of the real program. As
before, the command line is captured and sent to the CaptureMock server via a
socket. This time, however, it will look up the given command in
the mock file, and for the closest matching command line
recorded, will make any relevant file edits and return the standard output, standard error and
exit status via the socket, which in turn will be relayed back
to your system as if the real program had run. 
</div>
<div class="Text_Header">A note on threading and interception</div>
<div class="Text_Normal">
By default each such request will be handled by a separate thread internally in the CaptureMock server
so that concurrent calls can be handled correctly without deadlocking. If for some reason this causes trouble and it becomes
necessary to enforce a usage of a single thread and handling requests in series, this can be done by adding the following to the
RC file:

<?php codeSampleBegin() ?>
[general]
server_multithreaded = False
<?php codeSampleEnd() ?>

</div>
