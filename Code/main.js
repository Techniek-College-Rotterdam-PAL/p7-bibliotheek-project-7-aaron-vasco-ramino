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


function getparameterbyname(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}

var errormessage = getparameterbyname('error');

if (errormessage) {
  errormessage = decodeURIComponent(errormessage);
  var errordiv = document.querySelector('.email_password_error');
  errordiv.textContent = errormessage;
}





   