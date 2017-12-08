<?php    
    require_once 'database.php';
    /*
    This will do the same as fetch_months, but will simply receive the year row below.
    */
    $statement = $pdo->prepare("SELECT MONTH(time) AS month, YEAR(time) as year, UNIX_TIMESTAMP(time) as DATE FROM posts group by month, year ORDER BY date DESC");

    $statement->execute();
    /*
    The second row (1) is year, while (0) is month. This solution is used to print the month and the year onto the site.
    */
    $years = $statement->fetchAll(PDO::FETCH_COLUMN, 1);
?>