#!/usr/bin/env python

import sys,os, types, string
from tableshared import updateTable

def makeConfigFile(configFileName, configModule):
    configFile = open(configFileName, "w")
    configFile.write("config_module:" + configModule)
    configFile.write("\n")
    configFile.close()

def getConfigData(texttestPath, configModule, osName):
    configData = {}
    configFileName = "config.appidentifier"
    makeConfigFile(configFileName, configModule)
    os.environ["TEXTTEST_PERSONAL_CONFIG"] = "STOOPID"
    os.environ["FAKE_OS"] = osName
    os.environ["USER"] = "$USER"
    ttCommand = texttestPath + " -a appidentifier -d . -s default.DocumentConfig"
    for line in os.popen(ttCommand).readlines():
        if line.find("|") == -1:
            continue

        key, value, doc = line.strip().split("|")
        configData[key] = getValue(value), doc
    os.remove(configFileName)
    return configData

def getValue(val):
    try:
        return eval(val)
    except:
        return val

def getType(val, allTypes):
    for typeName in allTypes:
        exec "typeObj = types." + typeName
        if type(val) == typeObj:
            if typeName == "DictionaryType" and val.has_key("default"):
                return "CompositeDictionary"
            return typeName.replace("Type", "")

def getOutputValue(val):
    empty = "&lt;empty&gt;"
    try:
        if len(val) == 0:
            return empty
    except TypeError:
        pass

    if type(val) == types.ListType:
        return string.join(val, ", ")

    if type(val) == types.DictType:
        if len(val) == 1:
            if val.has_key(""):
                return empty
            if val.has_key("default"):
                return getOutputValue(val["default"])
        retVals = []
        for key, val in val.items():
            retVals.append(key + " : " + str(getOutputValue(val)))
        return string.join(retVals, "<BR>")
    if val == "APPIDENTIFIER":
        return "&lt;app&gt; (capitalised)"
    if type(val) == types.StringType:
        return val.replace("<", "&lt;").replace(">", "&gt;")
    else:
        return val

def getConfigRows(texttestPath, configModule, osName):
    configRows = []
    configData = getConfigData(texttestPath, configModule, osName)
    allEntries = configData.keys()
    allEntries.sort()
    allTypes = dir(types)
    allTypes.reverse()
    for key in allEntries:
        value, doc = configData[key]
        typeName = getType(value, allTypes)
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

unixData = getConfigRows(texttestPath, configModule, "posix")
windowsData = getConfigRows(texttestPath, configModule, "nt")
unifiedData = unifyData(windowsData, unixData)

updateTable(origTable, unifiedData)