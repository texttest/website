#!/usr/bin/env python

import sys,os
from glob import glob
from tableshared import updateTable

def makeConfigFile(configFileName, configModule):
    configFile = open(configFileName, "w")
    configFile.write("executable:<must be set>\n")
    configFile.write("config_module:" + configModule + "\n")
    # Here so they end up in the write GUI tab in the docs
    configFile.write("use_case_record_mode:GUI\n")
    configFile.write("import_config_file:capturemock_config\n")
    configFile.write("create_catalogues:true\n")
    configFile.write("performance_test_machine:any\n")
    configFile.write("partial_copy_test_path:nonsense\n")
    configFile.write("\n")
    configFile.close()
    
def correctAngleBrackets(text):
    return text.replace("<", "&lt;").replace(">", "&gt;")

def getOptionData(texttestPath, configModule):
    optionRows = []
    makeConfigFile("config.app", configModule)
    ttCommand = texttestPath + " --vanilla -a app -d . -s default.DocumentOptions"
    for line in os.popen(ttCommand).readlines():
        if line.find(";") == -1:
            continue
        option, section, docs = line.strip().split(";")
        optionRows.append([ correctAngleBrackets(option), section, correctAngleBrackets(docs) ])
    for fileName in glob("*.app"):
        os.remove(fileName)
    return optionRows

origTable = sys.argv[1]
texttestPath = sys.argv[2]
configModule = sys.argv[3]
updateTable(origTable, getOptionData(texttestPath, configModule))
