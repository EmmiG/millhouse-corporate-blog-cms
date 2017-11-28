<?php 
$statement = $pdo->prepare("SELECT content, name, time, email FROM comments order by ID DESC LIMIT 5");
$statement->execute(); 
$count = $statement->fetchAll(PDO::FETCH_ASSOC);
?>