<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.11 2004/09/23 12:06:46 soranzo Exp $
	 */

	// Include application functions (no db conn)
	$_no_db_connection = true;
	include_once('./libraries/lib.inc.php');
	
	$misc->printHeader();
	$misc->printBody();
?>

<h1><?php echo $appName ?></h1>

<p><?php echo $lang['strintro'] ?></p>

<ul>
<li><b><a href="http://phppgadmin.sourceforge.net/" target="_top"><?php echo $lang['strppahome'] ?></a></b></li>
<li><b><a href="<?php echo $lang['strpgsqlhome_url'] ?>" target="_top"><?php echo $lang['strpgsqlhome'] ?></a></b></li>
<?php
	//if ( isset($conf['docdir'])) {
	//	echo "<li><b><a href=\"". $conf['docdir'] ."\" target=\"_top\">";
	//	echo $lang['strlocaldocs'] ."</a></b></li>";
	//}
?>
<li><b><a href="http://sourceforge.net/tracker/?group_id=37132&amp;atid=418980" target="_top"><?php echo $lang['strreportbug'] ?></a></b></li>
<li><b><a href="<?php echo $lang['strviewfaq_url'] ?>" target="_top"><?php echo $lang['strviewfaq'] ?></a></b></li>
</ul>

<?php
	$misc->printFooter();
?>
