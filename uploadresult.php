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

		$saveFile = "./img/{$_FILES['imgFile']['name']}";

		$imageUpload = move_uploaded_file($tempFile, $saveFile);
		
		if($imageUpload == true){
			echo "File is uploaded. <br>";
			echo "<img src='{$saveFile}' width='300' />";
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
<?php
    if(isset($_POST['submit'])){
        var_dump($_POST);
        session_start();
        $SharingLevel = $_POST["sLevel"];
        $Text = $_POST["description"];
        $comma = ',';
        $fileNameNew = $fileName.'.'.$fileActualExt;
        $fileName = $_FILES['imgFile']['name'];
        $fileTmp = $_FILES['imgFile']['tmp_name'];
        $fileSize = $_FILES['imgFile']['size'];
        $fileError = $_FILES['imgFile']['error'];
        $fileType= $_FILES['imgFile']['type'];   
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
		$f = fopen('/upload.db','a');
		if(!empty($fileName)|| !empty($Text) ||){
			$FileFormat = $SharingLevel. $comma. $Text. $comma. $fileNameNew;
			fwrite($f,$FileFormat);
			fclose($f);

		}
    
		

    }

?>