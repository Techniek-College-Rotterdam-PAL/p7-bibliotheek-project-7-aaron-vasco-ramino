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

<img src="../Images/bibliotheek.jpg" width="100%" length="300px"alt="foto van een boekenkast">

    <?php include 'nav.php';?>

    







    <?php
    include 'footer.php';
    ?>
</body>

</html>

<?php

session_destroy();

?>