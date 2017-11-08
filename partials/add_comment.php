<?php
session_start();
require 'database.php';

if(isset($_POST['name'], $_POST['comment'], $_POST['email'])) {
			$Message = urlencode("Du har lagt till ett nytt inlägg.");
			header("Location: ../index.php?postID=".$_POST['postID']);

			$statement = $pdo->prepare(
			"INSERT INTO comments (postID, content, name, time, email) 
			VALUES (:postID, :content, :name, :time, :email) "
			);
			$date = date('Y-m-d H:i:s');
			$statement->execute(array(
			":postID"      => $_POST['postID'],
			":content"     => $_POST['comment'],
			":name"     	 => $_POST['name'],
			":time"     	 => $date,
			":email"     	 => $_POST['email']
			
			));
}

?>