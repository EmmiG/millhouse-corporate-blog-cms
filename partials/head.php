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
    <title>PHP PDO</title>
    <!--stylesheet till scss-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
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
                    <li><a href="about.php">ABOUT</a></li>
                
                    <li><a id="nav-logo" href="index.php"><img src="../images/millhouse_white_logo.svg"></a></li>
              
                    <li><a href="category.php">CATEGORY</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" name="month" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">ARCHIVE <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="archive.php?month=November#archive">November 2017</a></li>
                            <li><a class="dropdown-item" href="archive.php?month=December#archive">December 2017</a></li>
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