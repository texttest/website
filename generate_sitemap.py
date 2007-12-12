#!/usr/bin/env python
import os,sys

os.chdir("include/");

sitemap = open("sitemap.php","w")
sitemap.write('<table class="Table_Normal"><tr><td>\n')
sitemap.write('<div class="Text_Header">Site map</div>\n')
sitemap.write('<table class="index">\n')

unwantedDirs = ["CVS","images","kataminesweeper","htmlreport_example"]


def findTitle(path):
    headers = ['<div class="Text_Main_Header">','<div class="Text_Header">']
    end = '</end>'
    file = open(path,"r")
    for line in file.readlines():
        for head in headers:
            if head in line:
                return line[:]
        
    return "No Header Found"

#Sort the files so that directories are listed last
def sortFiles(files,path):
    onlyFiles = list()
    onlyDirs = list()
    for file in files:
        if os.path.isdir(os.path.join(path,file)):
            if file not in unwantedDirs:
                onlyDirs.append(file)
        else:
            onlyFiles.append(file)
    onlyFiles.sort()
    onlyDirs.sort()

    if "main.php" in onlyFiles:
        mainIndex = onlyFiles.index("main.php") 
        onlyFiles[mainIndex] = onlyFiles[0]
        onlyFiles[0] = "main.php"
        
    return onlyFiles + onlyDirs

def findAndHTML(path,level=""):
    files = os.listdir(path)
    sitemap.write('<div class="Text_Normal">\n')
    files = sortFiles(files,path)
    for file in files:
        current_file = os.path.join(path,file)
        if os.path.isdir(current_file):
            towrite = "<br><B>Pages under " + file + "</B>\n"
            sitemap.write(towrite)
            if level == "" : findAndHTML(current_file,file)
            elif level == "documentation":findAndHTML(current_file,file)
        else :
            if current_file[-3:] == "php":
                if level == "" :
                    towrite = '<a class="Text_Link" href="index.php?page=' + file[:-4] + '">' + findTitle(current_file) + '</a><br>\n'
                else:
                    towrite = '<a class="Text_Link" href="index.php?page=' + level + '&n=' + file[:-4] + '">' + file[:-4] + '</a><br>\n'
                #else:
                #    towite = file + '<br>\n'
                sitemap.write(towrite)
    sitemap.write('</div>\n')

findAndHTML(os.getcwd())
sitemap.write('</table></td></tr></table>\n')
