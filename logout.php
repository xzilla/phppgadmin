<?php

/**
 * Logs a user out of the app
 *
 * $Id: logout.php,v 1.2 2003/09/08 04:37:16 chriskl Exp $
 */

session_name('PPA_ID');
session_start();
unset($_SESSION);
session_destroy();

header('Location: index.php');

?>
