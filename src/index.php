<?php
    $titre = "Accueil";
    $pageActive = "accueil";
    include "header.php";

    include "accesseur/FigurineDAO.php";
    $figurinesAccueil = FigurineDAO::afficher3PlusRecentesFigurines();

?>
<div class="container">
    <div class="row row-col-3 g-4">

        <?php
            foreach ($figurinesAccueil as $figurine){
        ?>
            <div class="col-lg-4">
                <div class="card border-secondary h-100" id="figurine1">
                    <img src="images/IronMan.png" class="card-img-top figurine-img-border img-fluid" alt="Placeholder">

                    <div class="card-body">
                        <div class="mb-3" id="titre-figurine">
                            <h6 class="font-weigth-semibold">
                                <a href="details.php?id=<?= $figurine->id ?>" class="text-default" style="text-decoration: none !important;"><?= formater($figurine->titre) ?></a>
                            </h6>
                        </div>

                        <div id="prix">
                            <h3 class="mb-2 font-weight-semibold"><?= formater($figurine->prix)?> $</h3>
                        </div>

                        <div class="mb-3 text-muted"><?= formater($figurine->vendeur)?></div>

                        <div class="d-flex justify-content-end" id="bouton-ajouter-panier">
                            <button type="button" class="btn btn-primary">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
<?php
    include "footer.php";
?>


