<?php
require_once "../config.php";
session_start();
$_SESSION = array();
session_destroy();
header("location: ".SITE_URL."index.php");
exit;
?>
