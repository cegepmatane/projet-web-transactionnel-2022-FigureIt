<div class="container">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#liensNavbar" aria-controls="liensNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="liensNavbar">
                    <ul class="nav navbar-nav nav-pills nav-justified mb-1 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($pageActive == "accueil" ? "active" : "")?>" href="accueil.php">Accueil</a>
                        </li>
                        <li>
                            <a class="nav-link <?php echo ($pageActive == "listeFigurine" ? "active" : "")?>" href="listeFigurine.php">Figurines</a>
                        </li>
                        <li>
                            <a class="nav-link <?php echo ($pageActive == "mission" ? "active" : "")?>" href="">Mission</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<hr class="navDivider">
</div>
<footer></footer>
