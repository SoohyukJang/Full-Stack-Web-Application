<?php       
    // Check Login form submitted      
    if(isset($_POST['Submit'])){
      $useremail = $_POST['Useremail'];
      $pw = password_hash($_POST['Password'],PASSWORD_DEFAULT);
      $fname = $_POST['Firstname'];
      $lname = $_POST['Lastname'];
      $comma = ',';

      // write img file into db file (copy from upload_img.php)
      $fileName = $_FILES['profile_image']['name'];
      $fileTmp = $_FILES['profile_image']['tmp_name'];
      $fileSize = $_FILES['profile_image']['size'];
      $fileError = $_FILES['profile_image']['error'];
      $fileType= $_FILES['profile_image']['type'];
    
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
      $allowed = array('jpg', 'jpeg', 'png', 'gif');
      $fileUserName = explode('@', $useremail);
      $fileUserName = $fileUserName[0];

      if (in_array($fileActualExt,$allowed)) {
        if ($_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {
          $fileNameNew = $fileUserName . "." . $fileActualExt;
          $fileDestination = 'uploads/' . $fileNameNew;
          move_uploaded_file($fileTmp, $fileDestination);
        }  

        $file = fopen("data/accounts.db","r");

            while(! feof($file)) {
                $data = fgetcsv($file);

                if(is_array($data)) {
                    $email = $data[0];

                    if (strtolower($email) == strtolower($useremail)) {
                        $msg="<span style='color:red'>Invalid Login Details</span>";
                        $check = true;     
                    } else {
                      $check2 = true;
                    }
                }
            }
          
          fclose($file);

          if (isset($check) && isset($check2)) {
            $msg="<span style='color:red'>Email Exist</span>";
          } else {
              $new_user =  $useremail . $comma . $pw . $comma . $fname . $comma . $lname . $comma . $fileNameNew . "\n";
              $old_file = file_get_contents("data/accounts.db");
              $content = $new_user . $old_file;
              file_put_contents("data/accounts.db", $content);
              header("location:login.php");
          }
      } else {
        $errorImg = 'You cannot upload images of this type!';
      }
    
      
    }
?>



<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up ∙ Instakilogram</title>
    <link rel="stylesheet" href="style/header_footer.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/register.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="cookie.css">
    <script src="js/bootstrap.bundle.min.js"></script>
  </head>

  <body>
    <!-- <?php include_once'header_notlogin.php'; ?> -->
    <main class="register_form">
        <div class="inner-warpper text-center">

          <!-- <?php if(isset($msg)){?>
          <div><?php echo $msg;?> </div><?php } ?> -->
          
          <form action="register.php" method="post" name="Register_Form" enctype="multipart/form-data" id="Register_Form">

            <div class="logo text-center">
                <h1>InstaKilogram</h1>
            </div>

            <div class="wrapper">

              <h5 class="title">Sign up to see photos and videos<br>from your friends.</h5>


              <!-- user email input -->
              <div class="input-group">
                <input class="register_form" name="Useremail" id="Useremail" type="text" placeholder="Email" pattern="[a-z0-9]+@[a-z0-9]+(\.[a-z0-9]+)*\.([a-z]{2,6}" />
                <p id="emailVerification" class="status-error"></p>
                <!-- <span class="lighting"></span> -->
              </div>


              <!-- password input -->
              <div class="input-group">
                <input class="register_form" name="Password" id="Password" type="password" onkeyup="validate_pw()" placeholder="Password" />
                <p id="pwCheck1" class="status-error"></p>
              </div>

              <div class="input-group">
                <input class="register_form" name="Password" id="Retype_Password" type="password" onkeyup="check_pw()" placeholder="Retype Password" />
                <p id="pwCheck2" class="status-error"></p>
              </div>


              <div class="input-group">
                <input class="register_form" name="Firstname" id="Firstname" type="text" placeholder="First Name" />
                <p id="fnameCheck" class="status-error"></p>
              </div>

              <div class="input-group">
                <input class="register_form" name="Lastname" id="Lastname" type="text" placeholder="Last Name" />
                <p id="lnameCheck" class="status-error"></p>
              </div>


              <div class="input-group">
                <input class="register_form" name="profile_image" id="profile_image" type="file" />
              </div>


              <?php if(isset($msg)){?>
              <div><?php echo $msg;?> </div><?php } ?>

              <?php if (isset($errorImg)) { ?>
              <div><?php echo $errorImg ?></div> <?php }?>


              <!-- submit button -->
              <div>
              <button class="register_btn" type="submit" value="Regist" name="Submit" form="Register_Form">Regist</button>
              
              <button class="reset_btn" type="reset" value="Reset" name="Reset" form="Register_Form">Reset</button>
              </div>

              <div class="login-wrapper text-center">
                <a href="login.php">Have an account? <span class="text-primary">Log in</span></a>
              </div>

            </div>
          </form>
        </div>
      </div>
      <div>
        <script src="register.js"></script>
      </div>
      <?php include_once'cookie.php'; ?>
    </main> 
    <?php include_once'footer.php'; ?> 
  </body>
</html>