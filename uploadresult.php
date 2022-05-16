
<form name="backtomain" method="post" action="uploadshare.php" enctype="multipart/form-data"> 
	<input type="submit" name="back" value="Back"></input>
</form>
<?php
    if(isset($_POST['submit'])){
        var_dump($_POST);
        $SharingLevel = $_POST["sLevel"];
        $Text = $_POST["description"];
		$fileTmp = $_FILES['imgFile']['tmp_name'];
        $fileSize = $_FILES['imgFile']['size'];
        $fileError = $_FILES['imgFile']['error'];
        $fileType= $_FILES['imgFile']['type'];
		$fileName = $_FILES['imgFile']['name'];
        $comma = ',';

		$fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
		print_r($SharingLevel);
		if ($SharingLevel == 'private') {
				echo 'private';
				$fileNameNew = $SharingLevel . uniqid() . '.' .$fileActualExt;
		} else {
			$fileNameNew = $SharingLevel . uniqid() . '.' .$fileActualExt;
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
			echo "Only image format jpeg, jpg, png is allowed";  
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