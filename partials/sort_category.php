<?php
    /*
    If the user has set the sorting themselves, the $sorting variable will be either asc/desc, depending on their
    decision. Else it will be DESC by default.
    */
	require_once 'database.php';
    if(isset($_GET['sorting'])) {
        $sorting = $_GET['sorting'];
    }
    else {
        $sorting = "DESC";
    }
	$statement = $pdo->prepare("SELECT * FROM posts WHERE category = :category order by postID $sorting"); 
	$statement->execute(array(
				":category"     => $_GET["category"]
				));
	$sorted_posts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>