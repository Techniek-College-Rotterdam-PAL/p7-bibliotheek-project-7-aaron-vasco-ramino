<?php

require_once 'db.php';
include 'session_function_docent.php';

class Delete_reserved_Update_stock{
    private $conn;
    private $id;
   


    public function __construct($conn, $id){
        $this->conn = (new Database_connect())->Connect();
        $this->id = $id;
      

    }

    public function Update_stock_Delete_reserved(){
        $query = "SELECT boek_id FROM reserveren WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $book_id = $stmt->fetch(PDO::FETCH_ASSOC);


        $query = "DELETE FROM reserveren WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        $query = "UPDATE boeken SET voorraad = voorraad + 1 WHERE id = :book_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':book_id', $book_id['boek_id']);
        $stmt->execute();

        header('Location: delete_reserved_succes.php');
}

}

if (isset($_POST['submit_book'])) {
    $id = $_POST['submit_book'];


    $delete = new Delete_reserved_Update_stock($conn, $id);
    $delete->Update_stock_Delete_reserved();
}


?>
