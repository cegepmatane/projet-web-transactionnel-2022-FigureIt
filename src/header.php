<!doctype html>
<html class="h-100">
<head>
    <title><?php echo $titre; ?></title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<div class="container">
    <h1>Figure It</h1>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#liensNavbar" aria-controls="liensNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="liensNavbar">
                    <ul class="nav navbar-nav nav-pills nav-justified mb-1 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($pageActive == "accueil" ? "active" : "")?>" href="index.php">Accueil</a>
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

