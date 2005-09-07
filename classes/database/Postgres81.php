<?php

/**
 * PostgreSQL 8.1 support
 *
 * $Id: Postgres81.php,v 1.3 2005/09/07 08:09:21 chriskl Exp $
 */

include_once('./classes/database/Postgres80.php');

class Postgres81 extends Postgres80 {

	var $major_version = 8.1;

	// Map of database encoding names to HTTP encoding names.  If a
	// database encoding does not appear in this list, then its HTTP
	// encoding name is the same as its database encoding name.
	var $codemap = array(
		'BIG5' => 'BIG5',
		'EUC_CN' => 'GB2312',
		'EUC_JP' => 'EUC-JP',
		'EUC_KR' => 'EUC-KR',
		'EUC_TW' => 'EUC-TW', 
		'GB18030' => 'GB18030',
		'GBK' => 'GB2312',
		'ISO_8859_5' => 'ISO-8859-5',
		'ISO_8859_6' => 'ISO-8859-6',
		'ISO_8859_7' => 'ISO-8859-7',
		'ISO_8859_8' => 'ISO-8859-8',
		'JOHAB' => 'CP1361',
		'KOI8' => 'KOI8-R',
		'LATIN1' => 'ISO-8859-1',
		'LATIN2' => 'ISO-8859-2',
		'LATIN3' => 'ISO-8859-3',
		'LATIN4' => 'ISO-8859-4',
		'LATIN5' => 'ISO-8859-9',
		'LATIN6' => 'ISO-8859-10',
		'LATIN7' => 'ISO-8859-13',
		'LATIN8' => 'ISO-8859-14',
		'LATIN9' => 'ISO-8859-15',
		'LATIN10' => 'ISO-8859-16',
		'SJIS' => 'SHIFT_JIS',
		'SQL_ASCII' => 'US-ASCII',
		'UHC' => 'WIN949',
		'UTF8' => 'UTF-8',
		'WIN866' => 'CP866',
		'WIN874' => 'CP874',
		'WIN1250' => 'CP1250',
		'WIN1251' => 'CP1251',
		'WIN1252' => 'CP1252',
		'WIN1256' => 'CP1256',
		'WIN1258' => 'CP1258'
	);
	
	// Last oid assigned to a system object
	var $_lastSystemOID = 17231;

	/**
	 * Constructor
	 * @param $conn The database connection
	 */
	function Postgres81($conn) {
		$this->Postgres80($conn);
	}

	// Help functions
	
	function getHelpPages() {
		include_once('./help/PostgresDoc81.php');
		return $this->help_page;
	}

}

?>
