<?php

	/**
	 * Main access point to the app.
	 *
	 * $Id: index.php,v 1.11 2003/01/04 07:08:03 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
	
	$misc->printHeader('', false);
?>
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
<?php
	$misc->printFooter(false);
?>
