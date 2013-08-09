<div class="Text_Header">Full list of StoryText command line options (output of storytext --help)</div>
<pre>
Options:
  --version             show program's version number and exit
  -h, --help            show this help message and exit
  -d SECONDS, --delay=SECONDS
                        amount of time to wait between each action when
                        replaying. Also enabled via the environment variable
                        USECASE_REPLAY_DELAY.
  -i INTERFACE, --interface=INTERFACE
                        type of interface used by application, should be
                        'console', 'gtk', 'tkinter', 'wx', 'javaswing',
                        'javaswt', 'javarcp' or 'javagef' ('gtk' is default)
  -f FILENAME, --pollfile=FILENAME
                        file to poll for updates, generating an application
                        event when it appears or disappears
  -F EVENTNAME, --pollfile-event-name=EVENTNAME
                        Only useful with -f. Use as name for generated
                        application event instead of 'wait for FILENAME to be
                        updated'
  -I IMAGEDESCRIPTION, --imagedescription=IMAGEDESCRIPTION
                        determines how images are described by the auto-
                        generated output, should be 'name' or 'number'
  -l LEVEL, --loglevel=LEVEL
                        produce logging at level LEVEL, should be 'info',
                        'debug', 'config' or 'off'. 'info' will point the
                        auto-generated GUI log at standard output. 'debug'
                        will produce a large amount of StoryText debug
                        information on standard output. 'off' will disable the
                        auto-generated log. 'config' will enabled the auto-
                        generated log but not set any global log level: it is
                        a way to tell StoryText that your application will
                        configure its logging via its own log configuration
                        files.
  -L FILE, --logconfigfile=FILE
                        Configure StoryText logging via the log configuration
                        file at FILE. A suitable sample file can be find with
                        the source tree under the 'log' directory.
  -m FILE1,..., --mapfiles=FILE1,...
                        Use the UI map file(s) at FILE1,... If not set
                        StoryText will read and write such a file at the
                        location determined by $STORYTEXT_HOME/ui_map.conf. If
                        run standalone $STORYTEXT_HOME defaults to
                        ~/.storytext, while TextTest will point it to a
                        'storytext_files' subdirectory of the root test suite.
                        If multiple files are provided, the last in the list
                        will be used for writing.
  -M MAXOUTPUTWIDTH, --maxoutputwidth=MAXOUTPUTWIDTH
                        maximum output width for side-by-side output in the
                        auto-generated output
  -p FILE, --replay=FILE
                        replay script from FILE. Also enabled via the
                        environment variable USECASE_REPLAY_SCRIPT.
  -P PATHSTOIMAGES, --pathstoimages=PATHSTOIMAGES
                        Comma separated absolute paths to image files
  -r FILE, --record=FILE
                        record script to FILE. Also enabled via the
                        environment variable USECASE_RECORD_SCRIPT.
  -s, --supported       list which PyGTK widgets and signals are currently
                        supported 'out-of-the-box'
  -S, --screenshot      Take screenshots of the GUI after each action. Only
                        works in SWT/Eclipse currently
  -t SECONDS, --timeout=SECONDS
                        amount of time to wait for application events before
                        giving up and trying to proceed.
  -T TESTSCRIPTPLUGINID, --testscriptpluginid=TESTSCRIPTPLUGINID
                        determines the testscript plugin id for an eclipse RCP
                        application, i.e. 'org.eclipse.swtbot.gef.testscript'
  -x, --disable_usecase_names
                        Disable the entering of usecase names when
                        unrecognised actions are recorded. Recommended only
                        for quick-and-dirty experimenting. Will result in
                        recorded scripts that are easy to make but hard to
                        read and hard to maintain.
  -X EXCLUDE_DESCRIBE, --exclude-describe=EXCLUDE_DESCRIBE
                        Exclude the listed widget class names from being
                        described in the describer
  --insert-shortcuts    Re-record the replay script to the record script
                        without running anything, inserting shortcuts as
                        required

</pre>
