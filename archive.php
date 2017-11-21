<?php	
    session_start();
    require 'partials/head.php';
    require 'partials/fetch_months.php';
?>
	<div class="main_wrap">
		<div class="jumbotron jumbo_start">
			<img src="images/millhouse_white_logo.svg">
			<a href="#category">
				<div id="arrow_down">
					<i class="fa fa-angle-down" aria-hidden="true"></i>
				</div>
			</a>
		</div>
		
		<div id="archive" class="content_wrap">
		<form action="#archive" class="form-group" method="get">
			<select name="month">
<?php
		echo $_GET['month'];
		foreach ($months as $value) {
			if($value > 0) {
				$date = date("F", mktime(0, 0, 0, $value, 10));
			?>
				<option value="<?= $date ?>"><?= $date ?></option>
			<?php	
			}
		}
		?>
			</select>
			<br>
			<input type="submit" class="btn btn-primary">
		</form>
	<?php	
	if(isset($_GET['month'])) {
		include 'partials/sort_months.php';
		foreach($selected_posts as $selpost) { 	?>
		<p><?= $selpost['time'] ?></p>
		<p><?= $selpost['title'] ?></p>
		<p><?= $selpost['name'] ?></p>	
		<p><?= $selpost['category'] ?></p>
		<p><?= $selpost['content'] ?></p>
		<p><?= $selpost['email'] ?></p>
		<?php	
			}
		}
		?>
			</div>
		</div>
	<?php	require 'partials/footer.php';
?>
