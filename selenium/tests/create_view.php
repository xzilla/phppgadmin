<?php require('./config.inc.php') ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Test</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">Create/Alter a view</td></tr>
</thead><tbody>
<?php include('login.php') ?>
<!-- CREATE -->
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
<!-- ALTER -->
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strviews'] ?></td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=student_promo</td>
	<td></td>
</tr>
<!--alter name-->
<tr>
	<td>clickAndWait</td>
	<td>//ul[@class='navlink']/li/a[text()='<?php echo $lang['stralter'] ?>']</td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>name</td>
	<td>student_promo_renamed</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>alter</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strviewaltered'] ?></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//div[@class='trail']/descendant::a[@title='<?php echo $lang['strview'] ?>']/span[@class='label']</td>
	<td>student_promo_renamed</td>
</tr>
<!--alter comment-->
<tr>
	<td>clickAndWait</td>
	<td>//ul[@class='navlink']/li/a[text()='<?php echo $lang['stralter'] ?>']</td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>comment</td>
	<td>students and their promotion (altered)</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>alter</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strviewaltered'] ?></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='comment']</td>
	<td>students and their promotion (altered)</td>
</tr>
<!--alter schema-->
<tr>
	<td>clickAndWait</td>
	<td>//ul[@class='navlink']/li/a[text()='<?php echo $lang['stralter'] ?>']</td>
	<td></td>
</tr>
<tr>
	<td>select</td>
	<td>newschema</td>
	<td>label=test_schema</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>alter</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strviewaltered'] ?></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//div[@class='trail']/descendant::a[@title='<?php echo $lang['strschema'] ?>']/span[@class='label']</td>
	<td>test_schema</td>
</tr>
<!--alter owner-->
<tr>
	<td>clickAndWait</td>
	<td>//ul[@class='navlink']/li/a[text()='<?php echo $lang['stralter'] ?>']</td>
	<td></td>
</tr>
<tr>
	<td>select</td>
	<td>owner</td>
	<td>label=<?php echo $user ?></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>alter</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strviewaltered'] ?></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//div[@class='trail']/descendant::a[@title='<?php echo $lang['strschema'] ?>']/span[@class='label' and text()='test_schema']</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strviews'] ?></td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//tr/td[1]/a[text()='student_promo_renamed']/../../td[2]</td>
	<td><?php echo $user ?></td>
</tr>
<!--alter back to original: name, comment, schema & owner in the same time-->
<tr>
	<td>clickAndWait</td>
	<td>link=student_promo_renamed</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//ul[@class='navlink']/li/a[text()='<?php echo $lang['stralter'] ?>']</td>
	<td></td>
</tr>
<tr>
	<td>select</td>
	<td>owner</td>
	<td>label=<?php echo $admin_user ?></td>
</tr>
<tr>
	<td>type</td>
	<td>name</td>
	<td>student_promo</td>
</tr>
<tr>
	<td>select</td>
	<td>newschema</td>
	<td>label=public</td>
</tr>
<tr>
	<td>type</td>
	<td>comment</td>
	<td>students and their promotion</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>alter</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strviewaltered'] ?></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='comment']</td>
	<td>students and their promotion</td>
</tr>
<tr>
	<td>assertText</td>
	<td>//div[@class='trail']/descendant::a[@title='<?php echo $lang['strview'] ?>']/span[@class='label']</td>
	<td>student_promo</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//div[@class='trail']/descendant::a[@title='<?php echo $lang['strschema'] ?>']/span[@class='label' and text()='public']</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strviews'] ?></td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//tr/td[1]/a[text()='student_promo']/../../td[2]</td>
	<td><?php echo $admin_user ?></td>
</tr>

<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
