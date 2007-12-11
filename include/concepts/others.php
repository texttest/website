<div class="Text_Header">Other tools for Acceptance Testing</div>			
<div class="Text_Normal">There are hundreds of tools out there that aim to do
automated testing at a more or less high level. This is only a
brief survey of what we consider to be the most interesting ones
(other than our own) and how they compare to using the tools
available here. 
</div>

<div class="Text_Normal">It seems simplest to break the problem down into application
types, which have different considerations and in some cases
different tools.</div>

  <div class="Text_Normal"><A href="index.php?page=concepts&n=others#non-interactive_calculators">Non-interactive calculators.</a> Here I mean a tool
      which essentially takes some input, performs some calculation
and produces some output without any interaction from a user
other than starting it. Such tools may not have a GUI, or the
GUI may be entirely focussed on setting up the input and
displaying the output, and as such testing the GUI can be
considered as a separate problem.</div>
<div class="Text_Normal"><A href="index.php?page=concepts&n=others#interactive_tools">Interactive tools with a custom GUI.</a>Here I
include anything using a standard GUI toolkit, and also
interactive console programs controlled via standard input
responses. Acceptance Testing them is viewed as testing their
&ldquo;use cases&rdquo; - modelling a series of GUI actions
from a user (workflow).</div>
<div class="Text_Normal"><A href="index.php?page=concepts&n=others#web_applications">Web applications.</a> Anything run over HTTP in a
standard web browser - not including Flash, ActiveX and things
like that.</div>


<div class="Text_Header"><a name="non-interactive_calculators"></a>Non-interactive calculators</div>
<div class="Text_Normal">Here our candidate tool is <A class="Text_Link" HREF="index.php?page=about">TextTest</A>
alone, with no need for simulating user input. The main
alternative I have come across is <A class="Text_Link" HREF="http://fit.c2.com/">Fit</A>
using ColumnFixture (or <A class="Text_Link" HREF="http://fitlibrary.sourceforge.net">FitLibrary</A>

using CalculateFixture, but these are not very different as far
as I can see). Here is an example:</div>
<div class="Text_Normal"><IMG SRC="include/concepts/images/fitcolumnfixture.gif" NAME="Graphic1" ALIGN=LEFT WIDTH=520 HEIGHT=395 BORDER=0><BR CLEAR=LEFT>
</div>
<div class="Text_Normal">This is a very compact and user-friendly format for
specifying lots of tests for a small calculator. The first three
columns specify numeric inputs and the final column the expected
output. There is a limit to how big such a table can get though
before it ceases to be a nice expression format, both in terms
of numbers of relevant input and output values and their size
(very long strings will probably not read well in this format).
For a larger &ldquo;calculator&rdquo;, it is better to separate
each test and then TextTest seems a better candidate &ndash;
it's easy to keep all the details of the data out of the way
unless you really want to look at it.</div>
<div class="Text_Normal">While it may be relatively unusual that an entire system is
of this form, it is much more common that parts of it are. It
can be very useful to identify them and test them separately in
this way.</div>

<div class="Text_Normal">Here is a <A class="Text_Link" HREF="index.php?page=concepts&n=calccomparison">table</A> comparing
the tools.</div>
<div class="Text_Header"><a name="interactive_tools"></a>Custom GUIs</div>
<div class="Text_Normal">Here our candidate tool is <A class="Text_Link" HREF="index.php?page=concepts&n=xusecase">TextTest
with PyUseCase or JUseCase</A>. Suddenly there are more
alternatives, both that try to make use of the GUI and that
bypass it and call into the system via an API instead. I have
picked out four that I regard as especially interesting.</div>
<UL>
<div class="Text_Normal"><A class="Text_Link" HREF="http://www.marathontesting.com/">MarathonMan</A>

&ndash; a record/playback tool for Java Swing GUIs that was
originally built by two guys at Thoughtworks aiming to make
record/playback a bit more agile. Tests are recorded in Python
in terms of the GUI mechanics: rather than user intent. Useful
mainly as a comparison with other modern record/playback tools.
Naturally there are many other tools of this type, of which
<A class="Text_Link" HREF="http://abbot.sourceforge.net/">Abbot </A>is probably
the most popular.</div>
<div class="Text_Normal"><A class="Text_Link" HREF="http://fit.c2.com/">Fit with ActionFixture </A>&ndash;
uses HTML tables to define tests against an API (i.e. bypasses
the GUI). ActionFixture is essentially a simple &ldquo;test
language&rdquo; with four GUI-like keywords: (check, press,
select and enter) which calls into the system under test via an
API. Included mainly because it's popular and acts as a way to
introduce the following two rather more interesting
contributions.</div>
<div class="Text_Normal"><A class="Text_Link" HREF="http://fitlibrary.sourceforge.net">Fit
with FitLibrary/DoFixture</A> &ndash; FitLibrary is an
extension for Fit that aims to support testing in a domain
language (using a meta-language called DoFixture) written by
Rick Mugridge. While you could see ActionFixture (above) as a
meta-language, it is very clumsy compared to DoFixture and
consequently hard to believe that was its intention. FitLibrary
contains many other more minor improvements and extensions to
the core Fit.</div>

<div class="Text_Normal"><A class="Text_Link" HREF="http://exactor.sourceforge.net/">Exactor</A> &ndash;
another API-driven tool focussed entirely on workflow testing.
Written by Sean Hanly and Brian Swan at Exoftware. Also
primarily focussed on the creation of a domain language for
tests. Tests expressed in simple plain text files rather than
tables: tables are great for calculations but seem to just get
in the way for workflow. Additionally provides &ldquo;standard
commands&rdquo; that define a language for driving the GUI
directly. Some other interesting features lacked by both
variants of Fit, notably a means of refactoring the tests at
the customer level, pretty similar to our own <A class="Text_Link" HREF="index.php?page=concepts&n=shortcuts">GUI
shortcuts</A></div>
</UL>
<div class="Text_Normal">There is also a <A class="Text_Link" HREF="index.php?page=concepts&n=guicomparison">table</A>

comparing the features of these tools for workflow testing of
GUIs.</div>
<div class="Text_Header"><a name="web_applications"></a>Web Applications</div>
<div class="Text_Normal">Again there are many tools, reflecting the proliferation of
this kind of application. Our own candidate is now <A class="Text_Link" HREF="index.php?page=concepts&n=webusecase">TextTest
with WebUseCase</A>. What marks this out as unique in the field?
It provides a mechanism for testing with a domain language and
it allow you to record tests live, as with custom GUIs.</div>
<div class="Text_Normal">For comparison, both Fit and Exactor have web testing
mechanisms, <A class="Text_Link" HREF="http://fitnesse.org/FitNesse/HtmlFixture">&ldquo;HTMLFixture&rdquo;</A>
and &ldquo;WebCommand&rdquo;. Neither of these provide support
for use of a business domain language, though. There is also
<A class="Text_Link" HREF="http://webtest.canoo.com/webtest/manual/WebTestHome.html">Canoo
WebTest</A>, which has been around for longest. What all of
these share, and also share with WebUseCase, is the use of a
browser simulator. WebUseCase, Canoo and Fit all use <A class="Text_Link" HREF="http://htmlunit.sourceforge.net/">HtmlUnit</A>,
while Exactor uses <A class="Text_Link" HREF="http://jwebunit.sourceforge.net/">JWebUnit</A>.</div>

<div class="Text_Normal">In contrast to these four, two tools are included which have
the not inconsiderable advantage of using a real browser. <A class="Text_Link" HREF="http://wtr.rubyforge.org/">Watir</A>
drives Internet Explorer via the DOM, while <A class="Text_Link" HREF="http://www.openga.org">Selenium</A>
has a testing engine written in javascript. Watir also has the
advantage of being the only tool that generates a programming
language (Ruby) - very useful for long-term refactoring, at
least compared to the tool-defined languages in most of the
others.</div>
<div class="Text_Normal">There is also a <A class="Text_Link" HREF="index.php?page=concepts&n=webcomparison">table</A>
comparing these tools.</div>


