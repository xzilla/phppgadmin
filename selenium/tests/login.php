<!--tr>
	<td>open</td>
	<td>/~ioguix/ppa/ppa.selenium/</td>
	<td></td>
</tr>
<tr>
	<td>selectFrame</td>
	<td>detail</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strservers'] ?></td>
	<td></td>
</tr-->
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
