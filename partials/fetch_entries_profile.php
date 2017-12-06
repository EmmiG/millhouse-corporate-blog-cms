<?php 
    /*
    This statement will fetch the last five posts from the database.
    */
    $statement = $pdo->prepare("SELECT * FROM posts ORDER BY postID DESC LIMIT 5");   
    $statement->execute();
    $posts_profile = $statement->fetchAll(PDO::FETCH_ASSOC);
?>