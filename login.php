<?php

	/**
	 * Login screen
	 *
	 * $Id: login.php,v 1.16 2004/05/26 11:27:00 soranzo Exp $
	 */

	// This needs to be an include once to prevent lib.inc.php infinite recursive includes.
	// Check to see if the configuration file exists, if not, explain
	include_once('./libraries/lib.inc.php');

	// Unfortunately, since sometimes lib.inc.php has been included, but we still
	// need the config variables
	if (file_exists('conf/config.inc.php')) {
		require('conf/config.inc.php');
	}
	else {
		echo "Configuration Error: You must rename/copy config.inc.php-dist to config.inc.php and set your appropriate settings";
		exit;
	}

	// Prepare form variables
	if (!isset($_POST['formServer'])) $_POST['formServer'] = '';
	if (!isset($_POST['formLanguage'])) $_POST['formLanguage'] = $conf['default_lang'];

	// Force encoding to UTF-8
	$lang['appcharset'] = 'UTF-8';

	// Output header	
	$misc->printHeader($lang['strlogin']);
	$misc->printBody();
?>

	<table class="navbar" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
		<tr height="115">
			<td height="115" align="center" valign="middle">
				<center>
				<h1><?php echo $appName ?> <?php echo $appVersion ?> <?php echo $lang['strlogin'] ?></h1>				
				<?php 
					if (isset($_failed) && $_failed) 
						echo "<p class=\"message\">{$lang['strloginfailed']}</p>";
					elseif (isset($_allowed) && !$_allowed) {
						echo "<p class=\"message\">{$lang['strlogindisallowed']}\n";
						echo "<br /><a href=\"{$lang['strviewfaq_url']}\">{$lang['strviewfaq']}</a></p>";
					}
				?>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="login_form">
				<table class="navbar" border="0" cellpadding="5" cellspacing="3">
					<tr>
						<th><?php echo $lang['strusername'] ?>:</td>
						<td><input type="text" name="formUsername" value="<?php echo (isset($_POST['formUsername'])) ? htmlspecialchars($_POST['formUsername']) : '' ?>" size="24" /></td>
					</tr>
					<tr>
						<th><?php echo $lang['strpassword'] ?>:</td>
						<td><input type="password" name="formPassword" size="24" /></td>
					</tr>
					<tr>
						<th><?php echo $lang['strserver'] ?>:</td>
						<td><select name="formServer">
						<?php
							for ($i = 0; $i < sizeof($conf['servers']); $i++) {
								echo "<option value=\"{$i}\"",
									($i == $_POST['formServer']) ? ' selected="selected"' : '',
									">", htmlspecialchars($conf['servers'][$i]['desc']), "</option>\n";
							}
						?>
						</select></td>
					</tr>
					<tr>
						<th><?php echo $lang['strlanguage'] ?>:</td>
						<td><select name="formLanguage">
						<?php
							// Language name already encoded
							foreach ($appLangFiles as $k => $v) {
								echo "<option value=\"{$k}\"",
									($k == $_POST['formLanguage']) ? ' selected="selected"' : '',
									">{$v}</option>\n";
							}
						?>
						</select></td>
					</tr>
				</table>
				<p><input type="submit" name="submitLogin" value="<?php echo $lang['strlogin'] ?>" /></p>
				</form>
				</center>
				<script language="javascript">
				<!--
					var uname = document.login_form.formUsername;
					var pword = document.login_form.formPassword;
					if (uname.value == "") {
						uname.focus();
					} else {
						pword.focus();
					}
				-->
				</script>
			</td>
		</tr>
	</table>
<?php
	// Output footer
	$misc->printFooter();
?>
