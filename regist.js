var validate_pw = function(){

    var pw = document.getElementById('Password');
    var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-z]{8,20}$/

    if(pw.value.match(pattern)){
        document.getElementById('mess1').innerHTML = 'Strong password';
        document.getElementById('mess1').style.color = 'green';;
        
    }else{
        document.getElementById('mess1').innerHTML = 'Weak password';
        document.getElementById('mess1').style.color = 'red';
    }
}


var check_pw = function() {
    if (document.getElementById('Password').value == document.getElementById('Retype_Password').value) {
        document.getElementById('mess2').innerHTML = 'Password match';
        document.getElementById('mess2').style.color = 'green';
    }
    else {
        document.getElementById('mess2').innerHTML = 'Password does not match';
        document.getElementById('mess2').style.color = 'red';
    }
}