#!/usr/bin/env python
import os,sys

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
            towrite = "Current Directory: " + current_file + "<br>"
            sitemap.write(towrite)
            findAndHTML(current_file)
        else :
            towrite = "Current File:"  + current_file + "<br>"
            sitemap.write(towrite)

findAndHTML(os.getcwd)
sitemap.write('</table></td></tr></table>\n')
