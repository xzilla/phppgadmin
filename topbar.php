<?php

	/**
	 * Top menu for phpPgAdmin
	 *
	 * $Id: topbar.php,v 1.6 2003/03/10 02:15:14 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
	$misc->printBody('topbar');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="211" rowspan="2"><img src="images/themes/<?php echo $guiTheme ?>/title.gif" width="211" height="50" alt="<?php echo htmlspecialchars($appName) ?>" /></td>
		<td width="69%">
		<?php echo sprintf($strTopBar, htmlspecialchars($confServers[$_SESSION['webdbServerID']]['type']),
			htmlspecialchars($confServers[$_SESSION['webdbServerID']]['host']),
			htmlspecialchars($confServers[$_SESSION['webdbServerID']]['port']),
			htmlspecialchars($_SESSION['webdbUsername']), 
			htmlspecialchars(date($strTimeFmt))) ?></td>
	</tr>
	<tr>
		<td>
			<a class="toplink" href="users.php" target="detail"><?php echo $strUserAdmin ?></a> | 
			<a class="toplink" href="groups.php" target="detail"><?php echo $strGroupAdmin ?></a> |
			<a class="toplink" href="reports.php" target="detail"><?php echo $strReports ?></a> |
			<a class="toplink" href="logout.php" target="_parent"><?php echo $strLogout ?></a>
		</td>
	</tr>
</table>
<?php
	$misc->printFooter();
?>
