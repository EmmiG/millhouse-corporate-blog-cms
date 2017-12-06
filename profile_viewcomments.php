<?php
    require_once 'partials/session_start.php';
    //This page will only appear if the user is logged in. If not logged in, he/she will be re-directed.
    if(isset($_SESSION['user'])) {
        require 'partials/database.php';
        require 'partials/head_profile.php';
        require 'partials/functions.php';
?>
<div id="content" class="container">
    <div class="row">
        <div class="col-sm-12">      
            <div class="card_header">
                <h2>View all comments</h2>    
            </div>
            <div class="card_content">
            <!-- This partial will retreive and loop all comments on the website. -->
            <?php
                require 'partials/fetch_comments_profile.php';
                foreach($comments_profile as $comment) { 
            ?>
            <div class="recent_loop row">
                <div class="col-sm-9">
                    <p> <?= $comment['time'] ?></p>
                    <p> <?= $comment['name'] ?></p>
                    <p> <?= $comment['content']; ?> </p> 
                    <!--<p> <?= $comment['email'] ?></p>-->
                </div>

                <!-- All logged in users can view the comments, but only a user with the username "admin" can delete it. For everyone else, the option won't appear. This is done by comparison -->
                <div class="col-sm-3">
                    <form action="comment.php" method="get">
                        <input type="hidden" value="<?= $c['postID'] ?>" name="postID"/>
                        <input type="submit" value="show post" class="btn btn-primary btn_card"/>
                    </form>
                      <?php if($_SESSION["user"]["username"] == $comment['name'] or $_SESSION["user"]["username"] == "admin") {?> 
                      <form action="partials/delete_comment.php" method="post">
                        <input type="hidden" value="<?=$comment["postID"] ?>" name="postID"/>
                        <input type="submit" value="delete" class="btn btn-primary btn_card"/>
                      </form>
                      <?php } ?>
                </div> 
             </div>

            <?php } ?>

            </div>
        </div>
    </div>
        <!--  A function is initiated to gather the post amount. Then our pagination is required. -->
        <?php
            $total_records = postamount();
            require 'partials/pagination_pages.php';
        ?> 
</div>  


<?php
    require 'partials/footer_profile.php';
    }
    else {
        header('Location: landing.php?logged_in=false');
    }
?>