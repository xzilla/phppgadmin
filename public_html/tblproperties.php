<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tblproperties.php,v 1.6 2002/11/14 01:04:38 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

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
		global $strKeyName, $strUnique, $strField, $strAction, $strPrimary;

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

		echo "<table border=0>\n";
		echo "<tr>\n";
		echo "<th>$strKeyName</th>\n";
		echo "<th>$strUnique</th>\n";
		echo "<th>$strPrimary</th>\n";
		echo "<th>$strField</th>\n";
		echo "<th>$strAction</th>\n";
		echo "</tr>\n";

		$keys = &$localData->getTableKeys($_REQUEST['table']);

		if ($keys->recordCount() > 0) {

			$keys->f['unique_key'] = $localData->phpBool($keys->f['unique_key']);
			$keys->f['primary_key'] = $localData->phpBool($keys->f['primary_key']);

			echo "<tr>\n";
			echo "<td>", htmlspecialchars($keys->f['index_name']), "</td>\n";
			echo "<td>", ($keys->f['unique_key'] ? 'Yes' : 'strNo'), "</td>\n";
			echo "<td>", ($keys->f['primary_key'] ? 'Yes' : 'strNo'), "</td>\n";
			echo "<td>", htmlspecialchars($keys->f['column_name']), "</td>\n";
			echo "<td><a href=\"\">$strDrop</a></td>\n";
			echo "</tr></table>\n";
		} else {
			echo '<tr><td>No Keys Found</td></tr>';
		}
	
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

echo <<<EOF

<li><a href="tbl_privilege.php?server=2&db=mojo5&table=med_practice&goto=tbl_properties.php">Privileges</a>
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
		
		echo "<p><a class=navlink href=\"tables.php?database=", urlencode($_REQUEST['database']), "\">{$strShowAllTables}</a></p>\n";
	}

	function doNav() {
		global $PHP_SELF;
		
		$vars = 'database=' . urlencode($_REQUEST['database']) . '&table=' . urlencode($_REQUEST['table']);
		
		echo "<table class=\"navbar\" border=\"0\" width=\"100%\" cellpadding=\"5\" cellspacing=\"3\">\n";
		echo "<tr><td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}\">Columns</a></td>";
		echo "<td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}&action=indexes\">Indexes</a></td>";
		echo "<td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}&action=constraints\">Constraints</a></td>";
		echo "<td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}&action=triggers\">Triggers</a></td>";
		echo "<td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}&action=rules\">Rules</a></td>";
		echo "<td width=\"17%\"><a href=\"{$PHP_SELF}?{$vars}&action=export\">Export</a></td></tr>";
		echo "</table>\n";
	}	

	echo "<html>\n";
	echo "<body>\n";
	
	switch ($action) {
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
