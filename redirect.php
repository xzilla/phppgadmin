<?php
	include_once('./libraries/lib.inc.php');
	
	$url = $misc->getLastTabURL($_REQUEST['section']);
	
	if (is_string($url)) {
		$dir = substr($_SERVER['REQUEST_URI'], 0, strrpos ($_SERVER['REQUEST_URI'],'/'));
		header("Location: http://{$_SERVER['HTTP_HOST']}{$dir}/{$url}");
		exit;
	}
	
	$misc->printHeader('ERROR');
	$misc->printBody();
	$misc->printFooter();
?>
