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

function duplet() {
	require 'database.php';
	$statement = $pdo->prepare("SELECT COUNT(username) AS num FROM users WHERE username = :username");
	$statement->execute(array(
	":username"     => $_POST["username"]
	));
	$duplet = $statement->fetch(PDO::FETCH_ASSOC);
	
	 if($duplet['num'] > 0){
			return true;
	}
	else {
			return false;
	}
}

function postamount_individual() {
		require 'partials/database.php';
		$statement = $pdo->prepare("SELECT COUNT(*) FROM posts where userID = :userID");
		$statement->execute(array(
		":userID" => $_SESSION["user"]["userID"]
		)); 
		$count = $statement->fetch(PDO::FETCH_ASSOC);
		foreach($count as $c) {
				return $c;
	}
}

function postamount() {
	require 'partials/database.php';
	$statement = $pdo->prepare("SELECT COUNT(*) FROM posts");
	$statement->execute();
	$count = $statement->fetch(PDO::FETCH_ASSOC);
	foreach($count as $c) {
		return $c;
	}
}


?>