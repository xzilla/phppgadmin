<?php

	/**
	 * List constraints on a table
	 *
	 * $Id: constraints.php,v 1.5 2003/03/16 10:38:38 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Confirm and then actually add a CHECK constraint
	 */
	function addCheck($confirm, $msg = '') {
		global $PHP_SELF, $data, $localData, $misc;
		global $strAddCheck, $strTables, $strOK, $strCancel;
		global $strName, $strDefinition, $strCheckNeedsDefinition;
		global $strCheckAdded, $strCheckAddedBad;

		if (!isset($_POST['name'])) $_POST['name'] = '';
		if (!isset($_POST['definition'])) $_POST['definition'] = '';

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strTables}: ",
				htmlspecialchars($_REQUEST['table']), ": {$strAddCheck}</h2>\n";
			$misc->printMsg($msg);

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strName}</th>\n";
			echo "<th class=\"data\">{$strDefinition}</th></tr>\n";

			echo "<tr><td class=\"data1\"><input name=\"name\" size=\"16\" maxlength=\"{$data->_maxNameLen}\" value=\"",
				htmlspecialchars($_POST['name']), "\"></td>\n";

			echo "<td class=\"data1\">(<input name=\"definition\" size=\"32\" value=\"",
				htmlspecialchars($_POST['definition']), "\">)</td></tr>\n";
			echo "</table>\n";

			echo "<input type=\"hidden\" name=\"action\" value=\"save_add_check\">\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo $misc->form;
			echo "<p><input type=\"submit\" name=\"ok\" value=\"{$strOK}\"> <input type=\"submit\" name=\"cancel\" value=\"{$strCancel}\"></p>\n";
			echo "</form>\n";

		}
		else {
			if (trim($_POST['definition']) == '')
				addCheck(true, $strCheckNeedsDefinition);
			else {
				$status = $localData->addCheckConstraint($_POST['table'],
					$_POST['definition'], $_POST['name']);
				if ($status == 0)
					doDefault($strCheckAdded);
				else
					addCheck(true, $strCheckAddedBad);
			}
		}
	}

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $misc;
		global $PHP_SELF, $strDrop, $strConfDropConstraint, $strConstraintDropped, $strConstraintDroppedBad, $strYes, $strNo;
		global $strTables;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strTables}: ",
				htmlspecialchars($_REQUEST['table']), ": " , htmlspecialchars($_REQUEST['constraint']), ": {$strDrop}</h2>\n";

			echo "<p>", sprintf($strConfDropConstraint, htmlspecialchars($_REQUEST['constraint']),
				htmlspecialchars($_REQUEST['table'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=\"hidden\" name=\"action\" value=\"drop\">\n";
			echo "<input type=\"hidden\" name=\"table\" value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=\"hidden\" name=\"constraint\" value=\"", htmlspecialchars($_REQUEST['constraint']), "\">\n";
			echo $misc->form;
			echo "<input type=\"submit\" name=\"choice\" value=\"{$strYes}\"> <input type=\"submit\" name=\"choice\" value=\"{$strNo}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropConstraint($_POST['constraint'], $_POST['table']);
			if ($status == 0)
				doDefault($strConstraintDropped);
			else
				doDefault($strConstraintDroppedBad);
		}
	}

	/**
	 * List all the constraints on the table
	 */
	function doDefault($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF;
		global $strConstraints, $strName, $strDefinition, $strActions, $strNoConstraints, $strCreateConstraint, $strDrop;
		global $strAddCheck;

		$misc->printTableNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), ": {$strConstraints}</h2>\n";
		$misc->printMsg($msg);

		$constraints = &$localData->getConstraints($_REQUEST['table']);

		if ($constraints->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strName}</th><th class=\"data\">{$strDefinition}</th><th class=\"data\">{$strActions}</th>\n";
			$i = 0;
			
			while (!$constraints->EOF) {
				$id = ( ($i % 2 ) == 0 ? '1' : '2' );
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars($constraints->f[$data->cnFields['conname']]), "</td>";
				echo "<td class=\"data{$id}\">";
				// Nasty hack to support pre-7.4 PostgreSQL
				if ($constraints->f['consrc'] !== null)
					echo, htmlspecialchars($constraints->f[$data->cnFields['consrc']]);
				else {
					$atts = &$localData->getKeys($_REQUEST['table'], explode(' ', $constraints->f['indkey']));
					echo ($constraints->f['contype'] == 'u') ? "UNIQUE (" : "PRIMARY KEY (";
					echo join(',', $atts);
					echo ")";
				}
				echo "</td>";
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&constraint=", htmlspecialchars($constraints->f[$data->cnFields['conname']]),
					"&table=", htmlspecialchars($_REQUEST['table']), "\">{$strDrop}</td></tr>\n";

				$constraints->moveNext();
				$i++;
			}

			echo "</table>\n";
			}
		else
			echo "<p>{$strNoConstraints}</p>\n";
		
		echo "<p><a href=\"{$PHP_SELF}?action=add_check&{$misc->href}&table=", htmlspecialchars($_REQUEST['table']),
			"\">{$strAddCheck}</a></p>\n";
	}

	$misc->printHeader($strTables . ' - ' . $_REQUEST['table'] . ' - ' . $strConstraints);
	$misc->printBody();

	switch ($action) {
		case 'add_check':
			addCheck(true);
			break;
		case 'save_add_check':
			if (isset($_POST['cancel'])) doDefault();
			else addCheck(false);
			break;
		case 'save_create':
			doSaveCreate();
			break;
		case 'create':
			doCreate();
			break;
		case 'drop':
			if ($_POST['choice'] == $strYes) doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;
		default:
			doDefault();
			break;
	}
	
	$misc->printFooter();

?>
