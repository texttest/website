#!/usr/bin/env python

#Created by Henning Thornblad

#This scripts recursivly checks all images

#Requirments
# *  PHP naturally. must be reacheable from anywhere
#    (Windows User: Set php directory in PATH,
#    and if you don't know how, google it)
#
# *  If some of your php scripts uses $_GET to decide contents of your page insert this
#    piece of code in those scripts
#     if (isset ($argv))
#             for ($i=1;$i<count($argv);$i++)
#             {
#                     
#                     $it = split("=",$argv[$i]);
#                     $_GET[$it[0]] = $it[1];
#             }
#    (It will catch and save all $_GET)

#Restrictions
#  Can't handle IMG tags created by JavaScript code (java is not parsed)
#  Assumes all image files are embedded with "" (which is WC3 Standard anyway)


import os,sys

#List of links already checked
#Used to avoid dead loops
#and redundant checks
checkedLinks = list()

#This list stores all known incorrect links
knownIncorrectImagePaths  = list()

#Counting for statistics
multiLineImages = 0
incorrectImages = 0

def printError(URL,targetURL,onLine):
    global incorrectImages
    incorrectLinks += 1
    print "404!!!"
    print "  Link:" + URL
    print "  Found in:" + targetURL
    print "  On line:" ,onLine
    print ""

def linkIsInternal(link):
    if "index.php" in link:
        return True
    else:
        return False

def splitHash(link):
    if "#" in link:
        return link[0:link.index("#")],link[link.index("#"):]
    else:
        return link,""
        
        
def splitURL(URL):
    url = URL
    getLine = ""

    url,hashLine = splitHash(url)

    if "?" in url:
        getLine = url[url.index("?"):]
        url = url[0:url.index("?")]
        getLine = getLine.replace("?","")
        getLine = getLine.replace("&"," ")
        
    return url, getLine
        

def check(URL,targetURL):
    global multiLineImages, checkedLinks, knownIncorrectImages
    #print "Check:", URL
    file, getLine = splitURL(URL)
    parsedFile = os.popen("php " + file + " " + getLine +  " r")
    nr=0
    for line in parsedFile.readlines():
        currentLine = line
        while '<IMG>' in currentLine:
            currentLine = currentLine[currentLine.index('href="') + 6:]
            if '"' in currentLine:
                link = currentLine[0:currentLine.index('"')]
                if linkIsInternal(link):
                    link, hashLine = splitHash(link)
                    if not link in checkedLinks and link not in knownIncorrectLinks:
                        checkedLinks.append(link)
                        if not check(link,URL):
                            knownIncorrectLinks.append(link)
                            checkedLinks.remove(link)
                            
                    if link in knownIncorrectLinks:
                        print404(link,URL,nr)
                        
                    currentLine.replace('href="' + link + hashLine + '"',"")
            else:
                multiLineLinks += 1
                print "Found multiline link! (or link incorrectly terminated)"
                print "  Located in: " + URL
                print "  Starting on line:" + line
                print ("  (line number:" + str(nr) + ")")
                print ""
    return True


print "Checking PHP Images"
print ""
os.chdir("..");
check("index.php","index.php")

print "Complete..."
print "  * Found: ", incorrectLinks, "incorrect images"
print "  * Found: ", multiLineLinks, "multiline images"
#print repr(checkedLinks)
