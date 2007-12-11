<div class="Text_Header">Driving a web application with WebUseCase</div>
		
<div class="Text_Normal">WebUseCase is not itself a use-case recorder library in the
way that <a class="Text_Link" href="index.php?page=concepts&n=pyusecase">PyUseCase</A> and <a class="Text_Link" href="http://jusecase.sourceforge.net">JUseCase</A>

are. Both of those are designed as libraries for custom GUIs
using their respective GUI libraries. WebUseCase is a simulation
tool in its own right, built on top of <a class="Text_Link" href="http://jusecase.sourceforge.net">JUseCase</A>
and <a class="Text_Link" href="http://htmlunit.sf.net/">HtmlUnit</A>. (To use it,
you will need to install both of these products from their
respective pages as well as WebUseCase from here. Note that
HtmlUnit depends on a lot of external stuff also, which will
need to be installed. See their page for details.)</div>
<div class="Text_Normal">It is in some sense a simple browser designed only for test
simulation. The aim is to provide a use-case recorder which can
provide a tester experience similar to the experience for
testing custom GUIs with PyUseCase or JUseCase. It is really
more of a prototype than a product, but is provided here in case
anyone is inspired to try it and extend it.</div>
<div class="Text_Header">Interaction summary</div>
<div class="Text_Normal">To obtain scripts at the use case level, we need to approach
the application via the browser. As we already had a use-case
recorder for Java Swing (<a class="Text_Link" href="http://jusecase.sourceforge.net">JUseCase</A>),
we decided to take a Java unit-test framework for web
applications and build a simple web browser on top of it,
plugging it into JUseCase at the same time. It would then be
possible to record and replay use cases for the web application
within this &ldquo;browser&rdquo;.</div>

<div class="Text_Normal">Of the available options, <a class="Text_Link" href="http://htmlunit.sf.net/">HtmlUnit</A>
seemed to be the most browser-like framework that was also open
source, so we decided to build on that and created 'WebUseCase'.
So that, when recording a use case, the interaction looks like
this:</div>
<div class="Text_Normal"><img src="include/concepts/images/webusecaserec.JPG" NAME="Graphic1" ALIGN=LEFT WIDTH=500 HEIGHT=142 BORDER=0><BR CLEAR=LEFT><BR><BR>
</div>
<div class="Text_Normal">and replaying works
like this:</div>
<div class="Text_Normal"><img src="include/concepts/images/webusecaserep.jpg" NAME="Graphic3" ALIGN=LEFT WIDTH=497 HEIGHT=49 BORDER=0><BR CLEAR=LEFT><BR><BR>
</div>

<div class="Text_Normal">(Note that the Java
Swing GUI browser in this case is WebUseCase, while the Java
Swing record/replay framework is JUseCase)</div>
<div class="Text_Header">Getting use case-level command names</div>
<div class="Text_Normal">We cannot really
hard-code intention-revealing names for component events at the
browser level in WebUseCase itself. Since the only connection
between the browser and the web application is a number of HTML
pages, that's where the use case command names have to come
from. 
</div>
<div class="Text_Normal">Fortunately, most HTML tags support the `title' attribute
which can be used to define use case command names. This
attribute is optional and '<I>offers advisory information about
the element for which it is set</I>', according to the <a class="Text_Link" href="http://www.w3.org/TR/html4/">HTML
specification</A>. Using it to set use case command names thus
doesn't conflict with its intended use. 
</div>

<div class="Text_Normal">The title attribute
gives the application developer full control over which use case
command names to use at which places, and since the attribute is
available for both links and form controls, it provides a
consistent mechanism for defining use case command names. 
</div>
<div class="Text_Normal">In regular browsers
the title attribute is often used in tooltips for the
corresponding elements, but this does not conflict with how they
are to be used in conjunction with WebUseCase - in fact, use
case commands often work very well as tooltips. So in order to
test your web application with WebUseCase, you simply provide
intention-revealing names in the title attribute of all
controls. 
</div>
<div class="Text_Normal">In terms of what web application functionality is supported,
this depends entirely on <a class="Text_Link" href="http://htmlunit.sf.net/">HtmlUnit</A>'s
features, as that is essentially what interprets the use of the
WebUseCase GUI. HtmlUnit does however provide support for
javascript, and has the ability to pretend to be particular real
browsers. 
</div>
<div class="Text_Normal">Each link or form
component in the HTML will be then be represented in WebUseCase
by an equivalent Swing component.</div>

				
			