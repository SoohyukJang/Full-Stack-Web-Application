<?php session_start(); // Starts the session 
        
        // Check Login form submitted */        
        if(isset($_POST['Submit'])){
                // Check and assign submitted Username and Password to new variable 
                $Useremail = isset($_POST['Useremail']) ? $_POST['Useremail'] : '';
                $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

                $file = fopen("test.db","r");

                while(! feof($file)) {
                    $data = fgetcsv($file);

                    if(is_array($data)) {
                        $email = $data[0];
                        $veri_pw = $data[1];

                        if ($email == $Useremail) {
                            if (password_verify($Password, $veri_pw)) {
                                $_SESSION['UserData']['Useremail']=$email;
                                header("location:index.php");
                            }
                            else {
                                $msg="<span style='color:red'>Invalid Login Details</span>";
                            }        
                        }
                        else {
                            $msg="<span style='color:red'>Invalid Login Details</span>";
                        }
                    };
                }

                fclose($file);
        }
    
?>


<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Login page</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="cookie.css">
    <link rel="stylesheet" href="header_footer.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
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
        
          <h2 class="title">Login to your account</h2>
          <form action="login.php" method="post" name="Login_Form" id="Login_Form">

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
            <button class="login_btn" type="submit" value="Login" name="Submit" form="Login_Form">Login</button>  
          
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