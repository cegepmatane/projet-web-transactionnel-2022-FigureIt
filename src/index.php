<?php
    if (isset($_GET['menu'])){
        $page = $_GET['menu'];
    }else{
        $page = "accueil";
    }
    $FIGUREIT = "FigureIt - ";
    $title = "";
    $content = "";
    switch ($page){
        case "accueil" :
            $title = $FIGUREIT."Accueil";
            $content = "./accueil.php";
            break;
        case "listeFigurine" :
            $title = $FIGUREIT."Liste Figurines";
            $content = "./listeFigurine.php";
            break;
        case 'mission' :
            $title = $FIGUREIT."Mission";
            break;
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
    <div id="header-div">
        <h1>Figure It</h1>
        <div class="navbar">
            <a href="index.php?menu=accueil">Accueil</a>
            <a href="index.php?menu=listeFigurine">Figurines</a>
            <a href="index.php?menu=listeFigurine">Mission</a>
            <a href="index.php?menu=listeFigurine">Admin</a>
        </div>
        <div>
            <button id="boutonPanier">Panier</button>
            <div>
                <a href="#">Inscription</a>
                <a href="#">Connextion</a>
            </div>
        </div>
    </div>
    <br><br>
    <?php include $content?>
</body>
</html>
