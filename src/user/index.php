<?php
    $titre = "Historique";
    $pageActive = "historique";
    include  "../header.php";

    include "../accesseur/CommandeDAO.php";
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


