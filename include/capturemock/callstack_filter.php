<div class="Text_Main_Header">Callstack Filtering</div>
<div class="Text_Description">Disabling intercepting when calls are made from certain modules and packages</div>
<div class="Text_Normal">
If you intercept something quite low-level, such as "os.getpid" you run into the issue that this may well be called
by the standard library itself, or by development tools like PyUseCase or coverage.py. This obviously leads to far more calls being intercepted and recorded than you actually want.
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
assuming our tests might use PyUseCase and coverage.py to extract information.

</div>
