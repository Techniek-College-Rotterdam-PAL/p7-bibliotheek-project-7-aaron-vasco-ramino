<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php 

require_once 'db.php';
include 'nav.php';
?>

    <form class="create_book" method="post" action="insert_books.php" enctype="multipart/form-data">
        <h1 class="account">Nieuw boek toevoegen</h1>
        <input class="create_account_input"  placeholder="titel" required name="title" id="title">
        <div name=""></div>
        <input class="create_book_input" type="text" placeholder="isbn" required name="isbn">
        <input class="create_book_input" type="text" placeholder="schrijver" required name="writer">
        <input class="create_book_input" type="text" placeholder="uitgever" required name="publisher">
        <input class="create_book_input" type="text" placeholder="boekjaar" required name="release_year">
        <textarea class="create_book_input" cols="100" rows="100"placeholder="Samenvatting" required name="book_information"></textarea>
        <input class="create_book_input_img" type="file" placeholder="afbeelding" required name="image">
    
    
          <input class="submit_book" type="submit" value="toevoegen" name="submit">
    </form>

    <?php
         include 'footer.php';
    ?>

    <script src="main.js"></script>
</body>

</html>