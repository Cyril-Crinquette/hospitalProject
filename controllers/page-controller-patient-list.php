<?php

require_once(dirname(__FILE__).'/../utils/hospital-connection.php');
require_once(dirname(__FILE__).'/../models/Patient.php');


$patient = new Patient($lastname, $firstname, $birthdate, $phone, $mail);
$patientTable = $patient->read();


include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/patient-list.php');
include(dirname(__FILE__).'/../views/templates/footer.php');