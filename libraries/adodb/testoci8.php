<html>
<body>
<?php
error_reporting(63);
include("adodb.inc.php");
include("tohtml.inc.php");

if (1) {
	$db = ADONewConnection('oci8');
	$db->PConnect('','scott','tiger');
	$db->debug = true;
	$rs = &$db->Execute(
		'select * from adoxyz where firstname=:first and trim(lastname)=:last',
		array('first'=>'Caroline','last'=>'Miranda'));
	if (!$rs) die("Empty RS");
	if ($rs->EOF) die("EOF RS");
	rs2html($rs);
}
if (1) {
	$db = ADONewConnection('oci8');
	$db->PConnect('','scott','tiger');
	$db->debug = true;
	$db->Execute("delete from emp where ename='John'");
	print $db->Affected_Rows().'<BR>';
	$stmt = &$db->Prepare('insert into emp (empno, ename) values (:empno, :ename)');
	$rs = $db->Execute($stmt,array('empno'=>4321,'ename'=>'John'));
	// prepare not quite ready for prime time
	//$rs = $db->Execute($stmt,array('empno'=>3775,'ename'=>'John'));
	if (!$rs) die("Empty RS");
}

if (0) {
	$db = ADONewConnection('odbc_oracle');
	if (!$db->PConnect('local_oracle','scott','tiger')) die('fail connect');
	$db->debug = true;
	$rs = &$db->Execute(
		'select * from adoxyz where firstname=? and trim(lastname)=?',
		array('first'=>'Caroline','last'=>'Miranda'));
	if (!$rs) die("Empty RS");
	if ($rs->EOF) die("EOF RS");
	rs2html($rs);
}
?>