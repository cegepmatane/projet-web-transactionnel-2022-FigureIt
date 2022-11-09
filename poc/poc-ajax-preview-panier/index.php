<?php
    session_start();
    $_SESSION['panier'] = array(
        '1' =>array(
            'id' => 1,
            'nom' => 'Toto',
            'quantite' => 2
        ),
        '2' =>array(
            'id' => 2,
            'nom' => 'Tata',
            'quantite' => 1
        )
);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>PoC preview contenu panier</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <script>
        function previewPanier(){
            console.log("imin previewPanier");
            var previewDiv = document.getElementById("panier-preview");
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function (){
                if (this.readyState === 4 && this.status === 200){
                    console.log("imin");
                    previewDiv.innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "loadPanier.php", true);
            xmlhttp.send();
        }
    </script>
    <style>
        .preview{
            display: none;
            transition: display 1s ease-in-out;
        }

        #panier:hover + .preview{
            display: block;
        }
    </style>
</head>
<body>
    <div>
        <div class="panier" id="panier" style="width: 30px; height: 30px; background-color: red" onmouseover="previewPanier()"></div>
        <div class="preview" id="panier-preview"></div>
    </div>
    <h5><?= var_dump($_SESSION['panier'])?></h5>
</body>
</html>
