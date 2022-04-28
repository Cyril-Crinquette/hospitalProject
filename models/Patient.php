<?php

require_once(dirname(__FILE__) . '/../utils/hospital-connection.php');


class Patient
{
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

    public function __construct(string $lastname = '', string $firstname = '', string $birthdate = '', string $phone = '', string $mail = '')
    {
        $this->setLastname($lastname);
        $this->setFirstname($firstname);
        $this->setBirthdate($birthdate);
        $this->setPhone($phone);
        $this->setMail($mail);
        $this->_pdo = Database::dbConnect();
    }
    //----------------------------------------------------------------------------------------

    // GETTER -------------------------------------------------------

    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * GETTER pour l'attribut '_lastname' de 'Patient'
     * @return string
     */
    public function getLastname(): string
    {
        return $this->_lastname;
    }

    public function getFirstname(): string
    {
        return $this->_firstname;
    }

    public function getBirthdate(): string
    {
        return $this->_birthdate;
    }

    public function getPhone(): string
    {
        return $this->_phone;
    }

    public function getMail(): string
    {
        return $this->_mail;
    }
    // ----------------------------------------------------------------

    // SETTER ---------------------------------------------------------

    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    /**
     * SETTER pour l'attribut privé _lastname
     * @param string $lastname
     * @return void
     */
    public function setLastname(string $lastname): void
    {
        $this->_lastname = $lastname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->_firstname = $firstname;
    }

    public function setBirthdate(string $birthdate): void
    {
        $this->_birthdate = $birthdate;
    }

    public function setPhone(string $phone): void
    {
        $this->_phone = $phone;
    }

    public function setMail(string $mail): void
    {
        $this->_mail = $mail;
    }
    // ----------------------------------------------------------------------

    // METHODE ADD POUR L'AJOUT DANS LA BASE DE DONNEES------------------------------------------

    public function add(): bool
    {
        try {
            $sql = "
            INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
            VALUES (:lastname,:firstname,:birthdate,:phone,:mail)
            ";
            $sth = $this->_pdo->prepare($sql);

            $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
            $sth->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
            $sth->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
            $sth->bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
            $sth->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);

            return $sth->execute();
        } catch (PDOException $exception) {
            return false;
        }
    }
    // ----------------------------------------------------------------------------------------

    // METHODE VERIFY POUR LA VERIFICATION DU MAIL DANS LA BASE DE DONNEES----------------------------

    public static function isExist(string $mail): bool
    {
        try {
            $sql =
                "SELECT mail
            FROM patients
            WHERE mail = :mail
            ";
            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
            $sth->execute();

            if (empty($sth->fetchAll())) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $exception) {
            return false;
        }
    }
    // ----------------------------------------------------------------------------------------

    // METHODE GETALL POUR AFFICHER LES PATIENTS DE LA BASE DE DONNEES----------------------------

    public static function getAll(string $search = ''):array{
        $sql = '
            SELECT * 
            FROM `patients`
            WHERE `firstname` LIKE :search
            OR `lastname` LIKE :search;
            ';
        try {
            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
            if (!$sth) {
                throw new PDOException();
            }
            if ($sth->execute()) {
                return $sth->fetchAll();
            }
        } catch (PDOException $exception) {
            return [];
        }
    }
    // ----------------------------------------------------------------------------------------

    // METHODE GETONE POUR AFFICHER LE PATIENT DE LA BASE DE DONNEES----------------------------

    public static function getOne(int $id): object
    {
        $sql = '
            SELECT * 
            FROM `patients` 
            WHERE `patients`.`id` =:id;
            ';
        try {
            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $verif = $sth->execute();
            if (!$verif) {
                throw new PDOException();
            } else {
                $patient = $sth->fetch();
                if (!$patient) {
                    throw new PDOException('Patient non trouvé');
                }
                return $patient ;
            }
        } catch (PDOException $e) {
            return $e;
        }
    }
    // ----------------------------------------------------------------------------------------

    // METHODE MODIFY POUR LA MODIFICATION D'UN PATIENT DANS LA BASE DE DONNEES------------------------------------------

    public function modify(int $id) {        
            $sql =
            'UPDATE `patients` 
            SET 
            `lastname` = :lastname,
            `firstname` = :firstname,
            `birthdate` = :birthdate,
            `phone` = :phone,
            `mail` = :mail
            WHERE `id` = :id;
            ';
        try {
            $sth = $this->_pdo->prepare($sql);
            $sth -> bindValue(':id', $id, PDO::PARAM_INT); // PDO::PARAM_STR valeur par default prèciser seulement quand c'est autre chose
            $sth -> bindValue(':lastname', $this -> getLastname(), PDO::PARAM_STR); // PDO::PARAM_STR valeur par default prèciser seulement quand c'est autre chose
            $sth -> bindValue(':firstname', $this -> getFirstname(), PDO::PARAM_STR);
            $sth -> bindValue(':birthdate', $this -> getBirthdate(), PDO::PARAM_STR);
            $sth -> bindValue(':phone', $this -> getPhone(), PDO::PARAM_STR);
            $sth -> bindValue(':mail', $this -> getMail(), PDO::PARAM_STR);
            $verif = $sth -> execute(); // retour un objet pdo statment !
            if (!$verif) {
                throw new PDOException('La requête n\'a pas été exécuté');
            } else {
                return $verif;
            }
        } catch (PDOException $e) {
            return $e;
        }
    }
    // ----------------------------------------------------------------------------------------

    // METHODE ALLINFOS POUR L'AFFICHAGE D'UN PATIENT AVEC TOUS SES RENDEZ-VOUS------------------------------------------

    public static function allInfos($id):array{
        try {
            $sth = Database::dbconnect() -> prepare(
            "SELECT `patients`.`id`, `appointments`.`idPatients`,`appointments`.`id` as `appId`, `lastname`, `firstname`, `birthdate`, `phone`, `mail`, `dateHour` 
            FROM `patients` 
            JOIN `appointments` 
            ON `patients`.`id` = `appointments`.`idPatients`
            WHERE `patients`.`id` = :id");
            $sth -> bindValue(':id', $id, PDO::PARAM_INT);
            $verif = $sth -> execute();
            if (!$verif) {
                throw new PDOException('La requête n\'a pas été exécutée');
            } else {
                $all = $sth -> fetchAll();
                if (!$all) {
                    throw new PDOException('Informations introuvables');
                }
            }
        } catch (PDOException $e) {
            return [];
        }
        return $all; //retourne un objet et fetchAll un tableau !
    }
    // ----------------------------------------------------------------------------------------

    // METHODE DELETE POUR EFFACER 1 PATIENT ET SES RENDEZ-VOUS------------------------------------------

    public static function delete($id):bool{
        $sth = Database::dbconnect() -> prepare(
        "DELETE FROM `patients`
        WHERE `patients`.`id` = :id");
        $sth -> bindValue(':id', $id, PDO::PARAM_INT);
        $sth -> execute();
        $total = $sth -> rowCount();
        return ($total <=0) ? FALSE : TRUE;
    }
    // ----------------------------------------------------------------------------------------

    // METHODE SEARCH POUR LE CHAMP DE RECHERCHE-----------------------------------------------

    /** //! search(string $search)
     * @param string $search
     * 
     * @return array
     */
    public static function search(string $search): array{
        try {
            $sql = 'SELECT * FROM `hospitale2n`.`patients`
                    WHERE `lastname` LIKE :search
                    -- //OR `firstname` LIKE :search
                    ORDER BY `lastname` ASC;'; // request

            $sth = Database::DbConnect()->prepare($sql); // prepare
            $sth->bindValue(':search', $search . '%', PDO::PARAM_STR); //bindValue

            if (!$sth) {
                throw new PDOException();
            } else {
                $sth->execute(); // execute
                $patients = $sth->fetchAll();
            }

            return $patients;
            
        } catch (PDOException $e) {
            return [];
        }
    }
    // ----------------------------------------------------------------------------------------

}