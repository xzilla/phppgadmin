<?php
/**
 *  FILENAME:   operators.php
 *
 *  $Id: operators.php,v 1.4 2003/03/17 05:20:30 chriskl Exp $
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
    global $PHP_SELF, $lang;
    global $strnooperators, $stroperators;

    echo '<h2>', htmlspecialchars( $_REQUEST['database']), ": operators</h2>\n";

    $operators = &$localData->getoperators();

    if( $operators->recordCount() > 0 )
    {
        echo "<table>\n";
        echo "<tr><th class=\"data\">{$stroperators}</th><th colspan=\"3\" class=\"data\">{$lang['stractions']}</th>\n";
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
        echo "<p>{$strnooperators}</p>\n";
    }
    
    echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&database=", urlencode( $_REQUEST['database'] ), "\">Create operators</a></p>\n";

}
// }}}

	function doProperties($msg = '') 
	{
		global $data, $localData, $misc, $PHP_SELF;
		global $stroperators, $stroperatorsName, $lang;

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": $stroperators : ", htmlspecialchars($_REQUEST['operators']), ": Properties</h2>\n";
		$misc->printMsg($msg);
		
		$operators = &$localData->getoperators($_REQUEST['operators']);

	
		if ($operators->recordCount() > 0) {

			echo"<table border=0>";
			echo "<tr><th class=\"data\">$stroperatorsName</th><th class=\"data\">$lang['strtabname']</th><th class=\"data\">$lang['strcolumnname']</th><th class=\"data\">$lang['struniquekey']</th><th class=\"data\">$lang['strprimarykey']</th></tr>";
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
		global $PHP_SELF, $stroperators, $lang;
	
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
				doDefault("$stroperators $lang['strdropped'].");
			else
				doDefault("$stroperators $lang['strdrop'] $lang['strfailed'].");
		}

	}


$misc->printHeader($lang['stroperators']);
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
