<?php

session_start();

$tempFile = $_FILES['profileImage']['tmp_name'];
$fileTypeExt = explode("/", $_FILES['profileImage']['type']);

$fileType = $fileTypeExt[0];
$fileExt = $fileTypeExt[1];

$extStatus = false;

switch($fileExt) {
    case 'jpeg':
    case 'jpg':
    case 'gif':
    case 'png':
    $extStatus = true;
    break;
    
    default:

    header( "refresh:5;url=register.html" ); 
    echo 'Your image must be jpg, gif, png! You\'ll be redirected in about 5 secs. If not, click <a href="register.html">here</a>.';

    exit;
    break;
}


if($fileType == 'image') {

    if($extStatus) {
        $resFile = "./img/{$_FILES['profileImage']['name']}";
        $imageUpload = move_uploaded_file($tempFile, $resFile);
        
        if($imageUpload == true) {

          header( "refresh:5;url=login.html" ); 
          echo 'Your image is uploaded successfully! You\'ll be redirected in about 5 secs. If not, click <a href="login.html">here</a>.';

          $password = $_POST['password'];
          $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

          file_put_contents("accounts.db", $_POST['email'] . "  " . $_POST['firstname'] . "  " . $_POST['lastname'] . "  " . $_FILES['profileImage']['name'] . "  " . $encrypted_password . "\n"  , FILE_APPEND);

        } else {

          header( "refresh:5;url=register.html" ); 
          echo 'Your image is fail to upload! You\'ll be redirected in about 5 secs. If not, click <a href="register.html">here</a>.';
        }
    } 

    else {

      header( "refresh:5;url=register.html" ); 
      echo 'Your image must be jpg, gif, png!! You\'ll be redirected in about 5 secs. If not, click <a href="register.html">here</a>.';
    }    
}    
else {

  header( "refresh:5;url=register.html" ); 
  echo 'You must upload an image file! You\'ll be redirected in about 5 secs. If not, click <a href="register.html">here</a>.';
  
}

?>