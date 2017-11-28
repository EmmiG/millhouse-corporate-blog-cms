<?php
        session_start();
        require 'partials/database.php';
        require 'partials/head_profile.php';
				require 'partials/functions.php';
?>   

<div id="content">
    <div class="top_nav">
        <a href="index.php">
            <h3>Shortcut blog</h3>
        </a>
        <?php if(isset($_SESSION["user"]["username"])) {?><h3>
        LOGGED IN: <?=  $_SESSION["user"]["username"]; }?></h3>
    </div>
   <div class="clear"></div>
 
    <div id="shortcut" class="row">
        <a href="profile_newpost.php" class="shortcut_box col-xs-5 col-sm-3">
           <img src="../images/new_post.svg">
           <p>New post</p>
        </a>
        <a href="profile_edit.php" class="shortcut_box col-xs-5 col-sm-3">
            <img src="../images/edit.svg">
            <p>Edit post</p>
        </a>
        <a href="profile_deletepost.php" class="shortcut_box col-xs-5 col-sm-3">
            <img src="../images/delete_post.svg">
            <p>Delete post</p>
        </a>
        <a href="#" class="shortcut_box col-xs-5 col-sm-3">
            <img src="../images/delete_comment.svg">   
            <p>Delete comment</p>
        </a>       
    </div>

    <div class="row">
        <div class="col-sm-12"> 
            <div class="card_header">          
                <h3>Overview</h3>
            </div>       
            <div class="card_content">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                            <p>Total posts: <?= count_posts(); ?></p>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                            <p>My posts: <?= user_posts(); ?></p>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                            <p>Total comments: <?= count_comments(); ?></p>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                            <p>My comments: <?= count_user_comments(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


   <!--Visar fem senaste inlägg och kommentarer-->
            <div class="row">
                <div class="col-sm-6">

                       <div class="card_header">
                            <h3>Recent posts</h3>
                        </div>    
                        <div class="card_content">
                    <?php 
										require 'partials/fetch_entries_profile.php';
                    foreach($count as $c) { ?>
                        <div class="recent_loop row">
                            <p> <?= $c['time'] ?> </p>
                            <p> <?= $c['name'] ?></p>
                            <p> <?= $c['title'] ?></p>
                            <p><?= $c['content'] ?></p>
                            <!--<p> <?= $c['email'] ?></p>-->
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
                        foreach($count as $c) { ?>
                        <div class="recent_loop row">
                            <p> <?= $c['time'] ?></p>
                            <p> <?= $c['name'] ?></p>
                            <p> <?= $c['content']; ?> </p> 
                            <!--<p> <?= $c['email'] ?></p>-->
                        </div>
                        <?php } ?>
                    </div>
                </div> 
            </div>
</div> <!--END CONTENT-->
<?php
        require 'partials/footer_profile.php';
?>
