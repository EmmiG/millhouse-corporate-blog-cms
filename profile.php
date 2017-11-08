<?php

		session_start();
		require 'partials/head.php';
		require 'partials/database.php';

		$statement = $pdo->prepare("SELECT COUNT(*) FROM posts where userID = :userID");

		$statement->execute(array(
		":userID" => $_SESSION["user"]["userID"]
	));
		$count = $statement->fetch(PDO::FETCH_ASSOC);

		foreach($count as $c) {
			echo $c;
		}

?>