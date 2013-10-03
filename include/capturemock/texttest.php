<div class="Text_Main_Header">Using CaptureMock from TextTest</div> 
<div class="Text_Normal">
TextTest comes with builtin CaptureMock integration. The first thing to do is to enable it. You do this by adding the following to your TextTest config file:
<?php codeSampleBegin() ?>
import_config_file:capturemock_config
<?php codeSampleEnd() ?>
Alternatively, from TextTest 3.26 you can enable it directly from the initial application creation dialog.
</div>
<div class="Text_Normal">
This will enable a new kind of "definition file", which will be called "capturemockrc" (with application/version suffices if desired). This can then be created in the same way as TextTest's other files (environment, config etc), and can be placed at any level of the TextTest hierarchy where it will apply to the tests under that point. If more than one rc file is found for a particular test, they will be amalgamated together, much as the environment files are. You can then study the documentation <A class="Text_Link" HREF="index.php?page=capturemock&n=rcfiles">here</A> for what to put in it, depending on what you want to intercept.
</div>
<div class="Text_Normal">
On running the test, you will notice that a new "CaptureMock" radio button has appeared on the Running/Basic tab. This allows you to choose between CaptureMock's three modes of running : replaying, recording, or replaying when possible and recording when not. This can also be done from the TextTest command line via the flag "-rectraffic" to TextTest.
</div>
<div class="Text_Normal">
Python interaction will be stored in a test result file called "pythonmocks.&lt;app&gt;", while command line and client-server interaction will be placed in a file called "externalmocks.&lt;app&gt;". 
</div>
<div class="Text_Header">Users of the "TextTest traffic mechanism" from TextTest 3.20 and earlier</div> 
<div class="Text_Normal">
CaptureMock has grown out of the "traffic mechanism" in TextTest. If you were using this before you'll need to migrate to CaptureMock. See the migration notes in the TextTest help menu for how to do that.
</div>
