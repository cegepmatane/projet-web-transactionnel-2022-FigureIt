<?php
    $titre = "AdminListe";
    $pageActive = "adminListe";
    require_once "../config.php";
    include SITEPATH."admin/accesseur/FigurineDAO.php";
    $figurines = FigurineDAO::listerFigurines();
?>
<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="utf-8">
    <title><?= _('Admin') ?></title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


</head>
<body class="d-flex flex-column h-100">
    <div class="container">
        <div class="header">
            <h1>FigureIt</h1>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#liensNavbar" aria-controls="liensNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="liensNavbar">
                        <ul class="nav navbar-nav nav-pills nav-justified mb-1 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php"><?= _('Accueil') ?></a>
                            </li>
                            <li>
                                <a class="nav-link " href="adminListeTransaction.php"><?= _('Liste Transactions') ?></a>
                            </li>
                        </ul>
                    </div>
            </div>
        </nav>

        <div class="content">
            <button type="button" class="addButton" onclick="window.location.href='adminAjouter.php'"><?= _('+ Ajouter') ?></button>
            <div class="overflower">
            <table class="liste">
                <tr class="titres">
                    <th><?= _('Nom du Vendeur') ?></th>
                    <th><?= _('Nom du produit') ?></th>
                    <th><?= _('Quantité') ?></th>
                    <th><?= _('Prix') ?></th>
                    <th><?= _('Actions') ?></th>
                    
                </tr>
                
                <?php foreach ($figurines as $figurine){ 
                    ?>
                    <tr>
                        <td><?= formater($figurine->vendeur)?></td>
                        <td><?= formater($figurine->titre)?></td>
                        <td><?= formater($figurine->quantite)?></td>
                        <td><?= formater($figurine->prix)?></td>
                        <td>
                            <a href="adminModifier.php?id=<?= $figurine->id?>"><?= _('Modifier') ?></a>
                            <a href="adminSupprimer.php?id=<?=$figurine->id?>"><?= _('Supprimer') ?></a>
                        </td>
                        
                    </tr>
                <?php } ?>
                
            </table>
            </div>
        </div>
    </div>
<?php include "../footer.php"; ?>