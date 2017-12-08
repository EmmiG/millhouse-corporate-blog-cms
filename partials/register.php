<?php
    require_once 'database.php';
    require 'functions.php';
    
	/*
    If the function duplet returns false and if the email is properly inserted, this partial will insert
    the values from the register-form into the datbase. Else, they will be re-directed back.
    */
    if(duplet() == false && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $username = $_POST["username"];
        $email = $_POST["email"];

        $statement = $pdo->prepare("
            INSERT INTO users (username, password, email)
            VALUES (:username, :password, :email)");

        $statement->execute(array(
            ":username" => $username,
            ":password" => $password,
            ":email" => $email
        )); 

        header("Location: ../landing.php?success=true");
    }
    else {
        header("Location: ../register_user.php?username=taken");
    }
?>
