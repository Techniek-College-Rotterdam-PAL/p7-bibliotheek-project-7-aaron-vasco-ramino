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

    class Reservedbooks
    {
        private $conn;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        public function Selectreservedbooks()
        {
            $query = "SELECT * FROM reserveren JOIN boeken ON reserveren.boek_id = boeken.id JOIN account ON reserveren.account_id = account.id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }


    $reservedbooks = new Reservedbooks($conn);
    $reservedBooksArray = $reservedbooks->Selectreservedbooks();

    foreach ($reservedBooksArray as $reservedbook) {


        echo "<div class='student_reserved'> id: " . "  Voornaam: " . $reservedbook['voornaam'] . " Achternaam: " . $reservedbook['achternaam'] . " Titel: " . $reservedbook['titel'] . " Time: " . $reservedbook['time'] .
            "<p> </p>" .    '<button type="submit" class="search-button-reserve" name="submit">Boek ingeleverd</button>' . "</div>";
    }
    require 'footer.php'
    ?>

</body>

</html>