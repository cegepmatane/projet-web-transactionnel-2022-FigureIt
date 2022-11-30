<?php
    require_once 'config.php';
    session_start();
    if (isset($_SESSION["loggedin"]) && isset($_SESSION["lastConnexion"])){
        if ($_SESSION["lastConnexion"] < (time()-TEMPS_MAINTIENT) && $_SESSION["lastConnexion"] > (time() - UN_JOUR)){
            $_SESSION["loggedin"] = null;
            header("location: ".SITE_URL."connexion.php");
            exit;
        }else if($_SESSION["lastConnexion"] < (time() - UN_JOUR)){
            $_SESSION = array();
            session_destroy();
        }else{
            $_SESSION["lastConnexion"] = time();
        }
    }

    $taillePanier = 0;
    if (isset($_SESSION['panier'])){
        $taillePanier = count($_SESSION['panier']);
    }

    if(isset($_SESSION['langue'])){
        $langue = $_SESSION['langue'];
    }else{
        $langue = 'fr_FR.utf-8';
    }

    //$locale = "fr_FR.utf-8";
    //$pathLocales = "../locales";

    $locale = "fr";
    $pathLocales = "C:\xampp\htdocs\projet-web-transactionnel-2022-FigureIt\locales";

    if (defined('LC_MESSAGES')) {
        putenv("LANG=$locale");
        putenv("LANGUAGE=$locale");
        $domain = 'messages';
        setlocale(LC_MESSAGES, $locale); // Linux
        setlocale(LC_ALL, $locale);
        bindtextdomain($domain, $pathLocales );
        bind_textdomain_codeset($domain, 'UTF-8');
    } else {
        putenv("LC_ALL=$locale"); // windows 
        $domain = 'messages';
        textdomain($domain);
        echo bindtextdomain($domain, $pathLocales);
        bind_textdomain_codeset($domain, 'UTF-8');
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
    <link href="<?= SITE_URL ?>style.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        function previewPanier(){
            var previewDiv = document.getElementById("panier-preview");
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function (){
                if (this.readyState === 4 && this.status === 200){
                    previewDiv.innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "loadPanier.php", true);
            xmlhttp.send();
        }

        function changeLangue(obj) {
            if (obj.id == 'radio1') {
                console.log(obj.value);
            } else {
                console.log(obj.value);
            }
            //document.getElementById('test').innerHTML = obj.value;
            //location.reload();
        }
    </script>
</head>
<body class="d-flex flex-column h-100">
<div class="container">
    <div class="container-fluid">
        <div class="row row-col-2">
            <div  class="d-inline-block col-md-6">
                <a id="test"><?= $langue ?></a>
                <h1>Figure It</h1>
            </div>
            <div class="gap-3 d-flex ms-auto mt-1 col-md-6 justify-content-md-end">
                <div id="panier">
                    <a href="<?= SITE_URL?>panier.php" class="mt-md-1 me-2 panier"  onmouseover="previewPanier()">
                        <img src="<?= SITE_URL."images/icons8-shopping-cart-30.png"?>" alt="panier" width="30" height="30">
                        <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger"><?= $taillePanier ?></span>
                    </a>
                    <div class="preview" id="panier-preview"></div>
                </div>
                <?php
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ ?>
                        <a href="<?= SITE_URL."user/index.php"?>" class="user-profile"><?= $_SESSION["nom"]?></a>
                        <a href="<?= SITE_URL."user/logout.php"?>" class="user-profile"><?= _('D&eacute;connexion') ?></a>
                <?php }else{ ?>
                        <a href="<?= SITE_URL?>inscription.php" class="login"><?= _('Inscription') ?></a>
                        <a href="<?= SITE_URL?>connexion.php" class="login"><?= _('Connexion') ?></a>
                <?php } ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioLangue" id="radio1" value="fr_FR.utf-8" onchange="changeLangue(this)" <?= ($langue == "fr_FR.utf-8" ? "checked":"") ?>>
                    <label class="form-check-label" for="radioFR">
                        fr
                    </label>
                    </br>
                    <input class="form-check-input" type="radio" name="radioLangue" id="radio2" value="en_CA.utf-8" onchange="changeLangue(this)" <?= ($langue == "en_CA.utf-8" ? "checked":"") ?>>
                    <label class="form-check-label" for="radioEN">
                        en
                    </label>
                </div>
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
                            <a class="nav-link <?php echo ($pageActive == "accueil" ? "active" : "")?>" href="<?= SITE_URL?>index.php"><?= _('Accueil') ?></a>
                        </li>
                        <li>
                            <a class="nav-link <?php echo ($pageActive == "listeFigurine" ? "active" : "")?>" href="<?= SITE_URL?>listeFigurine.php"><?= _('Figurines') ?></a>
                        </li>
                        <li>
                            <a class="nav-link <?php echo ($pageActive == "mission" ? "active" : "")?>" href="<?= SITE_URL?>mission.php"><?= _('Mission') ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<hr class="navDivider">
</div>

