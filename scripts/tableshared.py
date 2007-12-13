#!/usr/local/bin/python

import os
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
    tStart = contents.find("<TABLE")
    afterRow = contents.find("</TR>", tStart)
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
    if labels.has_key(keyTitle):
        return "<A class=\"Text_Link_Small\" HREF=\"" + labels[keyTitle] + "\">" + doc + "</A>"
    else:
        return doc

def updateTable(file, dataMatrix):
    contents = open(file).read()
    templateStart, templateEnd = findTemplate(contents)
    rowTemplate = getRowTemplate(contents, templateStart, templateEnd)
    tableStart = getTableStart(contents)
    labels = findLabels()
    print contents[:tableStart]
    for row in dataMatrix:
        row[-1] = docOutput(row[-1], row[0], labels)
        thisRow = rowTemplate
        for colId in range(len(row)):
            thisRow = thisRow.replace("$" + str(colId + 1), row[colId])
        print thisRow
    print contents[templateEnd + 1:].rstrip()


if __name__ == "__main__":
    labels = findLabels()
    for key in sorted(labels.keys()):
        print key, labels[key]
