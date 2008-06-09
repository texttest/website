#!/usr/bin/env python

#Created by Henning Thornblad

#This scripts recursivly checks all internal links as defined by linkIsInternal()

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
#  Can't handle links created by JavaScript code (java is not parsed on teh server side)
#  Assumes all links are embedded with "" (which is WC3 Standard anyway)
#  That all pages is defined in linkIsInternal()



import os, sys

#Since HTML isn't case sensitive (and string compare is)
#we need to eliminate variations
def easyParse(line):
    newLine = line.replace("Href=","href=")
    newLine = newLine.replace("HREF=","href=")
    newLine = newLine.replace("HRef=","href=")

    newLine = newLine.replace("<IMG","<img")
    newLine = newLine.replace("<Img","<img")

    newLine = newLine.replace("SRC=","src=")
    newLine = newLine.replace("Src=","src=")
    return newLine
    

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

def print404(URL,targetURL,onLine):
    global incorrectLinks
    incorrectLinks += 1
    print "404!!!"
    print "  Link:" + URL
    print "  Found in:" + targetURL
    print "  On line:" ,onLine
    print ""

def printLastUpdatedError(targetURL,onLine,line):
    global ERROR_IN_LAST_UPDATED,missingLastUpdated
    missingLastUpdated += 1
    print "Error in Last update function!!!"
    print "  Found in:" + targetURL
    print "  On line:" ,onLine
    #Remove Error string and the comment tags sorrunding the reason (the "<!--" and "-->")
    print "  Reason:", line.replace(ERROR_IN_LAST_UPDATED,"").replace("-->","").replace("<!--","")
    print ""

def check(URL,targetURL):
    global ERROR_STRING, ERROR_IN_LAST_UPDATED, incorrectImgTags, missingImgFile ,multiLineLinks, checkedLinks, knownIncorrectLinks
    #print "Checking:", URL
    file, getLine = splitURL(URL)
    parsedFile = os.popen("php " + file + " " + getLine +  " r")
    nr=0
    for line in parsedFile.readlines():
        nr += 1
        if ERROR_STRING in line:
            print404(URL,targetURL,nr)
            return False
        if ERROR_IN_LAST_UPDATED in line:
            printLastUpdatedError(targetURL,nr,line)
            
        
        currentLine = easyParse(line)

        #Search and check images
        while '<img' in currentLine:
            if 'src="' in currentLine and '>' in currentLine and '"' in currentLine[currentLine.index('src="') + 5 :]:
                currentLine = currentLine[currentLine.index('src="') + 5 :]
                imgFile = currentLine[:currentLine.index('"')]
                if not os.path.exists(imgFile):
                    print "Found missing image"
                    print "  File Path:" + imgFile
                    print "  Located in: " + URL
                    print "  Found on line:" + line
                    print ("  (line number:" + str(nr) + ")")
                    print ""
                    missingImgFile += 1
                currentLine = currentLine[currentLine.index('>') + 1 :]
            else:
                print "Found incomplete image tag"
                print "  Located in: " + URL
                print "  Starting on line:" + line
                print ("  (line number:" + str(nr) + ")")
                print ""
                incorrectImgTags += 1

                #Stops while loop (else unpredictable future)
                currentLine = ""
                
        currentLine = easyParse(line)
        
        #Search and check links
        while 'href="' in currentLine:
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

print "Checking Internal PHP links, images and key functions\n"
sys.stdout.flush()

#This should be a string only found on your 404 page
ERROR_STRING = "<!--404_PAGE_NOT_FOUND-->"

#This should be a string found when the last updated mechanism did not work
ERROR_IN_LAST_UPDATED = "<!--FUNCTION_LAST_UPDATED_DID_NOT_WORK-->"

#List of links already checked
#Used to avoid dead loops
#and redundant checks
checkedLinks = list()

#This list stores all known incorrect links
knownIncorrectLinks  = list()

#Counting for statistics
multiLineLinks = 0
incorrectLinks = 0
incorrectImgTags = 0
missingImgFile = 0
missingLastUpdated = 0


os.chdir("..");
check("index.php","index.php")

print "Complete..."
print "  * Found:", missingLastUpdated ,   "error in last updated"
print "  * Found:", incorrectImgTags, "incorrect image tags"
print "  * Found:", missingImgFile,   "missing images"
print ""
print "  * Found:", incorrectLinks,   "incorrect links"
print "  * Found:", multiLineLinks,   "multiline links"
print ""


 
#print repr(checkedLinks)
