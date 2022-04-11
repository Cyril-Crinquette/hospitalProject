<!---------------------------------------------- Définition de constantes  --------------------------------------------->

<?php

// -------------------------------------------------Regex----------------------------------------------------
define('REG_EXP_PASSWORD','^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$');
define('REG_EXP_LOGIN', '^[a-zA-ZÀ-ÿ0-9. -\']*$' );


// On stocke dans le fichier const.php les constantes permettant de stocker les valeurs dont nous avons besoin
// lors de la création d'un nouvel objet issu de la classe PDO
define('DSN', 'mysql:dbname=patients;host=127.0.0.1;charset=utf8');
define('USER', 'patients_user');
define('PASSWORD', 'tB_P_3r/uKyzKh-');