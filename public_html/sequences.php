<?php
/**
 *  FILENAME:   sequence.php
 *  AUTHOR:     Ray Hunter <rhunter@venticon.com>
 *
 *  $Id: sequences.php,v 1.4 2002/09/26 22:04:18 xzilla Exp $
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
    global $strNoSequences, $strSequences, $strOwner, $strActions;

    echo '<h2>', htmlspecialchars( $_REQUEST['database']), ": Sequences</h2>\n";

    $sequences = &$localData->getSequences();

    if( $sequences->recordCount() > 0 )
    {
        echo "<table>\n";
        echo "<tr><th class=\"data\">{$strSequences}</th><th class=\"data\">{$strOwner}</th><th colspan=\"3\" class=\"data\">{$strActions}</th>\n";
        $i = 0;

        while( !$sequences->EOF )
        {
            $id = ( ($i % 2 ) == 0 ? '1' : '2' );
            echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]), "</td>";
			echo "<td class=\"data{$id}\">", htmlspecialchars( $sequences->f[$data->sqFields['seqowner']]), "</td>";
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=properties&database=", htmlspecialchars($_REQUEST['database']), "&sequence=", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]), "\">Properties</a></td>\n"; 
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=drop&database=", htmlspecialchars($_REQUEST['database']), "&sequence=", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]), "\">Drop</td>\n"; 
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=priviledges&database=", htmlspecialchars($_REQUEST['database']), "&sequence=", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]), "\">Privileges</td></tr>\n"; 

			$sequences->movenext();
			$i++;
        }

        echo "</table>\n";
    }
    else
    {
        echo "<p>{$strNoSequences}</p>\n";
    }
    
    echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&database=", urlencode( $_REQUEST['database'] ), "\">Create Sequence</a></p>\n";

}
// }}}

	function doProperties($msg = '') 
	{
		global $data, $localData, $misc, $PHP_SELF;
		global $strSequences, $strSequenceName, $strLastValue, $strIncrementBy, $strMaxValue, $strMinValue, $strCacheValue, $strLogCount, $strIsCycled, $strIsCalled;

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": $strSequences : ", htmlspecialchars($_REQUEST['sequence']), ": Properties</h2>\n";
		$misc->printMsg($msg);
		
		$sequence = &$localData->getSequence($_REQUEST['sequence']);

	
		if ($sequence->recordCount() > 0) {

			echo"<table border=0>";
			echo "<tr><th class=\"data\">$strSequenceName</th><th class=\"data\">$strLastValue</th><th class=\"data\">$strIncrementBy</th><th class=\"data\">$strMaxValue</th><th class=\"data\">$strMinValue</th><th class=\"data\">$strCacheValue</th><th class=\"data\">$strLogCount</th><th class=\"data\">$strIsCycled</th><th class=\"data\">$strIsCalled</th></tr>";
			echo "<tr>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['seqname']], "</td>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['lastvalue']], "</td>";
			echo "<td class=\"data1\">", $sequence->f[$data->sqFields['incrementby']], "</td>";
			echo "<td class=\"data1\">&nbsp;2147483647&nbsp;</td>";
			echo "<td class=\"data1\">&nbsp;1&nbsp;</td>";
			echo "<td class=\"data1\">&nbsp;1&nbsp;</td>";
			echo "<td class=\"data1\">&nbsp;0&nbsp;</td>";
			echo "<td class=\"data1\">&nbsp;No&nbsp;</td>";
			echo "<td class=\"data1\">&nbsp;Yes&nbsp;</td>";
			echo "</tr>";
			echo "</table>";		

		}
		else echo "<p>No data.</p>\n";
	}


	function doPrivileges()
	{

	}

	function doDrop()
	{

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
		doDrop();
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
