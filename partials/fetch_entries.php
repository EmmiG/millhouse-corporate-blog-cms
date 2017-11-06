<?php

require 'database.php';

$statement = $pdo->prepare("SELECT * FROM posts"); $statement->execute(); $posts = $statement->fetchAll(PDO::FETCH_ASSOC);