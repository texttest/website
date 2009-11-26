<div class="Text_Header">Recording a basic usecase</div>
<div class="Text_Normal">Naturally the first step is to <a class="Text_Link" href="index.php?page=ui_testing&n=pyusecase_download">download and install PyUseCase</a>.
</div>
<div class="Text_Normal">
To see what PyUseCase does, try running it with the "videostore.py"
demonstration GUI in the "examples" directory in the download.
(It might also be an idea to run this program on its own first,
so you can separate what PyUseCase does from what it does)
You can record a usecase by doing
<?php codeSampleBegin() ?>
pyusecase -r usecase.txt videostore.py
<?php codeSampleEnd() ?>
This brings up the Video Store in record mode and PyUseCase
writes its auto-generated log of what the GUI looks like to the console
as you go along. As a suggestion, add a movie called "Star Wars"
and then exit. This results in PyUseCase's own dialog coming
up and requesting that you enter "usecase names" for the things
you just did. By looking at the widget types, identifiers and 
"PyGTK signal names" it provides, you can hopefully figure
out which row corresponds to which action you did. Here is the dialog as 
it might be filled out just before you accept it:
</div>
<div class="Text_Normal"><img src="include/ui_testing/images/choosenames.png" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT>
</div>
<div class="Text_Normal">
Now we are done, and something like this can be seen in our "usecase.txt" file:
<?php codeSampleBegin() ?>
set movie name to Star Wars
add movie
close
<?php codeSampleEnd() ?>
We can play back this script now via:
<?php codeSampleBegin() ?>
pyusecase -p usecase.txt videostore.py
<?php codeSampleEnd() ?>
which goes by extremely fast but helpfully describes the GUI changes on the console for us.
To see it at a more sensible pace, set a delay like this:
<?php codeSampleBegin() ?>
pyusecase -p usecase.txt -d 2 videostore.py
<?php codeSampleEnd() ?>
which will wait 2 seconds between each action.
</div>
<div class="Text_Header">The UI map file</div>
<div class="Text_Normal">
Naturally the information we entered in the dialog has been stored in a file, the "UI map file"
, for us. By default this will have ended up in your home directory under "usecases/ui_map.conf".
You can control the location of this either by providing its full path via "-m" on the command
line, or by setting the environment variable USECASE_HOME, which points out the directory
where it will be written.
</div>
<div class="Text_Normal">
If you open it you should see something like this:
<?php codeSampleBegin() ?>
[Name=Movie Name]
changed = set movie name to

[Label=Add]
clicked = add movie

[Title=The Video Store]
delete-event = close
<?php codeSampleEnd() ?>

The basic idea is that GUI changes will cause changes in this file but not in the "usecases" themselves. PyUseCase identifies widgets by name, title, label and type, in that order. Obviously here we are identfiying the "Add" button by its Label, which will break down if the UI contains anything else labelled "Add". Likewise, the title of our window might vary from run to run. For robustness it's therefore sometimes necessary to assign widget names in your code, at which point this file should be updated with "Name=The Add Movie Button" instead of "Label=Add".</I>
</div>
<div class="Text_Header">Adding application events</div>
<div class="Text_Normal">At places in the code where application
events</A> are important, a corresponding call to the
&quot;applicationEvent&quot; method in the usecase module is required.
The method takes one or two parameters: the name of the
application event and, if needed, an associated category name.
Application events in the same category overwrite each other so
that only the last application event in a given category is
recorded before any other command. If the one parameter form of
&quot;applicationEvent&quot; is used, the application events are
considered to belong to the same &quot;default category&quot;.
This works in exactly the same way as in <a class="Text_Link" href="http://jusecase.sourceforge.net">JUseCase.</A></div>

<div class="Text_Header">Using the shortcut mechanism</div>
<div class="Text_Normal">If you want to make <a class="Text_Link" href="index.php?page=concepts&n=shortcuts">shortcuts</A>
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
<div class="Text_Normal">Unlike <a class="Text_Link" href="http://jusecase.sourceforge.net">JUseCase</A> which has only
been used on GUIs, PyUseCase has also been used to provide
simulation around console applications (mainly <a class="Text_Link" href="index.php?page=about">TextTest</A>
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

				
