<?php session_start(); /* Starts the session */ ?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
        <link rel="stylesheet" href="cookie.css">
        <link rel="stylesheet" href="style/header_footer.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <?php if(isset($_SESSION['UserData']['Useremail'])){ 
            include_once'header_login.php';}
        else {
            include_once'header_notlogin.php';} ?>
        <main>
            <div class="container-fluid">

              <div class="">
              <?php if(isset($_SESSION['UserData']['Useremail'])){ 
                        include_once'uploadshare.php';}?>
              </div>
                
                <?php 
                if (!isset($_SESSION['UserData']['Useremail'])) {
                    // if is guest, only show public img
                    $pattern = '/^public/i';

                } else {
                    // if is user, show public, internal and private img of that user
                    $fileUserName = explode('@', $_SESSION['UserData']['Useremail']);
                    $fileUserName = $fileUserName[0];
                    $pattern = '/^(public|interna|private' . $fileUserName . ')/i';

                } 

                $imgFile =  array_map('str_getcsv', file('img.csv'));

                foreach ($imgFile as $imgLine) { 
                    if (preg_match($pattern, $imgLine[0])) { 
                    ?>
                    <div class="image-display">
                        <img src="img/<?php echo $imgLine[0] ?>" alt="img" class="img-fluid">
                        <br>
                        <span><?php echo $imgLine[1] ?></span>
                    </div>
                    <br>

              <?php  } 
                }
              ?>

                <?php include_once'cookie.php'; ?>
            </div>
        </main>
        <?php include_once'footer.php';?>
    </body>

</html>
