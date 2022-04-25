<?php

require_once(dirname(__FILE__).'/../models/Patient.php');


$patientTable = Patient::getAll();


include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/patients-list.php');
include(dirname(__FILE__).'/../views/templates/footer.php');