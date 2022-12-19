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
<script>
    function toggleFormDonnees() {
        var divForm = document.getElementById("zone-modification-donnees");
        if (divForm.style.display === "none"){
            divForm.style.display = "block";
        }else{
            divForm.style.display = "none";
        }
    }

    function modifierDonnees(buttonId){
        let input;
        let spanReponse;
        let data;
        let xhr = new XMLHttpRequest();
        switch (buttonId) {
            case '1' :
                input = document.getElementById("identifiant");
                spanReponse = document.getElementById("messages-identifiant");

                data = {
                    identifiant: input.value
                }
                console.log(data);

                xhr.onreadystatechange = function (){
                    if(this.status === 200){
                        spanReponse.innerHTML = this.responseText;
                    }
                };
                console.log(JSON.stringify(data));

                xhr.open("POST", "modifierDonnees.php", true);
                xhr.send(JSON.stringify(data));
                break;
            case '2' :
                input = document.getElementById("email");
                spanReponse = document.getElementById("messages-mail");

                data = {
                    mail: input.value
                }

                xhr.onreadystatechange = function (){
                    if(this.status === 200 && this.readyState === 4){
                        spanReponse.innerHTML = this.responseText;
                    }
                };
                xhr.open("POST", "modifierDonnees.php", true);
                xhr.send(JSON.stringify(data));
                break;
            case '3' :
                input = document.getElementById("password");
                spanReponse = document.getElementById("messages-mdp");

                data = {
                    mdp: input.value
                }

                xhr.onreadystatechange = function (){
                    if(this.status === 200 && this.readyState === 4){
                        spanReponse.innerHTML = this.responseText;
                    }
                };
                xhr.open("POST", "modifierDonnees.php", true);
                xhr.send(JSON.stringify(data));
                break;
        }
    }
</script>
<div class="container">
    <div>
        <button class="btn btn-secondary" id="btn-modifier-donnees" onclick="toggleFormDonnees()"><?= _("Modifier vos données")?></button>
        <div id="zone-modification-donnees" style="display: none;">
            <form class="row row-cols-lg-auto align-items-center g-3 mt-3" action="" method="post" id="form-identifiant">
                <div class="col-auto" style="width: 126px;">
                    <label for="identifiant">Identifiant :</label>
                </div>
                <div class="col-auto">
                    <input class="form-control" type="text" name="identifiant" id="identifiant" value="<?= ClientDAO::formater($infosClient->nom)?>">
                </div>
                <div class="col-auto">
                    <input class="btn btn-primary" id="1" type="button" value="Confirmer" onclick="modifierDonnees(this.id)">
                </div>
                <div class="col-auto">
                    <span id="messages-identifiant"></span>
                </div>
            </form>

            <form class="row g-3 mt-3" action="" method="post" id="form-email">
                <div class="col-auto" style="width: 126px;">
                    <label for="email">Email :</label>
                </div>
                <div class="col-auto">
                    <input class="form-control" type="email" name="email" id="email" value="<?= ClientDAO::formater($infosClient->email)?>">
                </div>
                <div class="col-auto">
                    <input class="btn btn-primary" id="2" type="button" value="Confirmer" onclick="modifierDonnees(this.id)">
                </div>
                <div class="col-auto">
                    <span id="messages-mail"></span>
                </div>
            </form>

            <form class="row g-3 mt-3" action="" method="post" id="form-password">
                <div class="col-auto" style="width: 126px;">
                    <label for="password">Mot de passe :</label>
                </div>
                <div class="col-auto">
                    <input class="form-control" type="password" name="password" id="password" value="">
                </div>
                <div class="col-auto">
                    <input class="col-auto btn btn-primary" id="3" type="button" value="Confirmer" onclick="modifierDonnees(this.id)">
                </div>
                <div class="col-auto">
                    <span id="messages-mdp"></span>
                </div>
            </form>
        </div>
    </div>
    <h2><?= _('Liste de vos transactions') ?></h2>
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


