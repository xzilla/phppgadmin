<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tblproperties.php,v 1.4 2002/10/25 21:23:18 xzilla Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');

	$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';
	$PHP_SELF = $_SERVER['PHP_SELF'];

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

			echo <<<EOF
		<table border=0>
		<tr>
		<th>Keyname</th>
		<th>Unique</th>

		<th>Primary</th>
		<th>Field</th>
				<th>Action</th>
				</tr>
		<tr>			<td>med_practice_pkey</td>
			<td>Yes</td>

			<td>Yes</td>
			<td>med_practice_id</td>
						<td><a href="sql.php?server=2&db=mojo5&table=med_practice&goto=tbl_properties.php&sql_query=DROP+INDEX+%22med_practice_pkey%22&zero_rows=">Drop</a></td>
			</tr></table>
<div align="left">
<ul>
<li><a href="tbl_properties.php?printview=1&server=2&db=mojo5&table=med_practice&goto=tbl_properties.php">Print</a>

<li><a href="sql.php?sql_query=SELECT+%2A+FROM+%22med_practice%22&server=2&db=mojo5&table=med_practice&goto=tbl_properties.php">Browse</a>
<li><a href="tbl_select.php?server=2&db=mojo5&table=med_practice&goto=tbl_properties.php">Select</a>
<li><a href="tbl_change.php?server=2&db=mojo5&table=med_practice&goto=tbl_properties.php">Insert</a>
<li><a href="sql.php?sql_query=DROP+TABLE+%22med_practice%22&server=2&db=mojo5&goto=db_details.php&reload=true">Drop</a>
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
<!--li><a href="ldi_table.php?server=2&db=mojo5&table=med_practice&goto=tbl_properties.php">Insert textfiles into table</a-->
<li><form method="post" action="tbl_dump.php">View dump (schema) of table<br>
<table>
    <tr>
        <td>

            <input type="radio" name="what" value="structure" checked>Structure only        </td>
        <td>
            <input type="checkbox" name="drop" value="1">Add 'drop table'        </td>
        <td colspan="3">
            <input type="submit" value="Go">
        </td>
    </tr>
    <tr>

        <td>
            <input type="radio" name="what" value="data">Structure and data        </td>
        <td>
            <input type="checkbox" name="asfile" value="sendit">send        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="what" value="csv">CSV data        </td>

        <td>
            terminated by <input type="text" name="separator" size=1 value=";">
        </td>
    </tr>
</table>
EOF;


		}
		else {
			echo "<p>{$strNoTable}</p>\n";
		}
		
		echo "<p><a class=navlink href=\"tables.php?database=", urlencode($_REQUEST['database']), "\">{$strShowAllTables}</a></p>\n";
	}

	echo "<html>\n";
	echo "<body>\n";
	
	switch ($action) {
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
