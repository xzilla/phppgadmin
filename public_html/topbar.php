<?php

	/**
	 * Top menu for WebDB
	 *
	 * $Id: topbar.php,v 1.13 2003/01/09 01:55:43 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
	
	$misc->printHeader();
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="211" rowspan="2"><img src="images/themes/<?php echo $guiTheme ?>/title.gif" width="211" height="50" alt="<?php echo htmlspecialchars($appName) ?>" /></td>
		<td width="69%"><?php echo $confServers[$_SESSION['webdbServerID']]['type'] ?> running on 
		<?php echo htmlspecialchars($confServers[$_SESSION['webdbServerID']]['host']) ?>:<?php echo $confServers[$_SESSION['webdbServerID']]['port'] ?>
		-- You are logged in as user <b><?php echo htmlspecialchars($_SESSION['webdbUsername']) ?></b>, 
			<?php echo date('jS M, Y g:iA') ?></td>
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
