<?php

require_once(dirname(__FILE__).'/../utils/hospital-connection.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../helpers/sessionFlash.php');


if (!empty($_GET)) {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $appointmentDelete = Appointment::delete($id);

    if ($appointmentDelete) {
        SessionFlash::set('Le rendez-vous a été supprimé.');
    }
}

header('location: '.$_SERVER['HTTP_REFERER']);
die;



