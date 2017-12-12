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
                                <h2><?= $selpost['title'] ?></h2></a>
                                <span class="span_light"><?= $selpost['time']?> | <?= $selpost['name'] ?></span>
                                <!--<article><?= $selpost['content'] ?></article>-->
                                <!--<p><?= $selpost['email'] ?></p>-->
                                <form action="comment.php" method="get">
                                    <input type="hidden" value="<?= $selpost['postID'] ?>" name="postID"/>
                                    <a href="comment.php?postID=<?= $selpost['postID'] ?>" class="black-text d-flex flex-row-reverse">
                                    <h3 class="readmore_h3">Read more <i class="fa fa-chevron-right"></i></h3>
                                    </a>
                                </form>
                            </div>
                                 
                             <?php }} ?>
                        </article>
                    </div><!--end card_content-->
                </div><!--end col-sm-12-->
            </div><!--end row-->
        </div><!--end content_wrap-->
    </div><!--end container-->
</div><!--end main_wrap-->

<?php  require 'partials/footer.php'; ?>