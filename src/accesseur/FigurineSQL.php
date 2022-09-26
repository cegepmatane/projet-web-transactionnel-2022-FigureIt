<?php
interface FigurineSQL {
    public const SELECT_TOUTES_FIGURINES = "SELECT figurine.id as id, titre, client.nom AS vendeur, prix, description 
                                            FROM figurine
                                            INNER JOIN client ON figurine.vendeur_id = client.id";
    public const SELECT_FIGURINE_BY_ID = "SELECT figurine.id as id, titre, client.nom AS vendeur, prix, description
                                            FROM figurine 
                                            INNER JOIN client ON figurine.vendeur_id = client.id
                                            WHERE figurine.id = :id
                                            ";
    public const SELECT_3_DERNIERES_FIGURINES = "SELECT figurine.id as id, titre, client.nom AS vendeur, prix, description
                                                    FROM figurine 
                                                    INNER JOIN client ON figurine.vendeur_id = client.id 
                                                    ORDER BY figurine.id DESC LIMIT 3";
}

?>
