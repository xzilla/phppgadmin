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
	<td>link=new_col</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['stralter'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>field</td>
	<td>altered_col</td>
</tr>
<tr>
	<td>select</td>
	<td>type</td>
	<td>label=character</td>
</tr>
<tr>
	<td>type</td>
	<td>lengths</td>
	<td>1</td>
</tr>
<tr>
	<td>click</td>
	<td>notnull</td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>default</td>
	<td>'-'</td>
</tr>
<tr>
	<td>type</td>
	<td>comment</td>
	<td>altered col to drop</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//input[@value='Alter']</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strcolumnaltered'] ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
