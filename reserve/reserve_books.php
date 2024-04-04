<?php

require_once '../account/session_function.php';
require_once '../Code/db.php';

class Reserve {
    private $conn;
    private $id;
    private $first_name;
    private $last_name;
    private $titel;
    private $current_time;
    private $isbn;
    private $account_id;

    public function __construct($conn, $id, $account_id, $first_name, $last_name, $titel, $current_time, $isbn) { 
        $this->conn = (new Database_connect())->Connect(); 
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->titel = $titel;
        $this->current_time = $current_time;
        $this->isbn = $isbn;
        $this->account_id = $account_id;
    }
      
    public function Reserve() {
        $query = "INSERT INTO reserveren (boek_id, account_id, voornaam, achternaam, titel, isbn, time) VALUES (:boek_id, :account_id, :voornaam, :achternaam, :titel, :isbn, :time)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':boek_id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':account_id', $this->account_id, PDO::PARAM_INT);
        $stmt->bindParam(':voornaam', $this->first_name, PDO::PARAM_STR);
        $stmt->bindParam(':achternaam', $this->last_name, PDO::PARAM_STR);
        $stmt->bindParam(':titel', $this->titel, PDO::PARAM_STR);
        $stmt->bindParam(':isbn', $this->isbn, PDO::PARAM_STR);
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
    $account_id = $_SESSION['id']; 
    $id = $_POST['submit']; 
    $current_time = date('Y-m-d H:i:s');

    echo $id;

    

    $query = "SELECT titel, voorraad, isbn FROM boeken WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $titel = $row['titel'];
        $stock = $row['voorraad'];
        $isbn = $row['isbn'];

        if ($stock <= 0) {
            echo "Error: Stock is zero or less. Cannot reserve the book.";
            header("Location: ../reserve/books_reserved_error.php");
        } else {
            $reserve = new Reserve($conn, $id, $account_id, $first_name, $last_name, $titel, $current_time, $isbn);
            $reserve->Reserve();

            $updatestock = new Updatestock($conn, $id, $stock);
            $updatestock->Updatestock();
            header("Location: ../reserve/books_reserved_success.php");
        }
    } else {
        echo "Error: Book not found.";
    }
}

?>