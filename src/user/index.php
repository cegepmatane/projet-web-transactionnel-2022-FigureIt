<?php
    $titre = "Historique";
    $pageActive = "historique";
    include  "../header.php";

    include "../accesseur/CommandeDAO.php";
    include "../accesseur/ClientDAO.php";

    $infosClient = ClientDAO::findClientById($_SESSION['id']);

    // Zone de création du tableau de commandes
    $commandes = CommandeDAO::findCommandesForClientId($_SESSION['id']);

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
<link rel="stylesheet" href="css/index.css">
<div class="container">
    <div>
        <button class="btn btn-secondary" id="btn-modifier-donnees"><?= _("Modifier vos données")?></button>
        <div id="zone-modification-donnees">
            <form class="row row-cols-lg-auto align-items-center g-3 mt-3" action="#" method="post" id="form-identifiant">
                <div class="col-auto">
                    <label for="identifiant">Identifiant :</label>
                </div>
                <div class="col-auto">
                    <input class="form-control" type="text" id="identifiant" value="<?= ClientDAO::formater($infosClient->nom)?>">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit" >Confirmer</button>
                </div>
            </form>

            <form class="row g-3 mt-3" action="#" method="post" id="form-email">
                <div class="col-auto">
                    <label for="email">Email :</label>
                </div>
                <div class="col-auto">
                    <input class="form-control" type="text" id="email" value="<?= ClientDAO::formater($infosClient->email)?>">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit" >Confirmer</button>
                </div>
            </form>

            <form class="row g-3 mt-3" action="#" method="post" id="form-password">
                <div class="col-auto">
                    <label for="password">Mot de passe :</label>
                </div>
                <div class="col-auto">
                    <input class="form-control" type="password" id="password" value="">
                </div>
                <div class="col-auto">
                    <button class="col-auto btn btn-primary"  type="submit" >Confirmer</button>
                </div>
            </form>
        </div>
    </div>
    <h2>Liste de vos transactions</h2>
    <div class="content">
        <div class="overflower">
            <table class="liste">
                <tr class="titres">
                    <th><?= _('Id commande') ?></th>
                    <th><?= _('Date d\'achat') ?></th>
                    <th><?= _('Quantité') ?></th>
                    <th><?= _('Prix') ?></th>
                </tr>

                <?php foreach ($commandes as $commande){ ?>
                    <tr>
                        <td><a href="#"><?= (new CommandeDAO)->formater($commande->timestamp)?></a></td>
                        <td><?= (new CommandeDAO)->formater($commande->date)?></td>
                        <td><?= (new CommandeDAO)->formater($commande->quantite)?></td>
                        <td><?= (new CommandeDAO)->formater($commande->prix)?>€</td>
                    </tr>
                <?php }?>

            </table>
        </div>
    </div>
</div>


