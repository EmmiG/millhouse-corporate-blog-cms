<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/67b80e2b65.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <script src="js/smooth_scroll.js"></script>
    <title>PHP PDO</title>
    <!--stylesheet till scss-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="main_wrap">
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <i class="glyphicon glyphicon-align-center"></i>
                </button>
              
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ta-bort">
                    <li><a href="index.php">HOME</a></li>                   
                    <li><a href="about.php">ABOUT<span class="sr-only">Opens about page (same window)</span></a></li>
                
                    <li><a id="nav-logo" href="index.php"><img src="../images/millhouse_white_logo.svg"><span class="sr-only">Opens start blog page (same window)</span></a></li>
              
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CATEGORY <i class="caret"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="category.php?category=watches">Watches</a></li>
                        <li><a href="category.php?category=interior">Interior</a></li>
                        <li><a href="category.php?category=sunglasses">Sunglasses</a></li>
                      </ul>
                    </li> 
                    
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ARCHIVE <i class="caret"></i></a>
                      <ul class="dropdown-menu">
                        
                        <?php
                        /*
                        Both fetch_years and fetch_months are required and looped. The fetch_months values are
                        converted from INT to string. the fetch_years retreives the years and puts them on the
                        same row in the loop. Those values are not converted. The result is something like 
                        "March (fetch_months) 2017 (fetch_years)". This is probably a bad solution – but it does the job. 
                        */
                        require 'fetch_months.php';
                        require 'fetch_years.php';
                        foreach ($months as $index => $value) {
                                $month = date("F", mktime(0, 0, 0, $months[$index], 10));
                        ?>
                        <li><a href="archive.php?month=<?= $month ?>&year=<?= $years[$index] ?>"><?= $month, " " . $years[$index] ?></a></li>
                        <?php } ?>
                      </ul>
                    </li> 
                </ul>
                <?php if(isset($_SESSION["user"]["username"])) {?>    
                <ul class="nav navbar-nav navbar-right">    
                    <li><a href="profile.php">
                        LOGGED IN: <?= $_SESSION["user"]["username"]; }?>
                    </a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </header>