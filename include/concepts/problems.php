<div class="Text_Header">Frequently raised objections to Use-case Recording</div>
				
		
				
<OL>
<div class="Text_Normal"><B><li><I>Surely record/playback has been discredited by
now?</I></B><BR> Traditional
record/replay tools have generally not been popular in the
Agile community. This with good reason: they don't generally
produce very maintainable tests, and having to constantly
re-record tests is frustrating and error prone (besides the
fact that they are often very expensive). They do have
advantages though: no technical skills are needed in order to
use them, tests can be created very quickly and they
exercise the whole system. It's important to separate the
record/playback <I>idea</I> from the way it has worked in
practice in the past. 
</div>

<div class="Text_Normal">Our aim is to re-implement the
idea in a more agile and maintainable way, and we hope that
maintaining existing tests will not involve using the recorder
very much. Instead, the high-level script that has been
recorded can be tweaked in a normal text editor. It is much
easier to edit this style of script than it is to create it
from scratch, as you need to do in an API-driven approach. When
you want to create tests that are pretty similar to existing
tests, it will also probably be faster to copy and tweak than
to record from scratch.</div>
<div class="Text_Normal"><B><li><I>OK, but all
this changing code to monitor components seems very laborious.
Surely that can be automated?</I></B><BR> Yes it can, but
then you revert to some of the weaknesses of more traditional
record/playback tools. In particular, the tool cannot know what
you intend to achieve with a user action, so it can only record
something in terms of the mechanics of what happened. This
means that, rather than a domain language script, you get
something that is pretty tied to how the current GUI looks
which will probably need redoing if the GUI changes very much
(The days when tests broke just due to moving a button across
the screen are probably over &ndash; but changing widget will
still generally break things, for example)</div>
<div class="Text_Normal">The component monitoring changes are not as laborious as
they seem, generally. In practice, you will need to change your
code anyway to accommodate a record/playback tool of any sort.
This because most tools now on offer use inference from things
like widget names to try to record something higher level than
the pixel co-ordinates that were clicked. If you don't set
widget names, your script will be even harder to understand.</div>
<div class="Text_Normal">If your GUI is at all multi-threaded, you're likely to need
to do a fair bit of hand-hacking of the tests to make
traditionally record/playback tests work. At best there will be
some means of hand-inserting a statement that waits for the GUI
to change appearance. At worst, you will have to hand-insert
'sleep' statements. Our <a class="Text_Link" href="index.php?page=concepts&n=appevents">application
events</A> mean waiting is just something else that is
recorded.</div>

<div class="Text_Normal"><B><li><I>But I want to drive my
high-level design with high-level tests.</I></B><BR> In this
case, there is no question but that you will need an API-driven
approach to driving your GUI. Do bear in mind, though, that
acceptance tests are meant to exist primarily for the customer
&ndash; not to help you with your design (which is more a unit
test issue), and that these aims can easily come into conflict.
We are of the view that the pain of design-dependent acceptance
tests is worse than the gain of being able to use the tests as
a means to get domain concepts into the design (see the fourth
reason on the <a class="Text_Link" href="index.php?page=concepts&n=whylog">TextTest
justification</A> page). In general, the less coupling there is
between acceptance tests and design, the more freedom you have
to get both right without worrying about the other (just like
too much coupling between objects is a bad thing for software
design)</div>
<div class="Text_Normal"></div>
<div class="Text_Normal"><B><li><I>How can I write tests for functionality that
doesn't exist yet?</I></B><BR>
See the equivalent question on the <a class="Text_Link" href="index.php?page=concepts&n=logprobs">Frequently-raised
objections to TextTest </A>page. In a similar way, recorded
scripts can have free text added to them to express what the
user wanted to do with the GUI but couldn't yet. As with
editing a log, this may well not be the final version of the
test and should be understood as a starting point for a
discussion between customer and developer, in the expectation
that both code and test will need refining before a working
test can be added to the test suite.</div>

<div class="Text_Normal"><B><li><I><a class="Text_Link" href="index.php?page=concepts&n=shortcuts">GUI
shortcuts</A> are a pretty basic refactoring tool. I can't pass
arguments to them, for example.</I></B><BR> Use-case recording is
not a fully-fledged scripting engine. It's meant to be a GUI
simulation tool with automated tests in mind. If you want to
provide advanced scripting capabilities, you need a proper
scripting interface to your system, using a real scripting
language like Python. 
</div>
<div class="Text_Normal">The bet is that you probably
won't need something that sophisticated just to write automated
tests. By scripting your tests with a generic programming
language, you gain in refactoring power but the tests read more
like code and less like natural language, making them a bit
more frightening to non-coders and inevitably a bit lower
level. And the temptation is always there for coders to run
away with them and turn them into a program in their own right:
something we think should be discouraged.</div>
<div class="Text_Normal">In practice there will be
duplication in the tests, even with shortcuts. But the tests
are not code: they are plain text files, and some duplication
is OK. Performing simple transformations on a lot of similar
text files is not a difficult task for somebody who can write a
simple script.</div>
					</OL>
