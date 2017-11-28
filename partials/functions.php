<?php  

function count_posts() {
	require 'database.php';
	$statement = $pdo->prepare("SELECT COUNT(*) FROM posts");
	$statement->execute(array(
	":userID" => $_SESSION["user"]["userID"]
	));
	$count = $statement->fetch(PDO::FETCH_ASSOC);
	foreach($count as $c) { 
		return $c;
		}
	}

function user_posts() {
	require 'database.php';
	$statement = $pdo->prepare("SELECT COUNT(*) FROM posts where userID = :userID");
	$statement->execute(array(
	":userID" => $_SESSION["user"]["userID"]
	));
	$count = $statement->fetch(PDO::FETCH_ASSOC);
	foreach($count as $c) {
		return $c;
	}
}

function count_comments() {
	require 'database.php';
	$statement = $pdo->prepare("SELECT COUNT(*) FROM comments");
	$statement->execute(array(
	":userID" => $_SESSION["user"]["userID"]
	));
	$count = $statement->fetch(PDO::FETCH_ASSOC);
	foreach($count as $c) {
		return $c;
	}
}

function count_user_comments() {
	require 'database.php';
	$statement = $pdo->prepare("SELECT COUNT(*) FROM comments where userID = :userID");
	$statement->execute(array(
	":userID" => $_SESSION["user"]["userID"]
	));

	$count = $statement->fetch(PDO::FETCH_ASSOC);
	foreach($count as $c) { 
		return $c;
	}
}


?>