<?php

	/**
	 * Manage functions in a database
	 *
	 * $Id: functions.php,v 1.56.2.2 2007/07/09 14:55:22 xzilla Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	
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
		global $lang;
		
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
			echo "<form action=\"functions.php\" method=\"post\">\n";
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
		global $lang;
		
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
		
		echo "<p><a class=\"navlink\" href=\"functions.php?{$misc->href}\">{$lang['strshowallfunctions']}</a> |\n";
		echo "<a class=\"navlink\" href=\"functions.php?action=edit&amp;{$misc->href}&amp;function=", 
			urlencode($_REQUEST['function']), "&amp;function_oid=", urlencode($_REQUEST['function_oid']), "\">{$lang['stralter']}</a> |\n";
		echo "<a class=\"navlink\" href=\"functions.php?action=confirm_drop&amp;{$misc->href}&amp;function=",
			urlencode($func_full), "&amp;function_oid=", $_REQUEST['function_oid'], "\">{$lang['strdrop']}</a>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $data, $misc;
		global $lang;

		if ($confirm) {
			$misc->printTrail('schema');
			$misc->printTitle($lang['strdrop'],'pg.function.drop');
			
			echo "<p>", sprintf($lang['strconfdropfunction'], $misc->printVal($_REQUEST['function'])), "</p>\n";	
			
			echo "<form action=\"functions.php\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\" />\n";
			echo "<input type=\"hidden\" name=\"function\" value=\"", htmlspecialchars($_REQUEST['function']), "\" />\n";
			echo "<input type=\"hidden\" name=\"function_oid\" value=\"", htmlspecialchars($_REQUEST['function_oid']), "\" />\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($data->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" id=\"cascade\" name=\"cascade\" /><label for=\"cascade\">{$lang['strcascade']}</label></p>\n";
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
	function doCreate($msg = '',$szJS="") {
		global $data, $misc;
		global $lang;
		
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
		
		// Create string for return type list		
		$szTypes = "";
		while (!$types->EOF) {
			$szSelected = "";
			if($types->f['typname'] == $_POST['formReturns']) {
				$szSelected = " selected=\"selected\"";
			}
			$szTypes .= "<option value=\"". htmlspecialchars($types->f['typname']) ."\"{$szSelected}>";
			$szTypes .= $misc->printVal($types->f['typname']) ."</option>";
			$types->moveNext();
		}

		$szFunctionName = "<td class=\"data1\"><input name=\"formFunction\" size=\"16\" maxlength=\"{$data->_maxNameLen}\" value=\"".
			htmlspecialchars($_POST['formFunction']) ."\" /></td>";

		$szArguments = "<td class=\"data1\"><input name=\"formArguments\" style=\"width:100%;\" size=\"16\" value=\"".
			htmlspecialchars($_POST['formArguments']) ."\" /></td>";
		
		$szSetOfSelected = "";
		$szNotSetOfSelected = "";
		if($_POST['formSetOf'] == '') {
			$szNotSetOfSelected = " selected=\"selected\"";
		} else if($_POST['formSetOf'] == 'SETOF') {
			$szSetOfSelected = " selected=\"selected\"";
		}
		$szReturns = "<td class=\"data1\" colspan=\"2\">";
		$szReturns .= "<select name=\"formSetOf\">";
		$szReturns .= "<option value=\"\"{$szNotSetOfSelected}></option>";
		$szReturns .= "<option value=\"SETOF\"{$szSetOfSelected}>SETOF</option>";
		$szReturns .= "</select>";

		$szReturns .= "<select name=\"formReturns\">".$szTypes."</select>";

		// Create string array type selector

		$szArraySelected = "";
		$szNotArraySelected = "";
		if($_POST['formArray'] == '') {
			$szNotArraySelected = " selected=\"selected\"";
		} else if($_POST['formArray'] == '[]') {
			$szArraySelected = " selected=\"selected\"";
		}

		$szReturns .= "<select name=\"formArray\">";
		$szReturns .= "<option value=\"\"{$szNotArraySelected}></option>";
		$szReturns .= "<option value=\"[]\"{$szArraySelected}>[ ]</option>";
		$szReturns .= "</select>\n</td>";

		// Create string for language
		$szLanguage = "<td class=\"data1\">";
		if ($fnlang == 'c' || $fnlang == 'internal') {
			$szLanguage .=  $_POST['formLanguage'] . "\n";
			$szLanguage .= "<input type=\"hidden\" name=\"formLanguage\" value=\"{$_POST['formLanguage']}\" />\n";
		}
		else {
			$szLanguage .= "<select name=\"formLanguage\">";
			while (!$langs->EOF) {
				$szSelected = "";
				if($langs->f['lanname'] == $_POST['formLanguage']) {
					$szSelected = " selected=\"selected\"";
				}
				if (strtolower($langs->f['lanname']) != 'c' && strtolower($langs->f['lanname']) != 'internal')
					$szLanguage .= "<option value=\"". htmlspecialchars($langs->f['lanname']). "\"{$szSelected}>".
						$misc->printVal($langs->f['lanname']) ."</option>";
				$langs->moveNext();
			}
			$szLanguage .= "</select>\n";
		}
		
		$szLanguage .= "</td>";
		$szJSArguments = "<tr><th class=\"data\" colspan=\"7\">{$lang['strarguments']}</th></tr>";
		$arrayModes = array("IN","OUT","INOUT");
		$szModes = "<select name=\"formArgModes[]\" style=\"width:100%;\">";
		foreach($arrayModes as $pV) {
			$szModes .= "<option value=\"{$pV}\">{$pV}</option>";
		}
		$szModes .= "</select>";
		$szArgReturns = "<select name=\"formArgArray[]\">";
		$szArgReturns .= "<option value=\"\"></option>";
		$szArgReturns .= "<option value=\"[]\">[]</option>";
		$szArgReturns .= "</select>";
		if(!empty($conf['theme'])) {
			$szImgPath = "images/themes/{$conf['theme']}";
		} else {
			$szImgPath = "images/themes/default";
		}
		if(empty($msg)) {
			$szJSTRArg = "<script type=\"text/javascript\" >addArg();</script>\n";
		} else {
			$szJSTRArg = "";
		}
		$szJSAddTR = "<tr id=\"parent_add_tr\" onclick=\"addArg();\" onmouseover=\"this.style.cursor='pointer'\"><td align=\"right\" colspan=\"6\" class=\"data3\"><table><tr><td class=\"data3\"><img src=\"{$szImgPath}/AddArguments.png\" alt=\"Add Argument\" /></td><td class=\"data3\"><span style=\"font-size:8pt\">{$lang['strargadd']}</span></td></tr></table></td></tr>";


		echo "<script src=\"functions.js\" type=\"text/javascript\"></script>
		<script type=\"text/javascript\">
			var g_types_select = '<select name=\"formArgType[]\">{$szTypes}</select>{$szArgReturns}';
			var g_modes_select = '{$szModes}';
			var g_name = '';
			var g_lang_strargremove = \"". addslashes($lang["strargremove"]) ."\";
			var g_lang_strargnoargs = \"". addslashes($lang["strargnoargs"]) ."\";
			var g_lang_strargenableargs = \"". addslashes($lang["strargenableargs"]) ."\";
			var g_lang_strargnorowabove = \"". addslashes($lang["strargnorowabove"]) ."\";
			var g_lang_strargnorowbelow = \"". addslashes($lang["strargnorowbelow"]) ."\";
			var g_lang_strargremoveconfirm = \"". addslashes($lang["strargremoveconfirm"]) ."\";
			var g_lang_strargraise = \"". addslashes($lang["strargraise"]) ."\";
			var g_lang_strarglower = \"". addslashes($lang["strarglower"]) ."\";
		</script>
		";
		echo "<form action=\"functions.php\" method=post><input type=\"hidden\" name=\"formEmptyArgs\" id=\"formEmptyArgs\" value=\"1\" />\n";
		echo "<table><tbody id=\"args_table\">\n";
		echo "<tr><th class=\"data required\">{$lang['strname']}</th>\n";
		echo "<th class=\"data required\" colspan=\"2\">{$lang['strreturns']}</th>\n";
		echo "<th class=\"data required\">{$lang['strproglanguage']}</th></tr>\n";
		echo "<tr>\n";
		echo "{$szFunctionName}\n";
		echo "{$szReturns}\n";
		echo "{$szLanguage}\n";
		echo "</tr>\n";
		echo "{$szJSArguments}\n";
		echo "<tr>\n";
		echo "<th class=\"data required\">{$lang['strargmode']}</th>\n";
		echo "<th class=\"data required\">{$lang['strargname']}</th>\n";
		echo "<th class=\"data required\" colspan=\"2\">{$lang['strargtype']}</th>\n";
		echo "</tr>\n";
		echo "{$szJSAddTR}\n";
		echo $szJSTRArg;

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
		echo "</tbody></table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\" />\n";
		echo $misc->form;
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
		echo "</form>\n";
		echo $szJS;
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

		$szJS = "";

		echo "<script src=\"functions.js\" type=\"text/javascript\"></script>";
		echo "<script type=\"text/javascript\">".buildJSData()."</script>";
		if(!empty($_POST["formArgName"])) {
			$szJS = buildJSRows(buildFunctionArguments($_POST));
		} else {
			$szJS = "<script type=\"text/javascript\" src=\"functions.js\">noArgsRebuild(addArg());</script>";
		}

		// Check that they've given a name and a definition
		if ($_POST['formFunction'] == '') doCreate($lang['strfunctionneedsname'],$szJS);
		elseif ($fnlang != 'internal' && !$def) doCreate($lang['strfunctionneedsdef'],$szJS);
		else {
			// Append array symbol to type if chosen
			$status = $data->createFunction($_POST['formFunction'], empty($_POST["nojs"]) ? buildFunctionArguments($_POST) : $_POST["formArguments"], 
					$_POST['formReturns'] . $_POST['formArray'] , $def , $_POST['formLanguage'],
					$_POST['formProperties'], $_POST['formSetOf'] == 'SETOF', false);
			if ($status == 0)
				doDefault($lang['strfunctioncreated']);
			else {
				doCreate($lang['strfunctioncreatedbad'],$szJS);
			}
		}
	}	

	/**
	 * Build out the function arguments string
	 */
	function buildFunctionArguments($arrayVars) {
		$arrayArgs = array();
		foreach($arrayVars["formArgName"] as $pK => $pV) {
			$arrayArgs[] = $arrayVars["formArgModes"][$pK]." ". trim($pV) ." ". trim($arrayVars["formArgType"][$pK]) . $arrayVars["formArgArray"][$pK];
		}
		return implode(",",$arrayArgs);
	}
	
	/**
	 * Build out JS to re-create table rows for arguments
	 */
	function buildJSRows($szArgs) {
		$arrayModes = array("IN","OUT","INOUT");
		$arrayArgs = explode(",",$szArgs);
		$arrayProperArgs = array();
		$nC = 0;
		$szReturn = "";
		foreach($arrayArgs as $pV) {
			$arrayWords = explode(" ",$pV);
			if(in_array($arrayWords[0],$arrayModes)===true) {
				$szMode = $arrayWords[0];
				array_shift($arrayWords);
			}
			$szArgName = array_shift($arrayWords);
			if(strpos($arrayWords[count($arrayWords)-1],"[]")===false) {
				$szArgType = implode(" ",$arrayWords);
				$bArgIsArray = "false";
			} else {
				$szArgType = str_replace("[]","",implode(" ",$arrayWords));
				$bArgIsArray = "true";
			}
			$arrayProperArgs[] = array($szMode,$szArgName,$szArgType,$bArgIsArray);
			$szReturn .= "<script type=\"text/javascript\">RebuildArgTR('{$szMode}','{$szArgName}','{$szArgType}',new Boolean({$bArgIsArray}));</script>";
			$nC++;
		}
		return $szReturn;
	}


	function buildJSData() {
		global $data;
		$arrayModes = array("IN","OUT","INOUT");
		$arrayTypes = $data->getTypes(true, true, true);
		$arrayPTypes = array();
		$arrayPModes = array();
		$szTypes = "";
		foreach($arrayTypes as $pK => $pV) {
			$arrayPTypes[] = "'{$pV['typname']}'";
		}
		foreach($arrayModes as $pV) {
			$arrayPModes[] = "'{$pV}'";
		}
		$szTypes = "g_main_types = new Array(".implode(",",$arrayPTypes).");";
		$szModes = "g_main_modes = new Array(".implode(",",$arrayPModes).");";
		return $szTypes.$szModes;
	}

	/**
	 * Show default list of functions in the database
	 */
	function doDefault($msg = '') {
		global $data, $conf, $misc, $func;
		global $lang;
		
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
				'url'   => "functions.php?action=edit&amp;{$misc->href}&amp;",
				'vars'  => array('function' => 'proproto', 'function_oid' => 'prooid'),
			),
			'drop' => array(
				'title' => $lang['strdrop'],
				'url'   => "functions.php?action=confirm_drop&amp;{$misc->href}&amp;",
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

		echo "<p><a class=\"navlink\" href=\"functions.php?action=create&amp;{$misc->href}\">{$lang['strcreateplfunction']}</a> | ";
		echo "<a class=\"navlink\" href=\"functions.php?action=create&amp;language=internal&amp;{$misc->href}\">{$lang['strcreateinternalfunction']}</a> | ";
		echo "<a class=\"navlink\" href=\"functions.php?action=create&amp;language=C&amp;{$misc->href}\">{$lang['strcreatecfunction']}</a></p>\n";
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
			'icon'    => 'Function',
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
