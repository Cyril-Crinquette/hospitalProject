<?php

// On stocke dans le fichier const.php les constantes permettant de stocker les valeurs dont nous avons besoin
// lors de la création d'un nouvel objet issu de la classe PDO
define('DSN', 'mysql:dbname=hospitale2n;host=127.0.0.1;charset=utf8');
define('USER', 'patients_user');
define('PASSWORD', 'ZBi5J7kK!iGv1i@G');
define('ERROR_ARRAY', [
    '0' => "Erreur générique",
    '1' => "Vous n'êtes pas connecté à la base de données",
    '2' => "Vous êtes en erreur numéro 2",
]);
