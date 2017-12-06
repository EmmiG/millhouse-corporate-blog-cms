<?php 
    require_once 'partials/session_start.php';
    require 'partials/head.php';
    require 'partials/fetch_months.php';
    require 'partials/functions.php';
?>

<div id="content_archive" class="main_wrap">
    <div class="container">
        <div id="archive" class="content_wrap">
            <div class="row">
                <div class="col-sm-12 posts_wrap">
                    <h1><?=$_GET['month']?></h1>
                    <div id="blog" class="card_content">
                        <article>
                            <?php 
                                if(isset($_GET['month'])) {
                                    require 'partials/sort_months.php';
                                    foreach($selected_posts as $selpost) { 
                            ?>
                            <div class="archive_box">
                                <a href="comment.php?postID=<?= $selpost['postID'] ?>">
                                <h3 class="archive_title"><?= $selpost['title'] ?></h3></a>
                                <span class="span_light"><?= $selpost['time']?> | <?= $selpost['name'] ?></span>
                                <!--<article><?= $selpost['content'] ?></article>-->
                                <!--<p><?= $selpost['email'] ?></p>-->
                            </div>
                                 
                             <?php }} ?>
                        </article>
                     </div><!--card_content-->
                </div><!--stänger col-sm-12-->
            </div><!--stänger row-->
        </div><!--stänger content_wrap-->
    </div><!--stänger container-->
</div><!--stänger main_wrap-->

<?php  require 'partials/footer.php'; ?>