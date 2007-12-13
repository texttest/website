<div class="Text_Header">Some Frequently Asked Questions on problems with logs as tests</div>		
<OL>
<div class="Text_Header"><li>Isn't it old-fashioned and low-level?</div><div class="Text_Normal">
It probably is old-fashioned in some sense &ndash; it comes
more naturally to test a program by comparing text files when
text files are one of its major products anyway, which used to
be a more common situation than it is now. To create logged
files especially for this purpose doesn't come as naturally,
but is not particularly difficult. Of course, many log files
are extremely low level and obscure and if you create one that
is, your tests will be low level and obscure too. The key is to
take control of the text you are using to test with, and be
prepared to create log files entirely for this purpose &ndash;

don't just expect that the logs you already have will be
adequate.</div>
<div class="Text_Header"><li>You need
somebody to read the logs and check for errors at least once
per test. Surely they miss things, leading to incorrect tests?</div><div class="Text_Normal">
This can be a problem, so it's wise to take a few precautions.
The advice above is very relevant: if the log file is too low
level or too verbose, this will happen more. It is also good to
be focussed on the problem in hand: better to think of what the
test is really trying to assert and check that this is logged
correctly than try to read the whole log file, which will
probably be done less thoroughly. Then at least you know the
test is asserting what it's meant to be asserting, even if
there are other errors in the log file (which would not be
caught even with an explicit assertion approach). Also, if your
program reports errors in a predictable format, TextTest can
help you find these errors via its <A class="Text_Link" href= "index.php?page=<?php echo convertToDocFormat($current_release); ?>&n=automatic_failure_interpretation">automatic
failure interpretation</A> mechanisms. 
</div>
<div class="Text_Headern="><li>Won't it slow
my program down to have it writing logs all the time?</div><div class="Text_Normal">
Yes. So you should use a logging framework so that the logs can
easily be disabled in production. They will then not have a
noticeable effect on the speed (<A class="Text_Link" href= "http://logging.apache.org/log4j/docs/">log4j'</A>s
site claims a few nanoseconds). TextTest <A class="Text_Link" href="index.php?page=<?php echo convertToDocFormat($current_release); ?>&n=making_the_logging_configurable">integrates
with the log4x family of tools</A> to allow easy configuration
of log settings. (<A class="Text_Link" href= "http://logging.apache.org/log4j/docs/">log4j</A>

and <A class="Text_Link" href= "http://www.sourceforge.net/projects/log4py">log4py</A>
and a home-made version of <A class="Text_Link" href= "http://log4cpp.sourceforge.net/">log4cpp</A>
equivalent are tested)</div>
<div class="Text_Header"><li>Don't you end up with lots of peripheral
information in the tests, making it hard to see the wood for
the trees?</div><div class="Text_Normal"> A test
script is specific for the test and so will not tell you about
things that this test isn't looking for. Logs, in contrast, are
created by the program for all conceivable tests and may well
tell you about and assert circumstantial things which are
orthogonal to the purpose of the test. This can be a problem,
particularly if logs are too verbose, but is mitigated by a few
things - when understanding a test failure, the graphical
difference tool highlights the interesting parts and
backgrounds the rest. It is easy to update a lot of tests at
once at the touch of a button if needed. Circumstantial
information can be useful in understanding what is happening,
and can even be a very useful source of extra testing (see the
fifth reason on the <A class="Text_Link" href= "index.php?page=concepts&n=whylog">Five Reasons...</A>

page)</div>
<div class="Text_Header"><li>But I want to drive my
high-level design with high-level tests.</div><div class="Text_Normal"> You can still
do this without difficulties and have your assertions done via
logs. This potentially means you won't want to use <A class="Text_Link" href= "index.php?page=concepts&n=xusecase">xUseCase</A>
to test GUIs, but there is no reason not to use TextTest for
that reason. It has been shown (by Rick Mugridge) that
acceptance tests can be used as a means to enable <A class="Text_Link" href= "http://domaindrivendesign.org/">domain-driven
design</A>, using API-driven tests to push domain concepts deep
into a design. However, the parts of the API that enable
assertions to be written do not aid this process, they are
simply extracting information from arbitrary parts of the
system, very possibly making it available where it wouldn't be
otherwise. See the <A class="Text_Link" href= "index.php?page=concepts&n=problems">Frequently
Asked Questions page for xUseCase</A> for further discussion of
this issue.</div>

<div class="Text_Header"></div>
<div class="Text_Header"><li>How can I write tests for functionality that
doesn't exist yet?</div><div class="Text_Normal">
It is very useful to use acceptance tests as a means of driving
development, allowing a customer representative to create a
test for functionality that is still to be written. With logs,
this consists primarily in editing a generated log file to
indicate what should happen but does not yet. This may well not
be the final version of the test and should be understood as a
starting point for a discussion between customer and developer,
in the expectation that both code and test will need refining
before a working test can be added to the test suite. In
practice, this will probably be the case anyway, even if it
seems like a hand-assertion script is a more 'proper' test
without the code present. 
</div>
</OL>