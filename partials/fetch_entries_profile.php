<?php 
$statement = $pdo->prepare("SELECT * FROM posts ORDER BY postID DESC LIMIT 5");   
$statement->execute();
$count = $statement->fetchAll(PDO::FETCH_ASSOC);
?>