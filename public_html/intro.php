<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.3 2002/10/02 05:05:20 xzilla Exp $
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
<body>

<h1><?= $appName ?></h1>

<p><?= $appIntro ?></p>

</body>
</html>
