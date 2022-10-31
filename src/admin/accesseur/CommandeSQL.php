<?php
    interface CommandeSQL{
        public const SELECT_ALL_COMMANDES = "SELECT commande.id as id, timestamp, date, commande.quantite, f.prix as prix, f.titre AS figurine, client.nom AS client
                                                FROM commande
                                                INNER JOIN client ON client_id = client.id
                                                INNER JOIN figurine f on commande.figurine_id = f.id
                                                LEFT JOIN figurine f2 on client.id = f2.vendeur_id";

        public const SELECT_COMMANDE_BY_ID = "SELECT commande.id as id, timestamp, date, commande.quantite, f.prix as prix, f.titre AS figurine, client.nom AS client
                                                FROM commande
                                                INNER JOIN client ON client_id = client.id
                                                INNER JOIN figurine f on commande.figurine_id = f.id
                                                LEFT JOIN figurine f2 on client.id = f2.vendeur_id                                                
                                                WHERE commande.id = :id";

        public const SELECT_COMMANDE_BY_TIMESTAMP = "SELECT commande.id as id, timestamp, date, commande.quantite, f.prix as prix, f.titre AS figurine, client.nom AS client
                                                        FROM commande
                                                        INNER JOIN client ON client_id = client.id
                                                        INNER JOIN figurine f on commande.figurine_id = f.id
                                                        LEFT JOIN figurine f2 on client.id = f2.vendeur_id                                                
                                                        WHERE commande.timestamp = :timestamp";

        public const SELECT_COMMANDE_FOR_ONE_CLIENT = "SELECT commande.id as id, timestamp, date, commande.quantite, f.prix as prix, f.titre AS figurine, client.nom AS client
                                                        FROM commande
                                                        INNER JOIN client ON client_id = client.id
                                                        INNER JOIN figurine f on commande.figurine_id = f.id
                                                        LEFT JOIN figurine f2 on client.id = f2.vendeur_id                                                
                                                        WHERE commande.client_id = :clientId";

        public const INSERT_COMMANDE = "INSERT INTO commande(timestamp, date, quantite, figurine_id, client_id) VALUES (:timestamp, :date, :quantite, :figurineId, :clientId)";
    }