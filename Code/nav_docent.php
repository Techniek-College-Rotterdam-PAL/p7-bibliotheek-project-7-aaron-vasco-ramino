<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="main.css">
    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#search').on('input', function(e) {
            e.preventDefault();
            var searchTerm = $(this).val();
            if (searchTerm.trim() !== '') {
                $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: {
                        search: searchTerm
                    },
                    success: function(response) {
                        $('#search-results-docent').html(response);
                    }
                });
            } else {
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
                <a href="index.php"><img src="../Images/deBib_Nav_bar_logo.png" alt="logo" class="logo"></a>
            </li>


            <li>
                <a class="nav_page_link-docent" href="student_reserved.php">gereserveerde boeken</a>
            </li>
            <li>
                <a class="nav_page_link-docent" href="docent.php">Docent</a>
            </li>
            <li>
                <a class="nav_page_link-docent" href="books_create.php">Boeken-aanmaken</a>
            </li>
            <form class="searchbar-docent" id="searchform" name="searchform" method="post" action="search.php">
                <input type="search" name="search" id="search" placeholder="Search..">
                <input type="submit" value="Search" class="search-button">
                <div class="searchresults-docent" id="search-results-docent"></div>
            </form>

            <li>
                <a class="nav_page_link-login-docent" href="books_available.php">boeken</a>

            <li>
                <a class="nav_page_link-login-docent" href="login.php">Inloggen</a>
            </li>
            <li>
                <a class="nav_page_link-login-docent" href="account_register.php">Registeren</a>
            </li>



        </ul>
    </nav>



</body>

</html>