<?php
// bestand voor database connectie
require_once '../Code/db.php';

// bestand voor sessie
include '../account/session_function_docent.php';

// Definieer de klasse Delete_reserved_Update_stock
class Delete_reserved_Update_stock{
     // Eigenschappen van de klasse
    private $conn;
    private $id;
   

   
    // Constructor methode om de eigenschappen van de klasse in te stellen
    public function __construct($conn, $id){
        $this->conn = $conn;
        $this->id = $id;
       
    }
     
    // Methode om gegevens in de database te selecteren
    public function Update_stock_Delete_reserved(){
        $query = "SELECT boek_id FROM reserveren WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $book_id = $stmt->fetch(PDO::FETCH_ASSOC);
  

       // Methode om gegevens in de database te verwijderen
        $query = "DELETE FROM reserveren WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        // Methode om gegevens in de database te updaten
        $query = "UPDATE boeken SET voorraad = voorraad + 1 WHERE id = :book_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':book_id', $book_id['boek_id']);
        $stmt->execute();

       // Als de gegevens zijn bijgewerkt in de database, wordt een succesbericht weergegeven
        header('Location: ../Reserve/delete_reserved_succes.php');
}

}
// Als het formulier is ingediend, worden de gegevens opgehaald en wordt de Delete_reserved_Update_stock-klasse aangeroepen om de gegevens in de database bij te werken
if (isset($_POST['submit_book'])) {
    $id = $_POST['submit_book'];


    $delete = new Delete_reserved_Update_stock($conn, $id);
    $delete->Update_stock_Delete_reserved();
}


?>