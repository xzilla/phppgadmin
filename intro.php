<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.6 2003/05/20 09:01:58 chriskl Exp $
	 */

	// Include application functions (no db conn)
	$_no_db_connection = true;
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
	$misc->printBody();
?>

<h1><?php echo $appName ?></h1>

<p><?php echo $lang['strintro'] ?></p>

<ul>
<li><b><a href="http://phppgadmin.sourceforge.net/" target="_top"><?php echo $lang['strppahome'] ?></a></b></li>
<li><b><a href="<?php echo $lang['strviewfaq_url'] ?>" target="_top"><?php echo $lang['strpgsqlhome'] ?></a></b></li>
<li><b><a href="http://sourceforge.net/tracker/?group_id=37132&amp;atid=418980" target="_top"><?php echo $lang['strreportbug'] ?></a></b></li>
<li><b><a href="<?php echo $lang['strviewfaq_url'] ?>" target="_top"><?php echo $lang['strviewfaq'] ?></a></b></li>
</ul>

</p>
<?php
	$misc->printFooter();
?>
