<div class="Text_Main_Header">Intercepting Python modules, attributes and functions</div>
<div class="Text_Normal">
CaptureMock is capable of recording and replaying the behaviour of calls made internally in Python code. It can intercept all usage of a certain module, for example, or single calls to functions or attributes.  Examples would be things like
"smtplib", "xmlrpclib" or "urllib" which may refer to resources that aren't
always available where you want to run the tests, or which may cause undesirable
global side effects.</div>
<div class="Text_Header">Example: A program that sends emails using the "smtplib" module.</div>
<div class="Text_Normal">
For example, suppose our Python program is designed to send an email under certain circumstances.
Clearly we don't want emails to be sent for real every time the test is run. So, we set the test 
up so that it will capture the calls that send the email, run it for real once and see that the email arrives, 
and ever afterwards trust that so long as we continue to make the same calls, the system is behaving correctly. 
Subsequent runs of the test will not send email for real but will merely verify the calls made. 
</div>
<div class="Text_Normal">
So, we are of course using the "smtplib" standard library module to do this. We therefore tell CaptureMock to intercept all interaction with this module, by adding the following to our CaptureMock rc file (The location of this varies, depending on whether you are using the <A class="Text_Link" HREF="index.php?page=capturemock&n=command_line">command line</A>, a <A class="Text_Link" HREF="index.php?page=capturemock&n=codedtests">Python test tool</A>, or <A class="Text_Link" HREF="index.php?page=capturemock&n=texttest">TextTest</A>). : 
<?php codeSampleBegin() ?>
[python]
intercepts = smtplib
<?php codeSampleEnd() ?>
We then run the test in record mode. This will produce a real email which we can check looks right, and a new "mock file". (Note that how to choose record mode, and where the "mock file" will end up, also depend on which of the above test runners are being used). In any case, it has a standard format defined by CaptureMock and will look something like this :
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
This provides the full email interaction and contents. The first two characters of each line indicate the direction of the communication. "<-" says that this was created by the program: "->" that it was received from the external system in response. The next three letters are a code for the type of communication. In the case of python calls, "PYT" communications represent calls made to the module by the system, while the "RET" ones are the responses provided. When a basic Python object, like a string or a list, is returned, it is referred to via its textual representation, i.e. via "repr". It is by default assumed that it will work to reconstruct the object using "eval" (but you can <A class="Text_Link" HREF="index.php?page=capturemock&n=transform_output">transform the output</A> when this isn't true). When an object is returned, as in when we construct a smtplib.SMTP object here, it is assigned a numeric name ("smtp1" here) and is referred to in the response as "Instance('SMTP', 'smtp1')". All future interaction with such an object is also intercepted as shown here.
</div>
<div class="Text_Normal">
We can then run this test and just verify that the smtplib interaction is the same, or make judgements on differences in the contents of the email, without needing to actually send emails for real every time. It is also easy to simulate conditions by editing the file by hand, for example to simulate behaviour when the SMTP server cannot be contacted, or login fails. An added bonus is that it is of course not very difficult to transform this file into a valid Python script, which can be very useful for extracting simple example code from your own code when you are unsure of how you are supposed to call a third-party library correctly.
</div>
<div class="Text_Header">Exceptions</div>
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
->RET:raise Instance('MyException(exceptions.IOError)', 'myexception1')
<?php codeSampleEnd() ?>
</div>

<div class="Text_Header">Intercepting individual Python calls</div>
<div class="Text_Normal">
In addition to intercepting entire Python modules, you can also intercept and replay individual function calls. 
A good example is the current date (datetime.date.today() in Python) so that you
can test code that depends on it without needing to write any code to fake what it does. You do this in the same
way as above, i.e. setting the "intercepts" variable in the rc file, to a comma-separated list. To intercept datetime.date.today
as well, we can thus write
<?php codeSampleBegin() ?>
[python]
intercepts = smtplib,datetime.date.today
<?php codeSampleEnd() ?>
This would produce a mock file that looked something like
<?php codeSampleBegin() ?>
<-PYT:datetime.date.today()
->RET:datetime.date(2010, 5, 12)
<?php codeSampleEnd() ?>
It would create you a test that behaved as though "today" was always 12th May 2010, saving you the trouble of 
figuring out how to fake it or how
to manage test data that needed to refer to dates within a certain timeframe of it. 
</div>
<div class="Text_Normal">
Note that any usage of the "datetime" module other than calls to "datetime.date.today" would
just behave as normal and not be intercepted.
</div>
<div class="Text_Normal">
Note also that it does not currently work to provide the name for a bound method here: it must be a module-level
function or attribute, static method or class name that is intercepted. Bound methods will hopefully be supported 
in future.
</div>
<div class="Text_Header">How it works</div>
<div class="Text_Normal">
Module imports are intercepted by manipulating "sys.meta_path", attributes and functions by simple "monkey-patching". Unlike the command-line and client-server functionality, it does not use a server process, but handles everything internally.
</div>
<div class="Text_Normal">
It sets the variable "CAPTUREMOCK_PROCESS_START" to a string identifying the rc files given. If used from TextTest, this will cause CaptureMock to also be active in subprocesses, as TextTest creates its own "sitecustomize.py" file which will be loaded when new Python processes are started. Otherwise, adding a hook to call capturemock.process_startup(), either via sitecustomize.py or via a .pth file, will also cause this to happen. 
</div>
