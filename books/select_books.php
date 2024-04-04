<?php

class Books
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function Selectallbooks()
    {
        $query = "SELECT * FROM boeken WHERE beschikbaarheid = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$booksmanager = new Books($conn);
$books = $booksmanager->Selectallbooks();

foreach ($books as $book) {
    echo "<div class='book_container'>" .
        "<div class='select_books'>" .



        $book['titel']  .
        "<div>ISBN: "  .   $book['isbn'] . "</div>"  . "<br>" .
        $book['schrijver'] . "<br>" .
        $book['uitgever'] .  "<br>" .
        $book['boekjaar'] .  "<br>";
    echo $book['informatie_boek'];
    echo "<div class='voorraad'>Voorraad: " . $book['voorraad'] . "</div>";




    if (!empty($book['img'])) {
        $imagepath = $book['img'];
        echo '<img src="../Code/upload/' . $imagepath . '"class="book_image" height="180px" width="160px "alt="img_book" ><br>';
    }
    echo "<form method='post' action='../reserve/reserve_books.php'>";
    echo "<button class='reserve' name='submit' value='" . $book['id']  . "' class=''>reserveren</button>"

        . "</form>";






    echo "</div></div></div></div>";
}
