<?php

	/**
	 * Main access point to the app.
	 *
	 * $Id: index.php,v 1.8 2003/12/17 09:11:32 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	
	$misc->printHeader();
?>
<frameset rows="52,*,12">
	<frame src="topbar.php" name="topbar" scrolling="no" noresize="noresize" frameborder="0" />
	<frameset cols="<?php echo $conf['left_width'] ?>,*">
	  <frame src="browser.php" name="browser" frameborder="0" />
	  <frame src="intro.php" name="detail" frameborder="0" />
	</frameset>
	<frame src="bottombar.php" name="bottombar" scrolling="no" noresize="noresize" frameborder="0" />
	<noframes>
	<body>
		<?php echo $lang['strnoframes'] ?>
	</body>
	</noframes>
</frameset>
<?php
	$misc->printFooter(false);
?>
