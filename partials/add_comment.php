<?php
session_start();
require 'database.php';

if(isset($_POST['name'], $_POST['comment'], $_POST['email'])) {
			$Message = urlencode("Du har lagt till ett nytt inlägg.");
			header("Location: ../index.php?postID=".$_POST['postID']);

			$statement = $pdo->prepare(
			"INSERT INTO comments (userID, postID, content, username, name, time, email) 
			VALUES (:userID, :postID, :content, :username, :name, :time, :email) "
			);
			$date = date('Y-m-d H:i:s');
			$statement->execute(array(
			":userID"			 => $_SESSION["user_id"]["userID"],
			":postID"      => $_POST['postID'],
			":content"     => $_POST['comment'],
			":username"    => $_SESSION["user"]["username"],
			":name"     	 => $_POST['name'],
			":time"     	 => $date,
			":email"     	 => $_POST['email']
			
			));
}

?>