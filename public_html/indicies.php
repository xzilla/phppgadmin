<?php
/**
 *  FILENAME:   index.php
 *
 *  $Id: indicies.php,v 1.4 2002/10/15 20:46:16 xzilla Exp $
 */

include_once( '../conf/config.inc.php' );

$action = ( isset( $_REQUEST['action'] ) ) ? $_REQUEST['action'] : '';

if( !isset( $msg) )
{
    $msg = '';
}    

$PHP_SELF = $_SERVER['PHP_SELF'];

// {{{ doDefault()
function doDefault()
{
    global $data, $localData, $misc, $database, $indexs; 
    global $PHP_SELF;
    global $strNoIndicies, $strIndicies, $strOwner, $strActions;

    echo '<h2>', htmlspecialchars( $_REQUEST['database']), ": Indicies</h2>\n";

    $indexs = &$localData->getIndicies();

    if( $indexs->recordCount() > 0 )
    {
        echo "<table>\n";
        echo "<tr><th class=\"data\">{$strIndicies}</th><th colspan=\"3\" class=\"data\">{$strActions}</th>\n";
        $i = 0;

        while( !$indexs->EOF )
        {
            $id = ( ($i % 2 ) == 0 ? '1' : '2' );
            echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $indexs->f[$data->ixFields['idxname']]), "</td>";
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=properties&database=", htmlspecialchars($_REQUEST['database']), "&index=", htmlspecialchars( $indexs->f[$data->ixFields['idxname']]), "\">Properties</a></td>\n"; 
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&database=", htmlspecialchars($_REQUEST['database']), "&index=", htmlspecialchars( $indexs->f[$data->ixFields['idxname']]), "\">Drop</td>\n"; 
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=priviledges&database=", htmlspecialchars($_REQUEST['database']), "&index=", htmlspecialchars( $indexs->f[$data->ixFields['idxname']]), "\">Privileges</td></tr>\n"; 

			$indexs->movenext();
			$i++;
        }

        echo "</table>\n";
    }
    else
    {
        echo "<p>{$strNoIndicies}</p>\n";
    }
    
    echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&database=", urlencode( $_REQUEST['database'] ), "\">Create index</a></p>\n";

}
// }}}

	function doProperties($msg = '') 
	{
		global $data, $localData, $misc, $PHP_SELF;
		global $strIndicies, $strIndexName, $strTabName, $strColumnName, $strUniqueKey, $strPrimaryKey;

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": $strIndicies : ", htmlspecialchars($_REQUEST['index']), ": Properties</h2>\n";
		$misc->printMsg($msg);
		
		$index = &$localData->getindex($_REQUEST['index']);

	
		if ($index->recordCount() > 0) {

			echo"<table border=0>";
			echo "<tr><th class=\"data\">$strIndexName</th><th class=\"data\">$strTabName</th><th class=\"data\">$strColumnName</th><th class=\"data\">$strUniqueKey</th><th class=\"data\">$strPrimaryKey</th></tr>";
			echo "<tr>";
			echo "<td class=\"data1\">", $index->f[$data->ixFields['idxname']], "</td>";
			echo "<td class=\"data1\">", $index->f[$data->ixFields['tabname']], "</td>";
			echo "<td class=\"data1\">", $index->f[$data->ixFields['columnname']], "</td>";
			echo "<td class=\"data1\">", $index->f[$data->ixFields['uniquekey']], "</td>";
			echo "<td class=\"data1\">", $index->f[$data->ixFields['primarykey']], "</td>";
			echo "</tr>";
			echo "</table>";
			echo "<br /><br />";
		}
		else echo "<p>No data.</p>\n";
	}


	function doPrivileges()
	{
		global $localData, $database;
		global $PHP_SELF, $strIndicies ;
	}

	function doDrop($confirm)
	{
		global $localData, $database;
		global $PHP_SELF, $strIndicies, $strDropped, $strDrop, $strFailed;
	
		if ($confirm) { 
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": $strIndicies : ", htmlspecialchars($_REQUEST['index']), ": Drop</h2>\n";
			
			echo "<p>Are you sure you want to drop the index \"", htmlspecialchars($_REQUEST['index']), "\"?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=index value=\"", htmlspecialchars($_REQUEST['index']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropindex($_POST['index']);
			if ($status == 0)
				doDefault("$strindex $strDropped.");
			else
				doDefault("$strindex $strDrop $strFailed.");
		}

	}


echo "<html>\n";
echo "<body>\n";

switch( $action )
{
	case 'create':
        	echo "<p>Creating index</p>";
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
	case 'privileges':
		doPrivileges();
		break;
    default:
        	doDefault();
        	break;
}

echo "</body>\n";
echo "</html>\n";

?>
