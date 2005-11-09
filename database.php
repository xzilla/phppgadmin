<?php

	/**
	 * Manage schemas within a database
	 *
	 * $Id: database.php,v 1.78 2005/11/09 09:05:58 jollytoad Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

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
		global $PHP_SELF, $data, $data, $misc;
		global $lang, $conf;

		if (!isset($_GET['term'])) $_GET['term'] = '';
		if (!isset($_GET['filter'])) $_GET['filter'] = '';

		$misc->printTrail('database');
		$misc->printTabs('database','find');
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"get\">\n";
		echo "<p><input name=\"term\" value=\"", htmlspecialchars($_GET['term']), 
			"\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" />\n";
		// Output list of filters.  This is complex due to all the 'has' and 'conf' feature possibilities
		echo "<select name=\"filter\">\n";
		echo "\t<option value=\"\"", ($_GET['filter'] == '') ? ' selected="selected"' : '', ">{$lang['strallobjects']}</option>\n";
		if ($data->hasSchemas())
			echo "\t<option value=\"SCHEMA\"", ($_GET['filter'] == 'SCHEMA') ? ' selected="selected"' : '', ">{$lang['strschemas']}</option>\n";
		echo "\t<option value=\"TABLE\"", ($_GET['filter'] == 'TABLE') ? ' selected="selected"' : '', ">{$lang['strtables']}</option>\n";
		echo "\t<option value=\"VIEW\"", ($_GET['filter'] == 'VIEW') ? ' selected="selected"' : '', ">{$lang['strviews']}</option>\n";
		echo "\t<option value=\"SEQUENCE\"", ($_GET['filter'] == 'SEQUENCE') ? ' selected="selected"' : '', ">{$lang['strsequences']}</option>\n";
		echo "\t<option value=\"COLUMN\"", ($_GET['filter'] == 'COLUMN') ? ' selected="selected"' : '', ">{$lang['strcolumns']}</option>\n";
		echo "\t<option value=\"RULE\"", ($_GET['filter'] == 'RULE') ? ' selected="selected"' : '', ">{$lang['strrules']}</option>\n";
		echo "\t<option value=\"INDEX\"", ($_GET['filter'] == 'INDEX') ? ' selected="selected"' : '', ">{$lang['strindexes']}</option>\n";
		echo "\t<option value=\"TRIGGER\"", ($_GET['filter'] == 'TRIGGER') ? ' selected="selected"' : '', ">{$lang['strtriggers']}</option>\n";
		echo "\t<option value=\"CONSTRAINT\"", ($_GET['filter'] == 'CONSTRAINT') ? ' selected="selected"' : '', ">{$lang['strconstraints']}</option>\n";
		echo "\t<option value=\"FUNCTION\"", ($_GET['filter'] == 'FUNCTION') ? ' selected="selected"' : '', ">{$lang['strfunctions']}</option>\n";
		if ($data->hasDomains())
			echo "\t<option value=\"DOMAIN\"", ($_GET['filter'] == 'DOMAIN') ? ' selected="selected"' : '', ">{$lang['strdomains']}</option>\n";
		if ($conf['show_advanced']) {
			echo "\t<option value=\"AGGREGATE\"", ($_GET['filter'] == 'AGGREGATE') ? ' selected="selected"' : '', ">{$lang['straggregates']}</option>\n";
			echo "\t<option value=\"TYPE\"", ($_GET['filter'] == 'TYPE') ? ' selected="selected"' : '', ">{$lang['strtypes']}</option>\n";
			echo "\t<option value=\"OPERATOR\"", ($_GET['filter'] == 'OPERATOR') ? ' selected="selected"' : '', ">{$lang['stroperators']}</option>\n";
			echo "\t<option value=\"OPCLASS\"", ($_GET['filter'] == 'OPCLASS') ? ' selected="selected"' : '', ">{$lang['stropclasses']}</option>\n";
			if ($data->hasConversions())
				echo "\t<option value=\"CONVERSION\"", ($_GET['filter'] == 'CONVERSION') ? ' selected="selected"' : '', ">{$lang['strconversions']}</option>\n";
			echo "\t<option value=\"LANGUAGE\"", ($_GET['filter'] == 'LANGUAGE') ? ' selected="selected"' : '', ">{$lang['strlanguages']}</option>\n";
		}
		echo "</select>\n";
		echo "<input type=\"submit\" value=\"{$lang['strfind']}\" />\n";
		echo $misc->form;
		echo "<input type=\"hidden\" name=\"action\" value=\"find\" />\n";
		echo "</form>\n";
		
		// Default focus
		$misc->setFocus('forms[0].term');

		// If a search term has been specified, then perform the search
		// and display the results, grouped by object type
		if ($_GET['term'] != '') {
			$rs = $data->findObject($_GET['term'], $_GET['filter']);
			if ($rs->recordCount() > 0) {
				$curr = '';
				while (!$rs->EOF) {
					// Output a new header if the current type has changed, but not if it's just changed the rule type
					if ($rs->f['type'] != $curr) {
						// Short-circuit in the case of changing from table rules to view rules; table cols to view cols;
						// table constraints to domain constraints
						if ($rs->f['type'] == 'RULEVIEW' && $curr == 'RULETABLE') {
							$curr = $rs->f['type'];
						}
						elseif ($rs->f['type'] == 'COLUMNVIEW' && $curr == 'COLUMNTABLE') {
							$curr = $rs->f['type'];
						}
						elseif ($rs->f['type'] == 'CONSTRAINTTABLE' && $curr == 'CONSTRAINTDOMAIN') {
							$curr = $rs->f['type'];
						}
						else {
							if ($curr != '') echo "</ul>\n";
							$curr = $rs->f['type'];
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
						$prefix = $rs->f['schemaname'] . '.';
					else
						$prefix = '';
						
					switch ($curr) {
						case 'SCHEMA':						
							echo "<li><a href=\"database.php?{$misc->href}\">", _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'TABLE':
							echo "<li><a href=\"tblproperties.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;table=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'VIEW':
							echo "<li><a href=\"views.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;view=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'SEQUENCE':
							echo "<li><a href=\"sequences.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), 
								"&amp;sequence=", urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'COLUMNTABLE':
							echo "<li><a href=\"tblproperties.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;table=", 
								urlencode($rs->f['relname']), "&amp;column=", urlencode($rs->f['name']), "&amp;action=properties\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'COLUMNVIEW':
							echo "<li><a href=\"viewproperties.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;view=", 
								urlencode($rs->f['relname']), "&amp;column=", urlencode($rs->f['name']), "&amp;action=properties\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'INDEX':
							echo "<li><a href=\"indexes.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;table=", 
								urlencode($rs->f['relname']), "\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'CONSTRAINTTABLE':
							echo "<li><a href=\"constraints.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;table=", 
								urlencode($rs->f['relname']), "\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'CONSTRAINTDOMAIN':
							echo "<li><a href=\"domains.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;domain=", 
								urlencode($rs->f['relname']), "\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'TRIGGER':
							echo "<li><a href=\"triggers.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;table=", 
								urlencode($rs->f['relname']), "\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'RULETABLE':
							echo "<li><a href=\"rules.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;reltype=table&amp;relation=", 
								urlencode($rs->f['relname']), "\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'RULEVIEW':
							echo "<li><a href=\"rules.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;reltype=view&amp;relation=", 
								urlencode($rs->f['relname']), "\">", 
								$misc->printVal($prefix), $misc->printVal($rs->f['relname']), '.', _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'FUNCTION':
							echo "<li><a href=\"functions.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;function=", 
								urlencode($rs->f['name']), "&amp;function_oid=", urlencode($rs->f['oid']), "\">", 
								$misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'TYPE':
							echo "<li><a href=\"types.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;type=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'DOMAIN':
							echo "<li><a href=\"domains.php?action=properties&amp;{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;domain=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'OPERATOR':
							echo "<li><a href=\"operators.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "&amp;operator=", 
								urlencode($rs->f['name']), "\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'CONVERSION':
							echo "<li><a href=\"conversions.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), 
								"\">", $misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'LANGUAGE':
							echo "<li><a href=\"languages.php?{$misc->href}\">", _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'AGGREGATE':
							echo "<li><a href=\"aggregates.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "\">",
								$misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
							break;
						case 'OPCLASS':
							echo "<li><a href=\"opclasses.php?{$misc->href}&amp;schema=", urlencode($rs->f['schemaname']), "\">",
								$misc->printVal($prefix), _highlight($misc->printVal($rs->f['name']), $_GET['term']), "</a></li>\n";
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
		global $PHP_SELF, $lang;

		$misc->printTrail('database');
		$misc->printTabs('database','export');
		$misc->printMsg($msg);

		echo "<form action=\"dbexport.php\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=\"data\">{$lang['strformat']}</th><th class=\"data\" colspan=\"2\">{$lang['stroptions']}</th></tr>\n";
		// Data only
		echo "<tr><th class=\"data left\" rowspan=\"2\">";
		echo "<input type=\"radio\" name=\"what\" value=\"dataonly\" checked=\"checked\" />{$lang['strdataonly']}</th>\n";
		echo "<td>{$lang['strformat']}</td>\n";
		echo "<td><select name=\"d_format\">\n";
		echo "<option value=\"copy\">COPY</option>\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		echo "<td>{$lang['stroids']}</td><td><input type=\"checkbox\" name=\"d_oids\" /></td>\n</tr>\n";
		// Structure only
		echo "<tr><th class=\"data left\"><input type=\"radio\" name=\"what\" value=\"structureonly\" />{$lang['strstructureonly']}</th>\n";
		echo "<td>{$lang['strdrop']}</td><td><input type=\"checkbox\" name=\"s_clean\" /></td>\n</tr>\n";
		// Structure and data
		echo "<tr><th class=\"data left\" rowspan=\"3\">";
		echo "<input type=\"radio\" name=\"what\" value=\"structureanddata\" />{$lang['strstructureanddata']}</th>\n";
		echo "<td>{$lang['strformat']}</td>\n";
		echo "<td><select name=\"sd_format\">\n";
		echo "<option value=\"copy\">COPY</option>\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "</select>\n</td>\n</tr>\n";
		echo "<td>{$lang['strdrop']}</td><td><input type=\"checkbox\" name=\"sd_clean\" /></td>\n</tr>\n";
		echo "<td>{$lang['stroids']}</td><td><input type=\"checkbox\" name=\"sd_oids\" /></td>\n</tr>\n";
		echo "</table>\n";
		
		echo "<h3>{$lang['stroptions']}</h3>\n";
		echo "<p><input type=\"radio\" name=\"output\" value=\"show\" checked=\"checked\" />{$lang['strshow']}\n";
		echo "<br/><input type=\"radio\" name=\"output\" value=\"download\" />{$lang['strdownload']}\n";
		// MSIE cannot download gzip in SSL mode - it's just broken
		if (!(strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE') && isset($_SERVER['HTTPS']))) {
			echo "<br /><input type=\"radio\" name=\"output\" value=\"gzipped\" />{$lang['strdownloadgzipped']}\n";
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
		global $PHP_SELF, $data, $misc;
		global $lang;

		// Fetch the variables from the database
		$variables = $data->getVariables();
		
		$misc->printTrail('database');
		$misc->printTabs('database','variables');

		$columns = array(
			'variable' => array(
				'title' => $lang['strname'],
				'field' => 'name',
			),
			'value' => array(
				'title' => $lang['strsetting'],
				'field' => 'setting',
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
		global $PHP_SELF, $data, $misc;
		global $lang;

		// Fetch the processes from the database
		$processes = $data->getProcesses($_REQUEST['database']);
		
		$misc->printTrail('database');
		$misc->printTabs('database','processes');
		$misc->printMsg($msg);
		
		$columns = array(
			'user' => array(
				'title' => $lang['strusername'],
				'field' => 'usename',
			),
			'process' => array(
				'title' => $lang['strprocess'],
				'field' => 'procpid',
			),
			'query' => array(
				'title' => $lang['strsql'],
				'field' => 'current_query',
			),
			'start_time' => array(
				'title' => $lang['strstarttime'],
				'field' => 'query_start',
			),
		);

		if ($data->hasSignals()) {
			$columns['actions'] = array('title' => $lang['stractions']);
			
			$actions = array(
				'cancel' => array(
					'title' => $lang['strcancel'],
					'url'   => "{$PHP_SELF}?action=signal&amp;signal=CANCEL&amp;{$misc->href}&amp;",
					'vars'  => array('procpid' => 'procpid')
				)
			);
		}
		else $actions = array();
		
		// Remove query start time for <7.4
		if (!isset($processes->f['query_start'])) unset($columns['start_time']);
		
		$misc->printTable($processes, $columns, $actions, $lang['strnodata']);
	}

	/**
	 * Allow database administration and tuning tasks
	 */
	function doAdmin($action = '', $msg = '') {
		global $PHP_SELF, $data, $misc;
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
				
				// Vacuum
				echo "<form name=\"adminfrm\" id=\"adminfrm\" action=\"{$PHP_SELF}\" method=\"post\">\n";
				echo "<h3>";
				$misc->printHelp($lang['strvacuum'],'pg.admin.vacuum');
				echo "</h3>\n";
				echo "<input type=\"checkbox\" id=\"vacuum_analyze\" name=\"vacuum_analyze\" />{$lang['stranalyze']}<br />\n";
				if ($data->hasFullVacuum()) {
					echo "<input type=\"checkbox\" id=\"vacuum_full\" name=\"vacuum_full\" />{$lang['strfull']}<br />\n";				
					echo "<input type=\"checkbox\" id=\"vacuum_freeze\" name=\"vacuum_freeze\" />{$lang['strfreeze']}<br />\n";
				}
				echo "<input type=\"submit\" value=\"{$lang['strvacuum']}\" />\n";
				echo "<input type=\"hidden\" name=\"action\" value=\"vacuum\" />\n";
				echo $misc->form;
				echo "</form>\n";								

				// Analyze
				echo "<form name=\"adminfrm\" id=\"adminfrm\" action=\"{$PHP_SELF}\" method=\"post\">\n";
				echo "<h3>";
				$misc->printHelp($lang['stranalyze'],'pg.admin.analyze');
				echo "</h3>\n";
				echo "<input type=\"submit\" value=\"{$lang['stranalyze']}\" />\n";
				echo "<input type=\"hidden\" name=\"action\" value=\"analyze\" />\n";
				echo $misc->form;
				echo "</form>\n";
				
				// Recluster
				if ($data->hasRecluster()){
					echo "<form name=\"adminfrm\" id=\"adminfrm\" action=\"{$PHP_SELF}\" method=\"post\">\n";
					echo "<h3>";
					$misc->printHelp($lang['strclusterindex'],'pg.index.cluster');
					echo "</h3>\n";
					echo "<input type=\"submit\" value=\"{$lang['strclusterindex']}\" />\n";
					echo "<input type=\"hidden\" name=\"action\" value=\"recluster\" />\n";
					echo $misc->form;
					echo "</form>\n";
				}
				
				// Reindex
				echo "<form name=\"adminfrm\" id=\"adminfrm\" action=\"{$PHP_SELF}\" method=\"post\">\n";
				echo "<h3>";
				$misc->printHelp($lang['strreindex'],'pg.index.reindex');
				echo "</h3>\n";
				echo "<input type=\"checkbox\" id=\"reindex_force\" name=\"reindex_force\" />{$lang['strforce']}<br />\n";
				echo "<input type=\"submit\" value=\"{$lang['strreindex']}\" />\n";
				echo "<input type=\"hidden\" name=\"action\" value=\"reindex\" />\n";
				echo $misc->form;
				echo "</form>\n";
				break;
		}
	}

	/**
	 * Allow execution of arbitrary SQL statements on a database
	 */
	function doSQL() {
		global $PHP_SELF, $data, $misc;
		global $lang;

		if (!isset($_REQUEST['query'])) $_REQUEST['query'] = '';

		$misc->printTrail('database');
		$misc->printTabs('database','sql');

		echo "<p>{$lang['strentersql']}</p>\n";
		echo "<form action=\"sql.php\" method=\"post\" enctype=\"multipart/form-data\">\n";
		echo "<p>{$lang['strsql']}<br />\n";
		echo "<textarea style=\"width:100%;\" rows=\"20\" cols=\"50\" name=\"query\">",
			htmlspecialchars($_REQUEST['query']), "</textarea>\n";
		
		// Check that file uploads are enabled
		if (ini_get('file_uploads')) {
			// Don't show upload option if max size of uploads is zero
			$max_size = $misc->inisizeToBytes(ini_get('upload_max_filesize'));
			if (is_double($max_size) && $max_size > 0) {
				echo "<br /><br /><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"{$max_size}\" />\n";
				echo " {$lang['struploadscript']} <input name=\"script\" type=\"file\" /></p>\n";
			}
		}
		else echo "</p>\n";

		echo "<input type=\"checkbox\" name=\"paginate\"", (isset($_REQUEST['paginate']) ? ' checked="checked"' : ''), " /> {$lang['strpaginate']}\n";
		echo "<br />\n";
		echo "<p><input type=\"submit\" value=\"{$lang['strrun']}\" />\n";
		if ($data->hasFullExplain()) {
			echo "<input type=\"submit\" name=\"explain\" value=\"{$lang['strexplain']}\" />\n";
			echo "<input type=\"submit\" name=\"explain_analyze\" value=\"{$lang['strexplainanalyze']}\" />\n";
		}
		echo "<input type=\"reset\" value=\"{$lang['strreset']}\" /></p>\n";

		echo $misc->form;

		echo "</form>\n";

		// Default focus
		$misc->setFocus('forms[0].query');
	}

	function doTree() {
		global $misc, $data, $lang, $PHP_SELF, $slony;

		$reqvars = $misc->getRequestVars('database');

		$tabs = $misc->getNavTabs('database');

		$items = $misc->adjustTabsForTree($tabs);
		
		$attrs = array(
			'text'   => noEscape(field('title')),
			'icon'   => field('icon', 'folder'),
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
			if (isset($_GET['term'])) doFind(false);
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
		case 'export':
			doExport();
			break;
		case 'signal':
			doSignal();
			break;
		default:
			doSQL();
			break;
	}

	$misc->printFooter();

?>
