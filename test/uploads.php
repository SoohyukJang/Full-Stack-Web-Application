<?php  if (isset($_POST["Submit_img"])) {
            $file = $_FILES['profile_image'];
            print_r($file);
        // if ($_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {
          // $new_location = './avatar.jpg';
          // move_uploaded_file($_FILES['profile_image']['tmp_name'], $new_location);
        // }     
 } 
?>


<!DOCTYPE html>
<html lang="en">
    <body>
        <form action="uploads.php" method="post" name="upload_profile" enctype='application/form-data' id="upload_profile">
            <input type="file" class="form-control" id="profile_image" name="profile_image">
            <button class="btn btn-primary btn-lg" type="submit" name="Submit_img" form="upload_profile">Upload new image</button>
        </form> 
    </body>

</html>                        
                        
                        
                        
