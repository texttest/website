
set scriptdir=%~dp0
cd %scriptdir%\..\include\documentation\documentation_trunk
py -3 %scriptdir%\updateconfig.py personalpreffile.php texttestc.exe default default.gtkgui.DocumentGUIConfig > tmpfile
move /y tmpfile personalpreffile.php

py -3 %scriptdir%\updateconfig.py configfile_default.php texttestc.exe default default.DocumentConfig > tmpfile
move /y tmpfile configfile_default.php

py -3 %scriptdir%\updateoptions.py options_default.php texttestc.exe default > tmpfile
move /y tmpfile options_default.php

py -3 %scriptdir%\updateenvironment.py environment_default.php texttestc.exe default > tmpfile
move /y tmpfile environment_default.php

py -3 %scriptdir%\updatescripts.py scripts_default.php texttestc.exe default > tmpfile
move /y tmpfile scripts_default.php

py -3 %scriptdir%\updateconfig.py configfile_queuesystem.php texttestc.exe queuesystem default.DocumentConfig > tmpfile
move /y tmpfile configfile_queuesystem.php

py -3 %scriptdir%\updateoptions.py options_queuesystem.php texttestc.exe queuesystem > tmpfile
move /y tmpfile options_queuesystem.php

py -3 %scriptdir%\updateenvironment.py environment_queuesystem.php texttestc.exe queuesystem > tmpfile
move /y tmpfile environment_queuesystem.php

py -3 %scriptdir%\updatescripts.py scripts_queuesystem.php texttestc.exe queuesystem > tmpfile
move /y tmpfile scripts_queuesystem.php