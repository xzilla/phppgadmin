<?php

	/**
	 * Login screen
	 *
	 * $Id: login.php,v 1.23.2.3 2005/03/08 09:43:38 jollytoad Exp $
	 */

	// This needs to be an include once to prevent lib.inc.php infinite recursive includes.
	// Check to see if the configuration file exists, if not, explain
	require_once('./libraries/lib.inc.php');
	
	$misc->printHeader($lang['strlogin']);
	$misc->printBody();
	$misc->printTrail('root');
	
	$server_info = $misc->getServerInfo($_REQUEST['server']);
	
	$misc->printTitle(sprintf($lang['strlogintitle'], $server_info['desc']));
	
	$loginServer = htmlspecialchars($_REQUEST['server']);
	$loginUsername = '';
	
	if (isset($msg)) $misc->printMsg($msg);
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="login_form">
<?php
	if (!empty($_POST)) $vars =& $_POST;
	else $vars =& $_GET;
	// Pass request vars through form (is this a security risk???)
	foreach ($vars as $key => $val) {
		if (substr($key,0,5) == 'login') continue;
		echo "<input type=\"hidden\" name=\"", htmlspecialchars($key), "\" value=\"", htmlspecialchars($val), "\" />\n";
	}
?>
 <input type="hidden" name="loginServer" value="<?php echo $loginServer; ?>" />
 <table class="navbar" border="0" cellpadding="5" cellspacing="3">
  <tr>
   <td><?php echo $lang['strusername']; ?></td>
   <td><input type="text" name="loginUsername" value="<?php echo $loginUsername; ?>" size="24" /></td>
  </tr>
  <tr>
   <td><?php echo $lang['strpassword']; ?></td>
   <td><input type="password" name="loginPassword" size="24" /></td>
  </tr>
 </table>
 <p><input type="submit" name="loginSubmit" value="<?php echo $lang['strlogin']; ?>" /></p>
</form>

<?php
	// Output footer
	$misc->printFooter();
?>
