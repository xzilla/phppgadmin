<tr>
	<td>clickAndWait<?php echo $plop ?></td>
	<td>link=<?php echo $lang['strlogout'] ?></td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo sprintf($lang['strlogoutmsg'], $serverName) ?></td>
</tr>
