

<?php  if (isset($_POST["Submit_img"])) {
            $file = $_FILES['file'];
            
            $fileName = $_FILES['file']['name'];
            $fileTmp = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType= $_FILES['file']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 500000) {
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $fileDestination = '' . $fileNameNew;
                        move_uploaded_file($fileTmp, $fileDestination);
                        echo 'success';
                    } else {
                        echo 'Your file is too big!';
                    }
                } else { 
                    echo 'There was an error uploading your file!';
                }
            } else {
                echo 'You cannot upload file of this type!';
            }
 } 
?>


<!DOCTYPE html>
<html lang="en">
    <body>
        <form action="uploads.php" method="post" name="upload_profile" enctype="multipart/form-data" id="upload_profile">
            <input type="file" class="form-control" id="file" name="file">
            <button class="btn btn-primary btn-lg" type="submit" name="Submit_img" form="upload_profile">Upload new image</button>
        </form> 
    </body>

</html>                        
                  

if (isset($_POST["Submit"])) {
          if ($_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {
          $new_location = 'uploads/' . $_SESSION['UserData']['Useremail'];
          move_uploaded_file($_FILES['profile_image']['tmp_name'], $new_location);
        }     
 } 
                        
                        
