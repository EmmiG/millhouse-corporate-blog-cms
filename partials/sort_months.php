<?php
	require 'database.php';

	$selected_month = date("m", strtotime($_GET['month']));

	$statement = $pdo->prepare("SELECT * FROM posts WHERE MONTH(time) = :month order by postID DESC"); 
	$statement->execute(array(
				":month"     => $selected_month
				));
	$selected_posts = $statement->fetchAll(PDO::FETCH_ASSOC);
	?>