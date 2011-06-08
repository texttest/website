<div class="Text_Header">A Capture-Replay approach to Mocking</div> 
<div class="Text_Description">Mocks that retain a connection to the real world</div>
<div class="Text_Normal">
When you do unit testing, you often want to isolate a piece of code while you test it, and there are plenty of mocking frameworks out there to help you to do that. You create mock and stub objects to play the role of the class under test's collaborators. In a similar way, when you do integration testing, you often want to confirm your code works in isolation of a 3rd party library or service, so it could be useful to be able to mock that out too. This 3rd party module might also be slow, hard to set up, or not be available at all on your development machine. The usual approach is to write some kind of code to simulate the behaviour of the subsystem in question.
</div>
<div class="Text_Normal">
 The trouble with hand-coding mocks to imitate these kinds of subsystems is that they can be a lot of work to maintain when the subsystem changes its behaviour, and worse, you may not notice when that happens. Your tests will stay green since they are using a mock, and when connected to the real subsystem, your code will fail miserably.</div>
<div class="Text_Header">What do we mean by Capture-Replay?</div> 
<div class="Text_Normal">
CaptureMock's approach is a so-called capture-replay approach. This means that when you "record" your mock, CaptureMock will observe the interaction between your code and the subsystem you are mocking out, and record it in a text file in its own format. When you then run your test in "replay mode", CaptureMock can play the role of the subsystem in question and the real subsystem does not need to even be installed.</div>
<div class="Text_Normal">
 You can then choose, each time you run your tests, whether you wish to have the real subsystems present and verify/recreate the captured mocks, or to rely on the mocks captured by a previous run. If you are running in "replay mode" and CaptureMock does not receive the same calls as previously, it will fail the test, and suggest that you may want to recreate the mocks in record mode.
</div>
<div class="Text_Normal">
Note that there are other mocking frameworks that say they have a capture-replay approach which do not work like this, so the term can be a bit confusing if you have used other frameworks. These tools generally "record" some behaviour in the first half of the test based on some code you write, and then switch to "replay" halfway through the test to actually execute the code under test. They do not offer two ways to run the same test, nor the "connection to the real world" that goes with it.
</div><div class="Text_Header">Advantages of working this way</div> 
<div class="Text_Normal">
This makes your functional tests much easier to handle, since you can verify your code works, even when much of the infrastructure it depends on is not present. Your tests run more quickly on your development machine, and you only need to run them with the real subsystems present when the interactions change. </div>
<div class="Text_Normal">
Because the information in the mocks is generated rather than hand-made, it is simpler and easier to do and redo, lowering the maintenance burden. Also, because it is based on real behaviour and continually ensures that that behaviour does not change without recreating the mock, it minimises the risk of having mock code which does not reflect how the real code will behave.
</div>
<div class="Text_Header">What it is and isn't good for</div> 
<div class="Text_Normal">
CaptureMock is best suited, and designed for, larger scale functional tests. It is primarily aimed at mocking out interaction with reasonably large and complex subsystems. It's generally used to mock out interaction with code you don't own, rather than code you do. Obviously its mode of operation prevents using it to actually drive the design of code (BDD-style) : you can't easily use it to mock out things you haven't written yet.
</div>
<div class="Text_Normal">
It isn't normally a good choice for unit testing, unless the units being tested are fairly substantial. For unit testing, use one of the many code-based mocking tools in your language of choice.
</div>
<div class="Text_Header">What can be intercepted and mocked out?</div> 
<div class="Text_Normal">
It can currently capture the results of <A class="Text_Link" HREF="index.php?page=capturemock&n=cmdline_basic">system calls</A>, <A class="Text_Link" HREF="index.php?page=capturemock&n=network_messaging">synchronous messaging over a network</A> and also <A class="Text_Link" HREF="index.php?page=capturemock&n=python_basic">Python modules and function calls</A>. You can also use it for code written in languages other than Python, by <A class="Text_Link" HREF="index.php?page=capturemock&n=custom_client">writing your own custom client</A>.
</div>
