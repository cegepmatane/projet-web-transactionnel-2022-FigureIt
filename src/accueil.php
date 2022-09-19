<?php
    $titre = "Accueil";
    $pageActive = "accueil";
    include "header.php";
?>
<div class="container">
    <div class="row row-col-3 g-4">

        <div class="col-lg-4">
            <div class="card border-secondary" id="figurine1">
                <img src="./pages/Images/Placeholder_view_vector.svg" class="card-img-top figurine-img-border" alt="Placeholder">

                <div class="card-body">
                    <div class="mb-3" id="titre-figurine">
                        <h6 class="font-weigth-semibold">
                            <a href="details.php" class="text-default" style="text-decoration: none !important;">Figurine 1/5 Iron Man</a>
                        </h6>
                    </div>

                    <div id="prix">
                        <h3 class="mb-2 font-weight-semibold">00,00$</h3>
                    </div>

                    <div class="mb-3 text-muted">Nom du vendeur</div>

                    <div class="d-flex justify-content-end" id="bouton-ajouter-panier">
                        <button type="button" class="btn btn-primary">Ajouter au panier</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-secondary" id="figurine2">
                <img src="./pages/Images/Placeholder_view_vector.svg" class="card-img-top figurine-img-border" alt="Placeholder">

                <div class="card-body">
                    <div class="mb-3" id="titre-figurine">
                        <h6 class="font-weigth-semibold">
                            <a href="details.php" class="text-default" style="text-decoration: none !important;">Figurine 1/5 Iron Man</a>
                        </h6>
                    </div>

                    <div id="prix">
                        <h3 class="mb-2 font-weight-semibold">00,00$</h3>
                    </div>

                    <div class="mb-3 text-muted">Nom du vendeur</div>

                    <div class="d-flex justify-content-end" id="bouton-ajouter-panier">
                        <button type="button" class="btn btn-primary">Ajouter au panier</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary" id="figurine3">
                <img src="./pages/Images/Placeholder_view_vector.svg" class="card-img-top figurine-img-border" alt="Placeholder">

                <div class="card-body">
                    <div class="mb-3" id="titre-figurine">
                        <h6 class="font-weigth-semibold">
                            <a href="details.php" class="text-default" style="text-decoration: none !important;">Figurine 1/5 Iron Man</a>
                        </h6>
                    </div>

                    <div id="prix">
                        <h3 class="mb-2 font-weight-semibold">00,00$</h3>
                    </div>

                    <div class="mb-3 text-muted" id="nom-vendeur">Nom du vendeur</div>

                    <div class="d-flex justify-content-end" id="bouton-ajouter-panier">
                        <button type="button" class="btn btn-primary">Ajouter au panier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

