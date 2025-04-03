<?php
require_once('../db/dbcon.php');
if (!isset($_SESSION)) {
    session_start();
}

Class Modeli extends dbcon{
private $id;
private $nrleternjoftimit;
private $emri;
private $mbiemri;
private $aksesi;
private $passwordi;
private $numri;
private $roli;  // Add this property
private $dbConn;
public function __construct($id='', $nrleternjoftimit='', $emri='', $mbiemri='', $adresa='' ,$aksesi='', $passwordi='',$numri='', $dbConn='') {
    $this->id = $id;
    $this->nrleternjoftimit = $nrleternjoftimit;
    $this->emri = $emri;
    $this->mbiemri = $mbiemri;
    $this->adresa = $adresa;
    $this->aksesi=$aksesi;
    $this->passwordi=$passwordi;
    $this->numri=$numri;
    $this->roli = 'user'; // Default role
    $this->dbcon = $this->connDB();
}
//Seters and geters
public function getId() {
    return $this->id;
} 

public function setId($id) {
    $this->id = $id;
}

public function getNrleternjoftimit() {
    return $this->nrleternjoftimit;
}

public function setNrleternjoftimit($nrleternjoftimit) {
    $this->nrleternjoftimit = $nrleternjoftimit;
}

public function getEmri() {
    return $this->emri;
}

public function setEmri($emri) {
    $this->emri = $emri;
}

public function getMbiemri() {
    return $this->mbiemri;
}

public function setMbiemri($mbiemri) {
    $this->mbiemri = $mbiemri;
}

public function getAdresa() {
    return $this->adresa;
}

public function setAdresa($adresa) {
    $this->adresa = $adresa;
}

public function getAksesi(){
    return $aksesi;
}
public function setAksesi($aksesi){
    $this->aksesi=$aksesi;
}

public function getPasswordi(){
    return $passwordi;
}
public function setPasswordi($passwordi){
    $this->passwordi=$passwordi;
}
public function getNumri(){
    return $numri;
}
public function setNumri($numri){
    $this->numri=$numri;
}

public function getRoli() {
    return $this->roli;
}

public function setRoli($roli) {
    $this->roli = $roli;
}

public function fshijPerdoruesin($id) {
    try {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

//Metoda per insertim Dhenave
public function insertoDhenat(){
    try{
        $sql = "INSERT INTO `users` (`nrleternjoftimit`,`emri`,`mbiemri`,`numri`,`adresa`,`passwordi`,`roli`) VALUES(?,?,?,?,?,?,?)";
        $stm = $this->dbcon->prepare($sql);
        $stm->execute([$this->nrleternjoftimit, $this->emri, $this->mbiemri,$this->numri, $this->adresa, $this->passwordi, $this->roli]);
        
        $_SESSION['regMeSukses'] = true;
        return true;
    }
    catch(Exception $e){
        return false;
    }
}

    
    public function kontrollo(){
        try {
            $sql = "SELECT * from `users` WHERE `nrleternjoftimit` = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->nrleternjoftimit]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function kontrolloLlogarin(){
        try {
            $sql = 'SELECT * from users WHERE nrleternjoftimit = ? and passwordi = ?';
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->nrleternjoftimit, $this->passwordi]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqiUserat(){
        try {
            $sql = "SELECT * FROM `users`";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute();
  
            return $stm->fetchAll();
      
        } catch (Exception $e) {
            return $e->getMessage();
        }
       }
  
//Metoda per shfaqjen e te gjithe te dhenave te studentit
    public function shfaqSipasIDs(){
        try{
            $sql = "SELECT * FROM users where id=?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->id]);
            $dhenat = $stm->fetchAll();
            return $dhenat;
        }
    catch(Exception $e){
        return $e->getMessage();
    }
}
public function shfaqTeGjithePerdoruesit(){
        try {
            $sql = 'SELECT * from users';
            $stm = $this->dbcon->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

public function updateUser($id, $emri, $mbiemri, $aksesi) {
    try {
        $sql = "UPDATE users SET emri = :emri, mbiemri = :mbiemri, aksesi = :aksesi WHERE id = :id";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':emri', $emri);
        $stmt->bindParam(':mbiemri', $mbiemri);
        $stmt->bindParam(':aksesi', $aksesi);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

public function getUserByNrLeternjoftimit($nrleternjoftimit = null) {
    try {
        // Use provided number or class property
        $nrToUse = $nrleternjoftimit ?? $this->nrleternjoftimit;
        
        if (empty($nrToUse)) {
            error_log("Empty nrleternjoftimit");
            return false;
        }

        $sql = "SELECT * FROM users WHERE nrleternjoftimit = ?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$nrToUse]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$result) {
            error_log("No user found with nrleternjoftimit: " . $nrToUse);
            return false;
        }

        return $result;
    } catch (Exception $e) {
        error_log("Database error in getUserByNrLeternjoftimit: " . $e->getMessage());
        return false;
    }
}

public function updateUserProfile($nrleternjoftimit, $emri, $mbiemri, $adresa, $numri) {
    try {
        // Validate inputs
        if (empty($emri) || empty($mbiemri)) {
            return false;
        }
        
        // Clean inputs
        $emri = trim($emri);
        $mbiemri = trim($mbiemri);
        $adresa = trim($adresa);
        $numri = trim($numri);
        
        $sql = "UPDATE users SET emri = ?, mbiemri = ?, adresa = ?, numri = ? WHERE nrleternjoftimit = ?";
        $stmt = $this->dbcon->prepare($sql);
        return $stmt->execute([$emri, $mbiemri, $adresa, $numri, $nrleternjoftimit]);
    } catch (Exception $e) {
        return false;
    }
}

public function kontrolloNrTelefonit($numri) {
    try {
        $sql = "SELECT COUNT(*) FROM users WHERE numri = ?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$numri]);
        return $stmt->fetchColumn() > 0;
    } catch (Exception $e) {
        return false;
    }
}

public function kontrolloNrLeternjoftimit($nrleternjoftimit) {
    try {
        $sql = "SELECT COUNT(*) FROM users WHERE nrleternjoftimit = ?";
        $stmt = $this->dbcon->prepare($sql);
        $stmt->execute([$nrleternjoftimit]);
        return $stmt->fetchColumn() > 0;
    } catch (Exception $e) {
        return false;
    }
}

}
?>