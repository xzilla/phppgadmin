<?php

	/**
	 * List indexes on a table
	 *
	 * $Id: indexes.php,v 1.15 2003/07/31 08:28:03 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	include_once('classes/class.select.php');
		
	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Displays a screen where they can enter a new index
	 */
	function doCreateIndex($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;

		if (!isset($_POST['formIndexName'])) $_POST['formIndexName'] = '';
		if (!isset($_POST['formCols'])) $_POST['formCols'] = '';

		echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strindexes']} : {$lang['strcreateindex']} </h2>\n";
		$misc->printMsg($msg);

		$attrs = &$localData->getTableAttributes($_REQUEST['table']);

		$selColumns = new XHTML_select("TableColumnList",true,10);
		$selColumns->set_style("width: 10em;");

		if ($attrs->recordCount() > 0) {
			while (!$attrs->EOF) {
				$selColumns->add(new XHTML_Option($attrs->f['attname']));
				$attrs->moveNext();
			}
		}

		$selIndex = new XHTML_select("IndexColumnList[]", true, 10);
		$selIndex->set_style("width: 10em;");
		$selIndex->set_attribute("id", "IndexColumnList");
		$buttonAdd    = new XHTML_Button("add", ">>");
		$buttonAdd->set_attribute("onclick", "buttonPressed(this);");
		$buttonAdd->set_attribute("type", "button");

		$buttonRemove = new XHTML_Button("remove", "<<");
		$buttonRemove->set_attribute("onclick", "buttonPressed(this);");		
		$buttonRemove->set_attribute("type", "button");

		$selTypes = new XHTML_select("formIndexType");
		$selTypes->set_data($localData->typIndexes);
				
		echo "<form onsubmit=\"doSelectAll();\" name=\"formIndex\" action=\"$PHP_SELF\" method=\"post\">\n";


		echo "<table>\n";
		echo "<tr><th class=\"data\" colspan=\"3\">{$lang['strindexname']}</th></tr>";
		echo "<tr>";
		echo "<td class=\"data1\" colspan=\"3\"><input type=\"text\" name=\"formIndexName\" size=\"32\" maxlength=\"{$data->_maxNameLen}\" /></td></tr>";
		echo "<tr><th class=\"data\">{$lang['strtablecolumnlist']}</th><th class=\"data\">&nbsp;</th>";
		echo "<th class=\"data\">{$lang['strindexcolumnlist']}</th></tr>\n";
		echo "<tr><td class=\"data1\">" . $selColumns->fetch() . "</td>\n";
		echo "<td class=\"data1\">" . $buttonRemove->fetch() . $buttonAdd->fetch() . "</td>";
		echo "<td class=\"data1\">" . $selIndex->fetch() . "</td></tr>\n";
		echo "</table>\n";

		echo "<table> \n";
		echo "<tr>";
		echo "<th class=\"data\">{$lang['strindextype']}</th>";
		echo "<td>" . $selTypes->fetch() . "</td>";
		echo "</tr>";
		echo "</table>";
		

		echo "<p><input type=\"hidden\" name=\"action\" value=\"save_create_index\" />\n";
		echo $misc->form;
		echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
		echo "<input type=\"submit\" value=\"{$lang['strcreate']}\" />\n";
		echo "<input type=reset value=\"{$lang['strreset']}\" /></p>\n";
		echo "</form>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?{$misc->href}&table=", urlencode($_REQUEST['table']), 
			"\">{$lang['strshowallindexes']}</a></p>\n";
	}

	/**
	 * Actually creates the new index in the database
	 * @@ Note: this function can't handle columns with commas in them
	 */
	function doSaveCreateIndex() {
		global $localData;
		global $lang;
		
		// Check that they've given a name and at least one column
		if ($_POST['formIndexName'] == '') doCreateIndex($lang['strindexneedsname']);
		elseif ($_POST['IndexColumnList'] == '') doCreate($lang['strindexneedscols']);
		else {
			$status = $localData->createIndex($_POST['formIndexName'], $_POST['table'], $_POST['IndexColumnList'], $_POST['formIndexType']);
			if ($status == 0)
				doDefault($lang['strindexcreated']);
			else
				doCreateIndex($lang['strindexcreatedbad']);
		}
	}

	/**
	 * Show confirmation of drop index and perform actual drop
	 */
	function doDropIndex($confirm) {
		global $localData, $database, $misc;
		global $PHP_SELF, $lang;

		if ($confirm) {
			echo "<h2>", $misc->printVal($_REQUEST['database']), ": {$lang['strtables']}: ",
				$misc->printVal($_REQUEST['table']), ": " , $misc->printVal($_REQUEST['index']), ": {$lang['strdrop']}</h2>\n";

			echo "<p>", sprintf($lang['strconfdropindex'], $misc->printVal($_REQUEST['index'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop_index\" />\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\" />\n";
			echo "<input type=\"hidden\" name=\"index\" value=\"", htmlspecialchars($_REQUEST['index']), "\" />\n";
			echo $misc->form;
			// Show cascade drop option if supportd
			if ($localData->hasDropBehavior()) {
				echo "<p><input type=\"checkbox\" name=\"cascade\" /> {$lang['strcascade']}</p>\n";
			}
			echo "<input type=\"submit\" name=\"yes\" value=\"{$lang['stryes']}\" />\n";
			echo "<input type=\"submit\" name=\"no\" value=\"{$lang['strno']}\" />\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropIndex($_POST['index'], isset($_POST['cascade']));
			if ($status == 0)
				doDefault($lang['strindexdropped']);
			else
				doDefault($lang['strindexdroppedbad']);
		}

	}

	function doDefault($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $lang;

		$misc->printTableNav();
		echo "<h2>", $misc->printVal($_REQUEST['database']), ": ", $misc->printVal($_REQUEST['table']), ": {$lang['strindexes']}</h2>\n";
		$misc->printMsg($msg);

		$indexes = &$localData->getIndexes($_REQUEST['table']);
		
		if ($indexes->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$lang['strname']}</th><th class=\"data\">{$lang['strdefinition']}</th>";
			echo "<th class=\"data\">{$lang['stractions']}</th>\n";
			$i = 0;
			
			while (!$indexes->EOF) {
				$id = ( ($i % 2 ) == 0 ? '1' : '2' );
				echo "<tr><td class=\"data{$id}\">", $misc->printVal( $indexes->f[$data->ixFields['idxname']]), "</td>";
				echo "<td class=\"data{$id}\">", $misc->printVal( $indexes->f[$data->ixFields['idxdef']]), "</td>";
				echo "<td class=\"opbutton{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop_index&{$misc->href}&index=", urlencode( $indexes->f[$data->ixFields['idxname']]), 
					"&table=", urlencode($_REQUEST['table']), "\">{$lang['strdrop']}</td></tr>\n";

				$indexes->movenext();
				$i++;
			}

			echo "</table>\n";
			}
		else
			echo "<p>{$lang['strnoindexes']}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create_index&{$misc->href}&table=", urlencode($_REQUEST['table']), "\">{$lang['strcreateindex']}</a></p>\n";		
	}

	$misc->printHeader($lang['strindexes'], "<script src=\"indexes.js\" type=\"text/javascript\"></script>");

	if ($action == 'create_index' || $action == 'save_create_index')
		echo "<body onload=\"init();\">";
	else
		$misc->printBody();
	
	switch ($action) {
		case 'save_create_index':
			doSaveCreateIndex();
			break;
		case 'create_index':
			doCreateIndex();
			break;
		case 'drop_index':
			if (isset($_POST['yes'])) doDropIndex(false);
			else doDefault();
			break;
		case 'confirm_drop_index':
			doDropIndex(true);
			break;
		default:
			doDefault();
			break;
	}

	$misc->printFooter();

?>
