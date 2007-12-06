#!/bin/sh

updateconfig.py configfile_default.php $1 default > tmpfile
mv tmpfile config_default.php

updateoptions.py options_default.php $1 default > tmpfile
mv tmpfile options_default.php

updatescripts.py scripts_default.php $1 default > tmpfile
mv tmpfile scripts_default.php

updateconfig.py configfile_queuesystem.php $1 queuesystem > tmpfile
mv tmpfile config_queuesystem.php

updateoptions.py options_queuesystem.php $1 queuesystem > tmpfile
mv tmpfile options_queuesystem.php

updatescripts.py scripts_queuesystem.php $1 queuesystem > tmpfile
mv tmpfile scripts_queuesystem.php
