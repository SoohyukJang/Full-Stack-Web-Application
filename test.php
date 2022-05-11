<?php
/*
    We want to display a lot of information to the screen = download a lot of HTML = lag.
    LEt's go for a pagination !
*/

// Huge array with lot of dbig datas.
$my_huge_array = array_map('str_getcsv', file('test.db')); 

// Setting up pagination
$pagination = array(
	'length' => isset($_GET['length']) ? (int) $_GET['length'] : 10,
	'total' => sizeof($my_huge_array),
	'currentPage' => isset($_GET['page']) ? (int) $_GET['page'] : 1,
);
$pagination['nbPages'] = ceil($pagination['total'] / $pagination['length']);
$pagination['offset'] = ($pagination['currentPage'] * $pagination['length']) - $pagination['length'];

// Paginated array
$paginated = array_slice($my_huge_array, $pagination['offset'], $pagination['length'], true);

// Paginator :
?>

<ul class="pagination">
	<li>
		<?php
			if(($pagination['currentPage'] - 1) > 0)
				echo '<a href= test.php?page='.($pagination['currentPage'] - 1).'>Previous</a>';
			else
				echo '<span>Previous</span>';
		?>
	</li>
	<?php
		for($i = 1; $i <= $pagination['nbPages']; $i++) {
	?>
			<li <?php echo $i == $pagination['currentPage'] ? ' class="active"' : '' ?>>
				<?php
					if($i != $pagination['currentPage'])
						echo '<a href= test.php?page='.$i.'>'.$i.'</a>';
					else
						echo '<span>'.$i.'</span>';
				?>
			</li>
	<?php
		}
	?>
	<li>
		<?php
			if(($pagination['currentPage'] + 1) <= $pagination['nbPages'])
				echo '<a href= test.php?page='.($pagination['currentPage'] + 1).'>Next</a>';
			else
				echo '<span>Next</span>';
		?>
	</li>
<div>
	<strong><?php echo $pagination['length'] * ($pagination['currentPage'] - 1) + sizeof($paginated);
?></strong> on
	<strong><?php echo $pagination['total'] ?></strong> result<?php if($pagination['total'] > 1) echo 's' ?>
</div>
</ul>
