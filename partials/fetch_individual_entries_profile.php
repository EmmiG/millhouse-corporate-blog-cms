<?php 
$statement = $pdo->prepare("SELECT * FROM posts WHERE userID = :userID ORDER BY postID DESC");   
$statement->execute(array(
	":userID" => $_SESSION["user"]["userID"]
)); 
$indivudual_post_profile = $statement->fetchAll(PDO::FETCH_ASSOC);
?>