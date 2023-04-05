#!/usr/local/bin/python

import os, sys
from re import subn

def findTemplate(contents):
    start = contents.rfind("<TR")
    end = contents.rfind("</TR")
    lineStart = contents.rfind("\n", 0, start)
    lineEnd = contents.find("\n", end)
    return lineStart + 1, lineEnd

def getRowTemplate(contents, start, end):
    template = contents[start:end]
    newTemplate = ""
    matches = 1
    for line in template.split("\n"):
        newLine, match = subn(">.*</div", ">$" + str(matches) + "</div", line)
        matches += match
        newTemplate += newLine + "\n"
    return newTemplate.rstrip()
    
def getTableStart(contents):
    afterRow = contents.find("</TR>")
    return contents.find("\n", afterRow)

def findLabels():
    labels = {}
    dirs = [ os.getcwd(), ".." ]
    for dir in dirs:
        for file in os.listdir(dir):
            fullPath = file
            if dir == "..":
                fullPath = dir + "/" + file
            if not file.endswith(".php"):
                continue
            for line in open(fullPath).readlines():
                for label in getLabelsFromLine(line):
                    labels[label] = "index.php?page=<?php echo $version ?>&n=" + fullPath[0:-4] + "#" + label
    return labels

def getLabelsFromLine(line):
    labels = []
    toFind = "<A NAME="
    startPos = line.find(toFind)
    if startPos != -1:
        endPos = line.find(">", startPos)
        labels.append(line[startPos + len(toFind) + 1:endPos - 1])
        labels += getLabelsFromLine(line[endPos:])
    return labels


def docOutput(doc, key, labels):
    keyTitle = key.split()[0]
    if keyTitle in labels:
        return "<A class=\"Text_Link_Small\" HREF=\"" + labels[keyTitle] + "\">" + doc + "</A>"
    else:
        return doc

def handleTable(contents, dataMatrix):
    templateStart, templateEnd = findTemplate(contents)
    rowTemplate = getRowTemplate(contents, templateStart, templateEnd)
    tableStart = getTableStart(contents)
    labels = findLabels()
    print(contents[:tableStart])
    rowSize = rowTemplate.count("<TD")
    if not dataMatrix:
        return []
    for index, row in enumerate(dataMatrix):
        if len(row) != rowSize:
            break

        row[-1] = docOutput(row[-1], row[0], labels)
        thisRow = rowTemplate
        for colId in range(len(row)):
            thisRow = thisRow.replace("$" + str(colId + 1), row[colId])
        print(thisRow)
    sys.stdout.write(contents[templateEnd + 1:])
    return dataMatrix[index:]

def updateTable(file, dataMatrix):
    contents = open(file).read()
    currPos = 0
    currData = dataMatrix
    while True:
        tableStart = contents.find("<TABLE", currPos)
        if tableStart == -1:
            break
        sys.stdout.write(contents[currPos:tableStart])
        tableEnd = contents.find("</TABLE", tableStart)
        currData = handleTable(contents[tableStart:tableEnd], currData)
        currPos = tableEnd
        
    sys.stdout.write(contents[currPos:])

if __name__ == "__main__":
    labels = findLabels()
    for key in sorted(labels.keys()):
        print(key, labels[key])
