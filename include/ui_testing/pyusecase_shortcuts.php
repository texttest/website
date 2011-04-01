<div class="Text_Main_Header"></div>
<div class="Text_Main_Header">Test refactoring using shortcuts</div>
<div class="Text_Normal">
Creating a <a class="Text_Link" href="index.php?page=ui_testing&n=shortcuts">shortcut</A>
in PyUseCase is very simple. You simply extract the lines you want from some usecase you have
created, and save them in a file with an appropriate shortcut name under the location indicated by
$USECASE_HOME (i.e. the "pyusecase_files" directory in the test suite root directory when using TextTest, 
and ~/usecases on UNIX if you haven't explicitly set the above variable). For example, say we have the following usecase:
<?php codeSampleBegin() ?>
set username to test
set password to testpass
confirm login details
set movie name to Star Wars
add movie
close
<?php codeSampleEnd() ?>
Naturally we also have many other test cases that need to do the login stage. So we create a file
called "login_as_test.shortcut" in the location described above, containing just
<?php codeSampleBegin() ?>
set username to test
set password to testpass
confirm login details
<?php codeSampleEnd() ?>
The usecase can then become
<?php codeSampleBegin() ?>
login as test
set movie name to Star Wars
add movie
close
<?php codeSampleEnd() ?>
Also, the PyUseCase recorder will always record login in this way in future, and if you are using TextTest,
simply running all the tests will see this new name inserted in all usecases where appropriate. You thus
don't need to do anything to change the usecases themselves. This is because TextTest always records and replays simultaneously, so that a new version of the usecase is generated as appropriate.
</div>
<div class="Text_Normal">
Our usecase is then more readable and concise, and we only have to change in one place if we should change what steps are involved in logging in.
</div>
<div class="Text_Header">Using the "shortcut bar" UI (PyGTK apps only)</div>
<div class="Text_Normal">
The PyGTK version of PyUseCase also comes with a small PyGTK "toolbar" for controlling and 
recording shortcuts. By adding this to your UI you can make it easier to traverse, both for
testers and ordinary users, essentially providing macro recorder functionality. </div>
<div class="Text_Normal">
The basic mechanism is to import the "usecase"
module and call the "createShortcutBar" method. The signature of this method is as follows:
<?php codeSampleBegin() ?>
def createShortcutBar(uiMapFiles=[])
<?php codeSampleEnd() ?>
Although the uiMapFiles parameter defaults to empty, which means the default location will
be used ($USECASE_HOME/ui_map.conf) it is usually a good idea to fill in this parameter
with some path under the source tree of your application. After all, if you're using this shortcut bar
you want ordinary users to be able to take advantage of PyUseCase functionality without
explicitly running PyUseCase on the command line, so it makes sense for the UI map file(s) to
live with your source code and be distributed with it. You can also provide multiple file names,
which helps separate out the UI mapping for different parts of your application and allow it to 
only load the currently relevant parts.
</div>
<div class="Text_Normal">
The usecase.createShortcutBar method (gtkusecase.createShortcutBar prior to 3.4.1) will return a gtk.HBox. 
This is, by convention, added to a GUI at the
bottom. It will contain buttons for creating a new shortcut, and
for all existing shortcuts found.</div>
<div class="Text_Normal">To see this in action, try out the video store example that
comes with the PyUseCase download, which has this call in it and hence comes with
a shortcut bar.
</div>
