<div class="Text_Header">Test Refactoring and Macro Recording with GUI shortcuts </div>
<div class="Text_Normal">Naturally, StoryText can provide GUI simulations
for purposes other than tests. It can record a sequence of GUI
clicks for any purpose. There are two main benefits to be
achieved from this.</div>
<div class="Text_Header">Shortcuts for test maintenance</div>
<div class="Text_Normal">A test writer can extract certain commonly used sequences
into a "shortcut". If the system has a
login screen for example, every recorded test will need to enter
a test username and a test password. This is annoying, so a
shortcut can be created for it, which will both save time and
increase the expressiveness and maintainability of the test.
Where before all tests started with:</div>
<div class="Text_Normal">
<?php codeSampleBegin(); ?>
set username to test
set password to testpass
perform login<?php codeSampleEnd(); ?></div><div class="Text_Normal">

They can now just begin with:</div><div class="Text_Normal">
<?php codeSampleBegin(); ?>
login as test
<?php codeSampleEnd(); ?>
</div><div class="Text_Normal">

This can also be used even if a lot of pre-existing tests start
with the first sequence. When running GUI tests, TextTest always
runs the GUI in record and playback mode simultaneously, to
check that what is replayed can also still be recorded. If a new
shortcut appears, it is automatically inserted when recording a
test if its component parts are executed in order. So, after
creating this shortcut, simply re-running all the tests and
saving them all would have it universally present. 
</div>
<div class="Text_Normal">If you now need to change the login screen in any way, you
can do it by just editing the shortcut
file and no tests will need to be changed.</div>
<div class="Text_Normal">
To see how this works in practice, look at the <A class="Text_Link" href="index.php?page=ui_testing&n=storytext_shortcuts">relevant StoryText documentation</A>.
</div>
<div class="Text_Header">Macro Recording by system users</div>
<div class="Text_Normal">The record/playback layer is available at any time to any
user of the system &ndash; it does not require starting a
special tool in order to make use of it. This raises the
possibility that individual users can personally tweak the user
interface and eliminate repetitive actions by making use of the
record/playback capabilities.</div>
<div class="Text_Normal">Most people have at one time or another ended up using a GUI
in a repetitive way. They generally do not need all of its
capabilities, and may have to make 5 or so clicks just to reach
the screen they usually work with. Or for example, who hasn't at
some time or other been frustrated by constant pop-up dialogues
that demand &ldquo;Are you sure you want to do this?'' or
something similar. This can be minimised by good user interface
design, but fundamentally applications have to be configurable
for their power users, and this can make them unwieldy for their
novice users.</div>
<div class="Text_Normal">The user can simply record a "shortcut" for his repetitive
actions. He goes into record mode at the appropriate point,
records his usual five clicks (or OKs all his annoying pop-ups),
and then gives the script he has recorded a name. A new button
appears at the bottom of his screen, which he can click whenever
he wishes to repeat what he did. This will save him time and
repetitive work.
</div>
<div class="Text_Normal">
There is <A class="Text_Link" href="index.php?page=ui_testing&n=storytext_shortcuts">support for this in StoryText</A>, but only for PyGTK apps currently.
</div>
