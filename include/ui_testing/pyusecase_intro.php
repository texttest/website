<div class="Text_Header">Recording a basic usecase</div>
<div class="Text_Normal">Naturally the first step is to <a class="Text_Link" href="index.php?page=ui_testing&n=pyusecase_download">download and install PyUseCase</a>.
</div>
<div class="Text_Normal">
To see what PyUseCase does, try running it with the "videostore.py"
demonstration GUI in the "examples" directory in the download.
(It might also be an idea to run videostore.py on its own first,
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
We can now play this back via:
<?php codeSampleBegin() ?>
pyusecase -p usecase.txt videostore.py
<?php codeSampleEnd() ?>
which goes by extremely fast but helpfully describes the GUI changes on the console for us,
somewhat more compactly than when we were recording as it e.g. makes text edits in one go.
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

The basic idea is that GUI changes will cause changes in this file but not in the "usecases" themselves. PyUseCase identifies widgets by name, title, label and type, in that order. Obviously here we are identfiying the "Add" button by its Label, which will break down if the UI contains anything else labelled "Add". Likewise, the title of our window might vary from run to run. For robustness it's therefore sometimes necessary to assign widget names in your code, at which point this file should be updated with "Name=The Add Movie Button" instead of "Label=Add".
</div>
<div class="Text_Header">What now?</div>
<div class="Text_Normal">
This is OK for demonstration purposes but reasonably limited on its own. For testing you probably want to try to <A class="Text_Link" href="index.php?page=ui_testing&n=pyusecase_texttest">use it in combination with TextTest</A>. Also, you can examine the <A class="Text_Link" href="index.php?page=ui_testing&n=pyusecase_additional">extra features</A> such as synchronisation support via "application events", macro recording with "GUI shortcuts", and recording and playing back received signals.
</div>
