

<!-- Perhaps move to a more central place -->
<script type="text/javascript">
<!--    
function show_kms(mylink, windowname)
{
  if (! window.focus)return true;
  var href;
  if (typeof(mylink) == 'string')
  href=mylink;
  else
  href=mylink.href;
  window.open(href, windowname, 'width=850,height=650,resizable=no,scrollbars=no');
  return false;
}

//-->
</script>

<div class="Text_Main_Header">KataMinesweeper</div>



<div class="Text_Main_Header">An example solution using Python and
TextTest 
</div>
<div class="Text_Description">by <A class="Text_Link" HREF="http://www.linkedin.com/in/emilybache">Emily
Bache</A></div>
<div class="Text_Normal">Test Driven Development (TDD) is a
way of programming where you start be specifying a (failing) test,
write code until it passes, then refactor. Repeat. This technique has
been hugely valuable and adopted widely since it was introduced to
the world by <A class="Text_Link" HREF="http://www.amazon.com/Test-Driven-Development-Addison-Wesley-Signature/dp/0321146530">Kent
Beck</A> and others. The classic way to perform TDD is to specify the
tests using the same programming language as the code under test,
with the help of a little framework called xUnit. (Replace &ldquo;x&rdquo;
with the language of choice). But how would TDD look if you used
another tool instead of xUnit? Is there a way of capturing the
advantages of the approach, but using tests that are easier to write
and maintain?</div>
<div class="Text_Header">About TDD with
TextTest</div>
<div class="Text_Normal">I begain using xUnit in 2000 and
have been improving my skill at TDD ever since. Recently though I
have been working less and less with xUnit tests, and more and more
with using TextTest tests to drive development. This approach seems
to preserve the original spirit of TDD, ie the tests are still
driving development, but there are some differences and advantages.  
</div>
<div class="Text_Normal">When you use TextTest to drive
development, your tests all end up being written in a representation
that is separate from your code, ie a kind of Domain Specific
Language (DSL). Your tests can be read and understood by anybody who
understands the domain of the system under test, that is, they don't
have to be able to read or write program code. You typically don't
write new code when you write a new test, you just specify new
desired program behaviour using this DSL. This makes it quick to add
new tests, and easy to refactor your code later, since the test
doesn't place any demands on the internal structure of your program
(its classes and methods).</div>
<div class="Text_Normal">With xUnit tests, each test is only
working with a small section of code, whereas a TextTest typically
drives a path through a whole system or subsystem. This means that
you need to use another technique to get fine grained visibility of
what your code is doing. Instead of turning to a debugger, the
approach with TextTest is to insert log statements into your code.
Having your application write a log is not a new idea and there are a
number of excellent logging frameworks out there. TextTest allows you
to not only specify the behaviour of your application in terms your
customer will understand, but also control the application logging
behaviour. When you make a code change, and your program no longer
behaves the way the customer wants, (you introduce a bug), you can
turn to the recorded application log to pinpoint exactly where
program behaviour has deviated from previously. So a test case
consists basically of program input, expected user-readable output,
and an application log.</div>
<div class="Text_Normal">Another aspect of TDD with xUnit,
is that it in some sense forces you to make good low level design
decisions, and you don't generally get the same direct effect with
TextTest. With xUnit, your code must exhibit loose coupling and high
cohesion before you can extract units of code to test. This is
desireable, and TextTest does not force you to do it, since it tests
at a higher level of granularity. (On the other hand, if you are
starting with poorly structured legacy code, where easily extractable
units are hard to come by, you can get going with TextTest more or
less immediately just by adding some (hopefully) harmless log
statements. But I am not talking about legacy code in this article). 
</div>
<div class="Text_Normal">The other thing that TDD with xUnit
does to help with low level design, is that when you define your
test, you are effectively designing the interface to your class. I'm
talking about choice of method names, and what arguments you give
them. This is useful because it forces you to think about the
external interface to your class before you consider the internal
implementation. TextTest doesn't help much with this either. It will
force you to start defining the interface to your whole program or
subsystem, but it won't help on the class level. So when developing
with TextTest we suggest something called &ldquo;usage first&rdquo;
design. Start with the external interface to your program, and write
code as if the classes and methods you want are already there. Then
fill in the implementations, always working top down, and defining
the usage of a class or method before your implement it. This takes
some discipline, but leads to a similar effect to using xUnit.</div>
<div class="Text_Header">About Code Katas</div>
<div class="Text_Normal">A <A class="Text_Link" HREF="http://www.codekata.com/">code
Kata</A> is an idea introduced by Dave (Pragmatic) Thomas. He points
out that specialists in other disciplines do a lot more practicing
than programmers do, in order to improve their skills. Others have
further developed this concept into the idea of a &ldquo;Coding
dojo&rdquo;, or a place where programmers meet to practice code Kata
together. The website <A class="Text_Link" HREF="http://www.codingdojo.org/">www.codingdojo.org</A>
is a resource for these communities, and amongst other things has a
<A class="Text_Link" HREF="http://www.codingdojo.org/cgi-bin/wiki.pl?KataCatalogue">catalogue</A>
of various code Kata exercises various individuals and groups have
worked on. 
</div>
<div class="Text_Header">About the
KataMinesweeper screencast</div>
<div class="Text_Normal">So that is all the theory, how does
it work in practice? In this screencast, I demonstrate a Prepared
Kata of <A class="Text_Link" HREF="http://www.codingdojo.org/cgi-bin/wiki.pl?KataMinesweeper">KataMinesweeper,</A>
using TextTest to drive development, in python. During development, I
aim to work in a Test Driven manner, and I want to develop top down,
usage first, in small steps. The idea is that although in real life
you may not be so strictly test driven, or exclusively top down, or
use such small steps, that it is important to know how to do these
things, and they are worth practicing on a toy problem like this. 
</div>
<div class="Text_Normal">My aim is to demonstrate what it is
like to do TDD with TextTest, and how you might solve this code Kata
using the python programming language. If you would like to comment
and give me constructive feedback on this screencast, I would love to
hear from you. Please comment on <A class="Text_Link" HREF="http://www.codingdojo.org/">www.codingdojo.org</A>
or the <A class="Text_Link" HREF="https://lists.sourceforge.net/lists/listinfo/texttest-users">TextTest
mailing list,</A> or the <A class="Text_Link" HREF="http://groups.google.com/group/comp.lang.python/topics">python
mailing list</A>.</div>
<div class="Text_Normal">The screencast is in four parts,
and I estimate each part will take you about 10 &ndash; 15 minutes to
view. 
</div>
<UL>


 <LI><A class="Text_Link" class="Text_Link" onclick="return show_kms(this, 'KataMineSweeper')" HREF="include/documentation/kataminesweeper/KataMinesweeperFirstBit.htm">KataMinesweeperPart1</A>
    <LI><A class="Text_Link" class="Text_Link" onclick="return show_kms(this, 'KataMineSweeper')" HREF="include/documentation/kataminesweeper/KataMinesweeperSecondBit.htm">KataMinesweeperPart2</A>
    <LI><A class="Text_Link" class="Text_Link" onclick="return show_kms(this, 'KataMineSweeper')" HREF="include/documentation/kataminesweeper/KataMinesweeperThirdBit.htm" >KataMinesweeperPart3</A>
    <LI><A class="Text_Link" class="Text_Link" onclick="return show_kms(this, 'KataMineSweeper')" HREF="include/documentation/kataminesweeper/KataMinesweeperFourthBit.htm">KataMinesweeperPart4</A>

</UL>
<div class="Text_Normal"><I>(Note:
This screencast was created using <A class="Text_Link" HREF="http://www.debugmode.com/wink/">Wink</A>.
In it I use Windows Vista Home Edition, <A class="Text_Link" HREF="http://www.easyeclipse.org/site/distributions/lamp.html">Easy
Eclipse for LAMP</A> version 1.2.2 and <A class="Text_Link" HREF="http://texttest.org/">TextTest</A>
version 3.9.1.)</I></div>
<div class="Text_Normal">Here is
                                                          the final code that I end up with: (Click to enlarge)</div>
<A class="Text_Link" class="Text_Link" href="include/documentation/kataminesweeper/KataMinesweeper_htm_37bb559.jpg">
<IMG width="750" height="1100"  SRC="include/documentation/kataminesweeper/KataMinesweeper_htm_37bb559.jpg" NAME="graphics1" border=0>
</A>
                 
<div class="Text_Normal">And
here it is again in plain text in case you can't read that
screenshot:</div>
<div class="Text_Normal"><BR>
</div>
<PRE>
     import sys
     def log(message):
         print &gt;&gt; sys.stderr, message
     
     MINE = &quot;*&quot;
     END_OF_INPUT = &quot;0 0&quot;
     
     class Minefield:
         def __init__(self, m, n, minefield):
             self.m = m
             self.n = n
             self.minefield = minefield

         def clues_to_str(self, clues):
             clues_str = &quot;&quot;
             for i in range(self.m):
                 for j in range(self.n):
                     clues_str += str(clues[(i, j)])
                 clues_str += &quot;\n&quot;
             return clues_str

         def clues(self):
             clues = dict.fromkeys([ (x, y) for x in range(self.m)\
                  for y in range(self.n)], 0)
             log(&quot;initialized clues dictionary %s&quot; % clues)
             for x, row in enumerate(self.minefield.splitlines()):
                 for y, cell in enumerate(row):
                     if cell == MINE:
             clues[ (x, y) ] = MINE
             self.increment_adjacent(clues, x, y)
             log(&quot;calculated clues %s&quot; % clues)
             clues_str = self.clues_to_str(clues)
             return clues_str

         def increment_adjacent(self, clues, x, y):
             for i in (x-1, x, x+1):
                 for j in (y-1, y, y+1):
                     if clues.get( (i, j) ) not in [None, MINE]:
             clues[ (i, j) ] += 1

     def MinefieldReader(inputfile):
         next = iter(inputfile).next
         while 1:
             shape = next().strip()
             if shape == END_OF_INPUT:
                 raise StopIteration()
             m, n = map(int, shape.split())
             log(&quot;found minefield shape %s %s&quot; % (m, n))
             minefield = &quot;&quot;
             for i in range(m):
                 minefield += next()
             yield m, n, minefield

     def main(inputfile, outputfile):
         counter = 0
         for m, n, minefield in MinefieldReader(inputfile):
             counter += 1
             print &gt;&gt; outputfile, &quot;Field #%d:&quot; % counter
             print &gt;&gt; outputfile, Minefield(m, n, minefield).clues()

     if __name__ == &quot;__main__&quot;:
         inputfile = sys.stdin
         outputfile = sys.stdout
         main(inputfile, outputfile)</PRE>
</BODY>
</HTML>