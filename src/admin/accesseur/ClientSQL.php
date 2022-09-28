<?php
    interface ClientSQL {
        public const SELECT_ALL_CLIENTS = "SELECT * FROM client";

        public const SELECT_CLIENT_BY_ID = "SELECT * FROM client WHERE id = :id";

    }