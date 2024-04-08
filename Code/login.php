<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Code/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>


    <?php 

 session_start();

require_once 'db.php';
include 'nav.php';


?>

    <form class="createaccount" onsubmit=" return validateEmail()" method="post" action="../account/select_account.php">
        <h1 class="account">Inloggen</h1>
        <div class="email_password_error" id="email_password_error"></div>
        <input class="create_account_input" type="email" placeholder="Email" required name="email" id="email">
        <input class="create_account_input" type="password" placeholder="Wachtwoord" required name="wachtwoord">
        <input class="submit_account" type="submit" value="Login" name="submit">
    </form>

   
   



   
    <script src="../Code/main.js"></script>

  
</body>
</html>