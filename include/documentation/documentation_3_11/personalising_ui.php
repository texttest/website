<div class="Text_Main_Header">Personalising TextTest's User Interfaces</div>

<div class="Text_Normal">There are many things which can be configured about the
TextTest GUIs, some of which are mostly a matter of personal
taste. To this end, it is possible to have a personal config
file where you place any entries that are supported by the
config files (although it is advisable to stick to GUI
appearance). This file should be called &ldquo;config&rdquo; and
placed in a subdirectory of your home directory called
&ldquo;.texttest&rdquo;. You can also place it anywhere at all
and identify the directory with the environment variable
$TEXTTEST_PERSONAL_CONFIG. (&ldquo;Home directories&rdquo; on
Windows are formed either from the $HOME variable or a
combination of the variables $HOMEDRIVE and $HOMEPATH)</div>

<div class="Text_Normal">You can edit and view these files by going to the &ldquo;Config&rdquo;
tab in the static GUI, where you will also see the config files
for the applications you're currently running on.</div>
<div class="Text_Normal">The look and feel of the GUI widgets themselves can be
configured by providing a GTK configuration file. This file
should be called &ldquo;.gtkrc-2.0&rdquo; and should be placed
in the same directory the above &ldquo;config&rdquo; file, if
you want it to only affect TextTest, or in your home directory
if you want it to affect all GTK GUIs you might run. The syntax
of these files is described, for example, at the <A class="Text_Link" href="http://www.pygtk.org/pygtktutorial/sec-gtksrcfileformat.html">PyGTK
homepage</A>.</div>

<div class="Text_Normal">You can also configure the contents of the toolbar via XML
files placed in this directory. Such an XML file should be named
to indicate to TextTest when it should kick in. (Note this naming scheme
has changed since version 3.10) For example:</div>
<UL>
	<LI><div class="Text_Normal">&ldquo;default_gui.xml&rdquo;
	(affect every time you start TextTest) 
	</div>
	<LI><div class="Text_Normal">&ldquo;default_gui-dynamic.xml&rdquo;
	(affect the dynamic GUI only) 
	</div>

	<LI><div class="Text_Normal">&ldquo;cvs_gui-static.xml&rdquo; (affect the
	static GUI only when running the CVS configuration) 
	</div>
</UL>
<div class="Text_Normal">The first element (before the dash) indicates that the file should only be loaded when the indicated
 <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=writing_a_config_module";?>#interactive_action_module">GUI configuration module</A> is being run. The second should be &quot;static&quot;,
&quot;dynamic&quot; or absent. The file name should always end
in .xml.</div><div class="Text_Normal">As for the contents, the easiest thing is to
look at the files in the source/layout directory and
pattern-match. Note you only need to add extra XML sections, you
don't need to copy these files, though they give you the names
of all possible elements. For an example which extends the
standard toolbar, look in the self-tests under
GUI/Appearance/UserDefinedGUIDescription/personaldir.</div>
<div class="Text_Header"><A NAME="static_collapse_suites"></A>Automatically collapsing the subsuites on startup in the
static GUI</div>
<div class="Text_Normal">By default the whole test suite will be expanded on starting
up the static GUI. This can sometimes be awkward, especially for
test writers who are only interested in a small part of the test
suite. For them, it is best that everything starts collapsed so
they can just view the parts that matter to them.</div>
<div class="Text_Normal">To this end there is a setting &ldquo;static_collapse_suites&rdquo;.
This should be set to 1 to disable the automatic expand of the
test suite. Instead, it will only expand the first level of
suites/tests.</div>
<div class="Text_Header"><A NAME="hide_gui_element"></A>The various &ldquo;bars&rdquo;

and how to hide them</div>
<div class="Text_Normal">TextTest comes by default with four bars: all of which are
optional: a menubar and toolbar at the top and a shortcut bar
and status bar at the bottom. The menubar and toolbar are fairly
standard and generally provide access to the same functionality.</div>
<div class="Text_Normal">The shortcut bar at the bottom allows you to create GUI
shortcuts for sequences of clicks that you do regularly. This is
the <A class="Text_Link" href="index.php?page=ui_testing&n=shortcuts">GUI shortcut
functionality</A> as provided by <A class="Text_Link" href="index.php?page=ui_testing&n=xusecase">PyUseCase</A>,
which TextTest itself relies on, primarily for its own testing,
but also to allow for this customisation possibility. 
</div>
<div class="Text_Normal">The status bar at the very bottom tries to indicate what
TextTest is doing right now or has just done. The &ldquo;throbber&rdquo;

at the far right indicates whether it is doing something:
sometimes searching a large test suite for example may take a
little time.</div>
<div class="Text_Normal">All of these can be hidden by default using the
&ldquo;hide_gui_element&rdquo; entry, as above, see the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default";?>">table
of config file settings</A> for the key format. If you don't
hide the menubar via this mechanism you can also show and hide
them via the &ldquo;View&rdquo; menu.</div>
<div class="Text_Header"><A NAME="gui_entry_overrides"></A><A NAME="gui_entry_options"></A><A NAME="gui_entry_completion_inline"></A>
<A NAME="gui_entry_completion_matching"></A><A NAME="gui_entry_completions"></A>

Configuring the default values of text boxes, check boxes and
radio buttons, and the contents of drop-down lists</div>
<div class="Text_Normal">There are plenty of configuration options in various tabs
around the GUI, and all are identified with a label next to
them. This label is used to identify them in the config file:
take any label, make it lower case and replace all spaces
replaced by underscores (&ldquo;_&rdquo;) and you have a way to
identify the control in the config file..</div>
<div class="Text_Normal">Default values are changed by using the config entry
&ldquo;gui_entry_overrides&rdquo;. For text boxes, simply
provide the key as given above with the text you want as the
default. For check boxes provide &ldquo;0&rdquo; or &ldquo;1&rdquo;

as appropriate. For radio buttons form the key by concatenating
the label with the label for the specific button you want
selected, and providing &ldquo;1&rdquo; also.</div>
<div class="Text_Normal">In a similar way you can configure what options are presented
in drop-down lists to the user, in the case of the text boxes.
This is done via the &ldquo;gui_entry_options&rdquo; config file
entry, which is keyed in the same way. For example:</div>
<div class="Text_Normal">

<?php codeSampleBegin() ?>
[gui_entry_overrides]
show_differences_where_present:0
current_selection_refine:1
run_this_version:sparc

[gui_entry_options]
run_this_version:linux
<?php codeSampleEnd() ?>
</div>
<div class="Text_Normal">
This will cause the dynamic GUI saving tab not to automatically
check the box for &quot;Show differences where present&quot;, as
in the example above. It will also cause the static GUI to
include the version &quot;linux&quot; in a drop-down list for
the &quot;Run this version&quot; text box and to set it to
&ldquo;sparc&rdquo; by default. And finally the radio button on
the &ldquo;Select Tests&rdquo; tab will select &ldquo;Refine&rdquo;

instead of the default &ldquo;Discard&rdquo;</div>
<div class="Text_Normal">There is also the possibility to enable
and configure GTK's entry completion functionality. This is separate
from the drop-down boxes and works by guessing what you're typing
based on what has been typed before. It is enabled by default, and will
by default match based on the beginning of what has been typed. To
disable it, set &ldquo;gui_entry_completion_matching&rdquo; to 0. To
cause the matching to occur on any part of what has been typed, set the
same entry to 2. If you want previous matching text to be automatically
inlined into what you're typing, set the &ldquo;gui_entry_completion_inline&rdquo;
entry to 1. Note that this can be confusing if you aren't used to it!
</div><div class="Text_Normal">Additionally, you can &ldquo;hardcode&rdquo;
completions that should always be present, by adding to the config file list entry 
&ldquo;gui_entry_completions&rdquo;.
</div>
<div class="Text_Header"><A NAME="test_colours"></A><A NAME="file_colours"></A>GUI
Colours</div>
<div class="Text_Normal">The colours for the test tree view (left window) and the file
view (top right window under Test tab) can be configured via the
GUI dictionary entries &ldquo;test_colours&rdquo; and
&ldquo;file_colours&rdquo; respectively. These are keyed with
particular pre-defined names for the different test states: to
see what they are, look at the default values in the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default";?>">table
of config file settings</A>. Any name that appears in the Status tab in the dynamic GUI can also be used 
as a key here, so you can also for example say:


<?php codeSampleBegin() ?>
[test_colours]
success:pale green
output different:pink
[end]
<?php codeSampleEnd() ?>

The values should be text strings as recognised by RGB files.</div>
<div class="Text_Normal">
The static GUI uses the special key "static" which defaults to a pale grey,
and colours are less important there. However it is possible to set the different
types of files in the file view to be different colours if desired, use the keys
static_data, static_standard and static_definition for this purpose.</div>

<div class="Text_Header"><A NAME="gui_accelerators"></A>Keyboard accelerators</div>
<div class="Text_Normal">The toolbar actions generally have keyboard accelerators,
whose values can be seen from the menus which also contain them.
These can be configured via the &ldquo;gui_accelerators&rdquo;
dictionary entry. The keys in this dictionary should correspond
to the labels on the relevant buttons, and the values should be
for example &ldquo;&lt;control&gt;&lt;alt&gt;r&rdquo; or &ldquo;F4&rdquo;.
If in doubt, consult the format of the default ones in the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=configfile_default";?>">>table
of config file settings</A>. The values should be text strings
as recognised by RGB files.</div>

<div class="Text_Header"><A NAME="window_size"></A>Window and Pane sizes</div>
<div class="Text_Normal">If you find the TextTest window sizes to be inconvenient you
can also configure this. There is a config file dictionary entry
&ldquo;window_size&rdquo;. This has various keys, which can be
prefixed by &ldquo;static_&rdquo; or &ldquo;dynamic_&rdquo; to
make them specific to the particular GUIs if desired. 
</div>
<div class="Text_Normal">&ldquo;maximize&rdquo;, if set to 1, will maximise the window
on startup.</div>

<div class="Text_Normal">&ldquo;height_pixels&rdquo; and &ldquo;width_pixels&rdquo;
give the window an absolute size at startup (not recommended
outside personal files!)</div>
<div class="Text_Normal">&ldquo;height_screen&rdquo; and &ldquo;width_screen&rdquo;
give the window a size as a fraction (not percentage!) of the
size of your screen. 
</div>

<div class="Text_Normal">&ldquo;horizontal_separator_position&rdquo; and
&ldquo;vertical_separator_position&rdquo; allow a default
configuration of where the pane separators start out, also as a
fraction of screen size.</div>
<div class="Text_Header"><A NAME="query_kill_processes"></A>Cleanup operations on
quitting the GUI</div>
<div class="Text_Normal">Naturally, when you press Quit in the GUI it will try to
clean up everything it has created in terms of both files and
processes. For what happens to the temporary files created, see
the <A class="Text_Link" href="<?php print "index.php?page=".$version."&n=texttest_sandbox"; ?>#-keeptmp">section on the temporary
directory</A>.</div>
<div class="Text_Normal">As we've seen above, it is quite possible to start many
different viewers and editors from TextTest and many different
dynamic GUI runs from the static GUI. If all of these had to be
closed by hand it would probably be cumbersome &ndash; so the
default operation of TextTest is to find all of these processes
and kill them. On UNIX, they will be sent SIGINT, SIGTERM and
SIGKILL with a pause in between. On Windows, they will be
terminated with &ldquo;taskkill&rdquo; which tends to be fairly
final. If for any reason the tests don't terminate as rapidly
as they should, pressing Quit a second time is recommended.</div>

<div class="Text_Normal">It can be useful to configure a questioning dialog such that
TextTest will ask you before killing such processes. This is the
purpose of the &ldquo;query_kill_processes&rdquo; config file
entry. This is a composite dictionary whose keys are &ldquo;static&rdquo;,
&ldquo;dynamic&rdquo; or &ldquo;default&rdquo; (this last for
both static and dynamic GUIs) and the values are patterns of
&ldquo;process names&rdquo;: i.e. names of editors, viewers, the
dynamic GUI etc. For eaxmple:</div>
<div class="Text_Normal">
<?php codeSampleBegin() ?>
[query_kill_processes]
default:.*emacs
static:tkdiff
dynamic:texttest.*
<?php codeSampleEnd() ?>

