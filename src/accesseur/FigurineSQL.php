<?php
interface FigurineSQL {
    public const SELECT_TOUTES_FIGURINES = "SELECT * FROM figurine";
    public const SELECT_FIGURINE_BY_ID = "SELECT * FROM figurine WHERE id = :id";
    public const SELECT_3_DERNIERES_FIGURINES = "SELECT * FROM figurine ORDER BY id DESC LIMIT 3";
}

?>
