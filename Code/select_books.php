<?php

class Books {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function Selectallbooks() {
        $query = "SELECT * FROM boeken";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$boekenmanager = new Books($conn);
$books = $boekenmanager->Selectallbooks();

foreach ($books as $book) {
    echo "<div class='book_container'>" .  
            "<div class='books'>" .  
                    $book['id']  .  "<br>" .
                    $book['titel']  .   
                 "<div>ISBN: "  .   $book['isbn'] . "</div>"  . "<br>" .
                    $book['schrijver'] . "<br>" .
                    $book['uitgever'] .  "<br>" .
                    $book['boekjaar'] .  "<br>";

    if (!empty($book['img'])) {
        $imagePath = $book['img'];
        echo '<img src="upload/' . $imagePath . '" width="100" height="100" class="book_image" alt="img_book" ><br>';
    }

    echo $book['informatie_boek'];
    echo "<div>Voorraad: " . $book['voorraad'] . "</div>";


    echo "<form method='post' action='reserve_books.php'>";
    echo "<button name='submit' value='" . $book['id']  . "' class=''>reserveren</button>"

     . "</form>";


    echo "</div></div>"; 
}