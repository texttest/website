<div class="Text_Main_Header"></div>
<div class="Text_Main_Header">Test refactoring using shortcuts</div>
<div class="Text_Header">Creating and viewing shortcuts with the StoryText editor</div>
<div class="Text_Normal">
Since StoryText 3.8 there is now an editor GUI which can be started on any usecase file.
Simply run "storytext_editor &lt;usecase&gt;" from the command line, or double-click the 
usecase file in TextTest 3.24 or newer.
</div>
<div class="Text_Normal">
To create a shortcut, select the lines you want to include, right-click and select "Create Shortcut".
It will identify the arguments used in the various lines and use them as arguments for the shortcut.
You can then set the appropriate name for the shortcut which will be inserted into the current usecase
with the correct parametrization (and, after running your TextTest tests, into all your other usecases also)
</div>
<div class="Text_Normal">
For example, say we have a login screen with two text boxes and a button, and hence the following usecase:
<?php codeSampleBegin() ?>
set username to test
set password to testpass
confirm login details
set movie name to Star Wars
add movie
close
<?php codeSampleEnd() ?>
Naturally we also have many other test cases that need to do the login stage. So we select the first three lines
and choose "Create shortcut".
</div>
<div class="Text_Normal">
A dialog comes up with the suggested name "Do something with test and testpass" and a shortcut preview looking like
<?php codeSampleBegin() ?>
set username to $
set password to $
confirm login details
<?php codeSampleEnd() ?>
We might for example change the name to "login with username test and password testpass". By deleting one or both of 
the arguments from the name, we tell StoryText that these are not parameters. For example, if the password is always the same,
we could change the name to "login as test", which creates the shortcut
<?php codeSampleBegin() ?>
set username to $
set password to testpass
confirm login details
<?php codeSampleEnd() ?>
Either way, the usecase then becomes something like
<?php codeSampleBegin() ?>
login as test
set movie name to Star Wars
add movie
close
<?php codeSampleEnd() ?>
In the editor "login as test" appears in bold, indicating it is a shortcut. You can examine the hierarchy of what the various terms mean.
</div>
<div class="Text_Normal">
Also, the StoryText recorder will always record login in this way in future, and if you are using TextTest,
simply running all the tests will see this new name inserted in all usecases where appropriate. You thus
don't need to do anything to change the usecases themselves. This is because TextTest always records and replays simultaneously, so that a new version of the usecase is generated as appropriate.
</div>
<div class="Text_Normal">
Our usecase is then more readable and concise, and we only have to change in one place if we should change what steps are involved in logging in.
</div>
<div class="Text_Header">Behind the scenes</div>
<div class="Text_Normal">
All that happened above is that the usecase file was edited as shown and that a file named login_as_$.shortcut was created in the directory
indicated by $STORYTEXT_HOME (from TextTest, this is the storytext_files directory under your TEXTTEST_HOME, standalone, it is ~/usecases if you don't set it explicitly). So it's fairly easy to create them by hand also if the above interface isn't flexible enough for your needs
</div>
<div class="Text_Header">Details of parametrizing shortcuts and numbered arguments</div>
<div class="Text_Normal">
All the $ symbols are cycled through in order when applying arguments to the file, using a simple macro substitution.
Any such substituion is possible, not just those that can be created via the editor. 
For example our shortcut file can be called "login_as_$_$_with_$_$.shortcut", and the contents can be
<?php codeSampleBegin() ?>
set $ to $
set $ to $
confirm login details
<?php codeSampleEnd() ?>
which would have the same effect in the above usecase.
</div>
<div class="Text_Normal">
It is also possible to number the arguments in the file in case they reoccur or the order changes.
For example if we also make "login" an argument, we end up with a file called "$_as_$_$_with_$_$.shortcut", and contents
<?php codeSampleBegin() ?>
set $2 to $3
set $4 to $5
confirm $1 details
<?php codeSampleEnd() ?>
(This is not particularly recommended but it can be useful occasionally)
</div>
<div class="Text_Header">Using the "shortcut bar" UI (PyGTK apps only)</div>
<div class="Text_Normal">
The PyGTK version of StoryText also comes with a small PyGTK "toolbar" for controlling and 
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
you want ordinary users to be able to take advantage of StoryText functionality without
explicitly running StoryText on the command line, so it makes sense for the UI map file(s) to
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
comes with the StoryText download, which has this call in it and hence comes with
a shortcut bar.
</div>
