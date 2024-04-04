<?php
// Definieer de Database_connect-klasse
class Database_connect {
    // Eigenschappen om databaseverbindingdetails op te slaan
    private $host = "localhost";
    private $db_name = "bibliotheek";
    private $username = "root";
    private $password = "";
    private $conn; // Database verbindingsobject

    // Constructor methode
    public function __construct() {
        $this->conn = null; // Initialiseer verbindingsobject als null
    }

    // Methode om databaseverbinding tot stand te brengen
    public function Connect() {
        try {
            // Probeer een PDO-verbinding te maken met de verstrekte gegevens
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            // Stel PDO-foutmodus in op het gooien van uitzonderingen
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // Vangt elke PDOException op die kan optreden tijdens de poging tot verbinding
           throw new Exception("Verbindingsfout: " . $e->getMessage()); 
        }
        return $this->conn; // Geeft verbindingsobject terug, of dit nu gelukt is of niet
    }
}

//  Probeert een databaseverbinding tot stand te brengen
try{
   $conn = (new Database_connect())->Connect();
  
}

catch(Exception $e){
    // Vangt elke uitzondering op die kan optreden tijdens de poging tot verbinding
    echo $e->getMessage();
}


?>




