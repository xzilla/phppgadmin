<?php
	include_once('./libraries/lib.inc.php');
	
	$url = parse_url($misc->getLastTabURL($_REQUEST['section']));
	
	$_SERVER['PHP_SELF'] = $url['path'];
	
	// Load query vars into superglobal arrays
	if (isset($url['query'])) {
		$vars = array();
		parse_str($url['query'], $vars);
	
		$_REQUEST = array_merge($_REQUEST, $vars);
		$_GET = array_merge($_GET, $vars);
	}
	
	require $url['path'];
?>
