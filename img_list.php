<style>
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
</style>


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
        <img src="img/<?php echo $img[0] ?>" alt="img" class="img-fluid">
        <br>
        <span><?php echo $img[1] ?></span>
        <form action="index_admin.php" method="post" id="deleteImage">
            <button type="submit" name="deleteImg" value="<?php echo $img[0] ?>" for="deleteImage">Delete Image</button>
        </form>
    </div>

<?php }
?>
