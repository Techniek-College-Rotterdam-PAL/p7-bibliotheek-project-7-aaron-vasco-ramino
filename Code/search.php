<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>

 <?php

require_once "db.php";




class Searchhandler {
    private $conn;

    public function __construct($conn) {
        $this->conn =  (new Database_connect())->Connect();
    }

    public function search($query) {
        $sql = "SELECT * FROM boeken WHERE titel LIKE :query_title OR schrijver LIKE :query_writer";
        $stmt = $this->conn->prepare($sql);
        $searchparam = "%$query%";
        $stmt->bindParam(':query_title', $searchparam, PDO::PARAM_STR);
        $stmt->bindParam(':query_writer', $searchparam, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}

$searchhandler = new Searchhandler($conn);

if(isset($_POST['search'])) {
    $searchterm = $_POST['search']; 
    $searchresults = $searchhandler->search($searchterm); 

    if ($searchresults) {
        foreach ($searchresults as $row) {
            echo "<div class='result'>";
            echo  "<p>Titel: {$row['titel']}</p>";
            echo "<p> Schrijver: {$row['schrijver']}</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
}
?>
