<?php session_start(); /* Starts the session */
        
        /* Check Login form submitted */        
        if(isset($_POST['Submit'])){
                /* Define username and associated password array */
                // $logins = array('alex@gmail.com' => '123456','di@gmail.com' => '123456','an@gmail.com' => '123456');
                
                /* Check and assign submitted Username and Password to new variable */
                $Useremail = isset($_POST['Useremail']) ? $_POST['Useremail'] : '';
                $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

                $file = fopen("accounts.db","r");

                while(! feof($file)) {
                    $data = fgetcsv($file);

                    if(is_array($data)) {
                        $email = $data["0"];
                        $veri_pw = $data["1"];

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="cookie.css">

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
        <form action="login.php" method="post" name="Login_Form">

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
        <a href="regist.php">Don't have an accout? <span class="text-primary">Create One</span></a>
      </div>
    </div>
    <?php include_once'cookie.php'; ?>
  </body>
</html>