<?php
require_once 'session_start.php';
require_once 'database.php';

/*
a comment is added if these values are set. this particular if-statement will apply if the user is logged in.
*/
if(isset($_POST['name'], $_POST['comment'], $_POST['email'], $_SESSION["user"]["userID"], $_SESSION["user"]["username"]) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../comment.php?postID=".$_POST['postID']."#comments");

    $statement = $pdo->prepare(
    "INSERT INTO comments (userID, postID, content, username, name, time, email) 
    VALUES (:userID, :postID, :content, :username, :name, :time, :email) "
    );
    $date = date('Y-m-d H:i:s');
    $statement->execute(array(
    ":userID"			 => $_SESSION["user"]["userID"],
    ":postID"      => $_POST['postID'],
    ":content"     => $_POST['comment'],
    ":username"    => $_SESSION["user"]["username"],
    ":name"     	 => $_POST['name'],
    ":time"     	 => $date,
    ":email"     	 => $_POST['email']

    ));
}
/*
this will apply if the user is not logged in. the values userID and username will be set to 0.
*/
elseif(isset($_POST['name'], $_POST['comment'], $_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../comment.php?postID=".$_POST['postID']."#comments");

    $statement = $pdo->prepare(
    "INSERT INTO comments (userID, postID, content, username, name, time, email) 
    VALUES (:userID, :postID, :content, :username, :name, :time, :email) "
    );
    $date = date('Y-m-d H:i:s');
    $statement->execute(array(
    ":userID"			 => "0",
    ":postID"      => $_POST['postID'],
    ":content"     => $_POST['comment'],
    ":username"    => "0",
    ":name"     	 => $_POST['name'],
    ":time"     	 => $date,
    ":email"     	 => $_POST['email']

    ));
}
?>