<?php
 /*echo $_SERVER['HTTP_HOST'];
 echo "\n";
 echo $_SERVER['DOCUMENT_ROOT'];
 echo PHP_EOL;
 echo $_SERVER['PHP_SELF'];
 echo "\n";
 echo __FILE__;
 echo "\n";
 echo dirname(__FILE__, 1);*/
if($_SERVER['HTTP_HOST'] == "localhost"){// For local
 define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/projet-web-transactionnel/projet-web-transactionnel/src');
 define('SITEPATH', $_SERVER['DOCUMENT_ROOT'] . '/projet-web-transactionnel/projet-web-transactionnel/src');
}
else{ // For Web
 define('SITE_URL', "http://" . $_SERVER['HTTP_HOST']);
 define('SITEPATH', $_SERVER['DOCUMENT_ROOT']);
}
?>
