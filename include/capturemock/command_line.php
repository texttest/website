<div class="Text_Main_Header">Using CaptureMock from the command line</div> 
<div class="Text_Normal">
Command line usage is normally appropriate when you wish to handle a whole process as one, and record all its interactions to the same file. This is generally only the case for command-line and client-server interception, not for intercepting Python code, where you want different interaction for different tests within the same process.</div>
<div class="Text_Normal">
The basic plan is to run the "capturemock" program. Which arguments to give it can be discovered by running it alone or with --help:
<?php codeSampleBegin() ?>
$ capturemock --help
Usage: capturemock [options] <program> <program_args> ...

CaptureMock command line program. Records and replays interaction 
defined by stuff in its rc file

Options:
  -h, --help            show this help message and exit
  -m MODE, --mode=MODE  CaptureMock mode. 0=replay, 1=record, 2=replay if
                        possible, else record
  -p FILE, --replay=FILE
                        replay traffic recorded in FILE.
  -f DIR, --replay-file-edits=DIR
                        restore edited files referred to in replayed file from
                        DIR.
  -r FILE, --record=FILE
                        record traffic to FILE.
  -F DIR, --record-file-edits=DIR
                        store edited files under DIR.
  -R RCFILES, --rcfiles=RCFILES
                        Read configuration from given rc files, defaults to
                        ~/.capturemock/config
<?php codeSampleEnd() ?>

Basic usage consists normally of
<?php codeSampleBegin() ?>
$ capturemock --record some_file.mock my_program -a -b -c
<?php codeSampleEnd() ?>
and/or
<?php codeSampleBegin() ?>
$ capturemock --replay some_file.mock my_program -a -b -c
<?php codeSampleEnd() ?>

