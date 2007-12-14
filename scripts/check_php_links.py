#!/usr/bin/env python
import os,sys

SEARCH_DEPTH = 5;


def check(URL,level):

    file = os.popen("php " + URL ,"r")
    for line in file.readlines():
        print line

check("index.php",1)
