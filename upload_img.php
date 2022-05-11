<?php  
 if (isset($_POST["Submit_img"])) {
  $file = $_FILES['profile_image'];
  
  $fileName = $_FILES['profile_image']['name'];
  $fileTmp = $_FILES['profile_image']['tmp_name'];
  $fileSize = $_FILES['profile_image']['size'];
  $fileError = $_FILES['profile_image']['error'];
  $fileType= $_FILES['profile_image']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg', 'jpeg', 'png', 'gif');
  $fileUserName = explode('@', $_SESSION['UserData']['Useremail']);
  $fileUserName = $fileUserName[0];

  if ($_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {

      $fileNameNew = $fileUserName . "." . $fileActualExt;
      $fileDestination = 'uploads/' . $fileNameNew;
      move_uploaded_file($fileTmp, $fileDestination);
  }
        
}
?>