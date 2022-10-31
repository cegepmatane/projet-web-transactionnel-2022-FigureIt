<?php
require_once "../config.php";
include_once SITEPATH."modeles/Commande.php";
include_once SITEPATH."admin/accesseur/CommandeSQL.php";

class Accesseur {
    public static $bdd = null;

    public static function connexionBDD(){
        $user = 'site_user';
        $password = '';
        $host = 'localhost';
        $db = 'figureit';
        $dsn = "mysql:dbname=".$db.";host=".$host;


        try {
            CommandeDAO::$bdd = new PDO($dsn, $user, $password);
            //print_r(FigurineDAO::$bdd);
            CommandeDAO::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            echo ('NTM sale noob : ' . $exception->getMessage());
            exit;
        }

    }
}

class CommandeDAO extends Accesseur implements CommandeSQL{
    public static function listerCommandes(){
        CommandeDAO::connexionBDD();

        $demandeCommandes = CommandeDAO::$bdd->prepare(CommandeDAO::SELECT_ALL_COMMANDES);
        $demandeCommandes->execute();
        $commandesTab = $demandeCommandes->fetchAll(PDO::FETCH_ASSOC);

        foreach ($commandesTab as $commandeTab){
            $commandes[] = new Commande($commandeTab);
        }
        
        return $commandes;
    }

    public static function findCommandesForClientId($id){
        CommandeDAO::connexionBDD();

        $demandeCommandes = CommandeDAO::$bdd->prepare(CommandeDAO::SELECT_COMMANDE_FOR_ONE_CLIENT);
        $demandeCommandes->bindParam(':clientId', $id, PDO::PARAM_INT);
        $demandeCommandes->execute();

        $commandesTab = $demandeCommandes->fetchAll(PDO::FETCH_ASSOC);
        foreach ($commandesTab as $commandeTab) {
            $commandes[] = new Commande($commandeTab);
        }
        
        return $commandes;
    }

    public static function findCommandesForTimestamp($timestamp){
        CommandeDAO::connexionBDD();

        $demandeCommandes = CommandeDAO::$bdd->prepare(CommandeDAO::SELECT_COMMANDE_BY_TIMESTAMP);
        $demandeCommandes->bindParam(':timestamp', $timestamp, PDO::PARAM_INT);
        $demandeCommandes->execute();

        $commandesTab = $demandeCommandes->fetchAll(PDO::FETCH_ASSOC);
        foreach ($commandesTab as $commandeTab) {
            $commandes[] = new Commande($commandeTab);
        }
        
        return $commandes;
    }

    public static function ajouterCommande($timestamp, $date, $quantite, $figurineId, $clientId){
        CommandeDAO::connexionBDD();

        $demandeAjoutCommande = CommandeDAO::$bdd->prepare(CommandeDAO::INSERT_COMMANDE);
        $demandeAjoutCommande->bindParam(':timestamp', $timestamp, PDO::PARAM_INT);
        $demandeAjoutCommande->bindParam(':date', $date, PDO::PARAM_STR);
        $demandeAjoutCommande->bindParam(':quantite', $quantite, PDO::PARAM_INT);
        $demandeAjoutCommande->bindParam(':figurineId', $figurineId, PDO::PARAM_INT);
        $demandeAjoutCommande->bindParam(':clientId', $clientId, PDO::PARAM_INT);

        $demandeAjoutCommande->execute();
        
    }

    function formater($text){
        $text = html_entity_decode($text, ENT_COMPAT, 'UTF-8');
        $text = rawurldecode($text);
        return $text;
    }
}