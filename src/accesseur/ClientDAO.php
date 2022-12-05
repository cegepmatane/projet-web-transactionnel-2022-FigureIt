<?php
require_once "../config.php";
include_once SITEPATH."modeles/Client.php";
include_once SITEPATH."accesseur/ClientSQL.php";

    class AccesseurClient {
        public static $bdd = null;

        public static function connexionBDD(){
            $user = 'site_user';
            $password = '';
            $host = 'localhost';
            $db = 'figureit';
            $dsn = "mysql:dbname=".$db.";host=".$host;

            try {
                ClientDAO::$bdd = new PDO($dsn, $user, $password);
                //print_r(ClientDAO::$bdd);
                ClientDAO::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $exception){
                echo ('Message : ' . $exception->getMessage());
                exit;
            }

        }
    }

    class ClientDAO extends AccesseurClient implements ClientSQL{
        public static function listerClients(){
            ClientDAO::connexionBDD();

            $demandeClients = ClientDAO::$bdd->prepare(ClientDAO::SELECT_ALL_CLIENTS);
            $demandeClients->execute();
            $clientsTab = $demandeClients->fetchAll(PDO::FETCH_ASSOC);

            foreach ($clientsTab as $clientTab) {
                $clients[] = new Client($clientTab);
            }
            return $clients;
        }

        public static function findClientById($id){
            ClientDAO::connexionBDD();

            $demandeClient = ClientDAO::$bdd->prepare(ClientDAO::SELECT_CLIENT_BY_ID);
            $demandeClient->bindParam(':id', $id, PDO::PARAM_INT);
            $demandeClient->execute();

            $client = $demandeClient->fetch(PDO::FETCH_ASSOC);
            return new Client($client);
        }

        public static function findClientByEmail($email){
            ClientDAO::connexionBDD();

            $demandeClient = ClientDAO::$bdd->prepare(ClientDAO::SELECT_CLIENT_BY_EMAIL);
            $demandeClient->bindParam(':email', $email, PDO::PARAM_STR);
            $demandeClient->execute();

            $client = $demandeClient->fetch(PDO::FETCH_ASSOC);
            //var_dump($client);
            if ($client !== false){
                return new Client($client);
            }else{
                return null;
            }
        }
        public static function findClientByName($name){
            ClientDAO::connexionBDD();

            $demandeClient = ClientDAO::$bdd->prepare(ClientDAO::SELECT_CLIENT_BY_NAME);
            $demandeClient->bindParam(':nom', $name, PDO::PARAM_STR);
            $demandeClient->execute();

            $client = $demandeClient->fetch(PDO::FETCH_ASSOC);
            if ($client){
                return new Client($client);
            }else{
                return null;
            }
        }

        public static function ajouterClient($nom, $email, $motDePasse){
            ClientDAO::connexionBDD();

            $demandeAjoutClient = ClientDAO::$bdd->prepare(ClientDAO::INSERT_CLIENT);
            $demandeAjoutClient->bindParam(':nom', $nom, PDO::PARAM_STR);
            $demandeAjoutClient->bindParam(':email', $email, PDO::PARAM_STR);
            $demandeAjoutClient->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
            $demandeAjoutClient->execute();
        }

        public static function formater($text){
            $text = html_entity_decode($text, ENT_COMPAT, 'UTF-8');
            $text = rawurldecode($text);
            return $text;
        }

    }