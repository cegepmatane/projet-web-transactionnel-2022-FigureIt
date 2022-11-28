<?php
    $titre = "Mission";
    $pageActive = "mission";
    include "header.php";
?>
<head>
    <link href="style.css" rel="stylesheet">
</head>
<div class="container">
    <h1 class="text-left"><?= _('A propos de nous') ?></h1>
    <div class="description text-justify">
        <p><?= _('Nous sommes un groupe de 3 développeurs cherchant à partager notre passion pour les figurines d\'occasion. 
            Il y a donc Lucas Heidet, Axel Klein et Benjamin Rodot à la tête de ce projet.') ?>
            
    </div>

    <h1 class="text-left"><?= _('Nos objectifs') ?></h1>
    <div class="description text-justify">
        <p><?= _('Pour notre part, nous cherchons à élargir le public d\'achat des figurines d\'occasion. Car dû aux nombreux collectionneurs,
            il est difficile de trouver des figurines d\'occasion sans emballages, en bon état et à un prix raisonnable. 
            Nous voulons donc créer un site internet qui permettra de trouver les figurines que vous recherchez, avec ou sans emballages,
            dépendant de votre envie et de votre budget.') ?>
            
    </div>

    <h1 class="text-left"><?= _('Notre systeme économique') ?></h1>
    <div class="description text-justify">
        <p><?= _('Notre système économique est basé sur 2 points. Le premier sera la publicité, qui permettra de faire connaitre le site,
            et assurer une certaine visibilité. Le second point sera la commission, donc nous ajouterons un pourcentage sur chaque vente
            pour nous permettre de payer les frais de fonctionnement du site.') ?>
            
    </div>
</div>
<?php include "footer.php"?>

