<?php       
        /* Check Login form submitted */        
        if(isset($_POST['Submit'])){
          $useremail = $_POST['Useremail'];
          $pw = password_hash($_POST['Password'],PASSWORD_DEFAULT);
          $fname = $_POST['Firstname'];
          $lname = $_POST['Lastname'];
          $comma = ',';

          $file = fopen("accounts.db","r");

                while(! feof($file)) {
                    $data = fgetcsv($file);

                    if(is_array($data)) {
                        $email = $data[0];

                        if (strtolower($email) == strtolower($useremail)) {
                            $msg="<span style='color:red'>Invalid Login Details</span>";
                            $check = true;     
                        }
                        else {
                          $check2 = true;
                        }
                    }
                }
              
              fclose($file);

              if (isset($check) && isset($check2)) {
                $msg="<span style='color:red'>Invalid Login Details</span>";
              }
              else {
                $new_user =  $useremail . $comma . $pw . $comma . $fname . $comma . $lname . "\n";
                // $myfile = fopen("test.db", "a") or die("Unable to open file!");
                $old_file = file_get_contents("test.db");
                $content = $new_user . $old_file;
                file_put_contents("test.db",$content);
                header("location:login.php");
              }
        }
?>



<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Registration page</title>
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

          <h2 class="title">Regist new account</h2>
          <form action="" method="post" name="Regist_Form" enctype="multipart/form-data" id="Regist_Form">

            <!-- user email input -->
            <div class="input-group">
              <input class="form-control" name="Useremail" id="Useremail" type="text" placeholder="Email" />
              <span class="lighting"></span>
            </div>

            <!-- password input -->
            <div class="input-group">
              <input class="form-control" name="Password" id="Password" type="password" onkeyup="validate_pw()" placeholder="Password" />
              <span id="mess1"></span>
              <span class="lighting"></span>
            </div>

            <div class="input-group">
              <input class="form-control" name="Password" id="Retype_Password" type="password" onkeyup="check_pw()" placeholder="Retype Password"/>
              <span id="mess2"></span>
              <span class="lighting"></span>
            </div>

            <div class="input-group">
              <input class="form-control" name="Firstname" id="Firstname" type="text" placeholder="First Name" />
              <span class="lighting"></span>
            </div>

            <div class="input-group">
              <input class="form-control" name="Lastname" id="Lastname" type="text" placeholder="Last Name" />
              <span class="lighting"></span>
            </div>

            <div class="input-group">
              <input class="form-control" name="profile_img" id="profile_img" type="file" />
              <span class="lighting"></span>
            </div>

            <!-- submit button -->
            <button class="login_btn" type="submit" value="Regist" name="Submit" form="Regist_Form">Regist</button>  
            <br>
            <button class="login_btn" type="reset" value="Reset" name="Reset" form="Regist_Form">Reset</button>
          
          </form>
        </div>
      </div>
      <div>
        <script src="regist.js"></script>
      </div>
      <?php include_once'cookie.php'; ?>
    </main> 
    <?php include_once'footer.php'; ?> 
  </body>
</html>


