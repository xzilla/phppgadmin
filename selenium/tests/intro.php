<?php require('./config.inc.php') ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Test</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">Try to create a role with wrong pass, create it, unlog and try login with it.</td></tr>
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
	<td>link=<?php echo $lang['strcreaterole'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>formRolename</td>
	<td><?php echo $admin_user ?></td>
</tr>
<tr>
	<td>type</td>
	<td>formPassword</td>
	<td><?php echo $admin_user_pass ?>bad</td>
</tr>
<tr>
	<td>type</td>
	<td>formConfirm</td>
	<td><?php echo $admin_user_pass ?></td>
</tr>
<tr>
	<td>click</td>
	<td>formSuper</td>
	<td></td>
</tr>
<tr>
	<td>click</td>
	<td>formCreateDB</td>
	<td></td>
</tr>
<tr>
	<td>click</td>
	<td>formCreateRole</td>
	<td></td>
</tr>
<tr>
	<td>click</td>
	<td>formInherits</td>
	<td></td>
</tr>
<tr>
	<td>click</td>
	<td>formCanLogin</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>create</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strpasswordconfirm'] ?></td>
</tr>
<tr>
	<td>type</td>
	<td>formPassword</td>
	<td><?php echo $admin_user_pass ?></td>
</tr>
<tr>
	<td>type</td>
	<td>formConfirm</td>
	<td><?php echo $admin_user_pass ?></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>create</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strrolecreated'] ?></td>
</tr>
<?php include('logout.php'); ?>
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
	<td><?php echo $admin_user ?></td>
</tr>
<tr>
	<td>type</td>
	<td>//input[@id='loginPassword']</td>
	<td><?php echo $admin_user_pass ?></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>loginSubmit</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//div[@class='topbar']/descendant::span[@class='username']</td>
	<td><?php echo $admin_user ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>
