<?php
        session_start();
        require 'partials/database.php';
        require 'partials/head_profile.php';
        require 'partials/fetch_entries.php';
?>
<div id="content" class="container">
    <div class="row">

     <?php $statement = $pdo->prepare("SELECT title, content, time, name, email FROM posts WHERE userID = :userID ORDER BY postID DESC");   $statement->execute(array(":userID" => $_SESSION["user"]["userID"]
     )); ?>

        <div class="col-sm-12">      
            <div class="card_header">
                <h3>View all posts</h3>    
            </div>
            <div class="card_content">
            <?php 
            foreach($posts as $post) { ?>
                <div class="recent_loop row">
                    <div class="col-sm-9">
                        <h4><?= $post['title'] ?></h4>
                        <h5><?= $post['time'] ?></h5>
                        <p><?= $post['content'] ?></p>
                        <!--<p> <?= $c['email'] ?></p>-->
                    </div>
                    <div class="col-sm-3">
                        <?php if(isset($_SESSION["user"]["username"])) {?> 
                        <form action="profile_editpost.php" method="post">
                            <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                            <input type="submit" value="redigera" class="btn btn-primary btn_card"/>
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