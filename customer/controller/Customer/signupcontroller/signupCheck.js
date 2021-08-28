function valName() {
  var valFirstName = document.getElementById("firstname").value;
  var valLastName = document.getElementById("lastname").value;

  if (valFirstName.trim() == "") {
    document.getElementById("fnameError").innerHTML = "Field is Empty";
    return false;
  } else if (valLastName.trim() == "") {
    document.getElementById("lnameError").innerHTML = "Field is Empty";
    document.getElementById("fnameError").innerHTML = "";
    return false;
  } else {
    document.getElementById("lnameError").innerHTML = "";
    document.getElementById("fnameError").innerHTML = "";
    return true;
  }
}

function valUname() {
  var valUname = document.getElementById("uname").value;
  var unameError = document.getElementById("unameError");
  if (valUname.trim() == "") {
    document.getElementById("unameError").innerHTML = "Field is Empty";
    return false;
  } else if (valUname.length < 4) {
    document.getElementById("unameError").innerHTML =
      "At least five character needed";
    return false;
  } else {
    document.getElementById("unameError").innerHTML = "";
    return true;
  }
}

function valPhone() {
  var valPhone = document.getElementById("phone").value;
  var phoneError = document.getElementById("phoneError");

  if (valPhone.length < 8 || valPhone.length > 14) {
    phoneError.innerHTML = "Not a valid phone number";
    return false;
  } else {
    phoneError.innerHTML = "";
    return true;
  }
}

function valEmail() {
  var valEmail = document.getElementById("email").value;
  var emailError = document.getElementById("emailError");
  if (valEmail.trim() !== "") {
    var parts = valEmail.split("@");
    var dot = parts[1].indexOf(".");
    if (dot == -1) {
      emailError.innerHTML = "Invalid Email address";
      return false;
    } else {
      emailError.innerHTML = "";
      return true;
    }
  } else if (valEmail.trim() == "") {
    emailError.innerHTML = "Field is empty";
    return false;
  } else {
    emailError.innerHTML = "";
    return true;
  }
}

function valPass() {
  var valPass1 = document.getElementById("pass1").value;
  var valPass2 = document.getElementById("pass2").value;
  var passError1 = document.getElementById("passError1");
  var passError2 = document.getElementById("passError2");
  if (valPass1.length < 4) {
    passError1.innerHTML = "At least 4 charecter password required";
    return false;
  }
  if (valPass1 !== valPass2 && valPass1.length < 6) {
    passError2.innerHTML = "Password is not matched";
    return false;
  }
  if (valPass1 !== valPass2 && valPass1.length >= 6) {
    passError1.innerHTML = "";
    passError2.innerHTML = "Password is not matched";
    return false;
  } else {
    passError1.innerHTML = "";
    passError2.innerHTML = "";
    return true;
  }
}

function validate() {
  valName();
  valUname();
  valPhone();
  valEmail();
  valPass();

  if (valName() && valUname() && valPhone() && valEmail() && valPass()) {
    return true;
  } else {
    return false;
  }
}
