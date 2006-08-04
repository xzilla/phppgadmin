<?php
include_once("libraries/lib.inc.php");
$szSQL = "select * from ". $data->clean($_REQUEST["tb"]) ." where ". $data->clean($_REQUEST["fk"]) ." LIKE '". $data->clean($_REQUEST["v"]) ."%' LIMIT 11";
$objRes = $data->selectSet($szSQL);
$arrayRes = array();
while(!$objRes->EOF) {
	$arrayRes[] = $objRes->fields[$_REQUEST["fk"]];
	$objRes->moveNext();
}
echo implode("PPA_EOF;|",$arrayRes);
?>
