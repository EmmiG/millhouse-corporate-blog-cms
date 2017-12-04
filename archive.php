<?php 
    session_start(); 
    require 'partials/head.php';
    require 'partials/fetch_months.php';
?>

<div id="content_archive" class="main_wrap">
    <div class="container">
        <div id="archive" class="content_wrap">
            <div class="row">
                <div class="col-sm-12 posts_wrap">
                    <div class="card_header">
                        <h3><?=$_GET['month']?></h3>
                    </div>
                    <div id="blog" class="card_content">
                    <article>
                    <?php 

                    if(isset($_GET['month'])) {
                        require 'partials/sort_months.php';
                        foreach($selected_posts as $selpost) { ?>
                        <div class="archive_box">
                          
                                <h4><?= $selpost['title'] ?></h4>
                                <h5><?= $selpost['time'] ?></h5>
                                <article><?= $selpost['content'] ?></article>
                                <p><?= $selpost['email'] ?></p>
                            </div>
                   
                         
                     <?php }} ?>
                      </article>
                    </div>
                </div>

            </div>

        </div><!--stänger content_wrap-->
    </div><!--stänger container-->
</div><!--stänger main_wrap-->

<?php  require 'partials/footer.php'; ?>

