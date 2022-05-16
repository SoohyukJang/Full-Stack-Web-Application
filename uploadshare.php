<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1  .0">
    <title>Upload and Share Images</title>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<title> Image upload and Sharing</title>
<body>
<form name="uploadform" method="POST" action="uploadresult.php" enctype="multipart/form-data">  
 <div class="TextareaDesign">
    <div class="image-preview">
        <img style="width: 200px;" id="image-preview" src="https://thumbs.dreamstime.com/b/preview-stamp-round-grunge-sign-tag-172117942.jpg">
        <input type="file" name="imgFile" id="imgFile">
        <select name="sLevel" val="sLevel">
            <option val="private">Private</option>
            <option val="internal">Internal</option>
            <option val="public" name = "private">Public</option>
        </select>
        <textarea class="textarea" id= "description" name="description" cols='40' rows='5' placeholder="Write down your description here."></textarea>
        <input type="submit" name="submit"></input>
 
    </div>
 </div>
</form>
</body>
<script src="preview.js"></script>
</html>