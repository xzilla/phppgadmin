<?php

	/**
	 * Main access point to the app.
	 *
	 * $Id: index.php,v 1.2 2003/02/07 17:34:34 xzilla Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
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
