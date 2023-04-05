#!/usr/bin/env python

import sys,os
from glob import glob
from tableshared import updateTable

def makeConfigFile(configFileName, configModule):
    configFile = open(configFileName, "w")
    configFile.write("executable:<must be set>\n")
    configFile.write("config_module:" + configModule + "\n")
    configFile.write("\n")
    configFile.close()
    
def correctAngleBrackets(text):
    return text.replace("<", "&lt;").replace(">", "&gt;")

def getOptionData(texttestPath, configModule):
    optionRows = []
    makeConfigFile("config.app", configModule)
    ttCommand = texttestPath + " --vanilla -a app -d . -s " + configModule + ".DocumentEnvironment"
    for line in os.popen(ttCommand).readlines():
        if line.find("|") == -1:
            continue
        rowInfo = line.strip().split("|")
        optionRows.append(list(map(correctAngleBrackets, rowInfo)))
    for fileName in glob("*.app"):
        os.remove(fileName)
    return optionRows

origTable = sys.argv[1]
texttestPath = sys.argv[2]
configModule = sys.argv[3]
updateTable(origTable, getOptionData(texttestPath, configModule))
