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
  
<body id="profile_body"> 
<nav id="sidebar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar_collapsed" aria-expanded="false">
        <i class="glyphicon glyphicon-align-center"><span class="sr-only">open navbar</span></i>
        </button>
    </div> 

    <div class="collapse navbar-collapse" id="sidebar_collapsed">       
        <div class="sidebar_header">
            <img src="../images/admin.svg" alt="admin logo navbar"><h1>ADMIN</h1>
        </div>
        <ul class="list-unstyled components">
            <!--<li class="active">-->
            <li>   
                <a href="profile.php" aria-expanded="false"><img src="../images/dashboard.svg" alt="dashboard logo navbar">Dashboard</a>
            </li>
            <li>   
                <a href="#post_submenu" data-toggle="collapse" aria-expanded="false"><img src="../images/posts.svg" alt="post logo navbar">Posts</a> 
                <ul class="collapse list-unstyled" id="post_submenu">
                    <li><a href="profile_viewposts.php">View posts</a></li>
                    <li><a href="profile_newpost.php">New post</a></li>
                </ul>
            </li>    
            <li>       
                <a href="#pages_submenu" data-toggle="collapse" aria-expanded="false"><img src="../images/comments.svg" alt="coments logo navbar">Comments</a>
                <ul class="collapse list-unstyled" id="pages_submenu">
                    <li><a href="profile_viewcomments.php">View comments</a></li>
                    <li><a href="profile_deletecomment.php">Delete comment</a></li>
                </ul>
            </li>
            
            <li class="logout">   
            <?php
            if(isset($_SESSION["user"]["username"])) { ?>
                <a href="partials/logout.php" value="logga ut" aria-expanded="false"><img src="../images/logout.svg" alt="logout logo navbar">Log out</a>
            <?php } ?>
            </li>
        </ul>
    </div>
</nav>
<main>

