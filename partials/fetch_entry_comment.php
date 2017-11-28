<?php
$statement = $pdo->prepare("SELECT * FROM posts WHERE postID = :postID");
$statement->execute(array(
	":postID"     => $_GET["postID"]
));

$indivudual_post = $statement->fetchAll(PDO::FETCH_ASSOC);