<?php

	/**
	 * List extra information on a table
	 *
	 * $Id: info.php,v 1.2 2003/10/13 01:42:04 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * List all the information on the table
	 */
	function doDefault($msg = '') {
		global $localData, $misc;
		global $lang;

		$misc->printTableNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": ", $misc->printVal($_REQUEST['table']), ": {$lang['strinfo']}</h2>\n";
		$misc->printMsg($msg);

		// Fetch info
		$referrers = &$localData->getReferrers($_REQUEST['table']);
		$parents = &$localData->getTableParents($_REQUEST['table']);
		$children = &$localData->getTableChildren($_REQUEST['table']);

		// Check that there is some info
		if (($referrers === -99 || ($referrers !== -99 && $referrers->recordCount() == 0)) 
				&& $parents->recordCount() == 0 && $children->recordCount() == 0) {
			$misc->printMsg($lang['strnoinfo']);
		}
		else {
			// Referring foreign tables
			if ($referrers !== -99 && $referrers->recordCount() > 0) {
				echo "<h3>{$lang['strreferringtables']}</h3>\n";
				echo "<table>\n";
				echo "\t<tr>\n\t\t";
				if ($localData->hasSchemas()) {
					echo "<th class=\"data\">{$lang['strschema']}</th>";
				}
				echo "<th class=\"data\">{$lang['strtable']}</th>";
				echo "<th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strdefinition']}</th>";
				echo "<th class=\"data\">{$lang['stractions']}</th>\n";
				echo "\t</tr>\n";
				$i = 0;
				
				while (!$referrers->EOF) {
					$id = ( ($i % 2 ) == 0 ? '1' : '2' );
					echo "\t<tr>\n\t\t";
					if ($localData->hasSchemas()) {
						echo "<td class=\"data{$id}\">", $misc->printVal($referrers->f['nspname']), "</td>";
					}
					echo "<td class=\"data{$id}\">", $misc->printVal($referrers->f['relname']), "</td>";
					echo "<td class=\"data{$id}\">", $misc->printVal($referrers->f['conname']), "</td>";
					echo "<td class=\"data{$id}\">", $misc->printVal($referrers->f['consrc']), "</td>";
					echo "<td class=\"opbutton{$id}\"><a href=\"constraints.php?database=", urlencode($_REQUEST['database']), 
						"&amp;schema=", urlencode($referrers->f['nspname']),
						"&table=", urlencode($referrers->f['relname']), "\">{$lang['strproperties']}</a></td>\n";
					echo "\t</tr>\n";
					$referrers->movenext();
					$i++;
				}
	
				echo "</table>\n";
			}
			
			// Parent tables
			if ($parents->recordCount() > 0) {
				echo "<h3>{$lang['strparenttables']}</h3>\n";
				echo "<table>\n";
				echo "\t<tr>\n\t\t";
				if ($localData->hasSchemas()) {			
					echo "<th class=\"data\">{$lang['strschema']}</th>";
				}
				echo "\t\t<th class=\"data\">{$lang['strtable']}</th>";			
				echo "<th class=\"data\">{$lang['stractions']}</th>\n";
				echo "\t</tr>\n";
				$i = 0;
				
				while (!$parents->EOF) {
					$id = ( ($i % 2 ) == 0 ? '1' : '2' );
					echo "\t<tr>\n";
					if ($localData->hasSchemas()) {
						echo "\t\t<td class=\"data{$id}\">", $misc->printVal($parents->f['schemaname']), "</td>";
					}
					echo "<td class=\"data{$id}\">", $misc->printVal($parents->f['relname']), "</td>";
					echo "<td class=\"opbutton{$id}\"><a href=\"tblproperties.php?database=", urlencode($_REQUEST['database']), 
						"&amp;schema=", urlencode($parents->f['schemaname']),
						"&table=", urlencode($parents->f['relname']), "\">{$lang['strproperties']}</a></td>\n";
					echo "\t</tr>\n";
					$parents->movenext();
					$i++;
				}
	
				echo "</table>\n";
			}
	
			// Child tables
			if ($children->recordCount() > 0) {
				echo "<h3>{$lang['strchildtables']}</h3>\n";
				echo "<table>\n";
				echo "\t<tr>\n";
				if ($localData->hasSchemas()) {			
					echo "<th class=\"data\">{$lang['strschema']}</th>";
				}
				echo "\t\t<th class=\"data\">{$lang['strtable']}</th>";			
				echo "<th class=\"data\">{$lang['stractions']}</th>\n";
				echo "\t</tr>\n";
				$i = 0;
				
				while (!$children->EOF) {
					$id = ( ($i % 2 ) == 0 ? '1' : '2' );
					echo "\t<tr>\n";
					if ($localData->hasSchemas()) {
						echo "\t\t<td class=\"data{$id}\">", $misc->printVal($children->f['schemaname']), "</td>";
					}
					echo "<td class=\"data{$id}\">", $misc->printVal($children->f['relname']), "</td>";
					echo "<td class=\"opbutton{$id}\"><a href=\"tblproperties.php?database=", urlencode($_REQUEST['database']), 
						"&amp;schema=", urlencode($children->f['schemaname']),
						"&table=", urlencode($children->f['relname']), "\">{$lang['strproperties']}</a></td>\n";
					echo "\t</tr>\n";
					$children->movenext();
					$i++;
				}
	
				echo "</table>\n";
			}
		}
	}

	$misc->printHeader($lang['strtables'] . ' - ' . $_REQUEST['table'] . ' - ' . $lang['strinfo']);
	$misc->printBody();
	
	switch ($action) {
		default:
			doDefault();
			break;
	}
	
	$misc->printFooter();

?>
