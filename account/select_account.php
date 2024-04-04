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
require_once '../Code/db.php';

session_start();



class Select_data_account {
    private $email;
    private $wachtwoord;
    private $conn;
    public $loginsuccess;

   public function __construct($email, $wachtwoord, $conn){
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
        $this->conn = $conn;
        $this->loginsuccess = false; 
    }

    public function Select(){
        $query = "SELECT * FROM account WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
    
        $found = false; 
    
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
    
        if ($found) {
            $this->loginsuccess = true; 
        } else {
            
            $error_message = urlencode("Wachtwoord of email is onjuist");
            header("Location: ../Code/login.php?error={$error_message}");
            exit();
        }
    }
    
        
      } 
    




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