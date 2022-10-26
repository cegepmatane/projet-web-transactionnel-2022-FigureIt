<?php
    session_start();
    ?>

<form action="SQLSessionHandler.php" method="post">

    <input type="text" class="form-control" placeholder="Email"  name="email" id="email" required>

    <input type="text" class="form-control" placeholder="Mot de passe" name="motDePasse" id="motDePasse" required>

    <button type="submit">Connexion</button>

</form>

