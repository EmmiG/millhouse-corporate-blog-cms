<?php
    require 'database.php';
		require 'functions.php';
			
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
			header("Location: ../register_user.php?success=false&username=taken");
		}
