<?php

class Client
{
    public static $filtres = array(
        'id' => FILTER_VALIDATE_INT,
        'nom' => FILTER_SANITIZE_ENCODED,
        'email' => FILTER_VALIDATE_EMAIL,
        'motDePasse' => FILTER_SANITIZE_STRING,
    );

    protected $id;
    protected $nom;
    protected $email;

    /**
     * @param $tableau
     *
     * Constructeur du modele Figurine, prend un tableau contenant les données du client
     */
    public function __construct($tab){
        $tab = filter_var_array($tab, Client::$filtres);

        $this->id = $tab['id'];
        $this->nom = $tab['nom'];
        $this->email = $tab['email'];
        $this->motDePasse = $tab['motDePasse'];
    }

    /**
     * @param $name : nom de la propriete a set
     * @param $value : valeur de la propriete a set
     * @return void
     */
    public function __set($name, $value){
        switch ($name){
            case 'id' :
                $this->id = $value;
                break;
            case 'nom' :
                $this->nom = $value;
                break;
            case 'email' :
                $this->email = $value;
                break;
            case 'motDePasse' :
                $this->motDePasse = $value;
                break;
        }
    }

    /**
     * @param $name : nom de la propriete a get
     * @return mixed : return la valeur de la propriete
     */
    public function __get($name){
        $self = get_object_vars($this);

        return $self[$name];
    }
}