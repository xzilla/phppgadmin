<?php
/**
 *  FILENAME:   sequence.php
 *
 *  $Id: sequences.php,v 1.6 2003/03/17 05:20:30 chriskl Exp $
 */

include_once( 'libraries/lib.inc.php' );

$action = ( isset( $_REQUEST['action'] ) ) ? $_REQUEST['action'] : '';

if( !isset( $msg) )
{
    $msg = '';
}    

$PHP_SELF = $_SERVER['PHP_SELF'];

// {{{ doDefault()
function doDefault($msg='')
{
    global $data, $localData, $misc, $database, $sequences; 
    global $PHP_SELF, $lang;

    echo '<h2>', htmlspecialchars( $_REQUEST['database']), ": {$lang['strsequences']}</h2>\n";
	$misc->printMsg($msg);
  
	$sequences = &$localData->getSequences();

    if( $sequences->recordCount() > 0 )
    {
        echo "<table>\n";
        echo "<tr><th class=\"data\">{$lang['strsequences']}</th><th class=\"data\">{$lang['strowner']}</th><th colspan=\"3\" class=\"data\">{$lang['stractions']}</th>\n";
        $i = 0;

        while( !$sequences->EOF )
        {
            $id = ( ($i % 2 ) == 0 ? '1' : '2' );
            echo "<tr><td class=\"data{$id}\">", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]), "</td>";
			echo "<td class=\"data{$id}\">", htmlspecialchars( $sequences->f[$data->sqFields['seqowner']]), "</td>";
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=properties&{$misc->href}&sequence=", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]), "\">{$lang['strproperties']}</a></td>\n"; 
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"$PHP_SELF?action=confirm_drop&{$misc->href}&sequence=", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]), "\">{$lang['strdrop']}</td>\n"; 
			echo "<td class=\"data{$id}\">";
				echo "<a href=\"privileges.php?{$misc->href}&object=", htmlspecialchars( $sequences->f[$data->sqFields['seqname']]),
					"&type=sequence\">{$lang['strprivileges']}</td></tr>\n";

			$sequences->movenext();
			$i++;
        }

        echo "</table>\n";
    }
    else
    {
        echo "<p>{$lang['strnosequences']}</p>\n";
    }
    
    echo "<p><a class=\"navlink\" href=\"$PHP_SELF?action=create&{$misc->href}\">{$lang['strcreatesequence']}</a></p>\n";

}
// }}}

	function doProperties($msg = '') 
	{
		global $data, $localData, $misc, $PHP_SELF;
		global $lang;

		echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strsequences']} : ", htmlspecialchars($_REQUEST['sequence']), ": {$lang['strproperties']}</h2>\n";
		$misc->printMsg($msg);
		
		$sequence = &$localData->getSequence($_REQUEST['sequence']);

	
		if ($sequence->recordCount() > 0) {

			echo"<table border=0>";
			echo "<tr><th class=\"data\">{$lang['strsequencename']}</th><th class=\"data\">{$lang['strlastvalue']}</th><th class=\"data\">{$lang['strincrementby']}</th><th class=\"data\">{$lang['strmaxvalue']}</th><th class=\"data\">{$lang['strminvalue']}</th><th class=\"data\">{$lang['strcachevalue']}</th><th class=\"data\">{$lang['strlogcount']}</th><th class=\"data\">{$lang['striscycled']}</th><th class=\"data\">{$lang['striscalled']}</th></tr>";
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
			echo "<a href=\"$PHP_SELF?action=reset&{$misc->href}&sequence=", htmlspecialchars( $sequence->f[$data->sqFields['seqname']]), "\">{$lang['strreset']}</a></td>\n"; 

		}
		else echo "<p>{$lang['strnodata']}.</p>\n";
	}


	function doPrivileges()
	{
		global $localData, $database;
		global $PHP_SELF, $lang;
	}

	function doDrop($confirm)
	{
		global $localData, $database, $misc;
		global $PHP_SELF, $lang;
	
		if ($confirm) { 
			echo "<h2>", htmlspecialchars($_REQUEST['database']), ": {$lang['strsequences']} : ", htmlspecialchars($_REQUEST['sequence']), ": {$lang['strdrop']}</h2>\n";
			
			echo "<p>", sprintf($lang['strconfdropsequence'], htmlspecialchars($_REQUEST['sequence'])), "?</p>\n";
			
			echo "<form action=\"$PHP_SELF\" method=\"post\">\n";
			echo "<input type=hidden name=action value=drop>\n";
			echo "<input type=hidden name=sequence value=\"", htmlspecialchars($_REQUEST['sequence']), "\">\n";
			echo $misc->form;
			echo "<input type=submit name=choice value=\"{$lang['stryes']}\"> <input type=submit name=choice value=\"{$lang['strno']}\">\n";
			echo "</form>\n";
		}
		else {
			$status = $localData->dropSequence($_POST['sequence']);
			if ($status == 0)
				doDefault("{$lang['strsequencedropped']}.");
			else
				doDefault("{$lang['strsequencedroppedbad']}.");
		}

	}


	function doReset()
	{
		global $localData, $database;
		global $PHP_SELF, $lang;

		$status = $localData->resetSequence($_REQUEST['sequence']);
		if ($status == 0)
			doProperties("{$lang['strsequence']} has been reset");
		else	
			doProperties("{$lang['strsequence']} {$lang['strreset']} {$lang['strfailed']}");
	}

$misc->printHeader($lang['strsequences']);
	$misc->printBody();

switch( $action )
{
	case 'create':
        	echo "<p>Creating sequence</p>";
        	break;
	case 'properties':
		doProperties();	
		break;
	case 'drop':
		if ($_POST['choice'] == $lang['stryes']) doDrop(false);
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

$misc->printFooter();

?>
