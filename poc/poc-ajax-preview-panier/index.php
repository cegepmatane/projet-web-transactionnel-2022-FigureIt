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
        .panier{
            width: 30px;
            height: 30px;
            background-color: red;
        }

        .preview{
            border: 1px solid white;
            opacity : 0;
            height: 0px;
            padding: .4em;
            transition: 1s linear 1s;
            transition-property: border, opacity, height;
        }

        #panier:hover + .preview{
            opacity: 1;
            border: 1px solid black;
            height: auto;
        }
    </style>
</head>
<body>
    <div>
        <div class="panier" id="panier" onmouseover="previewPanier()"></div>
        <div class="preview" id="panier-preview"></div>
    </div>
</body>
</html>
