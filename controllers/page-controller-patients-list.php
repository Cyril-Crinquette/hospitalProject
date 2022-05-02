<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../helpers/sessionFlash.php');

$style="style-patients-list.css";

// $patientTable = Patient::getAll();
// if (!empty($_GET)) {
//     $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//     $deleteAppointment = Appointment::delete($id);
//     if (Appointment::deleteByPatient($id)) {
//         $patientDelete = Patient::delete($id);
//     }
//     if ($patientDelete instanceof PDOException) {
//         $error = $patientDelete -> getMessage();
//     }
// }

// if ($patientList instanceof PDOException) {
//     $error = $patientList -> getMessage();
// }

// $patientTable = Patient::getAll();

$search = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));
$patientTable = Patient::getAll($search);

// //! if get
// if (isset($_GET['search']) && !empty($_GET['search'])) {
//     //! initialize errors
//     $error = [];

//     //! control search
//     $search = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS));
//     if (!empty($search)) {
//         $searchValid = filter_var($search, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^" . REG_EXP_SEARCH . "$/")));
//         if ($searchValid === false) {
//             $error['search'] = 'Veuillez vérifier le format de votre mot clé';
//         }
//     }
// }

// // //! $patient->search()
// if (isset($_GET['search']) && !empty($_GET['search'])) {
//     $patient = Patient::search($search);
//     if ($patient instanceof PDOException) {
//         $errorSentence = $patient->getMessage();
//     }
// }

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/user/patients-list.php');
include(dirname(__FILE__).'/../views/templates/footer.php');