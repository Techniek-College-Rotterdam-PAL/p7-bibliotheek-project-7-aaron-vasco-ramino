<?php

session_start();

function Hasaccess($email) {
    $domain = strtolower(substr(strrchr($email, "@"), 1));
    $targetdomain = 'tcrmbo.nl';
    return strtolower($domain) === strtolower($targetdomain);
}


if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];

if (!Hasaccess($email)) {
    header('Location: ../account/access_denied.php');
    exit();
}

class Session {
    public function __construct() {
        $this->start();
    }

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


