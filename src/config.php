<?php

if($_SERVER['HTTP_HOST'] == "localhost:8080"){// For local
 define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/projet-web-transactionnel-2022-FigureIt/src/');
 define('SITEPATH', $_SERVER['DOCUMENT_ROOT'] . '/projet-web-transactionnel-2022-FigureIt/src/');
}
else{ // For Web
 define('SITE_URL', "https://" . $_SERVER['HTTP_HOST'].'/');
 define('SITEPATH', $_SERVER['DOCUMENT_ROOT'].'/');
}

const TEMPS_MAINTIENT = 1800;
const UN_JOUR = 24*3600;
?>
