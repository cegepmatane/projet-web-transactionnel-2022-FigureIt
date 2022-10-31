<?php

class Commande
{
    public static $filtres = array(
        'id' => FILTER_VALIDATE_INT,
        'timestamp' => FILTER_VALIDATE_INT,
        'date' => FILTER_SANITIZE_ENCODED,
        'quantite' => FILTER_VALIDATE_INT,
        'prix' => FILTER_VALIDATE_FLOAT,
        'figurine' => FILTER_SANITIZE_ENCODED,
        'client' => FILTER_SANITIZE_ENCODED
    );

    protected $id;
    protected $timestamp;
    protected $date;
    protected $quantite;
    protected $prix;
    protected $figurine;
    protected $client;

    public function __construct($tableau)
    {
        $tableau = filter_var_array($tableau, Commande::$filtres);

        $this->id = $tableau['id'];
        $this->timestamp = $tableau['timestamp'];
        $this->date = $tableau['date'];
        $this->quantite = $tableau['quantite'];
        $this->prix = $tableau['prix'];
        $this->figurine = $tableau['figurine'];
        $this->client = $tableau['client'];
    }

    public function __set($name, $value)
    {
        switch ($name){
            case 'id' :
                $this->id = $value;
                break;
            case 'timestamp' :
                $this->timestamp = $value;
                break;
            case 'date' :
                $this->date = $value;
                break;
            case 'quantite' :
                $this->quantite = $value;
                break;
            case 'prix' :
                $this->prix = $value;
                break;
            case 'figurine' :
                $this->figurine = $value;
                break;
            case 'client' :
                $this->client = $value;
                break;
        }
    }

    public function __get($name)
    {
       $self  = get_object_vars($this);

       return $self[$name];
    }
}