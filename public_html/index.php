<?php

	/**
	 * Main access point to WebDB.
	 *
	 * $Id: index.php,v 1.3 2002/04/10 04:09:47 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');

?>

<html>
<head>
<title><?= $appName ?></title>
</head>

<frameset rows="50, *" border="0" frameborder="0" framespacing="0">
	<frame src="topbar.php" name="topbar">
	<frameset cols="<?= $guiLeftFrameWidth ?>,*" border="0" frameborder="0">
	  <frame src="browser.php" name="browser">
	  <frame src="intro.php" name="detail">
	</frameset>
</frameset>
<noframes>
<body>
	<?= $strNoFrames ?>
</body>
</noframes>
</html>