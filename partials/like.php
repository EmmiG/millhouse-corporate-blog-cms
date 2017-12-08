<?php
    /*
    When a user clicks the like button this statement will insert the postID into the database.
    */
    require_once 'database.php';
    $statement = $pdo->prepare(
    "INSERT INTO likes (postID) 
    VALUES (:postID) "
    );
    $statement->execute(array(
    ":postID"        => $_POST["postID"],
    ));
    header("Location: ../index.php#like_".$_POST["postID"]);
?>
