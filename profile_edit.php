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
                <h4>Which post would you like to edit?</h4>    
            </div>
            <div class="card_content">
            <?php
            require 'partials/fetch_individual_entries_profile.php';
            foreach($indivudual_post_profile as $post) { ?>
                <div class="recent_loop row">
                    <div class="col-sm-9">
                        <h4><?= $post['title'] ?></h4>
                        <h5><?= $post['time'] ?></h5>
                    </div>
                    <div class="col-sm-3">
                        <?php if(isset($_SESSION["user"]["username"])) {?> 
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
				$total_records = postamount_individual();
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