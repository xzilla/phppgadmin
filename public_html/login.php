<?php

	/**
	 * Login screen
	 *
	 * $Id: login.php,v 1.10 2003/01/04 07:08:03 chriskl Exp $
	 */

	// Include application functions
	include_once('../conf/config.inc.php');
	// Prepare form variables
	if (!isset($_POST['formServer'])) $_POST['formServer'] = '';
	// Output header
	$misc->printHeader($strLogin);
?>

	<table class="navbar" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
		<tr height="115">
			<td height="115" align="center" valign="middle">
				<center>
				<h1><?php echo $appName ?> <?php echo $strLogin ?></h1>
				<?php if (isset($_failed) && $_failed) echo "<p class=\"message\">$strLoginFailed</p>" ?>
				<table class="navbar" border="0" cellpadding="5" cellspacing="3">
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="login_form">
					<tr>
						<td><?php echo $strUsername ?>:</td>
						<td><input type="text" name="formUsername" value="<?php echo (isset($_POST['formUsername'])) ? htmlspecialchars($_POST['formUsername']) : '' ?>" size="24"></td>
					</tr>
					<tr>
						<td><?php echo $strPassword ?>:</td>
						<td><input type="password" name="formPassword" size="24"></td>
					</tr>
					<tr>
						<td><?php echo $strServer ?>:</td>
						<td><select name="formServer">
						<?php
							for ($i = 0; $i < sizeof($confServers); $i++) {
								echo "<option value=\"{$i}\"", 
									($i == $_POST['formServer']) ? ' selected' : '', 
									">", htmlspecialchars($confServers[$i]['desc']), ' (',
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
    </td>
  </tr>
</table>
<?php
	// Output footer
	$misc->printFooter();
?>
