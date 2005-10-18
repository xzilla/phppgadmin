<?php

	/**
	 * Help page redirection/browsing.
	 *
	 * $Id: help.php,v 1.2 2005/10/18 03:45:16 chriskl Exp $
	 */

	# TODO: Localize messages, improve (or remove) help browser
	 
	 
	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';

	function doDefault() {
		global $data;
		
		if (isset($_REQUEST['help'])) {
			$url = $data->getHelp($_REQUEST['help']);
			
			if (is_array($url)) {
				doChoosePage($url);
				return;
			}
			
			if ($url) {
				header("Location: $url");
				exit;
			}
		}
		
		doBrowse('Invalid help page');
	}
	
	function doBrowse($msg = '') {
		global $misc, $data;
		
		$misc->printHeader('Help page browser');
		$misc->printBody();
		
		$misc->printTitle('PostgreSQL and phpPgAdmin Help');
		
		echo $misc->printVal($msg);
		
		echo "<dl>\n";
		
		$pages = $data->getHelpPages();
		foreach ($pages as $page => $dummy) {
			echo "<dt>{$page}</dt>\n";
			
			$urls = $data->getHelp($page);
			if (!is_array($urls)) $urls = array($urls);
			foreach ($urls as $url) {
				echo "<dd><a href=\"{$url}\">{$url}</a></dd>\n";
			}
		}
		
		echo "</dl>\n";
		
		$misc->printFooter();
	}
	
	function doChoosePage($urls) {
		global $misc;
		
		$misc->printHeader('Help page browser');
		$misc->printBody();
		
		$misc->printTitle('Please select a help page');
		
		echo "<ul>\n";
		foreach($urls as $url) {
			echo "<li><a href=\"{$url}\">{$url}</a></li>\n";
		}
		echo "</ul>\n";

		$misc->printFooter();
	}
	
	switch ($action) {
		case 'browse':
			doBrowse();
			break;
		default:
			doDefault();
			break;
	}
?>
