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
    <meta name="viewport" content="width=device-width">
    <title>Login ∙ Instakilogram</title>
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="cookie.css">
    <link rel="stylesheet" href="style/header_footer.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>

  <body>
  <!-- <?php include_once'header_notlogin.php'; ?> -->
    <main class="login_form">
        <div class="inner-warpper text-center">
        
          <form action="login.php" method="post" name="Login_Form" id="Login_Form" class="Login_Form">

            <div class="logo text-center">
              <h1>InstaKilogram</h1>
            </div>

            <!-- user email input -->
            <div class="input-group">
              <input class="input_login" name="Useremail" id="Useremail" type="text" placeholder="Email" />
              <span class="lighting"></span>
            </div>

            <!-- password input -->
            <div class="input-group">
              <input class="input_login" name="Password" id="Password" type="password" placeholder="Password" />
              <span class="lighting"></span>
            </div>

            <?php if(isset($msg)){?>
            <div><?php echo $msg;?> </div><?php } ?>

            <!-- submit button -->
            <button class="login_btn" type="submit" value="Login" name="Submit" form="Login_Form">Log in</button> 
          
            <div class="signup-wrapper text-center">
              <a href="register.php">Don't have an accout? <span class="text-primary">Sign up</span></a>
            </div>

          </form>
        </div>
      
      <?php include_once'cookie.php'; ?> 
    </main>
    <?php include_once'footer.php'; ?>
  </body>
</html>