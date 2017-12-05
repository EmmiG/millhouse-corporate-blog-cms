<?php
	require 'partials/database.php';

	$limit = 5;  
if(isset($_GET["page"])) {
	$page  = $_GET["page"]; 
} else { 
	$page=1; 
};  
$start_from = ($page-1) * $limit;  

	$selected_month = date("m", strtotime($_GET['month']));

	$statement = $pdo->prepare("SELECT * FROM posts WHERE MONTH(time) = :month order by postID DESC LIMIT $start_from, $limit"); 
	$statement->execute(array(
				":month"     => $selected_month
				));
	$selected_posts = $statement->fetchAll(PDO::FETCH_ASSOC);


	?>