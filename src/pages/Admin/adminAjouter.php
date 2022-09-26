<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport"
            content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="./css/admin_ajout.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <button type="button" id="disconnect">Déconnexion</button>
            <h1>Admin</h1>
        </div>
        <div class="content">
            <h2>Ajouter produit</h2>
                <form action="admin_ajout.php" method="post">
                    <div class="row row-col-3 g-4">
                        <div class="col-lg-4">
                            <label for="nom">Nom</label> <br>
                            <input type="text" name="nom" id="nom"> <br>
                            <label for="prix">Prix</label> <br>
                            <input type="text" name="prix" id="prix"> <br>
                            <label for="quantite">Quantite</label> <br>
                            <input type="text" name="quantite" id="quantite"> <br>
                            <label for="vendeur">Vendeur</label> <br>
                            <select name="vendeur" id="vendeur">
                                <option value="vendeur1">Vendeur1</option>
                                <option value="vendeur2">Vendeur2</option>
                            </select> <br>
                        </div>
                        <div class="col-lg-4">
                            <img src="../../../images/ImageNotFound.PNG" alt="Image not found" width="128" height="128"> <br>
                            <input type="file" id="image" name="image" class="mt-3"> <br>
                        </div>
                        <div class="col-lg-4">
                            <label for="description">Description</label> <br>
                            <input type="text" name="description" id="description"> <br>
                        </div>
                        
                        <input type="submit" value="Ajouter" id="ajouter" class="btn btn-secondary">
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
    
</html>