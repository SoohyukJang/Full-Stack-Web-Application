// Email

let userEmail = document.getElementById("email");

userEmail.onkeyup = function emailVerification() {
  let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  if (userEmail.value.match(pattern)) {
      document.querySelector('#emailVerification').innerHTML = "Your email format is valid";
      document.querySelector("#emailVerification").classList.remove("status-error");
      document.querySelector("#emailVerification").classList.add("status-success");
  } else {
      document.querySelector('#emailVerification').innerHTML = "Please enter valid email";
      document.querySelector("#emailVerification").classList.remove("status-success");
      document.querySelector("#emailVerification").classList.add("status-error");
  }
}



// First Name

let userFname = document.getElementById("firstname");

userFname.onkeyup = function fnameValidation() {
  let min = 2, max = 20;
  let fname = document.querySelector('#firstname').value;

  if (fname.length < min || fname.length > max) {
      document.querySelector('#fnameCheck').innerHTML = `Your name must be between ${min} and ${max} characters.`;
      document.querySelector("#fnameCheck").classList.remove("status-success");
      document.querySelector("#fnameCheck").classList.add("status-error");
  } else {
      document.querySelector('#fnameCheck').innerHTML = "Proper name";
      document.querySelector("#fnameCheck").classList.remove("status-error");
      document.querySelector("#fnameCheck").classList.add("status-success");
  }
}


// Last Name

let userLname = document.getElementById("lastname");
 
userLname.onkeyup = function lnameValidation() {
  let min = 2, max = 20;
  let lname = document.querySelector('#lastname').value;

  if (lname.length < min || lname.length > max) {
      document.querySelector('#lnameCheck').innerHTML = `Your name must be between ${min} and ${max} characters.`;
      document.querySelector("#lnameCheck").classList.remove("status-success");
      document.querySelector("#lnameCheck").classList.add("status-error");
  } else {
      document.querySelector('#lnameCheck').innerHTML = "Proper name";
      document.querySelector("#lnameCheck").classList.remove("status-error");
      document.querySelector("#lnameCheck").classList.add("status-success");
  }
}



// Password

let userPw = document.getElementById("password");
let lowercase = document.getElementById("lowercase");
let uppercase = document.getElementById("uppercase");
let number = document.getElementById("number");
let minLength = document.getElementById("minLength");
let maxLength = document.getElementById("maxLength");

  // When the user clicks the password field, open the message box
userPw.onfocus = function() {
  document.getElementById("notice").style.display = "block";
}

  // When the user clicks outside of the password field, close the message box
userPw.onblur = function() {
  document.getElementById("notice").style.display = "none";
}

userPw.onkeyup = function pwVerification() {

  // lowercase
  let lowerCaseLetters = /[a-z]/g;
  if(userPw.value.match(lowerCaseLetters)) {  
    document.querySelector("#lowercase").classList.remove("status-error");
    document.querySelector("#lowercase").classList.add("status-success");
  } else {
    // document.querySelector('#pwVerification').innerHTML = "Must contain at least one lowercase letter";
    document.querySelector("#lowercase").classList.remove("status-success");
    document.querySelector("#lowercase").classList.add("status-error");
  }

  // uppercase
  let upperCaseLetters = /[A-Z]/g;
  if(userPw.value.match(upperCaseLetters)) {  
    document.querySelector("#uppercase").classList.remove("status-error");
    document.querySelector("#uppercase").classList.add("status-success");
  } else {
    // document.querySelector('#pwVerification').innerHTML = "Must contain at least one uppercase letter";
    document.querySelector("#uppercase").classList.remove("status-success");
    document.querySelector("#uppercase").classList.add("status-error");
  }

  // digit
  let digit = /[0-9]/g;
  if(userPw.value.match(digit)) {  
    document.querySelector("#number").classList.remove("status-error");
    document.querySelector("#number").classList.add("status-success");
  } else {
    // document.querySelector('#pwVerification').innerHTML = "Must contain at least one number";
    document.querySelector("#number").classList.remove("status-success");
    document.querySelector("#number").classList.add("status-error");
  }

  let pw = document.querySelector("#password").value;

  // minLength
  if (pw.length >= 8) {
    document.querySelector("#minLength").classList.remove("status-error");
    document.querySelector("#minLength").classList.add("status-success");
  } else {
    // document.querySelector('#pwVerification').innerHTML = "Must contain at least 8 characters";
    document.querySelector("#minLength").classList.remove("status-success");
    document.querySelector("#minLength").classList.add("status-error");
  }

    // maxLength
    if (pw.length <= 20) {
      document.querySelector("#maxLength").classList.remove("status-error");
      document.querySelector("#maxLength").classList.add("status-success");
    } else {
      // document.querySelector('#pwVerification').innerHTML = "Must contain at most 20 characters";
      document.querySelector("#maxLength").classList.remove("status-success");
      document.querySelector("#maxLength").classList.add("status-error");
  }
}


// password == re-type password
function pwValidation() {
  let pw = document.querySelector("#password").value;
  let retype_pw = document.querySelector("#retypePassword").value;

  if (pw != retype_pw) {
    document.querySelector("#pwValidation").innerHTML = "The passwords are not matched";
    document.querySelector("#pwValidation").classList.remove("status-success");
    document.querySelector("#pwValidation").classList.add("status-error");
  } 
    else {
    document.querySelector("#pwValidation").innerHTML = "The passwords are matched";
    document.querySelector("#pwValidation").classList.remove("status-error");
    document.querySelector("#pwValidation").classList.add("status-success");
  }
}



// 