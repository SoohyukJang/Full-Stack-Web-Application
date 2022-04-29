<?php session_start(); /* Starts the session */
        
        /* Check Login form submitted */        
        if(isset($_POST['Submit'])){
                /* Define username and associated password array */
                $logins = array('alex@gmail.com' => '123456','username1' => 'password1','username2' => 'password2');
                
                /* Check and assign submitted Username and Password to new variable */
                $Useremail = isset($_POST['Useremail']) ? $_POST['Useremail'] : '';
                $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
                
                /* Check Username and Password existence in defined array */            
                if (isset($logins[$Useremail]) && $logins[$Useremail] == $Password){
                        /* Successful attemp: Set session variables and redirect to Main page  */
                        $_SESSION['UserData']['Useremail']=$logins[$Useremail];
                        header("location:index.php");
                        exit;
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
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./login.css">

  </head>
  <body>

    <div class="logo text-center">
      <h1>InstaKilogram</h1>
    </div>
    <div class="wrapper">
      <div class="inner-warpper text-center">

      <?php if(isset($msg)){?>
        <div><?php echo $msg;?> </div><?php } ?>
      
        <h2 class="title">Login to your account</h2>
        <form action="" method="post" name="Login_Form">

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
          <button type="submit" value="Login" name="Submit">Login</button>  
        
        </form>
      </div>
    
      <!-- link to registration page -->
      <div class="signup-wrapper text-center">
        <a href="#">Don't have an accout? <span class="text-primary">Create One</span></a>
      </div>
    </div>
  </body>
</html>