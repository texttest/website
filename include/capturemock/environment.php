<div class="Text_Main_Header">Capturing environment variables</div>
<div class="Text_Description">(and also current working directories)</div>
<div class="Text_Normal">Sometimes environment variables need to be provided for the programs
being intercepted. As they are run directly from CaptureMock's server they don't
automatically inherit any environment your program may have set
up. These environment variables should be listed in the rc file, and then their values 
will also be sent to the CaptureMock server and will be part of the information recorded.</div>
<div class="Text_Normal">
For example, if our system sets CVSROOT (which CVS uses to find its central repository) before calling CVS we will need to tell CaptureMock this. In this case we add this information in a comma-separated list in the rc file, either under
the program's specific section or in the [command line] section. The following are both legal:
<?php codeSampleBegin() ?>
[command line]
intercepts = cvs

[cvs]
environment = CVSROOT
<?php codeSampleEnd() ?>
or
<?php codeSampleBegin() ?>
[command line]
intercepts = cvs
environment = CVSROOT
<?php codeSampleEnd() ?>
When we record, the mock file will now look like this:
<?php codeSampleBegin() ?>
<-CMD:env 'CVSROOT=/path/to/cvs' cvs update -dP /path/to/my/checkout
->FIL:checkout
->OUT:U subdir/myfile.txt
->ERR:cvs update: Updating .
cvs update: Updating subdir
<?php codeSampleEnd() ?>
providing a means to make sure our program is providing it to the CVS call correctly. If environment variables were unset by the SUT this would also be recorded via "--unset" options to "env" on the first line.
</div>
<div class="Text_Normal">
(Note that this command isn't actually what CaptureMock executes, which of course would not work on Windows, it is just a representation of what it does which coincides with a legal UNIX command line. This mechanism is portable.)
</div>
<div class="Text_Header">The current working directory</div>
<div class="Text_Normal">
In a similar way, if your program changes the current working directory for the program it calls, this will be captured and recorded by CaptureMock. In this case you don't need to do anything to configure it. For example your program might call CVS in a different but equivalent way to do the update, and the above call could equally end up looking like this:
<?php codeSampleBegin() ?>
<-CMD:cd /path/to/my/checkout; env 'CVSROOT=/path/to/cvs' cvs update -dP
<?php codeSampleEnd() ?>
Again this isn't what is executed internally: it is a representation only to allow easy comparison with future calls.
</div>
