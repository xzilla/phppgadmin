<?php

	/**
	 * Manage views in a database
	 *
	 * $Id: views.php,v 1.17 2003/08/18 08:27:07 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	if (!isset($msg)) $msg = '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Ask for select parameters and perform select
	 */
	function doSelectRows($confirm, $msg = '') {
		global $localData, $database, $misc;
		global $lang;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: ", $misc->printVal($_REQUEST['view']), ": {$lang['strselect']}</h2>\n";
			$misc->printMsg($msg);

			$attrs = &$localData->getTableAttributes($_REQUEST['view']);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			if ($attrs->recordCount() > 0) {
				echo "<table>\n<tr>";

				// Output table header
				echo "<tr><th class=\"data\">{$lang['strshow']}</th><th class=\"data\">{$lang['strfield']}</th>";
				echo "<th class=\"data\">{$lang['strtype']}</th><th class=\"data\">{$lang['strnull']}</th>";
				echo "<th class=\"data\">{$lang['strvalue']}</th></tr>";

				$i = 0;
				while (!$attrs->EOF) {
					$attrs->f['attnotnull'] = $localData->phpBool($attrs->f['attnotnull']);
					// Set up default value if there isn't one already
					if (!isset($_REQUEST['values'][$attrs->f['attname']]))
						$_REQUEST['values'][$attrs->f['attname']] = null;
					// Continue drawing row
					$id = (($i % 2) == 0 ? '1' : '2');
					echo "<tr>\n";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">";
					echo "<input type=\"checkbox\" name=\"show[", htmlspecialchars($attrs->f['attname']), "]\"",
						isset($_REQUEST['show'][$attrs->f['attname']]) ? ' checked="checked"' : '', " /></td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($attrs->f['attname']), "</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">", $misc->printVal($attrs->f['type']), "</td>";
					echo "<td class=\"data{$id}\" nowrap=\"nowrap\">";
					// Output null box if the column allows nulls (doesn't look at CHECKs or ASSERTIONS)
					if (!$attrs->f['attnotnull'])
						echo "<input type=\"checkbox\" name=\"nulls[{$attrs->f['attname']}]\"",
							isset($_REQUEST['nulls'][$attrs->f['attname']]) ? ' checked="checked"' : '', " /></td>";
					else
						echo "&nbsp;</td>";
					echo "<td class=\"data{$id}\" nowrap>", $localData->printField("values[{$attrs->f['attname']}]",
						$_REQUEST['values'][$attrs->f['attname']], $attrs->f['type']), "</td>";
					echo "</tr>\n";
					$i++;
					$attrs->moveNext();
				}
				echo "</table></p>\n";
			}
			else echo "<p>{$lang['strinvalidparam']}</p>\n";

			echo "<p><input type=\"hidden\" name=\"action\" value=\"selectrows\" />\n";
			echo "<input type=\"hidden\" name=\"view\" value=\"", htmlspecialchars($_REQUEST['view']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"select\" value=\"{$lang['strselect']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else {
			if (!isset($_POST['show'])) $_POST['show'] = array();
			if (!isset($_POST['values'])) $_POST['values'] = array();
			if (!isset($_POST['nulls'])) $_POST['nulls'] = array();
			
			if (sizeof($_POST['show']) == 0)
				doSelectRows(true, $lang['strselectneedscol']);
			else {
				// Generate query SQL
				$query = $localData->getSelectSQL($_REQUEST['view'], array_keys($_POST['show']),
					$_POST['values'], array_keys($_POST['nulls']));
				$_REQUEST['query'] = $query;
				$_REQUEST['return_url'] = "views.php?action=confselectrows&{$misc->href}&view={$_REQUEST['view']}";
				$_REQUEST['return_desc'] = $lang['strback'];

				include('display.php');
				exit;
			}
		}

}
	
	/** 
	 * Function to save after editing a view
	 */
	function doSaveEdit() {
		global $localData, $lang;
		
		$status = $localData->setView($_POST['view'], $_POST['formDefinition']);
		if ($status == 0)
			doProperties($lang['strviewupdated']);
		else
			doEdit($lang['strviewupdatedbad']);
	}
	
	/**
	 * Function to allow editing of a view
	 */
	function doEdit($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: ", $misc->printVal($_REQUEST['view']), ": {$lang['stredit']}</h2>\n";
		$misc->printMsg($msg);
		
		$viewdata = &$localData->getView($_REQUEST['view']);
		
		if ($viewdata->recordCount() > 0) {
			
			if (!isset($_POST['formDefinition'])) $_POST['formDefinition'] = $viewdata->f[$data->vwFields['vwdef']];
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table width=\"100%\">\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th></tr>\n";
			echo "<tr><td class=\"data1\">", $misc->printVal($viewdata->f[$data->vwFields['vwname']]), "</td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=\"data1\"><textarea style=\"width:100%;\" rows=\"20\" cols=\"50\" name=\"formDefinition\" wrap=\"virtual\">", 
				htmlspecialchars($_POST['formDefinition']), "</textarea></td></tr>\n";
			echo "</table>\n";
			echo "<p><input type=\"hidden\" name=\"action\" value=\"save_edit\" />\n";
			echo "<input type=\"hidden\" name=\"view\" value=\"", htmlspecialchars($_REQUEST['view']), "\" />\n";
			echo $misc->form;
			echo "<input type=\"submit\" value=\"{$lang['stralter']}\" />\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\" /></p>\n";
			echo "</form>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
	}
	
	/**
	 * Show read only properties for a view
	 */
	function doProperties($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
	
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: ", $misc->printVal($_REQUEST['view']), ": {$lang['strproperties']}</h2>\n";
		$misc->printMsg($msg);
		
		$viewdata = &$localData->getView($_REQUEST['view']);
		
		if ($viewdata->recordCount() > 0) {
			echo "<table width=\"100%\">\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th></tr>\n";
			echo "<tr><td class=\"data1\">", $misc->printVal($viewdata->f[$data->vwFields['vwname']]), "</td></tr>\n";
			echo "<tr><th class=\"data\">{$lang['strdefinition']}</th></tr>\n";
			echo "<tr><td class=\"data1\">", $misc->printVal($viewdata->f[$data->vwFields['vwdef']]), "</td></tr>\n";
			echo "</table>\n";
		}
		else echo "<p>{$lang['strnodata']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}\">{$lang['strshowallviews']}</a> |\n";
		echo "<a class=\"navlink\" href=\"$PHP_SELF?action=edit&{$misc->href}&view=", 
			urlencode($_REQUEST['view']), "\">{$lang['stralter']}</a></p>\n";
	}
	
	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) { 
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: ", $misc->printVal($_REQUEST['view']), ": {$lang['strdrop']}</h2>\n";
			
			echo "<p>", sprintf($lang['strconfdropview'], $misc->printVal($_REQUEST['view'])), "</p>\n";	
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"view\" value=\"", htmlspecialchars($_REQUEST['view']), "\">\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($localData->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\"> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"drop\" value=\"{$lang['strdrop']}\">\n";
			echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropView($_POST['view'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strviewdropped']);
			else
				doDefault($lang['strviewdroppedbad']);
		}
		
	}
	
	/**
	 * Displays a screen where they can enter a new view
	 */
	function doCreate($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		if (!isset($_POST['formView'])) $_POST['formView'] = '';
		if (!isset($_POST['formDefinition'])) $_POST['formDefinition'] = '';
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}: {$lang['strcreateview']}</h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
		echo "<table width=\"100%\">\n";
		echo "<tr><th class=\"data\">{$lang['strname']}</th></tr>\n";
		echo "<tr><td class=\"data1\"><input name=\"formView\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" value=\"", 
			htmlspecialchars($_POST['formView']), "\"></td></tr>\n";
		echo "<tr><th class=\"data\">{$lang['strdefinition']}</th></tr>\n";
		echo "<tr><td class=\"data1\"><textarea style=\"width:100%;\" rows=\"20\" cols=\"50\" name=\"formDefinition\" wrap=\"virtual\">", 
			htmlspecialchars($_POST['formDefinition']), "</textarea></td></tr>\n";
		echo "</table>\n";
		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create\">\n";
		echo $misc->form;
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\">\n";
		echo "<input type=\"submit\" name=\"cancel\" value=\"{$lang['strcancel']}\"></p>\n";
		echo "</form>\n";
	}
	
	/**
	 * Actually creates the new view in the database
	 */
	function doSaveCreate() {
		global $localData, $lang;
		
		// Check that they've given a name and a definition
		if ($_POST['formView'] == '') doCreate($lang['strviewneedsname']);
		elseif ($_POST['formDefinition'] == '') doCreate($lang['strviewneedsdef']);
		else {		 
			$status = $localData->createView($_POST['formView'], $_POST['formDefinition'], false);
			if ($status == 0)
				doDefault($lang['strviewcreated']);
			else
				doCreate($lang['strviewcreatedbad']);
		}
	}	

	/**
	 * Show default list of views in the database
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;
		
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strviews']}</h2>\n";
		$misc->printMsg($msg);
		
		$views = &$localData->getViews();
		
		if ($views->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strview']}</th><th class=\"data\">{$lang['strowner']}</th>";
			echo "<th colspan=\"5\" class=\"data\">{$lang['stractions']}</th></tr>\n";
			$i = 0;
			while (!$views->EOF) {
				// @@@@@@@@@ FIX THIS!!!!!
				if ($data->hasSchemas() && isset($_REQUEST['schema'])) {
					$data->fieldClean($_REQUEST['schema']);
					$query = urlencode("SELECT * FROM \"{$_REQUEST['schema']}\".\"{$views->f[$data->vwFields['vwname']]}\"");
				}
				else
					$query = urlencode("SELECT * FROM \"{$views->f[$data->vwFields['vwname']]}\"");
				$count = urlencode("SELECT COUNT(*) AS total FROM \"{$views->f[$data->vwFields['vwname']]}\"");
				$return_url = urlencode("views.php?{$misc->href}");
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=\"data{$id}\">", $misc->printVal($views->f[$data->vwFields['vwname']]), "</td>\n";
				echo "<td class=\"data{$id}\">", $misc->printVal($views->f[$data->vwFields['vwowner']]), "</td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"display.php?{$misc->href}&query={$query}&count={$count}&return_url={$return_url}&return_desc=",
					urlencode($lang['strback']), "\">{$lang['strbrowse']}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confselectrows&{$misc->href}&view=", urlencode($views->f[$data->vwFields['vwname']]), "\">{$lang['strselect']}</a></td>\n"; 
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=properties&{$misc->href}&view=", urlencode($views->f[$data->vwFields['vwname']]), "\">{$lang['strproperties']}</a></td>\n"; 
				echo "<td class=\"opbutton{$id}\"><a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&view=", urlencode($views->f[$data->vwFields['vwname']]), "\">{$lang['strdrop']}</a></td>\n";
				echo "<td class=\"opbutton{$id}\"><a href=\"privileges.php?{$misc->href}&object=", urlencode($views->f[$data->vwFields['vwname']]),
					"&type=view\">{$lang['strprivileges']}</a></td>\n";
				echo "</tr>\n";
				$views->moveNext();
				$i++;
			}
			echo "</table>\n";
		}
		else {
			echo "<p>{$lang['strnoviews']}</p>\n";
		}
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}\">{$lang['strcreateview']}</a></p>\n";

	}

	$misc->printHeader($lang['strviews']);
	$misc->printBody();

	switch ($action) {
		case 'selectrows':
			if (!isset($_POST['cancel'])) doSelectRows(false);
			else doDefault();
			break;
		case 'confselectrows':
			doSelectRows(true);
			break;
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
			if (isset($_POST['cancel'])) doProperties();
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
