<?php require('./config.inc.php') ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Test</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">Create table public.student</td></tr>
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
	<td>link=<?php echo $lang['strconstraints'] ?></td>
	<td></td>
</tr>

<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['straddfk'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>name</td>
	<td>student_id_promo_fk</td>
</tr>
<tr>
	<td>addSelection</td>
	<td>TableColumnList</td>
	<td>label=id_promo</td>
</tr>
<tr>
	<td>click</td>
	<td>add</td>
	<td></td>
</tr>
<tr>
	<td>select</td>
	<td>target</td>
	<td>label=promo</td>
</tr>
<tr>
	<td>select</td>
	<td>target</td>
	<td>label=promo</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//input[@value='Add']</td>
	<td></td>
</tr>
<tr>
	<td>addSelection</td>
	<td>TableColumnList</td>
	<td>label=id</td>
</tr>
<tr>
	<td>click</td>
	<td>add</td>
	<td></td>
</tr>
<tr>
	<td>select</td>
	<td>upd_action</td>
	<td>label=CASCADE</td>
</tr>
<tr>
	<td>select</td>
	<td>del_action</td>
	<td>label=RESTRICT</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//input[@value='Add']</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strfkadded'] ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
