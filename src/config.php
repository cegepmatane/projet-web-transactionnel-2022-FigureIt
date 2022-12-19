<?php

if($_SERVER['HTTP_HOST'] == "localhost"){// For local
 define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/projet-web-transactionnel/projet-web-transactionnel/src/');
 define('SITEPATH', $_SERVER['DOCUMENT_ROOT'] . '/projet-web-transactionnel/projet-web-transactionnel/src/');
 define('PATHLOCALE', $_SERVER['DOCUMENT_ROOT'].'/projet-web-transactionnel/projet-web-transactionnel/src/locales');

}
else{ // For Web
 define('SITE_URL', "https://" . $_SERVER['HTTP_HOST'].'/');
 define('SITEPATH', $_SERVER['DOCUMENT_ROOT'].'/');
 define('PATHLOCALE', $_SERVER['DOCUMENT_ROOT'].'/locales');

}


const TEMPS_MAINTIENT = 1800;
const UN_JOUR = 24*3600;
?>
