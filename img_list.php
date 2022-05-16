<link rel="stylesheet" href="style/common.css">
<!-- <link rel="stylesheet" href="style/header_footer.css"> -->
<link rel="stylesheet" href="style/index.css">

<?php if (isset($_POST['deleteImg'])) {
    $imgDeleted = $_POST['deleteImg'];

    $oldImgData = [];

    $imgFile =  array_map('str_getcsv', file('img.csv'));

      // find the information of current img
      foreach ($imgFile as $imgLine) {
            if ($imgLine[0] == $imgDeleted) {
               // delete img 
              unlink('img/'. $imgLine[0]);
            } else {
              // put information of the users in another array for later concatination
              $oldImgData[] = $imgLine;
            }
      }

      // clear old img.csv file
    $imgFile2 = fopen('img.csv', 'w');
    fclose($imgFile2);

    $imgFile2 = fopen('img.csv', 'a');
      // write oldImgData back into db file
    foreach ($oldImgData as $line) {
        $line = implode(',',$line);
        $line = $line . "\n";
        fwrite($imgFile2, $line);
    }
    fclose($imgFile2);

}
?>

<?php 
$imgList = array_map('str_getcsv', file('img.csv'));
foreach ($imgList as $img) {?>
    <div class="d-flex">
      <div class="col-lg-2 col-xs-12"></div>
      <div class="col-lg-8 col-xs-12 section1">
        <div class="image-display">
          <img src="img/<?php echo $img[0] ?>" alt="img" class="img-fluid">
          <br>
          <p class="imgLine"><?php echo $img[1] ?></p>
          <form action="index_admin.php" method="post" id="deleteImage">
              <button type="submit" name="deleteImg" value="<?php echo $img[0] ?>" for="deleteImage">Delete Image</button>
          </form>
        </div>
      </div>
      <div class="col-lg-2 col-xs-12"></div>
    </div>

<?php }
?>
