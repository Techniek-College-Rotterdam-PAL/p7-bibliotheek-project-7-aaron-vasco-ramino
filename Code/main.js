
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
document.addEventListener("DOMContentLoaded", function () {
  // wachtwoord validatie en error bericht
  function getparameterbyname(name, url) {
    // als er geen url is, gebruik de huidige url
    if (!url) url = window.location.href;
    // naam van de parameter escapen
    name = name.replace(/[\[\]]/g, "\\$&");
    // regex om de parameter te vinden
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
    // als er geen resultaten zijn, return null
    if (!results) return null;
    // als er geen resultaten zijn, return ''
    if (!results[2]) return '';
    // decodeer de parameter en return deze als string 
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





