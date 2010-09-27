<div class="Text_Header">Using the shortcut mechanism</div>
<div class="Text_Normal">If you want to make <a class="Text_Link" href="index.php?page=ui_testing&n=shortcuts">shortcuts</A>
available to your users and test writers, the basic mechanism is to import the "gtkusecase"
module and call the "createShortcutBar" method. The signature of this method is as follows:
<?php codeSampleBegin() ?>
def createShortcutBar(uiMapFiles=[])
<?php codeSampleEnd() ?>
Although the uiMapFiles parameter defaults to empty, which means the default location will
be used ($USECASE_HOME/ui_map.conf) it is usually a good idea to fill in this parameter
with some path under the source tree of your application. After all, if you're using shortcuts
you want ordinary users to be able to take advantage of PyUseCase functionality without
explicitly running PyUseCase on the command line, so it makes sense for the UI map file(s) to
live with your source code and be distributed with it. You can also provide multiple file names,
which helps separate out the UI mapping for different parts of your application and allow it to 
only load the currently relevant parts.
</div>
<div class="Text_Normal">
The gtkusecase.createShortcutBar method will return a gtk.HBox. 
This is, by convention, added to a GUI at the
bottom. It will contain buttons for creating a new shortcut, and
for all existing shortcuts found.</div>
<div class="Text_Normal">Such shortcuts will be recorded as files in the directory
indicated by the environment variable USECASE_HOME (defaulting
to ~/usecases on UNIX). Also, where a user makes a sequence of
clicks which correspond to an existing shortcut, this will be
recorded as the shortcut name. This helps to keep shortcuts
concise and avoid duplication. Naturally this is the case irrespective
of whether it's being done for testing or macro creation purposes. 
</div>
<div class="Text_Normal">To see this in action, try out the video store example that
comes with the PyUseCase download, which has this call in it and hence comes with
a shortcut bar.
</div>
