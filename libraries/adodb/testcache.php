<html>
<body>
<?php

$ADODB_CACHE_DIR = dirname(tempnam('/tmp',''));
include("adodb.inc.php");

if (isset($access)) {
	$db=ADONewConnection('access');
	$db->PConnect('nwind');
} else {
	$db = ADONewConnection('mysql');
	$db->PConnect('mangrove','root','','xphplens');
}
if (isset($cache)) $rs = $db->CacheExecute(120,'select * from products');
else $rs = $db->Execute('select * from products');

$arr = $rs->GetArray();
print sizeof($arr);
?>