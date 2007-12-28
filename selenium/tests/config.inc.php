<?php
require('../../lang/recoded/english.php');

$webUrl = 'http://boox/~ioguix/ppa/ppa.test';
$serverName = '8.3'; // one of your $conf['servers'][*]['desc'] in conf/config.inc/php
#deprecated $superuser = 'ppatests_super'; // according to your selenium/tests/data/config.sql
#deprecated $superpass = 'super'; // according to your selenium/tests/data/config.sql
$superuser = 'postgres'; //only use to create and drop the following admin role
$superpass = 'pgpass';
$admin_user = 'admin_user';
$admin_user_pass = 'super';
$user = 'ppa_tests_user';
$user_pass = 'ppa_tests_user_pass';
$testdb = 'ppatests_db';
?>
