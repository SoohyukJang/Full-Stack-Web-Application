<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Registration page</title>
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
        <h2 class="title">Regist new account</h2>
        <form action="" method="post" name="Regist_Form" enctype="multipart/form-data">

          <!-- user email input -->
          <div class="input-group">
            <input class="form-control" name="Useremail" id="Useremail" type="text" placeholder="Email" />
            <span class="lighting"></span>
          </div>

          <!-- password input -->
          <div class="input-group">
            <input class="form-control" name="Password" id="Password" type="password" placeholder="Password" />
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
          <button type="submit" value="Regist" name="Submit" onclick="validate_pw()">Regist</button>  
          <br>
          <button class="mx-2" type="reset" value="Reset" name="Reset">Reset</button>
        
        </form>
      </div>
    </div>
    <div>
        <script src="regist.js"></script>
    </div>
    <?php include_once'cookie.php'; ?>
  </body>
</html>

<?php       
        /* Check Login form submitted */        
        if(isset($_POST['Submit'])){
          $useremail = $_POST['Useremail'];
          $pw = password_hash($_POST['Password'],PASSWORD_DEFAULT);
          $fname = $_POST['Firstname'];
          $lname = $_POST['Lastname'];
          $comma = ',';
          $new_user = $useremail . $comma . $pw . $comma . $fname . $comma . $lname . "\n";
          $myfile = fopen("accounts.db", "a") or die("Unable to open file!");
          fwrite($myfile, $new_user);
          fclose($myfile);}
?>