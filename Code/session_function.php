<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
<?php

class Session {
 function __construct() {
  $this->start();
}

 function start() {
  session_start();
  if(isset($_SESSION['email'])){
      echo "<div class='session'>Ingelogd als " . $_SESSION['email'] . "</div>";
  } else {
      echo "<div class='session'>Niet ingelogd</div>";
      header('Location: login.php');
      exit();
  }
}
}

$session = new Session();


 


?>
    
    
</body>
</html>