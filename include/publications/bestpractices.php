<div class="Text_Header"> Exploring Best Practice for XP Acceptance Testing</div>
<div class="Text_Description">Workshop discussion at XP2005</div>
<div class="Text_Header">Introduction</div>
<div class="Text_Normal">The aim of the workshop was to discuss
different aspects of acceptance testing in a fairly high-level
and tool-independent way. Running the workshop were myself,
Brian Swan (author of Exactor) and Rick Mugridge (author of
FitLibrary and a newly published book on acceptance testing).
What unites TextTest+xUseCase, Exactor and Fit+FitLibrary is the
aim to support writing tests in the language of the business
domain : something most of the myriad other tools out there are
not concentrating on. The following text is something that all
three presenters agreed was a fair representation of the
discussion.</div>
<div class="Text_Header">Tests as communication</div>

<div class="Text_Normal">There was a growing realisation and
consensus on the importance of acceptance tests as a vehicle for
establishing communication between business types (&ldquo;customers&rdquo;)
and the development team about requirements. That is, while
producing maintainable executable tests is a major point of
acceptance testing, it isn't the only one.</div>
<div class="Text_Normal">For business types to be involved at
this level, it becomes a major advantage for the tests to be
written in their language: the language of the business domain.
This is in preference to the alternatives: tests being written
in a programming language, or a pre-packaged language defined by
the test tool. It was perhaps not a surprising conclusion given
the common thread of the tools developed by the organisers! A
further point that emerged, though, is that tools should focus
on constraining this language as little as possible to avoid
strait-jacketing the communication : few constraints will be
useful in all domains. We didn't examine the actual constraints
imposed by actual tools, though.</div>
<div class="Text_Normal">Highlighted by several participants was
the fact that many in management seem to want to regard testing
and development as entirely separate enterprises, and some tools
encourage this view by suggesting that effective tests can be
written without needing to touch the code or &ldquo;disturb&rdquo;
the developers at all. In fact, such compartmentalisation was
seen as dangerous and can lead to important conversations being
skipped.</div>
<div class="Text_Normal">Another problem for XP teams with long
experience of unit testing is the notion of &ldquo;test first&rdquo;.
You write a fully executable unit test, see the bar go red,
write the code and see the bar go green. Some expect a similar
process with acceptance testing : that the customer will write a
fully executable acceptance test, &ldquo;throw it over the wall&rdquo;

and the developers will write the code to make it pass. The
discussion emphatically rejected this view: writing an
acceptance test is an iterative procedure between customer and
developers, where the two &ldquo;sides&rdquo; understand each
other more and more, with the final result being an executable
test. 
</div>
<div class="Text_Header">Getting the &ldquo;customer&rdquo;
involved</div>
<div class="Text_Normal">Many practitioners report that getting
business types involved in writing acceptance tests is
difficult: they do not see it as their job. Unrealistic
expectations in terms of the tools placed in their hands and
expectations they will do the whole thing themselves have
probably contributed to such problems, as discussed above.</div>

<div class="Text_Normal">A few points were raised about how to
mitigate this:</div>
<UL>
	<LI><div class="Text_Normal">A significant precondition is that they are a fully
	integrated part of the team and feel co-responsible for its
	success. Then it is easier to see the importance of knowing as
	soon as possible that the correct thing is being built and that
	it is being built correctly. It is then more tempting to invest
	energy in the process</div>
	<LI><div class="Text_Normal">Another key is making sure they are driving the process.
	Meet them where they're at. Instead of starting from &ldquo;here
	is a tool that works this way&rdquo;, ask them to express a
	test in whatever form they find convenient and work from there.
	Work with them and help them to refine it until it can be added
	to a test suite that will be understood by a tool.</div>
	<LI><div class="Text_Normal">It would be very valuable if public examples were
	available to document successful involvement &ndash; this would
	help to inspire future business involvement. 
	</div>

</UL>
<div class="Text_Header">Retrofitting acceptance tests to a legacy system</div>
<div class="Text_Normal">There seemed to be a consensus that TextTest's approach of
using logging to verify behaviour was particularly suitable for
legacy systems, because it is much less intrusive to the system
under test. Log statements can be added to a legacy codebase in
an exploratory manner without any risk of breaking it.
Introducing any tool that aims to access the system under test
via an API (i.e. nearly anything else) involves performing
(maybe substantial) refactoring before tests can be put in
place.</div>
<div class="Text_Normal">It can be tempting to focus on testing the code. In fact,
large tracts of the code may be entirely unused. Far more useful
is to study the current usage patterns of the system and
concentrate on writing tests for those.</div>
<div class="Text_Normal">A related point is that it is essential to find out what is
now understood to be correct behaviour of the legacy system &ndash;
which is very likely to differ from its original specification.
The users may be so used to the bugs in it that they want to
preserve them! The focus at first needs to be on &ldquo;behaviour
preservation&rdquo; rather than &ldquo;correctness assertion&rdquo;.</div>

<div class="Text_Normal">Once such things are in place, the next step depends on the
aim of the enterprise. Is it to basically fix bugs or is major
new functionality needed? In the first case, behaviour
preserving tests may well be all you need. If major development
is needed, a serious refactoring effort will probably be needed,
and unit tests can be added along with that effort.</div>
<div class="Text_Header">&ldquo;Mocking&rdquo; in acceptance tests</div>
<div class="Text_Normal">When creating unit tests, much effort is (or can be) invested
in isolating units that can be tested alone. This generally
involves creating &ldquo;mocks&rdquo;, &ldquo;fakes&rdquo; or
&ldquo;stubs&rdquo; to replace parts of the system that are not
interesting for the test currently under consideration. Similar
considerations arise in acceptance testing, though the
&ldquo;requirement&rdquo; rather than &ldquo;code&rdquo; focus
seems to make the distinctions between &ldquo;mocks&rdquo;,
&ldquo;fakes&rdquo; and &ldquo;stubs&rdquo; uninteresting. The
assembled company chose to borrow the work &ldquo;mock&rdquo; as
it sounds best, somehow.</div>

<div class="Text_Normal">So, the question became : what should you mock out in
acceptance tests? What is a valid motivation for doing so? The
answers were pretty varied and a consensus was not really
reached. In general Brian and I seemed to answer that as little
should be mocked out as was practically feasible, while Rick and
some others were happy mocking a bit more.</div>
<div class="Text_Normal">Naturally, creating mock versions of things creates the
potential for unfound errors. Exactly the reason, in fact, why
unit tests can miss important problems. The more what you test
differs from what you ship, the more potential there is for this
problem.</div>
<div class="Text_Normal">Of course, there are situations in which mocking is
unavoidable:</div>
<UL>
	<LI><div class="Text_Normal">Hardware unavailibility. One attendee spoke of an
	embedded system that needed to be run at a power station!
	Clearly, the power station needs to be mocked out somehow as
	most people don't have a spare one for running tests on. On a
	less extreme level, some applications depend very heavily on
	hardware type: in this case, products like VMWare provide an
	effective means of &ldquo;mocking the hardware&rdquo;.</div>
	<LI><div class="Text_Normal">Simulating failure of external systems. To check that
	the application behaves correctly in the presence of failure
	conditions in its environment, you need to be able to simulate
	those conditions somehow.</div>

	<LI><div class="Text_Normal">Clock dependencies. If certain things should happen at
	8am every morning, you need a way to mock the system clock to
	be able to test them.</div>
	<LI><div class="Text_Normal">Maintainibility. For example, with a GUI application,
	the ultimate arbiter of what happens is what appears on the
	screen, so the &ldquo;correct&rdquo; thing to do is take screen
	dumps and compare them. Naturally, this is very fragile and
	sensitive to irrelevant things like the exact machine setup
	where the test is running, so practically we find a way to
	&ldquo;mock the screen&rdquo; for assertion purposes. We assume
	we know what will appear there, so we log what we think we are
	telling the GUI toolkit to do (TextTest), or we examine its
	internal state and assert things about it (everyone else).
	Naturally both of these things are subject to errors creeping
	in. 
	</div>
</UL>
<div class="Text_Normal">Then there are situations where the &ldquo;liberals&rdquo;

might mock things and the &ldquo;fundmentalists&rdquo; might
not...</div>
<UL>
	<LI><div class="Text_Normal">The User Interface (for purposes of driving the system
	under test). For some, mocking this is just practical, because
	it is assumed to be too difficult to have it present for real.
	For others it is a good idea anyway, because they believe it
	isn't helpful to think about or get hung up on the user
	interface when writing tests. For still others (and here I
	include myself, naturally) the user interface is an essential
	part of the system, and having the possibility to run tests
	with it present (or even write tests using it, in our case)
	greatly enhances the ease of writing and understanding tests.</div>
	<LI><div class="Text_Normal">Sending email. Naturally you can't send email for real
	to the real person. But you could configure the test system to
	send it to a test address and then examine the inbox there to
	see if it arrived. In practice none of us are doing this yet as
	it hasn't seemed worth the effort in practice in the systems we
	have worked on.</div>
	<LI><div class="Text_Normal">Slow things. There are certainly situations where
	acceptance tests can be very slow, and some feel this is a
	reason to start mocking slow things out. Others (including me)
	feel that there are better ways to address this: maybe run the
	slower tests only every night or every weekend, or (better)
	install a grid engine and run the tests in parallel. 
	</div>

	<div class="Text_Normal">A common example is databases. Many mock out the database
	instinctively, but this is rarely a good idea in acceptance
	tests if the database and its schema are a key part of the
	system. One option is to replace a &ldquo;big&rdquo; database
	like Oracle with a lightweight one such as MySQL &ndash; this
	will generally save a fair bit of time in the tests. (this is
	assuming creation and teardown of a new database instance per
	test, without which your tests will be interdependent, which is
	generally nasty for maintainance purposes)</div>
</UL>
<div class="Text_Normal"><I>Written by Geoff Bache,  endorsed by Rick Mugridge and
Brian Swan, 19<SUP>th</SUP> July 2005</I></div>
				</TD>

			</TR>
		</TBODY>