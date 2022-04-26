<?php

require_once(dirname(__FILE__) . '/../utils/hospital-connection.php');

class Appointment {
    private int $_id;
    private string $_dateHour;
    private int $_idPatients;
    private object $_pdo;

    /**
     * Elements permettant d'initier un RDV
     * @param string $dateHour
     * @param int $idPatients
     */
    public function __construct(string $dateHour = '', int $idPatients = 0){
        $this -> _dateHour = $dateHour;
        $this -> _idPatients = $idPatients;
        $this -> _pdo = DataBase::dbconnect();
    }


    /**
     * SETTER pour dateHour
     * @param string $dateHour
     * 
     * @return void
     */
    public function setdateHour(string $dateHour): void{
        $this -> _dateHour = $dateHour;
    }

    /**
     * GETTER pour dateHour
     * @return string
     */
    public function getdateHour():string {
        return $this -> _dateHour;
    }

    /**
     * SETTER pour idPatients
     * @param int $idPatients
     * 
     * @return void
     */
    public function setidPatients(int $idPatients): void{
        $this -> _idPatients = $idPatients;
    }

    /**
     * GETTER pour idPatients
     * @return int
     */
    public function getidPatients(): int{
        return $this -> _idPatients;
    }

    /**
     * SETTER pour id
     * @param int $id
     * 
     * @return void
     */
    public function setId(int $id): void{
        $this -> _id = $id;
    }

    
    /**
     * GETTER pour id
     * @return int
     */
    public function getId(): int{
        return $this -> _id;
    }


    // METHODE ADD POUR L'AJOUT DANS LA BASE DE DONNEES------------------------------------------

    public function add():bool{
        try {
            $sth = $this->_pdo ->prepare(
                'INSERT INTO `appointments`(`dateHour`, `idPatients`) 
                VALUES(:dateHour, :idPatients)'
                ); 
                // ":X" est un marqueur nominatif
            $sth -> bindValue(':dateHour', $this -> getdateHour(), PDO::PARAM_STR); // PDO::PARAM_STR valeur par default prèciser seulement quand c'est autre chose
            $sth -> bindValue(':idPatients', $this -> getidPatients(), PDO::PARAM_INT);
            $verif= $sth->execute();
            if (!$verif) {
                throw new PDOException('La requête n\'a pas été exécutée');
            } else {
                return $verif;
            }
        } catch (PDOException $e) {
            return $e;
        }
    }
    // --------------------------------------------------------------------------------------------

    // METHODE GET ALL POUR AFFICHER LES RDV DE LA BASE DE DONNEES------------------------------------------

    public static function getAll():array{
        try {
            $sth = Database::dbconnect() -> prepare(
                'SELECT `appointments`.`id` AS `appId` ,
                `lastname`, `firstname`, `dateHour`  
                FROM  `appointments` 
                JOIN `patients` 
                ON `patients`.`id` = `appointments`.`idPatients`'
                );
            $verif = $sth -> execute();
            if (!$verif) {
                throw new PDOException('La requête n\'a pas été exécutée');
            } else {
                $all = $sth -> fetchAll();
                if (!$all) {
                    throw new PDOException('Rendez-vous introuvable');
                }
            }
        } catch (PDOException $e) {
            // return [];
            return $e;
        }
        return $all;
    }
    //--------------------------------------------------------------------------------------------------

    // Méthode getOne pour afficher les infos d'un RDV en particulier---------------------------------------

    public function getOne(int $id):object{
        try {
            $sth = $this->_pdo -> prepare(
                "SELECT `appointments`.`id`, `lastname`, `firstname`, `dateHour`, `phone` 
                FROM `appointments` 
                JOIN `patients`
                ON `patients`.`id` = `appointments`.`idPatients`
                WHERE `appointments`.`id` = $id"
                );
            $sth -> bindValue(':idPatients', $id, PDO::PARAM_INT);
            $verif = $sth -> execute();
            if (!$verif) {
                throw new PDOException('La requête n\'a pas été exécutée');
            } else {
                $one = $sth -> fetch();
                if (!$one) {
                    throw new PDOException('Rendez-vous introuvable');
                }
            }
        } catch (PDOException $e) {
            return $e;
        }
    return $one; //retourne un objet et fetchAll un tableau !
    }
    // ------------------------------------------------------------------------------------------------------

    // Méthode modify pour modifier les infos d'un rdv en particulier------------------------------------------------

    public function modify($id){
        try {
            $sth = $this->_pdo -> prepare
            (
            "UPDATE `appointments` 
            SET 
            `dateHour` = :dateHour,
            `idPatients` = :idPatients
            WHERE `id` = :id
            ");
            $sth -> bindValue(':dateHour', $this -> getdateHour(), PDO::PARAM_STR);
            $sth -> bindValue(':id', $id, PDO::PARAM_INT);
            $sth -> bindValue(':idPatients', $this -> getidPatients(), PDO::PARAM_INT);
            $verif = $sth -> execute();
            if (!$verif) {
                throw new Exception('La requête n\'a pas été exécutée');
            } else {
                return $verif;
            }
        } catch (PDOException $e) {
            return $e;
        }
    }
    //---------------------------------------------------------------------------------------------------
    
    // Méthode delete pour supprimer un rdv en particulier-------------------------------------------------------

    public static function delete($id){
        $sth = Database::dbconnect() -> prepare(
        "DELETE FROM `appointments`
        WHERE `appointments`.`id` = :id
        ");
        $sth -> bindValue(':id', $id, PDO::PARAM_INT);
        return $sth -> execute();
    }

    public static function deleteByPatient($id){
        $sth = Database::dbconnect() -> prepare(
        "DELETE FROM `appointments`
        WHERE `appointments`.`idPatients` = :id
        ");
        $sth -> bindValue(':id', $id, PDO::PARAM_INT);
        return $sth -> execute();
    }
    //---------------------------------------------------------------------------------------------------
}