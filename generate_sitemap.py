#!/usr/bin/env python
import os

os.chdir("include/");

sitemap = open("sitemap.php","w")
sitemap.write('<table class="Table_Normal"><tr><td>\n')
sitemap.write('<div class="Text_Header">Site map</div>\n')
sitemap.write('<table class="index">\n')


def findAndHTML(path):
    files = os.listdir(path)
    for file in files:
        #print file
        current_file = os.path.join(path,file)
        if os.path.isdir(current_file):
            #print str(current_file)
            findAndHTML(current_file)
        else :
           rows = open(current_file) 
           for row in rows:
               if row[0:9] == "<!--TITLE":
                   title =  row[10:row.index("PAGEINFO:")]
                   pageinfo = row[(row.index("PAGEINFO:")+9):row.index("PATH")]
                   phppath = row[(row.index("PATH:")+5):row.index("-->")]
                   towrite = '<tr valign=top><td width=100><div class="Text_Normal"><a href="index.php?' + phppath + '" class="Text_Link">' +title +'</a><div>\n</td><td><div class="Text_Normal">'+ pageinfo + '</div></td></tr>'
                   sitemap.write(towrite)

findAndHTML(os.getcwd)
sitemap.write('</table></td></tr></table>\n')