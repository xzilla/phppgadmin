<?php


function testsql()
{

include('adodb.inc.php');
include('tohtml.inc.php');

//==========================
// This code tests an insert

$sql = "SELECT * FROM ADOXYZ WHERE id = -1"; 
// Select an empty record from the database 

$conn = &ADONewConnection("mysql");  // create a connection
$conn->debug=1;
$conn->PConnect("localhost", "admin", "", "test"); // connect to MySQL, testdb
$rs = $conn->Execute($sql); // Execute the query and get the empty recordset

$record = array(); // Initialize an array to hold the record data to insert

// Set the values for the fields in the record
$record["firstname"] = "Bob";
$record["lastname"] = "Smith";
$record["created"] = time();

// Pass the empty recordset and the array containing the data to insert
// into the GetInsertSQL function. The function will process the data and return
// a fully formatted insert sql statement.
$insertSQL = $conn->GetInsertSQL($rs, $record);

$conn->Execute($insertSQL); // Insert the record into the database



//==========================
// This code tests an update

$sql = "SELECT * FROM ADOXYZ WHERE id = 1"; 
// Select a record to update 

$rs = $conn->Execute($sql); // Execute the query and get the existing record to update

$record = array(); // Initialize an array to hold the record data to update

// Set the values for the fields in the record
$record["firstname"] = "Caroline";
$record["lastname"] = "Smith"; // Update Caroline's lastname from Miranda to Smith


// Pass the single record recordset and the array containing the data to update
// into the GetUpdateSQL function. The function will process the data and return
// a fully formatted update sql statement.
// If the data has not changed, no recordset is returned
$updateSQL = $conn->GetUpdateSQL($rs, $record);

$conn->Execute($updateSQL); // Update the record in the database

}


testsql();
?>