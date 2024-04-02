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
                var searchterm = $(this).val();
                if (searchterm.trim() !== '') {
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {
                            search: searchterm
                        },
                        success: function(response) {
                            $('#search-results').html(response);
                        }
                    });
                } else {
                    $('#search-results').html('');
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
                <a class="nav_page_link" href="docent.php">Docent</a>
            </li>
            <li>
                <a class="nav_page_link" href="books.php">Boeken</a>
            </li>
            <form class="searchbar" id="searchform" name="searchform" method="post" action="search.php">
                <input type="search" name="search" id="search" placeholder="Search..">
                <input type="submit" value="Search" class="search-button">
                <div class="searchresults" id="search-results"></div>
            </form>

            <li>
                <a class="nav_page_link-login" href="login.php">Inloggen</a>
            </li>
            <li>
                <a class="nav_page_link-login" href="account_register.php">Registeren</a>
            </li>



        </ul>
    </nav>



</body>

</html>