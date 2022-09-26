<?php
interface FigurineSQL {
    public const SELECT_TOUTES_FIGURINES = "SELECT figurine.id as id, titre, client.nom AS vendeur, prix, quantite, description, image 
                                            FROM figurine
                                            INNER JOIN client ON figurine.vendeur_id = client.id";
    public const SELECT_FIGURINE_BY_ID = "SELECT figurine.id as id, titre, client.nom AS vendeur, prix, quantite, description, image
                                            FROM figurine 
                                            INNER JOIN client ON figurine.vendeur_id = client.id
                                            WHERE figurine.id = :id
                                            ";
    public const SELECT_3_DERNIERES_FIGURINES = "SELECT figurine.id as id, titre, client.nom AS vendeur, prix, quantite, description, image
                                                    FROM figurine 
                                                    INNER JOIN client ON figurine.vendeur_id = client.id 
                                                    ORDER BY figurine.id DESC LIMIT 3";

    public const INSERT_FIGURINE = "INSERT INTO figurine (titre, prix, description, image) VALUES (:titre, :prix, :description, :image)";
    
    public const UPDATE_FIGURINE = "UPDATE figurine SET titre = :titre, prix = :prix, quantite = :quantite, description = :description, image = :image WHERE id = :id";
}

?>
