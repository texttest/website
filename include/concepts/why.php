<!--TITLE:why need them? PAGEINFO: Read more about why Acceptance Tests is a needed compliment to Unit Tests?PATH:page=concepts&n=why-->
<div class="Text_Header"> Why do I need Acceptance Tests as well as Unit Tests?</div>
<div class="Text_Normal">Much has been written about Unit Testing, and <A class="Text_Link" HREF="http://www.junit.org/">JUnit
</A>and its translations continue to gain in popularity. This is
good, but is it enough on its own to really ensure that your
project is on track?</div>
<div class="Text_Normal">Unit Testing is about developers verifying on a low level
that their code does what they think it does. That may not be
the same as what the paying customer wants it to do when it is
integrated into the whole system. Even if it is, the customer
probably will not be able to understand what the unit tests do,
and so cannot gain confidence in the system from them.
Therefore, Extreme Programming advocates creating and running
another kind of tests, 'Acceptance Tests' which are written by
the customer and test that the requirements are fulfilled as
they should be. 
</div>
<div class="Text_Normal">In practice, it has turned out to be harder to find a way to
do this that is generic, easy to maintain throughout a project
and easy for non-technical customers to be involved in. No
approach has yet gained anything like the widespread coverage
and acceptance gained by the xUnit tools.</div>
<div class="Text_Normal">This has led to lots of projects relying entirely on unit
tests to prove that they are on track. While this is vastly
better than not having any way of knowing whether you're on
track until release date, it can still go wrong. If your system
doesn't do what your customer wants it to do, it's better to
know that as soon as possible.</div>

<div class="Text_Normal">The situation has also led to projects writing their own
tools for acceptance testing that will suit just their project.
We did this for the first time in 2000. Since then, we have
re-used and refined it in a number of other projects, until in
2003 we decided it was generic enough to be released open
source.</div>
