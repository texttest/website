<div class="Text_Header">Adding application events for synchronisation</div>
<div class="Text_Normal"><I>
(See <A class="Text_Link" href="index.php?page=ui_testing&n=app_events">here</A>
for an explanation of what an Application Event is: the basic idea is to support
synchronisation by recording and reading of "waits")></I>
</div>
<div class="Text_Normal">
The implementation in PyUseCase consists chiefly of calling the method
"usecase.applicationEvent" from your code at the relevant places. The signature
of this method is as follows:

<?php codeSampleBegin() ?>
def applicationEvent(self, name, category=None, supercedeCategories=[], timeDelay=0.001)
<?php codeSampleEnd() ?>

but for normal purposes you can just set a name and ignore the other parameters. This
name will then be placed after "wait for " in the usecase files when the event is recorded,
so choose something that makes sense in that context, e.g. "data to be loaded".</div>
<div class="Text_Normal">
The next most usual thing to need is a category, which is also a string.
Application events in the same category overwrite each other so
that only the last application event in a given category is
recorded before any other command. Those without a category are
considered to belong to a global category and hence overwrite all other application events.
For example, the following code:

<?php codeSampleBegin() ?>
usecase.applicationEvent("hell to freeze over")
usecase.applicationEvent("the cows to come home")
<?php codeSampleEnd() ?>
will result in 
<?php codeSampleBegin() ?>
wait for the cows to come home
<?php codeSampleEnd() ?>
to be recorded, and hence for the first event to be ignored when replaying.
On the other hand, if we assign categories like this:
<?php codeSampleBegin() ?>
usecase.applicationEvent("hell to freeze over", category="religion")
usecase.applicationEvent("the cows to come home", category="zoology")
<?php codeSampleEnd() ?>
the recorded script will instead say
<?php codeSampleBegin() ?>
wait for hell to freeze over, the cows to come home
<?php codeSampleEnd() ?>
and both calls will need to be made before replay will proceed.
</div>
<div class="Text_Normal">
The "supercedeCategories" parameter is essentially an even finer-grained control
over the same overriding mechanism and provides a list of categories of application event 
that will cause this event to be superceded (NOTE: not a list of categories that this
event will supercede). This should only be needed in rare circumstances.
</div>
<div class="Text_Normal">
The "timeDelay" parameter only affects replay and essentially introduces a sleep in the replayer:
i.e. it indicates that replay should proceed a certain time after the current event. It is
obviously a fairly crude tool and should be used sparingly, but this is basically how
you insert a "sleep" using PyUseCase if there is nothing else you can do.
</div>
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

<div class="Text_Header">Recording received signals in console applications</div>
<div class="Text_Normal">Unlike <a class="Text_Link" href="http://jusecase.sourceforge.net">JUseCase</A> which has only
been used on GUIs, PyUseCase has also been used to provide
simulation around console applications on UNIX (mainly <a class="Text_Link" href="index.php?page=about">TextTest</A>
in console mode). Here there are two features that are useful:
application events (above) and recording received signals.</div>
<div class="Text_Normal">If the process receives a signal on UNIX and is in record
mode, it will be recorded (for example) as 'receive signal
SIGINT'. If it is in replay mode, PyUseCase will send that
signal to the process. In other words, you don't need to do
anything to enable this and it currently isn't possible to
disable it. Without application events instrumented it isn't very 
useful though as signals typically need to arrive at an appropriate
time during replay rather than as soon as possible.
</div>
