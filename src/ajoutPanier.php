<?php
    session_start();
    error_log(print_r($_POST, true));
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idFigurine'])){
        $idFigurine = $_POST['idFigurine'];

        if(!empty($_SESSION['panier'])){
            if(isset($_SESSION['panier'][$idFigurine])){
                $_SESSION['panier'][$idFigurine]['quantite']++;
            }else{
                $_SESSION['panier'][$idFigurine] = array('id' => $idFigurine,'quantite' => '1');
            }
        }else{
            $_SESSION['panier'] = array();
            $_SESSION['panier'][$idFigurine] = array('id' => $idFigurine,'quantite' => '1');
        }
        header("location: ".$_POST['referer']);
    }

