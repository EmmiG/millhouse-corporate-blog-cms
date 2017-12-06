<?php
	require_once 'partials/session_start.php';
    //This page will only appear if the user is logged in. If not logged in, he/she will be re-directed.
	if(isset($_SESSION['user'])) {
        require 'partials/database.php';
        require 'partials/head_profile.php';
        require 'partials/functions.php';
?>   
<!-- The username of the active user is echoed onto the site. -->
<div id="content">
    <div class="top_nav">
        <a href="index.php">
            <h3>Shortcut blog</h3>
        </a>
        <h3 id="profile_avatar"><img src="../images/avatar.svg">
        LOGGED IN: <?=  $_SESSION["user"]["username"]; ?></h3>
    </div>
    <div class="clear"></div>
    
    <div class="shortcut container">
        <a href="profile_newpost.php" class="shortcut_box">
           <img src="../images/new_post.svg">
           <p>New post</p>
        </a>
        <a href="profile_edit.php" class="shortcut_box">
            <img src="../images/edit.svg">
            <p>Edit post</p>
        </a>
        <a href="profile_deletepost.php" class="shortcut_box">
            <img src="../images/delete_post.svg">
            <p>Delete post</p>
        </a>
        <a href="profile_deletecomment.php" class="shortcut_box">
            <img src="../images/delete_comment.svg">   
            <p>Delete comment</p>
        </a>       
    </div>
    <!-- Statistics are retreived from the functions-partial. They are then echoed. -->
    <div class="row">
        <div class="col-sm-12"> 
            <div class="card_header">          
                <h3>Overview</h3>
            </div>       
            <div class="overview_content card_content">
                <div class="overview_wrap row">
                    <div class="overview_box col-xs-6 col-sm-3">
                       <h1><?= postamount(); ?></h1>
                        <h3>Total posts</h3>
                    </div>
                    <div class="overview_box col-xs-6 col-sm-3">
                        <h1><?= user_posts(); ?></h1>
                        <h3>My posts</h3>
                    </div>
                    <div class="overview_box col-xs-6 col-sm-3">
                       <h1><?= count_comments(); ?></h1>
                        <h3>Total comments</h3>
                    </div>
                    <div class="overview_box col-xs-6 col-sm-3">
                        <h1><?= count_user_comments(); ?></h1>
                        <h3>My comments</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Shows the latest comments and entries through the partials.-->
    <div class="row">
        <div class="col-sm-6">

            <div class="card_header">
                <h3>Recent posts</h3>
            </div>    
            <div class="card_content">
                <?php 
                    require 'partials/fetch_entries_profile.php';
                    foreach($posts_profile as $post) { 
                ?>
                <div class="recent_loop row">
                    <h3> <?= $post['title'] ?></h3>
                    <h5> <?= $post['time'] ?> | Author: <?= $post['name'] ?></h5>
                    <a href="comment.php?postID=<?= $post['postID'] ?>">
                        <img id="view_svg" src="../images/eye.svg">
                    </a>
                    <div class="clear"></div>
                </div>        
                <?php } ?>
            </div>
        </div>   

        <div class="col-sm-6">
            <div class="card_header">
                <h3>Recent comments</h3>
            </div>

            <div class="card_content">
                <?php
                    require 'partials/fetch_comments_profile.php';
                    foreach($comments_profile as $comment) { 
                ?>
                <div class="recent_loop row">
                    <h3> <?= $comment['name'] ?></h3>
                    <h5> <?= $comment['time'] ?></h5>
                    <p> <?= $comment['content']; ?> </p>
                </div>
                <?php } ?>
            </div>
        </div> 
    </div>
</div> <!--END CONTENT-->

<?php
	require 'partials/footer_profile.php';
	}
	else {
		header('Location: landing.php?logged_in=false');
	}
?>
