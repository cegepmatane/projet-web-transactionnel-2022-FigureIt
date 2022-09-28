<?php
    $titre = "AdminModifier";
    $pageActive = "adminModifier";

    include_once "accesseur/FigurineDAO.php";
    include_once "accesseur/ClientDAO.php";

    $figurine = FigurineDAO::findFigurineById($_GET['id']);
    $clients = ClientDAO::listerClients();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin_modifier.css">
    <meta name="viewport"
            content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../css/admin_modifier.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <button type="button" id="disconnect">Déconnection</button>
            <h1>Admin</h1>
        </div>
        <div class="content">
            <h2>Modifier produit</h2>
                <form action="admin_modifie.php?id=<?= $figurine->id?>" method="post">
                    <div class="row row-col-3 g-4">
                        <div class="col-lg-4">
                            <label for="nom">Nom</label> <br>
                            <input type="text" name="titre" id="nom" value="<?=formater($figurine->titre)?>"> <br>
                            <label for="prix">Prix</label> <br>
                            <input type="text" name="prix" id="prix" value="<?=formater($figurine->prix)?>"> <br>
                            <label for="quantite">Quantite</label> <br>
                            <input type="text" name="quantite" id="quantite" value="<?=formater($figurine->quantite)?>"> <br>
                            <label for="vendeur">Vendeur</label> <br>
                            <select name="vendeur" id="vendeur">
                                <option value="<?=formater($figurine->vendeur)?>" ><?=formater($figurine->vendeur)?></option>
                                <?php foreach ($clients as $client){ 
                                    if($client->nom!=$figurine->vendeur) {
                                ?>
                                    <option value="<?= formater($client->nom)?>"><?= formater($client->nom)?></option>
                                <?php } } ?>
                            </select> <br>
                        </div>
                        <div class="col-lg-4">
                            <img src="../images/IronMan.png" alt="Image Iron Man" width="128" height="128"> <br>
                            <input type="file" id="image" name="image" class="mt-3"> <br>
                        </div>
                        <div class="col-lg-4">
                            <label for="description">Description</label> <br>
                            <textarea name="description" id="description"><?=formater($figurine->description)?></textarea><br>
                        </div>
                        
                        <input type="submit" value="Modifier" id="ajouter" class="btn btn-secondary">
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
    
</html>