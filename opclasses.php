<?php

	/**
	 * Manage opclasss in a database
	 *
	 * $Id: opclasses.php,v 1.2 2004/05/08 15:21:42 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';

	/**
	 * Show default list of opclasss in the database
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc;
		global $lang;

		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['stropclasses']}</h2>\n";
		$misc->printMsg($msg);
		
		$opclasses = &$data->getOpClasses();

		if ($opclasses->recordCount() > 0) {
			echo "<table><tr>\n";
			echo "<th class=\"data\">{$lang['straccessmethod']}</th>";
			echo "<th class=\"data\">{$lang['strname']}</th>";
			echo "<th class=\"data\">{$lang['strtype']}</th>";
			echo "<th class=\"data\">{$lang['strdefault']}</th>";
			if ($conf['show_comments']) echo "<th class=\"data\">{$lang['strcomment']}</th>\n";
			echo "</tr>\n";
			$i = 0;
			while (!$opclasses->EOF) {
				$opclasses->f['opcdefault'] = $data->phpBool($opclasses->f['opcdefault']);
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($opclasses->f['amname']), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($opclasses->f['opcname']), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($opclasses->f['opcintype']), "</td>\n";
				echo "<td class=\"data{$id}\">", (($opclasses->f['opcdefault']) ? $lang['stryes'] : $lang['strno']), "</td>\n";
				if ($conf['show_comments']) echo "<td class=\"data{$id}\">", $misc->printVal($opclasses->f['opccomment']), "</td>\n";				
				echo "</tr>\n";
				$opclasses->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnoopclasses']}</p>\n";
		}
	}

	$misc->printHeader($lang['stropclasses']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
