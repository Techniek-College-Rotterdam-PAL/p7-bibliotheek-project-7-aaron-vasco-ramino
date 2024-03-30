<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
<?php
include 'nav_docent.php';
include 'session_function.php';
require_once 'db.php';

 class Reservedbooks {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function Selectreservedbooks() {
        $query = "SELECT * FROM reserveren";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$reservedbooks = new Reservedbooks($conn);
$reservedBooks = $reservedbooks->Selectreservedbooks();

foreach ($reservedBooks as $reservedbook) {
    echo "<div class='student_reserved'>  Voornaam: " . $reservedbook['voornaam'] . " Achternaam: " . $reservedbook['achternaam'] . 
    " Titel: " . $reservedbook['titel'] . " Isbn: " . $reservedbook['isbn'] . " Time: " . $reservedbook['time'] .
       "<form method='post' action='delete_reserved.php'>" . 
       "<button name='submit_book' value='" . $reservedbook['id']  . "' class='search-button-reserve'>Boek ingeleverd</button>" .
               "</div>";
}

require 'footer.php';
?>


</body>
</html>