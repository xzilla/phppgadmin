<?php
	/**
	 * Supported Translations for phpPgAdmin
	 *
	 * $Id: translations.php,v 1.2 2005/05/02 15:47:27 chriskl Exp $
	 */
	
	
	// List of language files, and encoded language name.
	
	$appLangFiles = array(
		'afrikaans' => 'Afrikaans',
		'arabic' => '&#1593;&#1585;&#1576;&#1610;',
		'chinese-tr' => '&#32321;&#39636;&#20013;&#25991;',
		'chinese-sim' => '&#31616;&#20307;&#20013;&#25991;',
		'czech' => '&#268;esky',
		'danish' => 'Danish',
		'dutch' => 'Nederlands',
		'english' => 'English',
		'french' => 'Fran&ccedil;ais',
		'german' => 'Deutsch',
		'hebrew' => 'Hebrew',
		'italian' => 'Italiano',
		'japanese' => '&#26085;&#26412;&#35486;',
		'hungarian' => 'Magyar',
		'mongol' => 'Mongolian',
		'polish' => 'Polski',
		'portuguese-br' => 'Portugu&ecirc;s-Brasileiro',
		'romanian' => 'Rom&acirc;n&#259;',
		'russian' => '&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;',
		'slovak' => 'Slovensky',
		'swedish' => 'Svenska',
		'spanish' => 'Espa&ntilde;ol',
		'turkish' => 'T&uuml;rk&ccedil;e',
		'ukrainian' => '&#1059;&#1082;&#1088;&#1072;&#9558;&#1085;&#1089;&#1100;&#1082;&#1072;'
	);
	
	
	// ISO639 language code to language file mapping.
	// See http://www.w3.org/WAI/ER/IG/ert/iso639.htm for language codes
	
	// If it's available 'language-country', but not general
	// 'language' translation (eg. 'portuguese-br', but not 'portuguese')
	// specify both 'la' => 'language-country' and 'la-co' => 'language-country'.
	
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
		'pt' => 'portuguese-br',
		'pt-br' => 'portuguese-br',
		'ro' => 'romanian',
		'ru' => 'russian',
		'sk' => 'slovak',
		'sv' => 'swedish',
		'es' => 'spanish',
		'tr' => 'turkish',
		'uk' => 'ukrainian'
	);
?>
