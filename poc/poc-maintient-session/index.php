<?php
    require_once "SQLSessionHandler.php";
    $sessionHandlerInstance = new SQLSessionHandler();
    session_set_save_handler($sessionHandlerInstance, true);
    session_start();
    $_SESSION["userId"] = "1";
    $_SESSION["truc"] = "bidule";
?>

