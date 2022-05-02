<!------------------------- Controller de l'inscription, appel des vues de l'inscription-------------------------- -->

<?php

require_once(dirname(__FILE__).'/../utils/hospital-connection.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../utils/regex.php');

$style="style-add-app-pat.css";

// Traitement des données du formulaire

// Initialisation du tableau d'erreurs
$error=[];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //===================== Nom : Nettoyage et validation =======================
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if (!empty($lastname)) {
        $testRegex = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REG_EXP_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$testRegex) {
            $error["lastname"] = "Le nom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($lastname) <= 1 || strlen($lastname) >= 70) {
                $error["lastname"] = "La longueur du nom n'est pas bonne";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["lastname"] = "Vous devez entrer un nom!!";
    }

    //===================== Prénom : Nettoyage et validation =======================
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    // On vérifie que ce n'est pas vide
    if (!empty($firstname)) {
        $testRegex = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REG_EXP_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$testRegex) {
            $error["firstname"] = "Le prénom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($firstname) <= 1 || strlen($firstname) >= 70) {
                $error["firstname"] = "La longueur du prénom n'est pas bonne";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["firstname"] = "Vous devez entrer un prénom!!";
    }

    //===================== Anniversaire : Nettoyage et validation =======================
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);

    if (!empty($birthdate)) {
        $birthdateObj = DateTime::createFromFormat('Y-m-d', $birthdate);
        $currentDateObj = new DateTime();
        if(!$birthdateObj){
            $error["birthdate"] = "La date entrée n'est pas valide!";
        } else {
            $diff = $birthdateObj->diff($currentDateObj);
            $age = $diff->days/365;
            if (!$birthdateObj || $diff->invert == 1 || $birthdateObj->format('Y-m-d') !== $birthdate || $age==0 || $age>120) {
                $error["birthdate"] = "La date entrée n'est pas valide!";
            }
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["birthdate"] = "Vous devez entrer votre date de naissance!!";
    }

    //===================== Numéro de mobile : Nettoyage et validation =======================
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT));

    if (!empty($phone)) {
        $testRegex = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REG_EXP_PHONE . '/')));
        if (!$testRegex) {
            $error["phone"] = "Le numéro entré n'est pas valide";
        }
    } else { // Pour les champs obligatoires, on retourne une erreur
        $error["phone"] = "Vous devez entrer votre numéro de téléphone!!";
    }

    //===================== Email : Nettoyage et validation =======================
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

    if (!empty($mail)) {
        $testmail = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if (!$testmail) {
            $error["mail"] = "L'adresse mail n'est pas au bon format!!";
        }
        if (Patient::isExist($mail)) {
            $error["mail"] = "L'adresse mail existe déjà";

        }
    } else {
        $error["mail"] = "L'adresse mail est obligatoire!!";
    }

    if (empty($error)) {
        $patient = new Patient($lastname, $firstname, $birthdate, $phone, $mail);
        
        $addedPatient = $patient->add();
        if ($addedPatient === true) {
            
            $addMsg= 'Le nouveau patient a bien été créé dans la base de données.';
        } else {
            $addMsg= 'Le nouveau patient ne peut pas encore être ajouté dans la base de données';
        }        
    } 
}

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
if ($_SERVER['REQUEST_METHOD'] == 'POST' &&empty($error) && empty($errorDate)) {

    $pdo = Database::DbConnect();
    $pdo->beginTransaction();

    try {
        $patient = new Patient($lastname, $firstname, $phone, $mail, $birthdate); // hydrate
        $patientId = $patient->add(); // push DB
        $appointment = new Appointment($dateHour, $idPatients);
        $responseAdd = $appointment ->add();
        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
    }

    if ($appointment === false || $patient === false) {
        $sentence = 'Le patient et le rendez-vous n\'ont pas pu être ajoutés';
    } else {
        $sentence = 'Le patient et le rendez-vous ont été ajoutés';
    }

    if ($responseAdd instanceof PDOException) {
        $error = $responseAdd -> getMessage();
    }
    header('location:/liste-de-patients');
    die;
} else {
    include(dirname(__FILE__).'/../views/user/add-app-pat.php' );
}

include(dirname(__FILE__).'/../views/templates/footer.php');

    //! sentence success or error




