<?php

	/**
	 * Top menu for WebDB
	 *
	 * $Id: topbar.php,v 1.5 2002/05/15 09:57:55 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');

?>

<html>
<body class=topbar>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr> 
		<td width="211" rowspan="2"><img src="images/themes/<?= $guiTheme ?>/title.gif" width=211 height=50 alt="<? htmlspecialchars($appName) ?>"></td>
		<td width="69%"><?= $confServers[$_COOKIE['webdbServerID']]['type'] ?> running on 
		<?= htmlspecialchars($confServers[$_COOKIE['webdbServerID']]['host']) ?>:<?= $confServers[$_COOKIE['webdbServerID']]['port'] ?>
		-- You are logged in as user <b><?= htmlspecialchars($_COOKIE['webdbUsername']) ?></b>, 
			<?= date('jS M, Y g:iA') ?></font></td>
	</tr>
	<tr>
		<td>
			<a class=toplink href="users.php" target="detail">User Admin</a> | 
			<a class=toplink href="groups.php" target="detail">Group Admin</a> | 
			<a class=toplink href="login.php?mode=logout" target="_parent">Logout</a>
		</td>
	</tr>
</table>
</body>
</html>

<!--

<p>
<a href="">Refresh</a> | 
<a href="">Execute SQL</a> | 
<a href="">Advanced</a> | 
<a href="">Preferences</a> | 
<a href="">Logout</a>
</p>
-->