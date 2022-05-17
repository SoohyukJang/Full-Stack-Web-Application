<?php session_start(); /* Starts the session */

if(!($_SESSION['UserData']['Useremail'] == 'admin@gmail.com')){
        header("location:login.php");
}
?>

<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin Index ∙ Instakilogram</title>
        <link rel="stylesheet" href="style/header_footer.css">
        <link rel="stylesheet" href="style/img_list.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="cookie.css">
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