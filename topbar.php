<?php

	/**
	 * Top menu for phpPgAdmin
	 *
	 * $Id: topbar.php,v 1.12 2003/05/26 11:33:22 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
	$misc->printBody('topbar');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #CECF9C;">
	<tr>
		<td width="211" rowspan="2"><img src="images/themes/<?php echo $conf['theme'] ?>/title.gif" width="211" height="50" alt="<?php echo htmlspecialchars($appName) ?>" /></td>
		<td style="background-color: #CECF9C;" width="5" rowspan="2">&nbsp;</td>
		<td style="background-color: #CECF9C;">
		<?php echo sprintf($lang['strtopbar'], htmlspecialchars($conf['description']),
			htmlspecialchars($conf['servers'][$_SESSION['webdbServerID']]['host']),
			htmlspecialchars($conf['servers'][$_SESSION['webdbServerID']]['port']),
			htmlspecialchars($_SESSION['webdbUsername']), 
			date($lang['strtimefmt'])) ?></td>
	</tr>
	<tr>
		<td style="background-color: #CECF9C;">
<?php
	// For superuser, show user and group admin.  For normal user, show change password.
	if ($data->isSuperUser($_SESSION['webdbUsername'])) :
?>
			<a class="toplink" href="users.php" target="detail"><?php echo $lang['struseradmin'] ?></a> | 
			<a class="toplink" href="groups.php" target="detail"><?php echo $lang['strgroupadmin'] ?></a> |
<?php
	endif;
?>
			<a class="toplink" href="users.php?action=account" target="detail"><?php echo $lang['straccount'] ?></a> |
<?php if ($conf['show_reports']) : ?>
			<a class="toplink" href="reports.php" target="detail"><?php echo $lang['strreports'] ?></a> |
<?php endif; ?>
			<a class="toplink" href="logout.php" target="_parent"><?php echo $lang['strlogout'] ?></a>
		</td>
	</tr>
</table>
<?php
	$misc->printFooter();
?>
