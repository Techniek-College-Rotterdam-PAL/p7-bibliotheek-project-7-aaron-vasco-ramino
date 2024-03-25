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
        $sqlTitle = "SELECT * FROM boeken WHERE titel LIKE :query_title";
        $stmtTitle = $this->conn->prepare($sqlTitle);
        $searchParamTitle = "%$query%";
        $stmtTitle->bindParam(':query_title', $searchParamTitle, PDO::PARAM_STR);
        $stmtTitle->execute();
        $resultsTitle = $stmtTitle->fetchAll(PDO::FETCH_ASSOC);
    
        $sqlWriter = "SELECT * FROM boeken WHERE schrijver LIKE :query_writer";
        $stmtWriter = $this->conn->prepare($sqlWriter);
        $searchParamWriter = "%$query%";
        $stmtWriter->bindParam(':query_writer', $searchParamWriter, PDO::PARAM_STR);
        $stmtWriter->execute();
        $resultsWriter = $stmtWriter->fetchAll(PDO::FETCH_ASSOC);
    
     
        $results = array_merge($resultsTitle, $resultsWriter);
    
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
            echo "<p>{$row['titel']}</p>";
            echo "<p>{$row['schrijver']}</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
}
?>
