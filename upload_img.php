<?php  
 if (isset($_POST["Submit_img"])) {
  
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

  if (in_array($fileActualExt,$allowed)) {
    if ($_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {
      $fileNameNew = $fileUserName . "." . $fileActualExt;
      $fileDestination = 'uploads/' . $fileNameNew;

      $oldUserData = [];
      $newUserData = [];

      $userFile =  array_map('str_getcsv', file('data/accounts.db'));

      // find the information of current user
      foreach ($userFile as $userLine) {
            if ($userLine[0] == $_SESSION['UserData']['Useremail']) {
              $newUserData[] = $userLine;
              // use Current user value as placeholder for newUserData
              $oldUserData[] = 'Current user';
            } else {
              // put information of the users in another array for later concatination
              $oldUserData[] = $userLine;
            }
      }

      // delete old exisiting img
      unlink('uploads/'. $newUserData[0][4]);

      // modify the img file name in the db
      $newUserData[0][4] = $fileNameNew;

      // replace the value Current user in oldUserData with newUserData
      $oldUserData[array_search('Current user', $oldUserData)] = $newUserData[0];

      
      // clear old db file
      $userFile2 = fopen('data/accounts.db', 'w');
      fclose($userFile2);

      $userFile2 = fopen('data/accounts.db', 'a');
      // write oldUserData back into db file
      foreach ($oldUserData as $line) {
        $line = implode(',',$line);
        $line = $line . "\n";
        fwrite($userFile2, $line);
      }
      fclose($userFile2);
      // move file into the uploads folder
      move_uploaded_file($fileTmp, $fileDestination);
    }
  } else {
    $errorImg = 'You cannot upload images of this type!';
    }


  
}

  
?>