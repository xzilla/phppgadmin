<?php
/**
 *  FILENAME:   operators.php
 *
 *  $Id: operators.php,v 1.3 2003/03/01 00:53:51 slubek Exp $
 */

include_once( 'libraries/lib.inc.php' );

$action = ( isset( $_REQUEST['action'] ) ) ? $_REQUEST['action'] : '';

if( !isset( $msg) )
{
    $msg = '';
}    

$PHP_SELF = $_SERVER['PHP_SELF'];

function doDefault()
{
    global $data, $localData, $misc, $database, $operators; 
    global $PHP_SELF;
    global $strNooperators, $stroperators, $strOwner, $strActions;

    echo '<h2>', htmlspecialchars( $_REQUEST['database']), ": operators</h2>\n";

    $operators = &$localData->getoperators();

    if( $operators->recordCount() > 0 )
    {
        echo "<table>\n";
        echo "<tr><th class=\"data\">{$stroperators}</th><th colspan=\"3\" class=\"data\">{$strActions}</th>\n";
        $i = 0;

        while( !$operators->EOF )
        {
            $id = ( ($i % 2 ) == 0 ? '1' : '2' );
            echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $operators->f[$data->opFields['idxname']]), "</td>";
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=properties&database=", htmlspecialchars($_REQUEST['database']), "&operators=", htmlspecialchars( $operators->f[$data->opFields['idxname']]), "\">Properties</a></td>\n"; 
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&database=", htmlspecialchars($_REQUEST['database']), "&operators=", htmlspecialchars( $operators->f[$data->opFields['idxname']]), "\">Drop</td>\n"; 
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=priviledges&database=", htmlspecialchars($_REQUEST['database']), "&operators=", htmlspecialchars( $operators->f[$data->opFields['idxname']]), "\">Privileges</td></tr>\n"; 

			$operators->movenext();
			$i++;
        }

        echo "</table>\n";
    }
    else
    {
        echo "<p>{$strNooperators}</p>\n";
    }
    
    echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&database=", urlencode( $_REQUEST['database'] ), "\">Create operators</a></p>\n";

}
// }}}

	function doProperties($msg = '') 
	{
		global $data, $localData, $misc, $PHP_SELF;
		global $stroperators, $stroperatorsName, $strTabName, $strColumnName, $strUniqueKey, $strPrimaryKey;

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": $stroperators : ", htmlspecialchars($_REQUEST['operators']), ": Properties</h2>\n";
		$misc->printMsg($msg);
		
		$operators = &$localData->getoperators($_REQUEST['operators']);

	
		if ($operators->recordCount() > 0) {

			echo"<table border=0>";
			echo "<tr><th class=\"data\">$stroperatorsName</th><th class=\"data\">$strTabName</th><th class=\"data\">$strColumnName</th><th class=\"data\">$strUniqueKey</th><th class=\"data\">$strPrimaryKey</th></tr>";
			echo "<tr>";
			echo "<td class=\"data1\">", $operators->f[$data->opFields['idxname']], "</td>";
			echo "<td class=\"data1\">", $operators->f[$data->opFields['tabname']], "</td>";
			echo "<td class=\"data1\">", $operators->f[$data->opFields['columnname']], "</td>";
			echo "<td class=\"data1\">", $operators->f[$data->opFields['uniquekey']], "</td>";
			echo "<td class=\"data1\">", $operators->f[$data->opFields['primarykey']], "</td>";
			echo "</tr>";
			echo "</table>";
			echo "<br /><br />";
		}
		else echo "<p>No data.</p>\n";
	}


	function doPrivileges()
	{
		global $localData, $database;
		global $PHP_SELF, $stroperators ;
	}

	function doDrop($confirm)
	{
		global $localData, $database;
		global $PHP_SELF, $stroperators, $strDropped, $strDrop, $strFailed;
	
		if ($confirm) { 
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": $stroperators : ", htmlspecialchars($_REQUEST['operators']), ": Drop</h2>\n";
			
			echo "<p>Are you sure you want to drop the operators \"", htmlspecialchars($_REQUEST['operators']), "\"?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=operators value=\"", htmlspecialchars($_REQUEST['operators']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropoperators($_POST['operators']);
			if ($status == 0)
				doDefault("$stroperators $strDropped.");
			else
				doDefault("$stroperators $strDrop $strFailed.");
		}

	}


$misc->printHeader($strOperators);
$misc->printBody();

switch( $action )
{
	case 'create':
        	echo "<p>Creating operators</p>";
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

$misc->printFooter();

?>
