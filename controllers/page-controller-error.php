<?php

require_once(dirname(__FILE__).'/../utils/config.php');

$msgError = "Vous n'êtes pas connecté à la base de données";
$error = intval(filter_input(INPUT_GET, 'error', FILTER_SANITIZE_NUMBER_INT));
// switch ($error) {
//     case 1:
//         $msgError = "Vous n'êtes pas connecté à la base de données";
//         break;
    
//     default:
//         # code...
//         break;
// }

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/error.php');
include(dirname(__FILE__).'/../views/templates/footer.php');