#!/usr/bin/env python

import os, sys
from urllib2 import urlopen

linktags = [ "<a href", "<A HREF", "<img src", "<IMG SRC" ]

def printLinks(dir):
    for file in os.listdir(dir):
        fullPath = os.path.join(dir, file)
        if file != "javadoc" and os.path.isdir(fullPath):
            printLinks(fullPath)
        elif file.endswith(".html") or file.endswith(".htm") or file.endswith(".php"):
            printFileLinks(fullPath)

def isLinkTag(word):
    for linktag in linktags:
        if word.endswith(linktag + "="):
            return True
    return False


def printFileLinks(file):
    print "File", file.replace(os.getcwd(), ""), ":"
    curDir, local = os.path.split(file)
    for line in open(file).xreadlines():
        words = line.strip().split("\"")
        for index, word in enumerate(words):
            if isLinkTag(word):
                printLink(words[index + 1], curDir, file)

def checkCapitals(link):
    localName = os.path.basename(link)
    if localName.lower() != localName and localName.endswith(".html") and localName != "ScriptEngine.html" and not localName.startswith("test_batch"):
        print "CHECK CAPITALS", link

def getRelDir(link, file, fileRoot):
    if link.find(".php?") != -1:
        return ""
    relDir = os.path.dirname(file).replace(fileRoot, "")
    if relDir.startswith("/"):
        return relDir[1:]
    else:
        return relDir

def printLink(link, curDir, file):
    link = link.split("#")[0]
    if len(link) == 0:
        return
    if link.startswith("http:") or link.startswith("https:"):
        if not extLinks.has_key(link):
            extLinks[link] = []
        extLinks[link].append(file)
        return
    if link.find("?php") != -1:
        print "CANNOT EXPAND", link
        return
    checkCapitals(link)
    localRoot = "http://paphos.carmen.se/ptsp/" + os.getenv("USER") + "dev/texttest"
    fileRoot = os.path.abspath(os.path.dirname(sys.argv[0]))
    relDir = getRelDir(link, file, fileRoot)
    fullLink = os.path.join(localRoot, relDir, os.path.basename(link))
    if not verifyLink(fullLink):
        print "BROKEN LINK", link

def verifyLink(link):    
    try:    
        info = urlopen(link).read()
        if info.find("page you requested was not found") != -1:
            return False

        print link
        return True
    except:
        return False


def printExternal():
    print "External sites linked to"
    for link, files in extLinks.items():
        if link.startswith("https:"):
            print "CANNOT VERIFY", link
        else:
            if not verifyLink(link):
                print "BROKEN LINK (EXTERNAL)", link, "found in :"
                for file in files:
                    print file

                    
extLinks = {}
printLinks(os.getcwd())
if len(sys.argv) == 1:
    printExternal()
