<?php
include "../../src/admin/accesseur/ClientDAO.php";

$user = 'site_user';
$password = '';
$host = 'localhost';
$db = 'figureit';
$dsn = "mysql:dbname=".$db.";host=".$host;


try {
    ClientDAO::$bdd = new PDO($dsn, $user, $password);
    //print_r(ClientDAO::$bdd);
    ClientDAO::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $exception){
    echo ('NTM sale noob : ' . $exception->getMessage());
    exit;
}
?>

<form action="ajout_client.php" method="post">

    <input type="text" class="form-control" placeholder="Identifiant" name="nom" id="nom" required>

    <input type="text" class="form-control" placeholder="Email" name="email" id="email" required>

    <input type="text" class="form-control" placeholder="Mot de passe" name="motDePasse" id="motDePasse" required>

    <button type="submit">Inscription</button>

</form>
</br>
<form action="connexion_client.php" method="post">

    <input type="text" class="form-control" placeholder="Email"  name="email" id="email" required>

    <input type="text" class="form-control" placeholder="Mot de passe" name="motDePasse" id="motDePasse" required>

    <button type="submit">Connexion</button>

</form>