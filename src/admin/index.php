<?php
    $titre = "AdminListe";
    $pageActive = "adminListe";

    include "accesseur/FigurineDAO.php";
    $figurines = FigurineDAO::listerFigurines();
?>
<!DOCTYPE html>
<html class="h-100">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
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
        <div class="content">
            <button type="button" class="addButton" onclick="window.location.href='adminAjouter.php'">+ Ajouter</button>
            <div class="overflower">
            <table class="liste">
                <tr class="titres">
                    <th>Nom du Vendeur</th>
                    <th>Nom du produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Actions</th>
                    
                </tr>
                
                <?php foreach ($figurines as $figurine){ 
                    ?>
                    <tr>
                        <td><?= formater($figurine->vendeur)?></td>
                        <td><?= formater($figurine->titre)?><td>
                        <td><?= formater($figurine->quantite)?></td>
                        <td><?= formater($figurine->prix)?></td>
                        <td>
                            <a href="admin_liste.html?id={{ user.id }}">Modifier</a>
                            <a href="admin_liste.html?id={{ user.id }}">Supprimer</a>
                        </td>
                        
                    </tr>
                <?php } ?>
                
            </table>
            </div>
        </div>
    </div>
<?php include "../footer.php"; ?>