<?php
	include_once('libraries/lib.inc.php');
	$data->clean($_REQUEST['tb']);
	$data->clean($_REQUEST['fk']);
	$data->clean($_REQUEST['v']);
	
	$szSQL = 'SELECT * FROM ' . $_REQUEST['tb'] . ' WHERE ' . $_REQUEST['fk']
		. "::text LIKE '" . $_REQUEST['v'] . "%' ORDER BY ". $_REQUEST['fk'] ." LIMIT 11";

	$objRes = $data->selectSet($szSQL);
	$arrayRes = array();
	while (!$objRes->EOF) {
		$arrayRes[] = $objRes->fields[$_REQUEST['fk']];
		$objRes->moveNext();
	}

	echo implode('PPA_EOF;|', $arrayRes);
?>
