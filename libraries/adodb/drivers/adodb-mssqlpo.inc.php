<?php
/**
* @version V3.31 17 March 2003 (c) 2000-2003 John Lim (jlim@natsoft.com.my). All rights reserved.
* Released under both BSD license and Lesser GPL library license.
* Whenever there is any discrepancy between the two licenses,
* the BSD license will take precedence.
*
* Set tabs to 4 for best viewing.
*
* Latest version is available at http://php.weblogs.com
*
*  Portable MSSQL Driver that supports || instead of +
*
*/
include_once(ADODB_DIR.'/drivers/adodb-mssql.inc.php');

class ADODB_mssqlpo extends ADODB_mssql {
	var $databaseType = "mssqlpo";
	var $concat_operator = '||'; 
	
	function ADODB_mssqlpo()
	{
		ADODB_mssql::ADODB_mssql();
	}
	
	
	function ServerInfo()
	{
	global $ADODB_FETCH_MODE;
		$this->debug=1;
		$stmt = $this->PrepareSP('sp_server_info');
		$val = 2;
		if ($this->fetchMode === false) {
			$savem = $ADODB_FETCH_MODE;
			$ADODB_FETCH_MODE = ADODB_FETCH_NUM;
		} else 
			$savem = $this->SetFetchMode(ADODB_FETCH_NUM);
		
		
		$this->Parameter($stmt,$val,'attribute_id');
		$row = $this->GetRow($stmt);
		
		//$row = $this->GetRow("execute sp_server_info 2");
		
		if ($this->fetchMode === false) {
			$ADODB_FETCH_MODE = $savem;
		} else
			$this->SetFetchMode($savem);
		
		$arr['description'] = $row[2];
		$arr['version'] = ADOConnection::_findvers($arr['description']);
		return $arr;
	}

	
	/*
		The big difference between mssqlpo and it's parent mssql is that mssqlpo supports
		the more standard || string concatenation operator.
	*/
	function _query($sql,$inputarr)
	{
		if (is_string($sql)) $sql = str_replace('||','+',$sql);
		return ADODB_mssql::_query($sql,$inputarr);
	}
}

class ADORecordset_mssqlpo extends ADORecordset_mssql {
	var $databaseType = "mssqlpo";
	function ADORecordset_mssqlpo($id,$mode=false)
	{
		$this->ADORecordset_mssql($id,$mode);
	}
}
?>