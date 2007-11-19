#!/usr/bin/env python

import os, sys
from urllib2 import urlopen

def printLinks(dir):
    for file in os.listdir(dir):
        fullPath = os.path.join(dir, file)
        if file != "javadoc" and os.path.isdir(fullPath):
            printLinks(fullPath)
        elif file.endswith(".php") or  file.endswith(".htm") :
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
    localName = os.path.basename(link)
    if localName.lower() != localName and localName.endswith(".html") and localName != "ScriptEngine.html":
        print "CHECK CAPITALS", link
    cwd = os.getcwd()
    os.chdir(curDir)
    if not os.path.exists(link):
        print "BROKEN LINK", link
#    else:
#        print link
    os.chdir(cwd)

def printExternal():
    print "External sites linked to"
    for link, files in extLinks.items():
        if link.startswith("https:"):
            print "CANNOT VERIFY", link
        else:
            try:    
                urlopen(link)
                print link
            except:
                print "BROKEN LINK (EXTERNAL)", link, "found in :"
                for file in files:
                    print file
                    
extLinks = {}
printLinks(os.getcwd())
if len(sys.argv) == 1:
    printExternal()
