<?php

// Select an empty record from the database 

include('adodb.inc.php');
include('tohtml.inc.php');

if (0) {
	$conn = &ADONewConnection('mysql');
	$conn->debug=1;
	$conn->PConnect("localhost","root","","xphplens");
	print $conn->databaseType.':'.$conn->GenID().'<br>';
}

if (0) {
	$conn = &ADONewConnection("oci8");  // create a connection
	$conn->debug=1;
	$conn->PConnect("falcon", "scott", "tiger", "juris8.ecosystem.natsoft.com.my"); // connect to MySQL, testdb
	print $conn->databaseType.':'.$conn->GenID();
}

if (0) {
	$conn = &ADONewConnection("ibase");  // create a connection
	$conn->debug=1;
	$conn->Connect("localhost:c:\\Interbase\\Examples\\Database\\employee.gdb", "sysdba", "masterkey", ""); // connect to MySQL, testdb
	print $conn->databaseType.':'.$conn->GenID().'<br>';
}

if (0) {
	$conn = &ADONewConnection('postgres');
	$conn->debug=1;
	@$conn->PConnect("susetikus","tester","test","test");
	print $conn->databaseType.':'.$conn->GenID().'<br>';
}
?>
