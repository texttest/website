<div class="Text_Header">Multi-threaded simulation using Application Events</div>

				
				
					<div class="Text_Normal">A typical GUI application has the requirement of instant
					response to its user at all times. It cannot just lock up while
					some background processing (e.g. loading in a large amount of
					data) is done. This means that a large number of GUIs have
					multiple threads, and any acceptance testing approach for GUIs
					must therefore consider how to handle this problem.</div>

					<div class="Text_Normal">When we replay a test without human intervention, it may well
					be necessary to wait for things to happen before proceeding.
					Otherwise the test will fail because further use case actions
					rely on data loaded in a separate thread being present. In this
					case a traditional record/replay tool is basically stuck: it
					knows nothing of application intent and all it can do is ask the
					test writer to hand-insert 'sleep' statements into the script
					after recording it. Needless to say, this is both inefficient
					and error-prone: it can easily be forgotten, and the required
					length of sleep is hard to get right. If the test is being
					written by a customer unaware of the thread structure of the
					program (as we intend), these problems are of course further
					exacerbated.</div>
					<div class="Text_Normal">Use-case recorders handle this situation by introducing the
					notion of an `application event': the application can simply
					notify the use-case recorder when a significant event has
					occurred that is worth waiting for. At places in the code where
					such events occur, the programmer adds calls to xUseCase, which
					will then record a `wait
					for &lt;name of application event&gt;' command.
					During replay the replay thread will halt until the application
					reaches the point where the application event occurs, i.e., when
					the use-case recorder is notified of the event having occurred.</div>
					<div class="Text_Normal">So, xUseCase recording with application events looks like
					this:</div>
					<div class="Text_Normal"><img src="include/concepts/images/xusecaserec.jpg" NAME="Graphic1" ALIGN=LEFT WIDTH=500 HEIGHT=152 BORDER=0><BR CLEAR=LEFT>Replaying,
					with application events, looks like this:</div>
					<img src="include/concepts/images/xusecaserep.jpg" NAME="Graphic4" ALIGN=LEFT WIDTH=498 HEIGHT=110 BORDER=0><BR CLEAR=LEFT>

					<HR>
					<div class="Text_Normal">Now for an example. Assume we have the following use case
					script from a Swing App, using JUseCase:</div>
					<PRE STYLE="border: 1.00pt solid #000000; padding: 0.02in; text-align: left"><I>load movie data into list</I>
<I>select movie Die Hard</I></PRE><div class="Text_Normal">
					Also assume that the first command starts a separate thread that
					loads a large amount of data from a database and displays it on
					the screen. Unless there is a way of telling the replayer when
					this has completed, it would perhaps try to select `Die Hard'
					before that item was present in the list, causing the simulation
					to fail. To solve this, the programmer inserts the statement</div>
					<div class="Text_Normal"><I>ScriptEngine.instance().applicationEvent('data to be
					loaded');</I></div>
					<div class="Text_Normal">in his application at the point directly after the loading is
					completed. The recorded use case will now look like this:</div>

					<PRE STYLE="border: 1.00pt solid #000000; padding: 0.02in"><I>load movie data into list</I>
<I>wait for data to be loaded</I>
<I>select movie Die Hard</I></PRE><div class="Text_Normal">
					In record mode the applicationEvent method just records the
					'wait for' command to the script file when it is called, as
					shown here: 
					</div>
					<div class="Text_Normal"><BR><BR>
					</div>
					<div class="Text_Normal"><img src="include/concepts/images/appeventrec.jpg" NAME="Graphic3" ALIGN=LEFT WIDTH=500 HEIGHT=205 BORDER=0><BR CLEAR=LEFT>In
					replay mode, the simulator (or replayer) halts replaying on
					reading this 'wait for' command, and the applicationEvent call
					then acts as a notifier to tell it to resume when the data has
					been loaded.</div>

					<div class="Text_Normal"><img src="include/concepts/images/appeventrep.JPG" NAME="Graphic5" ALIGN=LEFT WIDTH=495 HEIGHT=249 BORDER=0><BR CLEAR=LEFT><BR>
					</div>