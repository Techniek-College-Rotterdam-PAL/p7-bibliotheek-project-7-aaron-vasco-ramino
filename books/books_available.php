<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Code/main.css">
    <title>Document</title>
</head>
<body>
    <?php 
        // bestand voor navigatiebalk
      include '../Code/nav_docent.php';

      // bestand voor sessie
      require_once '../account/session_function_docent.php';

      // bestand voor database connectie
      require_once '../Code/db.php';
      
      // Definieer de Update_available-klasse
      class Update_available{
        // Eigenschappen van de klasse
          private $conn;
          

          // Constructor methode om de eigenschappen van de klasse in te stellen
          public function __construct($conn){
              $this->conn = $conn; 
          }
          
          // Methode om gegevens in de database te selecteren
          public function Update_available_books(){
              $query = "SELECT * FROM boeken";
              $stmt = $this->conn->prepare($query);
              $stmt->execute();
              return $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
      }
      
      // Maak een object van de klasse Update_available aan en roep de methode Update_available_books aan
      $booksupdate = new Update_available($conn);
      $books = $booksupdate->Update_available_books();
      
   
      // Loop door de gegevens en geef deze weer
    foreach ($books as $book) {
    echo "<div class='book_container'>" .  
        "<div class='books'>" .
         "Titel:" . " " . $book['titel'] . "<br>" .    
        "Isbn:" . " " . $book['isbn'] . "<br>" .
        "Schrijver:" . " " .  $book['schrijver'] . "<br>" .
        "Uitgever:" . " " . $book['uitgever'] .  "<br>" .
         "Boekjaar:" . " " .$book['boekjaar'] .  "<br>";

    if (!empty($book['img'])) {
        $imagepath = $book['img'];
        echo '<img src="../Code/upload/' . $imagepath . '" width="100" height="100" class="img_reserve" alt="img_book"><br>';
    }
    
    
    echo  "Beschikbaarheid: " . ($book['beschikbaarheid'] ? 'Beschikbaar' : 'Niet-beschikbaar') . "<br>";
    echo  "<form method='post' action='../books/update_books_available.php'>" . 
    "<button class='button_update_available'  type='submit' name='submit' value='" . $book['id']   . "'>Beschikbaarheid</button>";
    "</form>";

    echo "</div></div>"; 
}

?>

    
</body>
</html>