<?php

	/**
	 * Manage schemas within a database
	 *
	 * $Id: database.php,v 1.104 2007/11/30 06:04:43 xzilla Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';

	function _highlight($string, $term) {
		return str_replace($term, "<b>{$term}</b>", $string);
	}	

	/**
	 * Sends a signal to a process
	 */
	function doSignal() {
		global $data, $lang;

		$status = $data->sendSignal($_REQUEST['procpid'], $_REQUEST['signal']);
		if ($status == 0)
			doProcesses($lang['strsignalsent']);
		else
			doProcesses($lang['strsignalsentbad']);
	}

	/**
	 * Searches for a named database object
	 */
	function doFind($confirm = true, $msg = '') {
		global $data, $misc;
		global $lang, $conf;

		if (!isset($_REQUEST['term'])) $_REQUEST['term'] = '';
		if (!isset($_REQUEST['filter'])) $_REQUEST['filter'] = '';

		$misc->printTrail('database');
		$misc->printTabs('database','find');
		$misc->printMsg($msg);
		
		echo "<form action=\"database.php\" method=\"post\">\n";
		echo "<p><input name=\"term\" value=\"", htmlspecialchars($_REQUEST['term']), 
			"\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" />\n";
		// Output list of filters.  This is complex due to all the 'has' and 'conf' feature possibilities
		echo "<select name=\"filter\">\n";
		echo "\t<option value=\"\"", ($_REQUEST['filter'] == '') ? ' selected="selected"' : '', ">{$lang['strallobjects']}</option>\n";
		if ($data->hasSchemas())
			echo "\t<option value=\"SCHEMA\"", ($_REQUEST['filter'] == 'SCHEMA') ? ' selected="selected"' : '', ">{$lang['strschemas']}</option>\n";
		echo "\t<option value=\"TABLE\"", ($_REQUEST['filter'] == 'TABLE') ? ' selected="selected"' : '', ">{$lang['strtables']}</option>\n";
		echo "\t<option value=\"VIEW\"", ($_REQUEST['filter'] == 'VIEW') ? ' selected="selected"' : '', ">{$lang['strviews']}</option>\n";
		echo "\t<option value=\"SEQUENCE\"", ($_REQUEST['filter'] == 'SEQUENCE') ? ' selected="selected"' : '', ">{$lang['strsequences']}</option>\n";
		echo "\t<option value=\"COLUMN\"", ($_REQUEST['filter'] == 'COLUMN') ? ' selected="selected"' : '', ">{$lang['strcolumns']}</option>\n";
		echo "\t<option value=\"RULE\"", ($_REQUEST['filter'] == 'RULE') ? ' selected="selected"' : '', ">{$lang['strrules']}</option>\n";
		echo "\t<option value=\"INDEX\"", ($_REQUEST['filter'] == 'INDEX') ? ' selected="selected"' : '', ">{$lang['strindexes']}</option>\n";
		echo "\t<option value=\"TRIGGER\"", ($_REQUEST['filter'] == 'TRIGGER') ? ' selected="selected"' : '', ">{$lang['strtriggers']}</option>\n";
		echo "\t<option value=\"CONSTRAINT\"", ($_REQUEST['filter'] == 'CONSTRAINT') ? ' selected="selected"' : '', ">{$lang['strconstraints']}</option>\n";
		echo "\t<option value=\"FUNCTION\"", ($_REQUEST['filter'] == 'FUNCTION') ? ' selected="selected"' : '', ">{$lang['strfunctions']}</option>\n";
		if ($data->hasDomains())
			echo "\t<option value=\"DOMAIN\"", ($_REQUEST['filter'] == 'DOMAIN') ? ' selected="selected"' : '', ">{$lang['strdomains']}</option>\n";
		if ($conf['show_advanced']) {
			echo "\t<option value=\"AGGREGATE\"", ($_REQUEST['filter'] == 'AGGREGATE') ? ' selected="selected"' : '', ">{$lang['straggregates']}</option>\n";
			echo "\t<option value=\"TYPE\"", ($_REQUEST['filter'] == 'TYPE') ? ' selected="selected"' : '', ">{$lang['strtypes']}</option>\n";
			echo "\t<option value=\"OPERATOR\"", ($_REQUEST['filter'] == 'OPERATOR') ? ' selected="selected"' : '', ">{$lang['stroperators']}</option>\n";
			echo "\t<option value=\"OPCLASS\"", ($_REQUEST['filter'] == 'OPCLASS') ? ' selected="selected"' : '', ">{$lang['stropclasses']}</option>\n";
			if ($data->hasConversions())
				echo "\t<option value=\"CONVERSION\"", ($_REQUEST['filter'] == 'CONVERSION') ? ' selected="selected"' : '', ">{$lang['strconversions']}</option>\n";
			echo "\t<option value=\"LANGUAGE\"", ($_REQUEST['filter'] == 'LANGUAGE') ? ' selected="selected"' : '', ">{$lang['strlanguages']}</option>\n";
		}
		echo "</select>\n";
		echo "<input type=\"submit\" value=\"{$lang['strfind']}\" />\n";
		echo $misc->form;
		echo "<input type=\"hidden\" name=\"action\" value=\"find\" /></p>\n";
		echo "</form>\n";
		
		// Default focus
		$misc->setFocus('forms[0].term');

		// If a search term has been specified, then perform the search
		// and display the results, grouped by object type
		if ($_REQUEST['term'] != '') {
			$rs = $data->findObject($_REQUEST['term'], $_REQUEST['filter']);
			if ($rs->recordCount() > 0) {
				$curr = '';
				while (!$rs->EOF) {
					// Output a new header if the current type has changed, but not if it's just changed the rule type
					if ($rs->fields['type'] != $curr) {
						// Short-circuit in the case of changing from table rules to view rules; table cols to view cols;
						// table constraints to domain constraints
						if ($rs->fields['type'] == 'RULEVIEW' && $curr == 'RULETABLE') {
							$curr = $rs->fields['type'];
						}
						elseif ($rs->fields['type'] == 'COLUMNVIEW' && $curr == 'COLUMNTABLE') {
							$curr = $rs->fields['type'];
						}
						elseif ($rs->fields['type'] == 'CONSTRAINTTABLE' && $curr == 'CONSTRAINTDOMAIN') {
							$curr = $rs->fields['type'];
						}
						else {
							if ($curr != '') echo "</ul>\n";
							$curr = $rs->fields['type'];
							echo "<h3>";
							switch ($curr) {
								case 'SCHEMA':
									echo $lang['strschemas'];
									break;
								case 'TABLE':
									echo $lang['strtables'];
									break;
								case 'VIEW':
									echo $lang['strviews'];
									break;
								case 'SEQUENCE':
									echo $lang['strsequences'];
									break;
								case 'COLUMNTABLE':
								case 'COLUMNVIEW':
									echo $lang['strcolumns'];
									break;
								case 'INDEX':
									echo $lang['strindexes'];
									break;
								case 'CONSTRAINTTABLE':
								case 'CONSTRAINTDOMAIN':
									echo $lang['strconstraints'];
									break;
								case 'TRIGGER':
									echo $lang['strtriggers'];
									break;
								case 'RULETABLE':
								case 'RULEVIEW':
									echo $lang['strrules'];
									break;
								case 'FUNCTION':
									echo $lang['strfunctions'];
									break;
								case 'TYPE':
									echo $lang['strtypes'];
									break;
								case 'DOMAIN':
									echo $lang['strdomains'];
									break;
								case 'OPERATOR':
									echo $lang['stroperators'];
									break;
								case 'CONVERSION':
									echo $lang['strconversions'];
									break;
								case 'LANGUAGE':
									echo $lang['strlanguages'];
									break;
								case 'AGGREGATE':
									echo $lang['straggregates'];
									break;
								case 'OPCLASS':
									echo $lang['stropclasses'];
									break;
							}
							echo "</h3>";
							echo "<ul>\n";
						}
					}
					
					// Generate schema prefix
					if ($data->hasSchemas())
						$prefix = $rs->fields['schemaname'];
					else
						$prefix = '';
						
					switch ($curr) {
						case 'SCHEMA':						
							echo "<li><a href=\"redirect.php?subject=schema&amp;{$misc->href}&amp;schema=", $misc->printVal($rs->fields['name']), "\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'TABLE':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"tables.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"redirect.php?subject=table&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;table=", 
								urlencode($rs->fields['name']), "\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'VIEW':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"views.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"redirect.php?subject=view&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;view=", 
								urlencode($rs->fields['name']), "\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'SEQUENCE':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"sequences.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"sequences.php?subject=sequence&amp;action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), 
								"&amp;sequence=", urlencode($rs->fields['name']), "\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'COLUMNTABLE':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"redirect.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"tblproperties.php?subject=table&amp;{$misc->href}&amp;table=", urlencode($rs->fields['relname']), "&amp;schema=", urlencode($rs->fields['schemaname']), "\">", $misc->printVal($rs->fields['relname']), "</a>.";
							echo "<a href=\"colproperties.php?{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;table=", 
								urlencode($rs->fields['relname']), "&amp;column=", urlencode($rs->fields['name']), "\">", 
								_highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'COLUMNVIEW':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"redirect.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							 echo "<a href=\"viewproperties.php?subject=view&amp;{$misc->href}&amp;view=", urlencode($rs->fields['relname']), "&amp;schema=", urlencode($rs->fields['schemaname']), "\">", $misc->printVal($rs->fields['relname']), "</a>.";
							echo "<a href=\"colproperties.php?{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;view=", 
								urlencode($rs->fields['relname']), "&amp;column=", urlencode($rs->fields['name']), "\">", 
								_highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'INDEX':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"redirect.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "}</a>.";
							echo "<a href=\"redirect.php?subject=table&amp;{$misc->href}&amp;table=", urlencode($rs->fields['relname']), "&amp;schema=", urlencode($rs->fields['schemaname']), "\">", $misc->printVal($rs->fields['relname']), "</a>.";
							echo "<a href=\"indexes.php?{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;table=", urlencode($rs->fields['relname']), "\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'CONSTRAINTTABLE':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"redirect.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"redirect.php?subject=table&amp;{$misc->href}&amp;table=", urlencode($rs->fields['relname']), "&amp;schema=", urlencode($rs->fields['schemaname']), "\">", $misc->printVal($rs->fields['relname']), "</a>.";
							echo "<a href=\"constraints.php?{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;table=", 
								urlencode($rs->fields['relname']), "\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'CONSTRAINTDOMAIN':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"domains.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"domains.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;domain=", urlencode($rs->fields['relname']), "\">", 
								$misc->printVal($rs->fields['relname']), '.', _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'TRIGGER':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"redirect.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"redirect.php?subject=table&amp;{$misc->href}&amp;table=", urlencode($rs->fields['relname']), "&amp;schema=", urlencode($rs->fields['schemaname']), "\">", $misc->printVal($rs->fields['relname']), "</a>.";
							echo "<a href=\"triggers.php?{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;table=", urlencode($rs->fields['relname']), "\">", 
								_highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'RULETABLE':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"redirect.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"redirect.php?subject=table&amp;{$misc->href}&amp;table=", urlencode($rs->fields['relname']), "&amp;schema=", urlencode($rs->fields['schemaname']), "\">", $misc->printVal($rs->fields['relname']), "</a>.";
							echo "<a href=\"rules.php?subject=table&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;reltype=table&amp;table=", 
								urlencode($rs->fields['relname']), "\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'RULEVIEW':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"redirect.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"redirect.php?subject=view&amp;{$misc->href}&amp;view=", urlencode($rs->fields['relname']), "&amp;schema=", urlencode($rs->fields['schemaname']), "\">", $misc->printVal($rs->fields['relname']), "</a>.";
							echo "<a href=\"rules.php?subject=view&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;reltype=view&amp;view=", 
								urlencode($rs->fields['relname']), "\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'FUNCTION':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"functions.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"functions.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;function=", 
								urlencode($rs->fields['name']), "&amp;function_oid=", urlencode($rs->fields['oid']), "\">", 
								_highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'TYPE':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"types.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"types.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;type=", 
								urlencode($rs->fields['name']), "\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'DOMAIN':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"domains.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"domains.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;domain=", 
								urlencode($rs->fields['name']), "\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'OPERATOR':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"operators.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"operators.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "&amp;operator=", 
								urlencode($rs->fields['name']), "&amp;operator_oid=", urlencode($rs->fields['oid']) ,"\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'CONVERSION':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"conversions.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"conversions.php?{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), 
								"\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'LANGUAGE':
							echo "<li><a href=\"languages.php?{$misc->href}\">", _highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'AGGREGATE':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"aggregates.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"aggregates.php?{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "\">",
								_highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
						case 'OPCLASS':
							echo "<li>";
							if (!empty($prefix))
								echo "<a href=\"redirect.php?subject=schema&amp;{$misc->href}&amp;schema=", urlencode($prefix), "\">", $misc->printVal($prefix), "</a>.";
							echo "<a href=\"opclasses.php?{$misc->href}&amp;schema=", urlencode($rs->fields['schemaname']), "\">",
								_highlight($misc->printVal($rs->fields['name']), $_REQUEST['term']), "</a></li>\n";
							break;
					}
					$rs->moveNext();	
				}			
				echo "</ul>\n";
				
				echo "<p>", $rs->recordCount(), " ", $lang['strobjects'], "</p>\n";
			}
			else echo "<p>{$lang['strnoobjects']}</p>\n";
		}		
	}

	/**
	 * Displays options for database download
	 */
	function doExport($msg = '') {
		global $data, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printTabs('database','export');
		$misc->printMsg($msg);

		echo "<form action=\"dbexport.php\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$lang['strformat']}</th><th class=\"data\" colspan=\"2\">{$lang['stroptions']}</th></tr>\n";
		// Data only
		echo "<tr><th class=\"data left\" rowspan=\"2\">";
		echo "<input type=\"radio\" id=\"what1\" name=\"what\" value=\"dataonly\" checked=\"checked\" /><label for=\"what1\">{$lang['strdataonly']}</label></th>\n";
		echo "<td>{$lang['strformat']}</td>\n";
		echo "<td><select name=\"d_format\">\n";
		echo "<option value=\"copy\">COPY</option>\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		echo "<tr><td><label for=\"d_oids\">{$lang['stroids']}</label></td><td><input type=\"checkbox\" id=\"d_oids\" name=\"d_oids\" /></td>\n</tr>\n";
		// Structure only
		echo "<tr><th class=\"data left\"><input type=\"radio\" id=\"what2\" name=\"what\" value=\"structureonly\" /><label for=\"what2\">{$lang['strstructureonly']}</label></th>\n";
		echo "<td><label for=\"s_clean\">{$lang['strdrop']}</label></td><td><input type=\"checkbox\" id=\"s_clean\" name=\"s_clean\" /></td>\n</tr>\n";
		// Structure and data
		echo "<tr><th class=\"data left\" rowspan=\"3\">";
		echo "<input type=\"radio\" id=\"what3\" name=\"what\" value=\"structureanddata\" /><label for=\"what3\">{$lang['strstructureanddata']}</label></th>\n";
		echo "<td>{$lang['strformat']}</td>\n";
		echo "<td><select name=\"sd_format\">\n";
		echo "<option value=\"copy\">COPY</option>\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		echo "<tr><td><label for=\"sd_clean\">{$lang['strdrop']}</label></td><td><input type=\"checkbox\" id=\"sd_clean\" name=\"sd_clean\" /></td>\n</tr>\n";
		echo "<tr><td><label for=\"sd_oids\">{$lang['stroids']}</label></td><td><input type=\"checkbox\" id=\"sd_oids\" name=\"sd_oids\" /></td>\n</tr>\n";
		echo "</table>\n";
		
		echo "<h3>{$lang['stroptions']}</h3>\n";
		echo "<p><input type=\"radio\" id=\"output1\" name=\"output\" value=\"show\" checked=\"checked\" /><label for=\"output1\">{$lang['strshow']}</label>\n";
		echo "<br/><input type=\"radio\" id=\"output2\" name=\"output\" value=\"download\" /><label for=\"output2\">{$lang['strdownload']}</label>\n";
		// MSIE cannot download gzip in SSL mode - it's just broken
		if (!(strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE') && isset($_SERVER['HTTPS']))) {
			echo "<br /><input type=\"radio\" id=\"output3\" name=\"output\" value=\"gzipped\" /><label for=\"output3\">{$lang['strdownloadgzipped']}</label>\n";
		}
		echo "</p>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"export\" />\n";
		echo "<input type=\"hidden\" name=\"subject\" value=\"database\" />\n";
		echo $misc->form;
		echo "<input type=\"submit\" value=\"{$lang['strexport']}\" /></p>\n";
		echo "</form>\n";
	}
	
	/**
	 * Show the current status of all database variables
	 */
	function doVariables() {
		global $data, $misc;
		global $lang;

		// Fetch the variables from the database
		$variables = $data->getVariables();	
		$misc->printTrail('database');
		$misc->printTabs('database','variables');

		$columns = array(
			'variable' => array(
				'title' => $lang['strname'],
				'field' => field('name'),
			),
			'value' => array(
				'title' => $lang['strsetting'],
				'field' => field('setting'),
			),
		);
		
		$actions = array();
		
		$misc->printTable($variables, $columns, $actions, $lang['strnodata']);
	}

	/**
	 * Show all current database connections and any queries they
	 * are running.
	 */
	function doProcesses($msg = '') {
		global $data, $misc;
		global $lang;

		$misc->printTrail('database');
		$misc->printTabs('database','processes');
		$misc->printMsg($msg);

		// Display prepared transactions
		if($data->hasPreparedXacts()) {
			echo "<h3>{$lang['strpreparedxacts']}</h3>\n";
			$prep_xacts = $data->getPreparedXacts($_REQUEST['database']);
		
			$columns = array(
				'transaction' => array(
					'title' => $lang['strxactid'],
					'field' => field('transaction'),
				),
				'gid' => array(
					'title' => $lang['strgid'],
					'field' => field('gid'),
				),
				'prepared' => array(
					'title' => $lang['strstarttime'],
					'field' => field('prepared'),
				),
				'owner' => array(
					'title' => $lang['strowner'],
					'field' => field('owner'),
				),
			);

			$actions = array();

			$misc->printTable($prep_xacts, $columns, $actions, $lang['strnodata']);
		}

		// Fetch the processes from the database
		echo "<h3>{$lang['strprocesses']}</h3>\n";
		$processes = $data->getProcesses($_REQUEST['database']);
				
		$columns = array(
			'user' => array(
				'title' => $lang['strusername'],
				'field' => field('usename'),
			),
			'process' => array(
				'title' => $lang['strprocess'],
				'field' => field('procpid'),
			),
			'query' => array(
				'title' => $lang['strsql'],
				'field' => field('current_query'),
			),
			'start_time' => array(
				'title' => $lang['strstarttime'],
				'field' => field('query_start'),
			),
		);

		if ($data->hasSignals()) {
			$columns['actions'] = array('title' => $lang['stractions']);
			
			$actions = array(
				'cancel' => array(
					'title' => $lang['strcancel'],
					'url'   => "database.php?action=signal&amp;signal=CANCEL&amp;{$misc->href}&amp;",
					'vars'  => array('procpid' => 'procpid')
				)
			);
		}
		else $actions = array();
		
		// Remove query start time for <7.4
		if (!isset($processes->fields['query_start'])) unset($columns['start_time']);

		$misc->printTable($processes, $columns, $actions, $lang['strnodata']);
	}

	/**
	 * Show the existing table locks in the current database
	*/
	function doLocks() {
		global $data, $misc;
		global $lang;

		// Get the info from the pg_locks view
		$variables = $data->getLocks();

		$misc->printTrail('database');
		$misc->printTabs('database','locks');

		$columns = array(
			'namespace' => array(
				'title' => $lang['strschema'],
				'field' => field('nspname'),
			),
			'tablename' => array(
				'title' => $lang['strtablename'],
				'field' => field('tablename'),
			),
			'vxid' => array(
				'title' => $lang['strvirtualtransaction'],
				'field' => field('virtualtransaction'),
			),
			'transactionid' => array(
				'title' => $lang['strtransaction'],
				'field' => field('transaction'),
			),
			'processid' => array(
				'title' => $lang['strprocessid'],
				'field' => field('pid'),
			),
			'mode' => array(
				'title' => $lang['strmode'],
				'field' => field('mode'),
			),
			'granted' => array(
				'title' => $lang['strislockheld'],
				'field' => field('granted'),
				'type'  => 'yesno',
			),
		);

		if (!$data->hasVirtualTransactionId()) unset($columns['vxid']);

		$actions = array();

		$misc->printTable($variables, $columns, $actions, $lang['strnodata']);
	}

	/**
	 * Allow database administration and tuning tasks
	 */
	function doAdmin($action = '', $msg = '') {
		global $data, $misc;
		global $lang;		
		switch ($action) {
			case 'vacuum':				
				$status = $data->vacuumDB('', isset($_REQUEST['vacuum_analyze']), isset($_REQUEST['vacuum_full']), isset($_REQUEST['vacuum_freeze']) );
				if ($status == 0) doAdmin('', $lang['strvacuumgood']);
				else doAdmin('', $lang['strvacuumbad']);
				break;
			case 'analyze':
				$status = $data->analyzeDB();
				if ($status == 0) doAdmin('', $lang['stranalyzegood']);
				else doAdmin('', $lang['stranalyzebad']);
				break;
			case 'recluster':
				$status = $data->recluster();
				if ($status == 0) doAdmin('', $lang['strclusteredgood']);
				else doAdmin('', $lang['strclusteredbad']);
				break;
			case 'reindex';
				$status = $data->reindex('DATABASE', $_REQUEST['database'], isset($_REQUEST['reindex_force']));
				if ($status == 0) doAdmin('', $lang['strreindexgood']);
				else doAdmin('', $lang['strreindexbad']);
				break;
			default:
				$misc->printTrail('database');
				$misc->printTabs('database','admin');
				$misc->printMsg($msg);
				
				echo "<table style=\"width: 50%\">\n";
				echo "<tr>\n";
				echo "<th class=\"data\">";
				$misc->printHelp($lang['strvacuum'],'pg.admin.vacuum')."</th>\n";
				echo "</th>";
				if ($data->hasAnalyze()){
					echo "<th class=\"data\">";
					$misc->printHelp($lang['stranalyze'],'pg.admin.analyze');
					echo "</th>";
				}
				if ($data->hasRecluster()){
					echo "<th class=\"data\">";
					$misc->printHelp($lang['strclusterindex'],'pg.index.cluster');
					echo "</th>";
				}
				echo "<th class=\"data\">";
				$misc->printHelp($lang['strreindex'],'pg.index.reindex');
				echo "</th>";
				echo "</tr>";	

				// Vacuum
				echo "<tr>\n";
				echo "<td class=\"data1\" style=\"text-align: center; vertical-align: bottom\">\n";
				echo "<form action=\"database.php\" method=\"post\">\n";
				echo "<p><input type=\"checkbox\" id=\"vacuum_analyze\" name=\"vacuum_analyze\" /><label for=\"vacuum_analyze\">{$lang['stranalyze']}</label>\n";
				if ($data->hasFullVacuum()) {
					echo "<br /><input type=\"checkbox\" id=\"vacuum_full\" name=\"vacuum_full\" /><label for=\"vacuum_full\">{$lang['strfull']}</label>\n";				
					echo "<br /><input type=\"checkbox\" id=\"vacuum_freeze\" name=\"vacuum_freeze\" /><label for=\"vacuum_freeze\">{$lang['strfreeze']}</label>\n";
				}
				echo "<input type=\"hidden\" name=\"action\" value=\"vacuum\" />\n";
				echo $misc->form;
				echo "<br /><input type=\"submit\" value=\"{$lang['strvacuum']}\" /></p>\n";
				echo "</form>\n";								
				echo "</td>\n";

				// Analyze
				if ($data->hasAnalyze()) {
					echo "<td class=\"data1\" style=\"text-align: center; vertical-align: bottom\">\n";
					echo "<form action=\"database.php\" method=\"post\">\n";
					echo "<p><input type=\"hidden\" name=\"action\" value=\"analyze\" />\n";
					echo $misc->form;
					echo "<input type=\"submit\" value=\"{$lang['stranalyze']}\" /></p>\n";
					echo "</form>\n";
					echo "</td>\n";
				}
				
				// Recluster
				if ($data->hasRecluster()){
					echo "<td class=\"data1\" style=\"text-align: center; vertical-align: bottom\">\n";
					echo "<form action=\"database.php\" method=\"post\">\n";
					echo "<p><input type=\"hidden\" name=\"action\" value=\"recluster\" />\n";
					echo $misc->form;
					echo "<input type=\"submit\" value=\"{$lang['strclusterindex']}\" /></p>\n";
					echo "</form>\n";
					echo "</td>\n";
				}
				
				// Reindex
				echo "<td class=\"data1\" style=\"text-align: center; vertical-align: bottom\">\n";
				echo "<form action=\"database.php\" method=\"post\">\n";
				echo "<p><input type=\"checkbox\" id=\"reindex_force\" name=\"reindex_force\" /><label for=\"reindex_force\">{$lang['strforce']}</label><br />\n";
				echo "<input type=\"hidden\" name=\"action\" value=\"reindex\" />\n";
				echo $misc->form;
				echo "<input type=\"submit\" value=\"{$lang['strreindex']}\" /></p>\n";
				echo "</form>\n";
				echo "</td>\n";
				echo "</tr>\n";
				echo "</table>\n";

				// Autovacuum
				if($data->hasAutovacuum()) {
					$enabled = $data->getVariable('autovacuum');
					echo "<h3>{$lang['strautovacuum']}</h3>";
					echo '<p>' . (($enabled->fields['autovacuum'] == 'on') ? $lang['strturnedon'] : $lang['strturnedoff'] ) . '</p>';
					// Fetch the processes from the database
					$autovac = $data->getAutovacuum();
		
					$columns = array(
						'namespace' => array(
							'title' => $lang['strschema'],
							'field' => field('nspname'),
						),	
						'relname' => array(
							'title' => $lang['strtable'],
							'field' => field('relname'),
						),
						'enabled' => array(
							'title' => $lang['strenabled'],
							'field' => field('enabled'),
						),
						'vac_base_thresh' => array(
							'title' => $lang['strvacuumbasethreshold'],
							'field' => field('vac_base_thresh'),
						),
						'vac_scale_factor' => array(
							'title' => $lang['strvacuumscalefactor'],
							'field' => field('vac_scale_factor'),
						),
						'anl_base_thresh' => array(
							'title' => $lang['stranalybasethreshold'],
							'field' => field('anl_base_thresh'),
						),
						'anl_scale_factor' => array(
							'title' => $lang['stranalyzescalefactor'],
							'field' => field('anl_scale_factor'),
						),
						'vac_cost_delay' => array(
							'title' => $lang['strvacuumcostdelay'],
							'field' => field('vac_cost_delay'),
						),
						'vac_cost_limit' => array(
							'title' => $lang['strvacuumcostlimit'],
							'field' => field('vac_cost_limit'),
						),
					);

					// Maybe we need to check permissions here?
					$columns['actions'] = array('title' => $lang['stractions']);

					$actions = array(
						'edit' => array(
						'title' => $lang['stredit'],
						'url'   => "database.php?action=editautovac&amp;schema=pg_catalog&amp;{$misc->href}&amp;",
						'vars'  => array('key[vacrelid]' => 'vacrelid')
						),
						'delete' => array(
						'title' => $lang['strdelete'],
						'url'   => "database.php?action=delautovac&amp;{$misc->href}&amp;",
						'vars'  => array('key[vacrelid]' => 'vacrelid')
						)
					);

					$misc->printTable($autovac, $columns, $actions, $lang['strnodata']);
				}
					
				break;
		}
	}

	/**
	 * Show confirmation of edit and perform actual update of autovacuum entry
	 */
	function doEditAutovacuum($confirm, $msg = '') {
		global $data, $misc, $conf;
		global $lang;

		$key = $_REQUEST['key'];

		if ($confirm) {
			$misc->printTrail('database');
			$misc->printTabs('database','admin');
			$misc->printMsg($msg);

			$attrs = $data->getTableAttributes('pg_autovacuum');
			$rs = $data->browseRow('pg_autovacuum', $key);
			
			echo "<form action=\"database.php\" method=\"post\" id=\"ac_form\">\n";
			$elements = 0;
			$error = true;			
			if ($rs->recordCount() == 1 && $attrs->recordCount() > 0) {
				echo "<table>\n";

				// Output table header
				echo "<tr><th class=\"data\">{$lang['strcolumn']}</th><th class=\"data\">{$lang['strtype']}</th>";
				echo "<th class=\"data\">{$lang['strformat']}</th>\n";
				echo "<th class=\"data\">{$lang['strvalue']}</th></tr>";

				$i = 0;
				$nCC = 0;
				while (!$attrs->EOF) {
					$szValueName = "values[{$attrs->fields['attname']}]";
					$szEvents = "";
					$szDivPH = "";
					
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

					echo "<td class=\"data{$id}\" id=\"aciwp{$i}\" style=\"white-space:nowrap;\">";
					echo $data->printField($szValueName, $rs->fields[$attrs->fields['attname']], $attrs->fields['type'],array(),$szEvents) . $szDivPH;
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

			echo "<input type=\"hidden\" name=\"action\" value=\"confeditautovac\" />\n";
			echo $misc->form;
			echo "<input type=\"hidden\" name=\"table\" value=\"pg_autovacuum\" />\n";
			echo "<input type=\"hidden\" name=\"key\" value=\"", htmlspecialchars(serialize($key)), "\" />\n";
			echo "<p>";
			if (!$error) echo "<input type=\"submit\" name=\"save\" value=\"{$lang['strsave']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</p>\n";
			echo "</form>\n";
		}
		else {
			if (!isset($_POST['values'])) $_POST['values'] = array();
			if (!isset($_POST['nulls'])) $_POST['nulls'] = array();
			
			$status = $data->editRow($_POST['table'], $_POST['values'], $_POST['nulls'], 
												$_POST['format'], $_POST['types'], unserialize($_POST['key']));
			if ($status == 0)
				doAdmin($lang['strrowupdated']);
			elseif ($status == -2)
				doEditAutovacuum(true, $lang['strrownotunique']);
			else
				doEditAutovacuum(true, $lang['strrowupdatedbad']);
		}

	}	


	/**
	 * Delete rows from the autovacuum table
     */
	function doDelAutovacuum($confirm) {
		global $data, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('database');
			$misc->printTabs('database','admin');
			$misc->printTitle($lang['strdeleterow']);

			echo "<p>{$lang['strconfdeleterow']}</p>\n";
			
			echo "<form action=\"database.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"confdelautovac\" />\n";
			echo $misc->form;
			echo "<input type=\"hidden\" name=\"table\" value=\"pg_autovacuum\" />\n";
			echo "<input type=\"hidden\" name=\"key\" value=\"", htmlspecialchars(serialize($_REQUEST['key'])), "\" />\n";
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\" />\n";
			echo "<input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->deleteRow($_POST['table'], unserialize($_POST['key']));
			if ($status == 0)
				doAdmin('',$lang['strrowdeleted']);
			elseif ($status == -2)
				doAdmin('',$lang['strrownotunique']);
			else			
				doAdmin('',$lang['strrowdeletedbad']);
		}
	}

	/**
	 * Allow execution of arbitrary SQL statements on a database
	 */
	function doSQL() {
		global $data, $misc;
		global $lang;

		if (!isset($_REQUEST['query'])) $_REQUEST['query'] = '';

		$misc->printTrail('database');
		$misc->printTabs('database','sql');
		echo "<p>{$lang['strentersql']}</p>\n";
		echo "<form action=\"sql.php\" method=\"post\" enctype=\"multipart/form-data\">\n";
		echo "<p>{$lang['strsql']}<br />\n";
		echo "<textarea style=\"width:100%;\" rows=\"20\" cols=\"50\" name=\"query\">",
			htmlspecialchars($_REQUEST['query']), "</textarea></p>\n";
		
		// Check that file uploads are enabled
		if (ini_get('file_uploads')) {
			// Don't show upload option if max size of uploads is zero
			$max_size = $misc->inisizeToBytes(ini_get('upload_max_filesize'));
			if (is_double($max_size) && $max_size > 0) {
				echo "<p><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"{$max_size}\" />\n";
				echo "<label for=\"script\">{$lang['struploadscript']}</label> <input id=\"script\" name=\"script\" type=\"file\" /></p>\n";
			}
		}

		echo "<p><input type=\"checkbox\" id=\"paginate\" name=\"paginate\"", (isset($_REQUEST['paginate']) ? ' checked="checked"' : ''), " /><label for=\"paginate\">{$lang['strpaginate']}</label></p>\n";
		echo "<p><input type=\"submit\" value=\"{$lang['strexecute']}\" />\n";
		echo $misc->form;
		echo "<input type=\"reset\" value=\"{$lang['strreset']}\" /></p>\n";
		echo "</form>\n";

		// Default focus
		$misc->setFocus('forms[0].query');
	}

	function doTree() {
		global $misc, $data, $lang, $slony;

		$reqvars = $misc->getRequestVars('database');

		$tabs = $misc->getNavTabs('database');
		if (!$data->hasSchemas()) {
			$tabs = array_merge($misc->getNavTabs('schema'), $tabs);
		}

		$items = $misc->adjustTabsForTree($tabs);
		
		$attrs = array(
			'text'   => noEscape(field('title')),
			'icon'   => field('icon'),
			'action' => url(field('url'),
							$reqvars,
							field('urlvars', array())
						),
			'branch' => url(field('url'),
							$reqvars,
							field('urlvars'),
							array('action' => 'tree')
						),
		);
		
		$misc->printTreeXML($items, $attrs);

		exit;
	}

	if ($action == 'tree') doTree();
	
	$misc->printHeader($lang['strschemas']);
	$misc->printBody();

	switch ($action) {
		case 'find':
			if (isset($_REQUEST['term'])) doFind(false);
			else doFind(true);
			break;
		case 'recluster':
		case 'reindex':
		case 'analyze':
		case 'vacuum':
			doAdmin($action);
			break;
		case 'admin':
			doAdmin();
			break;
		case 'sql':
			doSQL();
			break;
		case 'variables':
			doVariables();
			break;
		case 'processes':
			doProcesses();
			break;
		case 'locks':
			doLocks();
			break;
		case 'export':
			doExport();
			break;
		case 'signal':
			doSignal();
			break;
		case 'editautovac':
			doEditAutovacuum(true);
			break;
		case 'confeditautovac':
			if (isset($_POST['save'])) doEditAutovacuum(false);
			else doAdmin();
			break;
		case 'delautovac':
			doDelAutovacuum(true);
			break;
		case 'confdelautovac':
			if (isset($_POST['yes'])) doDelAutovacuum(false);
			else doAdmin();
			break;
		default:
			doSQL();
			break;
	}

	$misc->printFooter();

?>
