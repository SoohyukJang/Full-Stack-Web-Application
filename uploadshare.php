<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width">
      <title>Share ∙ Instakilogram</title>
      <link type="text/css" rel="stylesheet" href="style/uploadshare.css">
  </head>
      <body>
        <form name="uploadform" method="POST" action="index.php" enctype="multipart/form-data">
          <div class="textareaDesign">
            <div class="imagePreview">

              <div class="image-preview">
                <img id="image-preview" src="https://i.imgur.com/eXJ4yb1.jpg">
              </div>

              <div class="options">
                <input type="file" name="imgFile" id="imgFile" class="uploadImg">
                <select name="sLevel" val="sLevel" class="sharingLevel">
                    <option val="private">Private</option>
                    <option val="internal">Internal</option>
                    <option val="public" name = "private">Public</option>
                </select>
              </div>

              <div class="description">
                <textarea class="textarea" id= "description" name="description" rows='5' placeholder="Share your moments!"></textarea>
              </div>

                <input type="submit" name="submit" class="submitBtn"></input>
            </div>
          </div>
        </form>
      </body>
    <script src="preview.js"></script>
</html>

<?php
    if(isset($_POST['submit'])){
        $SharingLevel = $_POST["sLevel"];
        $Text = $_POST["description"];
		$fileTmp = $_FILES['imgFile']['tmp_name'];
        $fileSize = $_FILES['imgFile']['size'];
        $fileError = $_FILES['imgFile']['error'];
        $fileType= $_FILES['imgFile']['type'];
		$fileName = $_FILES['imgFile']['name'];
        $comma = ',';
		$UserEmail = $_SESSION['UserData']['Useremail'];
		$fileUserName = explode('@',$UserEmail);
		$fileUserName = $fileUserName[0];

		$fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
		if ($SharingLevel == 'Internal') {
				echo 'You have shared the article with Internal Level. '; 
				$fileNameNew = $SharingLevel . uniqid() . '.' .$fileActualExt;
		} else {
			$fileNameNew = $SharingLevel . uniqid() . '.' .$fileActualExt;
		}

		if ($SharingLevel == 'Public') {
			echo 'You have shared the article with Public Level. ';
				$fileNameNew = $SharingLevel . uniqid() . '.' .$fileActualExt;
		} else {
			$fileNameNew = $SharingLevel . uniqid() . '.' .$fileActualExt;
		}
		if ($SharingLevel == 'Private') {
				echo 'You have shared the article with Private Level. ';
				$fileNameNew = $SharingLevel . $fileUserName. uniqid() . '.' .$fileActualExt;
		} else {
			$fileNameNew = $SharingLevel . $fileUserName. uniqid() . '.' .$fileActualExt;
		}

        $tempFile = $_FILES['imgFile']['tmp_name'];
	
	$fileTypeExt = explode("/", $_FILES['imgFile']['type']);
	
	
	$fileType = $fileTypeExt[0];
	
	$fileExt = $fileTypeExt[1];
	
	$extStatus = false;
	
	
	switch($fileExt){
		case 'jpeg':
		case 'jpg':
		case 'gif':
		case 'png':
			$extStatus = true;
			break;
		
		default:
			echo "Only image format jpeg, jpg, png, gif is allowed";  
			exit;
			break;
	}
	

	if($fileType == 'image'){

		if($extStatus){
	
			$saveFile = "img/$fileNameNew";
	
			$imageUpload = move_uploaded_file($tempFile, $saveFile);
			
			if($imageUpload == true){
				if (!empty($fileName)|| !empty($Text)) {
					$FileFormat = $fileNameNew. $comma. $Text. "\n";
					$oldContent = file_get_contents("img.csv");
					$content = $FileFormat . $oldContent;
					file_put_contents("img.csv", $content);
				}
			}else{
				echo "Failed to upload.";
			}
		}	
		else {
			echo "File should be in an image format.";
			exit;
		}	
	}	
	else {
		echo "Not a image format";
		exit;
	}

	}
        


	?>

	<?php 
	
?>