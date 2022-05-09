function validate_pw(){

    var pw = document.getElementById('Password');
    var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-z]{8,20}$/

    if(pw.value.match(pattern)){
       alert('Successfully regist');
        
    }else{
        alert('Please try again');
        stop();
    }
}