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
        $searchParam = "%$query%";
        $stmt->bindParam(':query_title', $searchParam, PDO::PARAM_STR);
        $stmt->bindParam(':query_writer', $searchParam, PDO::PARAM_STR);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}

$searchHandler = new Searchhandler($conn);

if(isset($_POST['search'])) {
    $searchTerm = $_POST['search']; 
    $searchResults = $searchHandler->search($searchTerm); 

    if ($searchResults) {
        foreach ($searchResults as $row) {
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
