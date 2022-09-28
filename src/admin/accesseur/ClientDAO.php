<?php
include_once "../modeles/Client.php";
include_once "accesseur/ClientSQL.php";


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
    }