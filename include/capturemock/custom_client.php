<div class="Text_Main_Header">Writing a custom client</div>
<div class="Text_Normal">CaptureMock works "out of the box" only on Python code, but from version 0.2 it is possible with a reasonable effort to use its server from code written in any language. Unlike with Python code it is not intercepted automatically, instead, your "custom client" decides how and when to interact with the CaptureMock server for record and replay.
</div>
<div class="Text_Normal">
The basic plan is to start CaptureMock from the command line, or from TextTest, which will start a server process and then start your program. The environment variable "CAPTUREMOCK_SERVER" will be set to &lt;host:port&gt; and can be parsed accordingly, while the environment variable "CAPTUREMOCK_MODE" can be read to tell your program whether record or replay is happening (0 for replay, 1 for record, 2 for record everything not found in the replay file).
</div>
<div class="Text_Header">Communicating with the CaptureMock server</div>
<div class="Text_Normal">
This is done by communicating synchronously over a socket. When you wish to record some action in your code, you perform it for real, and decide how the request and its response should be serialised. You then do the following
<UL>
<LI>Open a socket and connect it to $CAPTUREMOCK_SERVER
<LI>Send the text "SUT_CUSTOM:&lt;request&gt;:SUT_SEP:&lt;response&gt;", where 'request' and 'response' can be anything at all
<LI>Close the socket. 
</UL>
If such communication is very frequent, it's also a good idea to wait for it to be received, one way is to read the (empty) response. Otherwise you end up sending too many small requests in a short time and may overload your network.</div>
<div class="Text_Normal">
For replay, you do as follows:
<UL>
<LI>Open a socket and connect it to $CAPTUREMOCK_SERVER
<LI>Send the text "SUT_CUSTOM:&lt;request&gt;".
<LI>Shutdown the socket for writing
<LI>Read from the socket until "end of file" - the result will be what was recorded originally as the response.
<LI>Close the socket. 
</UL>
Obviously the idea is to then try to reconstruct whatever objects are needed based on the information in the response.
</div>
<div class="Text_Header">Example</div>
<div class="Text_Normal">
This is written in Python, which you obviously wouldn't do for real, the idea is to demonstrate (and test) this mechanism. It is copied from the CaptureMock test suite.
<?php codeSampleBegin() ?>
import os, socket

def sendText(text, serverAddress):
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    sock.connect(serverAddress)
    sock.sendall(text)
    return sock

def sendRecord(code, *args):
    import moduletomock
    sendText("SUT_CUSTOM:" + code + ":SUT_SEP:" + eval(code), *args)

def printReplay(code, *args):
    sock = sendText("SUT_CUSTOM:" + code, *args)
    sock.shutdown(1)
    print sock.makefile().read()
    sock.close()

def getServerAddress():
    servAddr = os.getenv("CAPTUREMOCK_SERVER")
    host, port = servAddr.split(":")
    return host, int(port)

address = getServerAddress()
if os.getenv("CAPTUREMOCK_MODE") == "1":
    # record
    sendRecord("moduletomock.attribute", address)
    sendRecord("moduletomock.call_function('hello')", address)
else:
    # replay
    printReplay("moduletomock.attribute", address)
    printReplay("moduletomock.call_function('hello')", address)
<?php codeSampleEnd() ?>

</div>
<div class="Text_Header">Advantages over doing it all yourself</div>
<div class="Text_Normal">
At first glance it might seem that you might as well just write your own record-replay mechanism as do this, but CaptureMock offers you a few gains over that. For a start, it can synchronise actions from many threads. It also contains a "best-match" algorithm in case the new requests it gets do not exactly match the ones originally recorded. In each case it will try to apply this algorithm to find the most appropriate response, including handling repeated identical requests, rather than just blindly returning the next response in the list.
</div>
<div class="Text_Normal">
There are however probably circumstances where these gains are marginal.
</div>
