<?php
        session_start();
        require 'partials/database.php';
        require 'partials/head_profile.php';
?>
<div id="content" class="container">
    <div class="row">
        <div class="col-sm-12">      
            <div class="card_header">
                <h3>Which comment would you like to delete?</h3>    
            </div>
            <div class="card_content">
            <?php 
                require 'partials/fetch_individual_comments_profile.php';
            foreach($indivudual_comment_profile as $comment) { ?>
                <div class="recent_loop row">
                    <div class="col-sm-9">
<!--                        <h4><?= $comment['title'] ?></h4>-->
                        <h5><?= $comment['time'] ?></h5>
                        <p><?= $comment['content'] ?></p>
                    </div>
                    <div class="col-sm-3">
                        <?php if(isset($_SESSION["user"]["username"])) {?>      
                        <form action="partials/delete_comment.php" method="post">
                            <input type="hidden" value="<?=$comment["postID"] ?>" name="postID"/>
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