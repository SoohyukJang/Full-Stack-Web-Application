<?php session_start(); /* Starts the session */

if(!(isset($_SESSION['UserData']['Useremail']))){
        header("location:login.php");
} elseif (!($_SESSION['UserData']['Useremail'] == 'admin@gmail.com')) {
        header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>

    <?php $keyWords = array();

        if (isset($_POST['submitSearch'])) {

              $keyWords2 = $_POST['searchField'];

              $keyWords2 = explode(' ', strtolower($keyWords2));

              foreach ($keyWords2 as $keyNum) {
                array_push($keyWords,$keyNum);
          
              };
        

        $file =  array_map('str_getcsv', file('data/accounts.db'));

        $accountsdb = [];

        foreach($keyWords as $key) {
            $key = '/' . $key . '/i';
            
            foreach ($file as $userKey) {
                if (preg_match($key, $userKey[0])) {
                    $accountsdb[] = $userKey;
                } else {

                    if (preg_match($key, $userKey[2])) {
                      $accountsdb[] = $userKey;
                    } else {

                        if (preg_match($key, $userKey[3])) {
                          $accountsdb[] = $userKey;
                        } 
                        
                    }   
                }
            
            }
            
            $fileSearch = fopen("search_result.csv", "w+") or die("Unable to open file!");
            foreach ($accountsdb as $line) {
              fputcsv($fileSearch,$line);
            };
            fclose($fileSearch);
        }
    } 
?>

    <?php

        $accountsdb = array_map('str_getcsv', file('search_result.csv'));
        // Setting up pagination
        $pagination = array(
            'itemPerPage' => isset($_GET['itemPerPage']) ? (int) $_GET['itemPerPage'] : 10,
            'total' => sizeof($accountsdb),
            'currentPage' => isset($_GET['page']) ? (int) $_GET['page'] : 1,
        );

        $pagination['totalPage'] = ceil($pagination['total'] / $pagination['itemPerPage']);
        $pagination['offset'] = ($pagination['currentPage'] * $pagination['itemPerPage']) - $pagination['itemPerPage'];

        // Paginated array
        $pageOrder = array_slice($accountsdb, $pagination['offset'], $pagination['itemPerPage'], false);

    ?>
    

    <div>
      <form action="search_result.php" method="post" class="d-flex my-3 mx-5 px-5" id="searchUser">
        <div class="input-group">                    
          <input type="text" class="form-control" name="searchField" placeholder="Search">
          <button type="submit" class="btn btn-secondary" for="searchUser" name="submitSearch">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
          </button>
        </div>
      </form>
    </div>
    
    <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">View More</th>
        </tr>
      <thead>
      <tbody>
        <?php foreach($pageOrder as $user) { ?>
        <tr>
          <td><?php echo $user[0] ?></td>
          <td><?php echo $user[1] ?></td>
          <td><?php echo $user[2] ?></td>
          <td><?php echo $user[3] ?></td>
          <!-- sent useremail of user to user_detail.php for later use -->
          <td><form action="user_detail.php" method="get">
                <input type="hidden" name="user" value="<?php echo $user[0] ?>">
                <input type="submit" value="View">
            </form></td>
        </tr>
        <?php } ?>
       
      </tbody>
    </table>
    </div>

<?php if ($pagination['total'] !== 0) { ?>


<div>
	<strong><?php echo  $pagination['itemPerPage'] * ($pagination['currentPage'] - 1) + sizeof($pageOrder) ?></strong> on
	<strong><?php echo $pagination['total'] ?></strong> results
</div>

<?php } else { ?>
        <div>
            <span>There is no result</span>
        </div>
<?php } ?>

<div aria-label="Page navigation example">
<ul class="pagination justify-content-center">
	<li class="page-item <?php if (isset($preIDisable)) { echo $preIDisable;} ?>">
		<?php
			if(($pagination['currentPage'] - 1) > 0) 
				echo '<a class="page-link" href= search_result.php?page='.($pagination['currentPage'] - 1).'>Previous</a>';
			else
				$preIDisable = 'disabled';
		?>
    
	</li>
	<?php
		for($i = 1; $i <= $pagination['totalPage']; $i++) {
	?>
			<li <?php echo $i === $pagination['currentPage'] ? ' class="page-item active"' : '' ?>>
				<?php
					if($i != $pagination['currentPage'])
						echo '<a class="page-link" href= search_result.php?page='.$i.'>'.$i.'</a>';
					else
						echo '<span class="page-link">'.$i.'</span>';
				?>
			</li>
	<?php
		}
	?>
	<li class="page-item <?php if (isset($nextIDisable)) { echo $nextIDisable;} ?>">
		<?php
			if(($pagination['currentPage'] + 1) <= $pagination['totalPage'])
				echo '<a class="page-link" href= search_result.php?page='.($pagination['currentPage'] + 1).'>Next</a>';
			else
        $nextIDisable = 'disabled';
		?>
	</li>
</ul>
</div>
</html>
