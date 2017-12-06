<?php
    /*
    The selected month is converted from string to INT to match the database. Then both the month and year are 
    conditions in the select statement to our database. So 
    */
	require_once 'database.php';

	$selected_month = date("m", strtotime($_GET['month']));

	$statement = $pdo->prepare("SELECT * FROM posts WHERE MONTH(time) = :month AND YEAR(time) = :year order by postID DESC"); 
	$statement->execute(array(
				":month"     => $selected_month,
                ":year"      => $_GET['year']
				));
	$selected_posts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>