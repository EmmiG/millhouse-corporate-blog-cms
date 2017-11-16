<?php
session_start();
require 'database.php';

if(isset($_POST['title'], $_POST['content'], $_POST['category'], $_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$Message = urlencode("Du har lagt till ett nytt inlägg.");
			header("Location: ../index.php?Message=".$Message);

			$statement = $pdo->prepare(
			"INSERT INTO posts (title, content, category, name, time, email, userID) 
			VALUES (:title, :content, :category, :name, :time, :email, :userID) "
			);
			$date = date('Y-m-d H:i:s');
			$statement->execute(array(
			":title"     => $_POST["title"],
			":content"     => $_POST["content"],
			":category"    => $_POST["category"],
			":name"        => $_SESSION["user"]["username"],
			":userID"	   => $_SESSION["user"]["userID"],
			":time"        => $date,
			":email"       => $_POST['email']
			));
}

?>