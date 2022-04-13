<?php

require_once(dirname(__FILE__).'/config.php');

$error = null;

class Database
{

    public static function dbConnect(): object
    { 
        try {
            $pdo = new PDO(DSN, USER, PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        } catch (PDOException $exception) {
            header('location: /controllers/page-controller-error.php?error=1');
            exit;
        }
        return $pdo;
    }
}
