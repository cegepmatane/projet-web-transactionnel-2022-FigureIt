<?php
interface FigurineSQL {
    public const SELECT_TOUTES_FIGURINES = "SELECT * FROM figurine";
    public const SELECT_FIGURINE_BY_ID = "SELECT * FROM figurine WHERE id = :id";
}

?>
