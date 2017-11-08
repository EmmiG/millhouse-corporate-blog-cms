<?php

require 'database.php';

$statement = $pdo->prepare("SELECT * FROM posts order by postID DESC"); 
$statement->execute(); 
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);