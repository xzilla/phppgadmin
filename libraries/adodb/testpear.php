<?php
include('adodb.inc.php');
include('tohtml.inc.php');

$db = NewADOConnection('pear');
$db->databaseDriver = 'mysql';
$db->debug = true;
$db->Connect('localhost','root','','xphplens');
$rs = $db->Execute('select * from products');
rs2html($rs);

print "<h3>Test Errors</h3>";
$rs = $db->Execute('select * from productz');
if ($rs) print "Recordset returned - wrong!<br>";

$db->Connect('localhost','root','','nodb_xphplens');
?>