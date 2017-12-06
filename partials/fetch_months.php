<?php    
   	require_once 'partials/database.php';
    /*
    This statement will from our posts-database and group them by year/month. This is later echoed into a 
    dropdown menu in our navbar. Only months that have entries will be visible. It is an ugly solution though as 
    we are using two statements, fetch_months and fetch_years. This statement retreives the month, while fetch_years
    retreives the year.
    */
    $statement = $pdo->prepare("SELECT MONTH(time) AS month, YEAR(time) as year, UNIX_TIMESTAMP(time) as DATE FROM posts group by month, year ORDER BY date DESC");
    $statement->execute();
    /*
    The first row is selected, where month is.
    */
    $months = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
?>