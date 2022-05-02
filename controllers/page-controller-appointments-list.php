<?php

require_once(dirname(__FILE__).'/../utils/hospital-connection.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../helpers/sessionFlash.php');

$style="style-appointments-list.css";

$appointmentList = Appointment::getAll();

if (!empty($_GET)) {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $appointmentDelete = Appointment::delete($id);
    if ($appointmentDelete) {
        SessionFlash::set('Le rendez-vous a été supprimé.');
    } 
}

$appointmentList = Appointment::getAll();

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/appointments-list.php');
include(dirname(__FILE__).'/../views/templates/footer.php');


