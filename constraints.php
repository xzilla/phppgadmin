<?php

	/**
	 * List constraints on a table
	 *
	 * $Id: constraints.php,v 1.2 2003/02/07 17:34:34 xzilla Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	/**
	 * Show confirmation of drop and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $misc;
		global $PHP_SELF, $strDrop, $strConfDropConstraint, $strConstraintDropped, $strConstraintDroppedBad, $strYes, $strNo;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ",
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
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $constraints->f[$data->cnFields['conname']]), "</td>";
				echo "<td class=\"data{$id}\">", htmlspecialchars( $constraints->f[$data->cnFields['consrc']]), "</td>";
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&constraint=", htmlspecialchars( $constraints->f[$data->cnFields['conname']]),
					"&table=", htmlspecialchars($_REQUEST['table']), "\">{$strDrop}</td></tr>\n";

				$constraints->moveNext();
				$i++;
			}

			echo "</table>\n";
			}
		else
			echo "<p>{$strNoConstraints}</p>\n";
		
		//echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}&table=", htmlspecialchars($_REQUEST['table']), "\">{$strCreateRule}</a></p>\n";
	}

	$misc->printHeader($strTables . ' - ' . $_REQUEST['table'] . ' - ' . $strConstraints);
	
	switch ($action) {
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
