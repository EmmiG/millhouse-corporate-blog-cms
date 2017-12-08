<?php
    /*
    This statement will fetch and count the likes for a particular postID and then echo.
    */
    require_once 'database.php';
    $statement = $pdo->prepare("SELECT COUNT(*) FROM likes where postID = :postID");
    $statement->execute(array(
    ":postID"        => $post["postID"]
    ));

    $count = $statement->fetch(PDO::FETCH_ASSOC);
    foreach($count as $c) {
        echo $c . " ";
    }
?>