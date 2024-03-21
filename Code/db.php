<?php
class Database_connect{

    private $host = "localhost";
    private $db_name = "bibliotheek";
    private $username = "root";
    private $password = "";
    private $conn;

    public function __construct(){
        $this->conn = null;
    }


 public function Connect(){
       try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
        echo "Connection error: " . $e->getMessage();
      }
      return $this->conn;
}
}

$conn = (new Database_connect())->Connect();




?>


