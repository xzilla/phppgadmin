<?php

/**
 * Logs a user out of the app
 *
 * $Id: logout.php,v 1.1 2003/01/18 06:38:36 chriskl Exp $
 */

session_start();
unset($_SESSION);
session_destroy();

header('Location: index.php');

?>
