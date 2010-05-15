<?php
	$subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : 'root'; 
	
	if ($subject == 'root')
		$_no_db_connection = true;
	
	include_once('./libraries/lib.inc.php');
	
	$url = $misc->getLastTabURL($subject);
	
	// Load query vars into superglobal arrays
	if (isset($url['urlvars'])) {
		$vars = array();
		parse_str(value(url($url['url'], $url['urlvars']), $_REQUEST), $vars);
		array_shift($vars);

		/* parse_str function is affected by magic_quotes_gpc */
		if (ini_get('magic_quotes_gpc')) {
			$misc->stripVar($vars);
		}

		$_REQUEST = array_merge($_REQUEST, $vars);
		$_GET = array_merge($_GET, $vars);
	}
	
	require $url['url'];
?>
