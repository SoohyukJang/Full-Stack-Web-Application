<?php session_start(); /* Starts the session */

if(!(isset($_SESSION['UserData']['Useremail']))){
        header("location:login.php");
} elseif (!($_SESSION['UserData']['Useremail'] == 'admin@gmail.com')) {
        header("location:index.php");
}
?>
<?php 
$currentUser = $_GET['user'];
?>

<?php if (isset($_POST['changePw'])) {
    // hash new password
    $newPw = password_hash($_POST['Password'],PASSWORD_DEFAULT);

    $oldUserData = [];
    $newUserData = [];
  
    $userFile =  array_map('str_getcsv', file('test.db'));
  
    // find the information of current user
    foreach ($userFile as $userLine) {
          if ($userLine[0] == $currentUser) {
            $newUserData[] = $userLine;
            // use Current user value as placeholder for newUserData
            $oldUserData[] = 'Current user';
          } else {
            // put information of the users in another array for later concatination
            $oldUserData[] = $userLine;
          }
    }
        // modify the password in the db
    $newUserData[0][1] = $newPw;

    // replace the value Current user in oldUserData with newUserData
    $oldUserData[array_search('Current user', $oldUserData)] = $newUserData[0];

    
    // clear old db file
    $userFile2 = fopen('test.db', 'w');
    fclose($userFile2);

    $userFile2 = fopen('test.db', 'a');
    // write oldUserData back into db file
    foreach ($oldUserData as $line) {
        $line = implode(',',$line);
        $line = $line . "\n";
        fwrite($userFile2, $line);
    }
    fclose($userFile2);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>My Account</title>
    <link rel="stylesheet" href="my_account.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="header_footer.css">
    <link rel="stylesheet" href="cookie.css"> 
    <link rel="stylesheet" href="regist.css">     
  </head>

  <body>
    <?php include_once'admin_header.php' ?>
    <main>
      <div class="profile py-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
                <div class="card shadow-sm">
                  <div class="card-header bg-transparent text-center">
                    <?php  $testDB =  array_map('str_getcsv', file('test.db'));
                    $key = '/' . $currentUser . '/i';
                    $userInfo = [];
                    foreach ($testDB as $userMail) {
                      if (preg_match($key, $userMail[0])) {
                          $userInfo = $userMail;
                          break;
                      } 
                    }
                    ?>
                    <img class="profile_img" src="uploads/<?php echo $userInfo[4];?>" alt="student dp">
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
                      <td><?php echo $userInfo[0];?></td>
                    </tr>
                    <tr>
                      <th scope="row">Password:</th>

                      <td><form action="user_detail.php?user=<?php echo $currentUser;?>" method="post">
                        <div class="input-group">
                            <input class="form-control" name="Password" id="Password" type="password" onkeyup="validate_pw()" placeholder="Password" />
                            <span id="mess1"></span>
                        </div>

                        <div class="input-group">
                            <input class="form-control" name="Password" id="Retype_Password" type="password" onkeyup="check_pw()" placeholder="Retype Password"/>
                            <span id="mess2"></span>
                        </div>

                        <input type="submit" value="Change Password" name="changePw">
                      </form><td>

                    </tr>
                    <tr>
                      <th scope="row" >First Name:</th>
                      <td><?php echo $userInfo[2];?></td>
                    </tr>
                    <tr>
                      <th scope="row">Last Name:</th>
                      <td><?php echo $userInfo[3];?></td>
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
      <div>
        <script src="regist.js"></script>  
      </div> 
    </main>
    <?php include_once'footer.php';
      exit ?>
  </body>
</html>