<?php

require_once 'session_function.php';
require_once 'db.php';

class Reserve {
    private $conn;
    private $first_name;
    private $last_name;
    private $titel;
    private $current_time;

    public function __construct($conn, $first_name, $last_name, $titel, $current_time) { 
        $this->conn = (new Database_connect())->Connect();
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->titel = $titel;
        $this->current_time = $current_time;
    }
      

    public function Reserve() {
        $query = "INSERT INTO reserveren (voornaam, achternaam, titel, time) VALUES (:voornaam, :achternaam, :titel, :time)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':voornaam', $this->first_name, PDO::PARAM_STR);
        $stmt->bindParam(':achternaam', $this->last_name, PDO::PARAM_STR);
        $stmt->bindParam(':titel', $this->titel, PDO::PARAM_STR);
        $stmt->bindParam(':time', $this->current_time, PDO::PARAM_STR);
        $stmt->execute();

        echo "U heeft het boek gereserveerd";
    }
}

class Updatestock {
    private $conn;
    private $id;
    private $stock;

    public function __construct($conn, $id, $stock) {
        $this->conn = (new Database_connect())->Connect();
        $this->id = $id;
        $this->stock = $stock;
    }

    public function Updatestock() {
        if ($this->stock <= 0) {
            echo "Error: Stock cannot be negative or zero. Cannot reserve the book.";
            return;
        }


        $updatedStock = $this->stock - 1;

        $query = "UPDATE boeken SET voorraad = :voorraad WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':voorraad', $updatedStock, PDO::PARAM_INT);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        echo "Voorraad is geüpdatet";
    }
}

if(isset($_POST['submit'])){
    $first_name = $_SESSION['voornaam'];
    $last_name = $_SESSION['achternaam'];
    $titel = $_POST['titel'];
    $id = $_POST['id'];
    $stock = $_POST['voorraad'];
    $current_time = date('Y-m-d H:i:s');
  

    
    if ($stock <= 0) {
        echo "Error: Stock is zero or less. Cannot reserve the book.";
    } else {
        $reserve = new Reserve($conn, $first_name, $last_name, $titel, $current_time);
        $reserve->Reserve();

        $updatestock = new Updatestock($conn, $id, $stock);
        $updatestock->Updatestock();
    }
}
?>


