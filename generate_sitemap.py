#!/usr/bin/env python
import os,sys

os.chdir("include/");

sitemap = open("sitemap.php","w")
sitemap.write('<table class="Table_Normal"><tr><td>\n')
sitemap.write('<div class="Text_Header">Site map</div>\n')
sitemap.write('<table class="index">\n')


def findAndHTML(path,level):
    files = os.listdir(path)
    sitemap.write('<div class="Text_Normal">\n')
    for file in files:
        current_file = os.path.join(path,file)
        if os.path.isdir(current_file):
            towrite = file + "<br>"
            sitemap.write(towrite)
            findAndHTML(current_file,level+1)
        else :
            if current_file[-3:] == "php":
                if level == 1:
                    towrite = '<a class="Text_Link" href="index.php?page=' + file[:-3] + '"><br>'
                elif level == 2:
                    towrite = '<a class="Text_Link" href="index.php?page=' + file[:-3] + '"><br>'
                else:
                    towite = file+'<br>'
                sitemap.write(towrite)
    sitemap.write('</div>\n')

findAndHTML(os.getcwd(),1)
sitemap.write('</table></td></tr></table>\n')
