<?php

	/**
	 * List tables in a database
	 *
	 * $Id: tables.php,v 1.2 2002/04/10 04:09:47 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
	
	if (!isset($action)) $action = '';
	
?>

<html>
<body>

<?php

switch ($action) {
	case 'browse':		
		echo "<h2>", htmlspecialchars($database), ": ", htmlspecialchars($table), "</h2>\n";
		$rs = &$localData->browseTable($table, $offset, $limit);
		
		if ($rs->recordCount() > 0) {
			echo "<table>\n<tr>";
			reset($rs->f);
			while(list($k, ) = each($rs->f)) {
				echo "<th class=data>", htmlspecialchars($k), "</td>";
			}			
			echo "<th colspan=2 class=data>{$strActions}</th>\n";
			
			$i = 0;
			reset($rs->f);
			while (!$rs->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr>\n";
				while(list(, $v) = each($rs->f)) {
					echo "<td class=data{$id} nowrap>", nl2br(htmlspecialchars($v)), "</td>";
				}							
				echo "<td class=opbutton{$id}>Edit</td>\n";
				echo "<td class=opbutton{$id}>Delete</td>\n";
				echo "</tr>\n";
				$rs->moveNext();
				$i++;
			}
		}
		else echo "<p>No data.</p>\n";
			
		break;
	default:
		echo "<h2>", htmlspecialchars($database), "</h2>\n";
		
		$tables = &$localData->getTables();
		
		if ($tables->recordCount() > 0) {
			echo "<table>\n";
			echo "<tr><th class=data>{$strTable}</th><th class=data>{$strOwner}</th><th colspan=6 class=data>{$strActions}</th>\n";
			$i = 0;
			while (!$tables->EOF) {
				$id = (($i % 2) == 0 ? '1' : '2');
				echo "<tr><td class=data{$id}>", htmlspecialchars($tables->f[$data->tbFields['tbname']]), "</td>\n";
				echo "<td class=data{$id}>", htmlspecialchars($tables->f[$data->tbFields['tbowner']]), "</td>\n";
				echo "<td class=opbutton{$id}><a href=\"$PHP_SELF?action=browse&offset=0&limit=30&database=", 
					htmlspecialchars($database), "&table=", htmlspecialchars($tables->f[$data->tbFields['tbname']]), "\">Browse</a></td>\n";
				echo "<td class=opbutton{$id}>Select</td>\n";
				echo "<td class=opbutton{$id}>Insert</td>\n";
				echo "<td class=opbutton{$id}>Properties</td>\n";
				echo "<td class=opbutton{$id}>Empty</td>\n";
				echo "<td class=opbutton{$id}>Drop</td>\n";
				echo "</tr>\n";
				$tables->moveNext();
				$i++;
			}
		}
		else {
			echo "<p>{$strNoTables}</p>\n";
		}
		break;
}	
	
?>
</body>
</html>