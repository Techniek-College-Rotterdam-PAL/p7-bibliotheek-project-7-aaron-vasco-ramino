
<?php
// // include database connection
require_once '../Code/db.php';


 // Definieer de Insert_data_account-klasse
class Insert_data_account{
   // Eigenschappen van de klasse
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $conn;

   
  // Constructor methode om de eigenschappen van de klasse in te stellen
   public function __construct($first_name, $last_name, $email, $password, $conn){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->conn = $conn; 

    }
    // Methode om gegevens in de database in te voegen
    public function Insert(){
        // Query om gegevens in de database in te voegen
        $query = "INSERT INTO account (voornaam, achternaam, email, wachtwoord) VALUES (:voornaam, :achternaam, :email, :password)";
        $stmt = $this->conn->prepare($query); // Bereid de query voor
        $stmt->bindParam(':voornaam', $this->first_name);
        $stmt->bindParam(':achternaam', $this->last_name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();

        
    }

} 


// Als het formulier is ingediend, worden de gegevens opgehaald en wordt de Insert_data_account-klasse aangeroepen om de gegevens in de database toe te voegen
if(isset($_POST['submit'])){
    $first_name = strip_tags($_POST['first_name']);
    $last_name = strip_tags($_POST['last_name']);
    $email = strip_tags($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $account = new Insert_data_account($first_name, $last_name, $email, $password, $conn);
    $account->Insert();
    
    

}
// Als de gegevens zijn toegevoegd aan de database, wordt de gebruiker doorgestuurd naar de loginpagina
header("Location: ../Code/login.php");
exit();



?>
    

