<?php

require_once(dirname(__FILE__).'/../utils/hospital-connection.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../helpers/sessionFlash.php');

$style="style-appointment.css";

if (!empty($_GET)) {
    $id = trim(filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS));
    $one = new Appointment();
    $oneAppointment = $one -> getOne($id);
    if ($oneAppointment instanceof PDOException) {
        $error = $oneAppointment -> getMessage();
    }
}

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/appointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');