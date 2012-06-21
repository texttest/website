#!/usr/bin/env python

import sys,os, types
from glob import glob
from tableshared import updateTable

def makeConfigFile(configFileName, configModule):
    configFile = open(configFileName, "w")
    configFile.write("executable:<must be set>\n")
    configFile.write("config_module:" + configModule + "\n")
    configFile.write("filename_convention_scheme:standard\n")
    configFile.close()

def getConfigData(texttestPath, configModule, osName, script):
    configData = {}
    makeConfigFile("config.appidentifier", configModule)
    os.environ["TEXTTEST_PERSONAL_CONFIG"] = "STOOPID"
    os.environ["FAKE_OS"] = osName
    os.environ["USER"] = "$USER"
    ttCommand = texttestPath + " --vanilla -a appidentifier -d . -s " + script
    for line in os.popen(ttCommand).readlines():
        if line.find("|") == -1:
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
        return eval(val)
    except:
        return val

def getType(val, allTypes):
    for typeName in allTypes:
        typeObj = eval("types." + typeName)
        if type(val) == typeObj:
            typeToUse = typeName.replace("Type", "")
            if typeToUse == "Dictionary":
                if val.has_key("default"):
                    typeToUse = "CompositeDictionary"
                    subType = getType(val["default"], allTypes)
                elif len(val) > 0:
                    subType = getType(val.values()[0], allTypes)
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

    if type(val) == types.ListType:
        return ", ".join(val)

    if type(val) == types.DictType:
        if len(val) == 1:
            if val.has_key(""):
                return empty
            if val.has_key("default"):
                return getOutputValue(val["default"])
        retVals = []
        for key, val in val.items():
            retVals.append(key + " : " + str(getOutputValue(val)))
        retVals.sort()
        return "<BR>".join(retVals)
    if val == "APPIDENTIFIER":
        return "&lt;app&gt; (capitalised)"
    if type(val) == types.StringType:
        return val.replace("<", "&lt;").replace(">", "&gt;")
    else:
        return val

def getConfigRows(*args):
    configRows = []
    configData = getConfigData(*args)
    allEntries = configData.keys()
    allEntries.sort()
    allTypes = dir(types)
    allTypes.reverse()
    for key in allEntries:
        value, doc = configData[key]
        typeName = getType(value, allTypes)
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
