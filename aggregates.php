<?php

	/**
	 * Manage aggregates in a database
	 *
	 * $Id: aggregates.php,v 1.4 2004/06/27 06:26:22 xzilla Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';

	/**
	 * Show default list of aggregates in the database
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc;
		global $lang;

		$misc->printTitle(array($misc->printVal($_REQUEST['database']), $lang['straggregates']), 'aggregates');
		$misc->printMsg($msg);
		
		$aggregates = &$data->getAggregates();

		if ($aggregates->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strtype']}</th>";
			if ($conf['show_comments']) echo "<th class=\"data\">{$lang['strcomment']}</th>";
			echo "</tr>\n";
			$i = 0;
			while (!$aggregates->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($aggregates->f['proname']), "</td>\n";
				echo "<td class=\"data{$id}\">";
				// If arg type is NULL, then we need to output "all types"
				if ($aggregates->f['proargtypes'] === null)
					echo $lang['stralltypes'];
				else
					echo $misc->printVal($aggregates->f['proargtypes']);
				echo "</td>\n";
				if ($conf['show_comments']) echo "<td class=\"data{$id}\">", $misc->printVal($aggregates->f['aggcomment']), "</td>\n";
				echo "</tr>\n";
				$aggregates->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnoaggregates']}</p>\n";
		}
	}

	$misc->printHeader($lang['straggregates']);
	$misc->printBody();

	switch ($action) {
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();

?>
