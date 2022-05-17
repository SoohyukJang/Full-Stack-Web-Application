<?php session_start(); // Starts the session 
        
        // Check Login form submitted        
        if(isset($_POST['Submit_admin'])){
                // Define username and associated password array 
               $adminEmail = 'admin@gmail.com';
               $adminPw = 'Admin123456';
                
                // Check and assign submitted Username and Password to new variable 
                $Useremail = isset($_POST['adminEmail']) ? $_POST['adminEmail'] : '';
                $Password = isset($_POST['adminPw']) ? $_POST['adminPw'] : '';

                // Check if Username and Password match          
                if ($adminEmail == $Useremail and $adminPw == $Password){
                        // Successful attemp: Set session variables and redirect to admin idex page  
                        $_SESSION['UserData']['Useremail'] = $adminEmail;
                        header("location:index_admin.php");
                } else {
                        //Unsuccessful attempt: Set error message 
                        $msg="<span style='color:red'>Invalid Login Details</span>";
                }
        }
?>


<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login ∙ Instakilogram</title>
    <link rel="stylesheet" href="style/common.css">
    <link rel="stylesheet" href="style/login_admin.css">
    <link rel="stylesheet" href="style/header_footer.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="cookie.css">
  </head>

  <body>
  <?php include_once'header_notlogin.php'; ?>
    <main class="login_form">
        <div class="inner-wrapper text-center">
        
          <form action="login_admin.php" method="post" name="Login_admin_Form" id="Login_admin_Form" class="Login_Form">

          <div class="logo text-center">
            <h1>InstaKilogram</h1>
          </div>

            <!-- user email input -->
            <div class="input-group">
              <input class="form-control" name="adminEmail" id="adminEmail" type="text" placeholder="Email" />
            </div>

            <!-- password input -->
            <div class="input-group">
              <input class="form-control" name="adminPw" id="adminPw" type="password" placeholder="Password" />
            </div>

            <?php if(isset($msg)){?>
            <div><?php echo $msg;?> </div><?php } ?>

            <!-- submit button -->
            <button class="login_btn" type="submit" name="Submit_admin" form="Login_admin_Form">Log in</button>  
          
          </form>
        </div>
      <?php include_once'cookie.php'; ?> 
    </main>
    <?php include_once'footer.php'; ?>
  </body>
</html>