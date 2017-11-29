<?php
        session_start();
        require 'partials/database.php';
        require 'partials/head_profile.php';
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
                foreach($count as $c) { ?>
                <div class="recent_loop row">
                    <div class="col-sm-9">
                        <p> <?= $c['time'] ?></p>
                        <p> <?= $c['name'] ?></p>
                        <p> <?= $c['content']; ?> </p> 
                        <!--<p> <?= $c['email'] ?></p>-->
                    </div>


                    <div class="col-sm-3">
                        <?php if(isset($_SESSION["user"]["username"])) {?> 
                        <form action="comment.php" method="get">
                            <input type="hidden" value="<?= $post['postID'] ?>" name="postID"/>
                            <input type="submit" value="show post" class="btn btn-primary btn_card"/>
                        </form>
                          <form action="partials/delete_comment.php" method="post">
                            <input type="hidden" value="<?=$post["postID"] ?>" name="postID"/>
                            <input type="submit" value="delete" class="btn btn-primary btn_card"/>
                        </form>
                    </div> 
                 </div>

                <?php }} ?>

            </div>
        </div>
    </div>
    
</div>  


<?php
        require 'partials/footer_profile.php';
?>