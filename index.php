<?php

	/**
	 * Main access point to the app.
	 *
	 * $Id: index.php,v 1.5 2003/04/21 06:36:23 chriskl Exp $
	 */

	// Include application functions
	include_once('libraries/lib.inc.php');
	
	$misc->printHeader();
?>
<frameset rows="50, *">
	<frame src="topbar.php" name="topbar" scrolling=no noresize />
	<frameset cols="<?php echo $conf['left_width'] ?>,*">
	  <frame src="browser.php" name="browser" />
	  <frame src="intro.php" name="detail" />
	</frameset>
	<noframes>
	<body>
		<?php echo $lang['strnoframes'] ?>
	</body>
	</noframes>
</frameset>
<?php
	$misc->printFooter(false);
?>
