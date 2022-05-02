<?php

require_once(dirname(__FILE__).'/../utils/hospital-connection.php');
require_once(dirname(__FILE__).'/../utils/regex.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');


$style="style-add-appointment.css";


$errorDate=[];
$dayD = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //DATE DE RDV
    $dateAppointment = filter_input(INPUT_POST,'dateAppointment',FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($dateAppointment)) {
        $errorDate['dateAppointment'] = 'La sélection d\'une date est obligatoire';
    } else {
        $dateAppointmentCheck = filter_var($dateAppointment, FILTER_VALIDATE_REGEXP,
        array("options"=>array('regexp'=>'/'.REG_EXP_DATE['numberDate'].'/')));
        if ($dateAppointmentCheck === false) {
            $errorDate['dateAppointment'] = 'Veuillez rentrer une date valide';
        } 
    }

    //Horaire RDV
    $timeAppointment = filter_input(INPUT_POST, 'timeAppointment', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($timeAppointment)) {
        $errorDate['timeAppointment'] = 'La selection d\'un horaire est obligatoire';
    } else {
        $timeAppointmentCheck = filter_var($timeAppointment, FILTER_VALIDATE_REGEXP,
        array("options"=>array('regexp'=>'/'.REG_EXP_TIME['time'].'/')));
        if ($timeAppointmentCheck === false) {
            $errorDate['timeAppointment'] = 'Veuillez rentrer un horaire valide';
        }
    }

    $dateHour = $dateAppointment.'  '.$timeAppointment;

    $idPatients = filter_input(INPUT_POST, 'patientAppointment',FILTER_SANITIZE_NUMBER_INT);
} 


// pour le foreach
$list = new Patient();
$patientSelect = $list -> getAll();



include(dirname(__FILE__).'/../views/templates/header.php');

// S'il y n'y a pas d'erreur pour créer un nouvel objet et afficher la vue !
if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($errorDate)) {
    $appointment = new Appointment($dateHour, $idPatients);
    $responseAdd = $appointment ->add();
    if ($responseAdd instanceof PDOException) {
        $error = $responseAdd -> getMessage();
    }
    header('location:/liste-de-rendez-vous');
} else {
    include(dirname(__FILE__).'/../views/user/add-appointment.php' );
}

include(dirname(__FILE__).'/../views/templates/footer.php');
