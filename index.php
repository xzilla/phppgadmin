<?php

	/**
	 * Main access point to the app.
	 *
	 * $Id: index.php,v 1.3 2003/03/01 00:56:11 slubek Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
?>
<frameset rows="50, *">
	<frame src="topbar.php" name="topbar" scrolling=no noresize />
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
