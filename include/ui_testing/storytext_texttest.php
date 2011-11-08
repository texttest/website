<div class="Text_Header">Using StoryText for testing, together with TextTest</div>
<div class="Text_Normal">
StoryText may be useful on its own without using TextText, for demonstration purposes
or for a limited form of testing, but it was created essentially to enable GUI testing
with TextTest, which is why it generates you a log rather than providing you with an API
for writing assertions.
</div>
<div class="Text_Normal">
You are therefore encouraged to download TextTest also and
try to use the combination. There is a detailed tutorial <A class="Text_Link" href="index.php?page=<?php echo convertToDocFormat($current_release); ?>&n=gui_tests">here</A> for the combination, with lots of screenshots to help you get started.
</div>
<div class="Text_Normal">
It may be possible to use it in combination with a unit-test like tool with explicit assertions but it hasn't been built with this in mind and you'd probably have to do a fair bit of development work. It's also difficult to see how this could be done without reintroducing so much of the dependency on GUI mechanics that makes traditional GUI-test tools so brittle. See
<A class="Text_Link" href="index.php?page=ui_testing">here</A> for more development of this idea.
</div>
