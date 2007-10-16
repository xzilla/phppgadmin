<?php require('./config.inc.php') ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Test</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">Droping a role which own a db should fail.</td></tr>
</thead><tbody>
<tr>
	<td>open</td>
	<td><?php echo $webUrl ?>/servers.php</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $serverName ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>//input[@name='loginUsername']</td>
	<td><?php echo $superuser ?></td>
</tr>
<tr>
	<td>type</td>
	<td>//input[@id='loginPassword']</td>
	<td><?php echo $superpass ?></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>loginSubmit</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strroles'] ?></td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//tr/td/a[text()='<?php echo $admin_user ?>']/../../td/a[text()='<?php echo $lang['strdrop'] ?>']</td>
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
	<td><?php echo $lang['strroledroppedbad'] ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
