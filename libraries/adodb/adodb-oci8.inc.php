<?php
/*
V1.53 13 Nov 2001 (c) 2000, 2001 John Lim. All rights reserved.
  Released under both BSD license and Lesser GPL library license. 
  Whenever there is any discrepancy between the two licenses, 
  the BSD license will take precedence.

  Latest version is available at http://php.weblogs.com/
  
  Code contributed by George Fourlanos <fou@infomap.gr>
  
  13 Nov 2000 jlim - removed all ora_* references.
*/

/*
NLS_Date_Format
Allows you to use a date format other than the Oracle Lite default. When a literal
character string appears where a date value is expected, the Oracle Lite database
tests the string to see if it matches the formats of Oracle, SQL-92, or the value
specified for this parameter in the POLITE.INI file. Setting this parameter also
defines the default format used in the TO_CHAR or TO_DATE functions when no
other format string is supplied.
For Oracle the default is dd-mon-yy or dd-mon-yyyy, and for SQL-92 the default is
yy-mm-dd or yyyy-mm-dd.
Using 'RR' in the format forces two-digit years less than or equal to 49 to be
interpreted as years in the 21st century (2000–2049), and years over 50 as years in
the 20th century (1950–1999). Setting the RR format as the default for all two-digit
year entries allows you to become year-2000 compliant. For example:
NLS_DATE_FORMAT='RR-MM-DD'
You can also modify the date format using the ALTER SESSION command. See the
Oracle Lite SQL Reference for more information.
*/
class ADODB_oci8 extends ADOConnection {
    var $databaseType = 'oci8';
	var $dataProvider = 'oci8';
    var $replaceQuote = "''"; // string to use to replace quotes
    var $concat_operator='||';
	var $_stmt;
	var $_commit = OCI_COMMIT_ON_SUCCESS;
	var $_initdate = true; // init date to YYYY-MM-DD
	var $metaTablesSQL = "select table_name from cat where table_type in ('TABLE','VIEW')";
	var $metaColumnsSQL = "select cname,coltype,width from col where tname='%s' order by colno";
	var $_bindInputArray = true;
	var $hasGenID = true;
	var $_genIDSQL = "SELECT %s.nextval FROM DUAL";
	var $_genSeqSQL = "CREATE SEQUENCE %s";
	var $hasAffectedRows = true;
	
    function ADODB_oci8() {
    }
	
	function Affected_Rows()
	{
		return OCIRowCount($this->_stmt);
	}
	
	// format and return date string in database date format
	function DBDate($d)
	{
		return 'TO_DATE('.date($this->fmtDate,$d).",'YYYY-MM-DD')";
	}
	
	// format and return date string in database timestamp format
	function DBTimeStamp($ts)
	{
		return 'TO_DATE('.date($this->fmtTimeStamp,$ts).",'RRRR-MM-DD, HH:MI:SS AM')";
	}
	
    function BeginTrans()
	{      
         $this->autoCommit = false;
         $this->_commit = OCI_DEFAULT;
         return true;
	}
	
	function CommitTrans()
	{
        $ret = OCIcommit($this->_connectionID);
	    $this->_commit = OCI_COMMIT_ON_SUCCESS;
	    $this->autoCommit = true;
	    return $ret;
	}
	
	function RollbackTrans()
	{
        $ret = OCIrollback($this->_connectionID);
		$this->_commit = OCI_COMMIT_ON_SUCCESS;
	    $this->autoCommit = true;
		return $ret;
	}
        
    function SelectDB($dbName) 
	{
        return false;
    }

	/* there seems to be a bug in the oracle extension -- always returns ORA-00000 - no error */
        function ErrorMsg() 
		{
			$arr = @OCIerror($this->_stmt);
			if ($arr === false) {
				$arr = @OCIerror($this->_connectionID);
				if ($arr === false) $arr = @OCIError();
				if ($arr === false) return '';
			}
            $this->_errorMsg = $arr['message'];
            return $this->_errorMsg;
        }
	
	function ErrorNo() 
	{
		if (is_resource($this->_stmt))
			$arr = @ocierror($this->_stmt);
		else {
			$arr = @ocierror($this->_connectionID);
			if ($arr === false) $arr = @ocierror();
			if ($arr == false) return '';
		}
        return $arr['code'];
    }
/*
NATSOFT.DOMAIN =
  (DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = kermit)(PORT = 1523))
    )
    (CONNECT_DATA =
      (SERVICE_NAME = natsoft.domain)
    )
  )
*/
  
        // returns true or false
    function _connect($argHostname, $argUsername, $argPassword, $argDatabasename)
    {
		         
    	if($argHostname) { // added by Jorma Tuomainen <jorma.tuomainen@ppoy.fi>
        	if(strpos($argHostname,":")) {
				$argHostinfo=explode(":",$argHostname);
               	$argHostname=$argHostinfo[0];
                $argHostport=$argHostinfo[1];
         	} else {
    			$argHostport="1521";
   			}

			$argDatabasename="(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=".$argHostname
				.")(PORT=$argHostport))(CONNECT_DATA=(SERVICE_NAME=$argDatabasename)))";
    	}
				
 		//if ($argHostname) print "<p>Connect: 1st argument should be left blank for $this->databaseType</p>";
        $this->_connectionID = OCIlogon($argUsername,$argPassword, $argDatabasename);
        if ($this->_connectionID === false) return false;
		if ($this->_initdate) {
			$this->Execute("ALTER SESSION SET NLS_DATE_FORMAT='YYYY-MM-DD'");
		}
        return true;
   	}
        // returns true or false
    function _pconnect($argHostname, $argUsername, $argPassword, $argDatabasename)
	{
		if($argHostname) { // added by Jorma Tuomainen <jorma.tuomainen@ppoy.fi>
        	if(strpos($argHostname,":")) {
				$argHostinfo=explode(":",$argHostname);
               	$argHostname=$argHostinfo[0];
                $argHostport=$argHostinfo[1];
         	} else {
    			$argHostport="1521";
   			}

			$argDatabasename="(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=".$argHostname
				.")(PORT=".$argHostport."))(CONNECT_DATA=(SERVICE_NAME=".$argDatabasename.")))";
    	}
		$this->_connectionID = OCIplogon($argUsername,$argPassword, $argDatabasename);
        if ($this->_connectionID === false) return false;
		if ($this->_initdate) {
			$this->Execute("ALTER SESSION SET NLS_DATE_FORMAT='YYYY-MM-DD'");
		}
        return true;
	}

	
	/**
	* Usage:
	* Store BLOBs and CLOBs
	*
	* Example: to store $var in a blob
	*
	*	$conn->Execute('insert into TABLE (id,ablobb) values(12,empty_blob())');
	*	$conn->UpdateBlob('TABLE', 'COLUMN', $var, 'ID=1', 'BLOB');
	*	
	*	$blobtype supports 'BLOB' and 'CLOB'
	*
	*  to get length of LOB:
	*  	select DBMS_LOB.GETLENGTH(ablob) from TABLE
	*/

	function UpdateBlob($table,$column,$val,$where,$blobtype='BLOB')
	{
		switch(strtoupper($blobtype)) {
		default: print "<b>UpdateBlob</b>: Unknown blobtype=$blobtype<br>"; return false;
		case 'BLOB': $type = OCI_B_BLOB; break;
		case 'CLOB': $type = OCI_B_CLOB; break;
		}
		
		$sql = "UPDATE $table set $column=EMPTY_{$blobtype}() WHERE $where RETURNING $column INTO :blob";
		
		$desc = OCINewDescriptor($this->_connectionID, OCI_D_LOB);
		$arr['blob'] = array($desc,-1,$type);
		
		$this->BeginTrans();
		$rs = $this->Execute($sql,$arr);
		$rez = !empty($rs);
		$desc->save($val);
		$desc->free();
		$this->CommitTrans();
		
		if ($rez) $rs->Close();
		return $rez;
	}
	
	/*
		Example of usage:
		
		$stmt = $this->Prepare('insert into emp (empno, ename) values (:empno, :ename)');
	*/
	function &Prepare($sql)
	{
		return $sql;
	/*
	## doesn't work reliably, so emulate
		if ($this->debug) {
			print "<hr>($this->databaseType): ".htmlspecialchars($sql)."<hr>";
		}
		return OCIParse($this->_connectionID,$sql);
	*/
	}
	
	// returns query ID if successful, otherwise false
	function _query($sql,$inputarr)
	{
		//if (!is_resource($sql))
		$stmt=OCIParse($this->_connectionID,$sql);
		//else $stmt = $sql;
		
		$this->_stmt = $stmt;
		if (!$stmt) return false;
		if (is_array($inputarr)) {
			foreach($inputarr as $k => $v) {
				if (is_array($v)) {
					OCIBindByName($stmt,":$k",$inputarr[$k][0],$v[1],$v[2]);
					//print_r($v);
				} else {
					$len = -1;
					if ($inputarr[$k] === ' ') $len = 1;
					OCIBindByName($stmt,":$k",$inputarr[$k],$len);
					//print " :$k $len ";
				}
			}
		}
		if (OCIExecute($stmt,$this->_commit)) {
		   /* Now this could be an Update/Insert or Delete */
			if (strtoupper(substr($sql,0,6)) !== 'SELECT') return true;
			return $stmt;
		}
	    return false;
	}
	
	// returns true or false
	function _close()
	{
		if (!$this->autoCommit) OCIRollback($this->_connectionID);
		OCILogoff($this->_connectionID);
		$this->_stmt = false;
		$this->_connectionID = false;
	}

	function MetaPrimaryKeys($table)
	{
	// tested with oracle 8.1.7
		$table = strtoupper($table);
		$sql = "SELECT /*+ RULE */ distinct b.column_name
   FROM ALL_CONSTRAINTS a
      , ALL_CONS_COLUMNS b
  WHERE ( UPPER(b.table_name) = ('$table'))
    AND (UPPER(a.table_name) = ('$table') and a.constraint_type = 'P')
    AND (a.constraint_name = b.constraint_name)";
 		$rs = $this->Execute($sql);
		if ($rs && !$rs->EOF) {
			$arr = $rs->GetArray();
			$a = array();
			foreach($arr as $v) {
				$a[] = $v[0];
			}
			return $a;
		}
		else return false;
	}

}

/*--------------------------------------------------------------------------------------
         Class Name: Recordset
--------------------------------------------------------------------------------------*/

class ADORecordset_oci8 extends ADORecordSet {

    var $databaseType = 'oci8';
	var $bind=false;
	var $_fieldobjs;
	
        function ADORecordset_oci8($queryID)
        {
		global $ADODB_FETCH_MODE;
		
		switch ($ADODB_FETCH_MODE)
		{
		default:
		case ADODB_FETCH_NUM: $this->fetchMode = OCI_NUM+OCI_RETURN_NULLS+OCI_RETURN_LOBS; break;
		case ADODB_FETCH_ASSOC:$this->fetchMode = OCI_ASSOC+OCI_RETURN_NULLS+OCI_RETURN_LOBS; break;
		case ADODB_FETCH_DEFAULT:
		case ADODB_FETCH_BOTH:$this->fetchMode = OCI_NUM+OCI_ASSOC+OCI_RETURN_NULLS+OCI_RETURN_LOBS; break;
		}
	
		
		$this->_inited = true;
		$this->_queryID = $queryID;
		$this->fields = array();
		if ($queryID) {
			$this->_currentRow = 0;
			$this->EOF = !$this->_fetch();
			@$this->_initrs();
		} else {
			$this->_numOfRows = 0;
			$this->_numOfFields = 0;
			$this->EOF = true;
		}
        }



        /*        Returns: an object containing field information.
                Get column information in the Recordset object. fetchField() can be used in order to obtain information about
                fields in a certain query result. If the field offset isn't specified, the next field that wasn't yet retrieved by
                fetchField() is retrieved.        */

        function &_FetchField($fieldOffset = -1)
        {
                 $fld = new ADOFieldObject;
		 		 $fieldOffset += 1;
                 $fld->name =OCIcolumnname($this->_queryID, $fieldOffset);
                 $fld->type = OCIcolumntype($this->_queryID, $fieldOffset);
                 $fld->max_length = OCIcolumnsize($this->_queryID, $fieldOffset);
				 if ($fld->type == 'NUMBER') {
				 	//$p = OCIColumnPrecision($this->_queryID, $fieldOffset);
					$sc = OCIColumnScale($this->_queryID, $fieldOffset);
					if ($sc == 0) $fld->type = 'INT';
				 }
                 return $fld;
        }
	
	/* For some reason, OCIcolumnname fails when called after _initrs() so we cache it */
	function &FetchField($fieldOffset = -1)
	{
		return $this->_fieldobjs[$fieldOffset];
	}
	
	/**
	 * return recordset as a 2-dimensional array.
	 *
	 * @param [nRows]  is the number of rows to return. -1 means every row.
	 *
	 * @return an array indexed by the rows (0-based) from the recordset
	 */
	function &GetArray($nRows = -1) 
	{
		$results = array();
		/*if ($nRows == -1) {
		 // doesnt work becoz it creates 2D array by column instead of row
			$n = OCIFetchStatement($this->_queryID,$results);
			print_r($results);
			$this->EOF = true;
			$this->_currentRow = $n;
			return $results;
		}*/
		
		$results = array();
		$cnt = 0;
		while (!$this->EOF && $nRows != $cnt) {
			$results[$cnt++] = $this->fields;
			$this->MoveNext();
		}
		
		return $results;
	}
	
	// 10% speedup to move MoveNext to child class
	function MoveNext() 
	{
		if (!$this->EOF) {		
			$this->_currentRow++;
			if(@OCIfetchinto($this->_queryID,$this->fields,$this->fetchMode))
				return true;
			
			$this->EOF = true;
		}
		return false;
	}	
	
	/* Optimize SelectLimit() by using OCIFetch() instead of OCIFetchInto() */
	function &GetArrayLimit($nrows,$offset=-1) 
	{
		if ($offset <= 0) return $this->GetArray($nrows);
		for ($i=1; $i < $offset; $i++) 
			if (!@OCIFetch($this->_queryID)) return array();
			
		if (!@OCIfetchinto($this->_queryID,$this->fields,$this->fetchMode)) return array();
		$results = array();
		$cnt = 0;
		while (!$this->EOF && $nrows != $cnt) {
			$results[$cnt++] = $this->fields;
			$this->MoveNext();
		}
		
		return $results;
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
	
        function _initrs()
        {
            $this->_numOfRows = -1;
            $this->_numOfFields = OCInumcols($this->_queryID);
			if ($this->_numOfFields>0) {
				$this->_fieldobjs = array();
				$max = $this->_numOfFields;
				for ($i=0;$i<$max; $i++) $this->_fieldobjs[] = $this->_FetchField($i);
			}
		//print_r($this->_fieldobjs);
        }

	
        function _seek($row)
        {
                return false;
        }

        function _fetch() {
                return @OCIfetchinto($this->_queryID,$this->fields,$this->fetchMode);
        }

        /*        close() only needs to be called if you are worried about using too much memory while your script
                is running. All associated result memory for the specified result identifier will automatically be freed.        */

        function _close() {
              OCIFreeStatement($this->_queryID);
			  $this->_queryID = false;
        }

        function MetaType($t,$len=-1)
        {
 		switch (strtoupper($t)) {
	        case 'VARCHAR':
	        case 'VARCHAR2':
	        case 'CHAR':
			case 'VARBINARY':
			case 'BINARY':
	                        if ($len <= $this->blobSize) return 'C';
	        case 'LONG':
			case 'LONG VARCHAR':
			case 'CLOB';
				return 'X';
				
			case 'LONG RAW':
			case 'LONG VARBINARY':
			case 'BLOB':
	              return 'B';
	
	        case 'DATE': return 'D';
	
	        //case 'T': return 'T';
	
	        case 'BIT': return 'L';
			case 'INT': 
			case 'SMALLINT':
			case 'INTEGER': return 'I';
            default: return 'N';
            }
        }
}
?>
