<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>

</head>


<body>



    <?php include 'nav.php';?>

    <div class="picture_with_text">
    <img src="../Images/bibliotheek.jpg" alt="foto van een boekenkast" width="100%" height="500px">
    </div>


<h1 class="main-page">Welkom!</h1> 









    <?php
    include 'footer.php';
    ?>
</body>

</html>

<?php

session_destroy();

?>