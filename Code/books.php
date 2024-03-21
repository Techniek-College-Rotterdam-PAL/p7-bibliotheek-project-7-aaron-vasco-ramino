<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>

<body>
    <?php
  require_once 'db.php';
   include 'nav.php';
   include 'session_function.php';

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
               
                    $book['titel']  .   
                 "<div>ISBN: "  .   $book['isbn'] . "</div>"  . "<br>" .
                    $book['schrijver'] . "<br>" .
                    $book['uitgever'] .  "<br>" .
                    $book['boekjaar'] .  "<br>";

    if (!empty($book['img'])) {
        $imagePath = $book['img'];
        echo '<img src="upload/' . $imagePath . '" width="100" height="100" class="book_image"><br>';
    }

    echo $book['informatie_boek'];

    echo "</div></div>"; 
}
?>




<script src="main.js"></script>

</body>
</html>