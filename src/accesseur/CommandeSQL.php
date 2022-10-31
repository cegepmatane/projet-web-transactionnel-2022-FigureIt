<?php
    interface CommandeSQL{
        public const SELECT_ALL_COMMANDES = "SELECT commande.id as id, timestamp, date, commande.quantite, figurine.titre AS titre, client.nom AS client
                                                FROM commande
                                                INNER JOIN figurine f ON figurine_id = f.id
                                                INNER JOIN client ON client_id = client.id
                                                LEFT JOIN figurine ON client.id = figurine.vendeur_id";

        public const SELECT_COMMANDE_BY_ID = "SELECT commande.id as id, timestamp, date, commande.quantite, figurine.titre AS titre, client.nom AS client
                                                FROM commande
                                                INNER JOIN figurine f ON figurine_id = f.id
                                                INNER JOIN client ON client_id = client.id
                                                LEFT JOIN figurine ON client.id = figurine.vendeur_id                                                
                                                WHERE commande.id = :id";

        public const SELECT_COMMANDE_BY_TIMESTAMP = "SELECT commande.id as id, timestamp, date, commande.quantite, figurine.titre AS titre, client.nom AS client
                                                FROM commande
                                                INNER JOIN figurine f ON figurine_id = f.id
                                                INNER JOIN client ON client_id = client.id
                                                LEFT JOIN figurine ON client.id = figurine.vendeur_id                                                
                                                WHERE commande.timestamp = :timestamp";

        public const SELECT_COMMANDE_FOR_ONE_CLIENT = "SELECT commande.id as id, timestamp, date, commande.quantite, figurine.titre AS titre, client.nom AS client
                                                FROM commande
                                                INNER JOIN figurine f ON figurine_id = f.id
                                                INNER JOIN client ON client_id = client.id
                                                LEFT JOIN figurine ON client.id = figurine.vendeur_id                                                
                                                WHERE commande.client_id = :clientId";

        public const INSERT_COMMANDE = "INSERT INTO commande(timestamp, date, quantite, figurine_id, client_id) VALUES (:timestamp, :date, :quantite, :figurineId, :clientId)";
    }