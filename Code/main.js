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

document
  .getElementById("search-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const searchInput = document.getElementById("search-input");
    const searchTerm = searchInput.value.trim();

    if (searchTerm.length < 3) {
      alert("Zoekterm moet minstens 3 tekens lang zijn.");
      return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("GET", `search.php?q=${searchTerm}`, true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        const searchResults = document.getElementById("search-results");
        searchResults.innerHTML = xhr.responseText;
      } else {
        console.error(
          "Er is iets fout gegaan bij het ophalen van de zoekresultaten."
        );
      }
    };
    xhr.send();
  });

document.getElementById("navbar-toggle").addEventListener("click", function () {
  const navbarItems = document.getElementById("navbar-items");
  navbarItems.classList.toggle("show");
});
