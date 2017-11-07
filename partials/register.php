<?php
    require 'database.php';
		require 'duplet_checker.php';
			
		if(duplet() == false) {
			$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
			$username = $_POST["username"];

			$statement = $pdo->prepare("
				INSERT INTO users (username, password)
				VALUES (:username, :password)");

			$statement->execute(array(
				":username" => $username,
				":password" => $password
			)); 

			header("Location: ../register_user.php?success=true");
		}
		else {
			header("Location: ../register_user.php?success=false&username=taken");
		}
