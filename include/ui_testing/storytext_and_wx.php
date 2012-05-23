<div class="Text_Main_Header">Using StoryText on wxPython apps</div>
<div class="Text_Normal">
wxPython support is currently beta status. Development is currently ongoing, with many new widget types supported in StoryText 3.7. It might
be usable on a simple application.</div>
<div class="Text_Header">Widget Naming</div>
<div class="Text_Normal">
As discussed elsewhere, StoryText identifies widgets by Name, Title, Label and Type, in that order of preference. 
Many widgets simply don't have a Title or a Label attached to them and hence if you don't set names on them, 
they will be identified by Type, which will not work if you have more than one of them. Besides this, widget titles 
and labels may not be unique, or they may change depending on e.g. today's date. It's fair to say that almost every 
non-trivial application is going to need to set at least some widget names before StoryText will work smoothely.</div>
<div class="Text_Normal">
Widget naming in wxPython is a matter of calling the SetName method:
<?php codeSampleBegin() ?>
button = wx.Button(frame, 1, "Hello")
button.SetName("hello world button")
<?php codeSampleEnd() ?>
</div>
</div>
