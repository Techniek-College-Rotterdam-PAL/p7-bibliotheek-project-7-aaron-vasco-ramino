<?php
require_once '../account/session_function_docent.php';
require_once '../Code/db.php';



 class Update_available {
    private $conn;
    private $id;
    
    public function __construct($id) {
        $this->conn = (new Database_connect())->Connect();
        $this->id = $id;
    }

    public function Select_available() {
        $query = "SELECT beschikbaarheid FROM boeken WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function Update_available_books() {
        $currentavailability = $this->Select_available();
        $newavailability = ($currentavailability['beschikbaarheid'] == 1) ? 0 : 1; 
    
        $query = "UPDATE boeken SET beschikbaarheid = :beschikbaarheid WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':beschikbaarheid', $newavailability);
        $stmt->execute();
        return $stmt->rowCount(); 
    }
    
}

if (isset($_POST['submit'])) {
    $id = $_POST['submit'];

    echo $id;

    $update = new Update_available($id);
    $success = $update->Update_available_books();

    if ($success !== false) { 
        echo "Book availability updated successfully.";
    } else {
        echo "Failed to update book availability.";
    }
}

header('Location: ../books/books_available.php');

