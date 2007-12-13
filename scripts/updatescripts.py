#!/usr/bin/env python

import sys,os
from tableshared import updateTable


def correctAngleBrackets(text):
    return text.replace("<", "&lt;").replace(">", "&gt;")

def getScriptData(texttestPath, configModule):
    scriptRows = []
    ttCommand = texttestPath + " -a texttest -v sge -s default.DocumentScripts"
    for line in os.popen(ttCommand).readlines():
        if line.find("|") == -1:
            continue
        entries = line.strip().split("|")
        scriptRows.append(entries)
    return scriptRows

origTable = sys.argv[1]
texttestPath = sys.argv[2]
configModule = sys.argv[3]

updateTable(sys.argv[1], getScriptData(texttestPath, configModule))
