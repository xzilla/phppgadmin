<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tblproperties.php,v 1.10 2002/12/19 22:27:38 xzilla Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

	function doTriggers($msg = '') {
		global $data, $localData, $misc; 
		global $PHP_SELF;
		global $strTriggers, $strNoTriggers, $strCreateTrigger, $strActions, $strName, $strPrivileges;
		
		doNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), ": {$strTriggers}</h2>\n";
		$misc->printMsg($msg);

		$triggers = &$localData->getTriggers($_REQUEST['table']);

		if ($triggers->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strName}</th><th colspan=\"3\" class=\"data\">{$strActions}</th>\n";
			$i = 0;

			while (!$triggers->EOF) {
				$id = ( ($i % 2 ) == 0 ? '1' : '2' );
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $triggers->f[$data->tgFields['tgname']]), "</td>";
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=triggerprops&database=", htmlspecialchars($_REQUEST['database']), "&trigger=", htmlspecialchars( $triggers->f[$data->tgFields['tgname']]), "\">Properties</td>\n"; 
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&database=", htmlspecialchars($_REQUEST['database']), "&trigger=", htmlspecialchars( $triggers->f[$data->tgFields['tgname']]), "\">Drop</td>\n"; 
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=priviledges&database=", htmlspecialchars($_REQUEST['database']), "&trigger=", htmlspecialchars( $triggers->f[$data->tgFields['tgname']]), "\">Privileges</td></tr>\n"; 
				
				$triggers->movenext();
				$i++;
			}
			
			echo "</table>\n";
			}
		else
			echo "<p>{$strNoTriggers}</p>\n";

		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=createtrigger&database=",
			urlencode($_REQUEST['database']), "&table=", htmlspecialchars($_REQUEST['table']), "\">{$strCreateTrigger}</a></p>\n";
	}

	/**
	 * Displays a screen where they can enter a new index
	 */
	function doCreateIndex($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $strName, $strDefinition;

		if (!isset($_POST['formIndex'])) $_POST['formIndex'] = '';
		if (!isset($_POST['formCols'])) $_POST['formCols'] = '';

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Indexes: Create Index</h2>\n";
		$misc->printMsg($msg);
		
		echo "<form action=\"$PHP_SELF\" method=post>\n";
		echo "<table width=100%>\n";
		echo "<tr><th class=data>{$strName}</th></tr>\n";
		echo "<tr><td class=data1><input name=formIndex size={$data->_maxNameLen} maxlength={$data->_maxNameLen} value=\"",
			htmlspecialchars($_POST['formIndex']), "\"></td></tr>\n";
		echo "<tr><th class=data>Columns</th></tr>\n";
		echo "<tr><td class=data1><input name=formCols size={$data->_maxNameLen} value=\"",
			htmlspecialchars($_POST['formCols']), "\"> (eg. col1, col2)</td></tr>\n";
		echo "</table>\n";
		echo "<p><input type=hidden name=action value=save_create_index>\n";
		echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
		echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
		echo "<input type=submit value=Save> <input type=reset></p>\n";
		echo "</form>\n";
		
		echo "<p><a class=navlink href=\"$PHP_SELF?database=", urlencode($_REQUEST['database']),
			"&table=", urlencode($_REQUEST['table']), "&action=indicies\">Show All Indexes</a></p>\n";
	}

	/**
	 * Actually creates the new index in the database
	 * @@ Note: this function can't handle columns with commas in them
	 */
	function doSaveCreateIndex() {
		global $localData;

		// Check that they've given a name and at least one column
		if ($_POST['formIndex'] == '') doCreateIndex("Index needs a name.");
		elseif ($_POST['formCols'] == '') doCreate("Index needs at least one column.");
		else {
			$status = $localData->createIndex($_POST['formIndex'], $_POST['table'], explode(',', $_POST['formCols']));
			if ($status == 0)
				doIndicies('Index created.');
			else
				doCreateIndex('Index creation failed.');
		}
	}

	/**
	 * Show confirmation of drop index and perform actual drop
	 */
	function doDropIndex($confirm) {
		global $localData, $database;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ",
				htmlspecialchars($_REQUEST['table']), ": " , htmlspecialchars($_REQUEST['index']), ": Drop</h2>\n";

			echo "<p>Are you sure you want to drop the index \"", htmlspecialchars($_REQUEST['index']),
				"\" from table \"", htmlspecialchars($_REQUEST['table']), "\"?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop_index>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=hidden name=index value=\"", htmlspecialchars($_REQUEST['index']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropIndex($_POST['index'], 'RESTRICT');
			if ($status == 0)
				doIndicies('Index dropped.');
			else
				doIndicies('Index drop failed.');
		}

	}

	function doIndicies($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF;
		global $strNoIndicies, $strIndicies, $strActions, $strName;

		doNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), ": {$strIndicies}</h2>\n";
		$misc->printMsg($msg);

		$indexes = &$localData->getIndexes($_REQUEST['table']);
		
		if ($indexes->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=\"data\">{$strName}</th><th class=\"data\">Definition</th><th colspan=\"2\" class=\"data\">{$strActions}</th>\n";
			$i = 0;
			
			while (!$indexes->EOF) {
				$id = ( ($i % 2 ) == 0 ? '1' : '2' );
				echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $indexes->f[$data->ixFields['idxname']]), "</td>";
				echo "<td class=\"data{$id}\">", htmlspecialchars( $indexes->f[$data->ixFields['idxdef']]), "</td>";
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop_index&database=", htmlspecialchars($_REQUEST['database']), "&index=", htmlspecialchars( $indexes->f[$data->ixFields['idxname']]), 
					"&table=", htmlspecialchars($_REQUEST['table']), "\">Drop</td>\n";
				echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=priviledges_index&database=", htmlspecialchars($_REQUEST['database']), "&index=", htmlspecialchars( $indexes->f[$data->ixFields['idxname']]), "\">Privileges</td></tr>\n";
				
				$indexes->movenext();
				$i++;
			}

			echo "</table>\n";
			}
		else
			echo "<p>{$strNoIndicies}</p>\n";
		
		echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create_index&database=",
			urlencode( $_REQUEST['database'] ), "&table=", htmlspecialchars($_REQUEST['table']), "\">Create Index</a></p>\n";		
	}	

	function doExport($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $strExport;
		
		doNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), ": {$strExport}</h2>\n";
		$misc->printMsg($msg);

		echo "<form action=\"tblexport.php\" method=\"post\">\n";
		echo "<table>\n";
		echo "<tr><th class=data>Format:</th><td><select name=\"format\">\n";
		echo "<option value=\"sql\">SQL</option>\n";
		echo "<option value=\"csv\">CSV</option>\n";
		echo "<option value=\"tab\">Tabbed</option>\n";
		echo "<option value=\"xml\">XML</option>\n";
		echo "</select></td></tr>";
		/*echo "<tr><th class=data>Content:</th><td><select name=\"content\">\n";
		echo "<option value=\"all\">Schema &amp; Data</option>\n";
		echo "<option value=\"schema\">Schema Only</option>\n";
		echo "<option value=\"data\">Data Only</option>\n";
		echo "</select></td></tr>";*/
		echo "<tr><th class=data>OIDS:</th><td><input type=\"checkbox\" name=\"oids\"></td></tr>";
		echo "<tr><th class=data>Download?</th><td><input type=\"checkbox\" name=\"download\"></td></tr>";
		echo "</table>\n";

		echo "<p><input type=hidden name=action value=export>\n";
		echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
		echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
		echo "<input type=submit value=\"{$strExport}\"> <input type=reset></p>\n";
		echo "</form>\n";
	}	

	/**
	 * Displays a screen where they can enter a new table
	 */
	function doProperties($msg = '') {
		global $data, $localData, $misc;
		global $PHP_SELF, $strTables, $strShowAllTables;
		
		if (!isset($_REQUEST['stage'])) $_REQUEST['stage'] = 1;		
		
		switch ($_REQUEST['stage']) {
			case 1:
				global $strField, $strType, $strNotNull, $strDefault, $strAlter;

				echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$strTables}: Alter Column: ",
					htmlspecialchars($_REQUEST['column']), "</h2>\n";
				$misc->printMsg($msg);

				echo "<form action=\"$PHP_SELF\" method=\"post\">\n";

				// Output table header
				echo "<table>\n<tr>";
				echo "<tr><th class=data>{$strField}</th><th class=data>{$strType}</th><th class=data>{$strNotNull}</th><th class=data>{$strDefault}</th></tr>";
				
				$column = &$localData->getTableAttributes($_REQUEST['table'], $_REQUEST['column']);
				$column->f['attnotnull'] = $localData->phpBool($column->f['attnotnull']);
				
				if (!isset($_REQUEST['default'])) {
					$_REQUEST['field'] = $column->f['attname'];
					$_REQUEST['default'] = $column->f['adsrc'];
					if ($column->f['attnotnull']) $_REQUEST['notnull'] = 'YES';
				}				
				
				echo "<tr><td><input name=\"field\" size={$data->_maxNameLen} maxlength={$data->_maxNameLen} value=\"",
					htmlspecialchars($_REQUEST['field']), "\"></td>";
				echo "<td>", htmlspecialchars($column->f['type']), "</td>";
				echo "<td><input type=checkbox name=\"notnull\"", (isset($_REQUEST['notnull'])) ? ' checked' : '', "></td>\n";
				echo "<td><input name=\"default\" size=20 value=\"", 
					htmlspecialchars($_REQUEST['default']), "\"></td>";
				
				echo "</table>\n";
				echo "<input type=hidden name=action value=properties>\n";
				echo "<input type=hidden name=stage value=2>\n";
				echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
				echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
				echo "<input type=hidden name=column value=\"", htmlspecialchars($_REQUEST['column']), "\">\n";
				echo "<input type=submit value=\"{$strAlter}\"> <input type=reset>\n";
				echo "</form>\n";
								
				break;
			case 2:
				global $localData;

				// Check inputs
				if (trim($_REQUEST['field']) == '') {
					$_REQUEST['stage'] = 1;
					doProperties('You must name your field.');
					return;
				}
				
				$status = $localData->alterColumn($_REQUEST['table'], $_REQUEST['column'], $_REQUEST['field'], 
								isset($_REQUEST['notnull']), $_REQUEST['default']);
				if ($status == 0)
					doDefault('Column altered.');
				else {
					$_REQUEST['stage'] = 1;
					doCreate('Column altering failed.');
					return;
				}
				break;
			default:
				echo "<p>Invalid script parameter.</p>\n";
		}
					
		echo "<p><a class=navlink href=\"$PHP_SELF?database=", urlencode($_REQUEST['database']), "\">{$strShowAllTables}</a></p>\n";
	}

	/**
	 * Show confirmation of drop column and perform actual drop
	 */
	function doDrop($confirm) {
		global $localData, $database;
		global $PHP_SELF;

		if ($confirm) {
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": Tables: ", 
				htmlspecialchars($_REQUEST['table']), ": " , htmlspecialchars($_REQUEST['column']), ": Drop</h2>\n";

			echo "<p>Are you sure you want to drop the column \"", htmlspecialchars($_REQUEST['column']),
				"\" from table \"", htmlspecialchars($_REQUEST['table']), "\"?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=table value=\"", htmlspecialchars($_REQUEST['table']), "\">\n";
			echo "<input type=hidden name=column value=\"", htmlspecialchars($_REQUEST['column']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropColumn($_POST['table'], $_POST['column'], 'RESTRICT');
			if ($status == 0)
				doDefault('Column dropped.');
			else
				doDefault('Column drop failed.');
		}
		
	}

	/**
	 * Show default list of tables in the database
	 */
	function doDefault($msg = '') {
		global $data, $localData;
		global $PHP_SELF, $strTable, $strOwner, $strActions, $strNoTables;
		global $strBrowse, $strProperties, $strDrop, $strShowAllTables;
		global $strKeyName, $strUnique, $strField, $strAction, $strPrimary,$strPrivileges;

		doNav();
		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": ", htmlspecialchars($_REQUEST['table']), "</h2>\n";

		$attrs = &$localData->getTableAttributes($_REQUEST['table']);

		if ($attrs->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>Field</th><th class=data>Type</th><th class=data>Not Null</th><th class=data>Default</th><th colspan=2 class=data>{$strActions}</th>\n";
			$i = 0;
			while (!$attrs->EOF) {
				$attrs->f['attnotnull'] = $localData->phpBool($attrs->f['attnotnull']);
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", htmlspecialchars($attrs->f['attname']), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($attrs->f['type']), "</td>\n";
				echo "<td class=data{$id}>", ($attrs->f['attnotnull'] ? 'NOT NULL' : ''), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($attrs->f['adsrc']), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"{$PHP_SELF}?database=",
					htmlspecialchars($_REQUEST['database']), "&table=", htmlspecialchars($_REQUEST['table']),
					"&column=", htmlspecialchars($attrs->f['attname']), "&action=properties\">{$strProperties}</a></td>\n";
				echo "<td class=opbutton{$id}><a href=\"{$PHP_SELF}?database=",
					htmlspecialchars($_REQUEST['database']), "&table=", htmlspecialchars($_REQUEST['table']),
					"&column=", htmlspecialchars($attrs->f['attname']), "&action=confirm_drop\">{$strDrop}</a></td>\n";
				echo "</tr>\n";
				$attrs->moveNext();
				$i++;
			}
			echo "</table>\n";
			echo "<br />\n";

	// For the record, all of these EOF code fragments need to be cleaned up and removed
	
echo <<<EOF
				
<div align="left">
<ul>
<li><a href="tbl_properties.php?printview=1&server=2&db=mojo5&table=med_practice&goto=tbl_properties.php">Print</a>

EOF;

				echo "<li><a href=\"$PHP_SELF?action=confselectrows&database=",
					htmlspecialchars($_REQUEST['database']), "&table=", urlencode($_REQUEST['table']),"\">{$strBrowse}</a></li>\n";
				echo "<li><a href=\"$PHP_SELF?action=confselectrows&database=",
					htmlspecialchars($_REQUEST['database']), "&table=", urlencode($_REQUEST['table']),"\">Select</a></li>\n";
				echo "<li><a href=\"$PHP_SELF?action=confinsertrow&database=",
					htmlspecialchars($_REQUEST['database']), "&table=", urlencode($_REQUEST['table']),"\">Insert</a></li>\n";
				echo "<li><a href=\"$PHP_SELF?action=confirm_drop&database=",
					htmlspecialchars($_REQUEST['database']), "&table=", urlencode($_REQUEST['table']),"\">Drop</a></li>\n";
				echo "<li><a href=\"privileges.php?action=get_privileges&database=",
					htmlspecialchars($_REQUEST['database']), "&object=", urlencode($_REQUEST['table']),"\">$strPrivileges</a></li>\n";

echo <<<EOF

<li>
	<form method="post" action="tbl_addfield.php">
		Add new field: 
		<select name="num_fields">
		<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>		</select>

		<input type="submit" value="Go">
		<input type="hidden" name="table" value="med_practice">
		<input type="hidden" name="db" value="mojo5">
		<input type="hidden" name="server" value="2">
	</form>
<li><a href="ldi_table.php?server=2&db=mojo5&table=med_practice&goto=tbl_properties.php">Insert textfiles into table</a>
<li>
EOF;


		}
		else {
			echo "<p>{$strNoTable}</p>\n";
		}
	}

	function doNav() {
		global $PHP_SELF;

		$vars = 'database=' . urlencode($_REQUEST['database']) . '&table=' . urlencode($_REQUEST['table']);
		
		echo "<table class=\"navbar\" border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"3\">\n";
		echo "<tr><td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}\">Columns</a></td>";
		echo "<td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}&action=indicies\">Indexes</a></td>";
		echo "<td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}&action=constraints\">Constraints</a></td>";
		echo "<td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}&action=triggers\">Triggers</a></td>";
		echo "<td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}&action=rules\">Rules</a></td>";
		echo "<td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}&action=export\">Export</a></td></tr>";
		echo "</table>\n";
	}	

	echo "<html>\n";
	echo "<body>\n";
	
	switch ($action) {
		case 'triggers':
			doTriggers();
			break;
		case 'save_create_index':
			doSaveCreateIndex();
			break;
		case 'create_index':
			doCreateIndex();
			break;
		case 'drop_index':
			if ($_POST['choice'] == 'Yes') doDropIndex(false);
			else doIndicies();
			break;
		case 'confirm_drop_index':
			doDropIndex(true);
			break;
		case 'indicies':
			doIndicies();
			break;
		case 'export':
			doExport();
			break;
		case 'properties':
			doProperties();
			break;
		case 'drop':
			if ($_POST['choice'] == 'Yes') doDrop(false);
			else doDefault();
			break;
		case 'confirm_drop':
			doDrop(true);
			break;
		default:
			doDefault();
			break;
	}	

	echo "</body>\n";
	echo "</html>\n";

?>
