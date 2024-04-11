
// email validatie en error bericht
function validateEmail() {
  // haal input veld op en zet deze in een variabele 
  var emailInput = document.getElementById("email");
  // error bericht als het emailadres niet geldig is 
  var emailError = "Gebruik een geldig emailadres met het domein @student.zadkine.nl of @tcrmbo.nl of student.tcrmbo.nl.";
  // array met toegestane domeinen
  var allowedDomains = ["student.zadkine.nl", "tcrmbo.nl", "student.tcrmbo.nl"];

  // haal de email op en zet deze in een variabele  
  var email = emailInput.value.trim().toLowerCase();
  // haal het domein op en zet deze in een variabele
  var domain = email.split("@")[1];

  // als het emailadres niet geldig is, geef een error bericht en return false
  if (allowedDomains.indexOf(domain) === -1) {
    emailError = alert(
      "Gebruik een geldig emailadres met het domein @student.zadkine.nl of @tcrmbo.nl of @student.tcrmbo.nl."
    );
    return false;
  } else {
    return true;
  }
}

// Wacht tot het DOM geladen is
document.addEventListener("DOMContentLoaded", function () {
  // Functie voor het ophalen van een queryparameter uit een URL
  function getparameterbyname(name, url) {
    // Als geen URL is opgegeven, gebruik de huidige URL
    if (!url) url = window.location.href;
    
    // Escapen van speciale tekens in de parameter naam
    name = name.replace(/[\[\]]/g, "\\$&");
    
    // Regex om de parameter in de URL te vinden
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)");
    
    // Uitvoeren van de regex op de URL
    var results = regex.exec(url);
    
    // Als er geen resultaten zijn gevonden, retourneer null
    if (!results) return null;
    
    // Als de parameterwaarde leeg is, retourneer ''
    if (!results[2]) return '';
    
    // Decoderen van de parameterwaarde en retourneren als string 
    return decodeURIComponent(results[2].replace(/\+/g, " "));
  }




  // haal de error parameter op en decodeer deze 
  var errormessage = getparameterbyname('error');

  // als er een error is, decodeer deze en zet deze in de error div
  if (errormessage) {
    errormessage = decodeURIComponent(errormessage);
    var errordiv = document.getElementById('email_password_error');
    errordiv.innerHTML = errormessage;
  }

});





