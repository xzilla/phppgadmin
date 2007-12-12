<?php require('./config.inc.php') ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Test</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">Create a view</td></tr>
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
	<td>link=<?php echo $lang['strviews'] ?></td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strcreateview'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>formView</td>
	<td>student_promo</td>
</tr>
<tr>
	<td>type</td>
	<td>formDefinition</td>
	<td>SELECT student.id, name, birthday, resume, spe, year
	FROM student
	JOIN promo ON (student.id_promo=promo.id)</td>
</tr>
<tr>
	<td>type</td>
	<td>formComment</td>
	<td>students and their promotion</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//input[@value='Create']</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strviewcreated'] ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
