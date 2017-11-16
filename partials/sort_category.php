<?php
	require 'database.php';

	$statement = $pdo->prepare("SELECT * FROM posts WHERE category = :category order by postID DESC"); 
	$statement->execute(array(
				":category"     => $_GET["category"]
				));
	$sorted_posts = $statement->fetchAll(PDO::FETCH_ASSOC);
	?>