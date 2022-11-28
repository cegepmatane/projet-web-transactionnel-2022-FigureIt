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
            if ($figurinesAccueil) foreach ($figurinesAccueil as $figurine){
        ?>
            <div class="col-lg-4">
                <div class="card border-secondary h-100" id="figurine1">
                    <img src="images/<?= formater($figurine->image) ?>" class="card-img-top figurine-img-border img-fluid" alt="Placeholder">

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
                            <form action="ajoutPanier.php" method="post">
                                <input type="hidden" name="idFigurine" value="<?=$figurine->id?>">
                                <input type="hidden" name="referer" value="index.php">
                                <button type="submit" class="btn btn-primary mt-md-2 mb-3"><?= _('Ajouter au panier') ?></button>
                            </form>
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


