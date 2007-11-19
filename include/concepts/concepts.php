<!--TITLE:What is Acceptence testing? PAGEINFO: Read more about what Acceptance Tests isPATH:page=concepts&n=main-->
<div class="Text_Header">What is Acceptence Testing?</div>
<div class="Text_Normal"> Even within XP and Agile circles there can be some
uncertainty about what is meant by Acceptance Testing and how it
differs from unit testing. There can be a tendency to define it
simply as coarser-grained testing with a larger part of the
system exercised, in contrast to unit tests at the class or
method level.</div>
<div class="Text_Normal"> We use the following definition. 
</div>
<div class="Text_Normal"><I>A test is an acceptance test only if a
customer representative understands it</I>.</div>

<div class="Text_Normal"> In principle, a customer representative should write it also.
The aim is to test that customer requirements have been
fulfilled: if these have to be 'translated' by a developer,
implemented and then handed back, there is an added danger that
some misunderstanding creeps in during this process.</div>
<div class="Text_Header">Expression formats for Acceptance Tests</div>
<div class="Text_Normal"> Now, you might be lucky enough that your customer is
perfectly comfortable reading and writing code in a generic
programming language: but you probably won't be. A generic tool
needs to assume minimal technical skills on the part of customer
representatives: after all, if they're happy programming, why
would they hire you?</div>
<div class="Text_Normal"> It is to some extent possible to &ldquo;hide&rdquo; the fact
that a programming language is being used and try to present a
very minimal subset to the customer representative. However,
there can be a tendency for the power of the programming
language to tempt more technical people to turn the tests into
programs in their own right, inevitably losing in
expressiveness.</div>
<div class="Text_Normal"> This has led many customer-oriented tools to try and create
their own, simpler language for expressing tests in the hope
that non-technical people would be able to understand tests
written in this and technical types don't get carried away with
what they can do. In practice, this is generally misguided. It
is very hard to define a 'generic test language' that is
suitable and expressive enough for all possible domains, while
still keeping it simple enough to be written, modified and read
by people with minimal technical knowledge. Such efforts
generally grow and grow until they are practically a programming
language anyway, with less of the power - in effect the worst of
all worlds. These &ldquo;generic test languages&rdquo; are
referred to as &ldquo;tool-defined languages&rdquo; on this
site, others have used the term &ldquo;vendorscripts&rdquo;.</div>

<div class="Text_Header">Our preferred format: Domain Languages</div>
<div class="Text_Normal"> Domain experts have their own language. With the advent of
<A class="Text_Link" HREF="http://domaindrivendesign.org/">domain-driven design</A>,
there is a growing realisation of the importance of developers
becoming immersed in this language so that it becomes
'ubiquitous', so that anyone on the team can converse freely in
it. An obvious implication, then, is that acceptance tests
should be written in this language, or at least in an executable
subset of it. We are convinced that this will always be the most
expressive, if not always the most powerful, form for tests.</div>
<div class="Text_Normal"> In practice this means a test tool defining a &ldquo;domain
meta-languiage&rdquo; with as little syntax as possible, with
the actual terminology (&ldquo;verbs and nouns&rdquo;) being
filled in entirely from the domain. It is essential to keep this
vanishingly simple to avoid falling into the traps above. We
have found it useful to support:</div>
<div class="Text_Normal">

	<LI>Statements of the form &lt;verb&gt; [&lt;noun&gt;]
	<LI>Extraction of common groups of statements into separate
	files, where they can be &ldquo;called&rdquo;.
</div>
<div class="Text_Normal"> If you are mainly concerned with testing a system as it is
used by its users, which is the basic aim of our tools, this
should be sufficient. There should be no need for conditional
logic as each test is a sequence of pre-determined actions.
There is no need for loops as the user has no way of
auto-repeating an action anyway. If assertion is done via
logging, as in our tools, there is no need for pre-defined
syntax for that or any concept of variables, which simplifies
the language further.</div>

<div class="Text_Normal"> Naturally, more &ldquo;artificial&rdquo; testing, where you
are trying to simulate high load or something, can place more
demands on what the test should do. We have found it useful to
keep the &ldquo;simulation&rdquo; tools separate from the test
scripts, so that simulation can have the power of a real
programming language without loading down the tests with a
programming language's syntax.</div>

