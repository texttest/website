<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">About Texttest</div>
  <div class="Text_Header">Background</div>
   <div class="Text_Normal">
     We feel that the world still produces way too much software that is frankly substandard. 
     The reasons for this are pretty simple: software producers do not pay enough
     attention to testing, or rely too heavily on manual testing. Manual testing 
     should be focussed on examining the user experience and finding complex bugs, 
     and too often it is used for simple regression testing : to check that the 
     latest release does not crash on startup.
   </div>
   
   <div class="Text_Normal">
     We are warm adherents of <a class="Text_Link" href="http://www.agilealliance.org/">Agile Development</a> practices, 
     and practitioners of <a class="Text_Link" href="http://www.xprogramming.com/">Extreme Programming</a>. 
     We believe that the Agile movement has improved the software quality situation a great deal, 
     by moving testing to the centre of the development process and making developers 
     directly responsible for verifying the quality of their code.
     Since 2000 we have been exploring different ways of creating high-level tests that 
     communicate intent and can be understood and created by non-technical customers (Acceptance Tests). 
     The front end and common factor is a tool called TextTest.
    </div>

	  <div class="Text_Header">Verifying Application Behaviour with TextTest</div>
	
<div class="Text_Normal">As the name suggests, TextTest works via comparing plain text
logged by programs with a previous 'gold standard' version of
that text. This is in contrast to most acceptance testing
frameworks on offer today, which generally use some form of
hand-written 'assertions' by the test writer that call into an
application API.</div>
<div class="Text_Normal">So, when your test fails and you click on it to see what went
wrong, you might see this (Click to Enlarge):</div>

<div class="Text_Normal"><A class="Text_Link" href="images/tkdiff.JPG"><IMG width="650" SRC="images/tkdiff.JPG"></A>
</div>
<div class="Text_Normal">On the left you see what we wanted the program to produce. On
the right we see what actually happened. This is testing a small
'video store' application, and this test checks that the same
movie cannot be added twice. Given what happened, it obviously
can right now...</div>
<div class="Text_Normal">The focus is around testing a particular executable program
with a variety of inputs. To start with, a plain text
configuration file is created that tells TextTest about your
program, how to run it, and how to test it. Tests (and test
suites) are then defined entirely using plain text files in a
directory structure. 
</div>
<div class="Text_Normal">A test is defined partly by the expected files and their
contents that should be produced, and partly by the 'input' to
provide, which can consist any or all of:</div>
<UL>
	<LI><div class="Text_Normal">Options to be provided on the
	command line 
	</div>

	<LI><div class="Text_Normal">A file to be redirected to
	standard input 
	</div>
	<LI><div class="Text_Normal">Environment variables that
	should be set 
	</div>
	<LI><div class="Text_Normal">A sequence of 'use-case' actions to be performed on a GUI
	(see <A class="Text_Link" HREF="index.php?page=concepts&n=xusecase">Use-case Recorders</A>) 
	</div>
</UL>
<div class="Text_Normal">The application needs to write a log file describing what is
happening, similar to the one shown above. Any output at all can
be compared, so long as it is plain text, or can be converted to
it. 
</div>
<div class="Text_Normal">For people wanting to test a GUI (custom or Web) you will need
some scripting approach to that GUI so that tests can be run
without needing somebody to click the buttons. We recommend
<A class="Text_Link" HREF="index.php?page=concepts&n=xusecase">Use-case Recorders</A> and have
some tools that can help you... it's probably good to understand
these before trying to understand TextTest in more detail.</div>

			</TD>  
  </td>
 </tr>
</table>
