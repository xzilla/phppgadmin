<?php

	/**
	 * Manage casts in a database
	 *
	 * $Id: casts.php,v 1.4 2003/12/10 16:03:29 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show default list of casts in the database
	 */
	function doDefault($msg = '') {
		global $data, $misc, $database;
		global $PHP_SELF, $lang;

		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strcasts']}</h2>\n";
		$misc->printMsg($msg);
		
		$casts = &$data->getcasts();

		if ($casts->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strsourcetype']}</th><th class=\"data\">{$lang['strtargettype']}</th>";
			echo "<th class=\"data\">{$lang['strfunction']}</th><th class=\"data\">{$lang['strimplicit']}</th>";
			echo "</tr>\n";
			$i = 0;
			while (!$casts->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($casts->f['castsource']), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($casts->f['casttarget']), "</td>\n";
				echo "<td class=\"data{$id}\">", ($casts->f['castfunc'] === null) ? $lang['strbinarycompat'] : $misc->printVal($casts->f['castfunc']), "</td>\n";
				echo "<td class=\"data{$id}\">";
				switch ($casts->f['castcontext']) {
					case 'e':
						echo $lang['strno'];
						break;
					case 'a':
						echo $lang['strinassignment'];
						break;
					default:
						echo $lang['stryes'];							
				}
				echo "</td>\n";
				echo "</tr>\n";
				$casts->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnocasts']}</p>\n";
		}
	}

	$misc->printHeader($lang['strcasts']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
