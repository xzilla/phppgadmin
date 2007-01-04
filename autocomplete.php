<?php
	include_once('libraries/lib.inc.php');
	$szSQL = 'SELECT * FROM ' . $data->clean($_REQUEST['tb']) . ' WHERE ' . $data->clean($_REQUEST['fk']) . " LIKE '" . $data->clean($_REQUEST['v']) . "%' LIMIT 11";
	$objRes = $data->selectSet($szSQL);
	$arrayRes = array();
	while (!$objRes->EOF) {
		$arrayRes[] = $objRes->fields[$_REQUEST['fk']];
		$objRes->moveNext();
	}
	echo implode('PPA_EOF;|', $arrayRes);
?>
