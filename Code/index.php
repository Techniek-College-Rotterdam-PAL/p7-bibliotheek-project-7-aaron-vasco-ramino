<?php
// start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Code/main.css">
    <title>Document</title>
</head>
<body>

 <?php 
 // include the navigation bar
 include '../Code/nav.php'; 
 ?>

    <div class="picture_with_text">
    <img src="../Images/bibliotheek.jpg" alt="foto van een boekenkast" width="100%" height="500px">
    </div>


<h1 class="main-page">Welkom bij de Bib!</h1> 
<div class="index-image">
<img src="../Images/cartoon-bibliotheek.jpg" alt="boeken in een kast" height="390px" width="700px">
</div>
<h2 class="main-page">Wie zijn wij?</h2>
<p class="main-page">
Soms kan het zijn dat door financiele redenen een student zijn boeken niet<br>
 kan aanschaffen. hier zijn soms wel zogenaamde ‘potjes’ voor maar de aanvraag<br>
  hiervan kan lang duren of soms voldoet een student net niet aan de eisen. <br>
Hierdoor is de Bib ontstaan. De Bib is een digitale administratie website met<br>
 een fysieke bibliotheek die schoolboeken uitleent aan studenten die door <br>
 financiele redenen geen boeken kunnen aanschaffen.  Wij hebben  meer dan <br>
 honderd schoolboeken op voorraad zoals Nederlands, wiskunde, programmeren,<br>
burgerschap etc.<br><br>
Zoek jij geen schoolboeken? dan kun jij op onze bibliotheek <br>
normale boeken uitleenen van verschillende genres zoals drama,<br>
thrillers, misdaad, poëzie en nog veel meer! 
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

<div class="contact-address-row">
<div class="contact-address">
<h2 class="contact-title">Contactgegevens</h2>
<p> 
Heb jij vragen over hoe jij bijvoorbeeld een boek<br>
 moet reserveren of een account kan aanmaken? <br>
 Dan kun jij ons bereiken via telefoon of email<br><br>
Email: debib@contact.nl<br>
Telefoonnummer: +31 683451790
</p>
</div>

<div class="contact-address">
<h2 class="contact-title">Adres</h2>
<p>
Hoogstraat 110<br>
3011 PV Rotterdam
</p>
</div>
</div>

 <?php 
 // include the footer
 include 'footer.php'; ?>
</body>
</html>

<?php
// destroy the session
session_destroy();

?>