<?php session_start();?> /* Starts the session */

 
        

<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
        <link rel="stylesheet" href="cookie.css">
        <link rel="stylesheet" href="header_footer.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="index.css">
        <script src="js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <?php if(isset($_SESSION['UserData']['Useremail'])){ 
            include_once'header_login.php';}
        else {
            include_once'header_notlogin.php';} ?>
        <main>
            <div class="container-fluid">
                <p>Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout.</p>

                <?php echo $_SESSION['UserData']['Useremail'] ?>

                <?php include_once'cookie.php'; ?>
            </div>
        </main>
        <?php include_once'footer.php';?>
    </body>

</html>
