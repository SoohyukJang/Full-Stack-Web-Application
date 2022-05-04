// set cookie according to you
var cookie_name = "instakilogram";
var cookie_value ="Instakilogram";

// when users click accept button
let accept_cookie = document.getElementById("accept_cookie");
accept_cookie.onclick = function(){
    create_cookie(cookie_name, cookie_value);
}
// function to set cookie in web browser
 let create_cookie = function(cookie_name, cookie_value){
  document.cookie = cookie_name + "=" + cookie_value + ";path=/";
  if(document.cookie){
    document.getElementById("popup").style.display = "none";
  }else{
    alert("Unable to set cookie. Please allow all cookies site from cookie setting of your browser");
  }
 }
// get cookie from the web browser
let get_cookie= function(cookie_name){
  let name = cookie_name + "=";
  let decode_cookie = decodeURIComponent(document.cookie);
  let ca = decode_cookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let ck = ca[i];
    while (ck.charAt(0) == ' ') {
      ck = ck.substring(1);
    }
    if (ck.indexOf(name) == 0) {
      return ck.substring(name.length, ck.length);
    }
  }
  return "";
}
// check cookie is set or not
let check_cookie = function(){
    let check = get_cookie(cookie_name);
    if(check == ""){
        document.getElementById("popup").style.display = "block";
    }else{
        
        document.getElementById("popup").style.display = "none";
    }
}
check_cookie();