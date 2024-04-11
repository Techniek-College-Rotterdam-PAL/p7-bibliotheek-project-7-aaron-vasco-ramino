<?php
 // bestand voor sessie functie
require_once '../account/session_function.php';

// bestand voor database connectie
require_once '../Code/db.php';

// Definieer de Reserve-klasse
class Reserve {
    // Eigenschappen van de klasse
    private $conn;
    private $id;
    private $first_name;
    private $last_name;
    private $title;
    private $current_time;
    private $isbn;
    private $account_id;
    

    // Constructor methode om de eigenschappen van de klasse in te stellen
    public function __construct($conn, $id, $account_id, $first_name, $last_name, $title, $current_time, $isbn) { 
        $this->conn =$conn; 
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->title = $title;
        $this->current_time = $current_time;
        $this->isbn = $isbn;
        $this->account_id = $account_id;
    }
      // Methode om gegevens in de database te reserveren
    public function Reserve() {
        $query = "INSERT INTO reserveren (boek_id, account_id, voornaam, achternaam, titel, isbn, time) VALUES (:boek_id, :account_id, :voornaam, :achternaam, :titel, :isbn, :time)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':boek_id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':account_id', $this->account_id, PDO::PARAM_INT);
        $stmt->bindParam(':voornaam', $this->first_name, PDO::PARAM_STR);
        $stmt->bindParam(':achternaam', $this->last_name, PDO::PARAM_STR);
        $stmt->bindParam(':titel', $this->title, PDO::PARAM_STR);
        $stmt->bindParam(':isbn', $this->isbn, PDO::PARAM_STR);
        $stmt->bindParam(':time', $this->current_time, PDO::PARAM_STR);
        $stmt->execute();
    
        echo "U heeft het boek gereserveerd";
    }
}    
// Definieer de Updatestock-klasse
class Updatestock {
    // Eigenschappen van de klasse
    private $conn;
    private $id;
    private $stock;

    public function __construct($conn, $id, $stock) {
        $this->conn = $conn;
        $this->id = $id;
        $this->stock = $stock;
    }
     // Methode om de voorraad van een boek in de database bij te werken
    public function Updatestock() {
        if ($this->stock <= 0) {
            echo "Error: Stock cannot be negative or zero. Cannot reserve the book.";
            return;
        }

        $updatedstock = $this->stock - 1;
        
        // Update de voorraad van het boek
        $query = "UPDATE boeken SET voorraad = :voorraad WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':voorraad', $updatedstock, PDO::PARAM_INT);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        echo "Voorraad is geüpdatet";
    }
}


// Als het formulier is ingediend, worden de gegevens opgehaald en wordt de Reserve-klasse aangeroepen om de gegevens in de database te reserveren
if(isset($_POST['submit'])){
    $first_name = $_SESSION['voornaam'];
    $last_name = $_SESSION['achternaam'];
    $account_id = $_SESSION['id']; 
    $id = $_POST['submit']; 
    $current_time = date('Y-m-d H:i:s');

    echo $id;

    
    // Selecteer het boek uit de database
    $query = "SELECT titel, voorraad, isbn FROM boeken WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Als het boek is gevonden, wordt de voorraad van het boek bijgewerkt en wordt het boek gereserveerd
    if ($row) {
        $title = $row['titel'];
        $stock = $row['voorraad'];
        $isbn = $row['isbn'];

        if ($stock <= 0) {
            echo "Error: Stock is zero or less. Cannot reserve the book.";
            header("Location: ../reserve/books_reserved_error.php");
        } else {
            $reserve = new Reserve($conn, $id, $account_id, $first_name, $last_name, $title, $current_time, $isbn);
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