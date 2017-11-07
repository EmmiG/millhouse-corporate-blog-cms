<?php
session_start();
require 'database.php';

if(isset($_POST['title'], $_POST['content'], $_POST['category'], $_POST['email'])) {
			header("Location: ../index.php?newentry=true");

			$statement = $pdo->prepare(
			"UPDATE posts SET title = :title, content = :content, category = :category, email = :email WHERE postID = :postID"
			);
	
			$statement->execute(array(
			":postID"     => $_POST["postID"],
			":title"     => $_POST["title"],
			":content"     => $_POST["content"],
			":category"    => $_POST["category"],
			":email"       => $_POST['email']
			));
}

?>