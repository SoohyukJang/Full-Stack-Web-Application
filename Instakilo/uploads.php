<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload_image</title>
</head>
<body>
    <form action="uploads.php" method="Post" enctype="multipart/form_data">
        select image:<input type="file" name="image"><br /><br />
        Description:<input type="text" name="desc"><br /><br />
        
    <br>
    <input type="radio" id="sharePublic" name="shareLevel" value="sharePublic">
    <label for="sharePublic">Public</label><br>
    <input type="radio" id="shareInternal" name="shareLevel" value="shareInternal">
    <label for="shareInternal">Internal</label><br>
    <input type="radio" id="sharePrivate" name="shareLevel" value="sharePrivate">
    <label for="sharePrivate">Private</label>

    <input type="submit" name="share">
    </form>
<?php   
    if(isset($_POST['upload'])) {
        $imageName = $_FILES['file']['name'];
        $imageTmpName = $_FILES['file']['tmp_name'];
        $imageSize = $_FILES['file']['size'];
        $imageError = $_FILES['file']['error'];
        $imageType = $_FILES['file']['Type'];
        $desc = $_POST['desc'];
        $imageExt = explode('.',$image_Name);
        $imageActualExt = strtolower(end($imageExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pnj');

        if (in_array( $imageActualExt, $allowed)) {
            if ($imageError === 0) {
                if ($imageSize < 500000) {
                    $imageNameNew = uniqid('', true).".".$imageActualExt;
                    $imageDestination = 'public/'.$imageNamenNew;
                    move_uploaded_file($imageTmpName, $imageDestination);
                    header("location: uploads.php?uploadsuccess");
                } else {
                    echo "Your file is to big";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "you cannot upload files of this type!";
        }
    }
       
   
?>
    
    </body>
</html>