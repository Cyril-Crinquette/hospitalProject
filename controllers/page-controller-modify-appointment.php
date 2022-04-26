<?php

require_once(dirname(__FILE__).'/../utils/hospital-connection.php');
require_once(dirname(__FILE__).'/../utils/regex.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');

$dayD = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //DATE DE RDV
    $dateAppointment = filter_input(INPUT_POST,'dateAppointment',FILTER_SANITIZE_NUMBER_INT);
    if (empty($dateAppointment)) {
        $errorMessage['dateAppointment'] = 'La selection d\'une date est obligatoire';
    } else {
        $dateAppointmentCheck = filter_var($dateAppointment, FILTER_VALIDATE_REGEXP,
        array("options"=>array('regexp'=>'/'.REG_EXP_DATE['numberDate'].'/')));
        if ($dateAppointmentCheck === false) {
            $errorMessage['dateAppointment'] = 'Veuillez rentrer une date valide';
        } 
    }

    //Horaire RDV
    $timeAppointment = filter_input(INPUT_POST, 'timeAppointment', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($dateAppointment)) {
        $errorMessage['dateAppointment'] = 'La selection d\'un horaire est obligatoire';
    } else {
        $timeAppointmentCheck = filter_var($timeAppointment, FILTER_VALIDATE_REGEXP,
        array("options"=>array('regexp'=>'/'.REG_EXP_TIME['time'].'/')));
        if ($timeAppointmentCheck === false) {
            $errorMessage['dateAppointment'] = 'Veuillez rentrer un horaire valide';
        }
    }
    // on stock la date et l'heure dans une variable afin de l'exploiter dans la methode
    $dateHour = $dateAppointment.' '.$timeAppointment;

    //recuperation de l'id patient
    $idPatients = filter_input(INPUT_POST, 'patientAppointment',FILTER_SANITIZE_NUMBER_INT);
} 

if (!empty($_GET)) {
    $id = trim(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
    $one = new Appointment();
    $oneAppointment = $one -> getOne($id);
}

include(dirname(__FILE__).'/../views/templates/header.php' );

if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($errorMessage)) {
    $id = trim(filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT));
    $modify = new Appointment($dateHour,$idPatients);
    $modifyPatient = $modify -> modify($id);
    if ($modifyPatient instanceof PDOException) {
        $error = $modifyPatient -> getMessage();
    }
    header("location:/info-de-rendez-vous?id=$id");
} else {
    include(dirname(__FILE__).'/../views/user/modify-appointment.php' );
}

include(dirname(__FILE__).'/../views/templates/footer.php' ); 


