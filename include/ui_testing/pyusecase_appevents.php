<div class="Text_Header">Adding application events for synchronisation</div>
<div class="Text_Normal"><I>
(See <A class="Text_Link" href="index.php?page=ui_testing&n=appevents">here</A>
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
