<?php

	/**
	 * Intro screen
	 *
	 * $Id: intro.php,v 1.14.2.2 2005/03/08 09:41:24 jollytoad Exp $
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

<form method="get">
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
  <noscript><input type="submit" value="<?php echo $lang['stralter'] ?>"></noscript>
 </label>
</form>

<p><?php echo $lang['strintro'] ?></p>

<ul>
<li><b><a href="http://phppgadmin.sourceforge.net/" target="_top"><?php echo $lang['strppahome'] ?></a></b></li>
<li><b><a href="<?php echo $lang['strpgsqlhome_url'] ?>" target="_top"><?php echo $lang['strpgsqlhome'] ?></a></b></li>
<?php
	//if ( isset($conf['docdir'])) {
	//	echo "<li><b><a href=\"". $conf['docdir'] ."\" target=\"_top\">";
	//	echo $lang['strlocaldocs'] ."</a></b></li>";
	//}
?>
<li><b><a href="http://sourceforge.net/tracker/?group_id=37132&amp;atid=418980" target="_top"><?php echo $lang['strreportbug'] ?></a></b></li>
<li><b><a href="<?php echo $lang['strviewfaq_url'] ?>" target="_top"><?php echo $lang['strviewfaq'] ?></a></b></li>
</ul>

<?php
	$misc->printFooter();
?>
