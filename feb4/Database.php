<?php
class Database{
    private $host = "localhost";
    private $dbname ="players_esquivel_web6";
    private $username = "root";
    private $password = "";
    private $conn;

    public function __construct(){
        try { 
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->username,$this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo"Connected successfully"; 
        }
        catch(PDOException $e){
            echo "Connection Failed:" .$e->getMessage();
            die();
        }
        }
    public function getConnection(){
        return $this->conn;
    }
}


?>