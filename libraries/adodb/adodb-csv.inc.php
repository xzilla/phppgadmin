<?php
/*
V1.53 13 Nov 2001 (c) 2000, 2001 John Lim (jlim@natsoft.com.my). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence.
  Set tabs to 4.
  
  Currently unsupported: MetaDatabases, MetaTables and MetaColumns, and also inputarr in Execute.
  Native types have been converted to MetaTypes.
  Transactions not supported yet.
*/ 

if (! defined("_ADODB_CSV_LAYER")) {
 define("_ADODB_CSV_LAYER", 1 );

class ADODB_csv extends ADOConnection {
	var $databaseType = 'csv';
    var $hasInsertID = true;
    var $hasAffectedRows = true;	
	var $fmtTimeStamp = "'Y-m-d H:i:s'";
	var $_affectedrows=0;
	var $_insertid=0;
	var $_url;
	var $replaceQuote = "''"; // string to use to replace quotes
	
	function ADODB_csv() 
	{			
	}
	
        function _insertid()
        {
                return $this->_insertid;
        }
        
        function _affectedrows()
        {
                return $this->_affectedrows;
        }
  
  	function &MetaDatabases()
	{
		return false;
	}

	
	// returns true or false
	function _connect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		$this->_url = $argHostname;
		return true;	
	}
	
	// returns true or false
	function _pconnect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		$this->_url = $argHostname;
		return true;
	}
	
 	function &MetaColumns($table) 
	{
		return false;
	}
		
		
	// parameters use PostgreSQL convention, not MySQL
	function &SelectLimit($sql,$nrows=-1,$offset=-1,$arg3=false)
	{
		$url = $this->_url.'?sql='.urlencode($sql)."&nrows=$nrows&$offset=&offset&arg3=".urlencode($arg3);
		$err = false;
		$rs = csv2rs($url,$err,false);
		if ($this->debug) print "$url<br><i>$err</i><br>";

		$at = strpos($err,'::::');
		if ($at === false) {		
			$this->_errorMsg = $err;
			$this->_errorNo = (integer)$err;
		} else {
			$this->_errorMsg = substr($err,$at+4,1024);
			$this->_errorNo = -9999;
		}
		if (is_object($rs)) {
			$rs->databaseType='csv';
		}
		return $rs;
	}
	
	// returns queryID or false
	function Execute($sql,$inputarr=false,$arg3=false)
	{
		$url =  $this->_url.'?sql='.urlencode($sql);
		if ($arg3) $url .= "&arg3=".urlencode($arg3);
		$err = false;
		
		$rs = csv2rs($url,$err,false);
		if ($this->debug) print urldecode($url)."<br><i>$err</i><br>";
		$at = strpos($err,'::::');
		if ($at === false) {		
			$this->_errorMsg = $err;
			$this->_errorNo = (integer)$err;
		} else {
			$this->_errorMsg = substr($err,$at+4,1024);
			$this->_errorNo = -9999;
		}
		if (is_object($rs)) {
			$this->_affectedrows = $rs->affectedrows;
			$this->_insertid = $rs->insertid;
			$rs->databaseType='csv';
		}
		return $rs;
	}

	/*	Returns: the last error message from previous database operation	*/	
	function ErrorMsg() 
	{
	    	return $this->_errorMsg;
	}
	
	/*	Returns: the last error number from previous database operation	*/	
	function ErrorNo() 
	{
		return $this->_errorNo;
	}
	
	// returns true or false
	function _close()
	{
		return true;
	}
} // class

class ADORecordset_csv extends ADORecordset {
	function ADORecordset_csv($id)
	{
		$this->ADORecordset($id);
	}
	
	function _close()
	{
		return true;
	}
}

} // define
	
?>