<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Useremail'])){
        header("location:login.php");
        exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
    </head>
    <body>
        <p>Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout.</p>
    </body>

</html>
