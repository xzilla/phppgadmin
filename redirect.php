<?php
	include_once('./libraries/lib.inc.php');
	
	$url = $misc->getLastTabURL($_REQUEST['section']);
	
	if (is_string($url)) {
		header("Location: http://{$_SERVER['HTTP_HOST']}/{$url}");
		exit;
	}
	
	$misc->printHeader('ERROR');
	$misc->printBody();
	$misc->printFooter();
?>
