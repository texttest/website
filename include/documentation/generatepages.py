#!/usr/bin/env python

import os, sys, filecmp

def update(script, file, scriptDir=""):
    if scriptDir:
        script = os.path.join(scriptDir, script)
    newFile = file + ".new"
    os.system(script + " > " + newFile)
    if not filecmp.cmp(file, newFile, 0):
        #os.system("tkdiff " + file + " " + newFile)
        os.remove(file) 
        os.rename(newFile, file)
    else:
        os.remove(newFile)

def makeTables(scriptDir=""):
    update("updateoptions.py", "options.html", scriptDir)
    update("updateconfig.py", "configfile.html", scriptDir)
    update("updatescripts.py", "scripts.html", scriptDir)

def makeAllTables():
    makeTables()
    notConfigDirs = [  ]
    for dir in os.listdir(os.getcwd()):
        if os.path.isdir(dir) and dir != "htmlreport_example" and not dir.startswith("3"):
            os.chdir(dir)
            makeTables("..")
            os.chdir("..")    

#os.system("website/alllinks.py")
rootDir = os.getcwd()
os.chdir("ttwebsite/TextTest/docs")
if len(sys.argv) > 1:
    makeAllTables()
os.chdir("../../")
update("updatesitemap.py", "info.html")
update("whatsnew.py", "whatsnew.html")
