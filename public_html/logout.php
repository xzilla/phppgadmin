<?php

/**
 * Logs a user out of the app
 *
 * $Id: logout.php,v 1.2 2003/01/04 07:08:03 chriskl Exp $
 */

session_start();
unset($_SESSION);
session_destroy();

header('Location: index.php');

?>
