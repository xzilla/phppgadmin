<?php

	/**
	 * Login screen
	 *
	 * $Id: login.php,v 1.18.2.2 2005/04/16 05:11:04 chriskl Exp $
	 */

	// This needs to be an include once to prevent lib.inc.php infinite recursive includes.
	// Check to see if the configuration file exists, if not, explain
	require_once('./libraries/lib.inc.php');

	// Prepare form variables
	if (!isset($_POST['formServer'])) $_POST['formServer'] = '';
	if (!isset($_POST['formLanguage'])) {
		// Parse the user acceptable language in HTTP_ACCEPT_LANGUAGE
		// ( http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.4 )
		// If there's one available, then overwrite the default language.
		if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
			$userLanguage = '';
			$userLanguages = array();
			$acceptableLanguages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
			foreach ($acceptableLanguages as $accLang) {
				$languageInfos = explode(';', trim($accLang));
				$languageRange = strtolower($languageInfos[0]);
				if (isset($languageInfos[1]) && substr($languageInfos[1], 0, 2) == 'q=')
					$languageQuality = (float)substr($languageInfos[1], 2, 5);
				else
					$languageQuality = 1;
				// If the language is already in the array, check that we
				// don't overwrite its quality value with a lower one
				if ((!array_key_exists($languageRange, $userLanguages))
					|| ($userLanguages[$languageRange] < $languageQuality))
					$userLanguages[$languageRange] = $languageQuality;
			}
			arsort($userLanguages, SORT_NUMERIC);

			// if it's available 'language-country', but not general 'language' translation
			// (eg. 'portuguese-br', but not 'portuguese')
			// specify both 'la' => 'language-country' and 'la-co' => 'language-country'.
			// See http://www.w3.org/WAI/ER/IG/ert/iso639.htm for language codes
			$availableLanguages = array(
				'af' => 'afrikaans',
				'ar' => 'arabic',
				'zh' => 'chinese-tr',
				'zh-cn' => 'chinese-sim',
				'cs' => 'czech',
				'da' => 'danish',
				'nl' => 'dutch',
				'en' => 'english',
				'fr' => 'french',
				'de' => 'german',
				'he' => 'hebrew',
				'it' => 'italian',
				'ja' => 'japanese',
				'hu' => 'hungarian',
				'mn' => 'mongol',
				'pl' => 'polish',
				'pt' => 'portuguese-pt',
				'pt-br' => 'portuguese-br',
				'pt-pt' => 'portuguese-pt',
				'ro' => 'romanian',
				'ru' => 'russian',
				'sk' => 'slovak',
				'sv' => 'swedish',
				'es' => 'spanish',
				'tr' => 'turkish',
				'uk' => 'ukrainian'
			);

			reset($userLanguages);
			do {
				$languageRange = key($userLanguages);
				if (array_key_exists($languageRange, $availableLanguages)) {
					$userLanguage = $availableLanguages[$languageRange];
				}
			} while ($userLanguage == '' && next($userLanguages));
			if ($userLanguage != '') $conf['default_lang'] = $userLanguage;
		}
		$_POST['formLanguage'] = $conf['default_lang'];
		// Include default language over english.
		include_once('./lang/recoded/' . strtolower($conf['default_lang']) . '.php');
	}

	// Check for config file version mismatch
	if (!isset($conf['version']) || $conf['base_version'] > $conf['version']) {
		echo $lang['strbadconfig'];
		exit;
	}

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
