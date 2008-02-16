<?php require('./config.inc.php') ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Test</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">Create/Drop constraints</td></tr>
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
<!-- Add a foreign Key -->
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
<!-- Add a foreign Key to test drop-->
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['straddfk'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>name</td>
	<td>fk_to_drop</td>
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
<!-- Add check constraint -->
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['straddcheck'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>name</td>
	<td>check_to_drop</td>
</tr>
<tr>
	<td>type</td>
	<td>definition</td>
	<td>extract(year from birthday) &lt; 2000</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>ok</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strcheckadded'] ?></td>
</tr>
<!-- add unique key -->
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['stradduniq'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>name</td>
	<td>unique_to_drop</td>
</tr>
<tr>
	<td>addSelection</td>
	<td>TableColumnList</td>
	<td>label=name</td>
</tr>
<tr>
	<td>click</td>
	<td>add</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//input[@value='<?php echo $lang['stradd'] ?>']</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['struniqadded'] ?></td>
</tr>
<!-- drop PK before creating it again -->
<tr>
	<td>clickAndWait</td>
	<td>//tr/td/pre[text()='PRIMARY KEY (id)']/../../td/a[text()='<?php echo $lang['strdrop'] ?>']</td>
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
	<td><?php echo $lang['strconstraintdropped'] ?></td>
</tr>
<!-- Add primary key -->
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['straddpk'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>name</td>
	<td>student_pk</td>
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
	<td>clickAndWait</td>
	<td>//input[@value='Add']</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strpkadded'] ?></td>
</tr>
<!-- drop FK -->
<tr>
	<td>clickAndWait</td>
	<td>//tr/td[text()='fk_to_drop']/../td/a[text()='<?php echo $lang['strdrop'] ?>']</td>
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
	<td><?php echo $lang['strconstraintdropped'] ?></td>
</tr>
<!-- Drop unique -->
<tr>
	<td>clickAndWait</td>
	<td>//tr/td[text()='unique_to_drop']/../td/a[text()='<?php echo $lang['strdrop'] ?>']</td>
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
	<td><?php echo $lang['strconstraintdropped'] ?></td>
</tr>
<!-- Drop check -->
<tr>
	<td>clickAndWait</td>
	<td>//tr/td[text()='check_to_drop']/../td/a[text()='<?php echo $lang['strdrop'] ?>']</td>
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
	<td><?php echo $lang['strconstraintdropped'] ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
