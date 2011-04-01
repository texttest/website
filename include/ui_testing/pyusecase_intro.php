<div class="Text_Header">Recording a basic usecase</div>
<div class="Text_Normal">Naturally the first step is to <a class="Text_Link" href="index.php?page=ui_testing&n=pyusecase_download">download and install PyUseCase</a>.
</div>
<div class="Text_Normal">
To see what PyUseCase does, try running it with the "videostore.py"
demonstration PyGTK GUI in the "examples" directory in the download.
This ought to work if you've followed the instructions, because PyUseCase's own GUI uses PyGTK
so you should have installed it!</div>
<div class="Text_Normal">
(It might also be an idea to run videostore.py on its own first,
so you can separate what PyUseCase does from what it does)
You can record a usecase by doing
<?php codeSampleBegin() ?>
pyusecase -r usecase.txt videostore.py
<?php codeSampleEnd() ?>
This brings up the Video Store in record mode and PyUseCase
writes its auto-generated log of what the GUI looks like to the console
as you go along. As a suggestion, add a movie called "Star Wars" like this :</div>
<div class="Text_Normal"><img src="include/ui_testing/images/videostore.png" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT>
</div>
<div class="Text_Normal">
and then exit. This results in PyUseCase's own dialog coming
up and requesting that you enter "usecase names" for the things
you just did. It gives you the type of the widget, how it identifies it
and a description of the action that was performed on it, and 
you can hopefully figure out which row corresponds to which action you did
and name the actions in a suitably high-level language. The current usecase 
that will be recorded is previewed in the window at the
bottom as you type to assist you in this process. </div>
<div class="Text_Normal">
Any actions that we don't name will be treated as uninteresting and will
not be recorded. Here is the dialog as it might be filled out just before 
you accept it:
</div>
<div class="Text_Normal"><img src="include/ui_testing/images/choosenames.png" ALIGN=LEFT BORDER=0><BR CLEAR=LEFT>
</div>
<div class="Text_Normal">
Now we are done, and the usecase as shown in the preview window is saved to our "usecase.txt" file.
We can now play it back via:
<?php codeSampleBegin() ?>
pyusecase -p usecase.txt videostore.py
<?php codeSampleEnd() ?>
which goes by extremely fast but helpfully describes the GUI changes on the console for us,
somewhat more compactly than when we were recording as it e.g. makes text edits in one go. It
will look something like this:
<?php codeSampleBegin() ?>

---------- Window 'The Video Store' ----------
Focus widget is 'Movie Name'

Menu Bar : 'File' (+)
'New Movie Name  ' , Text entry , Button 'Add' , Button 'Delete' , 
    Button 'Sort' , Button 'Clear'

Showing Notebook with tabs: text info , video view
Viewing page 'video view'

Showing Movie Tree with columns: Movie Name
'Shortcuts:' , Button '_New'
----------------------------------------------

'set movie name to' event created with arguments 'Star Wars'
Edited 'Movie Name' Text entry (set to 'Star Wars')

'add movie' event created with arguments ''

Updated : Movie Tree with columns: Movie Name
-> Star Wars

'close' event created with arguments ''
<?php codeSampleEnd() ?>
As you can see, this consists of an initial description of the window appearance
(compare with the screenshot above) and then a series of "event created with arguments"
lines which indicate what PyUseCase has done, followed by the updates to the UI that resulted.
To see the usecase executing at a more sensible pace so you watch the UI changes, set a delay like this:
<?php codeSampleBegin() ?>
pyusecase -p usecase.txt -d 2 videostore.py
<?php codeSampleEnd() ?>
which will wait 2 seconds between each action.
</div>
<div class="Text_Header"><A name="ui_map_file"></A>The UI map file</div>
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

The basic idea is that GUI changes will cause changes in this file but not in the "usecases" themselves. PyUseCase identifies widgets by name, title, label and type, in that order (tooltips and View IDs are also used in Eclipse RCP). Obviously here we are identfiying the "Add" button by its Label, which will break down if the UI contains anything else labelled "Add". Likewise, the title of our window might vary from run to run. For robustness it's therefore sometimes necessary to assign widget names in your code, at which point this file should be updated with "Name=The Add Movie Button" instead of "Label=Add".
</div>
<div class="Text_Header">What now?</div>
<div class="Text_Normal">
This is OK for demonstration purposes but reasonably limited on its own. For testing you probably want to try to <A class="Text_Link" href="index.php?page=ui_testing&n=pyusecase_texttest">use it in combination with TextTest</A>. Also, you can examine the extra features such as synchronisation support via <A class="Text_Link" href="index.php?page=ui_testing&n=pyusecase_appevents">Application Events</A>, macro recording with <A class="Text_Link" href="index.php?page=ui_testing&n=pyusecase_shortcuts">GUI shortcuts</A>, and recording and playing back <A class="Text_Link" href="index.php?page=ui_testing&n=pyusecase_signals">received signals</A>.
</div>
