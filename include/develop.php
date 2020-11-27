<!--TITLE:Develop PAGEINFO:Develop Texttest PATH:page=develop-->
<table class="Table_Normal">
 <tr>
  <td>
   <div class="Text_Main_Header">Developing TextTest</div>
<div class="Text_Header">Checking out the latest version of the code</div>
<div class="Text_Normal">
The code is hosted in Github. Some instructions for checking it out are on <A class="Text_Link" HREF="index.php?page=download">the download page</A>. 
</div>   
<div class="Text_Header">Running the self-tests</div>
<div class="Text_Normal">
Check out the self-tests from <a class="Text_Link" href="https://github.com/texttest/selftest">here</A>. 
</div>
<div class="Text_Normal">
The self-tests expect you to set TEXTTEST_HOME to the parent directory of your branch created above, they can then live alongside other tests you write in a single directory structure if you want to set it up like that. 
</div>
<div class="Text_Normal">
On UNIX, you probably want to make sure you have Xvfb installed, otherwise you'll get lots of TextTest GUIs popping up on your screen when you run the GUI self-tests. 
</div>
<div class="Text_Normal">
The self-tests also assume that the TextTest source to be tested can be found in the same location as in the release tarball, i.e. $TEXTTEST_HOME/../source. If you put them somewhere else you'll need to tell it this. This is controlled by the setting in the file default_site/site_configfile in the self-tests: you can either edit this locally or preferably, copy the file to site/siteconfig/site_configfile and edit it there, where it will be read instead of the default_site location. This also means it won't show up as a change when you check status in Git. You can also make other locally-relevant configuration changes for the self-tests in that file.
</div>
<div class="Text_Normal">
We make every effort to ensure that the self-tests are always green, but there are more than 1600 of them now and there are many different combinations of platforms, python versions, GTK versions etc, which can of course lead to problems. If they fail on the current source for you, the first thing to do is to check their <A class="Text_Link" HREF="index.php?page=nightjob">status in the nightjob</A>. This page is updated nightly with the result of test runs on Linux and Windows using different GTK versions. You can check in the nightjob history to see if a test has failed there in the past.</div>
<div class="Text_Header">Editing the documentation</div>
<div class="Text_Normal">
 The source for this website can also be retrieved from <a class="Text_Link" href="https://github.com/texttest/website">here</A> if you find errors in the documentation, or your changes require extra documentation.
   </div>
<div class="Text_Header">Very high-level TextTest design overview</div>
<div class="Text_Normal">
  TextTest consists of a <u>core framework</u> and <u>configuration modules</u>. These are intended to be fairly separate. 2 configuration modules, are provided by default, "default" and "queuesystem". The "default" configuration runs tests in sequence on the local machine, while "queuesystem" supports parallelism, either locally, via grid software or clouds.
</div>
<div class="Text_Normal">
The <u>core framework</u> mostly represents the data model and the framework abstractions. This code is largely contained in the <i>engine</i> and <i>testmodel</i> modules and is where TextTest starts. The key abstraction classes in the data model are <i>testmodel</i>.<b>Application</b>, <i>testmodel</i>.<b>TestCase</b> and <i>testmodel</i>.<b>TestSuite</b>. These concepts are explained in the <A class="Text_Link" HREF="index.php?page=documentation_trunk&n=about_testsuites">test suite guide</A>. </div>
<div class="Text_Normal">
An <b>Application</b> owns a <i>configObject</i>, which is a single instance of the configuration being used. This is found from the <A class="Text_Link" HREF="index.php?page=documentation_trunk&n=writing_a_config_module#config_module">"config_module"</A> setting, which points out a module name: the <i>getConfig</i>() method is then called on that module. <i>testmodel</i>.<b>Application</b> forwards all method calls it doesn't understand to this <i>configObject</i>, and indeed make two attempts to call, once with and once without itself as the first argument.
</div>
<div class="Text_Normal">
The <u>default configuration</u> is used if <A class="Text_Link" HREF="index.php?page=documentation_trunk&n=writing_a_config_module#config_module">"config_module"</A> is not set and there is only 1 core on the local machine. It makes use of an <b>ActionRunner</b> object, which maintains a sequence of <i>plugins</i>.<b>Action</b> objects. These consist of actions to carry out in sequence on the tests that are loaded. The sequence is determined by the <i>getActionSequence</i>() method on the <b>Configuration</b> object. A typical test run contains separate <b>Action</b>s to make the sandbox, copy and link the relevant test data there, filter the approved files, run the test, filter the temporary files, compare the results and act on the results. 
</div>
<div class="Text_Normal">
The <u>queuesystem configuration</u> is used if <A class="Text_Link" HREF="index.php?page=documentation_trunk&n=writing_a_config_module#config_module">"config_module"</A> is not set and there is more than 1 core on the local machine. It has a secondary module-finding config setting, <A class="Text_Link" HREF="index.php?page=documentation_trunk&n=running_tests_in_parallel#queue_system_module">"queue_system_module"</A>, which points out which queuesystem set up (<i>local</i>, <i>lsf</i>, <i>sge</i>, <i>condor</i>, <i>ec2cloud</i> currently) is to be used. Note that this works via TextTest (the "master" process) submitting a copy of itself (the "slave" process) to the queue module concerned. These two processes then commmunicate with each other via the slave initiating socket connections and receiving responses from the master.
</div>
<div class="Text_Normal">
The <u>slave process</u> works much in the same way as the <i>default</i> configuration above: i.e. it has the <b>ActionRunner</b> and performs all the test-related actions. Initially, it gets given a single test to run: it runs that test and sends the result to the master, and then waits for a synchronous response from the master to tell it which test to run next, if any. There is no limit to how many tests any individual slave process might run.
</div>
<div class="Text_Normal">
The <u>master process</u> has two key classes, both of which run in separate threads (their <i>run</i> method being the main entry point), <i>masterprocess</i>.<b>QueueSystemServer</b> and <i>masterprocess</i>.<b>SlaveServerResponder</b>. The thread in <b>QueueSystemServer</b> will try to start slave processes for the tests up to the capacity (<A class="Text_Link" HREF="index.php?page=documentation_trunk&n=running_tests_in_parallel#queue_system_max_capacity">"queue_system_max_capacity"</A>) and will then poll the queue system from time to time to check the status of these slaves. Sometimes a slave machine fails, the aim of this polling is to detect and report such issues rather than just waiting forever. Meanwhile, the thread in <b>SlaveServerResponder</b> listens on a socket for communications from the slaves: when a test completes this is reported and another test is pulled off the queue and sent to that slave to be run as a synchronous response to the communication.
</div>
<div class="Text_Normal">
The <u>GUI code</u> comes along with the <i>default</i> configuration, and is contained under the <i>default.gtkgui</i> package, with the <i>controller</i> module being the main entry point and the thing that lays out the GUI and decides what needs to observe what. The GUI is based heavily around the Observer pattern, implemented by many classes inheriting from <i>plugins</i>.<b>Observable</b>. When an object wants to send a message to its observers, it calls <i>self</i>.notify(<font color="#00aa00">"FooBar"</font>), which results in the <i>notifyFooBar</i> method being called on all the observers, if it exists. 
</div>  
  </td>
 </tr>
</table>
