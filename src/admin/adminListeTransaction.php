<?php
    $titre = "AdminListeTransaction";
    $pageActive = "adminListeTransaction";
    include "accesseur/CommandeDAO.php";
    $commandes = CommandeDAO::listerCommandes();

    if(!empty($commandes)){
        usort($commandes, fn($a, $b) => $a->timestamp == $b->timestamp);

        foreach ($commandes as $commande){
            $commande->prix = $commande->prix * $commande->quantite;
        }

        for ($i = count($commandes)-1; $i > 0; $i--){
            if ($commandes[$i]->timestamp == $commandes[$i-1]->timestamp){
                $commandes[$i]->quantite += $commandes[$i-1]->quantite;
                $commandes[$i]->prix += $commandes[$i-1]->prix;
                unset($commandes[$i-1]);
                $i--;
            }
        }
    }
?>
<!DOCTYPE html>
<html class="h-100">
<head>
    <meta charset="utf-8">
    <title><? _('Admin') ?></title>
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
        </div>
        <div class="content">
            <div class="overflower">
            <table class="liste">
                <tr class="titres">
                    <th><?= _('Id transaction') ?></th>
                    <th><?= _('Nom acheteur') ?></th>
                    <th><?= _('Nombre figurines') ?></th>
                    <th><?= _('Prix') ?></th>
                    <th><?= _('Etat') ?></th>
                    
                </tr>
                
                <?php foreach ($commandes as $commande){ 
                    ?>
                    <tr>
                        <td><?= (new CommandeDAO)->formater($commande->timestamp)?></td>
                        <td><?= (new CommandeDAO)->formater($commande->client)?></td>
                        <td><?= (new CommandeDAO)->formater($commande->quantite)?></td>
                        <td><?= (new CommandeDAO)->formater($commande->prix)?></td>
                        <td><?= (new CommandeDAO)->formater($commande->date)?></td>
                        
                    </tr>
                <?php } ?>
                
            </table>
            </div>
        </div>
    </div>
<?php include "../footer.php"; ?>