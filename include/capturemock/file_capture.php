<div class="Text_Main_Header">Capturing file edits</div>
<div class="Text_Description">Handling system commands that edit files</div>
<div class="Text_Normal">
CaptureMock will scan the command line for arguments that appear to be files or directories (it will
take anything that is an absolute path or a pre-existing relative path) and will store any
changes to those files made while the process runs. When it is run without the "record" flag
these file edits will then be reproduced as if the real program had run.
</div>
<div class="Text_Normal">
For example, suppose our system under test updates some files via a version-control system, say CVS. We put the ones that we want for the test in the repository, and tell CaptureMock to capture interaction with CVS:
<?php codeSampleBegin() ?>
[command line]
intercepts = cvs
<?php codeSampleEnd() ?>
As before, we run with the record flag and get a mock file generated. It looks something like this:
<?php codeSampleBegin() ?>
<-CMD:cvs update -dP /path/to/my/checkout
->FIL:checkout
->OUT:U subdir/myfile.txt
->ERR:cvs update: Updating .
cvs update: Updating subdir
<?php codeSampleEnd() ?>
Note that besides the OUT and ERR response mentioned before, we also have a FIL response, which indicates an edit of a file or directory with the given name. When we save this, the file "subdir/myfile.txt" which CVS updated for us will be stored, again in a location depending on which test runner you are using (see above). We can then even run this test on a machine without CVS installed, as its role will be played by CaptureMock producing the response from this file and the program itself will be none the wiser that the real CVS hasn't actually been called.
</div>
<div class="Text_Normal">
Subsequent edits to the same file or directory will also be handled, in this case they will be referred to for example as 
<?php codeSampleBegin() ?>
->FIL:checkout.edit_2
<?php codeSampleEnd() ?>

</div>
<div class="Text_Header">Handling file edits made in the background</div>
<div class="Text_Normal">
By default it will only monitor these files while the program in question is running: however you can tell it that
background processes may be started that will edit the files, and in this case it will check the 
files before and after every subsequent received command. This is done by setting the "asynchronous" field in a section for the program in question.</div>
<div class="Text_Normal">
For example, the "qsub" program submits jobs to a central Grid Engine, for execution remotely, which may well write files long after the submission program has exited. So if we want to intercept that, we need to do as follows in our rc file:
<?php codeSampleBegin() ?>
[command line]
intercepts = qsub

[qsub]
asynchronous = True
<?php codeSampleEnd() ?>

</div>
