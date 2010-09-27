<div class="Text_Header">Plugging in support for Custom Widgets</div>			
<div class="Text_Normal">PyUseCase naturally only provides support for widgets supported
by the generic frameworks. If your application makes use of custom widgets you will need
to write Python code to tell it what to do with them.
</div>
<div class="Text_Normal">The basic idea is to
provide a file called customwidgetevents.py and put it on your
PYTHONPATH somewhere. You then provide a member called "customEventTypes",
which is a list of pairs of widget types and lists of event classes that can be
applied on them. You then define these event classes in a similar way to the way
they are defined for the standard widgets, and the best approach in the absence
of complete API documentation is to look for something similar in the source and
try to do likewise.
</div>
<div class="Text_Normal">
Here's a (very stupid) example for PyGTK:
<?php codeSampleBegin() ?>

from gtkusecase.simulator.baseevents import SignalEvent
import gtk

class MyButtonEvent(SignalEvent):
   def generate(self, *args):
       print "We faked a button click!"
       SignalEvent.generate(self, *args)

   def shouldRecord(self, *args):
       print "Refusing to record the button click!"
       return False

class InsertEvent(SignalEvent):
   signalName = "row-inserted"
   def connectRecord(self, method):
       self._connectRecord(self.widget.get_model(), method)

# Standard name for module containing custom widget events
customEventTypes = [(gtk.Button, [ MyButtonEvent ]),
                   (gtk.TreeView, [ InsertEvent])]
<?php codeSampleEnd() ?>

This code will mess about with how Buttons are handled: it will print a message
every time the replayer generates a click on it, and it will refuse to ever
record such a click. 
</div>
<div class="Text_Normal">
Meanwhile an additional event monitoring has been
set up for rows being inserted in tree views, which PyUseCase will ordinarily
ignore as it's done by the program itself rather than the user. </div>
<div class="Text_Normal">
If all you need to do is listen to and generate a signal, just inherit
from SignalEvent and set the signalName. (In this case as the signal was on
the gtk.Model rather than the widget itself we also had to adjust how
to monitor it)
</div>
<div class="Text_Normal">
Basically, adding support for custom widgets is much like extending PyUseCase 
itself, beyond the basic hook mechanism above to connect it.
</div>
