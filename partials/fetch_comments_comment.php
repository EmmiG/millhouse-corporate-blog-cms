<?php
    /*
    This statement will fetch all the comments for a particular postID and order them.
    */
    $statement = $pdo->prepare("SELECT * FROM comments WHERE postID = :postID order by id DESC");
    $statement->execute(array(
        ":postID"     => $_GET["postID"]
    ));
    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
?>