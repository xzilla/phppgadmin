<?php

	/**
	 * Process an arbitrary SQL query - tricky!  The main problem is that
	 * unless we implement a full SQL parser, there's no way of knowing
	 * how many SQL statements have been strung together with semi-colons
	 * @param $query The SQL query string to execute
	 *
	 * $Id: sql.php,v 1.16 2004/02/14 04:21:02 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	// Determine explain version of SQL
	if ($data->hasFullExplain() && isset($_POST['explain']) && isset($_POST['query'])) {
		$_POST['query'] = $data->getExplainSQL($_POST['query'], false)
	}
	elseif ($data->hasFullExplain() && isset($_POST['explain_analyze']) && isset($_POST['query'])) {
		$_POST['query'] = $data->getExplainSQL($_POST['query'], true)
	}
	
	// Check to see if pagination has been specified.  In that case, send to display
	// script for pagination
	if (isset($_POST['paginate'])) {
		$_REQUEST['return_url'] = "database.php?{$misc->href}&action=sql&paginate=on&query=" . urlencode($_POST['query']);
		$_REQUEST['return_desc'] = $lang['streditsql'];
		include('./display.php');
		exit;
	}
	
	$PHP_SELF = $_SERVER['PHP_SELF'];

	$misc->printHeader($lang['strqueryresults']);
	$misc->printBody();
	$misc->printDatabaseNav();
	echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strsql']}: {$lang['strqueryresults']}</h2>\n";

	// Set fetch mode to NUM so that duplicate field names are properly returned
	$data->conn->setFetchMode(ADODB_FETCH_NUM);
	// Execute the query
	$rs = $data->conn->Execute($_POST['query']);

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
		elseif ($data->conn->Affected_Rows() > 0) {
			echo "<p>", $data->conn->Affected_Rows(), " {$lang['strrowsaff']}</p>\n";
		}
		// Else say success
		else echo "<p>{$lang['strsqlexecuted']}</p>\n";
	}

	echo "<p><a class=\"navlink\" href=\"database.php?database=", urlencode($_REQUEST['database']),
		"&amp;action=sql&amp;query=", urlencode($_POST['query']), "\">{$lang['streditsql']}</a>";
	if ($conf['show_reports'] && isset($rs) && is_object($rs) && $rs->recordCount() > 0) {
		echo " | <a class=\"navlink\" href=\"reports.php?action=create&amp;db_name=", urlencode($_REQUEST['database']), "&amp;report_sql=",
			urlencode($_POST['query']), "\">{$lang['strcreatereport']}</a>";
	}
	echo "</p>\n";
	
	$misc->printFooter();
?>
