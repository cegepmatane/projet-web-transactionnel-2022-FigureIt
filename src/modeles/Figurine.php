<?php

class Figurine {
    public static $filtres = array(
        'id' => FILTER_VALIDATE_INT,
        'titre' => FILTER_SANITIZE_ENCODED,
        'vendeur' => FILTER_SANITIZE_ENCODED,
        'prix' => FILTER_VALIDATE_FLOAT,
        'quantite' => FILTER_VALIDATE_INT,
        'description' => FILTER_SANITIZE_ENCODED,
        'image' => FILTER_SANITIZE_ENCODED,
        'lien_stripe' => FILTER_SANITIZE_ENCODED
    );

    protected $id;
    protected $titre;
    protected $vendeur;
    protected $prix;
    protected $quantite;
    protected $description;
    protected $image;
    protected $lien_stripe;

    /**
     * @param $tableau
     *
     * Constructeur du modele Figurine, prend un tableau contenant les données de la figurine
     */
    public function __construct($tableau)
    {
        $tableau = filter_var_array($tableau, Figurine::$filtres);

        $this->id = $tableau['id'];
        $this->titre = $tableau['titre'];
        $this->vendeur = $tableau['vendeur'];
        $this->prix = $tableau['prix'];
        $this->quantite = $tableau['quantite'];
        $this->description = $tableau['description'];
        $this->image = $tableau['image'];
        $this->lien_stripe = $tableau['lien_stripe'];
    }

    /**
     * @param $name : nom de la propriete a set
     * @param $value : valeur de la propriete a set
     * @return void
     */
    public function __set($name, $value)
    {
        switch ($name){
            case 'id' :
                $this->id = $value;
                break;
            case 'titre' :
                $this->titre = $value;
                break;
            case 'vendeur' :
                $this->vendeur = $value;
                break;
            case 'prix' :
                $this->prix = $value;
                break;
            case 'quantite' :
                $this->quantite = $value;
                break;
            case 'description' :
                $this->description = $value;
                break;
            case 'image' :
                $this->image = $value;
                break;
            case 'lien_stripe' :
                $this->lien_stripe = $value;
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

?>