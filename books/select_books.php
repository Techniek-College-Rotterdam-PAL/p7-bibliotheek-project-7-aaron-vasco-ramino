<?php

// Definieer de Books-klasse
class Books{
    // Eigenschappen van de klasse
    private $conn;


    // Constructor methode om de eigenschappen van de klasse in te stellen
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Methode om gegevens uit de database te selecteren
    public function Selectallbooks()
    {
        $query = "SELECT * FROM boeken WHERE beschikbaarheid = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Maak een nieuw Books-object en roep de Selectallbooks-methode aan om alle boeken uit de database te selecteren
$booksmanager = new Books($conn);
$books = $booksmanager->Selectallbooks();


//  Loop door de resultaten van de query en geef de boeken weer
foreach ($books as $book) {
    echo "<div class='book_container'>" .
        "<div class='select_books'>" .

        "Titel:" . $book['titel']  .
        "<div>Isbn: "  .   $book['isbn'] . "</div>"  . "<br>" .
        "Schrijver:" . $book['schrijver'] . "<br>" .
        "Uitgever:" .  $book['uitgever'] .  "<br>" .
        "Boekjaar:" . $book['boekjaar'] .  "<br>";
    if (!empty($book['img'])) {
        $imagepath = $book['img'];
        echo '<img src="../Code/upload/' . $imagepath . '"class="img_search" height="150px" width="130px "alt="img_book" ><br>';
    }
    echo "Informatie:" . " " .  $book['informatie_boek'];
    echo "<div class='voorraad'>Voorraad: " . $book['voorraad'] . "</div>";





    echo "<form method='post' action='../reserve/reserve_books.php'>";
    echo "<button class='reserve' name='submit' value='" . $book['id']  . "' class=''>reserveren</button>"

        . "</form>";

    echo "</div></div></div></div>";
}
