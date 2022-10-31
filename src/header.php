<?php
    require_once 'config.php';
    session_start();

if ($_SESSION["lastConnexion"] < (time()-TEMPS_MAINTIENT) && $_SESSION["lastConnexion"] > (time() - UN_JOUR)){
    $_SESSION["loggedin"] = null;
    header("location: ".SITE_URL."/connexion.php");
    exit;
}else if($_SESSION["lastConnexion"] < (time() - UN_JOUR)){
    $_SESSION = array();
    session_destroy();
}
?>
<!doctype html>
<html class="h-100">
<head>
    <title><?php echo $titre; ?></title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<div class="container">
    <div class="container-fluid">
        <div class="row row-col-2">
            <div  class="d-inline-block col-md-6">
                <h1>Figure It</h1>
            </div>
            <div class="gap-3 d-flex ms-auto mt-1 col-md-6 justify-content-md-end">
                <?php
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ ?>
                        <a href="<?= SITE_URL."/user/index.php"?>" class="user-profile"><?= $_SESSION["nom"]?></a>
                        <a href="<?= SITE_URL."/user/logout.php"?>">D&eacute;connexion</a>
                <?php }else{ ?>
                        <a href="<?= SITE_URL.'/'?>inscription.php" class="login">Inscription</a>
                        <a href="<?= SITE_URL.'/'?>connexion.php" class="login">Connexion</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#liensNavbar" aria-controls="liensNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="liensNavbar">
                    <ul class="nav navbar-nav nav-pills nav-justified mb-1 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($pageActive == "accueil" ? "active" : "")?>" href="<?= SITE_URL.'/'?>index.php">Accueil</a>
                        </li>
                        <li>
                            <a class="nav-link <?php echo ($pageActive == "listeFigurine" ? "active" : "")?>" href="<?= SITE_URL.'/'?>listeFigurine.php">Figurines</a>
                        </li>
                        <li>
                            <a class="nav-link <?php echo ($pageActive == "mission" ? "active" : "")?>" href="<?= SITE_URL.'/'?>mission.php">Mission</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<hr class="navDivider">
</div>

