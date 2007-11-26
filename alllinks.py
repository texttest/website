#!/usr/bin/env python

import os, sys
from urllib2 import urlopen

def printLinks(dir):
    for file in os.listdir(dir):
        fullPath = os.path.join(dir, file)
        if file != "javadoc" and os.path.isdir(fullPath):
            printLinks(fullPath)
        elif file.endswith(".html") or file.endswith(".htm") or file.endswith(".php"):
            printFileLinks(fullPath)

def printFileLinks(file):
    print "File", file.replace(os.getcwd(), ""), ":"
    curDir, local = os.path.split(file)
    for line in open(file).xreadlines():
        if line.find("<a href") != -1 or line.find("<A HREF") != -1:
            words = line.strip().split("\"")
            for index in range(len(words)):
                if words[index].endswith("<a href=") or words[index].endswith("<A HREF="):
                    printLink(words[index + 1], curDir, file)

def printLink(link, curDir, file):
    link = link.split("#")[0]
    if len(link) == 0:
        return
    if link.startswith("http:") or link.startswith("https:"):
        if not extLinks.has_key(link):
            extLinks[link] = []
        extLinks[link].append(file)
        return
    localRoot = "http://paphos.carmen.se/ptsp/" + os.getenv("USER") + "dev/texttest"
    localName = os.path.basename(link)
    if localName.lower() != localName and localName.endswith(".html") and localName != "ScriptEngine.html" and not localName.startswith("test_batch"):
        print "CHECK CAPITALS", link
    fullLink = os.path.join(localRoot, link)
    if not verifyLink(fullLink):
        print "BROKEN LINK", link

def verifyLink(link):
    try:    
        urlopen(link)
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
