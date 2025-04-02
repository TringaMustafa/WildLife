<?php
Class dbcon{
    private $conn = null;
    private $host = 'localhost';
    private $dbname = 'africalwildlife';
    private $username = 'root';
    private $password = '';

    public function connDB(){
        try {
            $this->conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $pdoe) {
            die("Nuk mund të lidhej me bazën e të dhënave {$this->dbname} :" . $pdoe->getMessage());
        }
    }
}
?>