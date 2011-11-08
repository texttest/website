<div class="Text_Main_Header">Using StoryText on Tkinter apps</div>
<div class="Text_Header">Widget Naming</div>
<div class="Text_Normal">
As discussed elsewhere, StoryText identifies widgets by Name, Title, Label and Type, in that order of preference. Many widgets simply don't have a Title or a Label attached to them and hence if you don't set names on them, they will be identified by Type, which will not work if you have more than one of them. Besides this, widget titles and labels may not be unique, or they may change depending on e.g. today's date. It's fair to say that almost every non-trivial application is going to need to set at least some widget names before StoryText will work smoothely.</div>
<div class="Text_Normal">
Widget naming in Tkinter is a matter of providing the name as a keyword argument when constructing it. 
<?php codeSampleBegin() ?>
userEntry = Entry(frame, name="username field")
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header">Handling tkMessageBox with CaptureMock</div>
<div class="Text_Normal">
There is no support in StoryText for recording and replaying interaction with tkMessageBoxes in the way other widgets are handled, nor is there likely to be, because there is no way provided to simulate interaction with them. You can however use <A class="Text_Link" HREF="index.php?page=capturemock">CaptureMock</A> for this purpose. Simply set it up to intercept interaction with the tkMessageBox module, for example by adding this to your rc file: 
<?php codeSampleBegin() ?>
[python]
intercepts = tkMessageBox
<?php codeSampleEnd() ?>
If you create a Tkinter application in TextTest, it will in fact enable this for you, although it also assumes you will install CaptureMock. So you need to either do so, or disable it again by hand.
</div>
