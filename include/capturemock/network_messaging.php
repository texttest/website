<div class="Text_Main_Header">Intercepting plain-text network messages</div>
<div class="Text_Normal">CaptureMock can also be used for this purpose. 
It does however currently rely on messages being plain-text and synchronous: the client
opening a socket, sending a message, reading a reply and then closing the socket. This
functionality has not been used in many contexts yet and should be regarded as more experimental
than the rest of CaptureMock.
</div>
<div class="Text_Normal">
Recording and replaying works in a similar way to the Python
or system command variants, see there for more details. 
Run CaptureMock as for command-line interceptions: it will start its server and set 
the environment variable CAPTUREMOCK_SERVER to &lt;host:port&gt; for this place.
</div>
<div class="Text_Header">An example: The String-Length Server</div>
<div class="Text_Normal">
Suppose we have a Python server which listens for input and says how long 
the strings it receives were.
<?php codeSampleBegin() ?>
## server.py
from SocketServer import TCPServer, StreamRequestHandler
import socket

class MyRequestHandler(StreamRequestHandler):
    def handle(self):
        clientData = self.rfile.read()
        self.wfile.write("Length was " + str(len(clientData)))

server = TCPServer((socket.gethostname(), 0), MyRequestHandler)
host, port = server.socket.getsockname()
address = host + ":" + str(port)
message = "Started string-length server at " + address
print message

server.serve_forever()
<?php codeSampleEnd() ?>

Then naturally, we have a client that we can use to send stuff to it, that takes 
the server address as an argument:

<?php codeSampleBegin() ?>
## client.py
import sys, socket

def runQuery(serverAddress, toSend):
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    sock.connect(serverAddress)
    sock.sendall(toSend)
    sock.shutdown(1)
    response = sock.makefile().read()
    print "Sent to server:", toSend
    print "Got reply:", response
    sock.close()

servAddr = sys.argv[1]
host, port = servAddr.split(":")
serverAddress = (host, int(port))
runQuery(serverAddress, "Here is a string")
runQuery(serverAddress, "Here is a longer string")
<?php codeSampleEnd() ?>

We can then run them like this:

<?php codeSampleBegin() ?>
$ ./server.py &
Started string-length server at 10.67.20.109:41541
$ ./client.py 10.67.20.109:41541
Sent to server: Here is a string
Got reply: Length was 16
Sent to server: Here is a longer string
Got reply: Length was 23
<?php codeSampleEnd() ?>

To test them automatically, we would of course write a wrapper script to do something like
this:

<?php codeSampleBegin() ?>
## runsystem.py
import subprocess

serverProc = subprocess.Popen("server.py", stdout=subprocess.PIPE)
addressLine = serverProc.stdout.readline()
serverAddress = addressLine.strip().split()[-1]
subprocess.call([ "client.py", serverAddress ])
serverProc.kill()
<?php codeSampleEnd() ?>

With all that in place, we can now use CaptureMock to intercept and record the traffic,
allowing us to in future test either the server or the client alone.
</div>
<div class="Text_Normal">
We need to modify our wrapper script (note: not the client or the server) such
that the client will connect to the host and port given
by the environment variable 'CAPTUREMOCK_SERVER', instead of connecting directly
to its own server.</div>
<div class="Text_Normal">
It is currently assumed that the location of the real server is
determined dynamically and hence cannot be provided to CaptureMock
on startup. The wrapper script should therefore send the location of the
real server to the CaptureMock server, when it knows what it is. So here is our
modified wrapper script:
<?php codeSampleBegin() ?>
## runsystem.py, modified to work with CaptureMock
import subprocess, socket, os

def sendAddress(cpMockAddress, serverAddress):
    host, port = cpMockAddress.split(":")
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    sock.connect((host, int(port)))
    sock.sendall("SUT_SERVER:Real server started on " + serverAddress + "\n")
    sock.close()

serverProc = subprocess.Popen("server.py", stdout=subprocess.PIPE)
addressLine = serverProc.stdout.readline()
serverAddress = addressLine.strip().split()[-1]
cpMockAddress = os.getenv("CAPTUREMOCK_SERVER")
if cpMockAddress:
    sendAddress(cpMockAddress, serverAddress)
    subprocess.call([ "client.py", cpMockAddress ])
else:
    subprocess.call([ "client.py", serverAddress ])
serverProc.kill()
<?php codeSampleEnd() ?>
This information should be in the format SUT_SERVER:&lt;some_message&gt;
&lt;host:port&gt;. CaptureMock will then parse this and know where
the "real" server is.</div>
<div class="Text_Normal">
We can now record the traffic using CaptureMock, using the command
<?php codeSampleBegin() ?>
$ capturemock --record clientserver.mock runsystem.py
<?php codeSampleEnd() ?>
which will produce the following in clientserver.mock:
<?php codeSampleBegin() ?>
<-SRV:Real server started on 10.67.20.109:35620
->CLI:Here is a string
<-SRV:Length was 16
->CLI:Here is a longer string
<-SRV:Length was 23
<?php codeSampleEnd() ?>
</div>

<div class="Text_Normal">
When the client sends a request it will now go to CaptureMock
instead. CaptureMock will record it as a client request in the
mock file, and forward it to the server. The server will then
reply, which will be recorded as a server reply, and forwarded
back to the client. In this way a complete log of the
communication can be built up. 
</div>
<div class="Text_Normal">
The format is similar to that used for command-line and python interception, with "CLI" referring 
to client requests and "SRV" to server responses.
</div>
<div class="Text_Header">Replay: testing the client or server in isolation</div>
<div class="Text_Normal">You can then use this recorded file to test either the client 
or the server in isolation. The initial server notification is still crucial when testing 
the server, of course, so in that case the "runsystem.py" program can just be modified to
not start the client. The initial notification will cause the first "client" message 
("Here is a string"), to be sent to the real server, and its response will trigger the next
message and so on.</div>
<div class="Text_Normal">
To test the client, we need to change the recorded mock file around a bit currently.
The main things are that the directions need to change, so that CaptureMock knows which things to
expect from outside and which it should produce.
<?php codeSampleBegin() ?>
<-CLI:Here is a string
->SRV:Length was 16
<-CLI:Here is a longer string
->SRV:Length was 23
<?php codeSampleEnd() ?>
We can then run with
<?php codeSampleBegin() ?>
$ capturemock --replay clientserver.mock sh -c 'client.py $CAPTUREMOCK_SERVER'
<?php codeSampleEnd() ?>
In future it will hopefully be possible to replay either server or client from the same
recorded mock file.
</div>
