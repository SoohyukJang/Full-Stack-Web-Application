<?php session_start(); /* Starts the session */

if(!($_SESSION['UserData']['Useremail'] == 'admin@gmail.com')){
        header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Admin Index</title>
        <link rel="stylesheet" href="cookie.css">
        <link rel="stylesheet" href="style/header_footer.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="style/img_list.css">
        
    </head>
    <body>
    <?php include_once'admin_header.php';?>
        <main>
            
            <?php include_once'img_list.php'; ?>
            <?php include_once'cookie.php'; ?>
        </main>
        <?php include_once'footer.php';?>
    </body>

</html>