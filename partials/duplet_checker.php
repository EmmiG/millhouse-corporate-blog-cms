<?php		
			function duplet() {
				require 'database.php';

				$statement = $pdo->prepare("SELECT COUNT(username) AS num FROM users WHERE username = :username");

				$statement->execute(array(
				":username"     => $_POST["username"]
				));

				$duplet = $statement->fetch(PDO::FETCH_ASSOC);

				 if($duplet['num'] > 0){
						return true;
				}
				else {
						return false;
				}
		}

?>
