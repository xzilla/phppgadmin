<?php

	/**
	 * Main access point to WebDB.
	 *
	 * $Id: index.php,v 1.4 2002/10/02 04:35:51 xzilla Exp $
	 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

	// Include application functions
	include_once('../conf/config.inc.php');

?>
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
