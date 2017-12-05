<?php
	session_start();
	if(isset($_SESSION['user'])) {
	require 'partials/database.php';
	require 'partials/head_profile.php';
	require 'partials/functions.php';
?>   

<div id="content">
    <div class="top_nav">
        <a href="index.php">
            <h4>Shortcut blog</h4>
        </a>
        <h4 id="profile_avatar"><img src="../images/avatar.svg">
        LOGGED IN: <?=  $_SESSION["user"]["username"]; ?></h4>
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

    <div class="row">
        <div class="col-sm-12"> 
            <div class="card_header">          
                <h4>Overview</h4>
            </div>       
            <div class="overview_content card_content">
                <div class="overview_wrap row">
                    <div class="overview_box col-xs-6 col-sm-3">
                       <h1><?= count_posts(); ?></h1>
                        <h4>Total posts</h4>
                    </div>
                    <div class="overview_box col-xs-6 col-sm-3">
                        <h1><?= user_posts(); ?></h1>
                        <h4>My posts</h4>
                    </div>
                    <div class="overview_box col-xs-6 col-sm-3">
                       <h1><?= count_comments(); ?></h1>
                        <h4>Total comments</h4>
                    </div>
                    <div class="overview_box col-xs-6 col-sm-3">
                        <h1><?= count_user_comments(); ?></h1>
                        <h4>My comments</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>


   <!--Visar fem senaste inlägg och kommentarer-->
            <div class="row">
                <div class="col-sm-6">

                    <div class="card_header">
                        <h4>Recent posts</h4>
                    </div>    
                    <div class="card_content">
                    <?php 
                    require 'partials/fetch_entries_profile.php';

                    foreach($count as $c) { ?>
                        <div class="recent_loop row">
                            <h4> <?= $c['title'] ?></h4>
                            <h5> <?= $c['time'] ?> | Author: <?= $c['name'] ?></h5>
                            <a href="comment.php?postID=<?= $c['postID'] ?>">
                                <img id="view_svg" src="../images/eye.svg">
                            </a>
                            <div class="clear"></div>
                        </div>        
                    <?php } ?>
                    </div>
                </div>   

                <div class="col-sm-6">
                    <div class="card_header">
                        <h4>Recent comments</h4>
                    </div>

                    <div class="card_content">
                    <?php
                    require 'partials/fetch_comments_profile.php';
                        
                    foreach($count as $c) { ?>
                    <div class="recent_loop row">
                        <h4> <?= $c['name'] ?></h4>
                        <h5> <?= $c['time'] ?></h5>
                        <p> <?= $c['content']; ?> </p>
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
