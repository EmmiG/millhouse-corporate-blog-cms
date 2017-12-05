<?php
require 'database.php';
			$statement = $pdo->prepare(
			"INSERT INTO likes (postID) 
			VALUES (:postID) "
			);
			$statement->execute(array(
			":postID"        => $_POST["postID"],
			));
			header("Location: ../index.php?postID=".$_POST['postID']."#like");
?>
