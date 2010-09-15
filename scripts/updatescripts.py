#!/usr/bin/env python

import sys,os
from glob import glob
from tableshared import updateTable

def makeConfigFile(configFileName, configModule):
    configFile = open(configFileName, "w")
    configFile.write("executable:<must be set>\n")
    configFile.write("config_module:" + configModule + "\n")
    configFile.close()

def correctAngleBrackets(text):
    return text.replace("<", "&lt;").replace(">", "&gt;")

def getScriptData(texttestPath, configModule):
    scriptRows = []
    makeConfigFile("config.app", configModule)
    ttCommand = texttestPath + " -a app -d . --vanilla -s default.DocumentScripts"
    for line in os.popen(ttCommand).readlines():
        if line.find("|") == -1:
            continue
        entries = line.strip().split("|")
        scriptRows.append(entries)
    for fileName in glob("*.app"):
        os.remove(fileName)
    return scriptRows

origTable = sys.argv[1]
texttestPath = sys.argv[2]
configModule = sys.argv[3]

updateTable(sys.argv[1], getScriptData(texttestPath, configModule))
