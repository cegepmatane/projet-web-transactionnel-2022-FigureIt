<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
if ($_SESSION["lastConnexion"] < (time()-60)){
    $_SESSION["loggedin"] = null;
    header("location: index.php");
    exit;
}
?>
<! DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connecté maintient session</title>
</head>
<body>
    <h1>Connecté en tant que <b><?= $_SESSION["nom"]?></b></h1>
    <h2>ID session : <?= session_id()?></h2>
    <h2>Temps de dernière connexion : <?= $_SESSION["lastConnexion"] ?></h2>
    <h2>Temps actuel : <?= time() ?></h2>
    <h2>Différence de temps : <?= time() - $_SESSION["lastConnexion"]?></h2>
    <h2>Logged in : <?= $_SESSION["loggedin"] ?></h2>
</body>
</html>
