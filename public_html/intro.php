<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.7 2002/12/23 10:41:32 jmpoure Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $appName ?></title>
</head>
<body>

<h1><?php echo $appName ?></h1>

<p><?php echo $appIntro ?></p>

</body>
</html>
