<div class="Text_Header">Using the PyUseCase library</div>

<div class="Text_Normal">To use PyUseCase for use case recording and simulation you
need to do the following: add use-case command names as extra
arguments everywhere you connect to widget signals for which
recording/simulation is wanted, add application events where
needed, and finally, configure PyUseCase.</div>
<div class="Text_Normal">PyUseCase has been used extensively in order to test
TextTest's GUIs using TextTest itself. Apart from demos, it has
not been used for anything else yet to my knowledge (unlike
JUseCase which has been used on at least three different
projects) It has been designed so that the PyGTK-specific parts
are well separated in a separate module from parts that are
useful for any Python GUI library.</div>
<div class="Text_Header">Adding recording/simulation for all widget signals</div>
<div class="Text_Normal">This is done via the ScriptEngine class, which is basically
the interface to PyUseCase. 
</div>
<OL>
<LI><div class="Text_Normal">For user actions such as clicking a button, selecting a
list item etc., the general idea is to add an extra argument to
the call to 'connect', so that instead of writing</div>

<div class="Text_Normal">button.connect(&quot;clicked&quot;,
myMethod)</div>
<div class="Text_Normal">you would write</div>
<div class="Text_Normal">scriptEngine.connect(&quot;save
changes&quot;, &quot;clicked&quot;, button, myMethod)</div>
<div class="Text_Normal">thus tying the user action to the script command &quot;save
changes&quot;. If you set up a record script, then the module
will write &quot;save changes&quot; to the script whenever the
button is clicked. Conversely, if you set up a replay script,
then on finding the command &quot;save changes&quot;, the
module will emit the &quot;clicked&quot; signal for said
button, effectively clicking it programatically.</div>

<div class="Text_Normal">This means that, so long as my GUI has a concept of &quot;save
changes&quot;, I can redesign the GUI totally, making the user
choose to do this via a totally different widget, but all my
scripts wiill remain unchanged.</div>
<LI><div class="Text_Normal">Some GUI widgets have &quot;state&quot; rather than
relying on signals (for example text entries, toggle buttons),
so that the GUI itself may not necessarily make any calls to
'connect'. But you still want to generate script commands when
they change state, and be able to change them programatically.
I have done this by providing a 'register' method, so that an
extra call is made to scriptEngine</div>
<PRE STYLE="border: 1px solid #000000; padding: 0.02in">entry = gtk.Entry()
scriptEngine.registerEntry(entry, &quot;enter file name = &quot;)</PRE><div class="Text_Normal">
which would record whenever the contents of the Entry was
changed.</div>

<LI><div class="Text_Normal">There are also composite widgets like the TreeView where
you need to be able to specify an argument. In this case the
application has to provide extra information as to how the text
is to be translated into selecting an item in the tree. So, for
example:</div>
<div class="Text_Normal">treeView.connect(&quot;row_activated&quot;,
myMethod)</div>
<div class="Text_Normal">might become</div>
<div class="Text_Normal">scriptEngine.connect(&quot;select
file&quot;, &quot;row_activated&quot;, treeView, myMethod,
(column, dataIndex))</div>

<div class="Text_Normal">(column, dataIndex) is a tuple to tell it which data in the
tree view we are looking for. So that the command &quot;select
file foobar.txt&quot; will search the tree's column &lt;column&gt;
and data index &lt;dataIndex&gt; for the text &quot;foobar.txt&quot;
and select that row accordingly.</div>

<LI><div class="Text_Normal">There are other widgets supported too, it's probably
easiest just to read the code for the API to these, they're
fairly self-explanatory. But there are also many widgets that
aren't yet supported (I have implemented what I have needed
myself and no more) - happy hacking!</div>
</OL>
<div class="Text_Header">Adding application events</div>
<div class="Text_Normal">At places in the code where <a class="Text_Link" href=="index.php?page=concepts&n=appevents">application
events</A> are important, a corresponding call to the
&quot;applicationEvent&quot; method in ScriptEngine is required.
The method takes one or two parameters: the name of the
application event and, if needed, an associated category name.
Application events in the same category overwrite each other so
that only the last application event in a given category is
recorded before any other command. If the one parameter form of
&quot;applicationEvent&quot; is used, the application events are
considered to belong to the same &quot;default category&quot;.
This works in exactly the same way as in <a class="Text_Link" href=="http://jusecase.sourceforge.net">JUseCase.</A></div>

<div class="Text_Header">Configuring PyUseCase</div>
<div class="Text_Normal">In order to use PyUseCase, you probably want to do something
like this at the top of your script. Global access is useful as
every widget used will need to connect via the script engine:</div>
<PRE STYLE="border: 1px solid #000000; padding: 0.02in">from gtkusecase import ScriptEngine
global scriptEngine
scriptEngine = ScriptEngine()</PRE><div class="Text_Normal">
PyUseCase is configured using the following environment
variables:</div>
<UL>
<LI><div class="Text_Normal"><I>USECASE_RECORD_SCRIPT </I>-
states the name of the use case script file to record to 
</div>

<LI><div class="Text_Normal"><I>USECASE_REPLAY_SCRIPT</I>
- states the name of the use case script file from which to
perform simulation 
</div>
<LI><div class="Text_Normal"><I>USECASE_REPLAY_DELAY</I> -
states the delay to insert between each simulated use case
command 
</div>
<LI><div class="Text_Normal"><I>USECASE_RECORD_STDIN</I> - states the name of the
file to record information received on standard input to. 
</div>
</UL>

<div class="Text_Normal">Note that these environment variables are set automatically
by <a class="Text_Link" href=="index.php?page=about">TextTest</A> when using that
tool for testing. If none of the variables are set, PyUseCase is
disabled. If both record and replay are enabled, the files must
not be the same. 
</div>
<div class="Text_Header">Recording to a use case script</div>
<div class="Text_Normal">Standalone, to record to a script you simply set the
environment variable USECASE_RECORD_SCRIPT to (say)
&ldquo;some_use_case.txt&quot;, launch the application and start
clicking around in the GUI. From TextTest, you go to an empty
test and click 'Record Use-case'. This will then fire the GUI up
for you with this property set, and record to a use case file
for future replaying.</div>
<div class="Text_Header">Replaying from a use case script</div>

<div class="Text_Normal">Standalone, replaying is enabled by setting the
USECASE_REPLAY_SCRIPT and USECASE_REPLAY_DELAY environment
variables. TextTest will set these automatically when running
tests. By default, the delay is disabled, but if you use the
'slow motion replay' option ('How to run' tab from the static
GUI) it will be set to however fast you have configured your
slow motion to be (slow_motion_replay_speed config file entry)</div>
<div class="Text_Header">Using the shortcut mechanism</div>
<div class="Text_Normal">If you want to make <a class="Text_Link" href=="index.php?page=concepts&n=shortcuts">shortcuts</A>
available to your users and test writers, you need to do two
things. When you create your scriptEngine object (see above),
provide the keyword argument enableShortcuts=1. Then you can
call the method scriptEngine.createShortcutBar, which will
return a gtk.HBox. This is, by convention, added to a GUI at the
bottom. It will contain buttons for creating a new shortcut, and
for all existing shortcuts found.</div>
<div class="Text_Normal">Such shortcuts will be recorded as files in the directory
indicated by the environment variable USECASE_HOME (defaulting
to ~/usecases on UNIX). Also, where a user makes a sequence of
clicks which correspond to an existing shortcut, this will be
recorded as the shortcut name.</div>
<div class="Text_Normal">To see this in action, try out the video store example that
comes with the PyUseCase download.</div>

<div class="Text_Header">PyUseCase and console applications</div>
<div class="Text_Normal">Unlike <a class="Text_Link" href=="http://jusecase.sourceforge.net">JUseCase</A> which has only
been used on GUIs, PyUseCase has also been used to provide
simulation around console applications (mainly <a class="Text_Link" href=="index.php?page=about">TextTest</A>
in console mode). Here there are two features that count:
standard input recording and recording received signals (UNIX
only).</div>
<div class="Text_Normal">For an interactive application that receives answers on
standard input, it can be nice to be able to record these in a
real session, rather than just create a file for redirection
directly. It's then easier to see which answer corresponds to
which question. To enable this call scriptEngine.readStdin()
everywhere instead sys.stdin.readline() directly. The results
are recorded to the script indicated by USECASE_RECORD_STDIN
(set automatically by TextTest if recording from there)</div>
<div class="Text_Normal">If the process receives a signal on UNIX and is in record
mode, it will be recorded (for example) as 'receive signal
SIGINT'. If it is in replay mode, PyUseCase will send that
signal to the process. In other words, you don't need to do
anything to enable this and it currently isn't possible to
disable it.</div>

				