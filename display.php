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
	 * $Id: display.php,v 1.67.2.1 2008/04/14 13:52:40 ioguix Exp $
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

			$bAllowAC = ($conf['autocomplete'] != 'disable') ? TRUE : FALSE;
			if($bAllowAC) {
				$constraints = $data->getConstraints($_REQUEST['table']);
				$arrayLocals = array();
				$arrayRefs = array();
				$nC = 0;
				while(!$constraints->EOF) {
					// The following RE will match a FK constrain with a single (quoted or not) referencing column. At the moment we don't support multicolumn FKs
					preg_match('/^FOREIGN KEY \(("[^"]*"|[^\s",]*)\) REFERENCES (.*)\((.*)\)/i', $constraints->fields['consrc'], $matches);
					if(!empty($matches)) {
						// Strip possible quotes and save
						$arrayLocals[$nC] = preg_replace('/"(.*)"/', '$1', $matches[1]);
						$arrayRefs[$nC] = array(preg_replace('/"(.*)"/', '$1', $matches[2]), preg_replace('/"(.*)"/', '$1', $matches[3]));
						$nC++;
					}
					$constraints->moveNext();
				}
			}

			$attrs = $data->getTableAttributes($_REQUEST['table']);
			$rs = $data->browseRow($_REQUEST['table'], $key);
			
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
					$szValueName = "values[{$attrs->fields['attname']}]";
					$szEvents = '';
					$szDivPH = '';
					if($bAllowAC) {
						$idxFound = array_search($attrs->fields['attname'], $arrayLocals);
						// In PHP < 4.2.0 array_search returns NULL on failure
						if ($idxFound !== NULL && $idxFound !== FALSE) {
							$szEvent = "makeAC('{$szValueName}',{$i},'{$arrayRefs[$idxFound][0]}','{$arrayRefs[$idxFound][1]}','{$_REQUEST['server']}','{$_REQUEST['database']}');";
							$szEvents = "onfocus=\"{$szEvent}\" onblur=\"hideAC();document.getElementById('ac_form').onsubmit=function(){return true;};\" onchange=\"{$szEvent}\" id=\"{$szValueName}\" onkeyup=\"{$szEvent}\" autocomplete=\"off\" class='ac_field'";
							$szDivPH = "<div id=\"fac{$i}_ph\"></div>";
						}
					}
					$attrs->fields['attnotnull'] = $data->phpBool($attrs->fields['attnotnull']);
					$id = (($i % 2) == 0 ? '1' : '2');
					
					// Initialise variables
					if (!isset($_REQUEST['format'][$attrs->fields['attname']]))
						$_REQUEST['format'][$attrs->fields['attname']] = 'VALUE';
					
					echo "<tr>\n";
					echo "<td class=\"data{$id}\" style=\"white-space:nowrap;\">", $misc->printVal($attrs->fields['attname']), "</td>";
					echo "<td class=\"data{$id}\" style=\"white-space:nowrap;\">\n";
					echo $misc->printVal($data->formatType($attrs->fields['type'], $attrs->fields['atttypmod']));
					echo "<input type=\"hidden\" name=\"types[", htmlspecialchars($attrs->fields['attname']), "]\" value=\"", 
						htmlspecialchars($attrs->fields['type']), "\" /></td>";
					$elements++;
					echo "<td class=\"data{$id}\" style=\"white-space:nowrap;\">\n";
					echo "<select name=\"format[", htmlspecialchars($attrs->fields['attname']), "]\">\n";
					echo "<option value=\"VALUE\"", ($_REQUEST['format'][$attrs->fields['attname']] == 'VALUE') ? ' selected="selected"' : '', ">{$lang['strvalue']}</option>\n";
					echo "<option value=\"EXPRESSION\"", ($_REQUEST['format'][$attrs->fields['attname']] == 'EXPRESSION') ? ' selected="selected"' : '', ">{$lang['strexpression']}</option>\n";
					echo "</select>\n</td>\n";
					$elements++;
					echo "<td class=\"data{$id}\" style=\"white-space:nowrap;\">";
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

					echo "<td class=\"data{$id}\" id=\"aciwp{$i}\" style=\"white-space:nowrap;\">";
					// If the column allows nulls, then we put a JavaScript action on the data field to unset the
					// NULL checkbox as soon as anything is entered in the field.  We use the $elements variable to 
					// keep track of which element offset we're up to.  We can't refer to the null checkbox by name
					// as it contains '[' and ']' characters.
					if (!$attrs->fields['attnotnull']) {
						echo $data->printField($szValueName, $rs->fields[$attrs->fields['attname']], $attrs->fields['type'], 
													array('onChange' => 'elements[' . ($elements - 1) . '].checked = false;'),$szEvents) . $szDivPH;
					}
					else {
						echo $data->printField($szValueName, $rs->fields[$attrs->fields['attname']], $attrs->fields['type'],array(),$szEvents) . $szDivPH;
					}
					echo "</td>";
					$elements++;
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
				echo "</table>\n";
				if($bAllowAC) {
					echo '<script src="aciur.js" type="text/javascript"></script>';
					echo "<div id=\"ac\"></div>";
				}
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
			if($bAllowAC) {
				$szChecked = $conf['autocomplete'] != 'default off' ? 'checked="checked"' : '';
				echo "<input type=\"checkbox\" name=\"no_ac\" id=\"no_ac\" onclick=\"rEB(this.checked);\" value=\"1\" {$szChecked} /><label for='no_ac' onmouseover='this.style.cursor=\"pointer\";'>{$lang['strac']}</label>\n";
			}
			echo "</p>\n";
			echo "</form>\n";
			echo "<script>rEB(document.getElementById('no_ac').checked);</script>";
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
		
		if (isset($object)) {
			if (isset($_REQUEST['query'])) {
				$misc->printTitle($lang['strselect']);
				$type = 'SELECT';
			} else {
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
		if ($data->hasSchemas() && isset($_REQUEST['search_path'])) {
			if ($data->setSearchPath(array_map('trim',explode(',',$_REQUEST['search_path']))) != 0) {
				return;
			}
		}

		// Retrieve page from query.  $max_pages is returned by reference.
		$rs = $data->browseQuery($type, 
			isset($object) ? $object : null, 
			isset($_REQUEST['query']) ? $_REQUEST['query'] : null, 
			$_REQUEST['sortkey'], $_REQUEST['sortdir'], $_REQUEST['page'],
			$conf['max_rows'], $max_pages);
	
		// Build strings for GETs
		$str = 	$misc->href; // . "&amp;page=" . urlencode($_REQUEST['page']);
		if (isset($object)) $str .= "&amp;" . urlencode($subject) . '=' . urlencode($object);
		if (isset($subject)) $str .= "&amp;subject=" . urlencode($subject);
		if (isset($_REQUEST['query'])) $str .= "&amp;query=" . urlencode($_REQUEST['query']);
		if (isset($_REQUEST['count'])) $str .= "&amp;count=" . urlencode($_REQUEST['count']);
		if (isset($_REQUEST['return_url'])) $str .= "&amp;return_url=" . urlencode($_REQUEST['return_url']);
		if (isset($_REQUEST['return_desc'])) $str .= "&amp;return_desc=" . urlencode($_REQUEST['return_desc']);
		if (isset($_REQUEST['search_path'])) $str .= "&amp;search_path=" . urlencode($_REQUEST['search_path']);
		if (isset($_REQUEST['table'])) $str .= "&amp;table=" . urlencode($_REQUEST['table']);
		
		// This string just contains sort info
		$str2 = "sortkey=" . urlencode($_REQUEST['sortkey']) . 
			"&amp;sortdir=" . urlencode($_REQUEST['sortdir']);
			
		if ($save_history && is_object($rs) && ($type == 'QUERY')) //{
			$misc->saveScriptHistory($_REQUEST['query']);

		if (is_object($rs) && $rs->recordCount() > 0) {
			// Show page navigation
			$misc->printPages($_REQUEST['page'], $max_pages, "display.php?page=%s&amp;{$str}&amp;{$str2}&amp;nohistory=t&amp;strings=" . urlencode($_REQUEST['strings']));
			echo "<table>\n<tr>";
	
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

			$j = 0;		
			foreach ($rs->fields as $k => $v) {
				if (isset($object) && $k == $data->id && !$conf['show_oids']) {
					$j++;
					continue;
				}
				$finfo = $rs->fetchField($j);
				// Display column headers with sorting options, unless we're PostgreSQL
				// 7.0 and it's a non-TABLE mode
				if (!$data->hasFullSubqueries() && $type != 'TABLE') {
					echo "<th class=\"data\">", $misc->printVal($finfo->name), "</th>\n";
				}
				else {
					echo "<th class=\"data\"><a href=\"display.php?{$str}&amp;sortkey=", ($j + 1), "&amp;sortdir=";
					// Sort direction opposite to current direction, unless it's currently ''
					echo ($_REQUEST['sortdir'] == 'asc' && $_REQUEST['sortkey'] == ($j + 1)) ? 'desc' : 'asc';
					echo "&amp;strings=", urlencode($_REQUEST['strings']), 
						"&amp;page=" . urlencode($_REQUEST['page']), "\">", 
						$misc->printVal($finfo->name), "</a></th>\n";
				}
				$j++;
			}
	
			echo "</tr>\n";
	
			$i = 0;		
			reset($rs->fields);
			while (!$rs->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>\n";
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
						echo "<td class=\"data{$id}\" colspan=\"2\">&nbsp;</td>\n";
					} else {
						echo "<td class=\"opbutton{$id}\"><a href=\"display.php?action=confeditrow&amp;strings=", 
							urlencode($_REQUEST['strings']), "&amp;page=", 
							urlencode($_REQUEST['page']), "&amp;{$key_str}&amp;{$str}&amp;{$str2}\">{$lang['stredit']}</a></td>\n";
						echo "<td class=\"opbutton{$id}\"><a href=\"display.php?action=confdelrow&amp;strings=", 
							urlencode($_REQUEST['strings']), "&amp;page=", 
							urlencode($_REQUEST['page']), "&amp;{$key_str}&amp;{$str}&amp;{$str2}\">{$lang['strdelete']}</a></td>\n";
					}
				}
				$j = 0;
				foreach ($rs->fields as $k => $v) {
					$finfo = $rs->fetchField($j++);
					if (isset($_REQUEST['table']) && $k == $data->id && !$conf['show_oids']) continue;
					elseif ($v !== null && $v == '') echo "<td class=\"data{$id}\">&nbsp;</td>";
					else {
						echo "<td class=\"data{$id}\" style=\"white-space:nowrap;\">",
							$misc->printVal($v, $finfo->type, array('null' => true, 'clip' => ($_REQUEST['strings']=='collapsed'))), "</td>";
					}
				}
				echo "</tr>\n";
				$rs->moveNext();
				$i++;
			}
			echo "</table>\n";			
			echo "<p>", $rs->recordCount(), " {$lang['strrows']}</p>\n";
			// Show page navigation
			$misc->printPages($_REQUEST['page'], $max_pages, "display.php?page=%s&amp;{$str}&amp;{$str2}&amp;strings=" . urlencode($_REQUEST['strings']));
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
			echo "\t<li><a href=\"display.php?{$str}&amp;{$str2}&amp;strings=collapsed&amp;page=", 
				urlencode($_REQUEST['page']), "\">{$lang['strcollapse']}</a></li>\n";
		else
			echo "\t<li><a href=\"display.php?{$str}&amp;{$str2}&amp;strings=expanded&amp;page=", 
				urlencode($_REQUEST['page']), "\">{$lang['strexpand']}</a></li>\n";

		// Create report
		if (isset($_REQUEST['query']) && ($subject !== 'report') && $conf['show_reports'] && isset($rs) && is_object($rs) && $rs->recordCount() > 0)
			echo "\t<li><a href=\"reports.php?{$misc->href}&amp;action=create&amp;report_sql=",
				urlencode($_REQUEST['query']), "&amp;paginate=", urlencode($_REQUEST['paginate']), "\">{$lang['strcreatereport']}</a></li>\n";

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
		echo "\t<li><a href=\"display.php?{$str}&amp;{$str2}&amp;strings=", urlencode($_REQUEST['strings']), 
			"&amp;page=" . urlencode($_REQUEST['page']),
			"\">{$lang['strrefresh']}</a></li>\n";
		echo "</ul>\n";
	}
	
	// If a table is specified, then set the title differently
	if (isset($_REQUEST['subject']) && isset($_REQUEST[$_REQUEST['subject']]))
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
