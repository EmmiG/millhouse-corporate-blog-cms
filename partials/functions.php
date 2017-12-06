<?php  
/*
This function counts all the posts made by the logged in user.
*/
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
/*
This function counts all the comments in the database.
*/
function count_comments() {
	require 'database.php';
	$statement = $pdo->prepare("SELECT COUNT(*) FROM comments");
	$statement->execute();
	$count = $statement->fetch(PDO::FETCH_ASSOC);
	foreach($count as $c) {
		return $c;
	}
}
/*
This function counts all the comments made by the logged in user.
*/
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
/*
This function will check if there's a duplet in the datebase when the user registers so there are no duplet-usernames.
*/
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
/*
This function will count how many posts the logged in user has made.
*/
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

/*
This function will count the total amount of posts in the database.
*/
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