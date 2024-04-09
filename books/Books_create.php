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
        <input class="create_book_input" type="text" placeholder="Boekjaar" required name="release_year"
            id="release_year">
        <textarea class="create_book_input" cols="100" rows="100" placeholder="Samenvatting" required
            name="book_information" id="book_information"></textarea>
        <input class="create_book_input" type="number" placeholder="Voorraad" required name="amount" id="amount">
        <input class="create_book_input_img" type="file" placeholder="afbeelding" required name="image" id="image">



        <input class="submit_book" type="submit" value="Boek aanmaken" name="submit">
    </form>

    <?php
    include '../Code/footer.php';
    ?>


    <script>

        // laat de javascript pas uitvoeren als de pagina volledig geladen is
        document.addEventListener("DOMContentLoaded", function () {

            // Voeg een eventlistener toe aan het ISBN-veld en kijk of het ISBN is gewijzigd
            document.getElementById("isbn").addEventListener("change", function () {
                var isbn = this.value; // haal de waarde van het ISBN-veld op
                Fetchbook(isbn); // haal de boekgegevens op
            });
        });


        function Fetchbook(isbn) {

            // Definieer de Google Books API-sleutel en de URL
            var apiKey = "AIzaSyBGPkZ2RXBnBUSoMXT6cFU5W1NW8qSOy-o";
            var url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" + isbn + "&key=" + apiKey;

            // haalt de boekgegevens op van de Google Books API
            fetch(url)

                // verwerkt de JSON-reactie
                .then(response => response.json())

                // Roep de functie aan met de krijgen data
                .then(data => {
                    Displaybook(data);
                })
                // Vang fouten op
                .catch(error => console.error(error));
        }

        // Toon de boekgegevens in een formulier
        function Displaybook(data) {

            // Controleer of er boeken zijn gevonden uit het ISBN
            if (data.totalItems > 0) {
                // Haal de boekgegevens op uit de JSON-reactie
                var book = data.items[0].volumeInfo;
                // update html met boekgegevens
                document.getElementById("title").value = book.title || '';
                document.getElementById("writer").value = (book.authors && book.authors.length > 0) ? book.authors.join(', ') : '';
                document.getElementById("publisher").value = book.publisher || '';
                document.getElementById("release_year").value = book.publishedDate || '';
                document.getElementById("book_information").value = book.description || '';

            } else {
                // Geef een foutmelding weer als er geen boek is gevonden
                console.log("No book found for the provided ISBN.");
            }
        }
    </script>
    <script src="../Code/main.js"></script>
</body>

</html>