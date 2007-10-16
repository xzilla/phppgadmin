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
	<td>link=<?php echo $lang['strtables'] ?></td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=student</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strcolumns'] ?></td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=altered_col</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strdrop'] ?></td>
	<td></td>
</tr>
<tr>
	<td>click</td>
	<td>cascade</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>drop</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strcolumndropped'] ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
