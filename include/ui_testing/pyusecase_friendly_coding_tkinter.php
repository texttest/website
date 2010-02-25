<div class="Text_Header">Hints on how to write Tkinter code that PyUseCase can handle</div>
<div class="Text_Normal">
Tkinter support isn't really advanced enough yet to have generated known issues in this area. Naming the occasional widget is however inherently necessary to its way of working, and there's at least one trick worth knowing about.
</div>
<div class="Text_Header">Widget Naming</div>
<div class="Text_Normal">
As discussed elsewhere, PyUseCase identifies widgets by Name, Title, Label and Type, in that order of preference. Many widgets simply don't have a Title or a Label attached to them and hence if you don't set names on them, they will be identified by Type, which will not work if you have more than one of them. Besides this, widget titles and labels may not be unique, or they may change depending on e.g. today's date. It's fair to say that almost every non-trivial application is going to need to set at least some widget names before PyUseCase will work smoothely.</div>
<div class="Text_Normal">
Widget naming in Tkinter is a matter of providing the name as a keyword argument when constructing it. Of the widgets currently supported, this is mostly essential only on Tkinter.Entry, which does not come with a Title or Label :
<?php codeSampleBegin() ?>
userEntry = Entry(frame, name="username field")
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header">Handling tkMessageBox</div>
<div class="Text_Normal">
There is no support in PyUseCase for recording and replaying interaction with tkMessageBoxes in the way other widgets are handled, nor is there likely to be, because there is no way provided to simulate interaction with them. If you use TextTest 3.17 or later though, however, help is at hand: you can simply add
<?php codeSampleBegin() ?>
collect_traffic_py_module:tkMessageBox
<?php codeSampleEnd() ?>
to your config file, and TextTest's own <A class="Text_Link" HREF="index.php?page=documentation_trunk&n=faking_it_with_texttest">interception mechanism</A> will do the rest. Not ideal but better than getting stuck.
</div>
