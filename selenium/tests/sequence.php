<?php require('./config.inc.php') ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Test</title>
</head>
<body>
<table cellpadding="1" cellspacing="1" border="1">
<thead>
<tr><td rowspan="1" colspan="3">Create/alter/drop sequence</td></tr>
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
	<td>link=<?php echo $lang['strsequences'] ?></td>
	<td></td>
</tr>
<!-- create -->
<tr>
	<td>clickAndWait</td>
	<td>link=<?php echo $lang['strcreatesequence'] ?></td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>formSequenceName</td>
	<td>testcase_seq</td>
</tr>
<tr>
	<td>type</td>
	<td>formIncrement</td>
	<td>1</td>
</tr>
<tr>
	<td>type</td>
	<td>formMinValue</td>
	<td>1</td>
</tr>
<tr>
	<td>type</td>
	<td>formMaxValue</td>
	<td>100</td>
</tr>
<tr>
	<td>type</td>
	<td>formStartValue</td>
	<td>1</td>
</tr>
<tr>
	<td>type</td>
	<td>formCacheValue</td>
	<td>1</td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>create</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strsequencecreated'] ?></td>
</tr>
<!-- alter -->
<tr>
	<td>clickAndWait</td>
	<td>//tr/td/a[text()='testcase_seq']/../../td/a[text()='<?php echo $lang['stralter'] ?>']</td>
	<td></td>
</tr>
<tr>
	<td>type</td>
	<td>name</td>
	<td>testcase_renamed_seq</td>
</tr>
<tr>
	<td>select</td>
	<td>owner</td>
	<td>label=<?php echo $superuser ?></td>
</tr>
<tr>
	<td>type</td>
	<td>comment</td>
	<td>test comment on testcase_renamed_seq</td>
</tr>
<tr>
	<td>type</td>
	<td>formStartValue</td>
	<td>20</td>
</tr>
<tr>
	<td>type</td>
	<td>formIncrement</td>
	<td>3</td>
</tr>
<tr>
	<td>type</td>
	<td>formMaxValue</td>
	<td>104</td>
</tr>
<tr>
	<td>type</td>
	<td>formMinValue</td>
	<td>5</td>
</tr>
<tr>
	<td>type</td>
	<td>formCacheValue</td>
	<td>6</td>
</tr>
<tr>
	<td>click</td>
	<td>formCycledValue</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>alter</td>
	<td></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='message']</td>
	<td><?php echo $lang['strsequencealtered'] ?></td>
</tr>
<tr>
	<td>assertText</td>
	<td>//p[@class='comment']</td>
	<td>test comment on testcase_renamed_seq</td>
</tr>
<tr>
	<td>assertText</td>
	<td>//td[1][@class='data1']</td><!-- name -->
	<td>testcase_renamed_seq</td>
</tr>
<tr>
	<td>assertText</td>
	<td>//td[2][@class='data1']</td><!-- last value -->
	<td>20</td>
</tr>
<tr>
	<td>assertText</td>
	<td>//td[3][@class='data1']</td><!-- incr by -->
	<td>3</td>
</tr>
<tr>
	<td>assertText</td>
	<td>//td[4][@class='data1']</td><!-- max value -->
	<td>104</td>
</tr>
<tr>
	<td>assertText</td>
	<td>//td[5][@class='data1']</td><!-- min value -->
	<td>5</td>
</tr>
<tr>
	<td>assertText</td>
	<td>//td[6][@class='data1']</td><!-- cache value -->
	<td>6</td>
</tr>
<tr>
	<td>assertText</td>
	<td>//td[8][@class='data1']</td><!-- can cycle ? -->
	<td><?php echo $lang['stryes'] ?></td>
</tr>
<!-- drop -->
<tr>
	<td>clickAndWait</td>
	<td>//div[@class='trail']/descendant::a[@title='<?php echo $lang['strschema'] ?>']/span[@class='label' and text()='public']</td>
	<td></td>
</tr>
<tr>
	<td>clickAndWait</td>
	<td>//tr/td/a[text()='testcase_renamed_seq']/../../td/a[text()='<?php echo $lang['strdrop'] ?>']</td>
	<td></td>
</tr>
<tr>
	<td>click</td>
	<td>cascade</td>
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
	<td><?php echo $lang['strsequencedropped'] ?></td>
</tr>
<?php include('logout.php'); ?>
</tbody></table>
</body>
</html>