<?php

	/**
	 * Common relation browsing function that can be used for views,
	 * tables, reports, arbitrary queries, etc. to avoid code duplication.
	 * @param $query The SQL SELECT string to execute
	 * @param $count The same SQL query, but only retrieves the count of the rows (AS total)
	 * @param $return_url The return URL
	 * @param $return_desc The return link name
	 * @param $page The current page
	 *
	 * $Id: display.php,v 1.29 2003/11/05 08:32:03 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	global $conf, $lang;

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show confirmation of edit and perform actual update
	 */
	function doEditRow($confirm, $msg = '') {
		global $localData, $database, $misc;
		global $lang;
		global $PHP_SELF;

		$key = $_REQUEST['key'];

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['streditrow']}</h2>\n";
			$misc->printMsg($msg);

			$attrs = &$localData->getTableAttributes($_REQUEST['table']);
			$rs = &$localData->browseRow($_REQUEST['table'], $key);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			$error = true;			
			if ($rs->recordCount() == 1 && $attrs->recordCount() > 0) {
				echo "<table>\n<tr>";

				// Output table header
				echo "<tr><th class=\"data\">{$lang['strfield']}</th><th class=\"data\">{$lang['strtype']}</th>";
				echo "<th class=\"data\">{$lang['strformat']}</th>\n";
				echo "<th class=\"data\">{$lang['strnull']}</th><th class=\"data\">{$lang['strvalue']}</th></tr>";

				$i = 0;
				while (!$attrs->EOF) {
					$attrs->f['attnotnull'] = $localData->phpBool($attrs->f['attnotnull']);
					$id = (($i % 2) == 0 ? '1' : '2');
					
					// Initialise variables
					if (!isset($_REQUEST['format'][$attrs->f['attname']]))
						$_REQUEST['format'][$attrs->f['attname']] = 'VALUE';
					
					echo "<tr>\n";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($attrs->f['attname']), "</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">\n";
					echo $misc->printVal($localData->formatType($attrs->f['type'], $attrs->f['atttypmod']));
					echo "<input type=\"hidden\" name=\"types[", htmlspecialchars($attrs->f['attname']), "]\" value=\"", 
						htmlspecialchars($attrs->f['type']), "\" /></td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">\n";
					echo "<select name=\"format[", htmlspecialchars($attrs->f['attname']), "]\">\n";
					echo "<option value=\"VALUE\"", ($_REQUEST['format'][$attrs->f['attname']] == 'VALUE') ? ' selected="selected"' : '', ">{$lang['strvalue']}</option>\n";
					echo "<option value=\"EXPRESSION\"", ($_REQUEST['format'][$attrs->f['attname']] == 'EXPRESSION') ? ' selected="selected"' : '', ">{$lang['strexpression']}</option>\n";
					echo "</select>\n</td>\n";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">";
					// Output null box if the column allows nulls (doesn't look at CHECKs or ASSERTIONS)
					if (!$attrs->f['attnotnull']) {
						// Set initial null values
						if ($_REQUEST['action'] == 'confeditrow' && $rs->f[$attrs->f['attname']] === null) {
							$_REQUEST['nulls'][$attrs->f['attname']] = 'on';
						}
						echo "<input type=\"checkbox\" name=\"nulls[{$attrs->f['attname']}]\"",
							isset($_REQUEST['nulls'][$attrs->f['attname']]) ? ' checked="checked"' : '', " /></td>";
					}
					else
						echo "&nbsp;</td>";

					echo "<td class=\"data{$id}\" nowrap>", $localData->printField("values[{$attrs->f['attname']}]",
						$rs->f[$attrs->f['attname']], $attrs->f['type']), "</td>";
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
				echo "</table></p>\n";
				$error = false;
			}
			elseif ($rs->recordCount() != 1) {
				echo "<p>{$lang['strrownotunique']}</p>\n";				
			}
			else {
				echo "<p>{$lang['strinvalidparam']}</p>\n";
			}

			echo "<input type=\"hidden\" name=\"action\" value=\"editrow\" />\n";
			echo $misc->form;
			if (isset($_REQUEST['table']))
				echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			if (isset($_REQUEST['query']))
				echo "<input type=\"hidden\" name=\"query\" value=\"", htmlspecialchars($_REQUEST['query']), "\" />\n";
			if (isset($_REQUEST['count']))
				echo "<input type=\"hidden\" name=\"count\" value=\"", htmlspecialchars($_REQUEST['count']), "\" />\n";
			if (isset($_REQUEST['return_url']))
				echo "<input type=\"hidden\" name=\"return_url\" value=\"", htmlspecialchars($_REQUEST['return_url']), "\" />\n";
			if (isset($_REQUEST['return_desc']))
				echo "<input type=\"hidden\" name=\"return_desc\" value=\"", htmlspecialchars($_REQUEST['return_desc']), "\" />\n";
			echo "<input type=\"hidden\" name=\"page\" value=\"", htmlspecialchars($_REQUEST['page']), "\" />\n";
			echo "<input type=\"hidden\" name=\"sortkey\" value=\"", htmlspecialchars($_REQUEST['sortkey']), "\" />\n";
			echo "<input type=\"hidden\" name=\"sortdir\" value=\"", htmlspecialchars($_REQUEST['sortdir']), "\" />\n";
			echo "<input type=\"hidden\" name=\"strings\" value=\"", htmlspecialchars($_REQUEST['strings']), "\" />\n";
			echo "<input type=\"hidden\" name=\"key\" value=\"", htmlspecialchars(serialize($key)), "\" />\n";
			echo "<p>";
			if (!$error) echo "<input type=\"submit\" name=\"save\" value=\"{$lang['strsave']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else {
			if (!isset($_POST['values'])) $_POST['values'] = array();
			if (!isset($_POST['nulls'])) $_POST['nulls'] = array();
			
			$status = $localData->editRow($_POST['table'], $_POST['values'], $_POST['nulls'], 
												$_POST['format'], $_POST['types'], unserialize($_POST['key']));
			if ($status == 0)
				doBrowse($lang['strrowupdated']);
			elseif ($status == -2)
				doEditRow(true, $lang['strrownotunique']);
			else
				doEditRow(true, $lang['strrowupdatedbad']);
		}

	}	

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDelRow($confirm) {
		global $localData, $database, $misc;
		global $lang;
		global $PHP_SELF;

		if ($confirm) { 
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strdeleterow']}</h2>\n";

			echo "<p>{$lang['strconfdeleterow']}</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"delrow\" />\n";
			echo $misc->form;
			if (isset($_REQUEST['table']))
				echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			if (isset($_REQUEST['query']))
				echo "<input type=\"hidden\" name=\"query\" value=\"", htmlspecialchars($_REQUEST['query']), "\" />\n";
			if (isset($_REQUEST['count']))
				echo "<input type=\"hidden\" name=\"count\" value=\"", htmlspecialchars($_REQUEST['count']), "\" />\n";
			if (isset($_REQUEST['return_url']))
				echo "<input type=\"hidden\" name=\"return_url\" value=\"", htmlspecialchars($_REQUEST['return_url']), "\" />\n";
			if (isset($_REQUEST['return_desc']))
				echo "<input type=\"hidden\" name=\"return_desc\" value=\"", htmlspecialchars($_REQUEST['return_desc']), "\" />\n";
			echo "<input type=\"hidden\" name=\"page\" value=\"", htmlspecialchars($_REQUEST['page']), "\" />\n";
			echo "<input type=\"hidden\" name=\"sortkey\" value=\"", htmlspecialchars($_REQUEST['sortkey']), "\" />\n";
			echo "<input type=\"hidden\" name=\"sortdir\" value=\"", htmlspecialchars($_REQUEST['sortdir']), "\" />\n";
			echo "<input type=\"hidden\" name=\"strings\" value=\"", htmlspecialchars($_REQUEST['strings']), "\" />\n";
			echo "<input type=\"hidden\" name=\"key\" value=\"", htmlspecialchars(serialize($_REQUEST['key'])), "\" />\n";
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\" />\n";
			echo "<input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->deleteRow($_POST['table'], unserialize($_POST['key']));
			if ($status == 0)
				doBrowse($lang['strrowdeleted']);
			elseif ($status == -2)
				doBrowse($lang['strrownotunique']);
			else			
				doBrowse($lang['strrowdeletedbad']);
		}
		
	}

	/** 
	 * Displays requested data
	 */
	function doBrowse() {
		global $localData, $conf, $misc, $lang;
		
		// If current page is not set, default to first page
		if (!isset($_REQUEST['page'])) $_REQUEST['page'] = 1;
	
		// If 'table' is not set, default to '' and set type
		if (isset($_REQUEST['table']) && isset($_REQUEST['query'])) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strselect']}</h2>\n";
			$type = 'SELECT';
		}
		elseif (isset($_REQUEST['table'])) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ", $misc->printVal($_REQUEST['table']), ": {$lang['strbrowse']}</h2>\n";
			$type = 'TABLE';
		}
		else {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strqueryresults']}</h2>\n";
			$type = 'QUERY';
		}

		// If 'sortkey' is not set, default to ''
		if (!isset($_REQUEST['sortkey'])) $_REQUEST['sortkey'] = '';
	
		// If 'sortdir' is not set, default to ''
		if (!isset($_REQUEST['sortdir'])) $_REQUEST['sortdir'] = '';
	
		// If 'strings' is not set, default to collapsed 
		if (!isset($_REQUEST['strings'])) $_REQUEST['strings'] = 'collapsed';
	
		// Fetch unique row identifier, if this is a table browse request.
		if (isset($_REQUEST['table']))
			$key = $localData->getRowIdentifier($_REQUEST['table']);
		else
			$key = array();
		
		// Retrieve page from query.  $max_pages is returned by reference.
		$rs = &$localData->browseQuery($type, 
			isset($_REQUEST['table']) ? $_REQUEST['table'] : null, 
			isset($_REQUEST['query']) ? $_REQUEST['query'] : null, 
			$_REQUEST['sortkey'], $_REQUEST['sortdir'], $_REQUEST['page'],
			$conf['max_rows'], $max_pages);
	
		// Build strings for GETs
		$str = 	$misc->href . "&amp;page=" . urlencode($_REQUEST['page']);
		if (isset($_REQUEST['table'])) $str .= "&amp;table=" . urlencode($_REQUEST['table']);
		if (isset($_REQUEST['query'])) $str .= "&amp;query=" . urlencode($_REQUEST['query']);
		if (isset($_REQUEST['count'])) $str .= "&amp;count=" . urlencode($_REQUEST['count']);
		if (isset($_REQUEST['return_url'])) $str .= "&amp;return_url=" . urlencode($_REQUEST['return_url']);
		if (isset($_REQUEST['return_desc'])) $str .= "&amp;return_desc=" . urlencode($_REQUEST['return_desc']);
		
		// This string just contains sort info
		$str2 = "sortkey=" . urlencode($_REQUEST['sortkey']) . 
			"&amp;sortdir=" . urlencode($_REQUEST['sortdir']);
			
		if (is_object($rs) && $rs->recordCount() > 0) {
			// Show page navigation
			$misc->printPages($_REQUEST['page'], $max_pages, "display.php?page=%s&amp;{$str}&amp;{$str2}");
			echo "<table>\n<tr>";
	
			// Check that the key is actually in the result set.  This can occur for select
			// operations where the key fields aren't part of the select.  XXX:  We should
			// be able to support this, somehow.
			foreach ($key as $v) {
				// If a key column is not found in the record set, then we
				// can't use the key.
				if (!in_array($v, array_keys($rs->f))) {
					$key = array();
					break;
				}
			}
			// Display edit and delete actions if we have a key
			if (sizeof($key) > 0)
				echo "<th colspan=\"2\" class=\"data\">{$lang['stractions']}</th>\n";

			$j = 0;		
			foreach ($rs->f as $k => $v) {
				if (isset($_REQUEST['table']) && $k == $localData->id && !$conf['show_oids']) {
					$j++;
					continue;
				}
				$finfo = $rs->fetchField($j);
				// Display column headers with sorting options
				echo "<th class=\"data\"><a href=\"display.php?{$str}&amp;sortkey=", ($j + 1), "&amp;sortdir=";
				// Sort direction opposite to current direction, unless it's currently ''
				echo ($_REQUEST['sortdir'] == 'asc' && $_REQUEST['sortkey'] == ($j + 1)) ? 'desc' : 'asc';
				echo "&amp;strings=", urlencode($_REQUEST['strings']), "\">", 
					$misc->printVal($finfo->name), "</a></th>\n";
				$j++;
			}
	
			echo "</tr>\n";
	
			$i = 0;		
			reset($rs->f);
			while (!$rs->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>\n";
				// Display edit and delete links if we have a key
				if (sizeof($key) > 0) {
					$key_str = '';
					$has_nulls = false;
					foreach ($key as $v) {
						if ($rs->f[$v] === null) {
							$has_nulls = true;
							break;
						}
						if ($key_str != '') $key_str .= '&amp;';
						$key_str .= urlencode("key[{$v}]") . '=' . urlencode($rs->f[$v]);
					}
					if ($has_nulls) {
						echo "<td class=\"data{$id}\" colspan=\"2\">&nbsp;</td>\n";
					} else {
						echo "<td class=\"opbutton{$id}\"><a href=\"display.php?action=confeditrow&amp;strings=", 
							urlencode($_REQUEST['strings']), "&amp;{$key_str}&amp;{$str}&amp;{$str2}\">{$lang['stredit']}</a></td>\n";
						echo "<td class=\"opbutton{$id}\"><a href=\"display.php?action=confdelrow&amp;strings=", 
							urlencode($_REQUEST['strings']), "&amp;{$key_str}&amp;{$str}&amp;{$str2}\">{$lang['strdelete']}</a></td>\n";
					}
				}
				$j = 0;
				foreach ($rs->f as $k => $v) {
					$finfo = $rs->fetchField($j++);
					if (isset($_REQUEST['table']) && $k == $localData->id && !$conf['show_oids']) continue;
					elseif ($v !== null && $v == '') echo "<td class=\"data{$id}\">&nbsp;</td>";
					else {
						// Trim strings if over length
						if ($_REQUEST['strings'] == 'collapsed' && strlen($v) > $conf['max_chars']) {
							$v = substr($v, 0, $conf['max_chars'] - 1) . $lang['strellipsis'];
						}
						echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($v, true, $finfo->type), "</td>";
					}
				}
				echo "</tr>\n";
				$rs->moveNext();
				$i++;
			}
			echo "</table>\n";
			echo "<p>", $rs->recordCount(), " {$lang['strrows']}</p>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	
		// Return
		echo "<p><a class=\"navlink\" href=\"{$_REQUEST['return_url']}\">{$_REQUEST['return_desc']}</a>\n";
		// Expand/Collapse
		if ($_REQUEST['strings'] == 'expanded')
			echo "| <a class=\"navlink\" href=\"display.php?{$str}&amp;{$str2}&amp;strings=collapsed\">{$lang['strcollapse']}</a>\n";
		else
			echo "| <a class=\"navlink\" href=\"display.php?{$str}&amp;{$str2}&amp;strings=expanded\">{$lang['strexpand']}</a>\n";
		// Create report
		if (isset($_REQUEST['query']) && $conf['show_reports'] && isset($rs) && is_object($rs) && $rs->recordCount() > 0) {
			echo " | <a class=\"navlink\" href=\"reports.php?action=create&amp;db_name=", urlencode($_REQUEST['database']), "&amp;report_sql=",
				urlencode($_REQUEST['query']), "\">{$lang['strcreatereport']}</a>\n";
		}
		// Create view and download
		if (isset($_REQUEST['query']) && isset($rs) && is_object($rs) && $rs->recordCount() > 0) {		
			echo " | <a class=\"navlink\" href=\"views.php?action=create&amp;formDefinition=",
				urlencode($_REQUEST['query']), "&amp;{$misc->href}\">{$lang['strcreateview']}</a>\n";
			echo " | <a class=\"navlink\" href=\"dataexport.php?query=",
					urlencode($_REQUEST['query']), "&amp;{$misc->href}\">{$lang['strdownload']}</a>\n";	
		}
		// Refresh
		echo "| <a class=\"navlink\" href=\"display.php?{$str}&amp;{$str2}&amp;strings=", urlencode($_REQUEST['strings']), 
			"\">{$lang['strrefresh']}</a></p>\n";
				
		echo "</p>\n";
	}
	
	// If a table is specified, then set the title differently
	if (isset($_REQUEST['table']))
		$misc->printHeader($lang['strtables']);
	else	
		$misc->printHeader($lang['strqueryresults']);
	$misc->printBody();

	switch ($action) {
		case 'editrow':
			if (isset($_POST['save'])) doEditRow(false);
			else doBrowse();
			break;
		case 'confeditrow':
			doEditRow(true);
			break;
		case 'delrow':
			if (isset($_POST['yes'])) doDelRow(false);
			else doBrowse();
			break;
		case 'confdelrow':
			doDelRow(true);
			break;			
		default:
			doBrowse();
			break;
	}

	$misc->printFooter();
?>
