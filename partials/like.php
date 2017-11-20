<?php
session_start();
require 'database.php';
			$statement = $pdo->prepare(
			"INSERT INTO likes (postID) 
			VALUES (:postID) "
			);
			$statement->execute(array(
			":postID"        => $_POST["postID"],
			));
			header("Location: ../index.php?post=liked");
?>