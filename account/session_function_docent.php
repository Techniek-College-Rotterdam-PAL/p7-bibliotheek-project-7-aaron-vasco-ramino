<?php

// Start de sessie
session_start();


// Functie om te controleren of de gebruiker toegang heeft
function Hasaccess($email) {
    $domain = strtolower(substr(strrchr($email, "@"), 1));
    $targetdomain = 'tcrmbo.nl';
    return strtolower($domain) === strtolower($targetdomain);
}

// Als de gebruiker niet is ingelogd, wordt deze doorgestuurd naar de inlogpagina
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Haal de e-mail van de gebruiker op uit de sessie
$email = $_SESSION['email'];

// Als de gebruiker geen toegang heeft, wordt deze doorgestuurd naar de toegangsweigeringpagina
if (!Hasaccess($email)) {
    header('Location: ../account/access_denied.php');
    exit();
}

// definiëren van de klasse Session
class Session {
     // Constructor methode om de eigenschappen van de klasse in te stellen
    public function __construct() {

        $this->start();
    }
    
    // Methode om de sessie te starten
    public function start() {
        if(isset($_SESSION['email'])){
            echo "<div class='session'>Ingelogd als " . $_SESSION['email'] . "</div>";
            "<div class='session'>Ingelogd als " . $_SESSION['voornaam'] . "</div>";
            "<div class='session'>Ingelogd als " . $_SESSION['achternaam'] . "</div>";
             "<div class='session'>Ingelogd als " . $_SESSION['id'] . "</div>";
        } else {
            echo "<div class='session'>Niet ingelogd</div>";
            header('Location: ../Code/login.php');
            exit();
        }
    }
}

$session = new Session();

?>