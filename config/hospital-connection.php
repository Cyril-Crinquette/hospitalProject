<?php

// On stocke dans le fichier const.php les constantes permettant de stocker les valeurs dont nous avons besoin
// lors de la création d'un nouvel objet issu de la classe PDO
define('DSN', 'mysql:dbname=hospitale2n;host=127.0.0.1;charset=utf8');
define('USER', 'patients_user');
define('PASSWORD', 'ZBi5J7kK!iGv1i@G');

$error = null;

function dbConnect(){
    try{
        $pdo = new PDO(DSN, USER, PASSWORD,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }catch(PDOException $exception){
        $error = $exception->getMessage();
    }
    return $pdo;
}
