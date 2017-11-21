<?php    
   	require 'partials/database.php';

		$statement = $pdo->prepare("SELECT MONTH(time) AS month, COUNT(MONTH(time)) FROM posts group by month");

		$statement->execute();

		$months = $statement->fetchAll(PDO::FETCH_COLUMN);
?>