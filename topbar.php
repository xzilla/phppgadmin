<?php

	/**
	 * Top menu for phpPgAdmin
	 *
	 * $Id: topbar.php,v 1.14 2003/07/31 08:39:03 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
	$misc->printBody('topbar');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="topbar">
	<tr>
		<td width="211" rowspan="2"><img src="images/themes/<?php echo $conf['theme'] ?>/title.gif" width="211" height="50" alt="<?php echo htmlspecialchars($appName) ?>" /></td>
		<td class="topbar" width="5" rowspan="2">&nbsp;</td>
		<td class="topbar">
		<?php echo sprintf($lang['strtopbar'], htmlspecialchars($conf['description']),
			htmlspecialchars($conf['servers'][$_SESSION['webdbServerID']]['host']),
			htmlspecialchars($conf['servers'][$_SESSION['webdbServerID']]['port']),
			htmlspecialchars($_SESSION['webdbUsername']), 
			date($lang['strtimefmt'])) ?></td>
	</tr>
	<tr>
		<td class="topbar">
<?php
	// For superuser, show user and group admin.  For normal user, show change password.
	if ($data->isSuperUser($_SESSION['webdbUsername'])) :
?>
			<a class="toplink" href="users.php" target="detail"><?php echo $lang['strusers'] ?></a> | 
			<a class="toplink" href="groups.php" target="detail"><?php echo $lang['strgroups'] ?></a> |
<?php
	endif;
?>
			<a class="toplink" href="users.php?action=account" target="detail"><?php echo $lang['straccount'] ?></a> |
<?php if ($conf['show_reports']) : ?>
			<a class="toplink" href="reports.php" target="detail"><?php echo $lang['strreports'] ?></a> |
<?php endif; ?>
			<a class="toplink" href="sqledit" target="sqledit"					
				onclick="window.open('sqledit.php','sqledit','toobar=no,width=700,height=420,resizable=yes,scrollbars=yes').focus(); return false;"><?php echo $lang['strsql'] ?></a> |
			<a class="toplink" href="logout.php" target="_parent"><?php echo $lang['strlogout'] ?></a>
		</td>
	</tr>
</table>
<?php
	$misc->printFooter();
?>
