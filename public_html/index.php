<?php

	/**
	 * Main access point to WebDB.
	 *
	 * $Id: index.php,v 1.10 2003/01/02 02:27:47 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $appCharset ?>" >
<title><?php echo $appName ?></title>
</head>

<frameset rows="50, *">
	<frame src="topbar.php" name="topbar" />
	<frameset cols="<?php echo $guiLeftFrameWidth ?>,*">
	  <frame src="browser.php" name="browser" />
	  <frame src="intro.php" name="detail" />
	</frameset>
	<noframes>
	<body>
		<?php echo $strNoFrames ?>
	</body>
	</noframes>
</frameset>
</html>
