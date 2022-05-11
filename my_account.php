<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Useremail'])){
        header("location:login.php");
}
?>

 <?php  if (isset($_POST["Submit"])) {
          if ($_FILES["profile_image"]["error"] == UPLOAD_ERR_OK) {
          $new_location = 'uploads/avatar.jpg';
          move_uploaded_file($_FILES['profile_image']['tmp_name'], $new_location);
        }     
 } 
?>

<!-- $origin_image = $_FILES["profile_image"]["tmp_name"];
          $target_dir = 'uploads/';
          $path = $target_dir . basename($_FILES["profile_image"]["name"]);
          move_uploaded_file($origin_image, $path); -->

<!DOCTYPE html>
<html>
  <head>
    <title>My Account</title>
    <link rel="stylesheet" href="my_account.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="header_footer.css">
    <link rel="stylesheet" href="cookie.css"> 
    <script src="js/bootstrap.bundle.min.js"></script>     
  </head>

  <body>
    <?php include_once'header_login.php' ?>
    <main>
      <div class="profile py-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
                      <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                          <img class="profile_img" src="./avatar.jpg" alt="student dp">
                        </div>
                        <div class="card-upload text-center">
                          <form action="my_account.php" method="post" name="upload_profile" enctype="multipart/form-data" id="upload_profile">
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                            <button class="btn btn-primary btn-lg" type="submit" name="Submit" form="upload_profile">Upload new image</button>
                          </form>
                        </div>
                      </div>
            </div>
            <div class="col-lg-8">
              <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0">Account Details</h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <tr>
                      <th width="40%">Email Address:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th width="40%">First Name:</th>
                      <td></td>
                    </tr>
                    <tr>
                      <th width="40%">Last Name:</th>
                      <td></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="card shadow-sm">
                <div class="card-body text-right">
                  <?php echo $_SESSION['UserData']['Useremail'] ?>
                  <button class="btn btn-primary btn-lg" type="button" onclick="location.href='logout.php'">Log Out</button>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>
      <?php include_once'cookie.php' ?>
    </main>
    <?php include_once'footer.php';
      exit ?>
  </body>
</html>