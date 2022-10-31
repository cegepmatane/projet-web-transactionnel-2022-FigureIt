<?php
require_once "../config.php";
session_start();
$_SESSION = array();
session_destroy();
header("location: ".SITEPATH."index.php");
exit;
?>
