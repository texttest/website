<div class="Text_Main_Header">Transforming the recorded mock files</div>
<div class="Text_Description">Handling objects that don't comply with the repr-eval convention</div>
<div class="Text_Normal">
Recording and replaying Python code with CaptureMock will only work out of the box when applied to objects for which eval(repr(x)) will reconstruct x. This is a convention followed in Python for all basic objects, but you may run into objects where it isn't followed. For example, you might try to intercept "os.stat", and end up with a mock file like this:
<?php codeSampleBegin() ?>
<-PYT:os.stat("/tmp/myfile")
->RET:posix.stat_result(st_mode=33204, st_ino=29463754, st_dev=19L, 
                        st_nlink=1, st_uid=293, st_gid=13, st_size=72883, 
                        st_atime=1274110664, st_mtime=1187778284, 
                        st_ctime=1187778284)
<?php codeSampleEnd() ?>
This looks OK, but it will throw an exception if you try to replay it, because the string in the return value cannot be passed to "eval".
It also won't work on Windows as it's trying to use the "posix" module directly instead of the general "os" module.
</div>
<div class="Text_Normal">
All the information we need is there to reconstruct the object though, so we can tell CaptureMock to transform it for us by defining a series of 'alterations' in our CaptureMock rc file :
<?php codeSampleBegin() ?>
[python]
intercepts = os.stat
alterations = posixmodule,pythonbug1820

# This alteration swaps "posix" for "os", and doubles up the brackets
[posixmodule]
match_pattern = ^posix\.stat_result\((.*)\)
replacement = os.stat_result((\1))

# Return values from os.stat and os.lstat aren't repr-eval friendly
# (see Python bug 1820)
[pythonbug1820]
match_pattern = st_[a-z]*=
replacement =
<?php codeSampleEnd() ?>
With that lot in place, we will now get instead
<?php codeSampleBegin() ?>
<-PYT:os.stat("/tmp/myfile")
->RET:os.stat_result((33204, 29463754, 19L, 1, 293, 13, 72883, 
                      1274110664, 1187778284, 1187778284))
<?php codeSampleEnd() ?>
which will duly work correctly in eval() and all will be well. The match pattern can be an ordinary string or regular expression,
and the replacement string may use back references, as in the "posixmodule" example.
</div>
