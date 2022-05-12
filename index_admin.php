<?php session_start(); /* Starts the session */

if(!($_SESSION['UserData']['Useremail'] == 'admin@gmail.com')){
        header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Index</title>
        <link rel="stylesheet" href="cookie.css">
        <link rel="stylesheet" href="header_footer.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="index.css">
        
    </head>
    <body>
    <?php include_once'admin_header.php';?>
        <main>
            <div class="container-fluid">
                <p>Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout.</p>
            </div>

            <?php include_once'cookie.php'; ?>
        </main>
        <?php include_once'footer.php';?>
    </body>

</html>