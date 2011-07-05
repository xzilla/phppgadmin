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
	 * $Id: display.php,v 1.68 2008/04/14 12:44:27 ioguix Exp $
	 */

	// Prevent timeouts on large exports (non-safe mode only)
	if (!ini_get('safe_mode')) set_time_limit(0);

	// Include application functions
	include_once('./libraries/lib.inc.php');

	global $conf, $lang;

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';

	/**
	 * Show confirmation of edit and perform actual update
	 */
	function doEditRow($confirm, $msg = '') {
		global $data, $misc, $conf;
		global $lang;

		if (is_array($_REQUEST['key']))
           $key = $_REQUEST['key'];
        else
           $key = unserialize($_REQUEST['key']);

		if ($confirm) {
			$misc->printTrail($_REQUEST['subject']);
			$misc->printTitle($lang['streditrow']);
			$misc->printMsg($msg);

			$attrs = $data->getTableAttributes($_REQUEST['table']);
			$rs = $data->browseRow($_REQUEST['table'], $key);

			if (($conf['autocomplete'] != 'disable')) {
				$fksprops = $misc->getAutocompleteFKProperties($_REQUEST['table']);
				if ($fksprops !== false)
					echo $fksprops['code'];
			}
			else $fksprops = false;

			echo "<form action=\"display.php\" method=\"post\" id=\"ac_form\">\n";
			$elements = 0;
			$error = true;			
			if ($rs->recordCount() == 1 && $attrs->recordCount() > 0) {
				echo "<table>\n";

				// Output table header
				echo "<tr><th class=\"data\">{$lang['strcolumn']}</th><th class=\"data\">{$lang['strtype']}</th>";
				echo "<th class=\"data\">{$lang['strformat']}</th>\n";
				echo "<th class=\"data\">{$lang['strnull']}</th><th class=\"data\">{$lang['strvalue']}</th></tr>";

				$i = 0;
				while (!$attrs->EOF) {

					$attrs->fields['attnotnull'] = $data->phpBool($attrs->fields['attnotnull']);
					$id = (($i % 2) == 0 ? '1' : '2');
					
					// Initialise variables
					if (!isset($_REQUEST['format'][$attrs->fields['attname']]))
						$_REQUEST['format'][$attrs->fields['attname']] = 'VALUE';
					
					echo "<tr class=\"data{$id}\">\n";
					echo "<td style=\"white-space:nowrap;\">", $misc->printVal($attrs->fields['attname']), "</td>";
					echo "<td style=\"white-space:nowrap;\">\n";
					echo $misc->printVal($data->formatType($attrs->fields['type'], $attrs->fields['atttypmod']));
					echo "<input type=\"hidden\" name=\"types[", htmlspecialchars($attrs->fields['attname']), "]\" value=\"", 
						htmlspecialchars($attrs->fields['type']), "\" /></td>";
					$elements++;
					echo "<td style=\"white-space:nowrap;\">\n";
					echo "<select name=\"format[", htmlspecialchars($attrs->fields['attname']), "]\">\n";
					echo "<option value=\"VALUE\"", ($_REQUEST['format'][$attrs->fields['attname']] == 'VALUE') ? ' selected="selected"' : '', ">{$lang['strvalue']}</option>\n";
					echo "<option value=\"EXPRESSION\"", ($_REQUEST['format'][$attrs->fields['attname']] == 'EXPRESSION') ? ' selected="selected"' : '', ">{$lang['strexpression']}</option>\n";
					echo "</select>\n</td>\n";
					$elements++;
					echo "<td style=\"white-space:nowrap;\">";
					// Output null box if the column allows nulls (doesn't look at CHECKs or ASSERTIONS)
					if (!$attrs->fields['attnotnull']) {
						// Set initial null values
						if ($_REQUEST['action'] == 'confeditrow' && $rs->fields[$attrs->fields['attname']] === null) {
							$_REQUEST['nulls'][$attrs->fields['attname']] = 'on';
						}
						echo "<input type=\"checkbox\" name=\"nulls[{$attrs->fields['attname']}]\"",
							isset($_REQUEST['nulls'][$attrs->fields['attname']]) ? ' checked="checked"' : '', " /></td>\n";
						$elements++;
					}
					else
						echo "&nbsp;</td>";

					echo "<td id=\"row_att_{$attrs->fields['attnum']}\" style=\"white-space:nowrap;\">";

					$extras = array();

					// If the column allows nulls, then we put a JavaScript action on the data field to unset the
					// NULL checkbox as soon as anything is entered in the field.  We use the $elements variable to 
					// keep track of which element offset we're up to.  We can't refer to the null checkbox by name
					// as it contains '[' and ']' characters.
					if (!$attrs->fields['attnotnull']) {
						$extras['onChange'] = 'elements[' . ($elements - 1) . '].checked = false;';
					}

					if (($fksprops !== false) && isset($fksprops['byfield'][$attrs->fields['attnum']])) {
						$extras['id'] = "attr_{$attrs->fields['attnum']}";
						$extras['autocomplete'] = 'off';
					}

					echo $data->printField("values[{$attrs->fields['attname']}]", $rs->fields[$attrs->fields['attname']], $attrs->fields['type'], $extras);

					echo "</td>";
					$elements++;
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
				echo "</table>\n";

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
			if (isset($_REQUEST['subject']))
				echo "<input type=\"hidden\" name=\"subject\" value=\"", htmlspecialchars($_REQUEST['subject']), "\" />\n";
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
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";

			if($fksprops !== false) {
				if ($conf['autocomplete'] != 'default off')
					echo "<input type=\"checkbox\" id=\"no_ac\" value=\"1\" checked=\"checked\" /><label for=\"no_ac\">{$lang['strac']}</label>\n";
				else
					echo "<input type=\"checkbox\" id=\"no_ac\" value=\"0\" /><label for=\"no_ac\">{$lang['strac']}</label>\n";
			}

			echo "</p>\n";
			echo "</form>\n";
		}
		else {
			if (!isset($_POST['values'])) $_POST['values'] = array();
			if (!isset($_POST['nulls'])) $_POST['nulls'] = array();
			
			$status = $data->editRow($_POST['table'], $_POST['values'], $_POST['nulls'], 
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
		global $data, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail($_REQUEST['subject']);
			$misc->printTitle($lang['strdeleterow']);

			echo "<p>{$lang['strconfdeleterow']}</p>\n";
			
			echo "<form action=\"display.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"delrow\" />\n";
			echo $misc->form;
			if (isset($_REQUEST['table']))
				echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			if (isset($_REQUEST['subject']))
				echo "<input type=\"hidden\" name=\"subject\" value=\"", htmlspecialchars($_REQUEST['subject']), "\" />\n";
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
			$status = $data->deleteRow($_POST['table'], unserialize($_POST['key']));
			if ($status == 0)
				doBrowse($lang['strrowdeleted']);
			elseif ($status == -2)
				doBrowse($lang['strrownotunique']);
			else			
				doBrowse($lang['strrowdeletedbad']);
		}
		
	}
	
	/* build & return the FK information data structure 
	 * used when deciding if a field should have a FK link or not*/
	function &getFKInfo() {
		global $data, $misc, $lang;
		 
		// Get the foreign key(s) information from the current table
		$fkey_information = array('byconstr' => array(), 'byfield' => array());

		if (isset($_REQUEST['table'])) {
			$constraints = $data->getConstraintsWithFields($_REQUEST['table']);
			if ($constraints->recordCount() > 0) {

				/* build the common parts of the url for the FK  */
				$fk_return_url = "{$misc->href}&amp;subject=table&amp;table=". urlencode($_REQUEST['table']);
				if (isset($_REQUEST['page'])) $fk_return_url .= "&amp;page=" . urlencode($_REQUEST['page']);
				if (isset($_REQUEST['query'])) $fk_return_url .= "&amp;query=" . urlencode($_REQUEST['query']);
				if (isset($_REQUEST['search_path'])) $fk_return_url .= "&amp;search_path=" . urlencode($_REQUEST['search_path']);

				/* yes, we double urlencode fk_return_url so parameters here don't 
				 * overwrite real one when included in the final url */
				$fkey_information['common_url'] = $misc->getHREF('schema') .'&amp;subject=table&amp;return_url=display.php?'
					. urlencode($fk_return_url) .'&amp;return_desc='. urlencode($lang['strback']);

				/* build the FK constraints data structure */
				while (!$constraints->EOF) {
					$constr =& $constraints->fields;
					if ($constr['contype'] == 'f') {

						if (!isset($fkey_information['byconstr'][$constr['conid']])) {
							$fkey_information['byconstr'][$constr['conid']] = array (
								'url_data' => 'table='. urlencode($constr['f_table']) .'&amp;schema='. urlencode($constr['f_schema']),
								'fkeys' => array(),
								'consrc' => $constr['consrc']
							);
						}

						$fkey_information['byconstr'][$constr['conid']]['fkeys'][$constr['p_field']] = $constr['f_field'];

						if (!isset($fkey_information['byfield'][$constr['p_field']]))
							$fkey_information['byfield'][$constr['p_field']] = array();

						$fkey_information['byfield'][$constr['p_field']][] = $constr['conid'];
					}
					$constraints->moveNext();
				}
			}
		}

		return $fkey_information;
	}

	/* Print table header cells 
	 * @param $sortLink must be urlencoded already
	 * */
	function printTableHeaderCells(&$rs, $sortLink, $withOid) {
		global $misc, $data, $conf;
		$j = 0;

		foreach ($rs->fields as $k => $v) {

			if (($k === $data->id) && ( !($withOid && $conf['show_oids']) )) {
				$j++;
				continue;
			}
			$finfo = $rs->fetchField($j);

			if ($sortLink === false) {
				echo "<th class=\"data\">", $misc->printVal($finfo->name), "</th>\n";
			}
			else {
				echo "<th class=\"data\"><a href=\"display.php?{$sortLink}&amp;sortkey=", ($j + 1), "&amp;sortdir=";
				// Sort direction opposite to current direction, unless it's currently ''
				echo ($_REQUEST['sortdir'] == 'asc' && $_REQUEST['sortkey'] == ($j + 1)) ? 'desc' : 'asc';
				echo "&amp;strings=", urlencode($_REQUEST['strings']), 
					"&amp;page=" . urlencode($_REQUEST['page']), "\">", 
					$misc->printVal($finfo->name), "</a></th>\n";
			}
			$j++;
		}

		reset($rs->fields);
	}

	/* Print data-row cells */
	function printTableRowCells(&$rs, &$fkey_information, $withOid) {
		global $data, $misc, $conf;
		$j = 0;
		
		if (!isset($_REQUEST['strings'])) $_REQUEST['strings'] = 'collapsed';

		foreach ($rs->fields as $k => $v) {
			$finfo = $rs->fetchField($j++);

			if (($k === $data->id) && ( !($withOid && $conf['show_oids']) )) continue;
			elseif ($v !== null && $v == '') echo "<td>&nbsp;</td>";
			else {
				echo "<td style=\"white-space:nowrap;\">";

				if (($v !== null) && isset($fkey_information['byfield'][$k])) {
					foreach ($fkey_information['byfield'][$k] as $conid) {

						$query_params = $fkey_information['byconstr'][$conid]['url_data'];

						foreach ($fkey_information['byconstr'][$conid]['fkeys'] as $p_field => $f_field) {
							$query_params .= '&amp;'. urlencode("fkey[{$f_field}]") .'='. urlencode($rs->fields[$p_field]);
						}

						/* $fkey_information['common_url'] is already urlencoded */
						$query_params .= '&amp;'. $fkey_information['common_url'];
						echo "<div style=\"display:inline-block;\">";
						echo "<a class=\"fk fk_". htmlentities($conid) ."\" href=\"display.php?{$query_params}\">";
						echo "<img src=\"".$misc->icon('ForeignKey')."\" style=\"vertical-align:middle;\" alt=\"[fk]\" title=\""
							. htmlentities($fkey_information['byconstr'][$conid]['consrc'])
							."\" />";
						echo "</a>";
						echo "</div>";
					}
					echo $misc->printVal($v, $finfo->type, array('null' => true, 'clip' => ($_REQUEST['strings']=='collapsed'), 'class' => 'fk_value'));
				} else {
					echo $misc->printVal($v, $finfo->type, array('null' => true, 'clip' => ($_REQUEST['strings']=='collapsed')));
				}
				echo "</td>";
			}
		}
	}

	/* Print the FK row, used in ajax requests */
	function doBrowseFK() {
		global $data, $misc, $lang;

		$ops = array();
		foreach($_REQUEST['fkey'] as $x => $y) {
			$ops[$x] = '=';
		}
		$query = $data->getSelectSQL($_REQUEST['table'], array(), $_REQUEST['fkey'], $ops);
		$_REQUEST['query'] = $query;

		$fkinfo =& getFKInfo();

		$max_pages = 1;
		// Retrieve page from query.  $max_pages is returned by reference.
		$rs = $data->browseQuery('SELECT', $_REQUEST['table'], $_REQUEST['query'],  
			null, null, 1, 1, $max_pages);

		echo "<a href=\"\" style=\"display:table-cell;\" class=\"fk_delete\"><img alt=\"[delete]\" src=\"". $misc->icon('Delete') ."\" /></a>\n";
		echo "<div style=\"display:table-cell;\">";

		if (is_object($rs) && $rs->recordCount() > 0) {
			/* we are browsing a referenced table here
			 * we should show OID if show_oids is true
			 * so we give true to withOid in functions bellow
			 * as 3rd paramter */
		
			echo "<table><tr>";
				printTableHeaderCells($rs, false, true);
			echo "</tr>";
			echo "<tr class=\"data1\">\n";
				printTableRowCells($rs, $fkinfo, true);
			echo "</tr>\n";
			echo "</table>\n";
		}
		else
			echo $lang['strnodata'];

		echo "</div>";

		exit;
	}

	/** 
	 * Displays requested data
	 */
	function doBrowse($msg = '') {
		global $data, $conf, $misc, $lang;

		$save_history = false;
		// If current page is not set, default to first page
		if (!isset($_REQUEST['page']))
			$_REQUEST['page'] = 1;
		if (!isset($_REQUEST['nohistory']))
			$save_history = true;
		
		if (isset($_REQUEST['subject'])) {
			$subject = $_REQUEST['subject'];
			if (isset($_REQUEST[$subject])) $object = $_REQUEST[$subject];
		}
		else {
			$subject = '';
		}

		$misc->printTrail(isset($subject) ? $subject : 'database');

		/* This code is used when browsing FK in pure-xHTML (without js) */
		if (isset($_REQUEST['fkey'])) {
			$ops = array();
			foreach($_REQUEST['fkey'] as $x => $y) {
				$ops[$x] = '=';
			}
			$query = $data->getSelectSQL($_REQUEST['table'], array(), $_REQUEST['fkey'], $ops);
			$_REQUEST['query'] = $query;
		}
		
		if (isset($object)) {
			if (isset($_REQUEST['query'])) {
				$_SESSION['sqlquery'] = $_REQUEST['query'];
				$misc->printTitle($lang['strselect']);
				$type = 'SELECT';
			}
			else if (isset($_REQUEST['report'])) {
				$misc->printTitle($lang['strselect']);
				$type = 'SELECT';
			}
			else {
				$misc->printTitle($lang['strbrowse']);
				$type = 'TABLE';
			}
		} else {
			$misc->printTitle($lang['strqueryresults']);
			$type = 'QUERY';
		}

		$misc->printMsg($msg);

		// If 'sortkey' is not set, default to ''
		if (!isset($_REQUEST['sortkey'])) $_REQUEST['sortkey'] = '';

		// If 'sortdir' is not set, default to ''
		if (!isset($_REQUEST['sortdir'])) $_REQUEST['sortdir'] = '';
	
		// If 'strings' is not set, default to collapsed 
		if (!isset($_REQUEST['strings'])) $_REQUEST['strings'] = 'collapsed';
	
		// Fetch unique row identifier, if this is a table browse request.
		if (isset($object))
			$key = $data->getRowIdentifier($object);
		else
			$key = array();
		
		// Set the schema search path
		if (isset($_REQUEST['search_path'])) {
			if ($data->setSearchPath(array_map('trim',explode(',',$_REQUEST['search_path']))) != 0) {
				return;
			}
		}

		// Retrieve page from query.  $max_pages is returned by reference.
		$rs = $data->browseQuery($type, 
			isset($object) ? $object : null, 
			isset($_SESSION['sqlquery']) ? $_SESSION['sqlquery'] : null,
			$_REQUEST['sortkey'], $_REQUEST['sortdir'], $_REQUEST['page'],
			$conf['max_rows'], $max_pages);

		$fkey_information =& getFKInfo();

		// Build strings for GETs
		$gets = $misc->href;
		if (isset($object)) $gets .= "&amp;" . urlencode($subject) . '=' . urlencode($object);
		if (isset($subject)) $gets .= "&amp;subject=" . urlencode($subject);
		if (isset($_REQUEST['query'])) $gets .= "&amp;query=" . urlencode($_REQUEST['query']);
		if (isset($_REQUEST['report'])) $gets .= "&amp;report=" . urlencode($_REQUEST['report']);
		if (isset($_REQUEST['count'])) $gets .= "&amp;count=" . urlencode($_REQUEST['count']);
		if (isset($_REQUEST['return_url'])) $gets .= "&amp;return_url=" . urlencode($_REQUEST['return_url']);
		if (isset($_REQUEST['return_desc'])) $gets .= "&amp;return_desc=" . urlencode($_REQUEST['return_desc']);
		if (isset($_REQUEST['search_path'])) $gets .= "&amp;search_path=" . urlencode($_REQUEST['search_path']);
		if (isset($_REQUEST['table'])) $gets .= "&amp;table=" . urlencode($_REQUEST['table']);
		
		// This string just contains sort info
		$getsort = "sortkey=" . urlencode($_REQUEST['sortkey']) .
			"&amp;sortdir=" . urlencode($_REQUEST['sortdir']);

		if ($save_history && is_object($rs) && ($type == 'QUERY')) //{
			$misc->saveScriptHistory($_REQUEST['query']);

		if (is_object($rs) && $rs->recordCount() > 0) {
			// Show page navigation
			$misc->printPages($_REQUEST['page'], $max_pages, "display.php?page=%s&amp;{$gets}&amp;{$getsort}&amp;nohistory=t&amp;strings=" . urlencode($_REQUEST['strings']));

			echo "<table id=\"data\">\n<tr>";

			// Check that the key is actually in the result set.  This can occur for select
			// operations where the key fields aren't part of the select.  XXX:  We should
			// be able to support this, somehow.
			foreach ($key as $v) {
				// If a key column is not found in the record set, then we
				// can't use the key.
				if (!in_array($v, array_keys($rs->fields))) {
					$key = array();
					break;
				}
			}
			// Display edit and delete actions if we have a key
			if (sizeof($key) > 0)
				echo "<th colspan=\"2\" class=\"data\">{$lang['stractions']}</th>\n";

			/* we show OIDs only if we are in TABLE or SELECT type browsing */
			printTableHeaderCells($rs, $gets, isset($object));

			echo "</tr>\n";

			$i = 0;		
			reset($rs->fields);
			while (!$rs->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr class=\"data{$id}\">\n";
				// Display edit and delete links if we have a key
				if (sizeof($key) > 0) {
					$key_str = '';
					$has_nulls = false;
					foreach ($key as $v) {
						if ($rs->fields[$v] === null) {
							$has_nulls = true;
							break;
						}
						if ($key_str != '') $key_str .= '&amp;';
						$key_str .= urlencode("key[{$v}]") . '=' . urlencode($rs->fields[$v]);
					}
					if ($has_nulls) {
						echo "<td colspan=\"2\">&nbsp;</td>\n";
					} else {
						echo "<td class=\"opbutton{$id}\"><a href=\"display.php?action=confeditrow&amp;strings=", 
							urlencode($_REQUEST['strings']), "&amp;page=", 
							urlencode($_REQUEST['page']), "&amp;{$key_str}&amp;{$gets}&amp;{$getsort}\">{$lang['stredit']}</a></td>\n";
						echo "<td class=\"opbutton{$id}\"><a href=\"display.php?action=confdelrow&amp;strings=", 
							urlencode($_REQUEST['strings']), "&amp;page=", 
							urlencode($_REQUEST['page']), "&amp;{$key_str}&amp;{$gets}&amp;{$getsort}\">{$lang['strdelete']}</a></td>\n";
					}
				}

				print printTableRowCells($rs, $fkey_information, isset($object));

				echo "</tr>\n";
				$rs->moveNext();
				$i++;
			}
			echo "</table>\n";

			echo "<p>", $rs->recordCount(), " {$lang['strrows']}</p>\n";
			// Show page navigation
			$misc->printPages($_REQUEST['page'], $max_pages, "display.php?page=%s&amp;{$gets}&amp;{$getsort}&amp;strings=" . urlencode($_REQUEST['strings']));
		}
		else echo "<p>{$lang['strnodata']}</p>\n";

		// Navigation links	
		echo "<ul class=\"navlink\">\n";

		// Return
		if (isset($_REQUEST['return_url']) && isset($_REQUEST['return_desc']))
			echo "\t<li><a href=\"{$_REQUEST['return_url']}\">{$_REQUEST['return_desc']}</a></li>\n";

		// Edit SQL link
		if (isset($_REQUEST['query']))
			echo "\t<li><a href=\"database.php?{$misc->href}&amp;action=sql&amp;paginate=on&amp;query=",
				urlencode($_REQUEST['query']), "\">{$lang['streditsql']}</a></li>\n";

		// Expand/Collapse
		if ($_REQUEST['strings'] == 'expanded')
			echo "\t<li><a href=\"display.php?{$gets}&amp;{$getsort}&amp;strings=collapsed&amp;page=", 
				urlencode($_REQUEST['page']), "\">{$lang['strcollapse']}</a></li>\n";
		else
			echo "\t<li><a href=\"display.php?{$gets}&amp;{$getsort}&amp;strings=expanded&amp;page=", 
				urlencode($_REQUEST['page']), "\">{$lang['strexpand']}</a></li>\n";

		// Create report
		if (isset($_REQUEST['query']) && ($subject !== 'report') && $conf['show_reports'] && isset($rs) && is_object($rs) && $rs->recordCount() > 0)
			echo "\t<li><a href=\"reports.php?{$misc->href}&amp;action=create&amp;report_sql=",
				urlencode($_REQUEST['query']), "&amp;paginate=", (isset($_REQUEST['paginate'])? urlencode($_REQUEST['paginate']):'f'), "\">{$lang['strcreatereport']}</a></li>\n";

		// Create view and download
		if (isset($_REQUEST['query']) && isset($rs) && is_object($rs) && $rs->recordCount() > 0) {
			// Report views don't set a schema, so we need to disable create view in that case
			if (isset($_REQUEST['schema'])) 
				echo "\t<li><a href=\"views.php?action=create&amp;formDefinition=",
					urlencode($_REQUEST['query']), "&amp;{$misc->href}\">{$lang['strcreateview']}</a></li>\n";
			echo "\t<li><a href=\"dataexport.php?query=", urlencode($_REQUEST['query']);
			if (isset($_REQUEST['search_path']))
				echo "&amp;search_path=", urlencode($_REQUEST['search_path']);
			echo "&amp;{$misc->href}\">{$lang['strdownload']}</a></li>\n";
		}

		// Insert
		if (isset($object) && (isset($subject) && $subject == 'table'))
			echo "\t<li><a href=\"tables.php?action=confinsertrow&amp;table=",
				urlencode($object), "&amp;{$misc->href}\">{$lang['strinsert']}</a></li>\n";

		// Refresh
		echo "\t<li><a href=\"display.php?{$gets}&amp;{$getsort}&amp;strings=", urlencode($_REQUEST['strings']), 
			"&amp;page=" . urlencode($_REQUEST['page']),
			"\">{$lang['strrefresh']}</a></li>\n";
		echo "</ul>\n";
	}


	/* shortcuts: this function exit the script for ajax purpose */
	if ($action == 'dobrowsefk') {
		doBrowseFK();
	}

	$scripts  = "<script src=\"libraries/js/jquery.js\" type=\"text/javascript\"></script>\n";
	$scripts .= "<script src=\"js/display.js\" type=\"text/javascript\"></script>";

	$scripts .= "<script type=\"text/javascript\">\n";
	$scripts .= "var Display = {\n";
	$scripts .= "errmsg: '". str_replace("'", "\'", $lang['strconnectionfail']) ."'\n";
	$scripts .= "};\n";
	$scripts .= "</script>\n";

	// If a table is specified, then set the title differently
	if (isset($_REQUEST['subject']) && isset($_REQUEST[$_REQUEST['subject']]))
		$misc->printHeader($lang['strtables'], $scripts);
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
