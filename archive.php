<?php 
    session_start(); 
    require 'partials/head.php';
    require 'partials/fetch_months.php';
?>

<style>
    

#content_archive {
   background:#F1F2F7;
}

.card_header {
    color:white;
}


</style>
<div id="content_archive" class="main_wrap">
    <div class="container">
        <div id="archive" class="content_wrap">
            <div class="row">
                <div class="col-sm-12 posts_wrap">
                    <div class="card_header">
                        <h3><?=$_GET['month']?></h3>
                    </div>
                    <div class="card_content">
                    <?php 
                    if(isset($_GET['month'])) {
                        require 'partials/sort_months.php';
                        foreach($selected_posts as $selpost) { ?>
                        <div class="recent_loop row">
                            <div class="col-sm-9">
                                <h4><?= $selpost['title'] ?></h4>
                                <h5><?= $selpost['time'] ?></h5>
                                <p><?= $selpost['content'] ?></p>
                                <p><?= $selpost['email'] ?></p>
                            </div>
                   
                        </div>  
                     <?php }} ?>
                    </div>
                </div>
            </div>
        </div><!--stänger content_wrap-->
    </div><!--stänger container-->
</div><!--stänger main_wrap-->

<?php  require 'partials/footer.php'; ?>

