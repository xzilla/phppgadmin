<?php

	/**
	 * Login screen
	 *
	 * $Id: login.php,v 1.2 2002/02/12 01:11:58 kkemp102294 Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');

?>

<html>
	<head>
	<title><?= $appName ?> :: <?= $strLogin ?></title>
	</head>
	
	<body>
		<h1><?= $appName ?> <?= $appVersion ?></h1>
		<table border="0" cellpadding="0" cellspacing="0" width="350">
			<tr height="115">
				<td height="115" align="center" valign="middle">
					<table border="0" cellpadding="2" cellspacing="0">
						<form action="<?= $PHP_SELF ?>" method="post" name="login_form">
						<tr>
							<td class="form">Username:</td>
							<td><input type="text" name="formUsername" value="<?php isset($webdbUsername) ? htmlspecialchars($webdbUsername) : '' ?>" size="24"></td>
						</tr>
						<tr>
							<td class="form">Password:</td>
							<td><input type="password" name="formPassword" size="24"></td>
						</tr>
						<tr>
							<td class="form">Server:</td>
							<td><select name="formServer">
							<?php
								for ($i = 0; $i < sizeof($confServers); $i++) {
									echo "<option value=\"{$i}\">", htmlspecialchars($confServers[$i]['desc']), ' (',
										htmlspecialchars($confServers[$i]['type']), ")</option>\n";
								}
							?>							
							</select></td>
						</tr>
						<tr>
							<td colspan="2" align="right" valign="middle">
								<input type="submit" name="submitLogin" value="Login">
							</td>
						</tr>
						</form>
					</table>
				</td>
			</tr>
		<script language=javascript>
			var uname = document.login_form.set_username;
			var pword = document.login_form.set_password;
			if (uname.value == "") { 
				uname.focus();
			} else {
				pword.focus();
			}
		</script>
		</table>	
    </td>
  </tr>
</table>
</body>
</html>
