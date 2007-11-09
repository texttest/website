#!/usr/bin/env python

import os, sys, filecmp

def update(script, file, scriptDir=""):
    print "updating:",file 
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
    update("updateoptions.py", "options.php", scriptDir)
    update("updateconfig.py", "configfile.php", scriptDir)
    update("updatescripts.py", "scripts.php", scriptDir)

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
os.chdir("include/documentation/")
#if len(sys.argv) > 1:
    #makeAllTables()
makeTables()
#os.chdir("../../")
#update("updatesitemap.py", "info.html")
#update("whatsnew.py", "whatsnew.html")
