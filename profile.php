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
            <span>Shortcut blog</span>
        </a>
        <span id="profile_avatar"><img src="../images/avatar.svg">
        LOGGED IN: <?=  $_SESSION["user"]["username"]; ?></span>
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
                <h2>Overview</h2>
            </div>       
            <div class="overview_content card_content">
                <div class="overview_wrap row">
                    <div class="overview_box col-xs-6 col-sm-3">
                       <span class="overview_dig"><?= postamount(); ?></span>
                        <span class="overview_text">Total posts</span>
                    </div>
                    <div class="overview_box col-xs-6 col-sm-3">
                        <span class="overview_dig"><?= user_posts(); ?></span>
                        <span class="overview_text">My posts</span>
                    </div>
                    <div class="overview_box col-xs-6 col-sm-3">
                       <span class="overview_dig"><?= count_comments(); ?></span>
                        <span class="overview_text">Total comments</span>
                    </div>
                    <div class="overview_box col-xs-6 col-sm-3">
                        <span class="overview_dig"><?= count_user_comments(); ?></span>
                        <span class="overview_text">My comments</span>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Shows the latest comments and entries through the partials.-->
    <div class="row">
        <div class="col-sm-6">

            <div class="card_header">
                <h2>Recent posts</h2>
            </div>    
            <div class="card_content">
                <?php 
                    require 'partials/fetch_entries_profile.php';
                    foreach($posts_profile as $post) { 
                ?>
                <div class="recent_loop row">
                    <h3> <?= $post['title'] ?></h3>
                    <span class="span_light"> <?= $post['time'] ?> | Author: <?= $post['name'] ?></span>
                    <a href="comment.php?postID=<?= $post['postID'] ?>">
                        <img id="view_svg" src="../images/eye.svg">
                        <span class="sr-only">Opens post</span>
                    </a>
                    <div class="clear"></div>
                </div>        
                <?php } ?>
            </div>
        </div>   

        <div class="col-sm-6">
            <div class="card_header">
                <h2>Recent comments</h2>
            </div>

            <div class="card_content">
                <?php
                    require 'partials/fetch_comments_profile.php';
                    foreach($comments_profile as $comment) { 
                ?>
                <div class="recent_loop row">
                    <h3> <?= $comment['name'] ?></h3>
                    <span class="span_light"> <?= $comment['time'] ?></span>
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
