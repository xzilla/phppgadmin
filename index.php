<?php

	/**
	 * Main access point to the app.
	 *
	 * $Id: index.php,v 1.11 2004/07/12 04:18:40 chriskl Exp $
	 */

	// Include application functions
	include_once('./libraries/lib.inc.php');
	$misc->printHeader();
?>
<frameset rows="52,*,12">
	<frame src="topbar.php" name="topbar" scrolling="no" noresize="noresize" frameborder="0" />
<?php if (strcasecmp($lang['applangdir'], 'rtl') == 0) : ?>	
	<frameset cols="*,<?php echo $conf['left_width'] ?>">
	  <frame src="intro.php" name="detail" frameborder="0" />
	  <frame src="browser.php" name="browser" frameborder="0" />
	</frameset>
<?php else: ?>
	<frameset cols="<?php echo $conf['left_width'] ?>,*">
	  <frame src="browser.php" name="browser" frameborder="0" />
	  <frame src="intro.php" name="detail" frameborder="0" />
	</frameset>
<?php endif; ?>
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
