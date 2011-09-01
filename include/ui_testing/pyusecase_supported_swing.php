<div class="Text_Header">Swing Widgets and event types supported for record/replay</div>
<div class="Text_Normal">The following lists the Swing widget types and the associated event types on them which 
PyUseCase trunk is currently capable of recording and replaying. Any type derived from the listed
types is also supported.
</div>
<div class="Text_Normal"><table border=1 cellpadding=1 cellspacing=1>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JButton.html>javax.swing.JButton</a></td><td><div class="Table_Text_Normal">Click</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JCheckBox.html>javax.swing.JCheckBox</a></td><td><div class="Table_Text_Normal">Click</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JComponent.html>javax.swing.JComponent</a></td><td><div class="Table_Text_Normal">PopupActivate</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JDialog.html>javax.swing.JDialog</a></td><td><div class="Table_Text_Normal">Close</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JFrame.html>javax.swing.JFrame</a></td><td><div class="Table_Text_Normal">Close , KeyPress</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JList.html>javax.swing.JList</a></td><td><div class="Table_Text_Normal">Select</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JMenuItem.html>javax.swing.JMenuItem</a></td><td><div class="Table_Text_Normal">Click</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JRadioButton.html>javax.swing.JRadioButton</a></td><td><div class="Table_Text_Normal">Click</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JSpinner.html>javax.swing.JSpinner</a></td><td><div class="Table_Text_Normal">Edited</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JTabbedPane.html>javax.swing.JTabbedPane</a></td><td><div class="Table_Text_Normal">Click , PopupActivate</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JTable.html>javax.swing.JTable</a></td><td><div class="Table_Text_Normal">ClickHeader , DoubleClick , Edited , PopupActivate , Select</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JTextField.html>javax.swing.JTextField</a></td><td><div class="Table_Text_Normal">Activate , Modify , PopupActivate</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/plaf/basic/BasicInternalFrameTitlePane.html>javax.swing.plaf.basic.BasicInternalFrameTitlePane</a></td><td><div class="Table_Text_Normal">DoubleClick</div></td></tr>
<tr><td><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/text/JTextComponent.html>javax.swing.text.JTextComponent</a></td><td><div class="Table_Text_Normal">Modify</div></td></tr>
</table></div>
<div class="Text_Header">Swing Widgets supported for automatic logging</div>
<div class="Text_Normal">
The following lists the Swing widget types whose status and changes PyUseCase trunk is 
currently capable of monitoring and logging. Any type derived from the listed types 
is also supported but will only have features of the listed type described.
</div>
<div class="Text_Normal">
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JButton.html>javax.swing.JButton</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JCheckBox.html>javax.swing.JCheckBox</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JComboBox.html>javax.swing.JComboBox</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JDialog.html>javax.swing.JDialog</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JFrame.html>javax.swing.JFrame</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JInternalFrame.html>javax.swing.JInternalFrame</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JLabel.html>javax.swing.JLabel</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JList.html>javax.swing.JList</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JMenu.html>javax.swing.JMenu</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JMenuBar.html>javax.swing.JMenuBar</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JMenuItem.html>javax.swing.JMenuItem</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JPopupMenu.html>javax.swing.JPopupMenu</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JProgressBar.html>javax.swing.JProgressBar</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JRadioButton.html>javax.swing.JRadioButton</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JSeparator.html>javax.swing.JSeparator</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JSpinner.html>javax.swing.JSpinner</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JTabbedPane.html>javax.swing.JTabbedPane</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JTable.html>javax.swing.JTable</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JToolBar.html>javax.swing.JToolBar</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/JTree.html>javax.swing.JTree</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/plaf/basic/BasicSplitPaneDivider.html>javax.swing.plaf.basic.BasicSplitPaneDivider</a>
<li><a class="Text_Link" href=http://download.oracle.com/javase/6/docs/api/javax/swing/text/JTextComponent.html>javax.swing.text.JTextComponent</a>
</div><div class="Text_Normal"><i>(Note that a textual version of this page can be auto-generated by running "pyusecase -s -i javaswing")</i></div>
