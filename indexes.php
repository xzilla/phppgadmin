<?php

	/**
	 * List indexes on a table
	 *
	 * $Id: indexes.php,v 1.6 2003/03/12 02:37:19 chriskl Exp $
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
		global $PHP_SELF, $strName, $strDefinition, $strCreateIndex, $strShowAllIndexes, $strSave, $strReset, $strExample;
		global $strTableColumnList, $strIndexColumnList, $strIndexes, $strIndexType, $strIndexName;

		if (!isset($_POST['formIndexName'])) $_POST['formIndexName'] = '';
		if (!isset($_POST['formCols'])) $_POST['formCols'] = '';

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strIndexes} : {$strCreateIndex} </h2>\n";
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
		echo "<tr>";
        echo "<th class=\"data\" colspan=\"3\">{$strIndexName}</th>";
        echo "</tr>";
		echo "<tr>";
		echo "<td class=\"data1\" colspan=\"3\"><input type=\"text\" name=\"formIndexName\" size=\"80\" maxlength=\"300\"/></td></tr>";
		echo "<tr><th class=data>{$strTableColumnList}</th><th class=\"data\">&nbsp;</th><th class=data>{$strIndexColumnList}</th></tr>\n";
		echo "<tr><td class=data1>" . $selColumns->fetch() . "</td>\n";
		echo "<td class=\"data1\">" . $buttonRemove->fetch() . $buttonAdd->fetch() . "</td>";
		echo "<td class=data1>" . $selIndex->fetch() . "</td></tr>\n";
		echo "</table>\n";

		echo "<table> \n";
		echo "<tr>";
		echo "<th class=\"data\">{$strIndexType}</th>";
		echo "<td>" . $selTypes->fetch() . "</td>";
		echo "</tr>";
		echo "</table>";
		

		echo "<p><input type=hidden name=action value=save_create_index>\n";
		echo $misc->form;
		echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
		echo "<input type=submit value=\"{$strSave}\"> <input type=reset value=\"{$strReset}\"></p>\n";
		echo "</form>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?{$misc->href}&table=", urlencode($_REQUEST['table']), 
			"\">{$strShowAllIndexes}</a></p>\n";
	}

	/**
	 * Actually creates the new index in the database
	 * @@ Note: this function can't handle columns with commas in them
	 */
	function doSaveCreateIndex() {
		global $localData;
		global $strIndexNeedsName, $strIndexNeedsCols, $strIndexCreated, $strIndexCreatedBad;


		
		// Check that they've given a name and at least one column
		if ($_POST['formIndexName'] == '') doCreateIndex("{$strIndexNeedsName}");
		elseif ($_POST['IndexColumnList'] == '') doCreate("{$strIndexNeedsCols}");
		else {

			$status = $localData->createIndex($_POST['formIndexName'], $_POST['table'], $_POST['IndexColumnList'], $_POST['formIndexType']);
			if ($status == 0)
				doDefault($strIndexCreated);
			else
				doCreateIndex($strIndexCreatedBad);
		}
	}

	/**
	 * Show confirmation of drop index and perform actual drop
	 */
	function doDropIndex($confirm) {
		global $localData, $database, $misc;
		global $PHP_SELF, $strConfDropIndex, $strIndexDropped, $strIndexDroppedBad, $strYes, $strNo;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ",
				htmlspecialchars($_REQUEST['table']), ": " , htmlspecialchars($_REQUEST['index']), ": Drop</h2>\n";

			echo "<p>", sprintf($strConfDropIndex, htmlspecialchars($_REQUEST['index'])), "</p>\n";

			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop_index>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=hidden name=index value=\"", htmlspecialchars($_REQUEST['index']), "\">\n";
			echo $misc->form;
			echo "<input type=submit name=choice value=\"{$strYes}\"> <input type=submit name=choice value=\"{$strNo}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropIndex($_POST['index'], 'RESTRICT');
			if ($status == 0)
				doDefault($strIndexDropped);
			else
				doDefault($strIndexDroppedBad);
		}

	}

	function doDefault($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF;
		global $strNoIndexes, $strIndexes, $strActions, $strName, $strDefinition, $strCreateIndex, $strDrop;

		$misc->printTableNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), ": {$strIndexes}</h2>\n";
		$misc->printMsg($msg);

		$indexes = &$localData->getIndexes($_REQUEST['table']);
		
		if ($indexes->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strName}</th><th class=\"data\">{$strDefinition}</th><th class=\"data\">{$strActions}</th>\n";
			$i = 0;
			
			while (!$indexes->EOF) {
				$id = ( ($i % 2 ) == 0 ? '1' : '2' );
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $indexes->f[$data->ixFields['idxname']]), "</td>";
				echo "<td class=\"data{$id}\">", htmlspecialchars( $indexes->f[$data->ixFields['idxdef']]), "</td>";
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop_index&{$misc->href}&index=", htmlspecialchars( $indexes->f[$data->ixFields['idxname']]), 
					"&table=", htmlspecialchars($_REQUEST['table']), "\">{$strDrop}</td></tr>\n";

				$indexes->movenext();
				$i++;
			}

			echo "</table>\n";
			}
		else
			echo "<p>{$strNoIndexes}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create_index&{$misc->href}&table=", htmlspecialchars($_REQUEST['table']), "\">{$strCreateIndex}</a></p>\n";		
	}

	$misc->printHeader($strIndexes, "<script src=\"indexes.js\" type=\"text/javascript\"></script>");

	echo "<body onload=\"init();\">";
	
	switch ($action) {
		case 'save_create_index':
			doSaveCreateIndex();
			break;
		case 'create_index':
			doCreateIndex();
			break;
		case 'drop_index':
			if ($_POST['choice'] == $strYes) doDropIndex(false);
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
