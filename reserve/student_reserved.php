<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Code/main.css">
</head>

<body>
<?php

// bestand voor navigatiebalk
include '../Code/nav_docent.php';

// bestand voor sessie
include '../account/session_function_docent.php';

// bestand voor database connectie
require_once '../Code/db.php';


  // Definieer de Reservedbooks-klasse
 class Reservedbooks {
    // Eigenschappen van de klasse
    private $conn;
    
    // Constructor methode om de eigenschappen van de klasse in te stellen
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    // Methode om gegevens in de database te selecteren
    public function Selectreservedbooks() {
        $query = "SELECT * FROM reserveren";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
 // Maak een object van de klasse Reservedbooks aan en roep de methode Selectreservedbooks aan
$reservedbooks = new Reservedbooks($conn);
$reservedBooks = $reservedbooks->Selectreservedbooks();


// Loop door de gegevens en geef deze weer
foreach ($reservedBooks as $reservedbook) {
    echo "<div class='student_reserved'>  Voornaam: " . $reservedbook['voornaam'] . " Achternaam: " . $reservedbook['achternaam'] . 
    " Titel: " . $reservedbook['titel'] . " Isbn: " . $reservedbook['isbn'] . " Time: " . $reservedbook['time'] .
       "<form method='post' action='../reserve/delete_reserved.php'>" . 
       "<button name='submit_book' value='" . $reservedbook['id']  . "' class='search-button-reserve'>Boek ingeleverd</button>" .
               "</div>";
}


?>


</body>
</html>