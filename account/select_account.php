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
// bestand voor database connectie
require_once '../Code/db.php';

session_start();


// Definieer de Select_data_account-klasse
class Select_data_account {
    // Eigenschappen van de klasse
    private $email;
    private $wachtwoord;
    private $conn;
    public $loginsuccess;


   // Constructor methode om de eigenschappen van de klasse in te stellen
   public function __construct($email, $wachtwoord, $conn){
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
        $this->conn = $conn;
        $this->loginsuccess = false; 
    }
    // Methode om gegevens uit de database te selecteren
    public function Select(){
        $query = "SELECT * FROM account WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
    
        $found = false; 
        // Loop door de resultaten van de query
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($this->wachtwoord, $row['wachtwoord'])) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['voornaam'] = $row['voornaam'];
                $_SESSION['achternaam'] = $row['achternaam'];
                $_SESSION['id'] = $row['id'];
                $found = true; 
                break;
            }
        }
       // Als de gegevens overeenkomen, wordt de gebruiker doorgestuurd naar de boekenpagina
        if ($found) {
            $this->loginsuccess = true; 
        } else {
              // Als de gegevens niet overeenkomen, wordt de gebruiker doorgestuurd naar de loginpagina met een foutmelding
            $error_message = urlencode("Wachtwoord of email is onjuist");
            header("Location: ../Code/login.php?error={$error_message}");
            exit();
        }
    }
    
        
      } 
    
// Als het formulier is ingediend, worden de gegevens opgehaald en wordt de Select_data_account-klasse aangeroepen om de gegevens uit de database te selecteren
if(isset($_POST['submit'])){
    $email = strip_tags($_POST['email']);
    $wachtwoord = strip_tags($_POST['wachtwoord']);

    $select = new Select_data_account($email, $wachtwoord, $conn);
    $select->Select();

    if ($select->loginsuccess) {
        header("Location:../books/books.php");
        exit();
    }
}




?>

<script src="../Code/main.js"></script>

</body>
</html>