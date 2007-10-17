#!/usr/bin/env python

import os
from tableshared import updateTable

def makeConfigFile(configFileName):
    configFile = open(configFileName, "w")
    localName = os.path.basename(os.getcwd())
    if localName != "documentation":
        configFile.write("config_module:" + localName + "\n")
    configFile.write("[diagnostics]\nconfiguration_file:nonsense\ntrace_level_variable:nonsense\n[end]\n\n")
    configFile.write("slow_motion_replay_speed:3\n")
    configFile.write("create_catalogues:true\n")
    configFile.write("partial_copy_test_path:nonsense\n")
    configFile.write("\n")
    configFile.close()
    
def correctAngleBrackets(text):
    return text.replace("<", "&lt;").replace(">", "&gt;")

def getOptionData():
    optionRows = []
    configFileName = "config.app"
    makeConfigFile(configFileName)
    ttCommand = "texttest -a app -d . -s default.DocumentOptions"
    for line in os.popen(ttCommand).readlines():
        if line.find(";") == -1:
            continue
        option, section, docs = line.strip().split(";")
        optionRows.append([ correctAngleBrackets(option), section, correctAngleBrackets(docs) ])
    os.remove(configFileName)
    return optionRows

updateTable("options.php", getOptionData())
