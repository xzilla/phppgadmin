<?php
/**
 *  FILENAME:   sequence.php
 *  AUTHOR:     Ray Hunter <rhunter@venticon.com>
 *
 *  $Id: sequences.php,v 1.1 2002/07/25 13:22:51 shunter10 Exp $
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
    global $data, $localData, $misc, $database; 
    global $PHP_SELF;
    global $strNoSequences, $strSequences, $strOwner, $strActions;

    echo '<h2>', htmlspecialchars( $_REQUEST['database']), ": Sequences</h2>\n";

    $sequences = &$localData->getSequences();

    if( $sequences->recordCount() > 0 )
    {
        echo "<table>\n";
        echo "<tr><th class=\"data\">{$strSequences}</th><th class=\"data\">{$strOwner}</th><th colspan=\"4\" class=\"data\">{$strActions}</th>\n";
        $i = 0;
        /*
        while( !$sequences->EOF )
        {
            $id = ( ($i % 2 ) == 0 ? '1' : '2' );
            //echo "<tr><td class=\"data{$id}", htmlspecialchars( $sequences->f[$data->seqFields['seqname']]), "</td>\n"; 
        }
        */
    }
    else
    {
        echo "<p>{$strNoSequences}</p>\n";
    }
    
    echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&database=", urlencode( $_REQUEST['database'] ), "\">Create Sequence</a></p>\n";

}
// }}}


echo "<html>\n";
echo "<body>\n";

switch( $action )
{
    case 'create':
        echo "<p>Creating sequence</p>";
        break;
    default:
        doDefault();
        break;
}

echo "</body>\n";
echo "</html>\n";

?>
