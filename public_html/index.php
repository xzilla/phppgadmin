<?php

	/**
	 * Main access point to WebDB.
	 *
	 * $Id: index.php,v 1.5 2002/10/02 04:41:38 xzilla Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $appName ?></title>
</head>

<frameset rows="50, *">
	<frame src="topbar.php" name="topbar" />
	<frameset cols="<?= $guiLeftFrameWidth ?>,*">
	  <frame src="browser.php" name="browser" />
	  <frame src="intro.php" name="detail" />
	</frameset>
	<noframes>
	<body>
		<?= $strNoFrames ?>
	</body>
	</noframes>
</frameset>
</html>
