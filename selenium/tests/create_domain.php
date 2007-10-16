<?php require('./config.inc.php') ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Test</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">Create domai "year"</td></tr>
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
	<td>link=public</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strdomains'] ?></td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strcreatedomain'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>domname</td>
	<td>year</td>
</tr>
<tr>
	<td>select</td>
	<td>domtype</td>
	<td>label=integer</td>
</tr>
<tr>
	<td>type</td>
	<td>domcheck</td>
	<td>VALUE &gt;= 1901 AND VALUE &lt;= 2155</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//input[@value='Create']</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strdomaincreated'] ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
