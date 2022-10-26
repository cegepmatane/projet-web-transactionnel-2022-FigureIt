<?php
    $titre = "Inscription";
    $page = "inscription";
    include "header.php";
?>
<div class="container justify-content-center">
    <div class="row mb-lg-5">
        <h2 class="d-inline-block text-center mx-lg-auto mt-lg-5 mt-md-3">Connexion</h2>
    </div>
    <form action="post">
        <div class="row mx-lg-4 mb-3 px-5">
            <input type="text" class="form-control" placeholder="Identifiant" id="inscription-identifiant" required>
        </div>
        <div class="row mx-lg-4 mb-3 px-5">
            <input type="password" class="form-control" placeholder="Mot de passe" id="inscription-password" required>
        </div>
        <div class="row mt-lg-5 mx-lg-4 px-5 justify-content-center">
            <button class="btn btn-primary col-6" type="submit">Connexion</button>
        </div>
    </form>
</div>

<?php
    include "footer.php";
?>
