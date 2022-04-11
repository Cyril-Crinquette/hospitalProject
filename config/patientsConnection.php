<?php

$error = null;

try{
    $patients = new PDO(DSN, USER, PASSWORD,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
}catch(PDOException $exception){
    $error = $exception->getMessage();
}