<?php
session_start();
require 'database.php';

if(isset($_POST['title'], $_POST['content'], $_POST['category'], $_POST['email'])) {
			$Message = urlencode("Du har lagt till ett nytt inlägg.");
			header("Location: ../post.php?Message=".$Message);

			$statement = $pdo->prepare(
			"INSERT INTO posts (title, content, category, name, time, email) 
			VALUES (:title, :content, :category, :name, :time, :email) "
			);
			$date = date('Y-m-d H:i:s');
			$statement->execute(array(
			":title"     => $_POST["title"],
			":content"     => $_POST["content"],
			":category"    => $_POST["category"],
			":name"        => $_SESSION["user"]["username"],
			":time"        => $date,
			":email"       => $_POST['email']
			));
}

?>
