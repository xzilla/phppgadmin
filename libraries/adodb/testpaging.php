<?php
error_reporting(63);
include_once('adodb-pear.inc.php');
include_once('tohtml.inc.php');
session_register('curr_page');

$db = NewADOConnection('mysql');
$db->debug = true;
//$db->Connect('localhost:4321','scott','tiger','natsoft.domain');
$db->Connect('localhost','root','','xphplens');
$num_of_rows_per_page = 10;
$sql = "select * from adoxyz where firstname = 'John'";

if (isset($HTTP_GET_VARS['next_page']))
	$curr_page = $HTTP_GET_VARS['next_page'];
if (empty($curr_page)) $curr_page = 1; ## at first page

$rs = $db->CachePageExecute(15,$sql, $num_of_rows_per_page, $curr_page);
if (!$rs) die('Query Failed');

if (!$rs->EOF && (!$rs->AtFirstPage() || !$rs->AtLastPage())) {
	if (!$rs->AtFirstPage()) {
?>
<a href="<?php echo $PHP_SELF,'?next_page=',$rs->AbsolutePage() - 1 ?>">Previous page</a>
<?php
	}
	if (!$rs->AtLastPage()) {
?>
<a href="<?php echo $PHP_SELF,'?next_page=',$rs->AbsolutePage() + 1 ?>">Next page</a>
<?php
	}
	rs2html($rs);
}


?>
