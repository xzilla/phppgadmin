<?php

/**
 * A class that implements the DB interface for Postgres
 * Note: This class uses ADODB and returns RecordSets.
 *
 * $Id: BaseDB.php,v 1.1.1.1 2002/02/11 09:32:47 chriskl Exp $
 */

include_once('../classes/database/ADODB_base.php');

class BaseDB extends ADODB_base {

	// Filter objects for user?
	var $_filterTables = true;

	function BaseDB($type) {
		$this->ADODB_base($type);
	}

	/**
	 * Set object filtering for user
	 * @param $state (boolean)
	 */
	function setFilterTables($state) {
		$this->$_filterTables = $state;
	}

/*
	// Feature functions

	// Is "ALTER TABLE" with add column supported? 
	function supportsAlterTableWithAddColumn() {}
	
	// Is "ALTER TABLE" with drop column supported? 
	function supportsAlterTableWithDropColumn() 

	// Are both data definition and data manipulation statements within a transaction supported? 
	function supportsDataDefinitionAndDataManipulationTransactions() 

	// Are only data manipulation statements within a transaction supported? 
	function supportsDataManipulationTransactionsOnly() 

	// Does the database treat mixed case unquoted SQL identifiers as case sensitive and as a result store them in mixed case? A JDBC CompliantTM driver will always return false. 
	function supportsMixedCaseIdentifiers() 

	// Does the database treat mixed case quoted SQL identifiers as case sensitive and as a result store them in mixed case? A JDBC CompliantTM driver will always return true. 
	function supportsMixedCaseQuotedIdentifiers() 

	// Can columns be defined as non-nullable? A JDBC CompliantTM driver always returns true. 
	function supportsNonNullableColumns() 

	// Are stored procedure calls using the stored procedure escape syntax supported? 
	function supportsStoredProcedures() 
	
	// Are transactions supported? If not, invoking the method commit is a noop and the isolation level is TRANSACTION_NONE. 
	function supportsTransactions() 

	// Can you define your own aggregates?
	function supportsAggregates()

	// Can you define your own operators?
	function supportsOperators()

	// Database manipulation

*/
}

?>