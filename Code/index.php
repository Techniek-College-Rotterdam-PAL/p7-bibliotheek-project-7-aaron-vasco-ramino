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
Wij hebben  meer dan honderd schoolboeken<br>
  op voorraad zoals Nederlands, wiskunde, programmeren etc.
</p>

<h2 class="main-page">Wat te doen</h2>
<p class="main-page">
Bij de bib kun je boeken die je nodig hebt voor school lenen, ook hebben wij<br>
 andere boeken beschikbaar als jij schoolboeken niet nodig hebt, je kunt met de<br>
zoekbalk zoeken naar meer dan honderd titels. Is er een boek die je nodig hebt voor <br>
school of leuk vindt? Dan kan je deze reserveren, maar eerst moet jij inloggen of <br>
een account aanmaken als jij nog geen account hebt voordat jij een van onze boeken<br>
 mag reserveren.

</p>

<h2 class="main-page">Contact</h2>
<p class="main-page">
Heb jij vragen over hoe jij bijvoorbeeld een boek moet reserveren, of een<br>
account kan aanmaken? Dan kun jij ons bereiken via telefoon of email<br>
<br>
Email: debib@contact.nl<br>
Telefoonnummer: +31 683451790



</p>










    <?php
    include 'footer.php';
    ?>
</body>

</html>

<?php

session_destroy();

?>