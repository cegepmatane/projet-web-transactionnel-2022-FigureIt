<?php
interface FigurineSQL {
    public const SELECT_TOUTES_FIGURINES = "SELECT figurine.id as id, titre, client.nom AS vendeur, prix, quantite, description, image 
                                            FROM figurine
                                            LEFT JOIN client ON figurine.vendeur_id = client.id";
    public const SELECT_FIGURINE_BY_ID = "SELECT figurine.id as id, titre, client.nom AS vendeur, prix, quantite, description, image
                                            FROM figurine 
                                            LEFT JOIN client ON figurine.vendeur_id = client.id
                                            WHERE figurine.id = :id
                                            ";
    public const SELECT_3_DERNIERES_FIGURINES = "SELECT figurine.id as id, titre, client.nom AS vendeur, prix, quantite, description, image
                                                    FROM figurine 
                                                    INNER JOIN client ON figurine.vendeur_id = client.id 
                                                    ORDER BY figurine.id DESC LIMIT 3";

    public const INSERT_FIGURINE = "INSERT INTO figurine (titre, prix, quantite,  description, image) VALUES (:titre, :prix, :quantite, :description, :image)";
    
    public const UPDATE_FIGURINE = "UPDATE figurine SET titre = :titre, prix = :prix, vendeur_id = :vendeur, quantite = :quantite, description = :description, image = :image WHERE id = :id";

    public const DELETE_FIGURINE = "DELETE FROM figurine WHERE id = :id";
}

?>
