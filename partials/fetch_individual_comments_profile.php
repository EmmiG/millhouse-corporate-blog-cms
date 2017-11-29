<?php 
$statement = $pdo->prepare("SELECT * FROM comments ORDER BY postID DESC LIMIT 5");   
$statement->execute(array(
	":userID" => $_SESSION["user"]["userID"]
)); 
$indivudual_comment_profile = $statement->fetchAll(PDO::FETCH_ASSOC);
?>