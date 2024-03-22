function validateEmail() {
  var emailInput = document.getElementById("email");
  var emailError =
    "Gebruik een geldig emailadres met het domein @student.zadkine.nl of @tcrmbo.nl.";
  var allowedDomains = ["student.zadkine.nl", "tcrmbo.nl"];

  var email = emailInput.value.trim().toLowerCase();
  var domain = email.split("@")[1];

  if (allowedDomains.indexOf(domain) === -1) {
    emailError = alert(
      "Gebruik een geldig emailadres met het domein @student.zadkine.nl of @tcrmbo.nl."
    );
    return false;
  } else {
    return true;
  }
}
document.addEventListener("DOMContentLoaded", function () {
  const navbarToggle = document.getElementById("navbar-toggle");
  const navbarItems = document.getElementById("navbar-items");

  navbarToggle.addEventListener("click", function () {
    navbarItems.classList.toggle("active");
  });
});
