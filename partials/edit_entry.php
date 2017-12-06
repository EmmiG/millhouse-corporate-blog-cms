<?php
    /*
    This will gather the values from each $_POST and update the database with the new values.
    */
    require_once 'database.php';
    if(isset($_POST['title'], $_POST['content'], $_POST['category'])) {
        header("Location: ../profile_viewposts.php?newentry=true");

        $statement = $pdo->prepare(
        "UPDATE posts SET title = :title, content = :content, category = :category WHERE postID = :postID"
        );

        $statement->execute(array(
        ":postID"     => $_POST["postID"],
        ":title"     => $_POST["title"],
        ":content"     => $_POST["content"],
        ":category"    => $_POST["category"]
        ));
    }
?>