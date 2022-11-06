<?php
     $titre = "Details";
     $pageActive = "details";
     include "header.php";
     include "accesseur/FigurineDAO.php";

     $idFigurine = filter_var($_GET['id'], FILTER_VALIDATE_INT);
     $figurine = FigurineDAO::findFigurineById($idFigurine);
 ?>
<div class="container d-flex flex-column">
    <div class="mt-4 mx-sm-3 row">
        <div class="col-md-6 col-sm-12 me-sm-4">
            <div class="mb-md-4 mx-auto text-center">
                <img src="images/<?= formater($figurine->image) ?>" class="img-fluid" alt="Placeholder">
            </div>
            <div class="d-grid gap-2 hide-button-sm">
                <button type="button" class="btn btn-primary mt-md-6 mt-sm-3 mb-3">Ajouter au panier</button>
            </div>
            <div class="mb-md-4 ms-sm-3 me-sm-3">
                <p class="text-justify">
                    <strong>Description : </strong> <?= formater($figurine->description) ?>
                </p>
            </div>
        </div>

        <div class="col-md-5 col-sm-12 ms-sm-4">
            <div class="mb-md-4 mx-auto text-center">
                <h2 class="mt-md-6 mt-sm-3 mb-3"><?= formater($figurine->titre)?></h2>
                <div class="mb-md-4 text-muted"><?= formater($figurine->vendeur)?></div>
                <div class="fs-1 mb-3"><?= formater($figurine->prix) ?>$</div>
                <div class="d-grid gap-2 hide-button-lg">
                    <a href="create-checkout-session.php?id=<?= $figurine->id ?>">
                        <button type="button" class="btn btn-primary mt-md-6 mt-sm-3 mb-3">Ajouter au panier</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
