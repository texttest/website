

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
<div class="Text_Description">An example solution using Python and TextTest by <A class="Text_Link" HREF="http://www.linkedin.com/in/emilybache">Emily Bache</A></div>
<div class="Text_Normal">At the <A class="Text_Link" HREF="http://xp2007.org/">XP2007</A>
conference, Geoff and I presented a <A class="Text_Link" HREF="http://www.xp2007.org/index.php?option=com_content&amp;task=view&amp;id=91.html">workshop</A>
entitled &ldquo;The coder's dojo: Acceptance Test Driven Development
in python&rdquo;. (Geoff also presented the same workshop at
<A class="Text_Link" HREF="http://agile2007.org/">agile2007</A>). We had three aims
with this workshop, the first was to use the meeting format of a
<A class="Text_Link" HREF="http://www.codingdojo.org/">coders dojo</A>, the second was
to do some coding in <A class="Text_Link" HREF="http://www.python.org/">python</A> and
the third was to demonstrate how you can do <A class="Text_Link" HREF="http://texttest.carmen.se/AcceptanceTesting/index.html">Acceptance
Test</A> Driven Development using <A class="Text_Link" HREF="http://texttest.org/">TextTest</A>.
We felt the workshop went well, we had around 30 participants and we
were able to do a little of everything we had set out to do. 
</div>
<div class="Text_Normal">Perhaps the most important thing
was what we learnt from the experience. The workshop participants
gave us some very useful feedback. One thing people said was that
there were too many new ideas presented to expect as much audience
participation as we did, and that instead of trying to do a <A class="Text_Link" HREF="http://www.codingdojo.org/cgi-bin/wiki.pl?RandoriKata">Randori
style kata</A>, we should have done it as a <A class="Text_Link" HREF="http://www.codingdojo.org/cgi-bin/wiki.pl?PreparedKata">Prepared
kata</A>. There also seemed to be a view that the Kata we had chosen
(<A class="Text_Link" HREF="http://www.codingdojo.org/cgi-bin/wiki.pl?KataTexasHoldEm">KataTexasHoldEm</A>)
was quite a difficult one. Another very valuable piece of feedback
was that we were doing <A class="Text_Link" HREF="http://www.codingdojo.org/cgi-bin/wiki.pl?TestDrivenDevelopment">Test
Driven Development</A> (TDD) with much larger steps than people were
used to. 
</div>
<div class="Text_Normal">This screencast is an attempt to
address this feedback, and open up our workshop material to a larger
audience. Geoff and I have been developing this approach to testing
for a few years now, and we think it deserves consideration by the
wider agile testing community.  
</div>
<div class="Text_Normal">When
you use TextTest to drive development, your tests all end up being
written in a representation that is separate from your code, ie a
kind of Domain Specific Language. Your tests can be read and
understood by anybody who understands the domain of the system under
test, that is, they don't have to be able to read or write program
code. TextTest is not unique in this, for example <A class="Text_Link" HREF="http://fit.c2.com/">FIT</A>
tests are similarly readable to customers/end users. Geoff wrote this
<A class="Text_Link" HREF="http://texttest.carmen.se/AcceptanceTesting/others.html">article</A>
a little while ago giving his opinion on various different testing
tools. 
</div>
<div class="Text_Normal">In the screencast, I demonstrate a
Prepared Kata of <A class="Text_Link" HREF="http://www.codingdojo.org/cgi-bin/wiki.pl?KataMinesweeper">KataMinesweeper,</A>
using TextTest to drive development, in python. Again, I have three
aims. I want to demonstrate how to use TextTest, coding in python,
and how you might solve this particular Kata.</div>
<div class="Text_Normal">During development, I aim to work
in a Test Driven manner, using TextTests to drive development rather
than xUnit tests. I want to develop top down, usage first, in small
steps. The idea is that although in real life you may not be so
strictly test driven, or exclusively top down, or use such small
steps, that it is important to know how to do these things, and they
are worth practicing on a toy problem like this. 
</div>
<div class="Text_Normal">If you would like to comment and
give me constructive feedback on this screencast, I would love to
hear from you. Please comment on <A class="Text_Link" HREF="http://www.codingdojo.org/">www.codingdojo.org</A>
or the <A class="Text_Link" HREF="https://lists.sourceforge.net/lists/listinfo/texttest-users">TextTest
mailing list,</A> or the <A class="Text_Link" HREF="http://groups.google.com/group/comp.lang.python/topics">python
mailing list</A>.</div>
<div class="Text_Normal">The screencast is in four parts,
and I estimate each part will take you about 10 &ndash; 15 minutes to
view. 
</div>
<UL>
	
    <LI><A class="Text_Link" onclick="return show_kms(this, 'KataMineSweeper')" HREF="<?php echo $basePath ?>/kataminesweeper/KataMinesweeperFirstBit.htm">KataMinesweeperPart1</A>
    <LI><A class="Text_Link" onclick="return show_kms(this, 'KataMineSweeper')" HREF="<?php echo $basePath ?>/kataminesweeper/KataMinesweeperSecondBit.htm">KataMinesweeperPart2</A>
    <LI><A class="Text_Link" onclick="return show_kms(this, 'KataMineSweeper')" HREF="<?php echo $basePath ?>/kataminesweeper/KataMinesweeperThirdBit.htm" >KataMinesweeperPart3</A>
    <LI><A class="Text_Link" onclick="return show_kms(this, 'KataMineSweeper')" HREF="<?php echo $basePath ?>/kataminesweeper/KataMinesweeperFourthBit.htm">KataMinesweeperPart4</A>
	
</UL>
<div class="Text_Normal"><I>(Note:
In the screencast I use Windows Vista Home Edition, <A class="Text_Link" HREF="http://www.easyeclipse.org/site/distributions/lamp.html">Easy
Eclipse for LAMP</A> version 1.2.2 and <A class="Text_Link" HREF="http://texttest.org/">TextTest</A>
version 3.9.1.)</I></div>
<div class="Text_Normal">Here is
the final code that I end up with:

<PRE>import sys
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
    </div>
