<?php session_start(); /* Starts the session */
        
        /* Check Login form submitted */        
        if(isset($_POST['Submit'])){
                /* Define username and associated password array */
                $logins = array('admin@gmail.com' => 'Admin123456');
                
                /* Check and assign submitted Username and Password to new variable */
                $Useremail = isset($_POST['Useremail']) ? $_POST['Useremail'] : '';
                $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
                
                /* Check Username and Password existence in defined array */            
                if (isset($logins[$Useremail]) && $logins[$Useremail] == $Password){
                        /* Successful attemp: Set session variables and redirect to Main page  */
                        $_SESSION['UserData']['Useremail']=$logins[$Useremail];
                        header("location:index_admin.php");
                } else {
                        /*Unsuccessful attempt: Set error message */
                        $msg="<span style='color:red'>Invalid Login Details</span>";
                }
        }
?>


<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="cookie.css">
    <link rel="stylesheet" href="header_footer.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
  </head>

  <body>
  <?php include_once'header_notlogin.php'; ?>
    <main class="login_form">      
      <div class="logo text-center">
        <h1>InstaKilogram</h1>
      </div>
      <div class="wrapper">
        <div class="inner-warpper text-center">

        <?php if(isset($msg)){?>
          <div><?php echo $msg;?> </div><?php } ?>
        
          <h2 class="title">Login to Admin account</h2>
          <form action="login_admin.php" method="post" name="Login_admin_Form" id="Login_admin_Form">

            <!-- user email input -->
            <div class="input-group">
              <!-- <label class="placeholder" for="Useremail">User Email</label> -->
              <input class="form-control" name="Useremail" id="Useremail" type="text" placeholder="Email" />
              <span class="lighting"></span>
            </div>

            <!-- password input -->
            <div class="input-group">
              <!-- <label class="palceholder" for="Password">Password</label> -->
              <input class="form-control" name="Password" id="Password" type="password" placeholder="Password" />
              <span class="lighting"></span>
            </div>

            <!-- submit button -->
            <button class="login_btn" type="submit" value="Login" name="Submit" form="Login_admin_Form">Login</button>  
          
          </form>
        </div>
      
        <!-- link to registration page -->
        <div class="signup-wrapper text-center">
          <a href="regist.php">Don't have an accout? <span class="text-primary">Create One</span></a>
        </div>
      </div>
      <?php include_once'cookie.php'; ?> 
    </main>
    <?php include_once'footer.php'; ?>
  </body>
</html>