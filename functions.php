<?php

	/**
	 * Manage functions in a database
	 *
	 * $Id: functions.php,v 1.52 2005/10/18 03:45:16 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];
	
	/** 
	 * Function to save after editing a function
	 */
	function doSaveEdit() {
		global $data, $lang;
		
		$fnlang = strtolower($_POST['original_lang']);
		
		if ($fnlang == 'c') {
			$def = array($_POST['formObjectFile'], $_POST['formLinkSymbol']);
		} else if ($fnlang == 'internal'){
			$def = $_POST['formLinkSymbol'];
		} else {
			$def = $_POST['formDefinition'];
		}
		
		$status = $data->setFunction($_POST['function_oid'], $_POST['original_function'], $_POST['formFunction'], 
										$_POST['original_arguments'], 
										$_POST['original_returns'], $def,
										$_POST['original_lang'], $_POST['formProperties'], 
										isset($_POST['original_setof']), $_POST['formComment']);
		if ($status == 0)
			doProperties($lang['strfunctionupdated']);
		else
			doEdit($lang['strfunctionupdatedbad']);
	}
	
	/**
	 * Function to allow editing of a Function
	 */
	function doEdit($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('function');
		$misc->printTitle($lang['stralter'],'pg.function.alter');
		$misc->printMsg($msg);

		$fndata = $data->getFunction($_REQUEST['function_oid']);

		if ($fndata->recordCount() > 0) {
			$fndata->f['proretset'] = $data->phpBool($fndata->f['proretset']);

			// Initialise variables
			if (!isset($_POST['formDefinition'])) $_POST['formDefinition'] = $fndata->f['prosrc'];
			if (!isset($_POST['formProperties'])) $_POST['formProperties'] = $data->getFunctionProperties($fndata->f);
			if (!isset($_POST['formFunction'])) $_POST['formFunction'] = $fndata->f['proname'];
			if (!isset($_POST['formComment'])) $_POST['formComment'] = $fndata->f['procomment'];
			if (!isset($_POST['formObjectFile'])) $_POST['formObjectFile'] = $fndata->f['probin'];
			if (!isset($_POST['formLinkSymbol'])) $_POST['formLinkSymbol'] = $fndata->f['prosrc'];

			// Deal with named parameters
			if ($data->hasNamedParams()) {
				$args_arr = explode(', ', $fndata->f['proarguments']);
				$names_arr = $data->phpArray($fndata->f['proargnames']);
				$args = '';
				$i = 0;
				for ($i = 0; $i < sizeof($args_arr); $i++) {
					if ($i != 0) $args .= ', ';
					if (isset($names_arr[$i]) && $names_arr[$i] != '') {
						$data->fieldClean($names_arr[$i]);					
						$args .= '"' . $names_arr[$i] . '" ';
					}
					$args .= $args_arr[$i];
				}
			}
			else {
				$args = $fndata->f['proarguments'];
			}

			$func_full = $fndata->f['proname'] . "(". $fndata->f['proarguments'] .")";
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table width=\"90%\">\n";
			echo "<tr>\n";
			echo "<th class=\"data required\">{$lang['strfunction']}</th>\n";
			echo "<th class=\"data\">{$lang['strarguments']}</th>\n";
			echo "<th class=\"data required\">{$lang['strreturns']}</th>\n";
			echo "<th class=\"data required\">{$lang['strproglanguage']}</th>\n";
			echo "</tr>\n";
				

			echo "<tr>\n";
			echo "<td class=\"data1\">";
			echo "<input type=\"hidden\" name=\"original_function\" value=\"", htmlspecialchars($fndata->f['proname']),"\" />\n"; 
			echo "<input name=\"formFunction\" style=\"width: 100%\" maxlength=\"{$data->_maxNameLen}\" value=\"", htmlspecialchars($_POST['formFunction']), "\" />";
			echo "</td>\n";

			echo "<td class=\"data1\">", $misc->printVal($args), "\n";
			echo "<input type=\"hidden\" name=\"original_arguments\" value=\"",htmlspecialchars($args),"\" />\n"; 
			echo "</td>\n";

			echo "<td class=\"data1\">";
			if ($fndata->f['proretset']) echo "setof ";
			echo $misc->printVal($fndata->f['proresult']), "\n";
			echo "<input type=\"hidden\" name=\"original_returns\" value=\"", htmlspecialchars($fndata->f['proresult']), "\" />\n"; 
			if ($fndata->f['proretset'])
				echo "<input type=\"hidden\" name=\"original_setof\" value=\"yes\" />\n"; 
			echo "</td>\n";

			echo "<td class=\"data1\">", $misc->printVal($fndata->f['prolanguage']), "\n";
			echo "<input type=\"hidden\" name=\"original_lang\" value=\"", htmlspecialchars($fndata->f['prolanguage']), "\" />\n"; 
			echo "</td>\n";
			
			$fnlang = strtolower($fndata->f['prolanguage']);
			if ($fnlang == 'c') {
				echo "<tr><th class=\"data required\" colspan=\"2\">{$lang['strobjectfile']}</th>\n";
				echo "<th class=\"data\" colspan=\"2\">{$lang['strlinksymbol']}</th></tr>\n";
				echo "<tr><td class=\"data1\" colspan=\"2\"><input type=\"text\" name=\"formObjectFile\" style=\"width:100%\" value=\"",
					htmlspecialchars($_POST['formObjectFile']), "\" /></td>\n";
				echo "<td class=\"data1\" colspan=\"2\"><input type=\"text\" name=\"formLinkSymbol\" style=\"width:100%\" value=\"",
					htmlspecialchars($_POST['formLinkSymbol']), "\" /></td></tr>\n";
			} else if ($fnlang == 'internal') {
				echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strlinksymbol']}</th></tr>\n";
				echo "<tr><td class=\"data1\" colspan=\"4\"><input type=\"text\" name=\"formLinkSymbol\" style=\"width:100%\" value=\"",
					htmlspecialchars($_POST['formLinkSymbol']), "\" /></td></tr>\n";
			} else {
				echo "<tr><th class=\"data required\" colspan=\"4\">{$lang['strdefinition']}</th></tr>\n";
				echo "<tr><td class=\"data1\" colspan=\"4\"><textarea style=\"width:100%;\" rows=\"20\" cols=\"50\" name=\"formDefinition\" wrap=\"virtual\">", 
					htmlspecialchars($_POST['formDefinition']), "</textarea></td></tr>\n";
			}
			
			// Display function comment
			echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strcomment']}</th></tr>\n";
			echo "<tr><td class=\"data1\" colspan=\"4\"><textarea style=\"width:100%;\" name=\"formComment\" rows=\"3\" cols=\"50\" wrap=\"virtual\">", 
					htmlspecialchars($_POST['formComment']), "</textarea></td></tr>\n";
			// Display function properies
			if (is_array($data->funcprops) && sizeof($data->funcprops) > 0) {
				echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strproperties']}</th></tr>\n";
				echo "<tr><td class=\"data1\" colspan=\"4\">\n";
				$i = 0;
				foreach ($data->funcprops as $k => $v) {
					echo "<select name=\"formProperties[{$i}]\">\n";
					foreach ($v as $p) {
						echo "<option value=\"", htmlspecialchars($p), "\"", 
							($p == $_POST['formProperties'][$i]) ? ' selected="selected"' : '', 
							">", $misc->printVal($p), "</option>\n";
					}
					echo "</select><br />\n";
					$i++;
				}
				echo "</td></tr>\n";
			}		
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"save_edit\" />\n";
			echo "<input type=\"hidden\" name=\"function\" value=\"", htmlspecialchars($_REQUEST['function']), "\" />\n";
			echo "<input type=\"hidden\" name=\"function_oid\" value=\"", htmlspecialchars($_REQUEST['function_oid']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" value=\"{$lang['stralter']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}

	/**
	 * Show read only properties of a function
	 */
	function doProperties($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('function');
		$misc->printTitle($lang['strproperties'],'pg.function');
		$misc->printMsg($msg);
		
		$funcdata = $data->getFunction($_REQUEST['function_oid']);
		
		if ($funcdata->recordCount() > 0) {
			// Deal with named parameters
			if ($data->hasNamedParams()) {
				$args_arr = explode(', ', $funcdata->f['proarguments']);
				$names_arr = $data->phpArray($funcdata->f['proargnames']);
				$args = '';
				$i = 0;
				for ($i = 0; $i < sizeof($args_arr); $i++) {
					if ($i != 0) $args .= ', ';
					if (isset($names_arr[$i]) && $names_arr[$i] != '') {
						$data->fieldClean($names_arr[$i]);					
						$args .= '"' . $names_arr[$i] . '" ';
					}
					$args .= $args_arr[$i];
				}
			}
			else {
				$args = $funcdata->f['proarguments'];
			}

			// Show comment if any
			if ($funcdata->f['procomment'] !== null)
				echo "<p class=\"comment\">", $misc->printVal($funcdata->f['procomment']), "</p>\n";

			$funcdata->f['proretset'] = $data->phpBool($funcdata->f['proretset']);
			$func_full = $funcdata->f['proname'] . "(". $funcdata->f['proarguments'] .")";
			echo "<table width=\"90%\">\n";
			echo "<tr><th class=\"data\">{$lang['strfunction']}</th>\n";
			echo "<th class=\"data\">{$lang['strarguments']}</th>\n";
			echo "<th class=\"data\">{$lang['strreturns']}</th>\n";
			echo "<th class=\"data\">{$lang['strproglanguage']}</th></tr>\n";
			echo "<tr><td class=\"data1\">", $misc->printVal($funcdata->f['proname']), "</td>\n";
			echo "<td class=\"data1\">", $misc->printVal($args), "</td>\n";
			echo "<td class=\"data1\">";
			if ($funcdata->f['proretset']) echo "setof ";			
			echo $misc->printVal($funcdata->f['proresult']), "</td>\n";
			echo "<td class=\"data1\">", $misc->printVal($funcdata->f['prolanguage']), "</td></tr>\n";
			
			$fnlang = strtolower($funcdata->f['prolanguage']);
			if ($fnlang == 'c') {
				echo "<tr><th class=\"data\" colspan=\"2\">{$lang['strobjectfile']}</th>\n";
				echo "<th class=\"data\" colspan=\"2\">{$lang['strlinksymbol']}</th></tr>\n";
				echo "<tr><td class=\"data1\" colspan=\"2\">", $misc->printVal($funcdata->f['probin']), "</td>\n";
				echo "<td class=\"data1\" colspan=\"2\">", $misc->printVal($funcdata->f['prosrc']), "</td></tr>\n";
			} else if ($fnlang == 'internal') {
				echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strlinksymbol']}</th></tr>\n";
				echo "<tr><td class=\"data1\" colspan=\"4\">", $misc->printVal($funcdata->f['prosrc']), "</td></tr>\n";
			} else {
				include_once('./libraries/highlight.php');		
				echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strdefinition']}</th></tr>\n";
				// Check to see if we have syntax highlighting for this language
				if (isset($data->langmap[$funcdata->f['prolanguage']])) {
					$temp = syntax_highlight(htmlspecialchars($funcdata->f['prosrc']), $data->langmap[$funcdata->f['prolanguage']]);
					$tag = 'prenoescape';
				}
				else {
					$temp = $funcdata->f['prosrc'];
					$tag = 'pre';
				}
				echo "<tr><td class=\"data1\" colspan=\"4\">", $misc->printVal($temp, $tag, array('lineno' => true, 'class' => 'data1')), "</td></tr>\n";
			}
			
			// Show flags
			if (is_array($data->funcprops) && sizeof($data->funcprops) > 0) {
				// Fetch an array of the function properties
				$funcprops = $data->getFunctionProperties($funcdata->f);
				echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strproperties']}</th></tr>\n";
				echo "<tr><td class=\"data1\" colspan=\"4\">\n";
				foreach ($funcprops as $v) {
					echo $misc->printVal($v), "<br />\n";
				}
				echo "</td></tr>\n";
			}		
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowallfunctions']}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=edit&amp;{$misc->href}&amp;function=", 
			urlencode($_REQUEST['function']), "&amp;function_oid=", urlencode($_REQUEST['function_oid']), "\">{$lang['stralter']}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=confirm_drop&amp;{$misc->href}&amp;function=",
			urlencode($func_full), "&amp;function_oid=", $_REQUEST['function_oid'], "\">{$lang['strdrop']}</a>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			$misc->printTrail('schema');
			$misc->printTitle($lang['strdrop'],'pg.function.drop');
			
			echo "<p>", sprintf($lang['strconfdropfunction'], $misc->printVal($_REQUEST['function'])), "</p>\n";	
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"function\" value=\"", htmlspecialchars($_REQUEST['function']), "\" />\n";
			echo "<input type=\"hidden\" name=\"function_oid\" value=\"", htmlspecialchars($_REQUEST['function_oid']), "\" />\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($data->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\" /> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $data->dropFunction($_POST['function_oid'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strfunctiondropped']);
			else
				doDefault($lang['strfunctiondroppedbad']);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new function
	 */
	function doCreate($msg = '') {
		global $data, $misc;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('schema');
		
		if (!isset($_POST['formFunction'])) $_POST['formFunction'] = '';
		if (!isset($_POST['formArguments'])) $_POST['formArguments'] = '';
		if (!isset($_POST['formReturns'])) $_POST['formReturns'] = '';
		if (!isset($_POST['formLanguage'])) $_POST['formLanguage'] = isset($_REQUEST['language']) ? $_REQUEST['language'] : 'sql';
		if (!isset($_POST['formDefinition'])) $_POST['formDefinition'] = '';
		if (!isset($_POST['formObjectFile'])) $_POST['formObjectFile'] = '';
		if (!isset($_POST['formLinkSymbol'])) $_POST['formLinkSymbol'] = '';
		if (!isset($_POST['formProperties'])) $_POST['formProperties'] = $data->defaultprops;
		if (!isset($_POST['formSetOf'])) $_POST['formSetOf'] = '';
		if (!isset($_POST['formArray'])) $_POST['formArray'] = '';

		$types = $data->getTypes(true, true, true);
		$langs = $data->getLanguages(true);
		$fnlang = strtolower($_POST['formLanguage']);

		switch ($fnlang) {
			case 'c':
				$misc->printTitle($lang['strcreatecfunction'],'pg.function.create.c');
				break;
			case 'internal':
				$misc->printTitle($lang['strcreateinternalfunction'],'pg.function.create.internal');
				break;
			default:
				$misc->printTitle($lang['strcreateplfunction'],'pg.function.create.pl');
				break;
		}
		$misc->printMsg($msg);

		echo "<form action=\"$PHP_SELF\" method=post>\n";
		echo "<table>\n";
		echo "<tr><th class=\"data required\">{$lang['strname']}</th>\n";
		echo "<th class=\"data\">{$lang['strarguments']}</th>\n";
		echo "<th class=\"data required\">{$lang['strreturns']}</th>\n";
		echo "<th class=\"data required\">{$lang['strproglanguage']}</th></tr>\n";

		echo "<tr><td class=\"data1\"><input name=\"formFunction\" size=\"16\" maxlength=\"{$data->_maxNameLen}\" value=\"",
			htmlspecialchars($_POST['formFunction']), "\" /></td>\n";

		echo "<td class=\"data1\"><input name=\"formArguments\" style=\"width:100%;\" size=\"16\" value=\"",
			htmlspecialchars($_POST['formArguments']), "\" /></td>\n";

		echo "<td class=\"data1\">\n";
		// Output setof option
		echo "<select name=\"formSetOf\">\n";
		echo '<option value=""', ($_POST['formSetOf'] == '') ? ' selected="selected"' : '', "></option>\n";
		echo '<option value="SETOF"', ($_POST['formSetOf'] == 'SETOF') ? ' selected="selected"' : '', ">SETOF</option>\n";
		echo "</select>\n";

		// Output return type list		
		echo "<select name=\"formReturns\">\n";
		while (!$types->EOF) {
			echo "<option value=\"", htmlspecialchars($types->f['typname']), "\"", 
				($types->f['typname'] == $_POST['formReturns']) ? ' selected="selected"' : '', ">",
				$misc->printVal($types->f['typname']), "</option>\n";
			$types->moveNext();
		}
		echo "</select>\n";
		
		// Output array type selector
		echo "<select name=\"formArray\">\n";
		echo "<option value=\"\"", ($_POST['formArray'] == '') ? ' selected="selected"' : '', "></option>\n";
		echo "<option value=\"[]\"", ($_POST['formArray'] == '[]') ? ' selected="selected"' : '', ">[ ]</option>\n";
		echo "</select></td>\n";

		// Output language
		echo "<td class=\"data1\">";
		if ($fnlang == 'c' || $fnlang == 'internal') echo $_POST['formLanguage'], "<input type=\"hidden\" name=\"formLanguage\" value=\"{$_POST['formLanguage']}\" />";
		else {
			echo "<select name=\"formLanguage\">\n";
			while (!$langs->EOF) {
				if (strtolower($langs->f['lanname']) != 'c' && strtolower($langs->f['lanname']) != 'internal')
					echo "<option value=\"", htmlspecialchars($langs->f['lanname']), "\"",
						($langs->f['lanname'] == $_POST['formLanguage']) ? ' selected="selected"' : '', ">",
						$misc->printVal($langs->f['lanname']), "</option>\n";
				$langs->moveNext();
			}
			echo "</select>\n";
		}
		echo "</td></tr>\n";
		
		if ($fnlang == 'c') {
			echo "<tr><th class=\"data required\" colspan=\"2\">{$lang['strobjectfile']}</th>\n";
			echo "<th class=\"data\" colspan=\"2\">{$lang['strlinksymbol']}</th></tr>\n";
			echo "<tr><td class=\"data1\" colspan=\"2\"><input type=\"text\" name=\"formObjectFile\" style=\"width:100%\" value=\"",
				htmlspecialchars($_POST['formObjectFile']), "\" /></td>\n";
			echo "<td class=\"data1\" colspan=\"2\"><input type=\"text\" name=\"formLinkSymbol\" style=\"width:100%\" value=\"",
				htmlspecialchars($_POST['formLinkSymbol']), "\" /></td></tr>\n";
		} else if ($fnlang == 'internal') {
			echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strlinksymbol']}</th></tr>\n";
			echo "<td class=\"data1\" colspan=\"4\"><input type=\"text\" name=\"formLinkSymbol\" style=\"width:100%\" value=\"",
				htmlspecialchars($_POST['formLinkSymbol']), "\" /></td></tr>\n";
		} else {
			echo "<tr><th class=\"data required\" colspan=\"4\">{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=\"data1\" colspan=\"4\"><textarea style=\"width:100%;\" rows=\"20\" cols=\"50\" name=\"formDefinition\" wrap=\"virtual\">", 
				htmlspecialchars($_POST['formDefinition']), "</textarea></td></tr>\n";
		}
		
		// Display function properies
		if (is_array($data->funcprops) && sizeof($data->funcprops) > 0) {
			echo "<tr><th class=\"data\" colspan=\"4\">{$lang['strproperties']}</th></tr>\n";
			echo "<tr><td class=\"data1\" colspan=\"4\">\n";
			$i = 0;
			foreach ($data->funcprops as $k => $v) {
				echo "<select name=\"formProperties[{$i}]\">\n";
				foreach ($v as $p) {
					echo "<option value=\"", htmlspecialchars($p), "\"", 
						($p == $_POST['formProperties'][$i]) ? ' selected="selected"' : '', 
						">", $misc->printVal($p), "</option>\n";
				}
				echo "</select><br />\n";
				$i++;
			}
			echo "</td></tr>\n";
		}		
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo $misc->form;
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "</form>\n";
	}
	
	/**
	 * Actually creates the new function in the database
	 */
	function doSaveCreate() {
		global $data, $lang;
		
		$fnlang = strtolower($_POST['formLanguage']);
		
		if ($fnlang == 'c') {
			$def = array($_POST['formObjectFile'], $_POST['formLinkSymbol']);
		} else if ($fnlang == 'internal'){
			$def = $_POST['formLinkSymbol'];
		} else {
			$def = $_POST['formDefinition'];
		}

		// Check that they've given a name and a definition
		if ($_POST['formFunction'] == '') doCreate($lang['strfunctionneedsname']);
		elseif ($fnlang != 'internal' && !$def) doCreate($lang['strfunctionneedsdef']);
		else {
			// Append array symbol to type if chosen
			$status = $data->createFunction($_POST['formFunction'], $_POST['formArguments'] , 
					$_POST['formReturns'] . $_POST['formArray'] , $def , $_POST['formLanguage'], 
					$_POST['formProperties'], $_POST['formSetOf'] == 'SETOF', false);
			if ($status == 0)
				doDefault($lang['strfunctioncreated']);
			else
				doCreate($lang['strfunctioncreatedbad']);
		}
	}	

	/**
	 * Show default list of functions in the database
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc, $func;
		global $PHP_SELF, $lang;
		
		$misc->printTrail('schema');
		$misc->printTabs('schema','functions');
		$misc->printMsg($msg);
		
		$funcs = $data->getFunctions();
		
		$columns = array(
			'function' => array(
				'title' => $lang['strfunction'],
				'field' => 'proproto',
				'type'  => 'verbatim',
			),
			'returns' => array(
				'title' => $lang['strreturns'],
				'field' => 'proreturns',
				'type'  => 'verbatim',
			),
			'owner' => array(
				'title' => $lang['strowner'],
				'field' => 'proowner',
			),
			'proglanguage' => array(
				'title' => $lang['strproglanguage'],
				'field' => 'prolanguage',
			),
			'actions' => array(
				'title' => $lang['stractions'],
			),
			'comment' => array(
				'title' => $lang['strcomment'],
				'field' => 'procomment',
			),
		);
		
		$actions = array(
			'properties' => array(
				'title' => $lang['strproperties'],
				'url'   => "redirect.php?subject=function&amp;action=properties&amp;{$misc->href}&amp;",
				'vars'  => array('function' => 'proproto', 'function_oid' => 'prooid'),
			),
			'alter' => array(
				'title' => $lang['stralter'],
				'url'   => "{$PHP_SELF}?action=edit&amp;{$misc->href}&amp;",
				'vars'  => array('function' => 'proproto', 'function_oid' => 'prooid'),
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "{$PHP_SELF}?action=confirm_drop&amp;{$misc->href}&amp;",
				'vars'  => array('function' => 'proproto', 'function_oid' => 'prooid'),
			),
			'privileges' => array(
				'title' => $lang['strprivileges'],
				'url'   => "privileges.php?{$misc->href}&amp;subject=function&amp;",
				'vars'  => array('function' => 'proproto', 'function_oid' => 'prooid'),
			),
		);

		if ( !$data->hasFuncPrivs() ) {
			unset($actions['privileges']);
		}
		
		$misc->printTable($funcs, $columns, $actions, $lang['strnofunctions']);

		echo "<p><a class=\"navlink\" href=\"{$PHP_SELF}?action=create&amp;{$misc->href}\">{$lang['strcreateplfunction']}</a> | ";
		echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=create&amp;language=internal&amp;{$misc->href}\">{$lang['strcreateinternalfunction']}</a> | ";
		echo "<a class=\"navlink\" href=\"{$PHP_SELF}?action=create&amp;language=C&amp;{$misc->href}\">{$lang['strcreatecfunction']}</a></p>\n";
	}
	
	/**
	 * Generate XML for the browser tree.
	 */
	function doTree() {
		global $misc, $data;
		
		$funcs = $data->getFunctions();
		
		$proto = concat(field('proname'),' (',field('proarguments'),')');
		
		$reqvars = $misc->getRequestVars('function');
		
		$attrs = array(
			'text'    => $proto,
			'icon'    => 'functions',
			'toolTip' => field('procomment'),
			'action'  => url('redirect.php',
							$reqvars,
							array(
								'action' => 'properties',
								'function' => $proto,
								'function_oid' => field('prooid')
							)
						)
		);
		
		$misc->printTreeXML($funcs, $attrs);
		exit;
	}
	
	if ($action == 'tree') doTree();
	
	$misc->printHeader($lang['strfunctions']);
	$misc->printBody();

	switch ($action) {
		case 'save_create':
			if (isset($_POST['cancel'])) doDefault();
			else doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if (isset($_POST['drop'])) doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;			
		case 'save_edit':
			if (isset($_POST['cancel'])) doDefault();
			else doSaveEdit();
			break;
		case 'edit':
			doEdit();
			break;
		case 'properties':
			doProperties();
			break;
		default:
			doDefault();
			break;
	}	

	$misc->printFooter();
	
?>
