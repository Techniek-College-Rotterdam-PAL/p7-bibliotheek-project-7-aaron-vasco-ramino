<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <nav class="Navbar_color">
        <ul>
            <li>
                <a href="index.php"><img src="../Images/deBib_Nav_bar_logo.png" alt="logo" class="logo"></a>
            </li>


            <li>
                <a class="nav_page_link" href="books_create.php">Reserveer Een Boek</a>
            </li>
            <li>
                <a class="nav_page_link" href="books.php">Boeken</a>
            </li>

            <li class="searchbar">
                <input type="search" name="search" id="search" placeholder="Search..">
            </li>
            <li>
                <a class="nav_page_link-login" href="login.php">Inloggen</a>
            </li>
            <li>
                <a class="nav_page_link-register" href="account_register.php">Registeren</a>
            </li>



        </ul>
    </nav>


    <script src="main.js"></script>
</body>

</html>