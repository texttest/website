<div class="Text_Header">Full list of StoryText command line options</div>
<div class="Text_Description">(the output of 'storytext --help')</div>
<div class="Text_Normal">

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
  -k PRIMARY_KEY_COLUMNS, --primary-key-columns=PRIMARY_KEY_COLUMNS
                        Names of columns to use as primary keys when indexing
                        tables. Useful when the built in algorithm for this
                        gets the wrong answer for some reason.
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
                        works in SWT/Eclipse currently. Also enabled via the
                        environment variable USECASE_REPLAY_SCREENSHOTS.
  -t SECONDS, --timeout=SECONDS
                        amount of time to wait for application events before
                        giving up and trying to proceed.
  -T TESTSCRIPTPLUGINID, --testscriptpluginid=TESTSCRIPTPLUGINID
                        determines the testscript plugin id for an eclipse RCP
                        application, i.e. 'org.eclipse.swtbot.gef.testscript'
  -w MIN_FIELD_WIDTHS, --min-field-widths=MIN_FIELD_WIDTHS
                        Set a minimum width for certain fields. Useful for
                        when table columns have indeterministic width, due to
                        e.g. date formats
  -x, --disable_usecase_names
                        Disable the entering of usecase names when
                        unrecognised actions are recorded. Recommended only
                        for quick-and-dirty experimenting. Will result in
                        recorded scripts that are easy to make but hard to
                        read and hard to maintain.
  -X EXCLUDE_DESCRIBE, --exclude-describe=EXCLUDE_DESCRIBE
                        Exclude the listed widget class names from being
                        described in the describer.  Refer to online
                        documentation at
                        http://www.texttest.org/index.php?page=ui_testing,
                        under 'Supported Widgets' for your toolkit.  Use any
                        value from the lower list, i.e. the one for automatic
                        logging, without the module names. An example would be
                        '-X Menu,ToolBar,Browser' for SWT/Eclipse RCP, or '-X
                        MenuBar,Toolbar,TreeView' for PyGTK. Also allow syntax
                        like '-X Menu!File', to exclude all menus except those
                        called 'File'.  On Windows, '-X MenuNOTFile' is a
                        temporary alternative to this, working around a Jython
                        bug.
  --insert-shortcuts    Re-record the replay script to the record script
                        without running anything, inserting shortcuts as
                        required

</pre>

</div>
