<?php require('./config.inc.php') ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Test</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">New Test</td></tr>
</thead><tbody>
<?php include('login.php') ?>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strdatabases'] ?></td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=Create database</td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>formName</td>
	<td><?php echo $testdb ?></td>
</tr>
<tr>
	<td>select</td>
	<td>formEncoding</td>
	<td>label=UTF8</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//input[@value='<?php echo $lang['strcreate'] ?>']</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strdatabasecreated'] ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
