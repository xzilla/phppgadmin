<?php

GLOBAL $HTTP_SESSION_VARS;
	include('adodb.inc.php');
	include('adodb-session.php');
	session_start();
	session_register('AVAR');
	$HTTP_SESSION_VARS['AVAR'] += 1;
	$AVAR += 1;
	print "<p>\$HTTP_SESSION_VARS['AVAR']={$HTTP_SESSION_VARS['AVAR']}</p>";
	
?>