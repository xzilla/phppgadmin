<?php
/**
 *  FILENAME:   sequence.php
 *  AUTHOR:     Ray Hunter <rhunter@venticon.com>
 *
 *  $Id: indicies.php,v 1.1 2002/10/07 22:00:20 xzilla Exp $
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
    global $data, $localData, $misc, $database, $sequences; 
    global $PHP_SELF;
    global $strNoIndicies, $strIndicies, $strOwner, $strActions;

    echo '<h2>', htmlspecialchars( $_REQUEST['database']), ": Indicies</h2>\n";

    $sequences = &$localData->getIndicies();

    if( $sequences->recordCount() > 0 )
    {
        echo "<table>\n";
        echo "<tr><th class=\"data\">{$strIndicies}</th><th colspan=\"3\" class=\"data\">{$strActions}</th>\n";
        $i = 0;

        while( !$sequences->EOF )
        {
            $id = ( ($i % 2 ) == 0 ? '1' : '2' );
            echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]), "</td>";
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=properties&database=", htmlspecialchars($_REQUEST['database']), "&sequence=", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]), "\">Properties</a></td>\n"; 
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&database=", htmlspecialchars($_REQUEST['database']), "&sequence=", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]), "\">Drop</td>\n"; 
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=priviledges&database=", htmlspecialchars($_REQUEST['database']), "&sequence=", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]), "\">Privileges</td></tr>\n"; 

			$sequences->movenext();
			$i++;
        }

        echo "</table>\n";
    }
    else
    {
        echo "<p>{$strNoIndicies}</p>\n";
    }
    
    echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&database=", urlencode( $_REQUEST['database'] ), "\">Create Sequence</a></p>\n";

}
// }}}

	function doProperties($msg = '') 
	{
		global $data, $localData, $misc, $PHP_SELF;
		global $strIndicies, $strSequenceName, $strLastValue, $strIncrementBy, $strMaxValue, $strMinValue, $strCacheValue, $strLogCount, $strIsCycled, $strIsCalled, $strReset;

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": $strIndicies : ", htmlspecialchars($_REQUEST['sequence']), ": Properties</h2>\n";
		$misc->printMsg($msg);
		
		$sequence = &$localData->getSequence($_REQUEST['sequence']);

	
		if ($sequence->recordCount() > 0) {

			echo"<table border=0>";
			echo "<tr><th class=\"data\">$strSequenceName</th><th class=\"data\">$strLastValue</th><th class=\"data\">$strIncrementBy</th><th class=\"data\">$strMaxValue</th><th class=\"data\">$strMinValue</th><th class=\"data\">$strCacheValue</th><th class=\"data\">$strLogCount</th><th class=\"data\">$strIsCycled</th><th class=\"data\">$strIsCalled</th></tr>";
			echo "<tr>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['seqname']], "</td>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['lastvalue']], "</td>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['incrementby']], "</td>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['maxvalue']], "</td>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['minvalue']], "</td>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['cachevalue']], "</td>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['logcount']], "</td>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['iscycled']], "</td>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['iscalled']], "</td>";
			echo "</tr>";
			echo "</table>";
			echo "<br /><br />";
			echo "<a href=\"$PHP_SELF?action=reset&database=", htmlspecialchars($_REQUEST['database']), "&sequence=", htmlspecialchars( $sequence->f[$data->sqFields['seqname']]), "\">$strReset</a></td>\n"; 

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
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": $strIndicies : ", htmlspecialchars($_REQUEST['sequence']), ": Drop</h2>\n";
			
			echo "<p>Are you sure you want to drop the sequence \"", htmlspecialchars($_REQUEST['sequence']), "\"?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=sequence value=\"", htmlspecialchars($_REQUEST['sequence']), "\">\n";
			echo "<input type=hidden name=database value=\"", htmlspecialchars($_REQUEST['database']), "\">\n";
			echo "<input type=submit name=choice value=\"Yes\"> <input type=submit name=choice value=\"No\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropSequence($_POST['sequence']);
			if ($status == 0)
				doDefault("$strSequence $strDropped.");
			else
				doDefault("$strSequence $strDrop $strFailed.");
		}

	}


	function doReset()
	{
		global $localData, $database;
		global $PHP_SELF, $strSequence, $strDropped, $strDrop, $strFailed;

		$status = $localData->resetSequence($_REQUEST['sequence']);
		if ($status == 0)
			doProperties("$strSequence has been reset");
		else	
			doProperties("$strSequence $strReset $strFailed");
	}

echo "<html>\n";
echo "<body>\n";

switch( $action )
{
	case 'create':
        	echo "<p>Creating sequence</p>";
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
	case 'reset':
		doReset();
		break;
    	default:
        	doDefault();
        	break;
}

echo "</body>\n";
echo "</html>\n";

?>
