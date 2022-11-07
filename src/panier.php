<?php
    $titre = "Panier";
    $pageActive = "panier";
    include "header.php";
    include "accesseur/FigurineDAO.php";
    $panier = $_SESSION['panier'];
    $total = 0;
?>

<div class="content mt-lg-4 px-md-5">
    <div class="listeAchat">
        <?php if(!empty($panier)){
            foreach ($panier as $idFigurine){
                $figurine = FigurineDAO::findFigurineById($idFigurine['id']);
                error_log(print_r($idFigurine, true));
                $total += $figurine->prix;?>
                <div class="figurine d-flex">
                    <div class="mb-md-4 text-muted"><?= formater($figurine->titre)?></div>
                    <div class="mx-md-3 mb-3"><?= formater($figurine->prix) ?>$</div>
                    <div><?= $idFigurine['quantite']?></div>
                </div>
            <?php }
        }?>
    </div>
    <div class="resume">
        <span class="resumeListe">
            <div> Sous total hors taxe : <?= $total ?>$</div>
            <div> Total après taxe : <?= round($total + ($total * 0.05) + ($total * 0.09975), 2)?>$</div>
        </span>
    </div>
</div>

