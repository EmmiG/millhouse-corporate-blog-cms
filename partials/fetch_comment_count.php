<?php
    /*
    This will select and count all the comments for a specific postID and echo the result.
    */
    require_once 'database.php';
    $statement = $pdo->prepare("SELECT COUNT(*) FROM comments where postID = :postID");
    $statement->execute(array(
    ":postID"        => $post["postID"]
    ));
    $count = $statement->fetch(PDO::FETCH_ASSOC);
    foreach($count as $c) {
        echo $c . " ";
    }
?>