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
     
      include 'nav_docent.php';
      require_once 'session_function_docent.php';
      require_once 'db.php';
      
      class Update_available{
          private $conn;
      
          public function __construct(){
              $this->conn = (new Database_connect())->Connect(); 
          }
      
          public function Update_available_books(){
              $query = "SELECT * FROM boeken";
              $stmt = $this->conn->prepare($query);
              $stmt->execute();
              return $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
      }
      
      $booksupdate = new Update_available();
      $books = $booksupdate->Update_available_books();
      
   
    foreach ($books as $book) {
    echo "<div class='book_container'>" .  
        "<div class='books'>" .
        $book['titel'] . "<br>" .    
        "ISBN:" . " " . $book['isbn'] . "<br>" .
        $book['schrijver'] . "<br>" .
        $book['uitgever'] .  "<br>" .
        $book['boekjaar'] .  "<br>";

    if (!empty($book['img'])) {
        $imagePath = $book['img'];
        echo '<img src="upload/' . $imagePath . '" width="100" height="100" class="book_image" alt="img_book"><br>';
    }
     
    echo  "Beschikbaarheid: " . ($book['beschikbaarheid'] ? 'Beschikbaar' : 'Niet-beschikbaar') . "<br>";
    echo  "<form method='post' action='update_books_available.php'>" . 
    "<button class='button_update_available'  type='submit' name='submit' value='" . $book['id']   . "'>Beschikbaarheid</button>";
    "</form>";

    echo "</div></div>"; 
}

?>

    
</body>
</html>