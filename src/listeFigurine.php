<?php
    $titre = "Liste Figurine";
    $pageActive = "listeFigurine";
    include "header.php";

    include "accesseur/FigurineDAO.php";
    $figurines = FigurineDAO::listerFigurines();
?>
<div class="container-fluid px-5">
    <div class="row row-cols-1 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 liste-figurine-row justify-content-center">

        <?php
            if ($figurines) foreach ($figurines as $figurine){
        ?>

            <div class="col">
                <div class="card border-secondary h-100" id="figurine1">
                    <img src="images/<?= formater($figurine->image)?>" class="card-img-top figurine-img-border img-fluid" alt="Placeholder">

                    <div class="card-body">
                        <div class="mb-3" id="titre-figurine">
                            <h6 class="font-weigth-semibold">
                                <a href="details.php?id=<?= $figurine->id ?>" class="text-default" style="text-decoration: none !important;"><?= formater($figurine->titre) ?></a>
                            </h6>
                        </div>

                        <div id="prix">
                            <h3 class="mb-2 font-weight-semibold"><?= formater($figurine->prix) ?>$</h3>
                        </div>

                        <div class="mb-3 text-muted"><?= formater($figurine->vendeur)?></div>

                        <div class="d-flex justify-content-end" id="bouton-ajouter-panier">
                            <form action="ajoutPanier.php" method="post">
                                <input type="hidden" name="idFigurine" value="<?=$figurine->id?>">
                                <input type="hidden" name="referer" value="listeFigurine.php">
                                <button type="submit" class="btn btn-primary mt-md-2 mb-3"><?= _("Ajouter au panier")?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include 'footer.php'; ?>
