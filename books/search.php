<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Code/main.css">
    <title>Search</title>
</head>
<body>

 <?php

 // bestand voor database connectie
require_once "../Code/db.php";

// Definieer de klasse Searchhandler
class Searchhandler {
    // Eigenschappen van de klasse
    private $conn;

    // Constructor methode om de eigenschappen van de klasse in te stellen
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    // Methode om gegevens in de database te selecteren
    public function search($query) {
        $sql = "SELECT * FROM boeken WHERE titel LIKE :query_title OR schrijver LIKE :query_writer";
        $stmt = $this->conn->prepare($sql);
        $searchparam = "%$query%";
        $stmt->bindParam(':query_title', $searchparam, PDO::PARAM_STR);
        $stmt->bindParam(':query_writer', $searchparam, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}

 // Maak een object van de klasse Searchhandler aan
$searchhandler = new Searchhandler($conn);

// Als er op de zoekknop is geklikt, voer dan de zoekmethode uit en geef de resultaten weer in een div
if(isset($_POST['search'])) {
    $searchterm = $_POST['search']; 
    $searchresults = $searchhandler->search($searchterm); 


     // Als er resultaten zijn, worden deze in een div weergegeven
    if ($searchresults) {
        foreach ($searchresults as $row) {
            echo "<div class='book_container2'>";
            echo "<div class='result'>";
            echo "<span>Titel:</span> " . $row['titel'] . "<br>";
            echo "<span>ISBN:</span> " . $row['isbn'] . "<br>";
            echo "<span>Schrijver:</span> " . $row['schrijver'] . "<br>";
            echo "<span>Uitgever:</span> " . $row['uitgever'] . "<br>";
            echo "<span>Boekjaar:</span> " . $row['boekjaar'] . "<br>";
        
            if (!empty($row['img'])) {
                $imagepath = $row['img'];
                echo '<img src="../Code/upload/' . $imagepath . '" width="100" height="100" class="img_search" alt="img_book"><br>';
            }
        
            echo "<span>Informatie:</span> " . $row['informatie_boek'] . "<br>";
            echo "<div class='search_reserve'>Dit boek reserveren?<br>";
            echo "<a class='reserve' href='../books/books.php'>Reserveren</a></div>";
            echo "</div></div>";
        }
    }

}


?>
