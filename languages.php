<?php

	/**
	 * Manage languages in a database
	 *
	 * $Id: languages.php,v 1.2 2003/12/10 16:03:29 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show default list of languages in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc, $database;
		global $PHP_SELF, $lang;

		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strlanguages']}</h2>\n";
		$misc->printMsg($msg);
		
		$languages = &$data->getlanguages();

		if ($languages->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strtrusted']}</th>";
			echo "<th class=\"data\">{$lang['strfunction']}</th>";
			echo "</tr>\n";
			$i = 0;
			while (!$languages->EOF) {
				$languages->f['lanpltrusted'] = $data->phpBool($languages->f['lanpltrusted']);
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($languages->f['lanname']), "</td>\n";
				echo "<td class=\"data{$id}\">", ($languages->f['lanpltrusted']) ? $lang['stryes'] : $lang['strno'], "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($languages->f['lanplcallf']), "</td>\n";
				echo "</tr>\n";
				$languages->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnolanguages']}</p>\n";
		}
	}

	$misc->printHeader($lang['strlanguages']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
