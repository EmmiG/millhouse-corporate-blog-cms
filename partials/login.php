<?php
require_once 'session_start.php';
require 'database.php';
/*
This code is 100% stolen from Joppe Orb.

Values are retreived from the login-form.
*/
$password = $_POST["password"];
$username = $_POST["username"];
/*
Selects the row where the username is a match.
*/
$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$statement->execute(array(
    ":username" => $username
));

$fetched_user = $statement->fetch(PDO::FETCH_ASSOC);
/*
If the password is correct, the user will be re-directed to its dashboard. Otherwise, they will be directed to
the login-page again.
*/
if(password_verify($password, $fetched_user["password"])){
    $_SESSION["user"] = $fetched_user;
    header("Location: ../profile.php?success=true");
} else {
    header("Location: ../landing.php?error=Wrong username&success=false");
}
?>