<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Useremail'])){
        header("location:login.php");
}
?>

<?php include_once('upload_img.php') ?>

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
                          <?php  $testDB =  array_map('str_getcsv', file('test.db'));
                          $key = '/' . $_SESSION['UserData']['Useremail'] . '/i';

                          $userInfo = [];
                          foreach ($testDB as $userMail) {
                            if (preg_match($key, $userMail[0])) {
                                $userInfo[] = $userMail;
                                break;
                            } 
                          }
                          ?>

                          <img class="profile_img" src="uploads/<?php echo $userInfo[0][4];?>" alt="student dp">
                        </div>
                        <div class="card-upload text-center">
                          <form action="my_account.php" method="post" name="upload_profile" enctype="multipart/form-data" id="upload_profile">
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                            <button class="btn btn-primary btn-lg" type="submit" name="Submit_img" form="upload_profile">Upload new image</button>
                          </form>
                        </div>
                      </div>
            </div>
            <div class="col-lg-8">
              <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0">Account Details</h3>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-bordered detailed-info">
                    <tr>
                      <th scope="row">Email Address:</th>
                      <td><?php echo $userInfo[0][0];?></td>
                    </tr>
                    <tr>
                      <th scope="row" >First Name:</th>
                      <td><?php echo $userInfo[0][2];?></td>
                    </tr>
                    <tr>
                      <th scope="row">Last Name:</th>
                      <td><?php echo $userInfo[0][3];?></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="card shadow-sm">
                <div class="card-body text-right">
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