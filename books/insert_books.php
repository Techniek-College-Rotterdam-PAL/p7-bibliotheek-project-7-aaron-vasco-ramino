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
include '../account/session_function_docent.php';
 

class Books_create {
    private $title;
    private $isbn;
    private $writer;
    private $publisher;
    private $release_year;
    private $book_information;
    private $image;
    private $storage;
    private $conn;


    public function __construct($title, $isbn, $writer, $publisher, $release_year, $book_information, $image, $storage){
        $this->title = $title;
        $this->isbn = $isbn;
        $this->writer = $writer;
        $this->publisher = $publisher;
        $this->release_year = $release_year;
        $this->book_information = $book_information;
        $this->image = $image;
        $this->storage = $storage;
       
        $this->conn = (new Database_connect())->Connect();
    }

    public function Insertbooks(){
        $query = "INSERT INTO boeken (titel, isbn, schrijver, uitgever, boekjaar, informatie_boek, img, voorraad) VALUES (:title, :isbn, :writer, :publisher, :release_year, :book_information, :image, :storage)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':isbn', $this->isbn);
        $stmt->bindParam(':writer', $this->writer);
        $stmt->bindParam(':publisher', $this->publisher);
        $stmt->bindParam(':release_year', $this->release_year);
        $stmt->bindParam(':book_information', $this->book_information);
        $stmt->bindParam(':image', $this->image['name']);
        $stmt->bindParam(':storage', $this->storage);

       
        $img_upload = "../Code/upload/";
        $targetFilePath = $img_upload . basename($_FILES["image"]["name"]);
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

       
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                
                $stmt->execute();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    }
}

if(isset($_POST['submit'])){
    $title = strip_tags($_POST['title']);
    $isbn = strip_tags($_POST['isbn']);
    $writer = strip_tags($_POST['writer']);
    $publisher = strip_tags($_POST['publisher']);
    $release_year = strip_tags($_POST['release_year']);
    $book_information = strip_tags($_POST['book_information']);
    $storage = strip_tags($_POST['amount']);
    $image = $_FILES['image'];

    $books = new Books_create($title, $isbn, $writer, $publisher, $release_year, $book_information, $image, $storage);
    $books->Insertbooks();
}


header("Location: ../books/Books_available.php");
exit;

?>



</body>

</html>