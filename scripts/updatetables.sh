#!/bin/sh

PATH=`dirname $0`:$PATH

updateconfig.py personalpreffile.php $1 default default.gtkgui.DocumentGUIConfig > tmpfile
mv tmpfile personalpreffile.php

updateconfig.py configfile_default.php $1 default default.DocumentConfig > tmpfile
mv tmpfile configfile_default.php

updateoptions.py options_default.php $1 default > tmpfile
mv tmpfile options_default.php

updateenvironment.py environment_default.php $1 default > tmpfile
mv tmpfile environment_default.php

updatescripts.py scripts_default.php $1 default > tmpfile
mv tmpfile scripts_default.php

updateconfig.py configfile_queuesystem.php $1 queuesystem default.DocumentConfig > tmpfile
mv tmpfile configfile_queuesystem.php

updateoptions.py options_queuesystem.php $1 queuesystem > tmpfile
mv tmpfile options_queuesystem.php

updateenvironment.py environment_queuesystem.php $1 queuesystem > tmpfile
mv tmpfile environment_queuesystem.php

updatescripts.py scripts_queuesystem.php $1 queuesystem > tmpfile
mv tmpfile scripts_queuesystem.php
