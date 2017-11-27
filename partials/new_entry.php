<?php
session_start();
require 'database.php';

if(isset($_POST['title'], $_POST['content'], $_POST['category'], $_SESSION['user'])) {
			$Message = urlencode("Du har lagt till ett nytt inlägg.");
			header("Location: ../profile_viewposts.php?Message=".$Message);

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
			":email"       => $_SESSION['user']['email']
			));
}

?>