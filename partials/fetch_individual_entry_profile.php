<?php
/*
This SQL-statement will fetch a particular postID through POST.
*/
$statement = $pdo->prepare("SELECT * FROM posts WHERE postID = :postID");
$statement->execute(array(
	":postID"     => $_POST["postID"]
));

$indivudual_post = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
