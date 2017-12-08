<?php 
    /*
    This statement will fetch the last five posts from the database.
    */
    require_once 'database.php';
    $statement = $pdo->prepare("SELECT * FROM posts ORDER BY postID DESC LIMIT 5");   
    $statement->execute();
    $posts_profile = $statement->fetchAll(PDO::FETCH_ASSOC);
?>