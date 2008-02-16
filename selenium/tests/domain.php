<?php require('./config.inc.php') ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Test</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">Create/Edit/Drop Domain</td></tr>
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
<!-- This domain will be used later in create table -->
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
<!-- new Domaine to test edits and drop -->
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
	<td>test_to_drop</td>
</tr>
<tr>
	<td>select</td>
	<td>domtype</td>
	<td>label=integer</td>
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
<!-- Alter domain default, owner and not null -->
<tr>
	<td>clickAndWait</td>
	<td>//tr/td/a[text()='test_to_drop']/../../td/a[text()='<?php echo $lang['stralter'] ?>']</td>
	<td></td>
</tr>
<tr>
	<td>click</td>
	<td>domnotnull</td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>domdefault</td>
	<td>2008</td>
</tr>
<tr>
	<td>select</td>
	<td>domowner</td>
	<td>label=ppa_tests_user</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>alter</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strdomainaltered'] ?></td>
</tr>
<!-- add a check o the domain -->
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['straddcheck'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>name</td>
	<td>year_min</td>
</tr>
<tr>
	<td>type</td>
	<td>definition</td>
	<td>VALUE &gt;= 1901</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>add</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strcheckadded'] ?></td>
</tr>
<!-- Drop a domain's check  -->
<tr>
	<td>clickAndWait</td>
	<td>//tr/td[text()='year_min']/../td/a[text()='<?php echo $lang['strdrop'] ?>']</td>
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
<!-- Drop a domain -->
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strshowalldomains'] ?></td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//tr/td/a[text()='test_to_drop']/../../td/a[text()='<?php echo $lang['strdrop'] ?>']</td>
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
	<td><?php echo $lang['strdomaindropped'] ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
