<div class="Text_Main_Header">Using CaptureMock from Python test tools</div> 
<div class="Text_Description">Tests coded using unittest,py.test, nose etc.</div> 
<div class="Text_Normal">
Usage of capturemock for individual tests is defined by using the "@capturemock" decorator.
For example:
<?php codeSampleBegin() ?>
from capturemock import capturemock
import myemailmodule

@capturemock("smtplib")
def test_send_email():
    myemailmodule.do_something_that_sends_email()
<?php codeSampleEnd() ?>
Choosing whether to record or replay the tests can be done in one of two ways. It defaults to replay, which will of course do nothing if no previously recorded information exists. Either the environment variable CAPTUREMOCK_MODE can be set externally (to 1 for straight record, and 2 for recording only things that can't be found in the replay file), or it can be done directly in the code, like this:
<?php codeSampleBegin() ?>
from capturemock import capturemock, RECORD
import myemailmodule

@capturemock("smtplib", mode=RECORD)
def test_send_email():
    myemailmodule.do_something_that_sends_email()
<?php codeSampleEnd() ?>
Information will be recorded to a file named after the test in a subdirectory called "capturemock". In this case it would be called
"send_email.mock". 
</div>
<div class="Text_Normal">
For more advanced interception it's necessary to use the  <A class="Text_Link" HREF="index.php?page=capturemock&n=rcfiles">CaptureMock rc files</A>. The usual way to do that is to provide a file named ".capturemockrc" in the test directory, which will be read if nothing else overrides it. That file can then specify what is being recorded, and you can just mark the methods like this:
<?php codeSampleBegin() ?>
@capturemock
def test_send_email():
    ...
<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal">
An rc file can also be provided as an argument to the "capturemock" decorator.
<?php codeSampleBegin() ?>
@capturemock(rcFiles=["my_capturemock_rc_file"])
def test_send_email():
    ...
<?php codeSampleEnd() ?>
There is an additional function "set_defaults" which can be used to avoid repetition when there are multiple capturemock tests:
<?php codeSampleBegin() ?>
from capturemock import capturemock, set_defaults
import myemailmodule

#set_defaults(rcFiles=["my_capturemock_rc_file"])
set_defaults(["smtplib", "datetime.date.today"])

@capturemock
def test_send_email():
    myemailmodule.do_something_that_sends_email()

@capturemock
def test_send_another_email():
    myemailmodule.do_something_else_that_sends_email()

<?php codeSampleEnd() ?>

</div>
