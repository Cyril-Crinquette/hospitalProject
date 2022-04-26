<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');



$patientTable = Patient::getAll();
if (!empty($_GET)) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $deleteAppointment = Appointment::delete($id);
    if (Appointment::deleteByPatient($id)) {
        $patientDelete = Patient::delete($id);
    }
    if ($patientDelete instanceof PDOException) {
        $error = $patientDelete -> getMessage();
    }
}
if ($patientList instanceof PDOException) {
    $error = $patientList -> getMessage();
}

$patientTable = Patient::getAll();

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/patients-list.php');
include(dirname(__FILE__).'/../views/templates/footer.php');