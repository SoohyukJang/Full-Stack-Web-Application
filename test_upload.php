<?php if (isset($_POST['shareImg'])) {
        $sharingLevel = $_POST['shareLevel'];

        $fileName = $_FILES['profile_image']['name'];
        $fileTmp = $_FILES['profile_image']['tmp_name'];
        $fileSize = $_FILES['profile_image']['size'];
        $fileError = $_FILES['profile_image']['error'];
        $fileType= $_FILES['profile_image']['type'];
      
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'gif');
} 
?>



<form action="test_upload.php" method="post">
    <input type="file" name="uploadImg" id="uploadImg">
    <br>
    <input type="radio" id="sharePublic" name="shareLevel" value="sharePublic">
    <label for="sharePublic">Public</label><br>
    <input type="radio" id="shareInternal" name="shareLevel" value="shareInternal">
    <label for="shareInternal">Internal</label><br>
    <input type="radio" id="sharePrivate" name="shareLevel" value="sharePrivate">
    <label for="sharePrivate">Private</label>

    <input type="submit" name="shareImg">
</form>