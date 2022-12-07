<?php
require_once 'config.php';
include "accesseur/ClientDAO.php";
$errors = [];
$data = [];
$receivedDATA = json_decode(file_get_contents('php://input'), true);
$identifiant = $email = $password = $passwordConfirm = "";

//var_dump($_POST);
$identifiant = trim($receivedDATA["name"]);
$email = trim($receivedDATA["email"]);
$password = $receivedDATA["password"];
$passwordConfirm = $receivedDATA["confirmpassword"];
error_log(print_r($receivedDATA, true));
if (empty($receivedDATA['name'])) {
    $errors['name'] = 'Name is required.';
    
}else{
    // Check si l'identifiant est deja utilise
    if (!empty(ClientDAO::findClientByName($identifiant))){
        $errors['name'] = "Identifiant d&eacute;j&agrave; utilis&eacute;";
    }
}

if (empty($receivedDATA['email'])) {
    $errors['email'] = 'Email is required.';
    
}else{
    // Check si l'email est deja utilise
    if (!empty(ClientDAO::findClientByEmail($email))){
        $errors['email'] = "Adresse mail d&eacute;j&agrave; utilis&eacute;e";
    }
}

if (empty($receivedDATA['password'])) {
    $errors['password'] = 'Password is required.';
}

if(empty($receivedDATA['confirmpassword'])){
    $errors['confirmedPassword'] = 'Confirmed password is required.';
}
if(!empty($receivedDATA['name'])&&!empty($receivedDATA['email'])&&!empty($receivedDATA['password'])&&!empty($receivedDATA['confirmpassword'])){
    if($receivedDATA['password'] != $receivedDATA['confirmpassword']){
        $errors['confirmedPassword'] = 'Confirmed password is not the same as password.';
    }
    
        //var_dump($err_email);

        // Check si il y a des espaces dans un des mots de passe
        if(preg_match("/\s/", $password) || preg_match("/\s/", $passwordConfirm)){
            $errors['password'] = "Le mot de passe contient des espaces";
        }

        if (empty($errors['name']) && empty($errors['email']) && empty($errors['password']) && empty($errors['confirmedPassword'])){
            ClientDAO::ajouterClient($identifiant, $email, password_hash($passwordConfirm, PASSWORD_DEFAULT));
            
        }
}


if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);

//echo json_encode($_POST['inscription-email']);
/*<?php

$errors = [];
$data = [];

if (empty($_POST['inscription-identifiant'])) {
    $errors['inscription-identifiant'] = 'Name is required.';
}

if (empty($_POST['inscription-email'])) {
    $errors['inscription-email'] = 'Email is required.';
}

if (empty($_POST['inscription-password'])) {
    $errors['inscription-password'] = 'Password is required.';
}

if (empty($_POST['inscription-confirm-password'])) {
    $errors['inscription-confirm-password'] = 'Password confirmation is required.';
}
if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);*/
?>