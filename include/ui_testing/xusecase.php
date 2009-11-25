<div class="Text_Header">Maintainable GUI testing with a Use Case Recorder</div> 
<div class="Text_Description">Recording the intent rather than the mechanics</div>
<div class="Text_Normal">
  The most natural way to create tests via a user interface is
  to simply carry out the actions you wish to perform and have a tool
  that can record them and then reproduce them later. This
  is a simple and fast way to create GUI tests and there exist 
  many tools that do this.
</div>
<div class="Text_Header">Most tools couple the tests tightly to the GUI</div> 
<div class="Text_Normal">
  The problems start when you have a few tests and your GUI changes.
  Recording may be a great way to create tests but it's a terrible way 
  to maintain large numbers of them. It is error-prone, frustrating and very
  time-consuming once you have a few tests. The first generation of
  tools recorded pixel positions and broke as soon as you changed your
  screen resolution. Today's tools deal in terms of the GUI mechanics:
  find a table with a certain name and click in the third column of the
  fourth row. They can survive screen changes and minor re-arrangements of the GUI but
  not much else. The recorded scripts are dense and don't convey the
  purpose of the test, and are a closed book to all non-technical people (and sometimes
  to everyone except the author of the tool).
</div>
<div class="Text_Normal">
  The problem is essentially one of coupling. The tests and the GUI are
  tightly coupled to each other and cannot comfortably vary independently
  of one another. This point is made well by Robert C. Martin in his blog
  <A class="Text_Link" href="http://blog.objectmentor.com/articles/2009/09/29/ruining-your-test-automation-strategy">
  here</A> and his conclusion is that GUI testing is inherently brittle and
  you should do as little of it as you can get away with. 
</div>
<div class="Text_Normal">
  This seems rather defeatist though. There is huge value in being
  able to demonstrate what your tests do to a user of the system.
  If the tests bypass the user interface then that process demands
  a fair amount of technical skill and a lot of trust from the part
  of your user. And anyway, software developers solve coupling problems all the time.
  The answer is, as usual, to introduce another level of indirection.
</div>
<div class="Text_Header">Breaking the coupling with a UI map</div> 
<div class="Text_Normal">
  Business people and users generally work in <i>use cases</i>. These
  are high-level descriptions of a sequence of actions in a language
  they understand: i.e. that of the domain. The idea of a "Use Case Recorder" is
  therefore a tool that can record and replay such sequences and thereby
  capture the <I>intent</I> of the user. This will then allow
  increased understanding, less dependence on the exact form of the GUI and
  easier adjustment of existing tests without resorting to
  clicking all the buttons again.
</div>
<div class="Text_Normal">
  The basic mechanism is that we maintain a mapping between the actions
  that can currently be performed with our GUI and statements in this domain
  language. GUI changes then mean that this single mapping needs to be updated,
  but the tests can remain untouched, continuing to describe what needs
  to be done on the conceptual level. This mapping takes the form of an
  external file in PyUseCase 3.0 and the forthcoming JUseCase 3.0, while
  in older versions it takes the form of instrumentation in the application 
  code.
</div>
<div class="Text_Header">Checking the behaviour via logs and TextTest</div>
<div class="Text_Normal">
  So our use-case recorder can record and replay usecases for us. But how
  can we check that what we see on the screen is correct? Most GUI tools
  do this by allowing the test script to contain "assertions", which look
  up some widget and check that some property of it is equal to a hardcoded value.
  This creates yet more dependence on the current GUI layout and cannot be
  "recorded" in any natural way, but has to be programmed in after the fact.
  No "usecase" would naturally contain this information : if it did it would
  turn into a test script.
</div>
<div class="Text_Normal">
  This discussion isn't on the TextTest site for nothing. If we can only get
  our application to produce a log of what the GUI looks like we can check
  what it does by monitoring the contents of that log using TextTest. PyUseCase 3.0 does
  this for you: it generates an ASCII-art type log of the current GUI appearance and monitors
  changes to it. The application can supplement it with its own logging as it wishes. With 
  other use-case recorders the application needs to build its own log for this purpose
  currently.
</div>
<div class="Text_Header">Synchronising tests by code instrumentation</div>
<div class="Text_Normal">
  Almost all GUI testing efforts are plagued by problems with making
  sure the script waits long enough before proceeding when something
  happens in the background. The solutions range from arcane ways
  to wait for some widget to have a certain appearance (yet more dependencies on 
  GUI-mechanics) to "sleep" statements liberally scattered around.
  Which fail when the system is loaded and cause the tests to run much
  more slowly than they otherwise would. Anyone without intimate knowledge
  of the code is ill-equipped to solve such problems, yet doing so is
  a vital part of writing tests.
</div>
<div class="Text_Normal">
  Use-case Recorders introduce the concept of an <b>"Application Event"</b>. This
  is basically some instrumentation in the code that indicates to the use-case
  recorder that something has happened that needs to be waited for, thus allowing
  the recorder to record and replay waits as well as clicks. These are described
  in more detail <a href="index.php?page=ui_testing&n=appevents" class="Text_Link">here</A>.
</div>
<div class="Text_Header">Recording macros as well as tests</div>
<div class="Text_Normal">
  High-level, easily manipulated "usecases" are useful for other things than
  testing. They are also extremely useful for users of the system who can
  create their own macros for sequences of actions they perform frequently.
</div>
<div class="Text_Normal">
  These are known as <b>"GUI shortcuts"</b> here. A Use-case recorder will typically
  allow an application to request a "toolbar" from it which contains controls
  for recording and replaying them which can be inserted into the application GUI as desired.
  Besides allowing users to create macros, they can also be used to create even higher level abstractions for
  the "test language" described above, aiding testers in performing repeated actions
  to reach a certain screen for testing. These are described in more detail 
  <a href="index.php?page=ui_testing&n=shortcuts" class="Text_Link">here</A>.
</div>
