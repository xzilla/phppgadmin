<?php

	/**
	 * Top menu for phpPgAdmin
	 *
	 * $Id: topbar.php,v 1.9 2003/04/21 06:36:23 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
	$misc->printBody('topbar');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="211" rowspan="2"><img src="images/themes/<?php echo $conf['theme'] ?>/title.gif" width="211" height="50" alt="<?php echo htmlspecialchars($appName) ?>" /></td>
		<td width="69%">
		<?php echo sprintf($lang['strtopbar'], htmlspecialchars($conf['servers'][$_SESSION['webdbServerID']]['type']),
			htmlspecialchars($conf['servers'][$_SESSION['webdbServerID']]['host']),
			htmlspecialchars($conf['servers'][$_SESSION['webdbServerID']]['port']),
			htmlspecialchars($_SESSION['webdbUsername']), 
			date($lang['strtimefmt'])) ?></td>
	</tr>
	<tr>
		<td>
			<a class="toplink" href="users.php" target="detail"><?php echo $lang['struseradmin'] ?></a> | 
			<a class="toplink" href="groups.php" target="detail"><?php echo $lang['strgroupadmin'] ?></a> |
			<a class="toplink" href="reports.php" target="detail"><?php echo $lang['strreports'] ?></a> |
			<a class="toplink" href="logout.php" target="_parent"><?php echo $lang['strlogout'] ?></a>
		</td>
	</tr>
</table>
<?php
	$misc->printFooter();
?>
