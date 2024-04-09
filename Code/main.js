
// email validatie en error bericht
function validateEmail() {
  var emailInput = document.getElementById("email");
  var emailError = "Gebruik een geldig emailadres met het domein @student.zadkine.nl of @tcrmbo.nl of student.tcrmbo.nl.";
  var allowedDomains = ["student.zadkine.nl", "tcrmbo.nl", "student.tcrmbo.nl"];

  var email = emailInput.value.trim().toLowerCase();
  var domain = email.split("@")[1];

  if (allowedDomains.indexOf(domain) === -1) {
    emailError = alert(
      "Gebruik een geldig emailadres met het domein @student.zadkine.nl of @tcrmbo.nl of @student.tcrmbo.nl."
    );
    return false;
  } else {
    return true;
  }
}

// wachtwoord validatie en error bericht
function Getparameterbyname(name, url) {
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
  return DecodeURIComponent(results[2].replace(/\+/g, " "));
}

// haal de error parameter op en decodeer deze 
var errormessage = Getparameterbyname('error');

// als er een error is, decodeer deze en zet deze in de error div
if (errormessage) {
  errormessage = DecodeURIComponent(errormessage);
  var errordiv = document.querySelector('.email_password_error');
  errordiv.textContent = errormessage;
}





   