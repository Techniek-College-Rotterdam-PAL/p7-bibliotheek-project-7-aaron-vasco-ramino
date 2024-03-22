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


<h1 class="main-page">Welkom bij de Bib!</h1> 


<h2 class="main-page">Wie zijn wij?</h2>
<p class="main-page">
De Bib is een Bibliotheek die schoolboeken uitleent aan studenten <br>
die door financiele redenen geen boeken kunnen aanschaffen.<br>
Wij hebben  meer dan honderd boeken van verschillende schoolvakken<br>
  op voorraad, zoals Nederlands, wiskunde, programmeren enz. 

</p>








    <?php
    include 'footer.php';
    ?>
</body>

</html>

<?php

session_destroy();

?>