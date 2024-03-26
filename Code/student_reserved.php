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

    class Reservedbooks{
        private $conn;
          
        public function __construct($conn){
            $this->conn = $conn; 
        }
    
        public function Selectreservedbooks(){
            $query = "SELECT * FROM reserveren";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
   
    $reservedbooks = new Reservedbooks($conn);
    $reservedBooksArray = $reservedbooks->Selectreservedbooks();
    
    foreach ($reservedBooksArray as $reservedbook) {

        
        echo "<div> Voornaam: " . $reservedbook['voornaam'] . "</div><div> Achternaam: " .  $reservedbook['achternaam'] . "</div>" .  
             "<div>" . $reservedbook['titel'] . "</div>" .
             "<div>" . $reservedbook['time'] . "</div>";
    }
    

    
    



    
    

    ?>

</body>

</html>