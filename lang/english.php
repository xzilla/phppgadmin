<?php

	/**
	 * Main access point to WebDB.
	 *
	 * $Id: english.php,v 1.1 2002/02/11 09:32:49 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc');

?>

<html>
<head>
<title><?= $appName ?></title>
</head>

<frameset rows="50, *" border="0" frameborder="0">
	<frame src="topbar.php" name="topbar">
	<frameset cols="<?= $guiLeftFrameWidth ?>,*" border="0" frameborder="0">
	  <frame src="browser.php" name="browser">
	  <frame src="detail.php" name="detail">
	</frameset>
</frameset>
<noframes>
<body>
	<?= $strNoFrames ?>
</body>
</noframes>
</html>