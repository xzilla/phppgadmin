<?php
/* 
V1.53 13 Nov 2001 (c) 2000, 2001 John Lim. All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence. 
  Set tabs to 4 for best viewing.
  
  Latest version is available at http://php.weblogs.com/
  
  Sybase driver contributed by Toni (toni.tunkkari@finebyte.com)
*/
 
class ADODB_sybase extends ADOConnection {
	var $databaseType = "sybase";	
	var $replaceQuote = "''"; // string to use to replace quotes
	var $fmtDate = "'Y-m-d H:i:s'";
	var $fmtTimeStamp = "'Y-m-d H:i:s'";
	var $hasInsertID = true;
        var $hasAffectedRows = true;
  	var $metaTablesSQL="select name from sysobjects where type='U' or type='V'";
	var $metaColumnsSQL = "select c.name,t.name,c.length from syscolumns c join systypes t on t.xusertype=c.xusertype join sysobjects o on o.id=c.id where o.name='%s'";
	var $concat_operator = '+'; 
	
	function ADODB_sybase() {			
	}
 
        // might require begintrans -- committrans
        function _insertid()
        {
                $rs = $this->Execute('select @@identity');
                if ($rs == false || $rs->EOF) return false;
               $id = $rs->fields[0];
               $rs->Close();
               return $id;
        }
          // might require begintrans -- committrans
        function _affectedrows()
        {
                $rs = $this->Execute('select @@rowcount');
                if ($rs == false || $rs->EOF) return false;
               $id = $rs->fields[0];
               $rs->Close();
               return $id;
        }

              
        function BeginTrans()
	{       
               $this->Execute('BEGIN TRAN');
               return true;
	}
	
	function CommitTrans()
	{
                $this->Execute('COMMIT TRAN');
                return true;
	}
	
	function RollbackTrans()
	{
                $this->Execute('ROLLBACK TRAN');
                return true;
	}
	
        
	function SelectDB($dbName) {
		$this->databaseName = $dbName;
		if ($this->_connectionID) {
			return @sybase_select_db($dbName);		
		}
		else return false;	
	}

	/*	Returns: the last error message from previous database operation
		Note: This function is NOT available for Microsoft SQL Server.	*/	

	function ErrorMsg() {
		$this->_errorMsg = sybase_get_last_message();
		return $this->_errorMsg;
	}

	// returns true or false
	function _connect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		$this->_connectionID = sybase_connect($argHostname,$argUsername,$argPassword);
		if ($this->_connectionID === false) return false;
		if ($argDatabasename) return $this->SelectDB($argDatabasename);
		return true;	
	}
	// returns true or false
	function _pconnect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		$this->_connectionID = sybase_pconnect($argHostname,$argUsername,$argPassword);
		if ($this->_connectionID === false) return false;
		if ($argDatabasename) return $this->SelectDB($argDatabasename);
		return true;	
	}
	
	// returns query ID if successful, otherwise false
	function _query($sql,$inputarr)
	{
		//@sybase_free_result($this->_queryID);
		return sybase_query($sql,$this->_connectionID);
	}
	
	// returns true or false
	function _close()
	{ 
		return @sybase_close($this->_connectionID);
	}
	
	
}
	
/*--------------------------------------------------------------------------------------
	 Class Name: Recordset
--------------------------------------------------------------------------------------*/
global $ADODB_sybase_mths;
$ADODB_sybase_mths = array('JAN'=>1,'FEB'=>2,'MAR'=>3,'APR'=>4,'MAY'=>5,'JUN'=>6,'JUL'=>7,'AUG'=>8,'SEP'=>9,'OCT'=>10,'NOV'=>11,'DEC'=>12);

class ADORecordset_sybase extends ADORecordSet {	

	var $databaseType = "sybase";
	var $canSeek = true;
	// _mths works only in non-localised system
	var  $_mths = array('JAN'=>1,'FEB'=>2,'MAR'=>3,'APR'=>4,'MAY'=>5,'JUN'=>6,'JUL'=>7,'AUG'=>8,'SEP'=>9,'OCT'=>10,'NOV'=>11,'DEC'=>12);	
	
	function ADORecordset_sybase($id)
	{
		return $this->ADORecordSet($id);
	}
	

	/*	Returns: an object containing field information. 
		Get column information in the Recordset object. fetchField() can be used in order to obtain information about
		fields in a certain query result. If the field offset isn't specified, the next field that wasn't yet retrieved by
		fetchField() is retrieved.	*/
	function &FetchField($fieldOffset = -1) 
	{
		if ($fieldOffset != -1) {
			$o = @sybase_fetch_field($this->_queryID, $fieldOffset);
		}
		else if ($fieldOffset == -1) {	/*	The $fieldOffset argument is not provided thus its -1 	*/
			$o = @sybase_fetch_field($this->_queryID);
		}
		// older versions of PHP did not support type, only numeric
		if ($o && !isset($o->type)) $o->type = ($o->numeric) ? 'float' : 'varchar';
		return $o;
	}
	
	function _initrs()
	{
	global $ADODB_COUNTRECS;
		$this->_numOfRows = ($ADODB_COUNTRECS)? @sybase_num_rows($this->_queryID):-1;
		$this->_numOfFields = @sybase_num_fields($this->_queryID);
	}
	
	function _seek($row) 
	{
		return @sybase_data_seek($this->_queryID, $row);
	}		

	function _fetch($ignore_fields=false) {
		$this->fields = @sybase_fetch_array($this->_queryID);
		return ($this->fields == true);
	}
	
	/*	close() only needs to be called if you are worried about using too much memory while your script
		is running. All associated result memory for the specified result identifier will automatically be freed.	*/
	function _close() {
		return @sybase_free_result($this->_queryID);		
	}
	
	// sybase/mssql uses a default date like Dec 30 2000 12:00AM
	function UnixDate($v)
	{
	global $ADODB_sybase_mths;
		//Dec 30 2000 12:00AM
		// added fix by Toni for day 15 Mar 2001
		if (!ereg( "([A-Za-z]{3})[-/\. ]([0-9 ]{1,2})[-/\. ]([0-9]{4}))"
			,$v, $rr)) return parent::UnixDate($v);
			
		if ($rr[3] <= 1970) return 0;
		
		$themth = substr(strtoupper($rr[1]),0,3);
		$themth = $ADODB_sybase_mths[$themth];
		if ($themth <= 0) return false;
		// h-m-s-MM-DD-YY
		return  mktime(0,0,0,$themth,$rr[2],$rr[3]);
	}
	
	function UnixTimeStamp($v)
	{
	global $ADODB_sybase_mths;
		//Dec 30 2000 12:00AM
		if (!ereg( "([A-Za-z]{3})[-/\. ]([0-9]{1,2})[-/\. ]([0-9]{4}) +([0-9]{1,2}):([0-9]{1,2}) *([apAP]{0,1})"
			,$v, $rr)) return parent::UnixTimeStamp($v);
		if ($rr[3] <= 1970) return 0;
		
		$themth = substr(strtoupper($rr[1]),0,3);
		$themth = $ADODB_sybase_mths[$themth];
		if ($themth <= 0) return false;
		
		if (strtoupper($rr[6]) == 'P') {
			if ($rr[4]<12) $rr[4] += 12;
		} else {
			if ($rr[4]==12) $rr[4] = 0;
		}
		// h-m-s-MM-DD-YY
		return  mktime($rr[4],$rr[5],0,$themth,$rr[2],$rr[3]);
	}

}
?>