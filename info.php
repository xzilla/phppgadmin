<?php

	/**
	 * List extra information on a table
	 *
	 * $Id: info.php,v 1.11 2005/10/18 03:45:16 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * List all the information on the table
	 */
	function doDefault($msg = '') {
		global $data, $misc;
		global $lang;

		$misc->printTrail('table');
		$misc->printTabs('table','info');
		$misc->printMsg($msg);

		// common params for printVal
		$shownull = array('null' => true);

		// Fetch info
		$referrers = $data->getReferrers($_REQUEST['table']);
		$parents = $data->getTableParents($_REQUEST['table']);
		$children = $data->getTableChildren($_REQUEST['table']);
		if ($data->hasStatsCollector()) {
    		$tablestatstups = $data->getStatsTableTuples($_REQUEST['table']);
    		$tablestatsio = $data->getStatsTableIO($_REQUEST['table']);
    		$indexstatstups = $data->getStatsIndexTuples($_REQUEST['table']);
    		$indexstatsio = $data->getStatsIndexIO($_REQUEST['table']);
        }
        
		// Check that there is some info
		if (($referrers === -99 || ($referrers !== -99 && $referrers->recordCount() == 0)) 
				&& $parents->recordCount() == 0 && $children->recordCount() == 0
				&& (!$data->hasStatsCollector()	||
				($tablestatstups->recordCount() == 0 && $tablestatsio->recordCount() == 0
				&& $indexstatstups->recordCount() == 0 && $indexstatsio->recordCount() == 0))) {
			$misc->printMsg($lang['strnoinfo']);
		}
		else {
			// Referring foreign tables
			if ($referrers !== -99 && $referrers->recordCount() > 0) {
				echo "<h3>{$lang['strreferringtables']}</h3>\n";
				echo "<table>\n";
				echo "\t<tr>\n\t\t";
				if ($data->hasSchemas()) {
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
					if ($data->hasSchemas()) {
						echo "<td class=\"data{$id}\">", $misc->printVal($referrers->f['nspname']), "</td>";
					}
					echo "<td class=\"data{$id}\">", $misc->printVal($referrers->f['relname']), "</td>";
					echo "<td class=\"data{$id}\">", $misc->printVal($referrers->f['conname']), "</td>";
					echo "<td class=\"data{$id}\">", $misc->printVal($referrers->f['consrc']), "</td>";
					echo "<td class=\"opbutton{$id}\"><a href=\"constraints.php?{$misc->href}", 
						"&amp;schema=", urlencode($referrers->f['nspname']),
						"&amp;table=", urlencode($referrers->f['relname']), "\">{$lang['strproperties']}</a></td>\n";
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
				if ($data->hasSchemas()) {			
					echo "<th class=\"data\">{$lang['strschema']}</th>";
				}
				echo "\t\t<th class=\"data\">{$lang['strtable']}</th>";			
				echo "<th class=\"data\">{$lang['stractions']}</th>\n";
				echo "\t</tr>\n";
				$i = 0;
				
				while (!$parents->EOF) {
					$id = ( ($i % 2 ) == 0 ? '1' : '2' );
					echo "\t<tr>\n";
					if ($data->hasSchemas()) {
						echo "\t\t<td class=\"data{$id}\">", $misc->printVal($parents->f['schemaname']), "</td>";
					}
					echo "<td class=\"data{$id}\">", $misc->printVal($parents->f['relname']), "</td>";
					echo "<td class=\"opbutton{$id}\"><a href=\"tblproperties.php?{$misc->href}",
						"&amp;schema=", urlencode($parents->f['schemaname']),
						"&amp;table=", urlencode($parents->f['relname']), "\">{$lang['strproperties']}</a></td>\n";
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
				if ($data->hasSchemas()) {			
					echo "<th class=\"data\">{$lang['strschema']}</th>";
				}
				echo "\t\t<th class=\"data\">{$lang['strtable']}</th>";			
				echo "<th class=\"data\">{$lang['stractions']}</th>\n";
				echo "\t</tr>\n";
				$i = 0;
				
				while (!$children->EOF) {
					$id = ( ($i % 2 ) == 0 ? '1' : '2' );
					echo "\t<tr>\n";
					if ($data->hasSchemas()) {
						echo "\t\t<td class=\"data{$id}\">", $misc->printVal($children->f['schemaname']), "</td>";
					}
					echo "<td class=\"data{$id}\">", $misc->printVal($children->f['relname']), "</td>";
					echo "<td class=\"opbutton{$id}\"><a href=\"tblproperties.php?{$misc->href}",
						"&amp;schema=", urlencode($children->f['schemaname']),
						"&amp;table=", urlencode($children->f['relname']), "\">{$lang['strproperties']}</a></td>\n";
					echo "\t</tr>\n";
					$children->movenext();
					$i++;
				}
	
				echo "</table>\n";
			}

            if ($data->hasStatsCollector()) {
    			// Row performance
    			if ($tablestatstups->recordCount() > 0) {
    				echo "<h3>{$lang['strrowperf']}</h3>\n";
    
    				echo "<table>\n";
    				echo "\t<tr>\n";
    				echo "\t\t<th class=\"data\" colspan=\"2\">{$lang['strsequential']}</th>\n";
    				echo "\t\t<th class=\"data\" colspan=\"2\">{$lang['strindex']}</th>\n";
    				echo "\t\t<th class=\"data\" colspan=\"3\">{$lang['strrows2']}</th>\n";
    				echo "\t</tr>\n";
    				echo "\t<tr>\n";
    				echo "\t\t<th class=\"data\">{$lang['strscan']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strread']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strscan']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strfetch']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strinsert']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strupdate']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strdelete']}</th>\n";
    				echo "\t</tr>\n";
    				$i = 0;
    				
    				while (!$tablestatstups->EOF) {
    					$id = ( ($i % 2 ) == 0 ? '1' : '2' );
    					echo "\t<tr>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatstups->f['seq_scan'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatstups->f['seq_tup_read'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatstups->f['idx_scan'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatstups->f['idx_tup_fetch'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatstups->f['n_tup_ins'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatstups->f['n_tup_upd'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatstups->f['n_tup_del'], 'int4', $shownull), "</td>\n";
    					echo "\t</tr>\n";
    					$tablestatstups->movenext();
    					$i++;
    				}
    	
    				echo "</table>\n";
    			}
    
    			// I/O performance
    			if ($tablestatsio->recordCount() > 0) {
    				echo "<h3>{$lang['strioperf']}</h3>\n";
    
    				echo "<table>\n";
    				echo "\t<tr>\n";
    				echo "\t\t<th class=\"data\" colspan=\"3\">{$lang['strheap']}</th>\n";
    				echo "\t\t<th class=\"data\" colspan=\"3\">{$lang['strindex']}</th>\n";
    				echo "\t\t<th class=\"data\" colspan=\"3\">{$lang['strtoast']}</th>\n";
    				echo "\t\t<th class=\"data\" colspan=\"3\">{$lang['strtoastindex']}</th>\n";
    				echo "\t</tr>\n";
    				echo "\t<tr>\n";
    				echo "\t\t<th class=\"data\">{$lang['strdisk']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strcache']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strpercent']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strdisk']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strcache']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strpercent']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strdisk']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strcache']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strpercent']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strdisk']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strcache']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strpercent']}</th>\n";
    				echo "\t</tr>\n";
    				$i = 0;
    				
    				while (!$tablestatsio->EOF) {
    					$id = ( ($i % 2 ) == 0 ? '1' : '2' );
    					echo "\t<tr>\n";
    
    					$total = $tablestatsio->f['heap_blks_hit'] + $tablestatsio->f['heap_blks_read'];
    					if ($total > 0)	$percentage = round(($tablestatsio->f['heap_blks_hit'] / $total) * 100);
    					else $percentage = 0;
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatsio->f['heap_blks_read'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatsio->f['heap_blks_hit'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">({$percentage}{$lang['strpercent']})</td>\n";
    
    					$total = $tablestatsio->f['idx_blks_hit'] + $tablestatsio->f['idx_blks_read'];
    					if ($total > 0)	$percentage = round(($tablestatsio->f['idx_blks_hit'] / $total) * 100);
    					else $percentage = 0;
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatsio->f['idx_blks_read'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatsio->f['idx_blks_hit'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">({$percentage}{$lang['strpercent']})</td>\n";
    
    					$total = $tablestatsio->f['toast_blks_hit'] + $tablestatsio->f['toast_blks_read'];
    					if ($total > 0)	$percentage = round(($tablestatsio->f['toast_blks_hit'] / $total) * 100);
    					else $percentage = 0;
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatsio->f['toast_blks_read'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatsio->f['toast_blks_hit'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">({$percentage}{$lang['strpercent']})</td>\n";
    
    					$total = $tablestatsio->f['tidx_blks_hit'] + $tablestatsio->f['tidx_blks_read'];
    					if ($total > 0)	$percentage = round(($tablestatsio->f['tidx_blks_hit'] / $total) * 100);
    					else $percentage = 0;
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatsio->f['tidx_blks_read'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($tablestatsio->f['tidx_blks_hit'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">({$percentage}{$lang['strpercent']})</td>\n";
    					echo "\t</tr>\n";
    					$tablestatsio->movenext();
    					$i++;
    				}
    	
    				echo "</table>\n";
    			}
    
    			// Index row performance
    			if ($indexstatstups->recordCount() > 0) {
    				echo "<h3>{$lang['stridxrowperf']}</h3>\n";
    
    				echo "<table>\n";
    				echo "\t<tr>\n";
    				echo "\t\t<th class=\"data\">{$lang['strindex']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strscan']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strread']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strfetch']}</th>\n";
    				echo "\t</tr>\n";
    				$i = 0;
    				
    				while (!$indexstatstups->EOF) {
    					$id = ( ($i % 2 ) == 0 ? '1' : '2' );
    					echo "\t<tr>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($indexstatstups->f['indexrelname']), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($indexstatstups->f['idx_scan'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($indexstatstups->f['idx_tup_read'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($indexstatstups->f['idx_tup_fetch'], 'int4', $shownull), "</td>\n";
    					echo "\t</tr>\n";
    					$indexstatstups->movenext();
    					$i++;
    				}
    	
    				echo "</table>\n";
    			}
    
    			// Index I/0 performance
    			if ($indexstatsio->recordCount() > 0) {
    				echo "<h3>{$lang['stridxioperf']}</h3>\n";
    
    				echo "<table>\n";
    				echo "\t<tr>\n";
    				echo "\t\t<th class=\"data\">{$lang['strindex']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strdisk']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strcache']}</th>\n";
    				echo "\t\t<th class=\"data\">{$lang['strpercent']}</th>\n";
    				echo "\t</tr>\n";
    				$i = 0;
    				
    				while (!$indexstatsio->EOF) {
    					$id = ( ($i % 2 ) == 0 ? '1' : '2' );
    					echo "\t<tr>\n";
    					$total = $indexstatsio->f['idx_blks_hit'] + $indexstatsio->f['idx_blks_read'];
    					if ($total > 0)	$percentage = round(($indexstatsio->f['idx_blks_hit'] / $total) * 100);
    					else $percentage = 0;
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($indexstatsio->f['indexrelname']), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($indexstatsio->f['idx_blks_read'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">", $misc->printVal($indexstatsio->f['idx_blks_hit'], 'int4', $shownull), "</td>\n";
    					echo "\t\t<td class=\"data{$id}\">({$percentage}{$lang['strpercent']})</td>\n";
    					echo "\t</tr>\n";
    					$indexstatsio->movenext();
    					$i++;
    				}
    	
    				echo "</table>\n";
    			}
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
