<?php

require_once(dirname(__FILE__).'/../config/hospital-connection.php');


class Patient {
    //déclaration d’attributs spécifiques à la classe 'Patient' ---------------------------
    private string $_id;
    private string $_lastname;
    private string $_firstname;
    private string $_birthdate;
    private string $_phone;
    private string $_mail;
    private object $_pdo;
    // -------------------------------------------------------------------------------------

    //MAGIC METHOD CONSTRUCT----------------------------------------------------------------

    public function __construct(string $lastname, string $firstname, string $birthdate, string $phone, string $mail){
        $this->setLastname($lastname);
        $this->setFirstname($firstname);
        $this->setBirthdate($birthdate);
        $this->setPhone($phone);
        $this->setMail($mail);
        $this->_pdo=dbConnect();
    }

    //----------------------------------------------------------------------------------------

    // GETTER -------------------------------------------------------

    public function getId():int{
        return $this->_id;
    }

    /**
     * GETTER pour l'attribut '_lastname' de 'Patient'
     * @return string
     */
    public function getLastname():string{
        return $this->_lastname;
    }

    public function getFirstname():string{
        return $this->_firstname;
    }

    public function getBirthdate():string{
        return $this->_birthdate;
    }

    public function getPhone():string{
        return $this->_phone;
    }

    public function getMail():string{
        return $this->_mail;
    }
    // ----------------------------------------------------------------

    // SETTER ---------------------------------------------------------

    public function setId(int $id):void{
        $this->_id = $id;
    }

    /**
     * SETTER pour l'attribut privé _lastname
     * @param string $lastname
     * @return void
     */
    public function setLastname(string $lastname):void{
        $this->_lastname = $lastname;
    }

    public function setFirstname(string $firstname):void{
        $this->_firstname = $firstname;
    }

    public function setBirthdate(string $birthdate):void{
        $this->_birthdate = $birthdate;
    }

    public function setPhone(string $phone):void{
        $this->_phone = $phone;
    }

    public function setMail(string $mail):void{
        $this->_mail = $mail;
    }
    // ----------------------------------------------------------------------

    // METHODE ADD POUR L'AJOUT DANS LA BASE DE DONNEES------------------------------------------

    public function add(){
        try{
            $sth = $this->_pdo->prepare(
                "INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
                VALUES (:lastname,:firstname,:birthdate,:phone,:mail)
                "       
            );
            
            $sth-> bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
            $sth-> bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
            $sth-> bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
            $sth-> bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
            $sth-> bindValue(':mail', $this->getMail(), PDO::PARAM_STR);

            $sth->execute();
        } catch(PDOException $exception){
            $error = $exception->getMessage();
            echo $error;
        }
    }
    // ----------------------------------------------------------------------------------------

    // METHODE VERIFY POUR LA VERIFICATION DU MAIL DANS LA BASE DE DONNEES----------------------------

    public function verify(){
        try {
            $sth = $this->_pdo->prepare(
                "SELECT mail
                FROM patients
                "
            );
            $patientsMails = $sth->fetchAll();
        } catch(PDOException $exception){
            $error = $exception->getMessage();
            echo $error;
        }
        foreach ($patientsMails as $value) {
            if ($value == $this->_mail) {
                return false;
            } else {
                return true;
            }
            
        }
    }





    // ----------------------------------------------------------------------------------------

}

// Exemple
// $Geoffrey = new Patient('juju', 'héhé', 'Necrolight', 'yio', 'Ancien Shield');
