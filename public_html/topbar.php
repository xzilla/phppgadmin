<?php

	/**
	 * Top menu for WebDB
	 *
	 * $Id: topbar.php,v 1.7 2002/10/23 21:59:13 xzilla Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $appName ?></title>
</head>
<body class="topbar">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr> 
		<td width="211" rowspan="2"><img src="images/themes/<?= $guiTheme ?>/title.gif" width="211" height="50" alt="<?= htmlspecialchars($appName) ?>" /></td>
		<td width="69%"><?= $confServers[$_SESSION['webdbServerID']]['type'] ?> running on 
		<?= htmlspecialchars($confServers[$_SESSION['webdbServerID']]['host']) ?>:<?= $confServers[$_SESSION['webdbServerID']]['port'] ?>
		-- You are logged in as user <b><?= htmlspecialchars($_SESSION['webdbUsername']) ?></b>, 
			<?= date('jS M, Y g:iA') ?></td>
	</tr>
	<tr>
		<td>
			<a class="toplink" href="users.php" target="detail">User Admin</a> | 
			<a class="toplink" href="groups.php" target="detail">Group Admin</a> | 
			<a class="toplink" href="logout.php" target="_parent">Logout</a>
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
