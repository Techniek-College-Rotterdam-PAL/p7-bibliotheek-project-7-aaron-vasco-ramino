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
include '../Code/nav_docent.php';
include '../account/session_function_docent.php';
require_once '../Code/db.php';

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
       "<form method='post' action='../reserve/delete_reserved.php'>" . 
       "<button name='submit_book' value='" . $reservedbook['id']  . "' class='search-button-reserve'>Boek ingeleverd</button>" .
               "</div>";
}

require '../Code/footer.php';
?>


</body>
</html>