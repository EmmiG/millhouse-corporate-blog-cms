<?php
session_start();

require 'database.php';

$password = $_POST["password"];
$username = $_POST["username"];

$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$statement->execute(array(
  ":username" => $username
));

$fetched_user = $statement->fetch(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT userID FROM users WHERE username = :username");
$statement->execute(array(
  ":username" => $username
));

$user_id = $statement->fetch(PDO::FETCH_ASSOC);

if(password_verify($password, $fetched_user["password"])){

  $_SESSION["user"] = $fetched_user;
  $_SESSION["loggedIn"] = true;


  header("Location: ../index.php?success=true");

} else {

  header("Location: ../landing.php?error=Wrong username&success=false");
  
}