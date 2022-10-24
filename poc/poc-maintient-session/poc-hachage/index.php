<?php
$user = 'site_user';
$password = '';
$host = 'localhost';
$db = 'figureit';
$dsn = "mysql:dbname=".$db.";host=".$host;


try {
    FigurineDAO::$bdd = new PDO($dsn, $user, $password);
    //print_r(FigurineDAO::$bdd);
    FigurineDAO::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $exception){
    echo ('NTM sale noob : ' . $exception->getMessage());
    exit;
}
?>

<form action="post">

    <input type="text" class="form-control" placeholder="Identifiant" id="inscription-identifiant" required>

    <input type="password" class="form-control" placeholder="Mot de passe" id="inscription-password" required>

    <button type="submit">Inscription</button>

</form>