<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.15 2005/05/02 15:47:24 chriskl Exp $
	 */

	// Include application functions (no db conn)
	$_no_db_connection = true;
	include_once('./libraries/lib.inc.php');
	
	$misc->printHeader();
	$misc->printBody();
	
	$misc->printTrail('root');
	$misc->printTabs('root','intro');
?>

<h1><?php echo "$appName $appVersion (PHP ". phpversion() .')' ?></h1>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
 <label>
  <select name="language" onchange="this.form.submit()">
<?php
	$language = isset($_SESSION['webdbLanguage']) ? $_SESSION['webdbLanguage'] : 'english';
	foreach ($appLangFiles as $k => $v) {
		echo "<option value=\"{$k}\"",
			($k == $language) ? ' selected="selected"' : '',
			">{$v}</option>\n";
	}
?>
  </select>
  <noscript><input type="submit" value="<?php echo $lang['stralter'] ?>" /></noscript>
 </label>
</form>

<p><?php echo $lang['strintro'] ?></p>

<ul class="intro">
<li><a href="http://phppgadmin.sourceforge.net/" target="_top"><?php echo $lang['strppahome'] ?></a></li>
<li><a href="<?php echo $lang['strpgsqlhome_url'] ?>" target="_top"><?php echo $lang['strpgsqlhome'] ?></a></li>
<li><a href="http://sourceforge.net/tracker/?group_id=37132&amp;atid=418980" target="_top"><?php echo $lang['strreportbug'] ?></a></li>
<li><a href="<?php echo $lang['strviewfaq_url'] ?>" target="_top"><?php echo $lang['strviewfaq'] ?></a></li>
</ul>

<?php
	if (isset($_GET['language'])) $_reload_browser = true;
	$misc->printFooter();
?>
