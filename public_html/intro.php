<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.9 2003/01/02 03:42:08 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $appCharset ?>" />
<title><?php echo $appName ?></title>
</head>
<body>

<h1><?php echo $appName ?></h1>

<p><?php echo $strIntro ?></p>

</body>
</html>
