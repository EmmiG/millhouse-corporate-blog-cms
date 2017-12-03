<?php
    session_start();
    if(isset($_SESSION['user'])) {
    require 'partials/database.php';
    require 'partials/head_profile.php';
    require 'partials/functions.php';
?>
<div id="content" class="container">
    <div class="row">
        <div class="col-sm-12">      
            <div class="card_header">
                <h3>View all comments</h3>    
            </div>
            <div class="card_content">
                 <?php
                require 'partials/fetch_comments_profile.php';
                foreach($posts as $post) { ?>
                <div class="recent_loop row">
                    <div class="col-sm-9">
                        <p> <?= $post['time'] ?></p>
                        <p> <?= $post['name'] ?></p>
                        <p> <?= $post['content']; ?> </p> 
                        <!--<p> <?= $post['email'] ?></p>-->
                    </div>


                    <div class="col-sm-3">
                        <form action="comment.php" method="get">
                            <input type="hidden" value="<?= $post['postID'] ?>" name="postID"/>
                            <input type="submit" value="show post" class="btn btn-primary btn_card"/>
                        </form>
                          <?php if($_SESSION["user"]["username"] == $post['name'] or $_SESSION["user"]["username"] == "admin") {?> 
                          <form action="partials/delete_comment.php" method="post">
                            <input type="hidden" value="<?=$post["postID"] ?>" name="postID"/>
                            <input type="submit" value="delete" class="btn btn-primary btn_card"/>
                          </form>
                          <?php } ?>
                    </div> 
                 </div>

                <?php } ?>

            </div>
        </div>
    </div>
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