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
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
  
<body> 

<nav id="sidebar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar_collapsed" aria-expanded"false">
            <i class="glyphicon glyphicon-align-center"></i>
        </button>
    </div> 

    <div class="collapse navbar-collapse" id="sidebar_collapsed">       
        <div class="sidebar_header">
            <h3>ADMIN</h3>
        </div>
        <ul class="list-unstyled components">
            <!--<li class="active">-->
            <li>   
                <a href="profile.php" aria-expanded="false">Dashboard</a>
            </li>
            <li>   
                <a href="#post_submenu" data-toggle="collapse" aria-expanded="false">Posts</a> 
                <ul class="collapse list-unstyled" id="post_submenu">
                    <li><a href="profile_viewposts.php">View posts</a></li>
                    <li><a href="profile_newpost.php">New post</a></li>
                    <li><a href="profile_editpost.php">Edit post</a></li>
                    <li><a href="profile_deletepost.php">Delete post</a></li>
                </ul>
            </li>    
            <li>       
                <a href="#pages_submenu" data-toggle="collapse" aria-expanded="false">Comments</a>
                <ul class="collapse list-unstyled" id="pages_submenu">
                    <li><a href="#">View comments</a></li>
                    <li><a href="#">Delete comment</a></li>
                </ul>
            </li>
            <li>    
            <?php
            if(isset($_SESSION["user"]["username"])) { ?>
            <form action="partials/logout.php" method="post">
                <input id="logout" type="submit" value="logga ut" class="btn btn-primary"/>
            </form>    
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>
