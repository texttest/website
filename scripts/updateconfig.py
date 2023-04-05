#!/usr/bin/env python

import sys,os, types, subprocess
from glob import glob
from tableshared import updateTable

def makeConfigFile(configFileName, configModule):
    configFile = open(configFileName, "w")
    configFile.write("executable:<must be set>\n")
    configFile.write("diff_program:tkdiff\n")
    configFile.write("config_module:" + configModule + "\n")
    configFile.write("filename_convention_scheme:standard\n")
    configFile.close()

def getConfigData(texttestPath, configModule, osName, script):
    configData = {}
    makeConfigFile("config.appidentifier", configModule)
    os.environ["TEXTTEST_PERSONAL_CONFIG"] = "STOOPID"
    os.environ["USER"] = "$USER"
    ttArgs = [ texttestPath, "--vanilla", "-a", "appidentifier", "-d", ".", "-s", script + " os=" + osName ]
    proc = subprocess.Popen(ttArgs, stdout=subprocess.PIPE, stderr=subprocess.STDOUT, encoding="ascii")
    out = proc.communicate()[0]
    for line in out.splitlines():
        if "|" not in line:
            continue

        key, value, doc = line.strip().split("|")
        configData[key] = getValue(value), doc
    for fileName in glob("*.appidentifier"):
        os.remove(fileName)
    return configData

def getValue(val):
    if val == "any": # This is a built-in function in Python 2.5 and a standard name in TextTest!
        return val
    try:
        ret = eval(val)
        if isinstance(ret, dict) and "default" in ret and os.path.isabs(ret.get("default")):
            ret["default"] = os.path.basename(ret["default"]).replace(".exe", "")
        return ret
    except:
        return val

def getType(val):
    typeNames = { "Str": "String", "Dict": "Dictionary"}
    rawType = type(val).__name__.capitalize()
    typeToUse = typeNames.get(rawType, rawType)
    if typeToUse == "Dictionary":
        if "default" in val:
            typeToUse = "CompositeDictionary"
            subType = getType(val["default"])
        elif len(val) > 0:
            subType = getType(list(val.values())[0])
        else:
            subType = "String"
        return typeToUse + " (" + subType + ")"
    else:
        return typeToUse

def getOutputValue(val):
    empty = "&lt;empty&gt;"
    try:
        if len(val) == 0:
            return empty
    except TypeError:
        pass

    if type(val) == list:
        return ", ".join(val)

    if type(val) == dict:
        if len(val) == 1:
            if "" in val:
                return empty
            if "default" in val:
                return getOutputValue(val["default"])
        retVals = []
        for key, val in list(val.items()):
            retVals.append(key + " : " + str(getOutputValue(val)))
        retVals.sort()
        return "<BR>".join(retVals)
    if val == "APPIDENTIFIER":
        return "&lt;app&gt; (capitalised)"
    if type(val) == str:
        return val.replace("<", "&lt;").replace(">", "&gt;")
    else:
        return val

def getConfigRows(*args):
    configRows = []
    configData = getConfigData(*args)
    allEntries = list(configData.keys())
    allEntries.sort()
    for key in allEntries:
        value, doc = configData[key]
        typeName = getType(value)
        if key == "queue_system_max_capacity":
            outputVal = "&lt;number of cores&gt;"
        else:
            outputVal = getOutputValue(value)
        configRows.append([ key, typeName, str(outputVal), doc ] )
    return configRows

def unifyData(windowsData, unixData):
    unifiedData = []
    winRowId = 0
    for unixRow in unixData:
        if winRowId >= len(windowsData):
            unifiedData.append(unixRow)
            continue
        windowsRow = windowsData[winRowId]
        if unixRow[0] != windowsRow[0]:
            unifiedData.append(unixRow)
            continue
        winRowId += 1
        unifiedData.append(getUnifiedRow(windowsRow, unixRow))
    return unifiedData

def getUnifiedRow(winRow, unixRow):
    unifiedRow = []
    for col in range(len(winRow)):
        unifiedRow.append(getUnifiedEntry(winRow[col], unixRow[col]))
    return unifiedRow

def getUnifiedEntry(winEntry, unixEntry):
    if winEntry == unixEntry:
        return winEntry
    else:
        return unixEntry + " (UNIX)<BR>" + winEntry + " (Windows)"


origTable = sys.argv[1]
texttestPath = sys.argv[2]
configModule = sys.argv[3]
script = sys.argv[4]

unixData = getConfigRows(texttestPath, configModule, "posix", script)
windowsData = getConfigRows(texttestPath, configModule, "nt", script)
unifiedData = unifyData(windowsData, unixData)

updateTable(origTable, unifiedData)
