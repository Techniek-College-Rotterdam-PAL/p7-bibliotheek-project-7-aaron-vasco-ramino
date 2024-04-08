function validateEmail() {
  var emailInput = document.getElementById("email");
  var emailError =
    "Gebruik een geldig emailadres met het domein @student.zadkine.nl of @tcrmbo.nl of student.tcrmbo.nl.";
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

document.addEventListener("DOMContentLoaded", function() {
  // Your code here
  document.getElementById("isbn").addEventListener("change", function() {
      var isbn = this.value;
      fetchBook(isbn);
  });


});


function fetchBook(isbn) {
  var apiKey = "AIzaSyBGPkZ2RXBnBUSoMXT6cFU5W1NW8qSOy-o";
  var url = "https://www.googleapis.com/books/v1/volumes?q=isbn:" + isbn + "&key=" + apiKey;

  fetch(url)
      .then(response => response.json())
      .then(data => {
          displayBook(data);
      })
      .catch(error => console.error(error));
}

function displayBook(data) {
  if (data.totalItems > 0) {
      var book = data.items[0].volumeInfo;
      document.getElementById("title").value = book.title || '';
      document.getElementById("writer").value = (book.authors && book.authors.length > 0) ? book.authors.join(', ') : '';
      document.getElementById("publisher").value = book.publisher || '';
      document.getElementById("release_year").value = book.publishedDate || '';
      document.getElementById("book_information").value = book.description || '';
      // You can update other form fields as needed

  } else {
      console.log("No book found for the provided ISBN.");
  }
}





 