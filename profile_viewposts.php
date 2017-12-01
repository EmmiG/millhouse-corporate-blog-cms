<?php
        session_start();
        require 'partials/database.php';
        require 'partials/head_profile.php';
        require 'partials/fetch_entries.php';
				require 'partials/functions.php';
?>
<div id="content" class="container">
    <div class="row">
        <div class="col-sm-12">      
            <div class="card_header">
                <h3>View all posts</h3>    
            </div>
            <div class="card_content">
            <?php 
            foreach($posts as $post) { ?>
                <div class="recent_loop all_posts row">
                    <div class="col-sm-9">
                        <h4><?= $post['title'] ?></h4>
                        <h5><?= $post['time'] ?></h5>
                        <?= $post['content'] ?>
                    </div>
                    <div class="col-sm-3">
                        <?php if(isset($_SESSION["user"]["username"])) {?> 
                    <form action="comment.php" method="get">
                        <input type="hidden" value="<?= $post['postID'] ?>" name="postID"/>
                        <input type="submit" value="show post" class="btn btn-primary btn_card"/>
                    </form>
                      <form action="partials/delete_entry.php" method="post">
                        <input type="hidden" value="<?=$post["postID"] ?>" name="postID"/>
                        <input type="submit" value="delete" class="btn btn-primary btn_card"/>
                    </form>
                    <form action="profile_editpost.php" method="post">
                        <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                        <input type="submit" value="edit" class="btn btn-primary btn_card"/>
                    </form>
                    </div> 
                </div>  
 
            <?php }} ?>
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
?>