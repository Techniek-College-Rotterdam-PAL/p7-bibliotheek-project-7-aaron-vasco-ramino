
<?php

require_once 'db.php';


 
class Insert_data_account{

    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $conn;

   public function __construct($first_name, $last_name, $email, $password){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->conn = (new Database_connect())->Connect();

    }

    public function insert($first_name, $last_name, $email, $password){

        $query = "INSERT INTO account (voornaam, achternaam, email, wachtwoord) VALUES (:voornaam, :achternaam, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':voornaam', $this->first_name);
        $stmt->bindParam(':achternaam', $this->last_name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();

        
    }

} 

if(isset($_POST['submit'])){
    $first_name = strip_tags($_POST['first_name']);
    $last_name = strip_tags($_POST['last_name']);
    $email = strip_tags($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $account = new Insert_data_account($first_name, $last_name, $email, $password);
    $account->insert($first_name, $last_name, $email, $password);
    
    

}

header("Location: login.php");
exit();



?>
    

