<?php

require_once(dirname(__FILE__).'/../models/Patient.php');

    $id= intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
    $patient = Patient::getOne($id);
    if ($patient instanceof PDOException) {
        $error=$patient->getMessage();
    }
    
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/patient-profile.php');
include(dirname(__FILE__).'/../views/templates/footer.php');