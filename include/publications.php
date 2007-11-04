<!--TITLE:Publications PAGEINFO:Here you will find publications and presenstions about texttest and read about events PATH:page=publications-->


 <table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Publications, Presentations & Events</div>
   <?php

   if ($_GET['n'] == "best_practice") include 'bestpractices.htm';
   else {

   ?>

   <div class="Text_Normal">The following presentations and papers can be downloaded:</div>
   <UL>
     <LI> <div class="Text_Normal"><a class="Text_Link"  HREF="index.php?page=publications&n=best_practice">Best Practice Workshop discussion from XP2005 conference</A></div>
     <LI> <div class="Text_Normal"><a class="Text_Link"  HREF="ooffice.zip">XP2005 and Europython2005 presentations (OpenOffice format)</A></div>
     <LI> <div class="Text_Normal"><a class="Text_Link"  HREF="powerpoint.zip">Same presentations (Powerpoint format)</A></div> 
     <LI> <div class="Text_Normal"><a class="Text_Link"  HREF="FurtherAT_XP2005.pdf">Poster from XP2005 (&ldquo;Further Adventures...&rdquo;)</A></div>
     <LI> <div class="Text_Normal"><a class="Text_Link"  HREF="GUITest_XP2004.pdf">Whitepaper from XP2004 (&ldquo;Adventures in GUI testing...&rdquo;)</A></div>
     <LI> <div class="Text_Normal"><a class="Text_Link"  HREF="ATDD_XP2003.pdf">Whitepaper from XP2003 (&ldquo;Acceptance Test Driven Development...&rdquo;)</A></div>
     <LI> <div class="Text_Normal"><a class="Text_Link"  HREF="one_suite.zip">Poster from XP2002 (&ldquo;One Suite of Automated Tests...&rdquo;)</A></div>	
   </UL>
   
   <div class="Text_Main_Header">Detailed info : Printed publications</div>
   <div class="Text_Normal">                                       
     At <a class="Text_Link"  HREF="http://www.xp2005.org/">XP2005 in Sheffield, UK</A>,
     we presented a poster <a class="Text_Link"  HREF="FurtherAT_XP2005.pdf"><I>&ldquo;Web
     Applications, Multithreading, Parallel Testing and Multiple
     Components: Further Adventures in Acceptance Testing&rdquo; 
     </I></A>(Geoff Bache, Johan Andersson and Claes Verdoes),
     outlining the work we had done in the past year: introducing
     JUseCase and WebUseCase, exploring the issues around testing
     multithreaded applications, discussing parallelising acceptance
     testing and how to test multi-component systems. 
   </div>
   <div class="Text_Normal">
     At <a class="Text_Link"  HREF="http://www.xp2004.org/">XP2004 in Garmisch,
     Germany</A>, we presented our testing approach in a full paper
     <a class="Text_Link"  HREF="GUITest_XP2004.pdf">&ldquo;<I>The Video Store Revisited
     Yet Again: Adventures in GUI Acceptance Testing&rdquo;</I></A>
     (Geoff Bache and Johan Andersson), particularly introducing the
     concept of a use case recorder and how the approach can be used
     to test GUIs also.
   </div>
   <div class="Text_Normal">
      At XP2003 in Genoa, Italy, we presented a full paper 
     <a class="Text_Link"  HREF="ATDD_XP2003.pdf">&ldquo;<I>XP
     with Acceptance Test Driven Development &ndash; A rewrite
     project for a resource optimization system&rdquo;</I></A> (Geoff
     Bache, Johan Andersson and Peter Sutton) outlining in more
     detail our team's process and how the newly released TextTest
     fitted into that. Peter Sutton was the customer on the relevant
     project.
  </div>

  <div class="Text_Normal">
    At the XP2002 conference in Alghero, Sardinia, we presented a
    poster <a class="Text_Link"  HREF="one_suite.zip">&ldquo;<I>One Suite of Automated
    Tests &ndash; Examining the Unit/Functional Divide&rdquo;</I></A>
    (Geoff Bache and Emily Bache) exploring how to define acceptance
    testing and presenting our experiences in using acceptance
    testing rather than unit testing to support XP-style
    development.</div>
 <div class="Text_Main_Header">Detailed info: Workshops and tutorials</div>
 <div class="Text_Normal">In 2007 we plan to run a <a class="Text_Link"  HREF="http://www.xp2005.org/workshops/W01.pdf">&ldquo;Coder's
    Dojo&rdquo;</A> based around a little exercise in Python using
    the testing techniques described on this site. The basic aim is
    to showcase how to drive development from acceptance tests
    rather than unit tests. This has been accepted for both <a class="Text_Link"  HREF="http://www.xp2007.org/">XP2007
    in Como, Italy</A>, and <a class="Text_Link"  HREF="http://www.agile2007.org/">Agile2007
    in Washington DC.</A></div>

 <div class="Text_Normal">At XP2006 in Oulu, Finland, I ran an upgraded version of the
    tutorial described below, together with Emily Bache. This
    focussed on two small but non-trivial problems, a low-level
    build script with lots of system dependencies and a Java GUI
    working against a database. Unfortunately the site for XP2006
    seems to have been removed, while those for 2005 and 2004 are
    still active.</div>
 <div class="Text_Normal">At <a class="Text_Link"  HREF="http://www.xp2005.org/">XP2005</A>, I ran two
    workshops <a class="Text_Link"  HREF="http://www.xp2005.org/workshops/W11.pdf">&ldquo;<I>Hands
    on Domain-driven Acceptance Testing using TextTest, FitLibrary
    and Exactor&rdquo;</I></A> and <a class="Text_Link"  HREF="http://www.xp2005.org/workshops/W13.pdf">&ldquo;<I>Exploring
    Best Practice for XP Acceptance Testing&rdquo;</I></A>, jointly
    with Rick Mugridge, author of FitLibrary and Brian Swan, author
    of Exactor. As part of the first one I presented TextTest and
    xUseCase, essentially summarising the material on this site. As
    part of the second one I presented an overview of
    record/playback tools and approaches.
 </div>
 <div class="Text_Normal">
    At <a class="Text_Link"  HREF="http://www.europython.org/">Europython 2005</A> a
    week later, I ran a <a class="Text_Link"  HREF="http://www.python-in-business.org/ep2005/talk.chtml?talk=2017&amp;track=690">tutorial
    on TextTest</A> jointly with Emily Bache. She presented an
    introduction to TextTest based on how she has used it in her
    team, and I presented some of its more &ldquo;advanced
    features&rdquo;. These presentations are aimed more at Python
    developers than the general audience. Johan Andersson also
    presented a session on <a class="Text_Link"  HREF="http://www.python-in-business.org/ep2005/talk.chtml?talk=2300&amp;track=770">&ldquo;<I>Using 
    tests for team motivation&rdquo;</I></A>, highlighting the use
    of TextTest for acceptance testing.</div>

 <div class="Text_Normal">
    All four of these presentations are available (zipped) in
    <a class="Text_Link"  HREF="ooffice.zip">OpenOffice</A> and 
    <a class="Text_Link"  HREF="powerpoint.zip">Powerpoint</A>format. 
    They are all originally OpenOffice so they may be a
    bit mangled in Powerpoint...</div>
 <div class="Text_Main_Header">Best practice workshop XP2005</div>
 <div class="Text_Normal">This was a discussion-based workshop. A summary of the
   discussion can be found <a class="Text_Link"  HREF="bestpractice.html">here</A>.</div>
 </div>
  
   </div>

<?php } ?>
   </td>
 </tr>
</table>
