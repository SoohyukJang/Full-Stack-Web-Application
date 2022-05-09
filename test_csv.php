
<?php 

if (isset($_POST['Submit'])) {
    $find_email = $_POST['Useremail'];

    $find_pw = $_POST['Password'];


    $file = fopen("accounts.db","r");


    while(! feof($file)) {
        $data = fgetcsv($file);

        if(is_array($data)) {
            $email = $data[0];
            $veri_pw = $data[1];

            if ($email == $find_email) {
                if (password_verify($find_pw, $veri_pw)) {
                    echo 'congrat'. "<br>";
                }
                else {
                    echo 'Wrong password'. "<br>";
                }        
            }
              
            
        };
    }

    fclose($file);
 

}

?>

<!DOCTYPE html>
<html>
    <body>

    <form action="test_csv.php" method="post" name="Login_Form">
        <div class="input-group">
            <input class="form-control" name="Useremail" id="Useremail" type="email" placeholder="Email" />
            <span class="lighting"></span>
        </div>
        <div class="input-group">
            <input class="form-control" name="Password" id="Password" type="password" placeholder="Password" />
            <span class="lighting"></span>
        </div>
        <button type="submit" value="Find" name="Submit">Find</button>
    </form>  
    </body>
</html>