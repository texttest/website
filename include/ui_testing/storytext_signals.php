
<div class="Text_Header">Recording received signals in console applications</div>
<div class="Text_Normal">Unlike <a class="Text_Link" href="http://jusecase.sourceforge.net">JUseCase</A> which has only
been used on GUIs, StoryText has also been used to provide
simulation around console applications on UNIX (mainly <a class="Text_Link" href="index.php?page=about">TextTest</A>
in console mode). Here there are two features that are useful:
application events (above) and recording received signals.</div>
<div class="Text_Normal">If the process receives a signal on UNIX and is in record
mode, it will be recorded (for example) as 'receive signal
SIGINT'. If it is in replay mode, StoryText will send that
signal to the process. In other words, you don't need to do
anything to enable this and it currently isn't possible to
disable it. Without application events instrumented it isn't very 
useful though as signals typically need to arrive at an appropriate
time during replay rather than as soon as possible.
</div>
