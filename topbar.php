<?php

	/**
	 * Top menu for WebDB
	 *
	 * $Id: topbar.php,v 1.3 2003/02/07 17:34:35 xzilla Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
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
			<a class="toplink" href="logout.php" target="_parent"><?php echo $strLogout ?></a>
		</td>
	</tr>
</table>
<?php
	$misc->printFooter();
?>
