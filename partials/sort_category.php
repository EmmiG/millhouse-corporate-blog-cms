<?php
	require 'database.php';
    if(isset($_GET['sorting'])) {
        $sorting = $_GET['sorting'];
    }
    else {
        $sorting = "DESC";
    }
	$statement = $pdo->prepare("SELECT * FROM posts WHERE category = :category order by postID $sorting"); 
	$statement->execute(array(
				":category"     => $_GET["category"]
				));
	$sorted_posts = $statement->fetchAll(PDO::FETCH_ASSOC);
	?>