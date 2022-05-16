<form name="backtomain" method="post" action="uploadshare.php" enctype="multipart/form-data"> 
	<input type="submit" name="back" value="Back"></input>
</form>
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
		$UserEmail = $_POST['Useremail']['name'];
		$fileUserName = explode('@',$Useremail);
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
	}
        


	?>

	<?php 
	$tempFile = $_FILES['imgFile']['tmp_name'];
	
	$fileTypeExt = explode("/", $_FILES['imgFile']['type']);
	
	
	$fileType = $fileTypeExt[0];
	
	$fileExt = $fileTypeExt[1];
	
	$extStatus = false;
	
	print_r($_FILES['imgFile']['name']);
	
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
				echo "File is uploaded. <br>";
				echo "<img src='{$saveFile}' width='300' />";
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
?>