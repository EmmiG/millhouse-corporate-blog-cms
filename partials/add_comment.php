<?php
session_start();
require 'database.php';

if(isset($_POST['name'], $_POST['comment'], $_POST['email'], $_SESSION["user"]["userID"], $_SESSION["user"]["username"])) {
			header("Location: ../index.php?postID=".$_POST['postID']);

			$statement = $pdo->prepare(
			"INSERT INTO comments (userID, postID, content, username, name, time, email) 
			VALUES (:userID, :postID, :content, :username, :name, :time, :email) "
			);
			$date = date('Y-m-d H:i:s');
			$statement->execute(array(
			":userID"			 => $_SESSION["user"]["userID"],
			":postID"      => $_POST['postID'],
			":content"     => $_POST['comment'],
			":username"    => $_SESSION["user"]["username"],
			":name"     	 => $_POST['name'],
			":time"     	 => $date,
			":email"     	 => $_POST['email']
			
			));
}
elseif(isset($_POST['name'], $_POST['comment'], $_POST['email'])) {
			header("Location: ../index.php?postID=".$_POST['postID']);

			$statement = $pdo->prepare(
			"INSERT INTO comments (userID, postID, content, username, name, time, email) 
			VALUES (:userID, :postID, :content, :username, :name, :time, :email) "
			);
			$date = date('Y-m-d H:i:s');
			$statement->execute(array(
			":userID"			 => "0",
			":postID"      => $_POST['postID'],
			":content"     => $_POST['comment'],
			":username"    => "0",
			":name"     	 => $_POST['name'],
			":time"     	 => $date,
			":email"     	 => $_POST['email']
			
			));
}

?>