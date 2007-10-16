<?php require('./config.inc.php') ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Test</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">Create a schema</td></tr>
</thead><tbody>
<?php include('login.php') ?>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strdatabases'] ?></td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $testdb ?></td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strschemas'] ?></td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strcreateschema'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>formName</td>
	<td>test_schema</td>
</tr>
<tr>
	<td>type</td>
	<td>formComment</td>
	<td>test schema comment</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>create</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strschemacreated'] ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
