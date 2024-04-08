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
    include '../Code/nav_docent.php';
    include '../account/session_function_docent.php';
    ?>

    <form class="create_book" method="post" action="../books/insert_books.php" enctype="multipart/form-data">
        <h1 class="account">Nieuw boek toevoegen</h1>
        <input class="create_account_input" placeholder="Titel" required name="title" id="title">
        <div name=""></div>
        <input class="create_book_input" type="text" placeholder="Isbn" required name="isbn" id="isbn">
        <input class="create_book_input" type="text" placeholder="Schrijver" required name="writer" id="writer">
        <input class="create_book_input" type="text" placeholder="Uitgever" required name="publisher" id="publisher">
        <input class="create_book_input" type="text" placeholder="Boekjaar" required name="release_year" id="release_year">
        <textarea class="create_book_input" cols="100" rows="100" placeholder="Samenvatting" required name="book_information" id="book_information"></textarea>
        <input class="create_book_input" type="number" placeholder="Voorraad" required name="amount" id="amount">
        <input class="create_book_input_img" type="file" placeholder="afbeelding" required name="image" id="image" > 



        <input class="submit_book" type="submit" value="Boek aanmaken" name="submit">
    </form>

    <?php
    include '../Code/footer.php';
    ?>

    <script src="../Code/main.js"></script>
</body>

</html>