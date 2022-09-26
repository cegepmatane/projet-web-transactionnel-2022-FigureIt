<?php
    include_once "modeles/Figurine.php";
    include "accesseur/FigurineSQL.php";


    class Accesseur {
        public static $bdd = null;

        public static function connexionBDD(){
            $user = 'lheidet';
            $password = '0803';
            $host = 'localhost';
            $db = 'figureit';
            $dsn = "mysql:dbname=".$db.";host=".$host;


            try {
                FigurineDAO::$bdd = new PDO($dsn, $user, $password);
                //print_r(FigurineDAO::$bdd);
                FigurineDAO::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $exception){
                echo ('NTM sale noob : ' . $exception->getMessage());
                exit;
            }

        }
    }

    class FigurineDAO extends Accesseur implements FigurineSQL{
        public static function listerFigurines(){
            FigurineDAO::connexionBDD();

            $demandeFigurines = FigurineDAO::$bdd->prepare(FigurineDAO::SELECT_TOUTES_FIGURINES);
            $demandeFigurines->execute();
            $figurinesTab = $demandeFigurines->fetchAll(PDO::FETCH_ASSOC);

            foreach ($figurinesTab as $figurineTab) {
                $figurines[] = new Figurine($figurineTab);
            }
            return $figurines;
        }

        public static function findFigurineById($id){
            FigurineDAO::connexionBDD();

            $demandeFigurine = FigurineDAO::$bdd->prepare(FigurineDAO::SELECT_FIGURINE_BY_ID);
            $demandeFigurine->bindParam(':id', $id, PDO::PARAM_INT);
            $demandeFigurine->execute();

            $figurine = $demandeFigurine->fetch(PDO::FETCH_ASSOC);
            return new Figurine($figurine);
        }

        public static function afficher3PlusRecentesFigurines(){
            FigurineDAO::connexionBDD();

            $demandeFigurines = FigurineDAO::$bdd->prepare(FigurineDAO::SELECT_3_DERNIERES_FIGURINES);
            $demandeFigurines->execute();
            $figurinesTab = $demandeFigurines->fetchAll(PDO::FETCH_ASSOC);

            for ($i = 0, $size = count($figurinesTab); $i<$size; $i++){
                $figurines[] = new Figurine($figurinesTab[$i]);
            }
            return $figurines;
        }

        public static function ajouterFigurine($titre, $prix, $quantite, $description, $image){
            FigurineDAO::connexionBDD();

            $demandeAjoutFigurine = FigurineDAO::$bdd->prepare(FigurineDAO::INSERT_FIGURINE);
            $demandeAjoutFigurine->bindParam(':titre', $titre, PDO::PARAM_STR);
            $demandeAjoutFigurine->bindParam(':prix', $prix, PDO::PARAM_STR);
            $demandeAjoutFigurine->bindParam(':quantite', $quantite, PDO::PARAM_INT);
            $demandeAjoutFigurine->bindParam(':description', $description, PDO::PARAM_STR);
            $demandeAjoutFigurine->bindParam(':image', $image, PDO::PARAM_STR);
            $demandeAjoutFigurine->execute();
        }

        public static function modifierFigurine($id, $titre, $prix, $quantite, $description, $image){
            FigurineDAO::connexionBDD();

            $demandeModificationFigurine = FigurineDAO::$bdd->prepare(FigurineDAO::UPDATE_FIGURINE);
            $demandeModificationFigurine->bindParam(':id', $id, PDO::PARAM_INT);
            $demandeModificationFigurine->bindParam(':titre', $titre, PDO::PARAM_STR);
            $demandeModificationFigurine->bindParam(':prix', $prix, PDO::PARAM_STR);
            $demandeModificationFigurine->bindParam(':quantite', $quantite, PDO::PARAM_INT);
            $demandeModificationFigurine->bindParam(':description', $description, PDO::PARAM_STR);
            $demandeModificationFigurine->bindParam(':image', $image, PDO::PARAM_STR);
            $demandeModificationFigurine->execute();
        }

    }
    function formater($text){
        $text = html_entity_decode($text, ENT_COMPAT, 'UTF-8');
        $text = rawurldecode($text);
        return $text;
    }