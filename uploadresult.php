<?php 
$tempFile = $_FILES['imgFile']['tmp_name'];

$fileTypeExt = explode("/", $_FILES['imgFile']['type']);

$fileType = $fileTypeExt[0];

$fileExt = $fileTypeExt[1];

$extStatus = false;

switch($fileExt){
	case 'jpeg':
	case 'jpg':
	case 'gif':
	case 'bmp':
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

		$resFile = "./img/{$_FILES['imgFile']['name']}";

		$imageUpload = move_uploaded_file($tempFile, $resFile);
		
		if($imageUpload == true){
			echo "File is uploaded. <br>";
			echo "<img src='{$resFile}' width='300' />";
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
<form name="backtomain" method="post" action="uploadshare.php" enctype="multipart/form-data"> 
	<input type="submit" name="back" value="Back"></input>
</form>