<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="../Code/main.css">
    <script src="../Code/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Search functie voor de boeken
    $(document).ready(function() {
        // Zoekfunctie voor de boeken in de database met behulp van AJAX request
        $('#search').on('input', function(input) {
            // Voorkomt dat de standaard actie van het formulier wordt uitgevoerd
            input.preventDefault();
            // Zoekterm wordt opgehaald
            var searchterm = $(this).val();
            // Als de zoekterm niet leeg is, wordt er een AJAX request gemaakt
            if (searchterm.trim() !== '') {
                // AJAX request
                $.ajax({
                    url: '../books/search.php',
                    method: 'POST',
                    data: {
                        search: searchterm
                    },
                    // De resultaten worden weergegeven in de div met id search-results-docent
                    success: function(response) {
                        $('#search-results-docent').html(response);
                    }
                });
            } else {
                // Als de zoekterm leeg is, wordt de div met id search-results-docent leeg gemaakt
                $('#search-results-docent').html('');
            }
        });
    });
    </script>
</head>

<body>
    <nav class="Navbar_color">
        <ul>
            <li>
                <a href="../Code/index.php"><img src="../Images/deBib_Nav_bar_logo.png" alt="logo" class="logo"></a>
            </li>


            <li>
                <a class="nav_page_link-docent" href="../reserve/student_reserved.php">Gereserveerde boeken</a>
            </li>
            <li>
                <a class="nav_page_link-docent" href="../Code/docent.php">Docent</a>
            </li>
            <li>
                <a class="nav_page_link-docent" href="../books/books_create.php">Boeken-aanmaken</a>
            </li>
            <form class="searchbar-docent" id="searchform" name="searchform" method="post" action="../books/search.php">
                <input type="search" name="search" id="search" placeholder="Search..">
                <input type="submit" value="Search" class="search-button">
                <div class="searchresults-docent" id="search-results-docent"></div>
            </form>

            <li>
                <a class="nav_page_link-login-docent" href="../books/books_available.php">Boeken</a>

            <li>
                <a class="nav_page_link-login-docent" href="../Code/login.php">Inloggen</a>
            </li>
            <li>
                <a class="nav_page_link-login-docent" href="../Code/account_register.php">Registeren</a>
            </li>



        </ul>
    </nav>



</body>
</html>