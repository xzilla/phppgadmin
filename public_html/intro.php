<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.4 2002/12/23 10:14:18 jmpoure Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php= $appName ?></title>
</head>
<body>

<h1><?php= $appName ?></h1>

<p><?php= $appIntro ?></p>

</body>
</html>
