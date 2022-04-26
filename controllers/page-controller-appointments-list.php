<?php

require_once(dirname(__FILE__).'/../utils/hospital-connection.php');
require_once(dirname(__FILE__).'/../utils/regex.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');


$appointmentList = Appointment::getAll();
if (!empty($_GET)) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $appointmentDelete = Appointment::delete($id);
    if ($appointmentDelete instanceof PDOException) {
        $error = $appointmentDelete -> getMessage();
    }
}

$appointmentList = Appointment::getAll();

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/appointments-list.php');
include(dirname(__FILE__).'/../views/templates/footer.php');


