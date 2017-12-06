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
                <h2>Which post would you like to edit?</h2>    
            </div>
            <div class="card_content">
            <!-- A partial will run a SQL-request to fetch the entries made by a particular user. Then they are looped out thorugh a foreach loop. The user who made the entries can edit them as they will not appear otherwise. -->
            <?php
                require 'partials/fetch_individual_entries_profile.php';
                foreach($indivudual_post_profile as $post) { 
            ?>
            <div class="recent_loop row">
                <div class="col-sm-9">
                    <h3><?= $post['title'] ?></h3>
                    <span class="span_light"><?= $post['time'] ?></span>
                </div>
                <div class="col-sm-3">
                    <form action="profile_editpost.php" method="post">
                        <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                        <input type="submit" value="edit" class="btn btn-primary btn_card"/>
                    </form>
                </div> 
            </div>  
 
            <?php } ?>
            </div>
        </div>
    </div>
    <!--  A function is initiated to gather the post amount. Then our pagination is required. -->
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