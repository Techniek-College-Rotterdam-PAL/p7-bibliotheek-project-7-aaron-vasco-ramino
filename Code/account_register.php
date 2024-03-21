<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Account aanmaken</title>
</head>

<body>
    <?php
    require 'db.php';

    include 'nav.php';

    ?>
    <form class="createaccount" onsubmit=" return validateEmail()" method="post" action="insert_account.php">
        <h1 class="account">Maak een account</h1>
        <input class="create_account_input" type="text" placeholder="Voornaam" required name="first_name">
        <input class="create_account_input" type="text" placeholder="Achternaam" required name="last name">
        <input class="create_account_input" type="Email" placeholder="Email" required name="email" id="email">
        <input class="create_account_input" type="password" placeholder="Wachtwoord" required name="password">

        <input class="submit_account" type="submit" value="Account aanmaken" name="submit">

    </form>




<?php include 'footer.php'; ?>
    <script src="main.js"></script>

</body>

</html>