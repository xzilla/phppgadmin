<?php
/* 
V1.53 13 Nov 2001 (c) 2000, 2001 John Lim (jlim@natsoft.com.my). All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence. 
Set tabs to 4 for best viewing.
  
  Latest version is available at http://php.weblogs.com/
  
  Native mssql driver. Requires mssql client. Works on Windows. 
  To configure for Unix, see 
   	http://phpbuilder.com/columns/alberto20000919.php3
	
  To configure datetime, look for and modify sqlcommn.loc, 
  	typically found in c:\mssql\install
  alternatively use 
  	CONVERT(char(12),datecol,120)
*/


class ADODB_mssql extends ADOConnection {
	var $databaseType = "mssql";	
	var $replaceQuote = "''"; // string to use to replace quotes
	var $fmtDate = "'Y-m-d'";
	var $fmtTimeStamp = "'Y-m-d h:i:sA'";
	var $hasInsertID = true;
        var $hasAffectedRows = true;
	var $metaTablesSQL="select name from sysobjects where type='U' or type='V' and (name not in ('sysallocations','syscolumns','syscomments','sysdepends','sysfilegroups','sysfiles','sysfiles1','sysforeignkeys','sysfulltextcatalogs','sysindexes','sysindexkeys','sysmembers','sysobjects','syspermissions','sysprotects','sysreferences','systypes','sysusers','sysalternates','sysconstraints','syssegments','REFERENTIAL_CONSTRAINTS','CHECK_CONSTRAINTS','CONSTRAINT_TABLE_USAGE','CONSTRAINT_COLUMN_USAGE','VIEWS','VIEW_TABLE_USAGE','VIEW_COLUMN_USAGE','SCHEMATA','TABLES','TABLE_CONSTRAINTS','TABLE_PRIVILEGES','COLUMNS','COLUMN_DOMAIN_USAGE','COLUMN_PRIVILEGES','DOMAINS','DOMAIN_CONSTRAINTS','KEY_COLUMN_USAGE'))";
	var $metaColumnsSQL = "select c.name,t.name,c.length from syscolumns c join systypes t on t.xusertype=c.xusertype join sysobjects o on o.id=c.id where o.name='%s'";
	var $hasTop = true;		// support mssql SELECT TOP 10 * FROM TABLE
	var $_hastrans = false;
	
	function ADODB_mssql() {			
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
		$this->_hastrans = true;
        $this->Execute('BEGIN TRAN');
        return true;
	}
	// Reserved for future expansion
	function CommitTrans()
	{
		$this->_hastrans = false;
        $this->Execute('COMMIT TRAN');
        return true;
	}
	// Reserved for future expansion
	function RollbackTrans()
	{
		$this->_hastrans = false;
        $this->Execute('ROLLBACK TRAN');
        return true;
	}
	
	
	//From: Fernando Moreira <FMoreira@imediata.pt>
        function MetaDatabases() 
		{ 
                if(@mssql_select_db("master")) { 
                         $qry="select name from sysdatabases where name <> 'master'"; 
                         if($rs=@mssql_query($qry)){ 
                                 $tmpAr=$ar=array(); 
                                 while($tmpAr=@mssql_fetch_row($rs)) 
                                         $ar[]=$tmpAr[0]; 
                                @mssql_select_db($this->databaseName); 
                                 if(sizeof($ar)) 
                                         return($ar); 
                                 else 
                                         return(false); 
                         } else { 
                                 @mssql_select_db($this->databaseName); 
                                 return(false); 
                         } 
                 } 
                 return(false); 
        } 

	function SelectDB($dbName) 
	{
		$this->databaseName = $dbName;
		if ($this->_connectionID) {
			return @mssql_select_db($dbName);		
		}
		else return false;	
	}
	/*	Returns: the last error message from previous database operation
		Note: This function is NOT available for Microsoft SQL Server.	*/
	function ErrorMsg() 
	{
		$this->_errorMsg = mssql_get_last_message();
		return $this->_errorMsg;
	}
	
	function ErrorNo() 
	{
		$id = @mssql_query("select @@ERROR",$this->_connectionID);
		if (!$id) return false;
		$arr = mssql_fetch_array($id);
		@mssql_free_result($id);
		if (is_array($arr)) return $arr[0];
       else return -1;
	}
	
	// returns true or false
	function _connect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		$this->_connectionID = mssql_connect($argHostname,$argUsername,$argPassword);
		if ($this->_connectionID === false) return false;
		//$this->Execute('SET DATEFORMAT ymd');
		if ($argDatabasename) return $this->SelectDB($argDatabasename);
		return true;	
	}
	
	
	// returns true or false
	function _pconnect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		$this->_connectionID = mssql_pconnect($argHostname,$argUsername,$argPassword);
		if ($this->_connectionID === false) return false;
		//$this->Execute('SET DATEFORMAT ymd');
		if ($argDatabasename) return $this->SelectDB($argDatabasename);
		return true;	
	}
	
	// returns query ID if successful, otherwise false
	function _query($sql,$inputarr)
	{
		$val= mssql_query($sql,$this->_connectionID);
		return $val;
	}
	
	// returns true or false
	function _close()
	{ 
		if ($this->_hastrans) $this->RollbackTrans();
		return @mssql_close($this->_connectionID);
	}
	
	
}
	
/*--------------------------------------------------------------------------------------
	 Class Name: Recordset
--------------------------------------------------------------------------------------*/
global $ADODB_mssql_mths;
$ADODB_mssql_mths = array('JAN'=>1,'FEB'=>2,'MAR'=>3,'APR'=>4,'MAY'=>5,'JUN'=>6,'JUL'=>7,'AUG'=>8,'SEP'=>9,'OCT'=>10,'NOV'=>11,'DEC'=>12);

class ADORecordset_mssql extends ADORecordSet {	

	var $databaseType = "mssql";
	var $canSeek = true;
	// _mths works only in non-localised system
		
	function ADORecordset_mssql($id)
	{
		return $this->ADORecordSet($id);
	}
	

	/* Use associative array to get fields array */
	function Fields($colname)
	{
		if (!$this->bind) {
			$this->bind = array();
			for ($i=0; $i < $this->_numOfFields; $i++) {
				$o = $this->FetchField($i);
				$this->bind[strtoupper($o->name)] = $i;
			}
		}
		
		 return $this->fields[$this->bind[strtoupper($colname)]];
	}
	
	/*	Returns: an object containing field information. 
		Get column information in the Recordset object. fetchField() can be used in order to obtain information about
		fields in a certain query result. If the field offset isn't specified, the next field that wasn't yet retrieved by
		fetchField() is retrieved.	*/

	function FetchField($fieldOffset = -1) 
	{
		if ($fieldOffset != -1) {
			return @mssql_fetch_field($this->_queryID, $fieldOffset);
		}
		else if ($fieldOffset == -1) {	/*	The $fieldOffset argument is not provided thus its -1 	*/
			return @mssql_fetch_field($this->_queryID);
		}
		return null;
	}
	
	function _initrs()
	{
	GLOBAL $ADODB_COUNTRECS;
		$this->_numOfRows = ($ADODB_COUNTRECS)? @mssql_num_rows($this->_queryID):-1;
		$this->_numOfFields = @mssql_num_fields($this->_queryID);
	}
	
	function _seek($row) 
	{
		return @mssql_data_seek($this->_queryID, $row);
	}

	// INSERT UPDATE DELETE returns false even if no error occurs in 4.0.4
	// also the date format has been changed from YYYY-mm-dd to dd MMM YYYY in 4.0.4. Idiot!
	function _fetch($ignore_fields=false) 
	{
		$this->fields = @mssql_fetch_array($this->_queryID);
		//print_r($this->fields);
		return (!empty($this->fields));
	}
	
	/*	close() only needs to be called if you are worried about using too much memory while your script
		is running. All associated result memory for the specified result identifier will automatically be freed.	*/

	function _close() {
		return @mssql_free_result($this->_queryID);		
	}

	// mssql uses a default date like Dec 30 2000 12:00AM
	function UnixDate($v)
	{
	global $ADODB_mssql_mths;
	
		//Dec 30 2000 12:00AM
		if (!ereg( "([A-Za-z]{3})[-/\. ]+([0-9]{1,2})[-/\. ]+([0-9]{4}))"
			,$v, $rr)) return parent::UnixDate($v);
			
		if ($rr[3] <= 1970) return 0;
		
		$themth = substr(strtoupper($rr[1]),0,3);
		$themth = $ADODB_mssql_mths[$themth];
		if ($themth <= 0) return false;
		// h-m-s-MM-DD-YY
		return  mktime(0,0,0,$themth,$rr[2],$rr[3]);
	}
	
	function UnixTimeStamp($v)
	{
	global $ADODB_mssql_mths;
	
		//Dec 30 2000 12:00AM
		if (!ereg( "([A-Za-z]{3})[-/\. ]+([0-9]{1,2})[-/\. ]+([0-9]{4}) +([0-9]{1,2}):([0-9]{1,2}) *([apAP]{0,1})"
			,$v, $rr)) return parent::UnixTimeStamp($v);
		if ($rr[3] <= 1970) return 0;
		
		$themth = substr(strtoupper($rr[1]),0,3);
		$themth = $ADODB_mssql_mths[$themth];
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