<?php

	/**
	 * Login screen
	 *
	 * $Id: login.php,v 1.8 2002/12/24 04:03:29 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');

?>

<html>
	<head>
	<title><?php echo $appName ?> :: <?php echo $strLogin ?></title>
	</head>
	
	<body>
		<table class="navbar" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
			<tr height="115">
				<td height="115" align="center" valign="middle">
					<center>
					<h1><?php echo $appName ?> <?php echo $strLogin ?></h1>
					<?php if (isset($_failed) && $_failed) echo "<p class=\"message\">$strLoginFailed</p>" ?>
					<table class="navbar" border="0" cellpadding="5" cellspacing="3">
						<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="login_form">
						<tr>
							<td>Username:</td>
							<td><input type="text" name="formUsername" value="<?php if(isset($webdbUsername)==true) {echo htmlspecialchars($webdbUsername); } else { echo '';} ?>" size="24"></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="formPassword" size="24"></td>
						</tr>
						<tr>
							<td>Server:</td>
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
					</center>
					<script language=javascript>
						var uname = document.login_form.formUsername;
						var pword = document.login_form.formPassword;
						if (uname.value == "") { 
							uname.focus();
						} else {
							pword.focus();
						}
					</script>
				</td>
			</tr>
		</table>	
    </td>
  </tr>
</table>
</body>
</html>
