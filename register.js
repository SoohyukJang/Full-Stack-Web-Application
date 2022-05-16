// Email Check

let userEmail = document.getElementById("Useremail");

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



// Password Check

let validate_pw = function(){

  let pw = document.getElementById('Password');
  let pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-z]{8,20}$/

  if(pw.value.match(pattern)){
      document.getElementById('pwCheck1').innerHTML = 'Strong password';
      document.querySelector('#pwCheck1').classList.remove('status-error');
      document.querySelector('#pwCheck1').classList.add('status-success');
      // document.getElementById('pwCheck1').style.color = 'green';
      
  } else {
      document.getElementById('pwCheck1').innerHTML = 'Weak password';
      // document.getElementById('pwCheck1').style.color = 'red';
      document.querySelector('#pwCheck1').classList.remove('status-success');
      document.querySelector('#pwCheck1').classList.add('status-error');
  }
}


let check_pw = function() {
  if (document.getElementById('Password').value == document.getElementById('Retype_Password').value) {
      document.getElementById('pwCheck2').innerHTML = 'Password match';
      document.querySelector("#pwCheck2").classList.remove("status-error");
      document.querySelector("#pwCheck2").classList.add("status-success");
  }
  else {
      document.getElementById('pwCheck2').innerHTML = 'Password does not match';
      document.querySelector("#pwCheck2").classList.remove("status-success");
      document.querySelector("#pwCheck2").classList.add("status-error");
  }
}



// First Name

let userFname = document.getElementById("Firstname");

userFname.onkeyup = function fnameValidation() {
  let min = 2, max = 20;
  let fname = document.querySelector('#Firstname').value;

  if (fname.length < min || fname.length > max) {
    document.querySelector('#fnameCheck').innerHTML = `Must be between ${min} and ${max} characters`;
    document.querySelector("#fnameCheck").classList.remove("status-success");
    document.querySelector("#fnameCheck").classList.add("status-error");
  } else {
    document.querySelector('#fnameCheck').innerHTML = "Proper name";
    document.querySelector("#fnameCheck").classList.remove("status-error");
    document.querySelector("#fnameCheck").classList.add("status-success");
  }
}



// Last Name

let userLname = document.getElementById("Lastname");

userLname.onkeyup = function lnameValidation() {
  let min = 2, max = 20;
  let lname = document.querySelector('#Lastname').value;

  if (lname.length < min || lname.length > max) {
    document.querySelector('#lnameCheck').innerHTML = `Must be between ${min} and ${max} characters`;
    document.querySelector("#lnameCheck").classList.remove("status-success");
    document.querySelector("#lnameCheck").classList.add("status-error");
  } else {
    document.querySelector('#lnameCheck').innerHTML = "Proper name";
    document.querySelector("#lnameCheck").classList.remove("status-error");
    document.querySelector("#lnameCheck").classList.add("status-success");
  }
}
