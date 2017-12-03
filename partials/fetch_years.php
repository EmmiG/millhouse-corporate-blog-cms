<?php    
require 'partials/database.php'; 
$statement = $pdo->prepare("SELECT MONTH(time) AS month, YEAR(time) as year, UNIX_TIMESTAMP(time) as DATE FROM posts group by month, year ORDER BY date DESC");

$statement->execute();

$years = $statement->fetchAll(PDO::FETCH_COLUMN, 1);