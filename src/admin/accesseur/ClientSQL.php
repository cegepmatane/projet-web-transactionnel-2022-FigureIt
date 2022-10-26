<?php
    interface ClientSQL {
        public const SELECT_ALL_CLIENTS = "SELECT * FROM client";

        public const SELECT_CLIENT_BY_ID = "SELECT * FROM client WHERE id = :id";

        public const SELECT_CLIENT_BY_EMAIL = "SELECT * FROM client WHERE email = :email";

        public const INSERT_CLIENT = "INSERT INTO client (nom, email, motDePasse) VALUES (:nom, :email, :motDePasse)";

    }