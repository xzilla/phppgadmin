<?php

	/**
	 * Process an arbitrary SQL query - tricky!  The main problem is that
	 * unless we implement a full SQL parser, there's no way of knowing
	 * how many SQL statements have been strung together with semi-colons
	 * @param $query The SQL query string to execute
	 *
	 * $Id: sql.php,v 1.12 2003/11/15 11:09:32 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$PHP_SELF = $_SERVER['PHP_SELF'];

	$misc->printHeader($lang['strqueryresults']);
	$misc->printBody();
	$misc->printDatabaseNav();
	echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strsql']}: {$lang['strqueryresults']}</h2>\n";

	// NOTE: This is a quick hack!
	if (isset($_POST['explain']) && isset($_POST['query'])) {
		// TODO: Is there a generic (non PostgreSQL specific) way to do this
		$_POST['query'] = 'EXPLAIN ' . $_POST['query'];
	}
	
	// Set fetch mode to NUM so that duplicate field names are properly returned
	$localData->conn->setFetchMode(ADODB_FETCH_NUM);
	// Execute the query
	$rs = $localData->conn->Execute($_POST['query']);

	// $rs will only be an object if there is no error
	if (is_object($rs)) {
		// Now, depending on what happened do various things

		// First, if rows returned, then display the results
		if ($rs->recordCount() > 0) {
			echo "<table>\n<tr>";
			foreach ($rs->f as $k => $v) {
				$finfo = $rs->fetchField($k);
				echo "<th class=\"data\">", $misc->printVal($finfo->name), "</th>";
			}

			$i = 0;		
			while (!$rs->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>\n";
				foreach ($rs->f as $k => $v) {
					$finfo = $rs->fetchField($k);
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($v, true, $finfo->type), "</td>";
				}							
				echo "</tr>\n";
				$rs->moveNext();
				$i++;
			}
			echo "</table>\n";
			echo "<p>", $rs->recordCount(), " {$lang['strrows']}</p>\n";
		}
		// Otherwise if any rows have been affected
		elseif ($localData->conn->Affected_Rows() > 0) {
			echo "<p>", $localData->conn->Affected_Rows(), " {$lang['strrowsaff']}</p>\n";
		}
		// Else say success
		else echo "<p>{$lang['strsqlexecuted']}</p>\n";
	}

	echo "<p><a class=\"navlink\" href=\"database.php?database=", urlencode($_REQUEST['database']),
		"&amp;action=sql&amp;query=", urlencode($_POST['query']), "\">{$lang['strback']}</a>";
	if ($conf['show_reports'] && isset($rs) && is_object($rs) && $rs->recordCount() > 0) {
		echo " | <a class=\"navlink\" href=\"reports.php?action=create&amp;db_name=", urlencode($_REQUEST['database']), "&amp;report_sql=",
			urlencode($_POST['query']), "\">{$lang['strcreatereport']}</a>";
	}
	echo "</p>\n";
	
	$misc->printFooter();
?>
