<?php

    $locale = "fr";

    //putenv("LANG=$locale");
    //putenv("LANGUAGE=$locale");
    putenv("LC_ALL=$locale");

    //setlocale(LC_ALL, $locale);
    $domain = 'messages';
    textdomain($domain);
    //bindtextdomain($domain, './locales');
    bindtextdomain($domain, 'C:\xampp\htdocs\recherche\locales');
    bind_textdomain_codeset($domain, 'UTF-8');

    echo _("Good Morning");
?>