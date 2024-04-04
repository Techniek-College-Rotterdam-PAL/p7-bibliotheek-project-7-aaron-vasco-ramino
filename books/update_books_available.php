<?php

// bestand voor sessie
require_once '../account/session_function_docent.php';

// bestand voor database connectie
require_once '../Code/db.php';


 // Definieer de Update_available-klasse
 class Update_available {
    // Eigenschappen van de klasse
    private $conn;
    private $id;
    
    // Constructor methode om de eigenschappen van de klasse in te stellen
    public function __construct($id, $conn) {
        $this->conn = $conn;
        $this->id = $id;
    }
    // Methode om gegevens in de database te selecteren
    public function Select_available() {
        $query = "SELECT beschikbaarheid FROM boeken WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Methode om gegevens in de database te updaten
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

 // Als het formulier is ingediend, worden de gegevens opgehaald en wordt de Update_available-klasse aangeroepen om de gegevens in de database bij te werken
if (isset($_POST['submit'])) {
    $id = $_POST['submit'];

    echo $id;
    
    $update = new Update_available($id, $conn);
    $success = $update->Update_available_books();

     // Als de gegevens zijn bijgewerkt in de database, wordt een succesbericht weergegeven
    if ($success !== false) { 
        echo "Book availability updated successfully.";
    } else {
        echo "Failed to update book availability.";
    }
}

// Als de gegevens zijn bijgewerkt in de database, wordt de gebruiker doorgestuurd naar de boekenpagina
header('Location: ../books/books_available.php');


