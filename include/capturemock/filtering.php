<div class="Text_Main_Header">Filtering what is recorded</div>
<div class="Text_Header">Repeated calls</div>
<div class="Text_Normal">
Ordinarily, CaptureMock will record every call made to an intercepted function. This can be important, as some functions will return different results when called subsequently. For some things though, it just creates clutter, and then it's useful to be able to disable it.</div>
<div class="Text_Normal">
For example, suppose we want to test locale-specific behaviour. The easiest way to do that is to intercept locale.getdefaultlocale, but the value of this is very unlikely to change during the run. So we configure as follows:
<?php codeSampleBegin() ?>
[python]
intercepts = locale.getdefaultlocale

[locale.getdefaultlocale]
check_repeated_calls = False
<?php codeSampleEnd() ?>
This will then result in a mock file that neatly says something like
<?php codeSampleBegin() ?>
<-PYT:locale.getdefaultlocale()
->RET:('en_US', 'UTF8')
<?php codeSampleEnd() ?>
instead of the same information repeated lots of times for every time we call this method.</div>
<div class="Text_Normal">
You can also disable it "across the board", i.e. in the general Python section, like this:
<?php codeSampleBegin() ?>
[python]
intercepts = locale.getdefaultlocale,something.else,and.another.one
check_repeated_calls = False
<?php codeSampleEnd() ?>
</div>
<div class="Text_Header">Callstack filtering</div>
<div class="Text_Normal">
If you intercept something quite low-level, such as "os.getpid" you run into the issue that this may well be called
by the standard library itself, or by development tools like StoryText or coverage.py. This obviously leads to far more calls being intercepted and recorded than you actually want.
</div>
<div class="Text_Normal">
CaptureMock therefore makes sure that any calls made by the standard library or by its own interceptor programs are not intercepted and
recorded. This does mean that you need to intercept exactly the right thing. For example it will not work to
intercept "subprocess.Popen" if your program actually calls "subprocess.call", even though the latter calls the
former internally.
</div>
<div class="Text_Normal">
To tell it to block calls made from other places, you would do as follows.
<?php codeSampleBegin() ?>
[python]
intercepts = os.getpid
ignore_callers = coverage,usecase
<?php codeSampleEnd() ?>
This will intercept "os.getpid" except when it is called from any module in a directory called "coverage" or from the "usecase" module,
assuming our tests might use StoryText and coverage.py to extract information.

</div>
