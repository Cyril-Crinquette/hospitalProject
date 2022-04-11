<!------------------------- Controller de l'accueil, appel des vues de l'accueil-------------------------- -->


<?php

// Appel de la constante "category"

    require_once(dirname(__FILE__).'/../config/constCategory.php');

// Appel des vues de l'accueil

    include(dirname(__FILE__).'/../views/templates/header.php');
    // La vue du header de la page d'accueil correspond au header général
    include(dirname(__FILE__).'/../views/user/home.php');
    include(dirname(__FILE__).'/../views/templates/footer.php');
    // La vue du footer de la page d'accueil correspond au footer général
