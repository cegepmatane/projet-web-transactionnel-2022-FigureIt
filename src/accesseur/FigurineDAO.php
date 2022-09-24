<?php
    include_once "../modeles/Figurine.php";
    include "./FigurineSQL.php";

    class Accesseur {
        public static $bdd = null;

        public static function connexionBDD(){
            $user = 'site_user';
            $password = '';
            $host = 'localhost';
            $db = 'figureit';
            $dsn = "mysql:dbname=".$db.";host=".$host;

            FigurineDAO::$bdd = new PDO($dsn, $user, $password);
            FigurineDAO::$bdd->setAttributes(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
            return $figurine;
        }

        public static function afficher3PlusRecentesFigurines(){
            $demandeFigurines = FigurineDAO::$bdd->prepare(FigurineDAO::SELECT_3_DERNIERES_FIGURINES);
            $demandeFigurines->exectue();
            $figurinesTab = $demandeFigurines->fetchAll(PDO::FETCH_ASSOC);

            for ($i = 0, $size = count($figurinesTab); $i<$size; $i++){
                $figurines[] = new Figurine($figurinesTab[$i]);
            }
            return $figurines;
        }
    }