The current documentation can be found in include/documentation/documentation_trunk.
If you happen to document a (new) config file option, add a tag (<A name...) in
whichever file you add your text to. Then go to include/documentation/documentation_trunk
and run ../../../scripts/updatetables.sh "path_to_your_texttest.py"
which will recreate the config tables and create the link to the text.

